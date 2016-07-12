<?php
/**
 * Icthus Corp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Icthus_Corp
 */

if ( ! function_exists( 'icthus_corp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function icthus_corp_setup() {

	// This theme styles the visual editor to resemble the theme style.

	$font_url = 'https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans';
	add_editor_style( array( 'inc/editor-styles.css', str_replace( ',', '%2C', $font_url ) ) );
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Icthus Corp, use a find and replace
	 * to change 'icthus-corp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'icthus-corp', get_template_directory() . '/languages' );

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
	add_image_size('home-large', 1529, 583, true);
	add_image_size('port-large', 1358, 612, true);
	add_image_size('blog-home', 262, 175, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'icthus-corp' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'icthus_corp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'icthus_corp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function icthus_corp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'icthus_corp_content_width', 640 );
}
add_action( 'after_setup_theme', 'icthus_corp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function icthus_corp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'icthus-corp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'icthus-corp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'icthus_corp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function icthus_corp_scripts() {

	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4');
		wp_enqueue_script('jquery');
	}

	wp_enqueue_style( 'icthus-corp-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'icthus-corp-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans' );

	wp_enqueue_style('icthus-corp-fontawesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.css');

	wp_enqueue_style( 'icthus-corp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'icthus-corp-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20160519', true );

	wp_enqueue_script( 'icthus-corp-enquire', get_template_directory_uri() . '/js/enquire.min.js', false, '20160519', true );

	wp_enqueue_script( 'icthus-corp-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('icthus-church-superfish'), '20160519', true );

	wp_enqueue_script( 'icthus-corp-slideshow', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '20160519', true );

	wp_enqueue_script( 'icthus-corp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20160519', true );

	wp_enqueue_script( 'icthus-corp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160519', true );

	if ( is_singular('portfolio') ) {

		wp_enqueue_script( 'icthus-corp-bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '3.3.6', true );


	}

	wp_enqueue_script( 'icthus-corp-main-js', get_template_directory_uri() . '/js/main.js', array(), '0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'icthus_corp_scripts' );



// Customise Subtitle Plugin to only work with Testimonials
if ( class_exists( 'Subtitles' ) &&  method_exists( 'Subtitles', 'subtitle_styling' ) ) {
    remove_action( 'wp_head', array( Subtitles::getInstance(), 'subtitle_styling' ) );
}

function remove_subtitles_support() {
    remove_post_type_support( 'post', 'subtitles' );
    remove_post_type_support( 'page', 'subtitles' );
}
add_action( 'init', 'remove_subtitles_support' );

function theme_slug_add_subtitles_support() {
    add_post_type_support( 'testimonials', 'subtitles' );
}
add_action( 'init', 'theme_slug_add_subtitles_support' );

// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
function ic_custom_excerpt_length($length) {
	global $post;
	if ($post->post_type == 'post')
	return 40;
	else if ($post->post_type == 'testimonials')
	return 46;
	else
	return 50;
}
add_filter('excerpt_length', 'ic_custom_excerpt_length');

// Replaces the excerpt "more" text by a link
function icthus_excerpt_more($more) {
       global $post;
       $text = 'Read more';
       $output = '';
       // if ( $post->post_type == 'testimonials' )  // change MY-CUSTOM-POST-TYPE to your real CPT name
       //   $text = 'View the testimony';
        return $output . '<p><a class="btn btn-primary" href="'. get_permalink($post->ID) . '"><i class="fa fa-caret-right"></i>'. $text .'</a></p>';

}
add_filter('excerpt_more', 'icthus_excerpt_more');



/**
 * Implement the CPT Recent Posts feature.
 */
require get_template_directory() . '/inc/cpt-recent-post.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
