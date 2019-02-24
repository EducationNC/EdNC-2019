<?php
$twitter = get_field('twitter');
$email = get_field('email');
$website = get_field('website');
$author = get_the_author();

if (get_field('has_bio_page') == 1) { ?>
  <div class="inline-block">
    <?php// the_advanced_excerpt(); ?>
    <h3 class="post-title-recent inline-block">By:<a href="<?php// the_permalink(); ?>" class="read-more"> <?php //echo $author ?></a></h3>
  </div>
<?php } else { ?>
  <div>
    <?php the_content(); ?>
  </div>
<?php }

if ($email) {
  echo '<div class="nowrap overflow-ellipsis inline-block"><a href="mailto:' . antispambot($email) . '" target="_blank"><span class="big icon-email"></span></a></div>';
}

if ($twitter) {
  echo '<div class="nowrap overflow-ellipsis inline-block"> <a href="http://twitter.com/' . $twitter . '" target="_blank"><span class="big icon-twitter"></span></a></div>';
}

if ($website) {
  echo '<div class="nowrap overflow-ellipsis inline-block"> <a href="' . $website . '" target="_blank"><span class="big icon-website"></span></a></div>';
}
?>
