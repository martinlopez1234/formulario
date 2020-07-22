<?php
/**
 * Skills hook
 *
 * @package collarbiz
 */

if ( ! function_exists( 'collarbiz_add_skills_section' ) ) :
    /**
    * Add skills section
    *
    *@since CollarBiz 1.0.0
    */
    function collarbiz_add_skills_section() {

        // Check if skills is enabled on frontpage
        $skills_enable = apply_filters( 'collarbiz_section_status', 'enable_skills', '' );

        if ( ! $skills_enable )
            return false;

        // Get skills section details
        $section_details = array();
        $section_details = apply_filters( 'collarbiz_filter_skills_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render skills section now.
        collarbiz_render_skills_section( $section_details );
    }
endif;
add_action( 'collarbiz_primary_content_action', 'collarbiz_add_skills_section', 40 );


if ( ! function_exists( 'collarbiz_get_skills_section_details' ) ) :
    /**
    * skills section details.
    *
    * @since CollarBiz 1.0.0
    * @param array $input skills section details.
    */
    function collarbiz_get_skills_section_details( $input ) {

        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 3; $i++ )  :
            $page_id = collarbiz_theme_option( 'skills_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $icons[] = collarbiz_theme_option( 'skills_icon_' . $i );
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
                $page_post['excerpt']   = collarbiz_trim_content( 10 );
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-bar-chart';

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
// skills section content details.
add_filter( 'collarbiz_filter_skills_section_details', 'collarbiz_get_skills_section_details' );


if ( ! function_exists( 'collarbiz_render_skills_section' ) ) :
  /**
   * Start skills section
   *
   * @return string skills content
   * @since CollarBiz 1.0.0
   *
   */
   function collarbiz_render_skills_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $background = collarbiz_theme_option( 'skills_image', '' );
        $title = collarbiz_theme_option( 'skills_title', '' );
        $video = collarbiz_theme_option( 'skills_video', '' );

        ?>

        <div id="skills" class="page-section relative" <?php if ( ! empty( $background ) ) { echo 'style="background-image: url(' . esc_url( $background ) . ')"'; } ?>>
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="section-content left-align <?php echo empty( $video ) ? 'video-disabled' : ''; ?>">
                        <?php if ( ! empty( $video ) ) : ?>
                            <div class="skills-background">
                                <?php echo wp_video_shortcode( array( 'src' => esc_url( $video ), 'height' => 500, 'width' => 750 ) ); ?>
                            </div>
                            <!-- .skills-background -->
                        <?php endif; ?>
                        
                        <div class="skills-container">
                            <?php if ( ! empty( $title ) ) : ?>
                                <div class="section-header ">
                                    <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                                </div>
                                <!-- .section-header -->
                            <?php endif; ?>

                            <div class="skills-content column-3">
                                <?php foreach ( $content_details as $content ) : ?>
                                    <article class="hentry">
                                        <div class="post-wrapper">
                                            <div class="featured-image">
                                                 <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                            </div>
                                            <!-- .featured-image -->
                                
                                            <div class="entry-container">
                                                <header class="entry-header">
                                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                                </header>
                                                <div class="entry-content">
                                                    <?php echo esc_html( $content['excerpt'] ); ?>
                                                </div>
                                                <!-- .entry-content -->
                                            </div>
                                            <!-- .entry-container -->
                                        </div>
                                        <!-- .post-wrapper -->
                                    </article>
                                <?php endforeach; ?>
                            </div>
                            <!-- .section-content -->
                        </div>
                        <!-- .skills-container -->
                    </div>
                    <!-- .section-content -->
                </div>
                <!-- .wrapper -->
            </div>
            <!-- #skills -->
    <?php 
    }
endif;