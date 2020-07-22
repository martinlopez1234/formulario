<?php
/**
 * Functions which construct the theme by hooking into WordPress
 *
 * @package collarbiz
 */


/*------------------------------------------------
            HEADER HOOK
------------------------------------------------*/

if ( ! function_exists( 'collarbiz_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_doctype() { ?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php }
endif;
add_action( 'collarbiz_doctype_action', 'collarbiz_doctype', 10 );

if ( ! function_exists( 'collarbiz_head' ) ) :
	/**
	 * head Codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_head() { ?>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>
	<?php }
endif;
add_action( 'collarbiz_head_action', 'collarbiz_head', 10 );

if ( ! function_exists( 'collarbiz_body_start' ) ) :
	/**
	 * Body start codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_body_start() { ?>
		<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
	<?php }
endif;
add_action( 'collarbiz_body_start_action', 'collarbiz_body_start', 10 );


if ( ! function_exists( 'collarbiz_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_page_start() { ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'collarbiz' ); ?></a>
	<?php }
endif;
add_action( 'collarbiz_page_start_action', 'collarbiz_page_start', 10 );


if ( ! function_exists( 'collarbiz_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_header_start() { 
		$sticky_header = collarbiz_theme_option( 'enable_sticky_header' ) ? 'sticky-header' : ''; 
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $sticky_header ); ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'collarbiz_header_start_action', 'collarbiz_header_start', 10 );


if ( ! function_exists( 'collarbiz_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_site_branding() { ?>
		<div class="site-menu">
            <div class="container">
				<div class="site-branding pull-left">
					<?php
					// site logo
					the_custom_logo();
					?>
					<div class="site-details">
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-details -->
				</div><!-- .site-branding -->
	<?php }
endif;
add_action( 'collarbiz_site_branding_action', 'collarbiz_site_branding', 10 );


if ( ! function_exists( 'collarbiz_primary_nav' ) ) :
	/**
	 * Primary nav codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_primary_nav() { ?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'collarbiz' ); ?></span>
            <svg viewBox="0 0 40 40" class="icon-menu">
                <g>
                    <rect y="7" width="40" height="2"/>
                    <rect y="19" width="40" height="2"/>
                    <rect y="31" width="40" height="2"/>
                </g>
            </svg>
            <?php echo collarbiz_get_svg( array( 'icon' => 'close' ) ); ?>
        </button>

        <?php  
    	$menu_btn_label = collarbiz_theme_option( 'menu_btn_label', '' );
    	$menu_btn_link = collarbiz_theme_option( 'menu_btn_link', '' );
    	$menu_btn = '';

        if ( collarbiz_theme_option( 'show_menu_botton' ) ) : 
        	if ( ! empty( $menu_btn_label ) && ! empty( $menu_btn_link ) ) : 
        		$menu_btn .= '<li><a class="read-more" href="' . esc_url( $menu_btn_link ) . '">' . esc_html( $menu_btn_label ) . '</a></li>';
        		?>
		        <div class="head-right btn-right">
		            <a class="read-more" href="<?php echo esc_url( $menu_btn_link ); ?>"><?php echo esc_html( $menu_btn_label ); ?></a>
		        </div><!-- .main-right-header -->
		    <?php endif; 
		endif; ?>

		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'fallback_cb' => 'collarbiz_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $menu_btn . '</ul>',
				) );
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .container -->
        </div><!-- .site-menu -->
	<?php }
endif;
add_action( 'collarbiz_primary_nav_action', 'collarbiz_primary_nav', 10 );


if ( ! function_exists( 'collarbiz_header_ends' ) ) :
	/**
	 * Header ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_header_ends() { ?>
		</div><!-- .wrapper -->
		</header><!-- #masthead -->
	<?php }
endif;
add_action( 'collarbiz_header_ends_action', 'collarbiz_header_ends', 10 );


if ( ! function_exists( 'collarbiz_site_content_start' ) ) :
	/**
	 * Site content start codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_site_content_start() { ?>
		<div id="content" class="site-content">
	<?php }
endif;
add_action( 'collarbiz_site_content_start_action', 'collarbiz_site_content_start', 10 );


/**
 * Display custom header title in frontpage and blog
 */
function collarbiz_custom_header_title() {
	if ( is_home() && is_front_page() ) : 
		$title = collarbiz_theme_option( 'latest_blog_title', 'Blogs' ); ?>
		<h2><?php echo esc_html( $title ); ?></h2>
	<?php elseif ( is_singular() || ( is_home() && ! is_front_page() ) ): ?>
		<h2><?php single_post_title(); ?></h2>
	<?php elseif ( class_exists( 'WooCommerce' ) && is_shop() ) : ?>
    	<h2><?php woocommerce_page_title(); ?></h2>
    <?php elseif ( is_archive() ) : 
		the_archive_title( '<h2>', '</h2>' );
	elseif ( is_search() ) : ?>
		<h2><?php printf( esc_html__( 'Search Results for: %s', 'collarbiz' ), get_search_query() ); ?></h2>
	<?php elseif ( is_404() ) :
		echo '<h2>' . esc_html__( 'Oops! That page can&#39;t be found.', 'collarbiz' ) . '</h2>';
	endif;
}


if ( ! function_exists( 'collarbiz_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_add_breadcrumb() {
		// Bail if Breadcrumb disabled.
		if ( ! collarbiz_theme_option( 'enable_breadcrumb' ) ) {
			return;
		}
		
		// Bail if Home Page.
		if ( ! is_home() && is_front_page() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * collarbiz_breadcrumb hook
				 *
				 * @hooked collarbiz_breadcrumb -  10
				 *
				 */
				do_action( 'collarbiz_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;


if ( ! function_exists( 'collarbiz_custom_header' ) ) :
	/**
	 * Site content codes
	 *
	 * @since CollarBiz 1.0.0
	 *
	 */
	function collarbiz_custom_header() {
		if ( ! is_home() && is_front_page() ) {
			return;
		}
		
		$image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/uploads/banner.jpg';
		if ( is_singular() ) {
			$image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $image;
		}
		?>

		<div class="inner-header-image" style="background-image:url( '<?php echo esc_url( $image ); ?>')">
            <div class="overlay"></div>
            <div class="wrapper">
                <div class="custom-header-content <?php echo is_singular() ? 'align-center' : ''; ?>">
                	<?php if ( is_single() ) : ?>
	                    <header class="entry-header">
	                        <div class="entry-meta">
	                        	<span class="cat-links">
		                            <?php collarbiz_the_category(); ?>
		                        </span>
	                        </div><!-- .entry-meta -->
	                    </header><!-- .entry-header -->
	                <?php endif; ?>
                    
                    <?php 
                    	echo collarbiz_custom_header_title(); 
                    	if ( ! is_singular() ) :
                    		collarbiz_add_breadcrumb();
                		endif;
                	?>

                    <?php if ( is_single() ) : ?>
	                    <div class="entry-meta">
	                        <?php collarbiz_posted_on(); ?>
	                    </div><!-- .entry-meta-->  
	                <?php endif; ?>
                </div><!-- .custom-header-content-->  
            </div> <!-- .wrapper -->
        </div><!-- .custom-header-content-wrapper-->


		<?php
	}
endif;
add_action( 'collarbiz_site_content_start_action', 'collarbiz_custom_header', 20 );


/*------------------------------------------------
            FOOTER HOOK
------------------------------------------------*/

if ( ! function_exists( 'collarbiz_site_content_ends' ) ) :
	/**
	 * Site content ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_site_content_ends() { ?>
		</div><!-- #content -->
	<?php }
endif;
add_action( 'collarbiz_site_content_ends_action', 'collarbiz_site_content_ends', 10 );


if ( ! function_exists( 'collarbiz_footer_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_footer_start() { ?>
		<footer id="colophon" class="site-footer">
	<?php }
endif;
add_action( 'collarbiz_footer_start_action', 'collarbiz_footer_start', 10 );


if ( ! function_exists( 'collarbiz_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_site_info() { 
		$copyright = collarbiz_theme_option('copyright_text');
		?>
		<div class="site-info">
            <div class="wrapper">
            	<?php if ( ! empty( $copyright ) ) : ?>
	                <div class="copyright">
	                	<p>
	                    	<?php 
	                    	echo collarbiz_santize_allow_tags( $copyright ); 

	                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                    	?>
	                    </p>
	                </div><!-- .copyright -->
	            <?php endif; ?>
	            <div class="powered-by">
	            	<p><?php printf( esc_html__( ' CollarBiz by %1$s Shark Themes %2$s', 'collarbiz' ), '<a href="' . esc_url( 'http://sharkthemes.com/' ) . '" target="_blank">','</a>' ); ?></p>
	            </div>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php }
endif;
add_action( 'collarbiz_site_info_action', 'collarbiz_site_info', 10 );


if ( ! function_exists( 'collarbiz_footer_ends' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_footer_ends() { ?>
		</footer><!-- #colophon -->
	<?php }
endif;
add_action( 'collarbiz_footer_ends_action', 'collarbiz_footer_ends', 10 );


if ( ! function_exists( 'collarbiz_slide_to_top' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_slide_to_top() { ?>
		<div class="backtotop">
            <?php echo collarbiz_get_svg( array( 'icon' => 'up' ) ); ?>
        </div><!-- .backtotop -->
	<?php }
endif;
add_action( 'collarbiz_footer_ends_action', 'collarbiz_slide_to_top', 20 );


if ( ! function_exists( 'collarbiz_page_ends' ) ) :
	/**
	 * Page ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_page_ends() { ?>
		</div><!-- #page -->
	<?php }
endif;
add_action( 'collarbiz_page_ends_action', 'collarbiz_page_ends', 10 );


if ( ! function_exists( 'collarbiz_body_html_ends' ) ) :
	/**
	 * Body & Html ends codes
	 *
	 * @since CollarBiz 1.0.0
	 */
	function collarbiz_body_html_ends() { ?>
		</body>
		</html>
	<?php }
endif;
add_action( 'collarbiz_body_html_ends_action', 'collarbiz_body_html_ends', 10 );
