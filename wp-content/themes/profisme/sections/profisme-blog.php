<?php 
	$profisme_hide_show_blog = get_theme_mod('hide_show_blog','1');
	$profisme_blog_title = get_theme_mod('profisme_blog_title','Our Blog');
?>
<?php if($profisme_hide_show_blog == '1') {?>
	<section class="news-section sp-100-70">
	    <div class="container">
		        <div class="row clearfix">
		            <div class="col-sm-12">
		            	<?php if(!empty($profisme_blog_title)): ?>
		                <div class="sec-title mb-55">
		                    <h2><?php echo esc_html($profisme_blog_title); ?></h2>
		                </div>
		            	<?php endif; ?>
		            </div>
		        </div>
	        <div class="row clearfix">
	        	<?php 	
				$profisme_latest_blog_posts = new WP_Query( array(
				'posts_per_page' => absint( get_theme_mod( 'number_post_show', 3 ) ),
				'ignore_sticky_posts'   => 1) );
        		if ( $profisme_latest_blog_posts->have_posts() ) {
        			while ( $profisme_latest_blog_posts->have_posts() ) : $profisme_latest_blog_posts->the_post();  ?>
			            <div class="news-block col-md-4 col-sm-6 col-xs-12">
			                <div class="inner-box">
			                	<?php if ( has_post_thumbnail() ) { ?>
				                    <figure class="image">
				                        <a href="<?php the_permalink(); ?>">
				                            <?php the_post_thumbnail(); ?>
				                        </a>
				                    </figure>
				                <?php } ?>
			                    <div class="lower-box">
		                            <ul class="post-info">
                                      <?php 
										profisme_posted_by();
                                      	profisme_posted_on();
                                      	?>
		                            </ul>

			                        <?php     
										if ( is_single() ) :
										
										the_title('<h3>', '</h3>' );
										else:
										the_title( sprintf( '<h3><a href="%s" rel="bookmark">', get_permalink()  ), '</a></h3>' );
										endif; 
									?>
			                        <a href="<?php the_permalink(); ?>" class="theme-btn read-more"><?php echo  esc_html( 'Read More', 'profisme' ) ?></a>
			                    </div>
			                </div>
			            </div>
			        <?php 
					endwhile; 
					wp_reset_postdata(); 
				}
				?>
			</div>
	    </div>
	</section>
<?php } ?>