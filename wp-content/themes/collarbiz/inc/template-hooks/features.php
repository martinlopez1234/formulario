<?php
/**
 * Features hook
 *
 * @package collarbiz
 */

if ( ! function_exists( 'collarbiz_add_features_section' ) ) :
    /**
    * Add features section
    *
    *@since CollarBiz 1.0.0
    */
    function collarbiz_add_features_section() {

        // Check if features is enabled on frontpage
        $features_enable = apply_filters( 'collarbiz_section_status', 'enable_features', '' );

        if ( ! $features_enable )
            return false;

        // Get features section details
        $section_details = array();
        $section_details = apply_filters( 'collarbiz_filter_features_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render features section now.
        collarbiz_render_features_section( $section_details );
    }
endif;
add_action( 'collarbiz_primary_content_action', 'collarbiz_add_features_section', 50 );


if ( ! function_exists( 'collarbiz_get_features_section_details' ) ) :
    /**
    * features section details.
    *
    * @since CollarBiz 1.0.0
    * @param array $input features section details.
    */
    function collarbiz_get_features_section_details( $input ) {

        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 6; $i++ )  :
            $page_id = collarbiz_theme_option( 'features_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $icons[] = collarbiz_theme_option( 'features_icon_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 6,
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
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-laptop';

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
// features section content details.
add_filter( 'collarbiz_filter_features_section_details', 'collarbiz_get_features_section_details' );


if ( ! function_exists( 'collarbiz_render_features_section' ) ) :
  /**
   * Start features section
   *
   * @return string features content
   * @since CollarBiz 1.0.0
   *
   */
   function collarbiz_render_features_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = collarbiz_theme_option( 'features_title', '' );
        $sub_title = collarbiz_theme_option( 'features_sub_title', '' );

        ?>
    	<div class="case-studies page-section relative left-align">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif;

                        if ( ! empty( $sub_title ) ) : ?>
                            <p class="section-description"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['icon'] ) ) : ?>
                                    <div class="service">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                        </a>
                                    </div><!-- .service -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo esc_html( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #case-studies -->
    <?php 
    }
endif;