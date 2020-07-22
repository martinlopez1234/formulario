<?php
/**
 * Slider Customizer Options
 *
 * @package collarbiz
 */

// Add slider section
$wp_customize->add_section( 'collarbiz_slider_section', array(
	'title'             => esc_html__( 'Slider Section','collarbiz' ),
	'description'       => esc_html__( 'Slider Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_slider]', array(
	'default'           => collarbiz_theme_option('enable_slider'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[slider_arrow]', array(
	'default'           => collarbiz_theme_option('slider_arrow'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// slider auto play control enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[slider_auto_play]', array(
	'default'           => collarbiz_theme_option('slider_auto_play'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[slider_auto_play]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[slider_btn_label]', array(
	'default'          	=> collarbiz_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'type'				=> 'text',
) );

// slider alt btn label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[slider_alt_btn_label]', array(
	'default'          	=> collarbiz_theme_option('slider_alt_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[slider_alt_btn_label]', array(
	'label'             => esc_html__( 'Alt Button Label', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'type'				=> 'text',
) );

// slider alt btn link chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[slider_alt_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'collarbiz_theme_options[slider_alt_btn_link]', array(
	'label'             => esc_html__( 'Alt Button Link', 'collarbiz' ),
	'section'           => 'collarbiz_slider_section',
	'type'				=> 'url',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'collarbiz_sanitize_page_post',
	) );

	$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_slider_section',
		'choices'			=> collarbiz_page_choices(),
	) ) );

endfor;
