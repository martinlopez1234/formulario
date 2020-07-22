<?php
// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
<section class="services-section sp-100-70">
	<div class="container">
		<div class="row clearfix">
			<div class="entry-content-page">
				<?php the_content(); ?> <!-- Page Content -->
			</div><!-- .entry-content-page -->
		</div>
	</div>
</section>
<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
?>