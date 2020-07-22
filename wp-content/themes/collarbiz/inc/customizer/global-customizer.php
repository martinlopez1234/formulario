<?php
/**
 * Global Customizer Options
 *
 * @package collarbiz
 */

// Add Global section
$wp_customize->add_section( 'collarbiz_global_section', array(
	'title'             => esc_html__( 'Global Setting','collarbiz' ),
	'description'       => esc_html__( 'Global Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_breadcrumb]', array(
	'default'           => collarbiz_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'collarbiz' ),
	'section'           => 'collarbiz_global_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// site layout setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[site_layout]', array(
	'sanitize_callback'   => 'collarbiz_sanitize_select',
	'default'             => collarbiz_theme_option('site_layout'),
) );

$wp_customize->add_control(  new CollarBiz_Radio_Image_Control ( $wp_customize, 'collarbiz_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'collarbiz' ),
	'section'             => 'collarbiz_global_section',
	'choices'			  => collarbiz_site_layout(),
) ) );
