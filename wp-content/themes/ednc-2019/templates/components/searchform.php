<!-- <form class="searchbox" action="<?php// echo esc_url(home_url( '/' )); ?>">
  <input type="search"  value="<?php// echo get_search_query(); ?>" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
  <input type="submit" class="searchbox-submit" value="">
  <span class="searchbox-icon">
    <img src="<?php// echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
  </span>
</form> -->

<form action="/" method="get">
    <label for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>
