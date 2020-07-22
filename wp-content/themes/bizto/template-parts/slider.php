<?php
		
		$biztoHeaderPostTitle = '';
		$biztoHeaderPostDesc = '';
		$biztoHeaderPostUrl = '';
		$biztoHeaderPostImage = '';
		
		if( '' != get_theme_mod('bizto_slider_post') && 'select' != get_theme_mod('bizto_slider_post') ){
			
			$biztoHeaderPostId = get_theme_mod('bizto_slider_post');
			
			if( ctype_alnum($biztoHeaderPostId) ){

				$biztoHeaderPost = get_post( $biztoHeaderPostId );
			
				$biztoHeaderPostTitle = $biztoHeaderPost->post_title;
				$biztoHeaderPostDesc = $biztoHeaderPost->post_excerpt;
				$biztoHeaderPostUrl = get_permalink( $biztoHeaderPostId );
				
				if( has_post_thumbnail($biztoHeaderPostId) ){
					$biztoHeaderPostImage = wp_get_attachment_image_src( get_post_thumbnail_id( $biztoHeaderPostId ), 'full' );
					$biztoHeaderPostImage = $biztoHeaderPostImage[0];
				}
				
			}
			
		}
		
		
		
	?>
	<div class="header-container">
	
		<div class="frontpage-container">
		
			<div class="responsive-container">
			
				<div class="frontpage-image">
					
					<?php 
						
						if( '' != $biztoHeaderPostImage ){
							echo '<img src="' . esc_url($biztoHeaderPostImage) . '" />';
						} 
						
					?>
					
				</div><!-- .frontpage-image -->
				
				<div class="frontpage-text">
					
					<h1><?php echo esc_html($biztoHeaderPostTitle); ?></h1>
					<p><?php echo esc_html($biztoHeaderPostDesc); ?></p>
					<p><a href="<?php echo esc_url($biztoHeaderPostUrl); ?>">Read More</a></p>
					
				</div><!-- .frontpage-text -->			
			
			</div>
		
		</div><!-- .frontpage-container -->
	
	</div><!-- .header-container -->