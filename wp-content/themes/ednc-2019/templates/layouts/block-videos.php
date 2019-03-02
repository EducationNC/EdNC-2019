<?php

use Roots\Sage\Media;

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
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0" showinfo="0" modestbranding="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>


<div <?php post_class('block-videos content-block-3 clearfix'); ?>>
  <div class="block-content-video">
    <div class="video-single">
      <?php echo $iframe; ?>
    </div>
    <!-- <div class="videoWrapper">
       <?php// echo $iframe; ?>
   </div> -->
    <h3 class="post-title-reach"><?php the_title(); ?></h3>
  </div>
</div>
