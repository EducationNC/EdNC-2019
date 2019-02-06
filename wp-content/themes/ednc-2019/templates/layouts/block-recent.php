<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
// $author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');
// $post_type = get_post_type( $post->ID );
// $term = get_queried_object()->term_id;

if ($post->post_type == 'post') {
  $post_type = "News";
}
elseif ($post->post_type == 'post' AND $term == 'column') {
  $post_type = "Col";
}
elseif ($post->post_type == 'edtalk') {
  $post_type = "EdTalk";
}
elseif ($post->post_type == 'map') {
  $post_type = "Maps";
}
$featured_image = Media\get_featured_image('medium');

?>

<article <?php post_class('block-recent content-block-recent clearfix'); ?>>

  <!-- <div class="flex"> -->
    <div class="block-content">
      <img class="recent-block-image" src="<?php echo $featured_image; ?>" />
      <p class="small"><?php echo $post_type ?></p>
      <h3 class="post-title-recent"><?php the_title(); ?></h3>
      <a class="mega-link" href="<?php the_permalink(); ?>"></a>
    </div>
  <!-- </div> -->
</article>
