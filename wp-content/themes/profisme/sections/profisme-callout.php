<?php
$profisme_hide_show_callout = get_theme_mod('hide_show_callout','1');
$profisme_co_btn = get_theme_mod('profisme_co_btn','');
$profisme_co_btn_url = get_theme_mod('profisme_co_btn_url','');

if($profisme_hide_show_callout == '1') {?>
<?php
	$profisme_co_banner_no        = 1;
	$profisme_co_banner_pages      = array();
    $profisme_co_banner_pages[] = get_theme_mod('callout_page');
	$profisme_co_banner_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $profisme_co_banner_pages ),
	'posts_per_page' => absint($profisme_co_banner_no),
	'orderby' => 'post__in'
	); 
	$profisme_co_banner_query = new wp_Query( $profisme_co_banner_args );
	while($profisme_co_banner_query->have_posts()) :
		$profisme_co_banner_query->the_post();
		?>
		<section class="call-to-action style-two">
			<div class="container">
				<h2><?php the_title(); ?></h2>
				<?php the_content();?>
				<?php if(!empty($profisme_co_btn && $profisme_co_btn_url)): ?>	
					<div class="pull-center co-btz">
						<a href="<?php echo esc_url($profisme_co_btn_url); ?>" class="theme-btn btn-style-two"><?php echo esc_html($profisme_co_btn);?></a>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php 
endwhile;
wp_reset_postdata();
 } ?>