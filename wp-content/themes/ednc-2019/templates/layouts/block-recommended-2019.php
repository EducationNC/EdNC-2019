<?php

use Roots\Sage\Extras;
use Roots\Sage\Media;

$posts = get_field('recommended-articles-2019');

?>

<?php
if (!empty($posts)) : ?>
  <div class="recommended-blocks">
      <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
          <?php $featured_image = Media\get_featured_image('medium');
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
          <div class="block-recommended">
            <a href="<?php the_permalink(); ?>">
              <?php if (!empty($featured_image)) {
                echo '<img class="news-block-image" src="' . $featured_image . '" />';
              } ?>
              <p class="small"><?php echo $post_type ?></p>
              <h3 class="post-title"><?php the_title(); ?></h3>
              <?php get_template_part('templates/components/entry-meta'); ?>
              <!-- <a class="mega-link" href="<?php the_permalink(); ?>"></a> -->
            </a>
          </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  </div>
<?php
else:
$post = Extras\get_adjacent_author_post(true); ?>
<div class="row">
    <div class="col-md-7 col-md-push-2point5 recommended-block">
      <?php setup_postdata($post); ?>
      <div class="block-recommended">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <span>Custom field from $post: <?php the_field('author'); ?></span>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  </div>
</div>
<?php endif;





?>
