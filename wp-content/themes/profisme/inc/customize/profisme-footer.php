<?php
function profisme_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 131,
			'capability'    => 'edit_theme_options',
			'title'			=> esc_html__('Footer Section', 'profisme'),
		) 
	);
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copyright',
        array(
            'title' 		=> esc_html__('Copyright Content','profisme'),
            'description' 	=>'',
			'panel'  		=> 'footer_section',
		)
    );

	// Copyright Content Hide/Show Setting // 
	// Team Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_copyright' , 
			array(
			'default' => esc_html__('1','profisme'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	
	$wp_customize->add_control( new Profisme_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_copyright', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'profisme' ),
			'section'     => 'footer_copyright',
			'settings'    => 'hide_show_copyright',
			'type'        => 'ios', // light, ios, flat
		) 
	));

	// Copyright Content Setting // 
	

	
	
}
add_action( 'customize_register', 'profisme_footer' );