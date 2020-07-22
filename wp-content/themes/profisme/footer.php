<?php 
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage Profisme
 * @since Profisme
 */
 ?>
 <footer class="main-footer">
    <div class="container">
    	
        	<!--Widgets Section-->
	        <div class="widgets-section">
	            <div class="row clearfix">

                    <!--big column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                                <div class="footer-widget logo-widget">
                                    <?php  dynamic_sidebar( 'footer-widget-area-1' ); ?>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                                <div class="footer-widget links-widget">
                                    <?php  dynamic_sidebar( 'footer-widget-area-2' ); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--big column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget links-widget">
                                    <?php  dynamic_sidebar( 'footer-widget-area-3' ); ?>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget info-widget">
                                    <?php  dynamic_sidebar( 'footer-widget-area-4' ); ?>
                                </div>
                            </div>

                        </div>
                    </div>
				</div>
	        </div>
        <?php 
        
		$hide_show_copyright = get_theme_mod('hide_show_copyright','1');	
		if($hide_show_copyright == '1') { 
		?>
		
	        <!--Footer Bottom-->
	        <div class="footer-bottom clearfix">
	            <div class="pull-left">
						<div class="copyright"><?php echo esc_html__('Copyright 2020 . All rights are reserved','profisme'); ?>
                        <?php
                            printf(/* translators:%s.powered by. */ 
                                esc_html__( 'Powered by %s', 'profisme' ), esc_html__('WordPress','profisme') );
                            ?>
                        </div> 
	            </div>
	        </div>
        <?php 	 
		} 
		?>

    </div>

</footer>
<!--End Main Footer-->
<?php wp_footer(); ?>
</div>
</div>
</body>
</html>