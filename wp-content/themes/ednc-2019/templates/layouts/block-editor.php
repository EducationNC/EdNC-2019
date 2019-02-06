<?php

use Roots\Sage\Media;

?>

<article <?php post_class('block-editor clearfix'); ?> >

  <!-- <div class="flex"> -->
  <?php// if (has_term('news', 'appearance')) { ?>
    <a class="" href="<?php the_permalink(); ?>"></a>
    <div class="block-content">
      <h3 class="editor"><?php the_title(); ?></h3>
      <a class="mega-link" href="<?php the_permalink(); ?>" <?php echo the_permalink();?>></a>
    </div>
  <?php// } ?>

  <!-- </div> -->
</article>
<hr class="break">
