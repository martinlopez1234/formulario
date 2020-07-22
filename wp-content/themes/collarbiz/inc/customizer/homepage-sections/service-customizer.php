<?php
/**
 * Service Customizer Options
 *
 * @package collarbiz
 */

// Add service section
$wp_customize->add_section( 'collarbiz_service_section', array(
	'title'             => esc_html__( 'Service Section','collarbiz' ),
	'description'       => esc_html__( 'Service Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// service menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_service]', array(
	'default'           => collarbiz_theme_option('enable_service'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'collarbiz' ),
	'section'           => 'collarbiz_service_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// service title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[service_title]', array(
	'default'          	=> collarbiz_theme_option('service_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[service_title]', array(
	'label'             => esc_html__( 'Title', 'collarbiz' ),
	'section'           => 'collarbiz_service_section',
	'type'				=> 'text',
) );

// service sub title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[service_sub_title]', array(
	'default'          	=> collarbiz_theme_option('service_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[service_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'collarbiz' ),
	'section'           => 'collarbiz_service_section',
	'type'				=> 'text',
) );

// service readmore label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[service_readmore_label]', array(
	'default'          	=> collarbiz_theme_option('service_readmore_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[service_readmore_label]', array(
	'label'             => esc_html__( 'Readmore Label', 'collarbiz' ),
	'section'           => 'collarbiz_service_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'collarbiz_sanitize_page_post',
	) );

	$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_service_section',
		'choices'			=> collarbiz_page_choices(),
	) ) );

endfor;
