<?php

namespace Roots\Sage\Media;

use Roots\Sage\Assets;
use Roots\Sage\Resize;

/**
 * Define image sizes
 */

$large_width = 1240;
$large_height = 525;
$medium_width = 747;
$medium_height = 421;
$small_width = 564;
$small_height = 239;
$trending_width = 420;
$trending_height = 420;

add_image_size('medium-square', 400, 400, true);
add_image_size('bio-headshot', 220, 220, true);
add_image_size('bio-headshot-committee', 150, 220, true);
add_image_size('featured-large', $large_width, $large_height, true);
add_image_size('featured-medium', $medium_width, $medium_height, true);
add_image_size('featured-small', $small_width, $small_height, true);
add_image_size('Hero', 1200, 500, true);
add_image_size('Contained', 1200, 900, true);
add_image_size('Trending', 300, 300, true);
add_image_size('featured-trending', $trending_width, $trending_height, true);

add_action('init', function() {
  remove_image_size('guest-author-32');
  remove_image_size('guest-author-64');
  remove_image_size('guest-author-96');
  remove_image_size('guest-author-128');
});


/**
 * Get first image inside post content
 */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if (isset($matches[1][0])) {
    $first_img = $matches[1][0];
  }

  return $first_img;
}



/**
 * Get featured image for post blocks
 */
 function get_featured_image($size) {
   global $post, $large_width, $large_height, $medium_width, $medium_height, $small_width, $small_height, $trending_width, $trending_height;

   if ($size == 'large') {
     $width = $large_width;
     $height = $large_height;
   } elseif ($size == 'medium') {
     $width = $medium_width;
     $height = $medium_height;
   } elseif ($size == 'small') {
     $width = $small_width;
     $height = $small_height;
   } elseif ($size == 'trending') {
     $width = $trending_width;
     $height = $trending_height;
   }

   // Use featured image if set, but fallback to first image in content if there is no featured image and EdNC logo if no image at all

   // if (has_post_thumbnail() && $featured_image_align == 'hero') {
   //   $image_id = get_post_thumbnail_id();
   //   $image_url = wp_get_attachment_image_src($image_id, 'Hero');
   //   $image_sized['url'] = $image_url[0];
   // }
   if (has_post_thumbnail()) {
     $image_id = get_post_thumbnail_id();
     $image_url = wp_get_attachment_image_src($image_id, "featured-$size");
     $image_sized['url'] = $image_url[0];
   } else {
     $image_src = catch_that_image();
     if ($image_src) {
       $image_sized = Resize\mr_image_resize($image_src, $width, $height, true, false);
     } else {
       if (has_term('perspectives', 'appearance')) {
         $image_sized['url'] = false;
       } elseif ($post->post_type == 'edtalk') {
         $image_sized['url'] = Assets\asset_path("images/edtalk-featured-$size.jpg");
       } else {
         $image_sized['url'] = Assets\asset_path("images/logo-featured-$size.jpg");
       }
     }
   }

   return $image_sized['url'];
 }
