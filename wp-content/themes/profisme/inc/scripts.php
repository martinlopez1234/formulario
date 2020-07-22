<?php
 /**
 * Enqueue scripts and styles.
 */
function profisme_scripts() {
	
	// Styles

	wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/font-awesome.css');
	wp_enqueue_style('owl',get_template_directory_uri().'/assets/css/owl.css');	
	wp_enqueue_style( 'profisme-style', get_stylesheet_uri() );	
	wp_add_inline_style( 'profisme-style', profisme_inline_styles() );
	wp_enqueue_style('profisme-responsive',get_template_directory_uri().'/assets/css/responsive.css');
	
	 if(is_front_page()== is_page_template( 'templates/template-homepage-construction.php'))
	{
			wp_enqueue_style('profisme-construction',get_template_directory_uri().'/assets/css/profisme-construction.css');
	}
	if(is_front_page()== is_page_template( 'templates/template-homepage-medical.php'))
	{
			wp_enqueue_style('profisme-construction',get_template_directory_uri().'/assets/css/profisme-medical.css');
	}
	
	// Scripts
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '3.3.4', true); 
	
	
	wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.js', array('jquery'), false, true);

	wp_enqueue_script( 'theme-menu-lib-js', get_template_directory_uri() .'/assets/menu/theme-responsive-menu.js', array( 'jquery' ), '3.3.4' , true );
	wp_enqueue_script( 'profisme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', true );

	wp_enqueue_script( 'profisme-script', get_template_directory_uri() . '/assets/js/script.js', array(), false, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'menu-js', get_template_directory_uri() .'/assets/menu/menu.js', array( 'jquery' ), '3.3.4' , true );
}
add_action( 'wp_enqueue_scripts', 'profisme_scripts' );

//Customizer Enqueue for Premium Buttons
function profisme_premium_css()	{
	wp_enqueue_style('profisme-style-customizer',get_template_directory_uri(). '/css/style-customizer.css');
}
add_action('customize_controls_print_styles','profisme_premium_css');