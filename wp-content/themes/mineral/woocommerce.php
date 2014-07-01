<?php
/**
 * Woocommerce template - fixes some layour problems with WooCommerce
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//get all the page meta data (settings) needed (function located in unctions/meta.php)
		$pexeto_page=pexeto_get_post_meta( $post->ID, array( 'slider', 'layout', 'show_title', 'sidebar' ) );
		if(is_archive() && get_post_type()=='product'){
			$pexeto_page['title']='Shop';
			$pexeto_page['layout']='full';
		}


		//include the before content template
		locate_template( array( 'includes/html-before-content.php' ), true, true );

		}
}

		//display the page content
		woocommerce_content();

		//print sharing
		echo pexeto_get_share_btns_html( $post->ID, 'page' );

//include the after content template
locate_template( array( 'includes/html-after-content.php' ), true, true );

get_footer();
?>
