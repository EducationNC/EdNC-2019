<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>
<div class="top-nav-outer">
  <header class="header">
    <div class="top-nav">
      <div class="flex-1">
        <div class="menu-btn">
           <a class="btn-open" href="javascript:void(0)"></a>
        </div>
      </div>
      <div class="flex-2">
        <div class="header-logos">
          <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="main-logo" src="<?php echo Assets\asset_path('images/EdNC-stamp-purple.png'); ?>" alt="EdNC" /></img>
         </a>
          <!-- <div class="secondary-logos full-screen">
            <a class="secondary-logo" target="_blank" href="https://nccppr.org/">
              <img class="secondary-logo-img" src="<?php// echo Assets\asset_path('images/NCCPPR-logo-long.svg'); ?>"></img>
            </a>
            <a class="secondary-logo" target="_blank" href="https://www.firstvotenc.org/">
              <img class="secondary-logo-img" src="<?php// echo Assets\asset_path('images/FirstVoteNC-stamp-purple.png'); ?>"></img>
            </a>
            <a class="secondary-logo" target="_blank" href="https://www.reachncvoices.org/">
              <img class="secondary-logo-img" src="<?php// echo Assets\asset_path('images/ReachNCVoices-stamp-purple.png'); ?>"></img>
            </a>
          </div> -->
        </div>
      </div>
      <div class="flex-3">
        <div class="social">
            <div class="search">
              <form name="search" class="searchbox" role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="search" value="<?php the_search_query(); ?>" placeholder="Search..." name="s" id="searchbox-input" class="searchbox-input" required>
                <input type="submit" class="searchbox-submit" value="">
                <span class="searchbox-icon">
                  <img src="<?php echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
                </span>
              </form>
            </div>
            <div class="icon">
              <a class="" target="_blank" href="https://www.facebook.com/educationnc">
                <img src="<?php echo Assets\asset_path('images/fb-icon.svg'); ?>" width="" alt="Facebook" /></img>
              </a>
            </div>
            <div class="icon">
              <a class="" target="_blank" href="https://www.instagram.com/educationnc/">
                <img src="<?php echo Assets\asset_path('images/instagram-icon.svg'); ?>" width="" alt="Instagram" /></img>
              </a>
            </div>
            <div class="icon">
              <a class="" target="_blank" href="https://twitter.com/educationnc">
                <img src="<?php echo Assets\asset_path('images/twitter-icon.svg'); ?>" width="" alt="Twitter" /></img>
              </a>
          </div>
        </div>
      </div>
      <div class="second">
        <div class="secondary-logos full-screen">
          <a class="secondary-logo" target="_blank" href="https://nccppr.org/">
            <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/NCCPPR-logo-long.svg'); ?>"></img>
          </a>
          <a class="secondary-logo" target="_blank" href="https://www.firstvotenc.org/">
            <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/FirstVoteNC-stamp-purple.png'); ?>"></img>
          </a>
          <a class="secondary-logo" target="_blank" href="https://www.reachncvoices.org/">
            <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/ReachNCVoices-stamp-purple.png'); ?>"></img>
          </a>
        </div>
      </div>
        <!-- <div class="search-mobile mobile-only">
            <a class="" target="_blank" href="https://twitter.com/educationnc">
              <img src="<?php// echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
            </a>
        </div> -->
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
