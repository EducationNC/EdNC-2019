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
          <div class="search">
            <form class="searchbox">
              <input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
              <input type="submit" class="searchbox-submit" value="">
              <span class="searchbox-icon">
                <img src="<?php echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
              </span>
            </form>
          </div>
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
                <a class="" target="_blank" href="https://www.facebook.com/educationnc">
                  <img src="<?php echo Assets\asset_path('images/fb-icon.svg'); ?>" width="30" alt="Facebook" /></img>
                </a>
              </div>
              <div class="icon">
                <a class="" target="_blank" href="https://www.instagram.com/educationnc/">
                  <img src="<?php echo Assets\asset_path('images/instagram-icon.svg'); ?>" width="30" alt="Instagram" /></img>
                </a>
              </div>
              <div class="icon">
                <a class="" target="_blank" href="https://twitter.com/share" data-url="<?php// the_permalink(); ?>"
                data-text="<?php// the_title(); ?>" class="" data-via="wpbeginner" data-show-count="false">
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                  <img src="<?php echo Assets\asset_path('images/twitter-icon.svg'); ?>" width="30" alt="Twitter" /></img>
                </a>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
<!-- </div> -->




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
