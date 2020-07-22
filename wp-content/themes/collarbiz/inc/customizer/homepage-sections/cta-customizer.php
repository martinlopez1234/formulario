<?php
/**
 * Call to Action Customizer Options
 *
 * @package collarbiz
 */

// Add cta section
$wp_customize->add_section( 'collarbiz_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','collarbiz' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_cta]', array(
	'default'           => collarbiz_theme_option('enable_cta'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'collarbiz' ),
	'section'           => 'collarbiz_cta_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'collarbiz_sanitize_page_post',
) );

$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'collarbiz' ),
	'section'           => 'collarbiz_cta_section',
	'choices'			=> collarbiz_page_choices(),
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[cta_btn_label]', array(
	'default'          	=> collarbiz_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'collarbiz' ),
	'section'           => 'collarbiz_cta_section',
	'type'				=> 'text',
) );
