<!-- CUSTOM THEME STYLES -->
<style type="text/css">
<?php 

$css='';
$option_keys = array("skin" , "custom_color" , "pattern" , "custom_pattern" , 
	"body_color" ,  "custom_body_bg" , "body_text_size" , 
	"logo_image" , "retina_logo_image" , "logo_width" , "logo_height" , 
	"link_color" , "heading_color" , "accent_color" , "custom_accent_color",
	"footer_bg", "footer_text_color" , "footer_copyright_bg", "footer_link_color",
	"headings_font_family" , "body_font", "menu_font", "footer_border_color",
	"footer_copyright_text", "footer_title_color",
	"content_bg", "border_color", "secondary_color", "secondary_text_color");

foreach ($option_keys as $key) {
	$pexeto_css[$key] = pexeto_get_saved_option($key);
}


$pexeto_main_color=$pexeto_css['custom_color']==''?$pexeto_css['skin']:$pexeto_css['custom_color'];


if(!empty($pexeto_css['body_text_size'])){
	$css.= 'body, .sidebar,#footer ul li a,#footer{font-size:'.$pexeto_css['body_text_size'].'px;}';
}

/**--------------------------------------------------------------------*
 * SET THE LOGO
 *---------------------------------------------------------------------*/

$logo_width = 133;
$logo_height = 50;


if(!empty($pexeto_css['logo_width'])){
	$logo_width = $pexeto_css['logo_width'];
	$css.= '#logo-container img{width:'.$pexeto_css['logo_width'].'px; }';
}


if(!empty($pexeto_css['logo_height'])){
	$logo_height = $pexeto_css['logo_height'];
	$css.= '#logo-container img{height:'.$pexeto_css['logo_height'].'px;}';
}


/**--------------------------------------------------------------------*
 * BACKGROUND OPTIONS
 *---------------------------------------------------------------------*/

if(!empty($pexeto_css['custom_body_bg'])){
	$css.= 'body, #menu ul ul li{background-color:#'.$pexeto_css['custom_body_bg'].';}';
	$rgb = pexeto_convert_hex_to_rgb($pexeto_css['custom_body_bg']);
	if(sizeof($rgb)==3){
		$css.='.fixed-header #header {background-color: rgb('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].'); background-color: rgba('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].', 0.97);}';
	}
}

