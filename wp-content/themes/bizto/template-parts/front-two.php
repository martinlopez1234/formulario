<div class="front-two-container">

	<div class="front-two-services">
	
		<?php 
				
				if( 'no' != get_theme_mod('bizto_show_welcome') ): 
				
				$biztoWelcomePostTitle = '';
				$biztoWelcomePostDesc = '';
				
				if( '' != get_theme_mod('bizto_welcome_post') && 'select' != get_theme_mod('bizto_welcome_post') ){
					
					$biztoWelcomePostId = get_theme_mod('bizto_welcome_post');
					
					if( ctype_alnum($biztoWelcomePostId) ){

						$biztoWelcomePost = get_post( $biztoWelcomePostId );
					
						$biztoWelcomePostTitle = $biztoWelcomePost->post_title;
						$biztoWelcomePostDesc = $biztoWelcomePost->post_excerpt;
						
					}
					
				}
				
				
				
		?>
		<div class="frontpage-welcome-container">

			<h1><?php echo esc_html($biztoWelcomePostTitle); ?></h1>
			<div><?php echo esc_attr($biztoWelcomePostDesc); ?></div>

		</div><!-- .frontpage-welcome-container -->
		<?php endif; ?>	
		
		<div class="biztwo-items">
		
			<?php
				
				if( '' != get_theme_mod('bizto_products_one') && 'select' != get_theme_mod('bizto_products_one') ):
				
				$biztoProductOneTitle = '';
				$biztoProductOneDesc = '';
				$biztoProductOneUrl = '';
				$biztoProductOneImage = '';			
				
				$biztoProductOneId = get_theme_mod('bizto_products_one');
				
				if( ctype_alnum($biztoProductOneId) ){

					$biztoProductOne = get_post( $biztoProductOneId );
				
					$biztoProductOneTitle = $biztoProductOne->post_title;
					$biztoProductOneDesc = $biztoProductOne->post_excerpt;
					$biztoProductOneUrl = get_permalink( $biztoProductOneId );
					
					if( has_post_thumbnail($biztoProductOneId) ){
						$biztoProductOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoProductOneId ), 'full' );
						$biztoProductOneImage = $biztoProductOneImage[0];
					}				
					
				}			
				
			?>
			<div class="biztwo-item">
			
				<div class="biztwo-image">
					
					<?php 

						if( '' != $biztoProductOneImage ){
							echo '<a href="' . esc_url($biztoProductOneUrl) . '"><img src="' . esc_url($biztoProductOneImage) . '" /></a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						}
							
					?>				
					
				</div><!-- .biztwo-image -->
				
				<div class="biztwo-content">
				
					<h3><a href="<?php echo esc_url($biztoProductOneUrl); ?>"><?php echo esc_html($biztoProductOneTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductOneDesc); ?>		
					</div>	
				
				</div><!-- .biztwo-content -->		
			
			</div><!-- .biztwo-item -->
			<?php endif; ?>
			
			<?php
				
				if( '' != get_theme_mod('bizto_products_two') && 'select' != get_theme_mod('bizto_products_two') ):
				
				$biztoProductTwoTitle = '';
				$biztoProductTwoDesc = '';
				$biztoProductTwoUrl = '';
				$biztoProductTwoImage = '';			
				
				$biztoProductTwoId = get_theme_mod('bizto_products_two');
				
				if( ctype_alnum($biztoProductTwoId) ){

					$biztoProductTwo = get_post( $biztoProductTwoId );
				
					$biztoProductTwoTitle = $biztoProductTwo->post_title;
					$biztoProductTwoDesc = $biztoProductTwo->post_excerpt;
					$biztoProductTwoUrl = get_permalink( $biztoProductTwoId );
					
					if( has_post_thumbnail($biztoProductTwoId) ){
						$biztoProductTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoProductTwoId ), 'full' );
						$biztoProductTwoImage = $biztoProductTwoImage[0];
					}				
					
				}			
				
			?>
			<div class="biztwo-item">
			
				<div class="biztwo-image">
					
					<?php 
							
						if( '' != $biztoProductTwoImage ){
							echo '<a href="' . esc_url($biztoProductTwoUrl) . '"><img src="' . esc_url($biztoProductTwoImage) . '" /><a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						} 
							
					?>				
					
				</div><!-- .biztwo-image -->
				
				<div class="biztwo-content">
				
					<h3><a href="<?php echo esc_url($biztoProductTwoUrl); ?>"><?php echo esc_html($biztoProductTwoTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductTwoDesc); ?>		
					</div>	
				
				</div><!-- .biztwo-content -->		
			
			</div><!-- .biztwo-item -->
			<?php endif; ?>

			<?php
				
				if( '' != get_theme_mod('bizto_products_three') && 'select' != get_theme_mod('bizto_products_three') ):
				
				$biztoProductThreeTitle = '';
				$biztoProductThreeDesc = '';
				$biztoProductThreeUrl = '';
				$biztoProductThreeImage = '';			
				
				$biztoProductThreeId = get_theme_mod('bizto_products_three');
				
				if( ctype_alnum($biztoProductThreeId) ){

					$biztoProductThree = get_post( $biztoProductThreeId );
				
					$biztoProductThreeTitle = $biztoProductThree->post_title;
					$biztoProductThreeDesc = $biztoProductThree->post_excerpt;
					$biztoProductThreeUrl = get_permalink( $biztoProductThreeId );
					
					if( has_post_thumbnail($biztoProductThreeId) ){
						$biztoProductThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoProductThreeId ), 'full' );
						$biztoProductThreeImage = $biztoProductThreeImage[0];
					}				
					
				}			
				
			?>
			<div class="biztwo-item">
			
				<div class="biztwo-image">
					
					<?php 
							
						if( '' != $biztoProductThreeImage ){
							echo '<a href="' . esc_url($biztoProductThreeUrl) . '"><img src="' . esc_url($biztoProductThreeImage) . '" /></a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						} 
							
					?>				
					
				</div><!-- .biztwo-image -->
				
				<div class="biztwo-content">
				
					<h3><a href="<?php echo esc_url($biztoProductThreeUrl); ?>"><?php echo esc_html($biztoProductThreeTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductThreeDesc); ?>		
					</div>	
				
				</div><!-- .biztwo-content -->		
			
			</div><!-- .biztwo-item -->
			<?php endif; ?>			
		
		</div><!-- .biztwo-items -->
	
	</div><!-- .front-two-services -->
	
	<div class="front-two-portfolio">
	
		<h3><?php echo __( 'Portfolio', 'bizto' ); ?></h3>
		
		<div class="front-two-portfolio-content">
		
			<?php
				
				if( '' != get_theme_mod('bizto_portfolio_one') && 'select' != get_theme_mod('bizto_portfolio_one') ):
				
				$biztoPortfolioOneTitle = '';
				$biztoPortfolioOneImage = '';			
				
				$biztoPortfolioOneId = get_theme_mod('bizto_portfolio_one');
				
				if( ctype_alnum($biztoPortfolioOneId) ){

					$biztoProductOne = get_post( $biztoPortfolioOneId );
				
					$biztoPortfolioOneTitle = $biztoProductOne->post_title;
					$biztoPortfolioOneUrl = get_permalink( $biztoProductOneId );
					
					if( has_post_thumbnail($biztoPortfolioOneId) ){
						$biztoPortfolioOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoPortfolioOneId ), 'full' );
						$biztoPortfolioOneImage = $biztoPortfolioOneImage[0];
					}				
					
				}			
				
			?>

			<div class="front-two-portfolio-item">
			
				<?php
					
					if( '' != $biztoPortfolioOneImage ){
						
						echo '<img src="' . esc_url( $biztoPortfolioOneImage ) . '" />';
						
					}else{
						
						echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($biztoPortfolioOneTitle); ?></p>
			
			</div><!-- .front-two-portfolio-item -->
			
			<?php endif; ?>	
			
			<?php
				
				if( '' != get_theme_mod('bizto_portfolio_two') && 'select' != get_theme_mod('bizto_portfolio_two') ):
				
				$biztoPortfolioTwoTitle = '';
				$biztoPortfolioTwoImage = '';			
				
				$biztoPortfolioTwoId = get_theme_mod('bizto_portfolio_two');
				
				if( ctype_alnum($biztoPortfolioTwoId) ){

					$biztoProductTwo = get_post( $biztoPortfolioTwoId );
				
					$biztoPortfolioTwoTitle = $biztoProductTwo->post_title;
					$biztoPortfolioTwoUrl = get_permalink( $biztoProductTwoId );
					
					if( has_post_thumbnail($biztoPortfolioTwoId) ){
						$biztoPortfolioTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoPortfolioTwoId ), 'full' );
						$biztoPortfolioTwoImage = $biztoPortfolioTwoImage[0];
					}				
					
				}			
				
			?>

			<div class="front-two-portfolio-item">
			
				<?php
					
					if( '' != $biztoPortfolioTwoImage ){
						
						echo '<img src="' . esc_url( $biztoPortfolioTwoImage ) . '" />';
						
					}else{
						
						echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($biztoPortfolioTwoTitle); ?></p>
			
			</div><!-- .front-two-portfolio-item -->
			
			<?php endif; ?>	

			<?php
				
				if( '' != get_theme_mod('bizto_portfolio_three') && 'select' != get_theme_mod('bizto_portfolio_three') ):
				
				$biztoPortfolioThreeTitle = '';
				$biztoPortfolioThreeImage = '';			
				
				$biztoPortfolioThreeId = get_theme_mod('bizto_portfolio_three');
				
				if( ctype_alnum($biztoPortfolioThreeId) ){

					$biztoProductThree = get_post( $biztoPortfolioThreeId );
				
					$biztoPortfolioThreeTitle = $biztoProductThree->post_title;
					$biztoPortfolioThreeUrl = get_permalink( $biztoProductThreeId );
					
					if( has_post_thumbnail($biztoPortfolioThreeId) ){
						$biztoPortfolioThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoPortfolioThreeId ), 'full' );
						$biztoPortfolioThreeImage = $biztoPortfolioThreeImage[0];
					}				
					
				}			
				
			?>

			<div class="front-two-portfolio-item">
			
				<?php
					
					if( '' != $biztoPortfolioThreeImage ){
						
						echo '<img src="' . esc_url( $biztoPortfolioThreeImage ) . '" />';
						
					}else{
						
						echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($biztoPortfolioThreeTitle); ?></p>
			
			</div><!-- .front-two-portfolio-item -->
			
			<?php endif; ?>				
		
		</div><!-- .front-two-portfolio-content -->
	
	</div><!-- .front-two-portfolio -->

</div><!-- .front-two-container -->