<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

$featured_image = Media\get_featured_image('medium');


?>

<section class="block spotlight">
  <div class="widget-content">
    <h2 class="header-big">Spotlight: <?php echo get_cat_name($category); ?></h2>
    <div class="content-box-container">
      <?php
      /*
       * First spotlight post
       *
       * Displays most recently updated post that is in spotlight category
       */
      $spotlight_featured = new WP_Query([
        'posts_per_page' => 1,
        'post_type' => array('post', 'edtalk'),
        'cat' => $category,
        'meta_key' => 'updated_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      ]);

      if ($spotlight_featured->have_posts()) : while ($spotlight_featured->have_posts()) : $spotlight_featured->the_post();

         get_template_part('templates/layouts/block', 'spotlight');
         echo $number;
         
      endwhile; endif; wp_reset_query();


      if ($number == 2) {
        $spotlight = new WP_Query([
          'posts_per_page' => $number,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          // 'offset' => 1,
          'meta_key' => 'updated_date',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        ]);

        if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php get_template_part('templates/layouts/block', 'spotlight-2');
          echo $number;
          ?>

        <?php endwhile; endif; wp_reset_query();
      }

      if ($number > 2) {
        $spotlight = new WP_Query([
          'posts_per_page' => $number,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          // 'post__not_in' => $spotlight_featured,
          'offset' => 1,
          'meta_key' => 'updated_date',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        ]);

        if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php get_template_part('templates/layouts/block', 'spotlight-2');
          echo $number;
          ?>

        <?php endwhile; endif; wp_reset_query();
      }
      ?>
    </div>
  </div>
</section>
