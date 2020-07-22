<?php
/**
 * demo import
 *
 * @package collarbiz
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function collarbiz_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for CollarBiz Theme.', 'collarbiz' ),
    esc_url( 'https://sharkthemes.com/downloads/collarbiz' ), esc_html__( 'Click Here', 'collarbiz' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'collarbiz_intro_text' );
