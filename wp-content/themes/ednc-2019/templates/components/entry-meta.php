<p class="byline author vcard">
  by
  <?php
  // $author = get_the_author();
  // echo $author;
  // $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
  // echo   $author_bio;
  if ( function_exists( 'coauthors_posts_links' ) ) {
    coauthors_posts_links();
  } else {
    the_author_posts_link();
  }
  ?>
  |
  <time class="published pf-date" datetime="<?php echo get_the_time('c'); ?>">
    <?php the_time(get_option('date_format')); ?>
  </time>
</p>
