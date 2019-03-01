<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
// $author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('medium');

?>

<article <?php post_class('block-news content-block-4 clearfix'); ?>>

  <div class="flex">
  <?php if (has_term('news', 'appearance')) { ?>
    <div class="block-content">
      <?php if (!empty($featured_image)) { ?>
        <img class="news-block-image column-img" src="<?php echo $featured_image; ?>" />
      <?php } else { ?>
        <div class="circle-image">
          <?php echo $author_pic; ?>
        </div>
      <?php } ?>
      <!-- <img class="news-block-image" src="<?php// echo $featured_image; ?>" /> -->
      <p class="small">News</p>
      <h3 class="post-title"><?php the_title(); ?></h3>
      <?php get_template_part('templates/components/entry-meta'); ?>
      <a class="mega-link" href="<?php the_permalink(); ?>"></a>
      <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
    </div>
  <?php } ?>

  </div>
</article>
