<?php

use Roots\Sage\Media;
use Roots\Sage\Assets;



$date = get_the_time('n/j/Y');
$items = get_field('news_item');

$i = 0;
$limit = 4;
$count = count($items);
$item = $items[$i];

?>

<article <?php post_class('block-editor clearfix'); ?> >
  <!-- <div class="flex"> -->
    <div class="block-content">
      <!-- <img class="bg-img" src="<?php// echo Assets\asset_path('images/charlotte-observer.png'); ?>" width="100" alt="" /> -->
      <p class="small lato editor">
        <img class="favicon"
        src="https://www.google.com/s2/favicons?domain=https%3A//www.insidehighered.com/news/2019/02/14/democratic-contenders-higher-ed-positions-go-well-beyond-free-college"
        width="" alt="" /><?php echo $item['source_name']; ?></p>
      <h3 class="editor"><?php echo $item['title']; ?></h3>
      <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
    </div>
  <!-- </div> -->
</article>
<hr class="break">
