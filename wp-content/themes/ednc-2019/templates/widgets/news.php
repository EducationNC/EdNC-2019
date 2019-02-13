<?php

use Roots\Sage\Assets;

// global $featured;
// global $featured_ids;
// global $recent_ids;
global $featured_recent;

?>

<section class="block news">
  <div class="widget-content">
    <h2 class="header-big"><img class="section-icon" src="<?php echo Assets\asset_path('images/news.svg'); ?>"></img>News</h2>
    <div class="content-box-container">
       <?php
       // Show 8 most news
       $args = array(
         'posts_per_page' => $number,
         'post__not_in' => $featured_recent,
         'tax_query' => array(
           array(
             'taxonomy' => 'appearance',
             'field' => 'slug',
             'terms' => 'news'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $news = new WP_Query($args);

       if ($news->have_posts()) : while ($news->have_posts()) : $news->the_post();

         $featured_ids[] = get_the_id();
         get_template_part('templates/layouts/block', 'news');?>

       <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
