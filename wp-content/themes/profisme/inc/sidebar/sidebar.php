<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package profisme
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function profisme_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Widget Area', 'profisme' ),
		'id' => 'sidebar-primary',
		'description' => esc_html__( 'The Primary Widget Area', 'profisme' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title"><h2>',
		'after_title' => '</h2></div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer widget  area 1', 'profisme' ),
		'id' => 'footer-widget-area-1',
		'description' => esc_html__( 'Footer First Column', 'profisme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer widget  area 2', 'profisme' ),
		'id' => 'footer-widget-area-2',
		'description' => esc_html__( 'Footer Second Column', 'profisme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer widget  area 3', 'profisme' ),
		'id' => 'footer-widget-area-3',
		'description' => esc_html__( 'Footer Third Column', 'profisme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Fourth Column', 'profisme' ),
		'id' => 'footer-widget-area-4',
		'description' => esc_html__( 'Footer widget area 4', 'profisme' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'profisme_widgets_init' );