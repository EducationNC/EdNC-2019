<?php


/**
 * Register Blocks
 * @see https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 *
 */


 function ea_disable_editor( $id = false ) {

 	$excluded_templates = array(
 		'templates/layouts/content-single.php',
 	);

 	$excluded_ids = array(
 		// get_option( 'page_on_front' )
 	);

 	if( empty( $id ) )
 		return false;

 	$id = intval( $id );
 	$template = get_page_template_slug( $id );

 	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
 }

 /**
  * Disable Gutenberg by template
  *
  */
 function ea_disable_gutenberg( $can_edit, $post_type ) {

 	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
 		return $can_edit;

 	if( ea_disable_editor( $_GET['post'] ) )
 		$can_edit = false;

 	return $can_edit;

 }
 add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
 add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

 /**
  * Disable Classic Editor by template
  *
  */
 function ea_disable_classic_editor() {

 	$screen = get_current_screen();
 	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
 		return;

 	if( ea_disable_editor( $_GET['post'] ) ) {
 		remove_post_type_support( 'page', 'editor' );
 	}

 }
 add_action( 'admin_head', 'ea_disable_classic_editor' );



function be_register_blocks() {
	if( ! function_exists('acf_register_block') )
		return;
	acf_register_block( array(
		'name'			=> 'team-member',
		'title'			=> __( 'Team Member', 'clientname' ),
		'render_template'	=> 'templates/gutenberg/hero.php',
		'category'		=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'keywords'		=> array( 'profile', 'user', 'author' )
	));
  acf_register_block( array(
    'name'			=> 'block-quote',
    'title'			=> __( 'Block-Quote', 'clientname' ),
    'render_template'	=> 'templates/gutenberg/block-quote.php',
    'category'		=> 'formatting',
    'icon'			=> 'admin-users',
    'mode'			=> 'preview',
    'keywords'		=> array( 'blockquote', 'quote', 'block-quote' )
  ));
  acf_register_block( array(
    'name'			=> 'longform-intro',
    'title'			=> __( 'LongForm Intro', 'clientname' ),
    'render_template'	=> 'templates/gutenberg/longform-intro.php',
    'category'		=> 'formatting',
    'icon'			=> 'admin-users',
    'mode'			=> 'preview',
    'keywords'		=> array( 'longform', 'intro', 'long-form' )
  ));
}

add_action('acf/init', 'be_register_blocks' );




function tabor_gutenberg_color_palette() {
  add_theme_support( 'align-wide' );
  add_theme_support('editor-styles');
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Light-blue', '@@textdomain' ),
				'slug' => 'light-blue',
				'color' => '#5CADD6',
			),
			array(
				'name'  => esc_html__( 'Med-Blue', '@@textdomain' ),
				'slug' => 'med-blue',
				'color' => '#3399CC',
			),
      array(
        'name'  => esc_html__( 'blueish', '@@textdomain' ),
        'slug' => 'blueish',
        'color' => '#4E6CA5',
      ),
      array(
        'name'  => esc_html__( 'Blue', '@@textdomain' ),
        'slug' => 'blue',
        'color' => '#384E77',
      ),
      array(
        'name'  => esc_html__( 'Dark-Blue', '@@textdomain' ),
        'slug' => 'dark-blue',
        'color' => '#25283D',
      ),
      array(
        'name'  => esc_html__( 'Light-Orange', '@@textdomain' ),
        'slug' => 'light-orange',
        'color' => '#F6B042',
      ),
      array(
        'name'  => esc_html__( 'Orange', '@@textdomain' ),
        'slug' => 'orange',
        'color' => '#F49C11',
      ),
      array(
        'name'  => esc_html__( 'Pink', '@@textdomain' ),
        'slug' => 'pink',
        'color' => '#EC6A56',
      ),
      array(
        'name'  => esc_html__( 'Red', '@@textdomain' ),
        'slug' => 'red',
        'color' => '#E94F37',
      ),
      array(
        'name'  => esc_html__( 'Yellow', '@@textdomain' ),
        'slug' => 'yellow',
        'color' => '#FFD700',
      ),
      array(
        'name'  => esc_html__( 'Light-Green', '@@textdomain' ),
        'slug' => 'light-green',
        'color' => '#B0C05E',
      ),
      array(
        'name'  => esc_html__( 'Green', '@@textdomain' ),
        'slug' => 'green',
        'color' => '#98A942',
      ),
      array(
        'name'  => esc_html__( 'Light-Gray', '@@textdomain' ),
        'slug' => 'light-gray',
        'color' => '#DCDFE5',
      ),
      array(
        'name'  => esc_html__( 'Medium-Gray', '@@textdomain' ),
        'slug' => 'medium-gray',
        'color' => '#777A80',
      ),
      array(
        'name'  => esc_html__( 'Dark-Gray', '@@textdomain' ),
        'slug' => 'dark-gray',
        'color' => '#44474D',
      ),
      array(
        'name'  => esc_html__( 'Black', '@@textdomain' ),
        'slug' => 'black',
        'color' => '#12151',
      ),
      array(
        'name'  => esc_html__( 'Light-Purple', '@@textdomain' ),
        'slug' => 'light-purple',
        'color' => '#901969',
      ),
      array(
        'name'  => esc_html__( 'Purple', '@@textdomain' ),
        'slug' => 'purple',
        'color' => '#731454',
      ),
      array(
        'name'  => esc_html__( 'Dark-Purple', '@@textdomain' ),
        'slug' => 'dark-purple',
        'color' => '#5C1043',
      ),
      array(
        'name'  => esc_html__( 'White', '@@textdomain' ),
        'slug' => 'white',
        'color' => '#FFFFFF',
      )
		)
	);
}
add_action( 'after_setup_theme', 'tabor_gutenberg_color_palette' );
