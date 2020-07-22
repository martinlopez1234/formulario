<?php
/**
 * Profisme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @subpackage Profisme
 * @since Profisme 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


if ( ! function_exists( 'profisme_setup' ) ) :
function profisme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Theme translation ready 
	 */
	load_theme_textdomain( 'profisme', get_template_directory() . '/languages' );
	
	// Custom background color.
	add_theme_support( 'custom-background', apply_filters( 'profisme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'profisme' ),
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
	 * Custom logo.
	 */
	add_theme_support('custom-logo');
	
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', profisme_google_font() ) );
	
	
}
endif;
add_action( 'after_setup_theme', 'profisme_setup' );

if (!function_exists('profisme_ocdi_files')) :
/**
* OCDI files.
*
* @since 1.0.0
*
* @return array Files.
*/
function profisme_ocdi_files() {

return apply_filters( 'aft_demo_import_files', array(
    array(
        'import_file_name'             => esc_html__( 'Profisme Business Data', 'profisme' ),
        'import_file_url'            => esc_url('http://wpprobiz.com/xmltarget/business/profisme-business.xml'),
        'import_widget_file_url'     => esc_url('http://wpprobiz.com/xmltarget/business/profisme-business.wie'),
        'import_customizer_file_url' => esc_url('http://wpprobiz.com/xmltarget/business/profisme-business.dat'),
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'profisme-demo/demo-import-content/profisme.png',


    ),
       	    array(
        'import_file_name'             => esc_html__( 'Profisme Construct Data', 'profisme' ),
        'import_file_url'            => esc_url('http://wpprobiz.com/xmltarget/construction/profisme-construction.xml'),
        'import_widget_file_url'     => esc_url('http://wpprobiz.com/xmltarget/construction/profisme-construction.wie'),
        'import_customizer_file_url' => esc_url('http://wpprobiz.com/xmltarget/construction/profisme-construction.dat'),
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'profisme-demo/demo-import-construct/profismeconstruction.jpg',

    ),
	  	    array(
        'import_file_name'             => esc_html__( 'Profisme Medical Data', 'profisme' ),
        'import_file_url'            => esc_url('http://wpprobiz.com/xmltarget/medical/profisme-medical.xml'),
        'import_widget_file_url'     => esc_url('http://wpprobiz.com/xmltarget/medical/profisme-medical.wie'),
        'import_customizer_file_url' => esc_url('http://wpprobiz.com/xmltarget/medical/profisme-medical.dat'),
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'profisme-demo/demo-import-medical/medical.png',

    ),
));
}
endif;
add_filter( 'pt-ocdi/import_files', 'profisme_ocdi_files');

// Set content-width.
function profisme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'profisme_content_width', 1170 );
}
add_action( 'after_setup_theme', 'profisme_content_width', 0 );

/**
 * Enque Scripts/CSS
 */
require_once get_template_directory() . '/inc/scripts.php';

/**
 * Breadcrumb Settings 
 */
require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';

/**
 * Sidebar Calling
*/
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Custom tags definations   
*/
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions  
 */
require_once get_template_directory() . '/inc/custom-function.php';

/**
 * Load Custom toggle Control in Customizer
 */
 require_once get_template_directory() . '/inc/custom-controls/toggle/class-customizer-toggle-control.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';
/**
 * plugin Recommendations.
 */
require_once  get_template_directory()  . '/inc/class-tgm-plugin-activation.php';
/**
 * hook recommend plugins.
 */

require get_template_directory(). '/inc/hook-tgm.php';
/**
 * Load Sanitization file.
 */
require_once get_template_directory() . '/inc/sanitization.php';
require_once get_template_directory() . '/inc/custom-theme-colors.php';

require( get_template_directory() . '/inc/customize/profisme-blog.php');
require( get_template_directory() . '/inc/customize/profisme-breadcrumb.php');
require( get_template_directory() . '/inc/customize/profisme-footer.php');

if( is_admin()){
/*
* Profisme  notice and advanced import
* */
 
require( get_template_directory() . '/inc/admin/advanced-import.php');
require( get_template_directory() . '/inc/admin/notice.php');
require( get_template_directory() . '/inc/admin/intro.php');
}
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer-pro/class-customize.php' );


add_action('admin_head', 'admin_styles');

function admin_styles() {
    echo '<style>
        .profisme-gsm-notice .notice-dismiss {
          position:relative;
        }

    </style>';
}