<p class="byline author vcard">
  by
  <?php
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
