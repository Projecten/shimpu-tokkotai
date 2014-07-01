<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title( pexeto_option('seo_serapartor'), true, 'right' ); ?></title>

<?php
//print the Facebook and Google+ meta tags to include the featured image
//of the post/page when it is shared
global $post;
if(is_single() && isset($post)){ 
	if($post->post_type==PEXETO_PORTFOLIO_POST_TYPE){
		$image = pexeto_get_portfolio_preview_img($post->ID);
		$image = $image['img'];
	}else{
		$image = pexeto_get_featured_image_url($post->ID);
	}

	if(!empty($image)){
	?>
<!-- facebook meta tag for image -->
<meta property="og:image" content="<?php echo $image; ?>"/>
<!-- Google+ meta tag for image -->
<meta itemprop="image" content="<?php echo $image; ?>">
<?php } 
}
?>


<!-- Mobile Devices Viewport Resset-->
<?php if(pexeto_option('responsive_layout')!==false){ ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<?php } ?>
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=1" /> -->
<?php if(pexeto_option('seo_keywords')){ ?>
<!-- Keywords-->
<meta name="keywords" content="<?php echo pexeto_option('seo_keywords'); ?>" />
<?php } ?>




<?php 
//remove SEO indexation and following for the selected archives pages
if(is_archive() || is_search() || is_page_template('template-portfolio-gallery.php')){
	$exclude_index_pages=pexeto_option('seo_indexation');
	if($exclude_index_pages == '') $exclude_index_pages = array();
	if((is_category() && in_array('category', $exclude_index_pages))
	|| (is_author() && in_array('author', $exclude_index_pages))
	|| (is_tag() && in_array('tag', $exclude_index_pages))
	|| (is_date() && in_array('date', $exclude_index_pages))
	|| (is_search() && in_array('search', $exclude_index_pages))
	|| (is_page_template('template-portfolio-gallery.php') && isset($_GET['cat']) && in_array('pgcategory', $exclude_index_pages))
	){ ?>
<!-- Disallow content indexation on this page to remove duplicate content problems -->
<meta name="googlebot" content="noindex,nofollow" />
<meta name="robots" content="noindex,nofollow" />
<meta name="msnbot" content="noindex,nofollow" />
	<?php }
}
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo pexeto_option('favicon'); ?>" />

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="main-container" >
	<div  class="page-wrapper" >
		<!--HEADER -->
		<div id="header">
			<div class="section-boxed section-header">
			<div id="logo-container">
				<?php 
					$logo_image = pexeto_option('retina_logo_image') ? pexeto_option('retina_logo_image') : pexeto_option('logo_image');
					if(empty($logo_image)){
						$logo_image=get_template_directory_uri().'/images/logo@2x.png';
					}
				 ?>
				<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo_image; ?>" /></a>
			</div>	
			<?php locate_template( array( 'includes/social-icons.php' ), true, false ); ?>	
	        <div class="mobile-nav">
				<span class="mob-nav-btn"><?php _e( 'Menu', 'pexeto' ); ?></span>
			</div>
	 		<div id="navigation-container">
				<div id="menu-container">
		        	<div id="menu">
					<?php wp_nav_menu(array(
							'theme_location' => 'pexeto_main_menu', 
							'container' => false)); ?>
					</div>
		        </div> 
	  	 	</div> 
	 
		    <div class="clear"></div>       
		    <div id="navigation-line"></div>
		</div>
		</div><!-- end #header -->
