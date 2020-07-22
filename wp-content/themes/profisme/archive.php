<?php
/**
 * The template for displaying the Archieve Page
 *
 * @subpackage Profisme
 * @since Profisme
 */

get_header();
?> 
<div class="bg-w sp-100">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side / Our Blog-->
            <div class="content-side col-md-9 col-sm-12 col-xs-12">
                <div class="blog-classic">

                	<?php
						if ( have_posts() ) :			
							while ( have_posts() ) : the_post();
							get_template_part('template-parts/content', get_post_type());
					?>
                	
                  	<?php endwhile; ?>
					<?php endif; ?>
					<ul class="styled-pagination">
                    	<?php			
						the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-left"></i>',
						'next_text'          => '<i class="fa fa-angle-right"></i>',
						) ); ?>
                        
                    </ul>
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
<?php get_footer(); ?>