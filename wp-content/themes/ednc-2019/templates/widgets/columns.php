<?php

use Roots\Sage\Assets;

// global $featured_ids;
// global $recent_ids;
global $featured_recent;
// echo '<pre>'; print_r($featured_recent); echo '</pre>';

?>

<section class="block columns">
  <div class="widget-content">
    <h2 class="header-big">EdNC's Columns</h2>
    <div class="content-box-container">
       <?php
       // Show 8 most news


       $args = array(
         'posts_per_page' => $number,
         'post__not_in' => $featured_recent,
         'tax_query' => array(
           array(
             'taxonomy' => 'column',
             'operator' => 'EXISTS'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );


      /* $args = array(
         'posts_per_page' => 8,
         'tax_query' => array(
           array(
             'taxonomy' => 'column',
             'field' => 'slug',
             'terms' => 'grumblings-and-rumblings'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       ); */

       $columns = new WP_Query($args);

       if ($columns->have_posts()) : while ($columns->have_posts()) : $columns->the_post();

         $featured_ids[] = get_the_id();
         get_template_part('templates/layouts/block', 'columns');

       endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
