<?php
$profisme_banner_background_setting= get_theme_mod('banner_background_setting',get_template_directory_uri() .'/assets/images/header.jpg'); 
$profisme_hide_show_banner = get_theme_mod('hide_show_banner','1');
$profisme_btn = get_theme_mod('profisme_btn','');
$profisme_btn_url = get_theme_mod('profisme_btn_url','');
?>
<?php if($profisme_hide_show_banner == '1') {?>
<?php
	$profisme_banner_no        = 1;
	$profisme_banner_pages      = array();
	for( $i = 1; $i <= $profisme_banner_no; $i++ ) {
		 $profisme_banner_pages[] = get_theme_mod('banner_page'.$i);

	}
	$profisme_banner_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $profisme_banner_pages ),
	'posts_per_page' => absint($profisme_banner_no),
	'orderby' => 'post__in'
	); 
	$profisme_banner_query = new wp_Query( $profisme_banner_args );
	while($profisme_banner_query->have_posts()) :
		$profisme_banner_query->the_post();
		?>

	<section class="theme-banner" style="background-image:url('<?php echo esc_url(the_post_thumbnail_url());?>')">
	   <div class="slide-table">
		<div class="slide-table-cell">
			<div class="container">
				<div class="banner-content">
					<h2><?php the_title();?></h2>
					 <p><?php the_excerpt();?> </p>
					 
					<?php if(!empty($profisme_btn && $profisme_btn_url)): ?>
					<a href="<?php echo esc_url($profisme_btn_url); ?>" class="theme-btn btn-style-one one">
						<?php echo esc_html($profisme_btn);?></a>  
					<?php endif; ?>                      
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
endwhile;
wp_reset_postdata();
 }  else {

profisme_breadcrumbs_style();
?>

<?php
 } ?>