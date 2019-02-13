<?php

use Roots\Sage\Media;



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
      <!-- <img class="bg-img" src="<?php// echo Assets\asset_path('images/z-smith-reynolds-foundation.png'); ?>" width="153" alt="Z. Smith Reynolds Foundation" /> -->
      <p class="small lato editor"><?php echo $item['source_name']; ?></p>
      <h3 class="editor"><?php echo $item['title']; ?></h3>
      <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
    </div>
  <!-- </div> -->
</article>
<hr class="break">
