<?php
 /**
  * Team Member block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/
 $block_quote = get_field( 'block-quote' );

echo '<div class="block-quote">';
  echo '<div class="block-quote--content">' . apply_filters( 'ea_the_content',  $block_quote ) . '</div>';
  //if( !empty( $block_quote ) )
    //echo '<h4>' . esc_html( $block_quote ) . '</h4>';
echo '</div>';
