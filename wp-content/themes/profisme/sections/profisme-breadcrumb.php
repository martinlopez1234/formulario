<?php 
$profisme_hide_show_breadcrumb= get_theme_mod('hide_show_breadcrumb','1');
?>

<section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php esc_url(header_image()); ?>')" <?php }else{ ?> style="background-image:url('<?php echo esc_url(get_template_directory_uri() .'/assets/images/header.jpg');?>')" <?php } ?>>
	<div class="container">
    	<h1>
    		<?php
    		if(is_home() || is_front_page()) :
                          single_post_title(); 
                    
			elseif ( is_day() ) : 
			
				printf( esc_html__( 'Daily Archives: %s', 'profisme' ), get_the_date() );
			
			elseif ( is_month() ) :
			
				printf( esc_html__( 'Monthly Archives: %s', 'profisme' ), (get_the_date( 'F Y' ) ));
				
			elseif ( is_year() ) :
			
				printf( esc_html__( 'Yearly Archives: %s', 'profisme' ), (get_the_date( 'Y' ) ) );
				
			elseif ( is_category() ) :
			
				printf( esc_html__( 'Category Archives: %s', 'profisme' ), (single_cat_title( '', false ) ));

			elseif ( is_tag() ) :
			
				printf( esc_html__( 'Tag Archives: %s', 'profisme' ), (single_tag_title( '', false ) ));
				
			elseif ( is_404() ) :

				printf( esc_html__( 'Error 404', 'profisme' ));
				
			elseif ( is_author() ) :
			
				printf( esc_html__( 'Author: %s', 'profisme' ), (get_the_author( '', false ) ));		
				
			else :
					the_title();
			endif;
			?>
    	</h1>
		<?php 
		if($profisme_hide_show_breadcrumb == '1') : ?>
		
			<ul class="page-breadcrumb">
				<?php if (function_exists('profisme_breadcrumbs')) profisme_breadcrumbs();?>
			</ul>
		<?php 			
			endif;
		?>	
    </div>
</section>