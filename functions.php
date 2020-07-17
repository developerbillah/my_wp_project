<?php
/**
 * E Sawdagor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package E_Sawdagor
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'esawdagor_setup' ) ) :

	function esawdagor_setup() {

		load_theme_textdomain( 'esawdagor', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-menu' => esc_html__( 'Top Menu', 'esawdagor' ),
				'main-menu' => esc_html__( 'Main Menu', 'esawdagor' ),
				'sitebar-category' => esc_html__( 'Sidebar Category', 'esawdagor' ),
			)
		);


		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'esawdagor_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 70,
				'width'       => 290,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'esawdagor_setup' );

function esawdagor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'esawdagor_content_width', 640 );
}
add_action( 'after_setup_theme', 'esawdagor_content_width', 0 );


function esawdagor_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'esawdagor' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'esawdagor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'esawdagor_widgets_init' );



//Product Price 
add_shortcode( 'cl_product_price', 'cl_woo_product_price_shortcode' );
/**
 * Shortcode WooCommerce Product Price.
 *
 */
function cl_woo_product_price_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'cl_product_price' );
 
	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}
 
	$product = wc_get_product( $atts['id'] );
 
	if ( ! $product ) {
		return '';
	}
 
	return $product->get_price_html();
}






/**
 * Enqueue scripts and styles.
 */
function esawdagor_scripts() {
	//Enqueue Style
	wp_enqueue_style('bootstrap-css',get_theme_file_uri('/assets/css/bootstrap.min.css'),array(),'v3.3.7');
	wp_enqueue_style('slick',get_theme_file_uri('/assets/css/slick.css'),array(),'v1.0');
	wp_enqueue_style('slick-theme',get_theme_file_uri('/assets/css/slick-theme.css'),array(),'v1.3.7');
	wp_enqueue_style('nouislider',get_theme_file_uri('/assets/css/nouislider.min.css"'),array(),'v1.0.1');
	wp_enqueue_style('font-awesome',get_theme_file_uri('/assets/css/font-awesome.min.css'),array(),'v4.7.0');
	wp_enqueue_style( 'esawdagor-style', get_theme_file_uri('/assets/css/main.css'), array(),'v1.0.0' );
	wp_enqueue_style( 'esawdagor-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'esawdagor-style', 'rtl', 'replace' );

	
//Enqueue Script 
	wp_enqueue_script('jquery-main',get_theme_file_uri('/assets/js/jquery.min.js'),array('jquery'),'v1.0.0');
	wp_enqueue_script('bootstrap-js',get_theme_file_uri('/assets/js/bootstrap.min.js'),array('jquery'),'v1.0.0');
	wp_enqueue_script('slick-min-js',get_theme_file_uri('/assets/js/slick.min.js'),array('jquery'),'v1.0.0');
	wp_enqueue_script('nouislider-js',get_theme_file_uri('/assets/js/nouislider.min.js'),array('jquery'),'v1.0.0');
	wp_enqueue_script('zoom-js',get_theme_file_uri('/assets/js/jquery.zoom.min.js'),array('jquery'),'v1.0.0');
	wp_enqueue_script('js-main',get_theme_file_uri('/assets/js/main.js'),array('jquery'),'v1.0.0');	
	wp_enqueue_script( 'esawdagor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'esawdagor_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/customizer/kirki-installer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
