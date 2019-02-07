<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

// global $featured;
// global $SLfeatured;
// global $featured_ids;
// global $recent_ids;
$featured_image = Media\get_featured_image('medium');
//
// if (empty($featured_ids)) {
//   $featured_ids = array();
// }

?>

<section class="block spotlight">
  <div class="widget-content">
    <h2 class="content-header">Spotlight: <?php echo get_cat_name($category); ?></h2>
    <div class="content-box-container">
      <?php
      /*
       * First spotlight post
       *
       * Displays most recently updated post that is in spotlight category
       */
      $SLfeatured = new WP_Query([
        'posts_per_page' => 1,
        'post_type' => array('post', 'edtalk'),
        'cat' => $category,
        'tax_query' => array(
          array(
            'taxonomy' => 'appearance',
            'field' => 'slug',
            'terms' => 'featured-spotlight'
          )
        ),
        'meta_key' => 'updated_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      ]);

      if ($SLfeatured->have_posts()) : while ($SLfeatured->have_posts()) : $SLfeatured->the_post();?>


      <div class="row-full">
        <h2 class="post-title">article</h2>
        <img class="SL-featured" src=" <?php echo $featured_image; ?> " />
      </div>

      <?php endwhile; endif; wp_reset_query();?>


      <?php
      /*
       * Additional spotlight posts
       *
       * Checks for number of posts to display and modifies layout based on result
       */
      if ($number > 1) {
        $spotlight = new WP_Query([
          'posts_per_page' => $number - 1,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          'offset' => 1,
          'meta_key' => 'updated_date',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        ]);

        $i = 0;
        $o = 0;


        // Loop through posts
        if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();  ?>

        <div class="row-full">
          <h2 class="post-title">article</h2>
        </div>


        <?php endwhile; endif; wp_reset_query();
      }
      ?>
    </div>
  </div>
</section>
