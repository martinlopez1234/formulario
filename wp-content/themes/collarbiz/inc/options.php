<?php
/**
 * Options functions
 *
 * @package collarbiz
 */

if ( ! function_exists( 'collarbiz_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function collarbiz_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'collarbiz' ),
            'off'       => esc_html__( 'No', 'collarbiz' )
        );
        return apply_filters( 'collarbiz_show_options', $arr );
    }
endif;

if ( ! function_exists( 'collarbiz_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function collarbiz_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'collarbiz' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'collarbiz_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function collarbiz_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'collarbiz' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'collarbiz_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function collarbiz_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'collarbiz' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'collarbiz_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function collarbiz_site_layout() {
        $collarbiz_site_layout = array(
            'full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'boxed'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'collarbiz_site_layout', $collarbiz_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'collarbiz_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function collarbiz_sidebar_position() {
        $collarbiz_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/uploads/right.png',
            'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'no-sidebar-content'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'collarbiz_sidebar_position', $collarbiz_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'collarbiz_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function collarbiz_selected_sidebar() {
        $collarbiz_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'collarbiz' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'collarbiz' ),
        );

        $output = apply_filters( 'collarbiz_selected_sidebar', $collarbiz_selected_sidebar );

        return $output;
    }
endif;
