<?php
/**
 * tomochain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tomochain
 */
$tomochain_theme = wp_get_theme();

if ( ! empty( $tomochain_theme['Template'] ) ) {
	$tomochain_theme = wp_get_theme( $tomochain_theme['Template'] );
}

define( 'TOMOCHAIN_THEME_NAME', $tomochain_theme['Name'] );
define( 'TOMOCHAIN_THEME_SLUG', $tomochain_theme['Template'] );
define( 'TOMOCHAIN_THEME_VERSION', $tomochain_theme['Version'] );
define( 'TOMOCHAIN_THEME_DIR', get_template_directory() );
define( 'TOMOCHAIN_THEME_URI', get_template_directory_uri() );
define( 'TOMOCHAIN_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'TOMOCHAIN_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'TOMOCHAIN_LIBS_URI', TOMOCHAIN_THEME_URI . '/assets/libs' );

if ( ! function_exists( 'tomochain_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tomochain_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tomochain, use a find and replace
		 * to change 'tomochain' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tomochain', TOMOCHAIN_THEME_DIR . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'tomochain' ),
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
		add_theme_support( 'custom-background', apply_filters( 'tomochain_custom_background_args', array(
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

        add_image_size('tomo-post-small-thumbnail', 200, 200, true);
        add_image_size('tomo-post-thumbnail', 540, 200, true);
        add_image_size('tomo-single-thumbnail', 1170, 500, true);
	}
endif;
add_action( 'after_setup_theme', 'tomochain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tomochain_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tomochain_content_width', 640 );
}
add_action( 'after_setup_theme', 'tomochain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tomochain_widgets_init() {
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tomochain' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tomochain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'tomochain' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'tomochain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tomochain_widgets_init' );

/**
 * Enqueue libraries
 */
function tomochain_enqueue_libs() {
    /*
    * Enqueue Google Fonts
    */
    $font_url = add_query_arg( 'family',
            'Open+Sans:300,400,600,700|Quicksand:400,500&amp;subset=latin-ext,vietnamese',
            'https://fonts.googleapis.com/css' );
    wp_enqueue_style( 'google-fonts', $font_url, null, TOMOCHAIN_THEME_VERSION );

    wp_enqueue_script( 'superfish',
        TOMOCHAIN_LIBS_URI . '/superfish/js/superfish.min.js',
        array(),
        null,
        true );

    wp_enqueue_script( 'hoverIntent',
        TOMOCHAIN_LIBS_URI . '/superfish/js/hoverIntent.js',
        array(),
        null,
        true );

    wp_enqueue_style( 'jquery-nice-select', TOMOCHAIN_LIBS_URI . '/jquery-nice-select/css/nice-select.css' );

    wp_enqueue_script( 'jquery-nice-select',
        TOMOCHAIN_LIBS_URI . '/jquery-nice-select/js/jquery.nice-select.min.js',
        array(),
        null,
        true );

    wp_enqueue_style( 'slick-carousel', TOMOCHAIN_LIBS_URI . '/slick-carousel/css/slick.css' );

    wp_enqueue_script( 'slick-carousel',
        TOMOCHAIN_LIBS_URI . '/slick-carousel/js/slick.min.js',
        array(),
        null,
        true );

    wp_enqueue_script( 'headroom-js',
        TOMOCHAIN_LIBS_URI . '/headroom-js/js/headroom.min.js',
        array(),
        null,
        true );

    wp_enqueue_script( 'jquery-headroom-js',
        TOMOCHAIN_LIBS_URI . '/headroom-js/js/jquery.headroom.min.js',
        array(),
        null,
        true );

    wp_register_style( 'hint-css', TOMOCHAIN_LIBS_URI . '/hint.css/css/hint.min.css' );

    wp_register_script( 'animejs',
        TOMOCHAIN_LIBS_URI . '/animejs/js/anime.min.js',
        array(),
        null,
        true );
}
add_action( 'wp_enqueue_scripts', 'tomochain_enqueue_libs', 1 );

/**
 * Enqueue scripts and styles.
 */
function tomochain_scripts() {

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	if ($suffix === '.min') {
		add_filter( 'stylesheet_uri',
			function ( $stylesheet_uri, $stylesheet_dir_uri ) {
				return $stylesheet_dir_uri . '/style.min.css';
			},
		10,
		2 );
    }

    wp_enqueue_style( 'tomochain-style', get_stylesheet_uri() );

    wp_enqueue_script( 'tomochain-js',
        TOMOCHAIN_THEME_URI . '/assets/js/tomochain' . $suffix . '.js',
            array('jquery'),
            TOMOCHAIN_THEME_VERSION,
            true );

    wp_localize_script( 'tomochain-js',
        'tomochainConfigs',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tomochain_scripts' );

/**
 * Widgets
 */
require TOMOCHAIN_THEME_DIR . '/inc/widgets/wph-widget-class.php';
require TOMOCHAIN_THEME_DIR . '/inc/widgets/tomochain-address.php';
require TOMOCHAIN_THEME_DIR . '/inc/widgets/tomochain-recent-posts.php';
if (defined('SENDGRID_CATEGORY')) {
    require TOMOCHAIN_THEME_DIR . '/inc/widgets/tomochain-sendgrid.php';
}

/**
 * Add Theme Options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
        'page_title'  => esc_html('Theme Options', 'tomochain'),
        'menu_title'  => esc_html('Theme Options', 'tomochain'),
        'menu_slug'   => 'theme-options',
        'capability'  => 'edit_posts',
        'parent_slug' => 'themes.php'
    ));
}

/**
 * Implement the Custom Header feature.
 */
require TOMOCHAIN_THEME_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require TOMOCHAIN_THEME_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require TOMOCHAIN_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require TOMOCHAIN_THEME_DIR . '/inc/customizer.php';

/**
 * Import ACF local field groups
 */
require TOMOCHAIN_THEME_DIR . '/inc/acf-local-field-groups.php';

function my_acf_init() {
    acf_update_setting('google_api_key', get_field('google_maps_api_key', 'options'));
}
add_action('acf/init', 'my_acf_init');

/**
 * Code Snippet to make Revolution Slider enable WPML support when Polylang
 * is enabled. Polylang has the required WPML compatibility functions to
 * make Revslider work.
 *
 * Add this to your functions.php or using the Code Snippets Plugin
 *
 * Author: https://github.com/stuffo/polylang-revslider
 */
// only run if Polylang is loaded
if ( function_exists('pll_languages_list') ) {
	add_action('wpml_loaded', '__return_true', 10, 0);
	do_action('wpml_loaded');
}

/**
 * Remove default page of SendGrid plugin
 */
if (defined('SENDGRID_CATEGORY')) {
    remove_action( 'init', 'sg_create_subscribe_general_error_page' );
    remove_action( 'init', 'sg_create_subscribe_missing_token_error_page' );
    remove_action( 'init', 'sg_create_subscribe_invalid_token_error_page' );
}
