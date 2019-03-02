<?php

use Roots\Sage\Resize;
use Roots\Sage\Media;
use Roots\Sage\Assets;

// Number of posts to show
// $features_n = $instance['features_n'];
// $news_n = $instance['news_n'];

// Set up variable to catch featured post ids -- we will exclude these ids from news query
$featured_ids = array();
global $featured;
$recent_ids = array();
global $featured_recent;
?>

<section class="block features">
  <div class="widget-content">
    <div class="features-box">
      <div class="editors">
        <div class="editors-box">
          <div class="editors-content-box">
            <?php if( have_rows('editors_picks', 'option') ): ?>
              <?php while( have_rows('editors_picks', 'option') ): the_row(); ?>
                <?php $header = get_sub_field('header'); ?>
                <?php $image = get_sub_field('image'); ?>
                <h2 class="header">
                    <?php if ($image){ ?>
                      <img class="section-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php } ?>
                    <?php echo $header ?>
                </h2>
              <?php endwhile; ?>
            <?php endif; ?>
            <img class="mebane-pic" src="<?php echo Assets\asset_path('images/Mebane_Rash-220x220newest.png'); ?>" width="" alt="Mebane" />
            <hr class="break">
              <?php
              // Show 8 most news
              $ednews = new WP_Query([
                'post_type' => 'ednews',
                'posts_per_page' => 1
              ]);



              if ($ednews->have_posts()) : while ($ednews->have_posts()) : $ednews->the_post();?>

                  <?php $feature = get_field('featured_read');
                  $date = get_the_time('F j, Y');?>

                  <article <?php post_class('block-editor ednews clearfix'); ?> >
                    <div class="block-content featured-ednews">
                      <p class="small lato editor">FEATURED PICK</p>
                      <p class="small lato editor"><?php echo $feature[0]['source']; ?></p>
                      <h3 class="editor"><?php echo $feature[0]['title']; ?></h3>
                      <h3 class="editor"><?php// echo $date ?></h3>
                      <h3 class="editor"><?php echo $feature[0]['original_date']; ?></h3>
                      <a class="mega-link" href="<?php echo $feature['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
                    </div>
                  </article>
                  <hr class="break">

                  <?php
                  $date = get_the_time('F j, Y');
                  $ednewsall = get_field('news_item');
                  $count = count($ednewsall);
                  // $item = $items[$i];
                  // echo $count;
                  $items = array_slice($ednewsall, 0, 3);


                  foreach ($items as $item) {?>
                    <article <?php post_class('block-editor ednews clearfix'); ?> >
                      <?php// print_r($item) ?>
                      <p class="small lato editor"><?php echo $item['source']; ?></p>
                      <h3 class="editor"><?php echo $item['title']; ?></h3>
                      <h3 class="editor"><?php// echo $item[$date] ?></h3>
                      <h3 class="editor"><?php echo $item['original_date']; ?></h3>
                      <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
                    </article>
                    <hr class="break">
                  <?php } ?>

                  <a class="more" href="<?php the_permalink(); ?>">
                    <button class="btn">Read More</button>
                  </a>

            <?php endwhile; endif; wp_reset_query(); ?>

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
            'post_type' => array('post', 'map', 'edtalk'),
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
            $featured_ids[] = get_the_id();
            get_template_part('templates/layouts/block', 'featured'); ?>

        <?php  endwhile; endif; wp_reset_query(); ?>

        </div>
      </div>


      <div class="recent">
        <div class="recent-content">
          <div class="recent-content-box">
            <?php if( have_rows('recent', 'option') ): ?>
              <?php while( have_rows('recent', 'option') ): the_row(); ?>
                <?php $header = get_sub_field('header'); ?>
                <?php $image = get_sub_field('image'); ?>
                <h2 class="header">
                    <?php if ($image){ ?>
                      <img class="section-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php } ?>
                    <?php echo $header ?>
                </h2>
              <?php endwhile; ?>
            <?php endif; ?>
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
                    'terms'    => array('news'),
                  ),
                ),
                'meta_key' => 'updated_date',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
              ]);

              if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post();


                global $recent_ids;

                $recent_ids[] = get_the_id();
                $featured_recent = array_merge($featured_ids, $recent_ids);

                get_template_part('templates/layouts/block', 'recent'); ?>

                <?php
                // $n++;

              endwhile; endif; wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
