<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package profisme
 */
if ( ! function_exists( 'profisme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function profisme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'profisme' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<li>' . $posted_on . '</li>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'profisme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function profisme_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( 'By: %s', 'post author', 'profisme' ),
			'<li><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></li>'
		);

		echo $byline; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */	

	if ( ! function_exists( 'profisme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function profisme_entry_footer() {
		/**
		 *
		 * Translators: %s: post author */
		?>
		<li><?php comments_popup_link( 'No comment', '1 Comment', '% Comments' ); ?></li>
		<?php 			
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'profisme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<li>' . esc_html__( 'Tags: %1$s', 'profisme' ) . '</li>', $tags_list ); // WPCS: XSS OK.
			}
		 ?>
		<?php
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function profisme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'profisme_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'profisme_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so profisme_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so profisme_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in profisme_categorized_blog.
 */
function profisme_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'profisme_categories' );
}
add_action( 'edit_category', 'profisme_category_transient_flusher' );
add_action( 'save_post',     'profisme_category_transient_flusher' );

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'profisme_post_layout' )) :
function profisme_post_layout(){
	if(is_active_sidebar('sidebar-primary'))
		{ echo 'col-lg-9 col-md-12'; } 
	else 
		{ echo 'col-lg-12 col-md-12'; }  
} endif; 


/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('profisme_sticky_menu')):
    function profisme_sticky_menu()
    {
        $is_sticky = get_theme_mod('sticky_header_setting','1');

        if ($is_sticky == '1'):
            return 'sticky-nav';
        else:
            return false;
        endif;
    }
endif;

/**
 * Register Google fonts for profisme.
 */
function profisme_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Raleway:300,400,500,600,700', 'Roboto:300,400,500,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function profisme_scripts_styles() {
    wp_enqueue_style( 'profisme-fonts', profisme_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'profisme_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function profisme_breadcrumbs_style() {
	get_template_part('./sections/profisme','breadcrumb');	
}
 
function profisme_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'profisme_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'profisme_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'profisme_custom_header_setup' );

if ( ! function_exists( 'profisme_header_style' ) ) :
function profisme_header_style() 
{
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		else :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; ?>