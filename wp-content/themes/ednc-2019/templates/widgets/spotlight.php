<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

$featured_image = Media\get_featured_image('medium');


?>

<section class="block spotlight">
  <div class="widget-content">
    <?php if( have_rows('spotlight', 'option') ): ?>
      <?php while( have_rows('spotlight', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <h2 class="header-big">
            <?php if ($image){ ?>
              <img class="section-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
            <?php } ?>
            <?php echo $header ?>
            <?php echo get_cat_name($category); ?>
        </h2>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="content-box-container">
      <?php
      /*
       * First spotlight post
       *
       * Displays most recently updated post that is in spotlight category
       */

      if ($number == 1) {
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
           //echo $number;

        endwhile; endif; wp_reset_query();
      }

      if ($number == 2) {
        $spotlight = new WP_Query([
          'posts_per_page' => 2,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          // 'post__not_in' => $spotlight_featured,
          // 'offset' => 1,
          'meta_key' => 'updated_date',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        ]);

        if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php get_template_part('templates/layouts/block', 'spotlight-2');
          ?>

        <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 3 || $number == 6 || $number == 9 || $number == 15) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-3');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 4 || $number == 8 || $number == 12 || $number == 16) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-4');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 5) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-5');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 7 || $number == 11) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-7');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 10) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-10');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }
        if ($number == 13 || $number == 14) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'meta_key' => 'updated_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-13');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }
      ?>
    </div>
  </div>
</section>
