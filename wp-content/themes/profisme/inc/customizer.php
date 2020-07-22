<?php
/**
 * profisme Theme Customizer.
 *
 * @package profisme
 */


function profisme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section( 'colors' )->priority = 25;
}
add_action( 'customize_register', 'profisme_customize_register' );
/**
 * Register panels for Customizer.
 *
 * @since profisme 
 */
function profisme_customizer_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'profisme_frontpage_sections', array(
			'priority' => 128,
			'title' => esc_html__( 'Homepage Section', 'profisme' ),
		)
	);

	$wp_customize->add_setting('profisme_theme_color', array(
	    'default' => '#0088CC',
	    'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'profisme_theme_color', array(
	    'section' => 'colors',
	    'label' => __('Theme Color', 'profisme')
	)));

		$wp_customize->add_setting('profisme_main_header_color', array(
	    'default' => 'transparent',
	    'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'profisme_main_header_color', array(
	    'section' => 'colors',
	    'label' => __('Header Background Color', 'profisme')
	)));


		$wp_customize->add_setting('profisme_header_menu_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'profisme_header_menu_color', array(
	    'section' => 'colors',
	    'label' => __('Header Menu Color', 'profisme')
	)));

}
add_action( 'customize_register', 'profisme_customizer_register' );