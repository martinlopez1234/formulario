<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package profisme
 */

?>

<!--News Block Three-->
<div class="news-block-three">
    <div class="inner-box">
    	<?php if ( has_post_thumbnail() ) { ?>
            <div class="image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
        <?php } ?>
        <div class="lower-content">
            <ul class="post-info">
                <?php 
                profisme_posted_by();

                profisme_posted_on();

                profisme_entry_footer(); 
                 ?>
            </ul>
            <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <?php the_excerpt(); ?> 
           <a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><?php  esc_html_e( 'Read More', 'profisme' ) ?></a>
        </div>
    </div>
</div>