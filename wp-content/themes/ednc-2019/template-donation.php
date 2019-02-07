<?php
/*
 * Template Name: Headers, Logos
 * Template Post Type: page, product
 */
?>

<?php

// check if the repeater field has rows of data
if( have_rows('logos') ):

 	// loop through the rows of data
    while ( have_rows('logos') ) : the_row();

        // display a sub field value
        the_sub_field('logo');

    endwhile;

else :

    // no rows found

endif;

?>
