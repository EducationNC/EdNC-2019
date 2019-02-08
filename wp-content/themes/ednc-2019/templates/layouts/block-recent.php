<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$featured_image = Media\get_featured_image('medium');


$column = wp_get_post_terms(get_the_id(), 'column');
if ($column) {
  // $link = get_term_link($column[0]);
  $post_type = $column[0]->name;
  // echo '<span class="label"><a href="' . $link . '">' . $column[0]->name. '</a></span> ';
}  elseif ($post->post_type == 'post') {
   $post_type = "News";
}
elseif ($post->post_type == 'edtalk') {
  $post_type = "EdTalk";
}
else ($post->post_type == 'map') {
  $post_type = "Maps"
}

?>

<article <?php post_class('block-recent content-block-recent clearfix'); ?>>
  <div class="block-content">
    <img class="recent-block-image" src="<?php echo $featured_image; ?>" />
    <p class="small"><?php echo $post_type ?></p>
    <h3 class="post-title-recent"><?php the_title(); ?></h3>
    <?php get_template_part('templates/components/entry-meta-small'); ?>
    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  </div>
</article>
