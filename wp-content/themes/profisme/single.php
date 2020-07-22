<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Profisme
 * @since Profisme
 */

get_header();
?>
<!--Sidebar Page Container-->
<div class="bg-w sp-100">
	<div class="container">
    	<div class="row clearfix">            	
            <!--Content Side / Our Blog-->
            <div class="content-side col-md-9 col-sm-12 col-xs-12">
            	<div class="blog-single blog-detail padding-right">
            		<?php if( have_posts() ): ?>
            			<?php while( have_posts() ): the_post(); ?>
							<div class="inner-box">
								<?php if(has_post_thumbnail()) : ?>
			                    	<div class="image">
			                        	<?php the_post_thumbnail(); ?>
			                        </div>
			                    <?php endif; ?>
		                        <div class="lower-content">
		                            <ul class="post-info">
		                                <?php 
										profisme_posted_by();

                                      	profisme_posted_on();

                                        profisme_entry_footer(); 
                                         ?>
		                                
		                             </ul>
		                            <h3><?php the_title(); ?></h3>
		                            <div class="text page-list">
		                            	<?php the_content(); ?>
		                            	<?php 
				                         wp_link_pages( array(
				                        'before' => '<div class="page-links">' . __( 'Pages:', 'profisme' ),
				                        'after'  => '</div>',
				                         ) );?>
		                            </div>                              
		                        </div>
		                    </div>
		                <?php endwhile; endif; ?>
                    
                </div>
                
                <?php comments_template( '', true ); // show comments  ?>
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
<!--End Sidebar Page Container-->
<?php get_footer(); ?>