<?php
/**
 * Features Customizer Options
 *
 * @package collarbiz
 */

// Add features section
$wp_customize->add_section( 'collarbiz_features_section', array(
	'title'             => esc_html__( 'Features Section','collarbiz' ),
	'description'       => esc_html__( 'Features Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// features menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_features]', array(
	'default'           => collarbiz_theme_option('enable_features'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_features]', array(
	'label'             => esc_html__( 'Enable Features', 'collarbiz' ),
	'section'           => 'collarbiz_features_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// features label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[features_title]', array(
	'default'          	=> collarbiz_theme_option('features_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[features_title]', array(
	'label'             => esc_html__( 'Title', 'collarbiz' ),
	'section'           => 'collarbiz_features_section',
	'type'				=> 'text',
) );

// features sub title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[features_sub_title]', array(
	'default'          	=> collarbiz_theme_option('features_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[features_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'collarbiz' ),
	'section'           => 'collarbiz_features_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// features menu enable setting and control.
	$wp_customize->add_setting( 'collarbiz_theme_options[features_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CollarBiz_Icon_Picker_Control( $wp_customize, 'collarbiz_theme_options[features_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_features_section',
		'type' 				=> 'icon_picker',
	) ) );

	// features pages drop down chooser control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[features_content_page_' . $i . ']', array(
		'sanitize_callback' => 'collarbiz_sanitize_page_post',
	) );

	$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[features_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_features_section',
		'choices'			=> collarbiz_page_choices(),
	) ) );

	// features hr control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[features_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CollarBiz_Horizontal_Line( $wp_customize, 'collarbiz_theme_options[features_custom_hr_' . $i . ']', array(
		'section'           => 'collarbiz_features_section',
	) ) );

endfor;
