<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

/* function businessblogs_theme_setup() {
   remove_theme_support('custom-background');
}
add_action( 'after_setup_theme', 'businessblogs_theme_setup' );
 */
if ( !function_exists( 'businessblogs_scripts' ) ):
	function businessblogs_scripts() {
		//parent theme style css
		wp_enqueue_style( 'aneeq-style', trailingslashit( get_template_directory_uri() ) . '/style.css', array( ) );
		
		//child theme businessblogs style css
		wp_enqueue_style( 'businessblogs-child-style', trailingslashit( get_stylesheet_directory_uri() ) . '/style.css', array('parent-style'));
		
		//businessblogs custom color css
		wp_enqueue_style( 'businessblogs-defaults', trailingslashit( get_stylesheet_directory_uri() ) . '/css/businessblogs-defaults.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'businessblogs_scripts', 10 );

function businessblogs_customize_update($wp_customize) {
	$wp_customize->remove_section( 'upgrade_aneeq_premium' );  //Modify this line as needed
	
	//$wp_customize->remove_section( 'aneeq_general_settings' );  //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_static_page_setting' ); //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_header_option' );  //Modify this line as needed
	//$wp_customize->remove_section( 'front_page_panel' );  //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_section_slider' );  //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_section_services' );  //Modify this line as needed
	//$wp_customize->remove_section( 'section_home_blog' ); //Modify this line as needed
	//$wp_customize->remove_section( 'section_home_wooproduct' ); //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_section_testimonial' ); //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq_footer_settings' ); //Modify this line as needed
	//$wp_customize->remove_section( 'static_page_setting' ); //Modify this line as needed
	//$wp_customize->remove_section( 'aneeq' ); //Docs Comment
	//$wp_customize->remove_section( 'colors' ); //Colors
	
	//for removing Control
	//$wp_customize->remove_control( 'aneeq_static_page_setting' ); //Modify this line as needed
}
add_action( 'customize_register', 'businessblogs_customize_update', 100 );
// END ENQUEUE PARENT ACTION