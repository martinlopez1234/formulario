<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package collarbiz
 */

// Add blog section
$wp_customize->add_section( 'collarbiz_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','collarbiz' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'collarbiz' ),
	'panel'             => 'collarbiz_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> collarbiz_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new CollarBiz_Dropdown_Chosen_Control( $wp_customize, 'collarbiz_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'collarbiz' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'collarbiz_sanitize_select',
	'default'             => collarbiz_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new CollarBiz_Radio_Image_Control ( $wp_customize, 'collarbiz_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'collarbiz' ),
	'section'             => 'collarbiz_blog_section',
	'choices'			  => collarbiz_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[column_type]', array(
	'default'          	=> collarbiz_theme_option( 'column_type' ),
	'sanitize_callback' => 'collarbiz_sanitize_select',
) );

$wp_customize->add_control( 'collarbiz_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'collarbiz' ),
		'column-2' 		=> esc_html__( 'Two Column', 'collarbiz' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[excerpt_count]', array(
	'default'          	=> collarbiz_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'collarbiz_sanitize_number_range',
	'validate_callback' => 'collarbiz_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'collarbiz_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'collarbiz' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'collarbiz_theme_options[pagination_type]', array(
	'default'          	=> collarbiz_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'collarbiz_sanitize_select',
) );

$wp_customize->add_control( 'collarbiz_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'collarbiz' ),
		'numeric' 		=> esc_html__( 'Numeric', 'collarbiz' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_date]', array(
	'default'           => collarbiz_theme_option( 'show_date' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_category]', array(
	'default'           => collarbiz_theme_option( 'show_category' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_author]', array(
	'default'           => collarbiz_theme_option( 'show_author' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'collarbiz_theme_options[show_comment]', array(
	'default'           => collarbiz_theme_option( 'show_comment' ),
	'sanitize_callback' => 'collarbiz_sanitize_switch',
) );

$wp_customize->add_control( new CollarBiz_Switch_Control( $wp_customize, 'collarbiz_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'collarbiz' ),
	'section'           => 'collarbiz_blog_section',
	'on_off_label' 		=> collarbiz_show_options(),
) ) );