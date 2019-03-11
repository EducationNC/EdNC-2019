<?php use Roots\Sage\Titles; ?>

<?php
// Check if coauthors plugin is enabled
if ( function_exists( 'get_coauthors' ) ) {
  $coauthors = get_coauthors();
  //print_r ($coauthors);
  //echo $coauthors->display_name;
  echo $coauthors_count = count($coauthors);
  foreach ($coauthors as $author) {
    $args = array(
      'post_type' => 'bio',
      'meta_query' => array(
        array(
          'key' => 'user',
          'value' => $author->ID
        )
      )
    );
    print_r ($author);



    $bio = new WP_Query($args);

    if ($bio->have_posts()) : while ($bio->have_posts()) : $bio->the_post(); ?>
      <div class="row bio">
        <div class="col-xs-12 col-md-12">
          <?php
            if ($coauthors_count > 1) { ?>
              <?php $authorslist = array(); ?>
              <?php $authorslist[] = $author->display_name; ?>
              <?php// print_r ($authorslist); ?>
              <div class="author-article">
                <div class="margin-none"><p>By:</p>
                  <a href="<?php the_permalink(); ?>" class="read-more"><p><?php  ?></p></a>
                </div>
              </div>
            <?php } else { ?>
              <div class="circle-image-article">
                <?php the_post_thumbnail('bio-headshot'); ?>
              </div>
              <div class="author-article">
                <div class="margin-none"><p>By:</p>
                  <a href="<?php the_permalink(); ?>" class="read-more"><p><?= Titles\title(); ?></p></a>
                  <?php
                  $twitter = get_field('twitter');
                  $email = get_field('email');
                  $website = get_field('website');
                  if ($twitter) {
                    echo '<div class="inline"> <a href="http://twitter.com/' . $twitter . '" target="_blank"><span class="big-icon icon-twitter"></span></a></div>';
                  }
                  ?>
                </div>
              <?php } ?>
              <?php endwhile; endif; wp_reset_query();?>
              <?php } ?>
              <time class="published pf-date" datetime="<?php echo get_the_time('c'); ?>">
                <?php the_time(get_option('date_format')); ?>
              </time>
            </div>
        </div>
      </div>


<?php } else {
  // Fallback for no coauthors plugin
  $args = array(
    'post_type' => 'bio',
    'meta_query' => array(
      array(
        'key' => 'user',
        'value' => $author_id
      )
    )
  );
  $bio = new WP_Query($args);
  if ($bio->have_posts()) : while ($bio->have_posts()) : $bio->the_post(); ?>
    <div class="row">
      <div class="col-xs-3 col-sm-4 col-md-12">
        <?php the_post_thumbnail('bio-headshot'); ?>
      </div>
      <div class="col-xs-9 col-sm-8 col-md-12">
        <?php get_template_part('templates/components/author', 'excerpt'); ?>
      </div>
    </div>
  <?php endwhile; endif; wp_reset_query();
}
