<header class="main-header">
    <div class="header-upper">
        <div class="clearfix">
            <div class="pull-left logo-outer">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
						if(has_custom_logo())
						{	
							the_custom_logo();
						}
						else { 
						?>
							<h2 class="site-title"><?php echo bloginfo('name'); ?></h2>
						<?php 		
						}
						?>
						<?php
						$profisme_description = get_bloginfo( 'description');
						if ($profisme_description) : ?>
							<p class="site-description"><?php echo esc_html($profisme_description); ?></p>
						<?php endif; ?>
                    </a>
                </div>
                <div class="navbar-header">
                </div>
            </div>
            <div class="pull-right upper-right clearfix">
                <div class="nav-outer clearfix">
            <nav id="site-navigation" class="main-navigation">
              <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                        <?php
                          wp_nav_menu( array(
                              'theme_location' => 'primary_menu',
                              'menu_id'        => 'primary-menu',
                              
                          ) );
                          ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<?php 
if ( !(is_404()) ) {
if ( !is_page_template( 'templates/template-homepage.php' ) && !is_page_template( 'templates/template-homepage-construction.php') && !is_page_template( 'templates/template-homepage-medical.php') ) {
    profisme_breadcrumbs_style(); 
  }}
?>