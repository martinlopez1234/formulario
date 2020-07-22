<?php
/**
 * Footer Customizer Options
 *
 * @package collarbiz
 */

// Add footer section
$wp_customize->add_section( 'collarbiz_footer_section', array(
	'title'             => esc_html__( 'Footer Section','collarbiz' ),
	'description'       => esc_html__( 'Footer Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[slide_to_top]', array(
	'default'           => collarbiz_theme_option('slide_to_top'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'collarbiz' ),
	'section'           => 'collarbiz_footer_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'collarbiz_theme_options[copyright_text]',
	array(
		'default'       		=> collarbiz_theme_option('copyright_text'),
		'sanitize_callback'		=> 'collarbiz_santize_allow_tags',
	)
);
$wp_customize->add_control( 'collarbiz_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'collarbiz' ),
		'section'    			=> 'collarbiz_footer_section',
		'type'		 			=> 'textarea',
    )
);

