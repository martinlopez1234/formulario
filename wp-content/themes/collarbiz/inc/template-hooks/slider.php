<?php
/**
 * Slider hook
 *
 * @package collarbiz
 */

if ( ! function_exists( 'collarbiz_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since CollarBiz 1.0.0
    */
    function collarbiz_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'collarbiz_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'collarbiz_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        collarbiz_render_slider_section( $section_details );
    }
endif;
add_action( 'collarbiz_primary_content_action', 'collarbiz_add_slider_section', 10 );


if ( ! function_exists( 'collarbiz_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since CollarBiz 1.0.0
    * @param array $input slider section details.
    */
    function collarbiz_get_slider_section_details( $input ) {

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ )  :
            $page_ids[] = collarbiz_theme_option( 'slider_content_page_' . $i );
        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = collarbiz_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'collarbiz_filter_slider_section_details', 'collarbiz_get_slider_section_details' );


if ( ! function_exists( 'collarbiz_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since CollarBiz 1.0.0
   *
   */
   function collarbiz_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_control = collarbiz_theme_option( 'slider_arrow' );
        $slider_auto_play = collarbiz_theme_option( 'slider_auto_play' );
        $slider_btn_label = collarbiz_theme_option( 'slider_btn_label', esc_html__( 'Learn More', 'collarbiz' ) );
        $slider_alt_btn_label = collarbiz_theme_option( 'slider_alt_btn_label', esc_html__( 'Contact Us', 'collarbiz' ) );
        $slider_alt_btn_link = collarbiz_theme_option( 'slider_alt_btn_link', '' );
        ?>
    	<div id="custom-header">
            <div class="section-content banner-slider left-align" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_auto_play ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <div class="custom-header-content">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; 

                                if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                <?php endif; ?>
                                
                                <div class="btn">
                                    <?php if ( ! empty( $slider_btn_label ) ) : ?>
                                        <a class="read-more" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $slider_btn_label ); ?></a>
                                    <?php endif; 

                                    if ( ! empty( $slider_alt_btn_label ) && ! empty( $slider_alt_btn_link ) ) : ?>
                                        <a class="read-more" href="<?php echo esc_url( $slider_alt_btn_link ); ?>"><?php echo esc_html( $slider_alt_btn_label ); ?></a>
                                    <?php endif; ?>
                                </div><!-- .btn -->
                            </div><!-- .custom-header-content -->
                        </div>
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .wrapper -->

        </div><!-- #custom-header -->
    <?php 
    }
endif;