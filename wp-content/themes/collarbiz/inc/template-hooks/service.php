<?php
/**
 * Service hook
 *
 * @package collarbiz
 */

if ( ! function_exists( 'collarbiz_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since CollarBiz 1.0.0
    */
    function collarbiz_add_service_section() {

        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'collarbiz_section_status', 'enable_service', '' );

        if ( ! $service_enable )
            return false;

        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'collarbiz_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render service section now.
        collarbiz_render_service_section( $section_details );
    }
endif;
add_action( 'collarbiz_primary_content_action', 'collarbiz_add_service_section', 30 );


if ( ! function_exists( 'collarbiz_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since CollarBiz 1.0.0
    * @param array $input service section details.
    */
    function collarbiz_get_service_section_details( $input ) {

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ )  :
            $page_id = collarbiz_theme_option( 'service_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = collarbiz_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// service section content details.
add_filter( 'collarbiz_filter_service_section_details', 'collarbiz_get_service_section_details' );


if ( ! function_exists( 'collarbiz_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since CollarBiz 1.0.0
   *
   */
   function collarbiz_render_service_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = collarbiz_theme_option( 'service_title', '' );
        $sub_title = collarbiz_theme_option( 'service_sub_title', '' );
        $readmore = collarbiz_theme_option( 'service_readmore_label', '' );

        ?>
    	<div class="our-services page-section relative">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif;

                        if ( ! empty( $sub_title ) ) : ?>
                            <p class="section-description"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container align-center">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( ! empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif;

                                    if ( ! empty( $readmore ) ) : ?>
                                        <a class="read-more" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $readmore ); ?></a>
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;