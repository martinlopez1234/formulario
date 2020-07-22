<?php

function dreo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'dreo_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/images/header.jpg',
		'default-text-color'     => '000000',
		'flex-width'    		 => true,
		'width'                  => 1920,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => '',
	) ) );
}
add_action( 'after_setup_theme', 'dreo_custom_header_setup' );