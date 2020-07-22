<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package profisme
 */

get_header(); ?>
<!--Team Section-->
<section class="team-section">
	<div class="container">
        <div class="row clearfix">
            
             <div class="content-side col-lg-12">
			 	<div class="blog-classic page-list">
					<?php 
						if( have_posts()) :  the_post();
							the_content(); 
							wp_link_pages( 
								array(
                                'before' => '<p>' . __( 'Pages:', 'profisme' ),
                                'after'  => '</p>',
                                ) 
							);
						endif;
						if( $post->comment_status == 'open' ) { 
							comments_template( '', true ); // show comments 
						}
					?>
				</div><!-- /.posts -->		
			</div>
        </div>
    </div>
</section>
<?php get_footer(); ?>