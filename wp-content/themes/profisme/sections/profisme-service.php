<?php
$profisme_hide_show_service = get_theme_mod('hide_show_service','1');
$profisme_service_title = get_theme_mod('profisme_service_title','Our Services');

?>
<?php if($profisme_hide_show_service == '1') {?>
    <section class="services-section grey-bg">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <?php if(!empty($profisme_service_title)): ?>
                    <div class="sec-title">
                        <h2><?php echo esc_html($profisme_service_title);?></h2>     
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row clearfix">
                <div class="services-column">
                        <?php
                        $profisme_services_no        = 6;
                        $profisme_services_pages      = array();
                        for( $i = 1; $i <= $profisme_services_no; $i++ ) {
                             $profisme_services_pages[] = get_theme_mod('service_page'.$i); 

                        }
                        $profisme_services_args  = array(
                        'post_type' => 'page',
                        'post__in' => array_map( 'absint', $profisme_services_pages ),
                        'posts_per_page' => absint($profisme_services_no),
                        'orderby' => 'post__in'
                        ); 
                        $profisme_services_query = new wp_Query( $profisme_services_args );
                        $count = 0;
                        while($profisme_services_query->have_posts() && $count <= 5 ) :
                            $profisme_services_query->the_post();
                            ?>
                            <div class="services-block col-md-4 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="inner-box-table">
                                        <?php
                                        if(has_post_thumbnail()):
                                            ?>
                                            <div class="icon-box">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="table-cell">
                                            <h3>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <?php the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'profisme' ),
                                                'after'  => '</div>',
                                                 ) );
                                             ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $count = $count + 1;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>