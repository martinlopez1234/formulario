<?php
/**
 * Default Theme Customizer Values
 *
 * @package collarbiz
 */

function collarbiz_get_default_theme_options() {
	$collarbiz_default_options = array(
		// default options

		/* Homepage Sections */

		// Slider
		'enable_slider'			=> false,
		'slider_entire_site'	=> false,
		'slider_auto_play'		=> false,
		'slider_arrow'			=> true,
		'slider_btn_label'		=> esc_html__( 'Learn More', 'collarbiz' ),
		'slider_alt_btn_label'	=> esc_html__( 'Contact Us', 'collarbiz' ),
		'slider_alt_btn_url'	=> '#',

		// Introduction
		'enable_introduction'	=> false,

		// Service
		'enable_service'		=> false,
		'service_title'			=> esc_html__( 'Services We Provide', 'collarbiz' ),
		'service_sub_title'		=> esc_html__( 'Why you need a financial consultant today', 'collarbiz' ),
		'service_readmore_label' => esc_html__( 'Read More', 'collarbiz' ),

		// Skills
		'enable_skills'			=> false,
		'skills_title'			=> esc_html__( 'Today&#39;s Most Popular Agents Are Rocking It With Us', 'collarbiz' ),

		// Features
		'enable_features'		=> false,
		'features_title'		=> esc_html__( 'Key Features', 'collarbiz' ),
		'features_sub_title'	=> esc_html__( 'Strategies that worked for companies', 'collarbiz' ),

		// Recent
		'enable_recent'			=> false,
		'recent_title'			=> esc_html__( 'Latest Blogs', 'collarbiz' ),
		'recent_sub_title'		=> esc_html__( 'Read all the stories from journal', 'collarbiz' ),
		'recent_content_type'	=> 'recent',

		// Call to action
		'enable_cta'			=> false,
		'cta_btn_label'			=> esc_html__( 'Contact Us Now', 'collarbiz' ),

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2020 | All Rights Reserved.', 'collarbiz' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'collarbiz' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'menu_btn_label'		=> esc_html__( 'Contact Us', 'collarbiz' ),
		'enable_breadcrumb'		=> true,
		'site_layout'			=> 'full',
	);

	$output = apply_filters( 'collarbiz_default_theme_options', $collarbiz_default_options );
	return $output;
}