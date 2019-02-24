<?php

use Roots\Sage\Media;
use Roots\Sage\Assets;



$date = get_the_time('n/j/Y');
$items = get_field('news_item');

$i = 0;
$limit = 4;
$count = count($items);
$item = $items[$i];

$field = get_field_object('source');
$value = $field['value'];
$label = $field['choices'][ $value ];

?>

<article <?php post_class('block-editor clearfix'); ?> >
  <div class="block-content">
    <p class="small lato editor"><?php echo $label ?>
    </p>
    <h3 class="editor"><?php echo $item['title']; ?></h3>
    <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
  </div>
</article>
<hr class="break">
