<?php
$profisme_hide_show_client = get_theme_mod('hide_show_client','1');
?>
<?php if($profisme_hide_show_client == '1') {?>
    <section class="clients-section">
        <div class="container">
            <div class="sponsors-outer">
                <ul class="owl-theme">
                    <?php
                    $profisme_client_no        = 6;
                    $profisme_client_pages      = array();
                    for( $i = 1; $i <= $profisme_client_no; $i++ ) {
                         $profisme_client_pages[] = get_theme_mod('client_page'.$i);

                    }
                    $profisme_client_args  = array(
                    'post_type' => 'page',
                    'post__in' => array_map( 'absint', $profisme_client_pages ),
                    'posts_per_page' => absint($profisme_client_no),
                    'orderby' => 'post__in'
                    ); 
                    $profisme_client_query = new wp_Query( $profisme_client_args );
                    while($profisme_client_query->have_posts()) :
                        $profisme_client_query->the_post();
                        ?>
                        <li class="slide-item">
                            <?php if(has_post_thumbnail()) : ?>
                                <figure class="image-box">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </figure>
                            <?php endif; ?>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>

        </div>
    </section>
<?php } ?>