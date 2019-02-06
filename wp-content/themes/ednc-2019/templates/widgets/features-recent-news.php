<?php

use Roots\Sage\Resize;
use Roots\Sage\Media;

// Number of posts to show
// $features_n = $instance['features_n'];
// $news_n = $instance['news_n'];

// Set up variable to catch featured post ids -- we will exclude these ids from news query
$featured = array();
global $featured;
$recent_ids = array();
?>

<section class="block features">
  <div class="widget-content">
    <div class="features-box">
      <div class="editors">
        <div class="editors-box">
          <div class="editors-content-box">
            <h2 class="header">Editor's Picks</h2>
            <hr class="break">
              <?php
              // Show 8 most news
              $ednews = new WP_Query([
                'post_type' => 'ednews',
                'posts_per_page' => 5
              ]);
              if ($ednews->have_posts()) : while ($ednews->have_posts()) : $ednews->the_post();?>

                  <?php get_template_part('templates/layouts/block', 'editor'); ?>
                <?php
              endwhile; endif; wp_reset_query(); ?>
          </div>
        </div>
      </div>

      <div class="featured">
        <div class="featured-article">
          <?php
          /*
           * Displays most recently updated posts that are marked as "Featured"
           */

          $featured = new WP_Query([
            'posts_per_page' => 1,
            'post_type' => array('post', 'map'),
            'tax_query' => array(
              array(
                'taxonomy' => 'appearance',
                'field' => 'slug',
                'terms' => 'featured'
              )
            )
          ]);

          if ($featured->have_posts()) : while ($featured->have_posts()) : $featured->the_post(); ?>


          <?php global $featured;
          $featured_ids[] = get_the_id(); ?>

            <?php get_template_part('templates/layouts/block', 'featured'); ?>

        <?php  endwhile; endif; wp_reset_query(); ?>

        </div>
      </div>


      <div class="recent">
        <div class="recent-content">
          <div class="recent-content-box">
            <h2 class="header">Most Recent</h2>
              <?php
              // Show 8 most news
              $recent = new WP_Query([
                'posts_per_page' => 4,
                'post__not_in' => $featured_ids,
                'post_type' => array('post', 'map', 'edtalk'),
                'tax_query' => array(
                  'relation' => 'OR',
                  array(
                    'taxonomy' => 'column',
                    'operator' => 'EXISTS',
                  ),
                  array(
                    'taxonomy' => 'appearance',
                    'field'    => 'slug',
                    'terms'    => array( 'news' ),
                  ),
                ),
                'meta_key' => 'updated_date',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
              ]);

              $n = 0;

              if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post();
                ?>

                <?php global $recent_ids;
                $recent_ids[] = get_the_id(); ?>


                <?php get_template_part('templates/layouts/block', 'recent'); ?>

                <?php
                $n++;

              endwhile; endif; wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
