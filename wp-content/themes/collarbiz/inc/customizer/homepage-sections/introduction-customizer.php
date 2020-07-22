<?php
/**
 * Introduction Customizer Options
 *
 * @package collarbiz
 */

// Add introduction section
$wp_customize->add_section( 'collarbiz_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','collarbiz' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_introduction]', array(
	'default'           => collarbiz_theme_option('enable_introduction'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'collarbiz' ),
	'section'           => 'collarbiz_introduction_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'collarbiz_sanitize_page_post',
) );

$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'collarbiz' ),
	'section'           => 'collarbiz_introduction_section',
	'choices'			=> collarbiz_page_choices(),
) ) );

// introduction additional image setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[introduction_signature_image]', array(
	'sanitize_callback' => 'collarbiz_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'collarbiz_theme_options[introduction_signature_image]',
		array(
		'label'       		=> esc_html__( 'Signature Image', 'collarbiz' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'collarbiz' ), 300, 150 ),
		'section'     		=> 'collarbiz_introduction_section',
) ) );