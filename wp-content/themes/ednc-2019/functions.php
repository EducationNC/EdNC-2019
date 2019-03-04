<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/setup.php',              // Theme setup
  'lib/assets.php',             // Scripts and stylesheets
  'lib/admin.php',              // WP-Admin customizations
  'lib/custom-post-types.php',  // Custom post types and custom taxonomies
  'lib/acf-fields.php',         // ACF custom fields
  'lib/custom-pub-date.php',    // Add custom field for updated date
  'lib/extras.php',             // Custom functions
  'lib/facebook-auth.php',      // Facebook auth - PRIVATE
  'lib/feeds.php',              // Custom RSS feeds
  'lib/gutenburg-blocks.php',   // Gutenburg Customization
  'lib/media.php',              // Image and other media functions
  'lib/resize.php',             // Magic image resizer
  'lib/shortcodes.php',         // Shortcodes and UI
  'lib/titles.php',             // Page titles
  'lib/nav.php',                // Clean up nav menus
  'lib/nav-data-dashboard.php', // Data dashboard nav walker
  'lib/nav-widgets.php',        // Widgetize nav menus
  'lib/wrapper.php',            // Theme wrapper class
  'lib/customizer.php',         // Theme customizer
  'lib/widgets/register.php',   // Register widgets
  'lib/social-share-count.php'  // Social share counts
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/*ADMIN DASHBOARD CSS*/
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


/*ADMIN DASHBOARD AUTO SELECT TAXONOMY*/
function set_default_object_terms( $post_id, $post ) {
	if ( 'publish' === $post->post_status && $post->post_type === 'reach-nc-poll' ) {
		$defaults = array(
			'column' => array( 'Reach NC Polls' )
			);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'set_default_object_terms', 0, 2 );

function posts_orderby_lastname ($orderby_statement)
{
	$orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}


function my_recent_posts_shortcode($atts){
	 ob_start();
	$a = shortcode_atts( array(
		'item' => 'item',
	), $atts );


	 $q = new WP_Query(
	   array( 'orderby' => 'date', 'posts_per_page' => $a['item'],)
	 );


	while($q->have_posts()) : $q->the_post();

		 get_template_part('templates/layouts/block', 'post-shortcode');

	endwhile;

	wp_reset_query();


	$output = ob_get_clean();  return $output;
}

add_shortcode('recent-posts', 'my_recent_posts_shortcode');

/* LIMIT EXCERPT LENGTH */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...'; // replace the normal [.....] with a empty string
 }
 add_filter('excerpt_more', 'new_excerpt_more');

//exclude private
add_filter( 'pre_get_posts', 'exclude_private_post' );
function exclude_private_post( $query ) {
		$excluded_ids  = array();
		$id;

    if ( !is_user_logged_in() && ($query->is_search() || $query->is_main_query()) ) {

		/*
        $query->set( 'post_type', array( 'reach-nc-poll' ) );
        $query->set( 'meta_query', array(
			'relation'		=> 'OR',
            array(
				'key'	 	=> 'reach_privacy',
				'value'	  	=> 'Public',
				'compare' 	=> 'LIKE',
            ),
			array(
				'key'		=> 'reach_privacy',
				'value'		=> 'Featured',
				'compare'	=> 'LIKE'
			)
        ) );

		$args = array( 'post_type' => 'reach-nc-poll', 'meta_key' => 'reach_privacy', 'meta_value'	=> 'Private');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			$excluded_ids[] = get_the_ID() ;
		endwhile;
		$query->set( 'post__not_in',$excluded_ids );
		*/
    }
    else if ( is_user_logged_in() && ($query->is_search() || $query->is_main_query()) ) {

		/*
        $query->set( 'post_type', array( 'reach-nc-poll' ) );
        $query->set( 'meta_query', array(
			'relation'		=> 'OR',
            array(
				'key'	 	=> 'reach_privacy',
				'value'	  	=> 'Public',
				'compare' 	=> 'LIKE',
            ),
			array(
				'key'		=> 'reach_privacy',
				'value'		=> 'Featured',
				'compare'	=> 'LIKE'
			),
			array(
				'key'		=> 'reach_privacy',
				'value'		=> 'Private',
				'compare'	=> 'LIKE'
			)
        ) );
		DO NOTHING
		*/
    }

    return $query;
}


function basic_wp_seo() {
	global $post;
	// $default_keywords = 'wordpress, plugins, themes, design, dev, development, security, htaccess, apache, php, sql, html, css, jquery, javascript, tutorials'; // customize
	$output = '';
 	// keywords
	$keys = get_post_meta($post->ID, 'mm_seo_keywords', true);
	$cats = get_the_category();
	$tags = get_the_tags();
  $terms = get_the_terms( $post->ID , 'appearance' );
	if (empty($keys)) {
		if (!empty($cats)) foreach($cats as $cat) $keys .= $cat->name . ', ';
    if (!empty($terms)) foreach($terms as $term) $keys .= $term->name . ', ';
		// $keys .= $default_keywords;
	}
	$output .= "\t\t" . '<meta name="categories" content="' . esc_attr($keys) . '">' . "\n";
 	return $output;
}

function add_author_meta() {
     if (is_single()){
        global $post;
        $author = get_the_author_meta('display_name', $post->post_author);
        echo "<meta name=\"author\" content=\"$author\">";
    }
}

// add_action( 'wp_enqueue_scripts', 'add_author_meta' );

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

/**
 * Gutenberg scripts and styles
 */

function be_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor',
		get_stylesheet_directory_uri() . '/assets/scripts/editor.js',
		array( 'wp-blocks', 'wp-dom' ),
		filemtime( get_stylesheet_directory() . '/assets/scripts/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );

function gutenberg_boilerplate_block() {
    wp_register_script(
        'gutenberg-boilerplate-es5-step01',
        plugins_url( 'step-01/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );

    register_block_type( 'gutenberg-boilerplate-es5/hello-world-step-01', array(
        'editor_script' => 'gutenberg-boilerplate-es5-step01',
    ) );
}
add_action( 'init', 'gutenberg_boilerplate_block' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Page Settings',
		'menu_title'	=> 'Home Page',
		'parent_slug'	=> 'theme-general-settings',
	));

}

//CHANGE URL FOR SEARCH

function wpb_change_search_url() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'wpb_change_search_url' );

/*
function be_register_blocks() {
	if( ! function_exists('acf_register_block') )
		return;
	acf_register_block( array(
		'name'			=> 'Pull-Quote-ACF',
		'title'			=> __( 'Pull Quote', 'gutenberg-pull-quote-acf-example' ),
		'render_template'	=> 'components/pull-quote.php',
		'category'		=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'keywords'		=> array( 'pull quote', 'quote', 'acf' )
	));
}
add_action('acf/init', 'be_register_blocks' );*/
