<?php
/**
 * Skills Customizer Options
 *
 * @package collarbiz
 */

// Add skills section
$wp_customize->add_section( 'collarbiz_skills_section', array(
	'title'             => esc_html__( 'Skills Section','collarbiz' ),
	'description'       => esc_html__( 'Skills Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_homepage_sections_panel',
) );

// skills menu enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[enable_skills]', array(
	'default'           => collarbiz_theme_option('enable_skills'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[enable_skills]', array(
	'label'             => esc_html__( 'Enable Skills', 'collarbiz' ),
	'section'           => 'collarbiz_skills_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// skills title chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[skills_title]', array(
	'default'          	=> collarbiz_theme_option('skills_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[skills_title]', array(
	'label'             => esc_html__( 'Title', 'collarbiz' ),
	'section'           => 'collarbiz_skills_section',
	'type'				=> 'text',
) );

// skills additional image setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[skills_image]', array(
	'sanitize_callback' => 'collarbiz_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'collarbiz_theme_options[skills_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'collarbiz' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'collarbiz' ), 1920, 1080 ),
		'section'     		=> 'collarbiz_skills_section',
) ) );

// skills btn label chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[skills_video]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'collarbiz_theme_options[skills_video]', array(
	'label'             => esc_html__( 'Video Link', 'collarbiz' ),
	'description'       => esc_html__( 'Note: Please input full url link from youtube or media library.', 'collarbiz' ),
	'section'           => 'collarbiz_skills_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// skills menu enable setting and control.
	$wp_customize->add_setting( 'collarbiz_theme_options[skills_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CollarBiz_Icon_Picker_Control( $wp_customize, 'collarbiz_theme_options[skills_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_skills_section',
		'type' 				=> 'icon_picker',
	) ) );

	// skills pages drop down chooser control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[skills_content_page_' . $i . ']', array(
		'sanitize_callback' => 'collarbiz_sanitize_page_post',
	) );

	$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[skills_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'collarbiz' ), $i ),
		'section'           => 'collarbiz_skills_section',
		'choices'			=> collarbiz_page_choices(),
	) ) );

	// skills hr control and setting
	$wp_customize->add_setting( 'collarbiz_theme_options[skills_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CollarBiz_Horizontal_Line( $wp_customize, 'collarbiz_theme_options[skills_custom_hr_' . $i . ']', array(
		'section'           => 'collarbiz_skills_section',
	) ) );

endfor;
