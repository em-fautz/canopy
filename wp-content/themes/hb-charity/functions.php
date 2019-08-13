<?php
add_filter( 'scp_js_path_url', function ( $path_url ) {
	$path_url = get_stylesheet_directory_uri() . '/vendor/soderlind/customizer-polylang/js';
	return $path_url;
} );
require_once "vendor/autoload.php";

/**
 * HB CHARITY functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HB_CHARITY
 */

if ( ! function_exists( 'hb_charity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hb_charity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on HB CHARITY, use a find and replace
		 * to change 'hb-charity' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hb-charity', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'hb-charity' ),
			'secondary'	=> esc_html__( 'Footer', 'hb-charity' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hb_charity_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Thumbnail Sizes
		add_image_size( 'hb-charity-thumbnail-1', 800, 500, true );
		add_image_size( 'hb-charity-thumbnail-2', 300, 300, true );
	}
endif;
add_action( 'after_setup_theme', 'hb_charity_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hb_charity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hb_charity_content_width', 640 );
}
add_action( 'after_setup_theme', 'hb_charity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hb_charity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hb-charity' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hb-charity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar_title widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'hb-charity' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'hb-charity' ),
		'before_widget' => '<div class="col-xs-12 col-sm-4 col-md-4"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="sidebar_title widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'hb_charity_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hb_charity_scripts() {
	wp_enqueue_style( 'hb-charity-style', get_stylesheet_uri() );

	wp_enqueue_style( 'lora', 'https://fonts.googleapis.com/css?family=Lora' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );

	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/css/lightbox.css' );

	wp_enqueue_style( 'masonry' , get_template_directory_uri() . '/assets/css/masonry.css' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );

	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css' );

	wp_enqueue_style( 'mdb', get_template_directory_uri() . '/assets/css/mdb.css' );

	wp_enqueue_style( 'hb-charity-main', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'hb-charity-media', get_template_directory_uri() . '/assets/css/media.css' );


	wp_enqueue_script( 'hb-charity-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hb-charity-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'mdb', get_template_directory_uri() . '/assets/js/mdb.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/counterup.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'hb-charity-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'hb-charity-main1', get_template_directory_uri() . '/assets/js/main1.js', array( 'jquery' ), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hb_charity_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load hooks.php
 */
require get_template_directory() . '/hummingbird/hooks.php';

/**
 * Load filters.php
 */
require get_template_directory() . '/hummingbird/filters.php';

/**
 * Load breadcrumbs.php
 */
require get_template_directory() . '/third-party/breadcrumbs.php';


