<?php
/**
 * bizto Theme Customizer
 *
 * @package bizto
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bizto_customize_register( $wp_customize ) {

	global $biztoPostsPagesArray, $biztoYesNo, $biztoSliderType, $biztoServiceLayouts;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bizto_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bizto_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'bizto_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'bizto'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'bizto_general';
	$wp_customize->get_section( 'background_image' )->panel = 'bizto_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'bizto');
	$wp_customize->get_section( 'header_image' )->panel = 'bizto_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'bizto');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'bizto' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'bizto'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'bizto_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new bizto_Customize_Control_Upgrade(
		$wp_customize,
		'bizto_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'bizto' ),
			'settings'   => 'bizto_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'bizto'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'bizto_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new bizto_Customize_Control_Guide(
		$wp_customize,
		'bizto_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'bizto' ),
			'settings'   => 'bizto_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'bizto'),
		'active_callback' => '',
	) );

	/* Header options */	
	$wp_customize->add_section( 'business_page_header', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'bizto'),
		'active_callback' => 'bizto_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'bizto_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_show_slider',
		array(
			'label'      => __( 'Show header?', 'bizto' ),
			'settings'   => 'bizto_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $biztoYesNo,
		)
	) );

	$wp_customize->add_setting( 'bizto_slider_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_slider_type',
		array(
			'label'      => __( 'Select header type :', 'bizto' ),
			'settings'   => 'bizto_slider_type',
			'priority'   => 20,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $biztoSliderType,
		)
	) );	
	
	$wp_customize->add_setting( 'bizto_slider_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_slider_post',
		array(
			'label'      => __( 'Select post', 'bizto' ),
			'description' => __( 'Select a post/page you want to show in header', 'bizto' ),
			'settings'   => 'bizto_slider_post',
			'priority'   => 30,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );

	/* Welcome options */	
	$wp_customize->add_section( 'business_page_welcome', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Welcome Settings', 'bizto'),
		'active_callback' => 'bizto_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'bizto_show_welcome',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_show_welcome',
		array(
			'label'      => __( 'Show welcome?', 'bizto' ),
			'settings'   => 'bizto_show_welcome',
			'priority'   => 10,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $biztoYesNo,
		)
	) );
	$wp_customize->add_setting( 'bizto_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_welcome_post',
		array(
			'label'      => __( 'Select post', 'bizto' ),
			'description' => __( 'Select a post/page you want to show in welcome section', 'bizto' ),
			'settings'   => 'bizto_welcome_post',
			'priority'   => 20,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );

	/* Products options */
	$wp_customize->add_section( 'business_page_services', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Services Settings', 'bizto'),
		'active_callback' => 'bizto_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'bizto_show_services',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_show_services',
		array(
			'label'      => __( 'Show services?', 'bizto' ),
			'settings'   => 'bizto_show_services',
			'priority'   => 10,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoYesNo,
		)
	) );

	$wp_customize->add_setting( 'bizto_service_layout',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_services_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_service_layout',
		array(
			'label'      => __( 'Select service layout :', 'bizto' ),
			'settings'   => 'bizto_service_layout',
			'priority'   => 11,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoServiceLayouts,
		)
	) );
	
	$wp_customize->add_setting( 'bizto_products_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_products_one',
		array(
			'label'      => __( 'Product one', 'bizto' ),
			'description' => __( 'Select a post/page you want to show in welcome section', 'bizto' ),
			'settings'   => 'bizto_products_one',
			'priority'   => 20,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'bizto_products_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_products_two',
		array(
			'label'      => __( 'Product two', 'bizto' ),
			'description' => __( 'Select a post/page you want to show as product two', 'bizto' ),
			'settings'   => 'bizto_products_two',
			'priority'   => 30,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'bizto_products_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_products_three',
		array(
			'label'      => __( 'Product three', 'bizto' ),
			'description' => __( 'Select a post/page you want to show as product three', 'bizto' ),
			'settings'   => 'bizto_products_three',
			'priority'   => 40,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'bizto_portfolio_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_portfolio_one',
		array(
			'label'      => __( 'Portfolio One', 'bizto' ),
			'description' => __( 'Select a post/page you want to show as portfolio one', 'bizto' ),
			'settings'   => 'bizto_portfolio_one',
			'priority'   => 44,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'bizto_portfolio_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_portfolio_two',
		array(
			'label'      => __( 'Portfolio Two', 'bizto' ),
			'description' => __( 'Select a post/page you want to show as portfolio one', 'bizto' ),
			'settings'   => 'bizto_portfolio_two',
			'priority'   => 45,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'bizto_portfolio_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_portfolio_three',
		array(
			'label'      => __( 'Portfolio Three', 'bizto' ),
			'description' => __( 'Select a post/page you want to show as portfolio one', 'bizto' ),
			'settings'   => 'bizto_portfolio_three',
			'priority'   => 46,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'bizto'),
		'active_callback' => 'bizto_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'bizto_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_show_quote',
		array(
			'label'      => __( 'Show quote?', 'bizto' ),
			'settings'   => 'bizto_show_quote',
			'priority'   => 10,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $biztoYesNo,
		)
	) );		
	$wp_customize->add_setting( 'bizto_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_quote_post',
		array(
			'label'      => __( 'Quote', 'bizto' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'bizto' ),
			'settings'   => 'bizto_quote_post',
			'priority'   => 20,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $biztoPostsPagesArray,
		)
	) );

	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'bizto'),
		'active_callback' => 'bizto_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'bizto_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'bizto_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'bizto_show_social',
		array(
			'label'      => __( 'Show social?', 'bizto' ),
			'settings'   => 'bizto_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $biztoYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'bizto' ),
	  'description' => __( 'Enter your facebook url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'bizto' ),
	  'description' => __( 'Enter your flickr url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'bizto' ),
	  'description' => __( 'Enter your gplus url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'bizto' ),
	  'description' => __( 'Enter your linkedin url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'bizto' ),
	  'description' => __( 'Enter your reddit url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'bizto' ),
	  'description' => __( 'Enter your stumble url.', 'bizto' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'bizto' ),
	  'description' => __( 'Enter your twitter url.', 'bizto' ),
	) );	
	
}
add_action( 'customize_register', 'bizto_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bizto_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bizto_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bizto_customize_preview_js() {
	wp_enqueue_script( 'bizto-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bizto_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function bizto_sanitize_yes_no_setting( $value ){
	global $biztoYesNo;
    if ( ! array_key_exists( $value, $biztoYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function bizto_sanitize_post_selection( $value ){
	global $biztoPostsPagesArray;
    if ( ! array_key_exists( $value, $biztoPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function bizto_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function bizto_sanitize_slider_type_setting( $value ){

	global $biztoSliderType;
    if ( ! array_key_exists( $value, $biztoSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function bizto_sanitize_services_type_setting( $value ){

	global $biztoServiceLayouts;
    if ( ! array_key_exists( $value, $biztoServiceLayouts ) ){
        $value = 'select';
	}
    return $value;	
	
}

add_action( 'customize_register', 'bizto_load_customize_classes', 0 );
function bizto_load_customize_classes( $wp_customize ) {
	
	class bizto_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'bizto-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="bizto-upgrade-container" class="bizto-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .bizto-upgrade-container -->
			
		<?php }	
		
	}
	
	class bizto_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'bizto-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="bizto-upgrade-container" class="bizto-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .bizto-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'bizto_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'bizto_Customize_Control_Guide' );
	
	
}