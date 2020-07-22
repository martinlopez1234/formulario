<?php
/**
 * The template file for displaying the comments and comment form for the
 * Profisme theme.
 *
 * @subpackage Profisme
 * @since Profisme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/         
      if ( post_password_required() ) {
          return;
      }
      ?>
	<div class="user-comments">
		  <?php if ( have_comments() ) : ?>
			<div class="sec-title type-2">
			  <h2>
				  <?php
					  $profisme_comments_number = get_comments_number();
					  if ( 1 === $profisme_comments_number ) {
						printf( esc_html( 'One thought on &ldquo;%s&rdquo;','profisme' ), get_the_title() );
				  } else{
						  esc_html(printf(
							  _nx('<h2>%1$s Comment found','%1$s comments</h2>',    $profisme_comments_number, 'comments title', 'profisme' ),
							  esc_html(number_format_i18n( $profisme_comments_number ) ),
							  get_the_title()
						  ));
					  }
				  ?>
			  </h2></div>
			 <?php the_comments_navigation(); ?>
			 <ul>
				  <?php
					   wp_list_comments( array(
						   'style'       => 'ul',
						   'short_ping'  => true,
						   'avatar_size' => 42,
						   'callback' => '',
					  ) );
				  ?>
			  </ul>
			  <?php the_comments_navigation(); ?>
		  <?php endif; ?>
		  <?php
			 if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'profisme' ) ) :
			  ?>
			   <p class="no-comments"><?php esc_html( 'Comments are closed.', 'profisme' ); ?></p> 
			  <?php endif; ?>
	  </div>    
	<div class="comment-form">
		<?php
		  comment_form();
		?>
	</div>