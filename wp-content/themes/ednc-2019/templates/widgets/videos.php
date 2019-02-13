<?php

use Roots\Sage\Assets;

?>



<section class="block videos">
  <div class="widget-content">
    <h2 class="header-big"><img class="section-icon" src="<?php echo Assets\asset_path('images/videos.svg'); ?>"></img>Videos</h2>
    <div class="content-box-container">
       <?php
       // Show 3 most recent videos
       $args = array(
         'posts_per_page' => 3,
         'meta_query' => array(
            array(
              'key' => 'video_1',
              'value' => '1',
            )
          )
         // 'meta_key' => 'updated_date',
         // 'orderby' => 'meta_value_num',
         // 'order' => 'DESC'
       );

       $videos = new WP_Query($args);

       if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post(); ?>

        <?php get_template_part('templates/layouts/block', 'videos');?>

       <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
