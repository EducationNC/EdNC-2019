<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<?php// echo the_permalink();  ?>



<div class="top-nav-article-outer">
  <header class="header">
    <div class="top-nav-article">
       <div class="flex-1">
        <div class="menu-btn">
           <a class="btn-open" href="javascript:void(0)"></a>
        </div>
        <!-- <div class="search">
          <form name="search" class="searchbox" role="search" method="get" action="<?php// echo esc_url(home_url( '/' )); ?>">
            <input type="search" value="<?php// the_search_query(); ?>" placeholder="Search..." name="s" id="searchbox-input" class="searchbox-input" required>
            <input type="submit" class="searchbox-submit" value="">
            <span class="searchbox-icon">
              <img src="<?php// echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
            </span>
          </form>
        </div> -->
      </div>
      <div class="flex-2">
        <div class="header-logos">
          <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="main-logo-article" id="main-logo-article" src="<?php echo Assets\asset_path('images/EdNC-stamp-purple.png'); ?>" alt="EdNC" /></img>
          </a>
          <p class="header-title small hide"><?php echo get_the_title(); ?></p>
        </div>
      </div>
      <div class="flex-3">
        <div class="social">
            <div class="icon">
              <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
              <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" title="Share" class="fb-share-button" target="_blank">
                <img src="<?php echo Assets\asset_path('images/fb-icon.svg'); ?>" width="30" alt="Facebook" /></img>
              </a>
            </div>
            <div class="icon">
              <a title="Tweet" target="_blank" href="https://twitter.com/share?url=&text=<?php the_title(); ?>: <?php echo urlencode(get_permalink($post->ID)); ?> &via=YOUR-TWITTER-USERNAME&count=horizontal">
                <img src="<?php echo Assets\asset_path('images/twitter-icon.svg'); ?>" width="30" alt="Twitter" /></img>
              </a>
            </div>
            <div class="icon">
              <a class="" target="_blank" href="mailto:someone@yoursite.com?subject=A%20Friend%20Has%20Shared%20An%20Article%20with%20You%20from%20EdNC">
                <img src="<?php echo Assets\asset_path('images/email.svg'); ?>" width="30" alt="Email" /></img>
              </a>
            </div>
        </div>
      </div>
    </div>
  </header>
</div>


<div class="overlay">
   <div class="menu">
         <?php
         wp_nav_menu(array(
           'theme_location' => 'primary_navigation',
           // 'container' => false,
           // 'menu_class' => 'nav navbar-nav',
           // 'walker' => new Nav\Widgets_Nav_Walker()
         ));
         ?>
           <!-- <li><a href="#">Services</a>
               <ul>
                   <li><a href="#">Web design</a></li>
                   <li><a href="#">Development</a></li>
                   <li><a href="#">Apps</a></li>
                   <li><a href="#">Graphic Design</a></li>
                   <li><a href="#">Seo</a></li>
               </ul>
           </li> -->
   </div>
</div>
