<?php
/**
 * Single Post Customizer Options
 *
 * @package collarbiz
 */

// Add excerpt section
$wp_customize->add_section( 'collarbiz_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','collarbiz' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'collarbiz_sanitize_select',
	'default'             => collarbiz_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new CollarBiz_Radio_Image_Control ( $wp_customize, 'collarbiz_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'collarbiz' ),
	'section'             => 'collarbiz_single_section',
	'choices'			  => collarbiz_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_single_date]', array(
	'default'           => collarbiz_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'collarbiz' ),
	'section'           => 'collarbiz_single_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_single_category]', array(
	'default'           => collarbiz_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'collarbiz' ),
	'section'           => 'collarbiz_single_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_single_tags]', array(
	'default'           => collarbiz_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'collarbiz' ),
	'section'           => 'collarbiz_single_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_single_author]', array(
	'default'           => collarbiz_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'collarbiz' ),
	'section'           => 'collarbiz_single_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );
