<?php

use Roots\Sage\Assets;

?>

<div class="logo-section">
  <div class="logos-large">
    <?php if( have_rows('large_logo', 'option') ): ?>
      <?php while( have_rows('large_logo', 'option') ): the_row(); ?>
        <?php $large_logo = get_sub_field('large_logos');      ?>
          <div class="logo">
            <?php if ($large_logo){ ?>
              <img class="" src="<?php echo $large_logo['url']; ?>" alt="<?php echo $large_logo['alt'] ?>" />
            <?php } ?>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="logos">
    <?php if( have_rows('small_logo', 'option') ): ?>
      <?php while( have_rows('small_logo', 'option') ): the_row(); ?>
        <?php $small_logo = get_sub_field('small_logos');  ?>
          <div class="logo">
            <?php if ($small_logo){ ?>
              <img class="" src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt'] ?>" />
            <?php } ?>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
