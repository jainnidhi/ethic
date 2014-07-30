<?php
/**
 * Ethic functions and definitions
 *
 * @package Ethic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'ethic_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function ethic_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
                
                add_image_size('post_project_thumb', 300, 300);
                
                add_image_size('post_feature_main_thumb', 770, 516);
                
                add_image_size('post_feature_other_thumb', 370, 247);

		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( 'ethic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

	}

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Ethic, use a find and replace
	 * to change 'ethic' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'ethic', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', 'ethic' ),
	) );

}
endif; // ethic_setup
add_action( 'after_setup_theme', 'ethic_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function ethic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ethic' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ethic_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ethic_scripts() {

	// load bootstrap css
	wp_enqueue_style( 'ethic-bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.css' );
        
        wp_enqueue_style( 'flexslider', trailingslashit( get_template_directory_uri() ) . 'includes/css/flexslider.css' , array(), '1.0', 'all' );
        
         wp_enqueue_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'includes/css/font-awesome.min.css' , array(), '4.0.3', 'all' );
        
	// load Ethic styles
	wp_enqueue_style( 'ethic-style', get_stylesheet_uri() );

	// load bootstrap js
	wp_enqueue_script('ethic-bootstrapjs', get_template_directory_uri().'/includes/js/bootstrap.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( 'ethic-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( 'ethic-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );
        
         wp_enqueue_script('ethic-slider', get_template_directory_uri() . '/includes/js/jquery.flexslider-min.js', array('jquery'));
     
         wp_enqueue_script('ethic-custom-scripts', get_template_directory_uri() . '/includes/js/custom-scripts.js', array(), '1.0', 'all', false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'ethic-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

}
add_action( 'wp_enqueue_scripts', 'ethic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';
