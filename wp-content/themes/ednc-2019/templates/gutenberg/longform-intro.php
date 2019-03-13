<?php
 /**
  * Team Member block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/
 $longformintro = get_field( 'longform-intro' );

echo '<div class="longformintro">';
  echo '<div class="longformintro--content">' . apply_filters( 'ea_the_content',   $longformintro ) . '</div>';
echo '</div>';
