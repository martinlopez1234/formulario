<?php get_header(); ?>
		<!-- Breadcrumbs index.php -->
			<?php get_template_part('breadcrumb'); ?>
		<!-- Breadcrumbs-->

		<section class="blog1 site-content" id="main-content">
			<div class="container">
				<div class="row">
					<?php
					// Initialize Variable
					$businessblogs_layout_style = "col-md-12 col-sm-12 col-xs-12";
					$businessblogs_page_layout_style = get_theme_mod('businessblogs_page_layout_style', 'rightsidebar') ;
					
					// Check Sidebar Column Condition
					if( $businessblogs_page_layout_style == "rightsidebar" || $businessblogs_page_layout_style == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
						$businessblogs_layout_style = "col-md-8 col-sm-6 col-xs-12";
					}
					?>
					<?php if($businessblogs_page_layout_style == "leftsidebar") { ?>
						<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
							<!--Sidebar Widget-->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="sidebar">
									<?php dynamic_sidebar('sidebar-widget') ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				<div class="<?php echo esc_attr($businessblogs_layout_style); ?>">
					<?php
					if(have_posts()) :
						while (have_posts()) : the_post(); ?>
						<div class="blog_medium">
							<article class="post <?php //if(!$url) { echo "no_images"; } ?>">
								<div class="post_date">
									<span class="day"><?php the_time('j'); ?></span>
									<span class="month"><?php the_time('M'); ?></span>
								</div>
								<?php if(has_post_thumbnail( $post->ID )) { ?>
								<figure class="post_img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</figure>
								<?php } ?>
								<div class="post_content <?php if(has_post_thumbnail($post->ID) == "") { ?> no-image <?php } ?>">
									<div class="post_meta">
										<h2>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<div class="metaInfo">
											<span><i class="fa fa-user"></i> <?php esc_html_e('By', 'businessblogs') ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> </span>
											<?php
											if( get_the_tags() ){
												echo '<span><i class="fa fa-tag"></i> <a href="#">';
												ucwords( the_tags( '',', ','' ) );
												echo '</a> </span>';
											} ?>
										</div>
									</div>
									<?php the_excerpt(); ?>
								</div>
							</article>
						</div>
					<?php
						endwhile;
						// Reset Post Data
						wp_reset_postdata();
					endif;
					?>
					<div style="text-align: center;" class="col-md-12 col-sm-12 col-xs-12">
						<?php
							// Custom query loop pagination
						 	the_posts_pagination( array(
								'type'		=> 'list',
								'prev_text'	=> __('Prev', 'businessblogs'),
								'next_text'	=> __('Next', 'businessblogs'),
							) ); 
							?>
					</div>
				</div>
					<?php if($businessblogs_page_layout_style == "rightsidebar") { ?>
						<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
							<!--Sidebar Widget-->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="sidebar">
									<?php dynamic_sidebar('sidebar-widget') ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
<?php get_footer(); ?>