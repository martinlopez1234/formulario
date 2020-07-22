<?php
$profisme_hide_show_testimonial = get_theme_mod('hide_show_testimonial','1');
$profisme_testimonial_title = get_theme_mod('profisme_testimonial_title','Our Testimonial');
?>
<?php if($profisme_hide_show_testimonial == '1') {?>
   <section class="grey-bg testimonial-3 sp-100">
		<div class="container">
			<div class="row clearfix">
				<!--Title Column-->
				<div class="col-sm-12">
					<?php if(!empty($profisme_testimonial_title)): ?>
					<div class="sec-title mb-55">
						<h2><?php echo esc_html($profisme_testimonial_title);?></h2>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-sm-12">
					<div class="single-item-carousel testi-slider owl-carousel owl-theme">
						<!--Title Column-->
						<?php
						$profisme_testis_no        = 3;
						$profisme_testis_pages      = array();
						for( $i = 1; $i <= $profisme_testis_no; $i++ ) {
							 $profisme_testis_pages[] = get_theme_mod('testimonial_page'.$i); 

						}
						$profisme_testis_args  = array(
						'post_type' => 'page',
						'post__in' => array_map( 'absint', $profisme_testis_pages ),
						'posts_per_page' => absint($profisme_testis_no),
						'orderby' => 'post__in'
						); 
						$profisme_testis_query = new wp_Query( $profisme_testis_args );
						$count = 0;
						while($profisme_testis_query->have_posts() && $count <= 2 ) :
							$profisme_testis_query->the_post();
							?>
						<div class="testimonial-block">
							<div class="inner-box">
								<?php
								if(has_post_thumbnail()):
								?>
								<div class="image-box">
									<div class="image">
										<?php the_post_thumbnail(); ?>
									</div>
								</div>
								<?php endif; ?>
								<?php the_content();
												wp_link_pages( array(
													'before' => '<div class="page-links">' . __( 'Pages:', 'profisme' ),
													'after'  => '</div>',
													 ) );
												 ?>
								<div class="author">- <?php the_title(); ?></div>
								<div class="quote-icon">
									<span class="fa fa-quote-right"></span>
								</div>
							</div>
						</div>
				   <?php
					$count = $count + 1;
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>