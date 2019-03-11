<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('medium');
?>

<article <?php post_class('spotlight-block-4 clearfix'); ?>>
  <div class="block-content">
    <img class="news-block-image column-img" src="<?php echo $featured_image; ?>" />
    <!-- <p class="small">Spotlight</p> -->
    <h3 class="post-title"><?php the_title(); ?></h3>
    <?php get_template_part('templates/components/entry-meta'); ?>
    <a class="mega-link" href="<?php the_permalink(); ?>" <?php echo the_permalink();?>></a>
    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
  </div>
</article>
