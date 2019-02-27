<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

// global $featured_ids;
// global $recent_ids;
global $featured_recent;


// elseif ($post->post_type == 'post') {
//    $post_type = "News";
// }


?>

<section class="block columns">
  <div class="widget-content">
    <h2 class="header-big"><img class="section-icon" src="<?php echo Assets\asset_path('images/columns.svg'); ?>"></img>Columns & Issues</h2>
    <div class="content-box-container">
       <?php
       // Show 8 most news


       $args = array(
         'posts_per_page' => $number,
         'post_type' => array('post', 'map', 'edtalk'),
         'post__not_in' => $featured_recent,
         'tax_query' => array(
           	 'relation' => 'OR',
              array(
                'taxonomy' => 'column',
                'operator' => 'EXISTS'
              ),
              array(
                'taxonomy' => 'appearance',
                'field' => 'slug',
                'terms' => 'issues'
              ),
              // array(
              //   'taxonomy' => 'appearance',
              //   'field' => 'slug',
              //   'terms' => 'press-release'
              // ),
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $columns = new WP_Query($args);

       if ($columns->have_posts()) : while ($columns->have_posts()) : $columns->the_post();

          $featured_image = Media\get_featured_image('medium');

          $column = wp_get_post_terms(get_the_id(), 'column');
          if ($column) {
            $post_type = $column[0]->name;
          }
          // elseif ( has_term( 'press-release', 'appearance' ) ) {
          //   $post_type = "Press Release";
          // }
          elseif ( has_term ( 'issues', 'appearance' ) ) {
            $post_type = "Issues";
          }
          else {
            $post_type = "News";
          }
          ?>

           <article <?php post_class('block-news content-block-4 clearfix'); ?>>
             <?php ?>
             <div class="flex">
               <a class="" href="<?php the_permalink(); ?>"></a>
               <div class="block-content">
                 <img class="news-block-image column-img" src="<?php echo $featured_image; ?>" />
                 <p class="small"><?php echo $post_type ?></p>
                 <h3 class="post-title"><?php the_title(); ?></h3>
                 <?php get_template_part('templates/components/entry-meta'); ?>
                 <a class="mega-link" href="<?php the_permalink(); ?>" <?php echo the_permalink();?>></a>
                 <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
               </div>
             </div>
           </article>

      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
