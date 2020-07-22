<?php
/**
 * Page Customizer Options
 *
 * @package collarbiz
 */

// Add excerpt section
$wp_customize->add_section( 'collarbiz_page_section', array(
	'title'             => esc_html__( 'Page Setting','collarbiz' ),
	'description'       => esc_html__( 'Page Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'collarbiz_sanitize_select',
	'default'             => collarbiz_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new CollarBiz_Radio_Image_Control ( $wp_customize, 'collarbiz_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'collarbiz' ),
	'section'             => 'collarbiz_page_section',
	'choices'			  => collarbiz_sidebar_position(),
) ) );
