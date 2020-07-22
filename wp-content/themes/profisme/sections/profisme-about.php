<?php
$profisme_hide_show_about = get_theme_mod('hide_show_about','1');
?>
<?php if($profisme_hide_show_about == '1') {?>
<section class="services-section sp-100-70">
	<div class="container">
		<div class="row clearfix">
			<?php
			
			$profisme_about_pages      = array();
			$profisme_about_pages[] = get_theme_mod('about_page'); 
			$profisme_about_args  = array(
			'post_type' => 'page',
			'post__in' => array_map( 'absint', $profisme_about_pages ),
			'posts_per_page' => '1',
			'orderby' => 'post__in'
			); 
			$profisme_about_query = new wp_Query( $profisme_about_args );
			while($profisme_about_query->have_posts() ) :
				$profisme_about_query->the_post();
				?>
				<?php if(has_post_thumbnail()) : ?>
					<div class="services-column col-md-5 col-sm-6 col-xs-12">
						<div class="image">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="<?php if(!has_post_thumbnail()){?>title-column col-md-12 col-sm-6 col-xs-12<?php } else { ?>title-column col-md-7 col-sm-6 col-xs-12<?php } ?>">
					<div class="inner-column">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
						<?php 
					 wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'profisme' ),
					'after'  => '</div>',
					 ) );?>
					</div>
				</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php } ?>