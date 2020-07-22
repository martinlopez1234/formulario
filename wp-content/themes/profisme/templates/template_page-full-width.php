<?php
/**
Template Name: Page Fullwidth
**/

get_header();
?>

<section class="team-section">
	<div class="container">
        <div class="row">		
			<div class="content-side col-md-12 col-sm-12" >
				<div class="blog-classic">
					<?php the_post(); the_content(); ?>
				</div>
				 <?php 
					if( $post->comment_status == 'open' ) { 
						comments_template( '', true ); // show comments 
					}
				?>	
			</div><!-- /.col -->	
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>