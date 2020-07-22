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

	<div class="bizone-items">

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
			<div class="bizone-item">
			
				<div class="bizone-image">
					
					<?php 

						if( '' != $biztoProductOneImage ){
							echo '<a href="' . esc_url($biztoProductOneUrl) . '"><img src="' . esc_url($biztoProductOneImage) . '" /></a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						}
							
					?>				
					
				</div><!-- .bizone-image -->
				
				<div class="bizone-content">
				
					<h3><a href="<?php echo esc_url($biztoProductOneUrl); ?>"><?php echo esc_html($biztoProductOneTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductOneDesc); ?>		
					</div>	
				
				</div><!-- .bizone-content -->		
			
			</div><!-- .bizone-item -->
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
			<div class="bizone-item">
			
				<div class="bizone-image">
					
					<?php 
							
						if( '' != $biztoProductTwoImage ){
							echo '<a href="' . esc_url($biztoProductTwoUrl) . '"><img src="' . esc_url($biztoProductTwoImage) . '" /><a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						} 
							
					?>				
					
				</div><!-- .bizone-image -->
				
				<div class="bizone-content">
				
					<h3><a href="<?php echo esc_url($biztoProductTwoUrl); ?>"><?php echo esc_html($biztoProductTwoTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductTwoDesc); ?>		
					</div>	
				
				</div><!-- .bizone-content -->		
			
			</div><!-- .bizone-item -->
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
			<div class="bizone-item">
			
				<div class="bizone-image">
					
					<?php 
							
						if( '' != $biztoProductThreeImage ){
							echo '<a href="' . esc_url($biztoProductThreeUrl) . '"><img src="' . esc_url($biztoProductThreeImage) . '" /></a>';
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/service.jpg" />';
						} 
							
					?>				
					
				</div><!-- .bizone-image -->
				
				<div class="bizone-content">
				
					<h3><a href="<?php echo esc_url($biztoProductThreeUrl); ?>"><?php echo esc_html($biztoProductThreeTitle); ?></a></h3>
					<div>
						<?php echo esc_html($biztoProductThreeDesc); ?>		
					</div>	
				
				</div><!-- .bizone-content -->		
			
			</div><!-- .bizone-item -->
			<?php endif; ?>		

	</div>