<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( ! function_exists( 'rick_labs_setup')){
	function rick_labs_setup() {
		/**
		 * Load Theme Text Domain
		 */
		load_theme_textdomain('ricklabs', get_stylesheet_directory() . '/languages');
		
		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'ricklabs' ),
				'footer'  => esc_html__( 'Secondary menu', 'ricklabs' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

				/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );

	}
}

add_action('after_setup_theme', 'rick_labs_setup');

/**
 * Load Front Page CSS
 */

function ricklabs_enqueuestyles()
{


	//Template Main CSS Files
	wp_enqueue_style('front-css', get_stylesheet_directory_uri() . '/assets/css/front-style.css');

	// Vendor CSS Files
	wp_enqueue_style('bootstrap-min', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');

	wp_enqueue_style('icofont-min', get_stylesheet_directory_uri() . '/assets/vendor/icofont/icofont.min.css');

	wp_enqueue_style('boxicons-min', get_stylesheet_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css');

	wp_enqueue_style('venobox', get_stylesheet_directory_uri() . '/assets/vendor/venobox/venobox.css');

	wp_enqueue_style('owl-carousel-min', get_stylesheet_directory_uri() . '/assets/vendor/owl.carousel/assets/owl.carousel.min.css');

	wp_enqueue_style('aos', get_stylesheet_directory_uri() . '/assets/vendor/aos/aos.css', [], time(), 'all');

	// Load Fonts
	wp_enqueue_style('open-sans-font', 'https://fonts.googleapis.com/css?family=Open+Sans');


	// Vendor JS Files
	wp_enqueue_script('vendor-jquery', get_stylesheet_directory_uri() . '/assets/vendor/jquery/jquery.min.js', [], time(), 'all');

	wp_enqueue_script('bootstrap-bundle-min', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], time(), 'all');

	wp_enqueue_script('easing-min', get_stylesheet_directory_uri() . '/assets/vendor/jquery.easing/jquery.easing.min.js', [], time(), 'all');

	wp_enqueue_script('waypoints-min', get_stylesheet_directory_uri() . '/assets/vendor/waypoints/jquery.waypoints.min.js', [], time(), 'all');

	wp_enqueue_script('counterup-min', get_stylesheet_directory_uri() . '/assets/vendor/counterup/counterup.min.js', [], time(), 'all');

	wp_enqueue_script('isotope-package-min', get_stylesheet_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', [], time(), 'all');

	wp_enqueue_script('venobox-min', get_stylesheet_directory_uri() . '/assets/vendor/venobox/venobox.min.js', [], time(), 'all');

	wp_enqueue_script('owl-carousel-min', get_stylesheet_directory_uri() . '/assets/vendor/owl.carousel/owl.carousel.min.js', [], time(), 'all');

	wp_enqueue_script('typed-min', get_stylesheet_directory_uri() . '/assets/vendor/typed.js/typed.min.js', [], time(), 'all');

	wp_enqueue_script('aos', get_stylesheet_directory_uri() . '/assets/vendor/aos/aos.js', [], time(), 'all');
	
	// Template Main JS File
	
	wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', [], time(), 'all');
}


add_action('wp_enqueue_scripts', 'ricklabs_enqueuestyles');

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function rick_labs_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'ricklabs' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rick_labs_widgets_init' );