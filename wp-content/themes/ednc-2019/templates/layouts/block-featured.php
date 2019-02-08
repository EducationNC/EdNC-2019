<?php

use Roots\Sage\Media;
global $featured_ids;
$featured_ids[] = get_the_id();
$featured_image = Media\get_featured_image('medium');

?>

<article <?php post_class(''); ?> >
  <img class="featured-image" src=" <?php echo $featured_image; ?> " />
  <p class="small">Trending</p>
  <h3 class="post-title"><?php the_title(); ?></h3>
  <?php get_template_part('templates/components/entry-meta'); ?>
  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
</article>
