<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$featured_image = Media\get_featured_image('medium');
$featured_image = Media\get_featured_image('medium');

$column = wp_get_post_terms(get_the_id(), 'column');
if ($column) {
  $post_type = $column[0]->name;
}
elseif ( has_term( 'press-release', 'appearance' ) ) {
  $post_type = "Press Release";
}
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
  <?php if (has_term('', 'column')) { ?>
    <a class="" href="<?php the_permalink(); ?>"></a>
    <div class="block-content">
      <img class="news-block-image column-img" src="<?php echo $featured_image; ?>" />
      <p class="small"><?php echo $term->name ?></p>
      <h3 class="post-title"><?php the_title(); ?></h3>
      <?php get_template_part('templates/components/entry-meta'); ?>
      <a class="mega-link" href="<?php the_permalink(); ?>" <?php echo the_permalink();?>></a>
      <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
    </div>
  <?php } ?>
  </div>
</article>
