<?php

$biztoPostsPagesArray = array(
	'select' => __('Select a post/page', 'bizto'),
);

$biztoPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$biztoPostsPagesQuery = new WP_Query( $biztoPostsPagesArgs );
	
if ( $biztoPostsPagesQuery->have_posts() ) :
							
	while ( $biztoPostsPagesQuery->have_posts() ) : $biztoPostsPagesQuery->the_post();
			
		$biztoPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$biztoPostsPagesTitle = get_the_title();
		}else{
				$biztoPostsPagesTitle = get_the_ID();
		}
		$biztoPostsPagesArray[$biztoPostsPagesId] = $biztoPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$biztoYesNo = array(
	'select' => __('Select', 'bizto'),
	'yes' => __('Yes', 'bizto'),
	'no' => __('No', 'bizto'),
);

$biztoSliderType = array(
	'select' => __('Select', 'bizto'),
	'header' => __('WP Custom Header', 'bizto'),
	'slider' => __('Bizto Header', 'bizto'),
);

$biztoServiceLayouts = array(
	'select' => __('Select', 'bizto'),
	'one' => __('One', 'bizto'),
	'two' => __('Two', 'bizto'),
);


