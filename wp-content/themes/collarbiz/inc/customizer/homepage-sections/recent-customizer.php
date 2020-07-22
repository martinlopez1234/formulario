<?php
/**
 * Recent Customizer Options
 *
 * @package collarbiz
 */

// Add recent section
$wp_customize->add_section( 'collarbiz_recent_section', array(
	'title'             => esc_html__( 'Recent Section','collarbiz' ),
	'description'       => esc_html__( 'Recent Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// recent enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_recent]', array(
	'default'           => collarbiz_theme_option('enable_recent'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'collarbiz' ),
	'section'           => 'collarbiz_recent_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// recent title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[recent_title]', array(
	'default'          	=> collarbiz_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'collarbiz' ),
	'section'           => 'collarbiz_recent_section',
	'type'				=> 'text',
) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[recent_sub_title]', array(
	'default'          	=> collarbiz_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'collarbiz' ),
	'section'           => 'collarbiz_recent_section',
	'type'				=> 'text',
) );

// recent content type control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[recent_content_type]', array(
	'default'          	=> collarbiz_theme_option('recent_content_type'),
	'sanitize_callback' => 'collarbiz_sanitize_select',
) );

$wp_customize->add_control( 'collarbiz_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'collarbiz' ),
	'section'           => 'collarbiz_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'recent' 	=> esc_html__( 'Recent', 'collarbiz' ),
		'category' 	=> esc_html__( 'Category', 'collarbiz' ),
	),
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'collarbiz_sanitize_category',
) );

$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'collarbiz' ),
	'section'           => 'collarbiz_recent_section',
	'choices'			=> collarbiz_category_choices(),
	'active_callback'	=> 'collarbiz_recent_content_category_enable',
) ) );
