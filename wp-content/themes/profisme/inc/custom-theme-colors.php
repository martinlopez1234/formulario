<?php
/**
 * @package profisme
 */

function profisme_inline_styles(){
	$profisme_theme_color = esc_attr(get_theme_mod( 'profisme_theme_color', '#0088CC' ));
	$profisme_header_color = esc_attr(get_theme_mod( 'profisme_main_header_color', 'transparent' ));
	$profisme_header_menu_color = esc_attr(get_theme_mod( 'profisme_header_menu_color', '#fff' ));


$color_css = "

.btn-style-one,.menu .sub-menu li:hover, .menu .children li:hover,.services-section .title-column .inner-column h2:after,
.sec-title h2:after,.sec-title h2:before,.main-footer .footer-widget h2:after,.sidebar-title h2:after,
.comment-respond .form-submit .submit,
.comment-reply-title:before
{
	background: $profisme_theme_color !important ;
}

.main-header{

		background: $profisme_header_color !important ;

}

@media screen and (min-width: 993px){
.menu a {
    	color: {$profisme_header_menu_color} !important ;

}
}
.tagcloud a:hover, .tagcloud a:focus,.scroll-to-top{

		background: $profisme_theme_color !important ;
		color:#fff !important;

}

.news-block .inner-box .lower-box .read-more,
.sidebar-widget li a:hover, .sidebar-widget li a:focus,
.widget_recent_entries a:hover, 
.widget_recent_entries a:focus
 .news-block-three 
 .inner-box 
 .lower-content h3 a:hover, 
 .news-block-three 
 .inner-box .lower-content h3 a:focus,
 .page-title .page-breadcrumb li,
 .news-block .inner-box .lower-box h3 a:hover,
  .news-block .inner-box .lower-box h3 a:focus,
  .comment-author .url
{

	color: {$profisme_theme_color} !important ;

}

.news-block .inner-box .image{

		background: $profisme_theme_color !important ;
		opacity:0.9;
}

.call-to-action.style-two:before {
    background-color: $profisme_theme_color !important ;
}

.btn-style-one,.tagcloud a:hover,
.tagcloud a:focus,
.scroll-to-top,
.comment-respond .form-submit .submit{
border-color: {$profisme_theme_color} !important ;
}

@media screen and (max-width: 992px)
{
.main-navigation.toggled .menu.nav-menu {
    background: {$profisme_theme_color} !important ;
}
}

";

    return profisme_css_strip_whitespace($color_css);

}

function profisme_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",  // Strip C style comments.
	    "#\s\s+#"      => " ", // Strip excess whitespace.
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);

	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}", // Strip optional semicolons.
	    ",\n" => ",", // Don't wrap multiple selectors.
	    "\n}" => "}", // Don't wrap closing braces.
	    "} "  => "}\n", // Put each rule on it's own line.
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);

	  return trim($css);
}