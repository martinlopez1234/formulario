<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package collarbiz
 */

/**
 * collarbiz_site_content_ends_action hook
 *
 * @hooked collarbiz_site_content_ends -  10
 *
 */
do_action( 'collarbiz_site_content_ends_action' );

/**
 * collarbiz_footer_start_action hook
 *
 * @hooked collarbiz_footer_start -  10
 *
 */
do_action( 'collarbiz_footer_start_action' );

/**
 * collarbiz_site_info_action hook
 *
 * @hooked collarbiz_site_info -  10
 *
 */
do_action( 'collarbiz_site_info_action' );

/**
 * collarbiz_footer_ends_action hook
 *
 * @hooked collarbiz_footer_ends -  10
 * @hooked collarbiz_slide_to_top -  20
 *
 */
do_action( 'collarbiz_footer_ends_action' );

/**
 * collarbiz_page_ends_action hook
 *
 * @hooked collarbiz_page_ends -  10
 *
 */
do_action( 'collarbiz_page_ends_action' );

wp_footer();

/**
 * collarbiz_body_html_ends_action hook
 *
 * @hooked collarbiz_body_html_ends -  10
 *
 */
do_action( 'collarbiz_body_html_ends_action' );
