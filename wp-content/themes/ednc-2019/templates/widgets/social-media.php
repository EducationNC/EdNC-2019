<?php

use Roots\Sage\Assets;

?>
<section class="block news">
  <div class="widget-content">
    <?php if( have_rows('social', 'option') ): ?>
      <?php while( have_rows('social', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <h2 class="header-big">
            <?php if ($image){ ?>
              <img class="section-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
            <?php } ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/social.svg'); ?>">
            <?php echo $header ?>
        </h2>
      <?php endwhile; ?>
    <?php endif; ?>

    <div class="content-box-container-social">
      <div class="juicer">
        <script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
        <link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
        <ul class="juicer-feed" data-feed-id="educationnc" data-pages="" data-per="" data-truncate="300" data-columns="4">
          <h1 class="referral"><a href="http://www.juicer.io">Powered by Juicer</a></h1>
        </ul>


        <!-- <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
        <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
        <ul class="juicer-feed" data-feed-id="educationnc" data-truncate="300" data-columns="4">
          <h1 class="referral"><a href="http://www.juicer.io">Powered by Juicer</a></h1>
        </ul> -->
      </div>

    </div>
  </div>
</section>
