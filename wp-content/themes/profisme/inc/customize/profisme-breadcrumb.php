<?php
function profisme_breadcrumb_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Breadcrumb Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'breadcrumb_setting', 
		array(
			'priority'      => 129,
			'capability'    => 'edit_theme_options',
			'title'			=> esc_html__('Page Breadcrumb', 'profisme'),
		) 
	);
	/*=========================================
	Background Section
	=========================================*/ 
	$wp_customize->add_section(
        'breadcrumb_design',
        array(
        	'priority'      => 1,
            'title' 		=> esc_html__('Settings','profisme'),
            'description' 	=>'',
			'panel'  		=> 'breadcrumb_setting',
		)
    );
	
	$wp_customize->add_setting( 
		'hide_show_breadcrumb' , 
			array(
			'default' => esc_html__( '1', 'profisme' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rest_sanitize_boolean',
		) 
	);
	
	$wp_customize->add_control( new Profisme_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Breadcrumb Hide/Show', 'profisme' ),
			'section'     => 'breadcrumb_design',
			'settings'    => 'hide_show_breadcrumb',
			'type'        => 'ios', // light, ios, flat
		) 
	));
}
add_action( 'customize_register', 'profisme_breadcrumb_setting' );