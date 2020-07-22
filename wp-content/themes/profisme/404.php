<?php
/**
 * The template for displaying the 404 template in the Profisme
 *
 * @subpackage Profisme
 * @since Profisme
 */

get_header();
?>

<!--Error Section-->
<section class="error-section">
    <div class="container">
        <div class="content">
            <h1><?php esc_html_e( '404', 'profisme' ); ?></h1>
            <h2><?php esc_html_e( 'Oops! That page can not be found', 'profisme' ); ?></h2>
            <div class="text"><?php esc_html_e( 'Sorry, but the page you are looking for does not existing', 'profisme' ); ?></div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Home', 'profisme' ); ?></a>
        </div>
    </div>
</section>
<!--End Error Section-->
<?php
get_footer(); ?>