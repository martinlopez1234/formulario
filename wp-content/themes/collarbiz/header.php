<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package collarbiz
 */

/**
 * collarbiz_doctype_action hook
 *
 * @hooked collarbiz_doctype -  10
 *
 */
do_action( 'collarbiz_doctype_action' );

/**
 * collarbiz_head_action hook
 *
 * @hooked collarbiz_head -  10
 *
 */
do_action( 'collarbiz_head_action' );

/**
 * collarbiz_body_start_action hook
 *
 * @hooked collarbiz_body_start -  10
 *
 */
do_action( 'collarbiz_body_start_action' );
 
/**
 * collarbiz_page_start_action hook
 *
 * @hooked collarbiz_page_start -  10
 * @hooked collarbiz_loader -  20
 *
 */
do_action( 'collarbiz_page_start_action' );

/**
 * collarbiz_header_start_action hook
 *
 * @hooked collarbiz_header_start -  10
 *
 */
do_action( 'collarbiz_header_start_action' );

/**
 * collarbiz_site_branding_action hook
 *
 * @hooked collarbiz_site_branding -  10
 *
 */
do_action( 'collarbiz_site_branding_action' );

/**
 * collarbiz_primary_nav_action hook
 *
 * @hooked collarbiz_primary_nav -  10
 *
 */
do_action( 'collarbiz_primary_nav_action' );

/**
 * collarbiz_header_ends_action hook
 *
 * @hooked collarbiz_header_ends -  10
 *
 */
do_action( 'collarbiz_header_ends_action' );

/**
 * collarbiz_site_content_start_action hook
 *
 * @hooked collarbiz_site_content_start -  10
 *
 */
do_action( 'collarbiz_site_content_start_action' );

/**
 * collarbiz_primary_content_action hook
 *
 * @hooked collarbiz_add_slider_section -  10
 *
 */
do_action( 'collarbiz_primary_content_action' );