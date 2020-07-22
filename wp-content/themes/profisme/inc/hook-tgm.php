<?php
/**
 * Recommended plugins
 *
 * @package profisme
 */

if ( ! function_exists( 'profisme_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function profisme_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'profisme' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => esc_html__('Photo Gallery Builder', 'profisme' ),
                'slug'     => 'photo-gallery-builder',
                'required' => false,
            ),
            array(
                'name'     => esc_html__('social feed gallery portfolio', 'profisme' ),
                'slug'     => 'social-feed-gallery-portfolio',
                'required' => false,
            ),
             array(
                'name'     => esc_html__('Elementor Page Builder', 'profisme' ),
                'slug'     => 'elementor',
                'required' => false,
            ),

             array(
                'name'     => esc_html__( 'Contact Form 7', 'profisme' ),
                'slug'     => 'contact-form-7',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'profisme_recommended_plugins' );
