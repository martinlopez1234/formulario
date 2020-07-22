<?php
defined( 'ABSPATH' ) || exit;

/**
 * profisme Intro Admin Page
 *
 * @author  profisme
 * @package profisme
 * @since   1.0.2
 */
/**
 * Class to handle notices and Advanced Demo Import
 *
 * Class Profisme_Intro
 */
class Profisme_Intro {

    /**
     * current added Menu hook_suffix
     *
     * @since    1.0.0
     * @access   public
     * @var      array    $logs    Store logs and errors.
     */
    private $hook_suffix;
    
    /**
     * Empty Constructor
     */
    public function __construct() {}

    /**
     * Gets an instance of this object.
     * Prevents duplicate instances which avoid artefacts and improves performance.
     *
     * @static
     * @access public
     * @since 1.0.0
     * @return object
     */
    public static function instance() {
        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if ( null === $instance ) {
            $instance = new self();
        }

        // Always return the instance
        return $instance;
    }

    /**
     * Initialize the class
     *
     * 3 Different Process
     */
    public function run() {
        add_action( 'admin_menu', array($this, 'intro') );
        add_action( 'admin_enqueue_scripts', array($this, 'add_scripts') );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function add_scripts( $hook_suffix ) {
        if ( !is_array($this->hook_suffix) || !in_array( $hook_suffix, $this->hook_suffix )){
            return;
        }
        wp_enqueue_style('wpness-grid', get_template_directory_uri() . '/assets/library/wpness-grid/wpness-grid.css', array(), '1.0.0');
		wp_enqueue_style( 'profisme-notice', get_template_directory_uri(). '/inc/admin/notice.css', array(), '1.0.0' );
        wp_enqueue_script( 'profisme-adi-install', get_template_directory_uri()  . '/inc/admin/notice.js', array( 'jquery' ), '', true );

        $translation = array(
            'btn_text' => esc_html__( 'Processing...', 'profisme' ),
            'nonce'    => wp_create_nonce( 'Profisme_demo_import_nonce' )
        );
        wp_localize_script( 'profisme-adi-install', 'Profisme_adi_install', $translation );
    }

    /**
     * Add admin menus
     * @access public
     */
    public function intro() {
        $this->hook_suffix[] = add_theme_page( esc_html__( 'Profisme Intro','profisme' ), esc_html__( 'Profisme Intro','profisme' ), 'manage_options', 'profisme-intro', array( $this, 'intro_screen' ) );
    }

    /**
     * parse changelog
     * @access Private
     * @return string
     */
    private function parse_changelog( $content ) {

        $matches   = null;
        $regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
        $changelog = '';

        if ( preg_match( $regexp, $content, $matches ) ) {
            $changes = explode( '\r\n', trim( $matches[1] ) );

            $changelog .= '<pre class="cwp-changelog">';

            foreach ( $changes as $index => $line ) {
                $changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
            }

            $changelog .= '</pre>';
        }

        return wp_kses_post( $changelog );

    }

    /**
     * More Setting/Options array specially for Pro
     * @access Private
     * @return array
     */
    private function more_setting() {
        $more_setting = array(
            array(
                'label' => esc_html__( 'Advanced Banner', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
                ),
            array(
                'label' => esc_html__( 'Advanced Blog', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Blog Pagination', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Dropdown Menu', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Header Sidebar Widgets', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Masonry Blog', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'News Ticker', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Off Canvas Sidebar', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Overlay Search', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Popup Sidebar', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Related Post', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Sticky Footer', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            ),
            array(
                'label' => esc_html__( 'Sticky Sidebar', 'profisme' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'profisme' )
            )
        );
        return $more_setting;

    }
 

    /**
     * Show the plugin recommended screen
     * @access public
     * @return void
     */
    public function intro_screen() {
        ?>
        <div class="cwp-intro">
            <div class="cwp-intro-banner">
                <div class="grid-container">

                    <div class="grid-row">
                        <div class="grid-md-7 grid-lg-7">
                            <div class="cwp-intro-banner-caption">
                                <h2><?php esc_html_e( 'Welcome to Profisme', 'profisme' )?></h2>
                                <p>
                                    <?php esc_html_e( 'Profisme is now installed and ready to use. If you have further queries, you can always contact us. We hope you enjoy it! Profisme comes with dozens of Demo Starter Templates. Install the Advanced Import plugin to get started.', 'profisme' )?>
                                </p>
                                <a href="http://wpprobiz.com/preview/" class="cwp-btn cwp-btn-white-outline" target="_blank"><?php esc_html_e( 'View Starter Templates', 'profisme' )?></a>
                                <?php if( !function_exists('run_Profisme_pro')){
                                    $upgrade= '<a href="http://wpprobiz.com/" target="_blank" rel="noopener" class="cwp-btn cwp-btn-sucess">'. esc_html__('Get Profisme Pro', 'profisme').'</a>';
                                    echo apply_filters('Profisme_intro_upgrade_msg',$upgrade);
                                }?>
								<a href="<?php echo admin_url( '/themes.php?page=pt-one-click-demo-import/' ); ?>" class="cwp-btn cwp-btn-white-outline" target="_blank"><?php esc_html_e( 'Import Demo Data', 'profisme' )?></a>
                                
                            </div>
                        </div>
                        <div class="grid-md-5 grid-lg-5">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/screenshot.png');?>" alt="<?php esc_attr__( 'profisme', 'profisme' ); ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="cwp-main">
                <div class="grid-container">
                    <div class="grid-row">
                        <div class="grid-md-4 grid-lg-3">
                            <div class="cwp-intro-auth">
                                <div class="cwp-card">
                                    <div class="cwp-intro-profile">
                                        <span>
                                            <img class="profisme-gsm-screenshot" src="<?php echo esc_url(get_template_directory_uri() .'/assets/images/logo.png' )?>" alt="<?php esc_attr_e( 'profisme', 'profisme' ); ?>" />
                                        </span>
                                    </div>
                                    <div class="cwp-intro-profile-info">
                                        <h3><?php esc_html_e( 'profisme', 'profisme' )?></h3>
                                        <a href="http://wpprobiz.com/" target="_blank" class="cwp-btn cwp-btn-sucess"><?php esc_html_e( 'Visit Site', 'profisme' )?></a>
                                        <a href="http://wpprobiz.com/preview/" target="_blank" class="cwp-btn cwp-btn-danger"><?php esc_html_e( 'View Demo', 'profisme' )?></a>
                                    </div>
                                    <div class="cwp-stats" style="display: none">
                                        <ul>
                                            <li>
                                                <h5><?php esc_html_e( 'Installation', 'profisme' )?></h5>
                                                <p><?php esc_html_e( 'Counting...', 'profisme' )?></p>
                                            </li>
                                            <li>
                                                <h5><?php esc_html_e( 'Downloads', 'profisme' )?></h5>
                                                <p><?php esc_html_e( 'Counting...', 'profisme' )?></p>
                                            </li>

                                        </ul>
                                    </div>
                                    
                                </div>
                            
                            </div>

                            <div class="cwp-intro-auth--info">
                                <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"><?php esc_html_e( 'Contact Information', 'profisme' )?></h4>
                                    </div>

                                    <div class="cwp-card-body">

                                        <ul class="cwp-personal-detail">
                                            <li class="">
                                                <span class="dashicons dashicons-smartphone"></span> <b><?php esc_html_e( 'Support:', 'profisme' )?> </b><a href="https://wordpress.org/support/theme/profisme/" target="_blank"><?php esc_html_e( 'Create A Ticket', 'profisme' )?></a>
                                            </li>
                                            <li class="mt-2">
                                                <span class="dashicons dashicons-location"></span>
                                                <b><?php esc_html_e( 'Location:', 'profisme' )?></b><?php esc_html_e( ' Dhaka, Bangladesh', 'profisme' )?></li>
                                        </ul>
 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-md-8 grid-lg-9 ">
                           <div class="grid-row cwp-info-box">
                               <div class="grid-lg-4 grid-md-6">
                                <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-media-document"></span><?php esc_html_e( 'Theme Doc', 'profisme' )?></h4>
                                    </div>
                                    <div class="cwp-card-body">
                                      <p>
                                          <?php esc_html_e( 'In-depth and well documented articles will help you to use the profisme Themes in easiest way.', 'profisme' )?>
                                      </p>
                                        <a href="http://wpprobiz.com/profisme-free-doc/" target="_blank" class="cwp-btn cwp-btn-primary">
                                            <?php esc_html_e( 'Theme Doc', 'profisme' )?>
                                        </a>
                                    </div>
                                </div>
                               </div>
                               <div class="grid-lg-4 grid-md-6">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-backup"></span> <?php esc_html_e( '24x7 Support', 'profisme' )?> </h4>
                                    </div>
                                    <div class="cwp-card-body">
                                       <p>
                                           <?php esc_html_e( 'We have dedicated support team 24*7 to help you in case you encounter any issue during and after the use of profisme.', 'profisme' )?>
                                       </p>
                                        <a href="https://wordpress.org/support/theme/profisme/" target="_blank" class="cwp-btn cwp-btn-primary"><?php esc_html_e( 'Create A Ticket', 'profisme' )?></a>
                                    </div>
                                </div>
                               </div>
							   
							     <div class="grid-lg-4 grid-md-6">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-backup"></span> <?php esc_html_e( 'Rate Theme', 'profisme' )?> </h4>
                                    </div>
                                    <div class="cwp-card-body">
                                       <p>
                                           <?php esc_html_e( 'You can provide rate to our theme if you really liked it. You can rate in 1 to 5 range. ', 'profisme' )?>
                                       </p>
                                        <a href="https://wordpress.org/support/theme/profisme/reviews/" target="_blank" class="cwp-btn cwp-btn-primary"><?php esc_html_e( 'Rate Now', 'profisme' )?></a>
                                    </div>
                                </div>
                               </div>
                         
                           </div>
                           <div class="grid-row cwp-info-box cwp-customizer-info">
                                <div class="grid-lg-12 grid-md-12">
                                    <div class="cwp-card">
                                            <div class="cwp-card-header">
                                                <h4 class="cwp-card-heading"><?php esc_html_e( 'Links To Customizer Settings', 'profisme' )?></h4>
                                            </div>
                                            <div class="cwp-card-body">
                                              <ul class="cwp-list">

                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'profisme-general-setting-section'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-editor-textcolor"></span>
                                                          <?php esc_html_e( 'Colors/Fonts', 'profisme' )?>
                                                        </a>
                                                    </li>

                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'title_tagline'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-format-image"></span>
                                                          <?php esc_html_e( 'Upload Logo', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'Profisme_header'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-menu-alt3"></span>
                                                          <?php esc_html_e( 'Header Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'Profisme_footer'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-tagcloud"></span>
                                                          <?php esc_html_e( 'Footer Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'header_image'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-format-image"></span>
                                                          <?php esc_html_e( 'Banner Section', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'Profisme_main_content'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-tagcloud"></span>
                                                          <?php esc_html_e( 'Content Section', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[section]' => 'profisme-blog'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Blog Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[section]' => 'profisme-page'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Page Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'Profisme_post_panel'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Post Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'Profisme_theme_options'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-admin-customizer"></span>
                                                          <?php esc_html_e( 'Theme Options', 'profisme' )?>
                                                      </a>
                                                  </li>
                                              </ul>
                                            </div>
                                    </div>
                                </div>
                           </div>

                           <div class="grid-row cwp-info-box">
                               <div class="grid-lg-5 grid-md-5">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-format-image"></span><?php esc_html_e('More Options','profisme');?></h4>
                                    </div>
                                    <div class="cwp-card-body">

                                        <ul class="cwp-table-list">
                                            <?php
                                            $more_setting = $this->more_setting();
                                            foreach ( $more_setting as $key => $setting ){
                                                echo "<li>";
                                                echo "<span>";
                                                echo esc_html($setting['label']);
                                                echo "</span>";
                                                echo "<a href='http://wpprobiz.com/' class='cwp-btn cwp-btn-primary' target='_blank' rel='noopener'>";
                                                echo esc_html($setting['button']);
                                                echo "</a>";
                                                echo "</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                               </div>
                             
                           </div>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Begins execution of the hooks.
 *
 * @since    1.0.0
 */
function Profisme_intro( ) {
    return Profisme_Intro::instance();
}
Profisme_intro()->run();