$accent_color=$pexeto_css['custom_accent_color']?$pexeto_css['custom_accent_color']:$pexeto_css['accent_color'];
if($accent_color!=''){
	$css.= 'button, .button, input[type="submit"], input[type="button"], #submit, .page-title, 
		#menu > ul > li > a:hover:after, .scroll-to-top:hover, .nivo-nextNav:hover,
		.nivo-prevNav:hover, .pg-navigation, .pc-next, .pc-prev,  .nivo-prevNav:hover,.nivo-nextNav:hover,
		.left-arrow:hover,.right-arrow:hover, .ps-left-arrow:hover,.ps-right-arrow:hover,
		.cs-next-arrow:hover,.cs-prev-arrow:hover, .ps-left-arrow:hover,.ps-right-arrow:hover 
		{background-color:#'.$accent_color.';}';

	$css.='a:hover, .tabs .current a, .read-more, .footer-widgets a:hover, .comment-info .reply, 
		.comment-info .reply a, .comment-info, #menu ul li a:hover, #wp-calendar tbody td a,
		.widget_nav_menu li.current-menu-item > a, .post-title a:hover, .post-tags a,
		.services-list .services-title, .sl-icons li:hover .sl-title, .archive-page a:hover,
		.pg-pagination a.current, .pg-pagination a:hover, #content-container .wp-pagenavi span.current,
		#content-container .wp-pagenavi a:hover, .carousel-title .link-title, .testimonials-details a,
		.lp-title a:hover, #menu ul ul li.current-menu-item a {color:#'.$accent_color.';}';

	$css.='.accordion-title.current, .read-more:hover, .more-arrow, .sticky, .social-icons li:hover,
		.format-quote, .format-aside, .nivo-nextNav:hover, .nivo-prevNav:hover, .nivo-prevNav:hover,
		.nivo-nextNav:hover, .left-arrow:hover, .right-arrow:hover, .ps-left-arrow:hover, 
		.ps-right-arrow:hover, .cs-next-arrow:hover, .cs-prev-arrow:hover, .ps-left-arrow:hover, 
		.ps-right-arrow:hover {border-color:#'.$accent_color.';}';
	
	$rgb = pexeto_convert_hex_to_rgb($accent_color);
	if(sizeof($rgb)==3){
		$css.='.pg-info, .services-circle .services-content, .qg-overlay {background-color: rgba('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].', 0.82);}';
	}

}

if(!empty($pexeto_css['border_color'])){
	$css.= '.contact-captcha-container, .sl-icon, .archive-page ul, #not-found h1, .lp-wrapper
		.widget_categories li, .widget_nav_menu li, .widget_archive li, .table th, .table td,
		.widget_links li, .widget_recent_entries li, .widget_pages li, #recentcomments li, .accordion-title,
		.widget_meta li, .widget_rss li,  input[type="text"], input[type="password"], textarea, .lp-wrapper,
		input[type="search"], .post-info, .ps-content, .ps-title, .social-icons li, blockquote,
		 table th, table td, table tbody td, .tabs-container .panes, .tabs-container > ul, .tabs .current a, .coment-box,
		 #wp-calendar caption,
		  #reply-title, .comments-titile, .avatar {border-color:#'.$pexeto_css['border_color'].';}';
	$css.= '.btn-alt, .sidebar-box .title:after{background-color:#'.$pexeto_css['border_color'].';}';
	$css.='.tabs-container > ul li a{box-shadow: none;}';
}

if(!empty($pexeto_css['footer_bg'])){
	$css.= '#footer{background-color:#'.$pexeto_css['footer_bg'].';}';
}

if(!empty($pexeto_css['footer_copyright_bg'])){
	$css.= '.footer-bottom{background-color:#'.$pexeto_css['footer_copyright_bg'].';}';
}


if(!empty($pexeto_css['footer_border_color'])){
	$css.= '.footer-box .title, #footer .img-frame, #footer .lp-wrapper,
		#footer #recentcomments li, .footer-cta-first h5, .footer-bottom,
	.footer-widgets .widget_categories li, .footer-widgets .widget_nav_menu li, 
	.footer-widgets .widget_archive li, .footer-widgets .widget_links li, 
	.footer-widgets .widget_recent_entries li, .footer-widgets .widget_pages li, 
	.footer-widgets #recentcomments li, .footer-widgets .widget_meta li, 
	.footer-widgets .widget_rss li, .footer-widgets .widget_nav_menu ul ul li, 
	.footer-widgets .widget_nav_menu ul ul, .footer-widgets .lp-wrapper, 
	.footer-widgets table thead, .footer-widgets table td
		 {border-color:#'.$pexeto_css['footer_border_color'].';}';
}

if(!empty($pexeto_css['secondary_color'])){
	$css.= '.ps-loading,  .mob-nav-menu, .tabs-container > ul li a, .accordion-title,
	.recaptcha-input-wrap, #footer-cta, .post-tags a, .format-quote,.format-aside,
		input[type="text"]:focus, input[type="search"]:focus, input[type="text"], 
		input[type="password"], textarea, input[type="search"], .social-icons li,
		.comment-info .reply, .tabs-container > ul li a, .tabs .current a, .avatar
		{background-color:#'.$pexeto_css['secondary_color'].';}';

	$css.='.pc-next, .pc-prev, .ts-thumbnail-wrapper
		{border-color:#'.$pexeto_css['secondary_color'].';}';
}

/**--------------------------------------------------------------------*
 * TEXT COLORS
 *---------------------------------------------------------------------*/

if(!empty($pexeto_css['body_color'])){
	$css.= 'a, body, #content-container .wp-pagenavi a, #content-container .wp-pagenavi span.pages, 
		#content-container .wp-pagenavi span.current, #content-container .wp-pagenavi span.extend,
		input[type="text"], input[type="password"], textarea, input[type="search"],
		#menu ul li a, .services-title-box, .services-box, .no-caps,
		.small-title span, .pg-item h2, .pg-pagination a,
		.comment-date, .lp-title a, .qg-title, .archive-page a, .sidebar-box .recentcomments a,
		#menu .current-menu-parent a, #menu .current-menu-ancestor a, #menu li:hover a, #menu .current-menu-parent a, 
		#menu .current-menu-ancestor a, #menu ul .current-menu-item a, .post-info, .post-info a,
		.sidebar-box li>a
		{color:#'.$pexeto_css['body_color'].';}';
}

if(!empty($pexeto_css['link_color'])){
	$css.= 'a,.post-info, .post-info a, .lp-post-info a
		{color:#'.$pexeto_css['link_color'].';}';
}

if(!empty($pexeto_css['heading_color'])){
	$css.= 'h1,h2,h3,h4,h5,h6,h1.page-heading,.sidebar-box h4,.post h1, 
		h2.post-title a, .content-box h2, #portfolio-categories ul li, h1 a, h2 a, 
		h3 a, h4 a, h5 a, h6 a, .services-box h4, #intro h1, #page-title h1, 
		.item-desc h4 a, .item-desc h4, .sidebar-post-wrapper h6 a, table th, 
		.post-title, .archive-page h2, .page-heading, .ps-title,
		.tabs a, .post-title a:hover{color:#'.$pexeto_css['heading_color'].';}';
}


if(!empty($pexeto_css['secondary_text_color'])){
	$css.= '.ps-loading,  .mob-nav-menu, .tabs-container > ul li a, .accordion-title,
	.recaptcha-input-wrap, #footer-cta, .post-tags a, .format-quote,.format-aside,
		input[type="text"]:focus, input[type="search"]:focus, input[type="text"], 
		input[type="password"], textarea, input[type="search"], .footer-cta-disc p,
		.comment-info .reply, .tabs-container > ul li a, .tabs .current a
		{color:#'.$pexeto_css['secondary_text_color'].';}';
}

if(!empty($pexeto_css['footer_text_color'])){
	$css.= '#footer, .footer-box, #footer .footer-widgets .lp-post-info a {color:#'.$pexeto_css['footer_text_color'].';}';
}

if(!empty($pexeto_css['footer_copyright_text'])){
	$css.= '#footer .copyrights, #footer .footer-bottom li a, .footer-nav li:after{color:#'.$pexeto_css['footer_copyright_text'].';}';
}

if(!empty($pexeto_css['footer_title_color'])){
	$css.= '.footer-box .title{color:#'.$pexeto_css['footer_title_color'].';}';
}

if(!empty($pexeto_css['footer_link_color'])){
	$css.= '#footer .footer-widgets li a, #footer .footer-widgets a
		{color:#'.$pexeto_css['footer_link_color'].';}';

	$css.='#footer .button{color:#fff;}';
}


/**--------------------------------------------------------------------*
 * FONTS
 *---------------------------------------------------------------------*/
if($pexeto_css['headings_font_family']!='' && $pexeto_css['headings_font_family']!='default'){
	$font_name = pexeto_get_font_name_by_key($pexeto_css['headings_font_family']);
	if(!empty($font_name)){
		$css.= 'h1,h2,h3,h4,h5,h6{font-family:'.$font_name.';}';
	}
	
}


if(isset($pexeto_css['body_font']) && isset($pexeto_css['body_font']['family'])
	&& $pexeto_css['body_font']['family']!='' && $pexeto_css['body_font']['family']!='default'){
	$font_name = pexeto_get_font_name_by_key($pexeto_css['body_font']['family']);
	if(!empty($font_name)){
		$css.= 'body{font-family:'.$font_name.';}';
	}
}

if(isset($pexeto_css['body_font']) && isset($pexeto_css['body_font']['size'])
	&& !empty($pexeto_css['body_font']['size'])){
	$css.= 'body{font-size:'.$pexeto_css['body_font']['size'].'px;}';
}

if(isset($pexeto_css['menu_font']) && isset($pexeto_css['menu_font']['family'])
	&& $pexeto_css['menu_font']['family']!='' && $pexeto_css['menu_font']['family']!='default'){
	$font_name = pexeto_get_font_name_by_key($pexeto_css['menu_font']['family']);
	if(!empty($font_name)){
		$css.= '#menu ul li a{font-family:'.$font_name.';}';
	}
}

if(isset($pexeto_css['menu_font']) && isset($pexeto_css['menu_font']['size']) 
	&& !empty($pexeto_css['menu_font']['size'])){
	$css.= '#menu ul li a{font-size:'.$pexeto_css['menu_font']['size'].'px;}';
}


/**--------------------------------------------------------------------*
 * ADDITIONAL STYLES
 *---------------------------------------------------------------------*/

if(pexeto_option('additional_styles')!=''){
	$css.=(pexeto_option('additional_styles'));
}

echo $css;
?>

</style>