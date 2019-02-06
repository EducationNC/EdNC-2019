<section class="block ads">
  <div class="widget-content">
    <h2 class="content-header">Ads -3</h2>
    <div class="content-box-container">
      <div class="block-perspectives content-block-3">
        	<img src="<?php echo  $ad_block_1 ; ?>">
      </div>
      <div class="block-perspectives content-block-3">
        <?php
        $image = get_field('ad_block_2');
        if( !empty($image) ): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
      </div>
      <div class="block-perspectives content-block-3">
        <h2 class="content-header">3</h2>
      </div>
    </div>
  </div>
</section>
