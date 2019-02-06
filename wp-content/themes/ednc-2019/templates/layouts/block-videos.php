<?php

use Roots\Sage\Media;


/*if ($post->post_type == 'post') {
  $video = has_post_format('video');
}*/

// $author_id = get_the_author_meta('ID');
// $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
// $video = has_post_format('video');
// $author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('medium');
$iframe = get_field('video');
// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// add extra params to iframe src
$params = array(
    'controls'    => 0,
    'hd'        => 1,
    'byline' => 1,
		'title' => 1,
    'showinfo' => 0,
    'modestbranding' => 0
    // 'autohide'    => 1,
    // 'autoplay' => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0" showinfo="0" modestbranding="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>


<div <?php post_class('block-videos content-block-3 clearfix'); ?>>
  <div class="block-content-video">
    <div class="videoWrapper">
       <?php echo $iframe; ?>
   </div>
    <h3 class="post-title"><?php the_title(); ?></h3>
  </div>
</div>

<!-- <article <?php post_class('block-videos content-block-3 clearfix'); ?>>
  <a class="" href="<?php// the_permalink(); ?>"></a>
  <div class="block-content">
    <div class="embed-container"><?php// the_field('video'); ?></div> -->

    <!-- <p class="small">Video</p> -->

    <!-- <h3 class="post-title"><?php// the_title(); ?></h3>
    <?php// get_template_part('templates/components/entry-meta'); ?>
    <a class="mega-link" href="<?php// the_permalink(); ?>" <?php //echo the_permalink();?>></a>
    <p class="lato"><?php// echo wp_trim_excerpt(); ?></p>
  </div>
</article> -->
