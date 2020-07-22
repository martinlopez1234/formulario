<?php
/**
 * Header Customizer Options
 *
 * @package collarbiz
 */

// Add header section
$wp_customize->add_section( 'collarbiz_header_section', array(
	'title'             => esc_html__( 'Header Section','collarbiz' ),
	'description'       => esc_html__( 'Header Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_menu_botton]', array(
	'default'           => collarbiz_theme_option('show_menu_botton'),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_menu_botton]', array(
	'label'             => esc_html__( 'Show Menu Button', 'collarbiz' ),
	'section'           => 'collarbiz_header_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// button label
$wp_customize->add_setting( 'collarbiz_theme_options[menu_btn_label]',
	array(
		'default'       		=> collarbiz_theme_option('menu_btn_label'),
		'sanitize_callback'		=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'collarbiz_theme_options[menu_btn_label]',
    array(
		'label'      			=> esc_html__( 'Menu Button Label', 'collarbiz' ),
		'section'    			=> 'collarbiz_header_section',
		'type'		 			=> 'text',
    )
);

// button link
$wp_customize->add_setting( 'collarbiz_theme_options[menu_btn_link]',
	array(
		'sanitize_callback'		=> 'esc_url_raw',
	)
);
$wp_customize->add_control( 'collarbiz_theme_options[menu_btn_link]',
    array(
		'label'      			=> esc_html__( 'Menu Button Link', 'collarbiz' ),
		'section'    			=> 'collarbiz_header_section',
		'type'		 			=> 'url',
    )
);
