<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Profisme
 * @since Profisme
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */

get_header(); ?>
<!--Sidebar Page Container-->
<div class="bg-w sp-100">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side / Our Blog-->
            <div class="content-side col-md-9 col-sm-12 col-xs-12">
                <div class="blog-classic">
				<?php
				if ( have_posts() ) :				
					/* Start the Loop */
					while ( have_posts() ) : the_post();
	                        get_template_part( 'template-parts/content', 'search' );    
	                     
	                    endwhile; 
	                    ?>
	                    <!--Styled Pagination-->
	                    <ul class="styled-pagination">
	                    	<?php			
							the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-left"></i>',
							'next_text'          => '<i class="fa fa-angle-right"></i>',
							) ); ?>
	                    </ul>
	                <?php 
	                else :
					get_template_part( 'template-parts/content', 'none' );
					endif; ?>
                </div>
            </div>
            <!--Sidebar Side-->
            <div class="sidebar-side col-md-3 col-sm-12 col-xs-12">
                <aside class="sidebar default-sidebar">
                    <?php get_sidebar(); ?> 
				</aside>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); ?>