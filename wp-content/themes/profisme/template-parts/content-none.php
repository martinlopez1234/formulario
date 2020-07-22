<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package profisme
 */

?>

<article class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="post-content">	
			
			<div class="entry-content">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p class="padding-top-30"><?php printf( esc_html( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'profisme' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p class="padding-top-30"><?php echo esc_html( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'profisme' ); ?></p>

				<?php else : ?>

					<p class="padding-top-30"><?php echo esc_html( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'profisme' ); ?></p>
					
				<?php endif; ?>
			</div>
			
		</div>
</article>