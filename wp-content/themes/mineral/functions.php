<?php
/**
 * Functions
 *
 * This is the main functions file that can add some additional functionality to the theme.
 * It calls an object from a manager class that inits all the needed functionality.
 */

$pexeto = new stdClass();
$pexeto_scripts = array();

if ( !defined( 'PEXETO_SHORTNAME' ) )
	define( 'PEXETO_SHORTNAME', 'mineral' );

$pexeto_theme_data = wp_get_theme(PEXETO_SHORTNAME);
if(!$pexeto_theme_data->Version){
	$pexeto_theme_data = wp_get_theme();
}

if(!isset($pexeto_content_sizes)){
	$pexeto_content_sizes = array(
		'content' => 670,
		'fullwidth' => 1032,
		'container' => 1500, //this is dynamic depending on the window screen, 
		//that's just an indicative value for the image cropping

		'column_spacing' => array(
			'blog' => 30,
			'gallery' => 15,
			'carousel' => 6,
			'quick_gallery' => 10,
			'services' => 33,
			'content_slider' => 33
			),
		'header-height' => 400 //used for static header image
	);

	//calculate the slider width as 70% of the full width
	$pexeto_content_sizes['sliderside'] = 70*$pexeto_content_sizes['fullwidth']/100;
}

if ( ! isset( $content_width ) ) $content_width = $pexeto_content_sizes['fullwidth'];

if ( !defined( 'PEXETO_VERSION' ) )
	define( 'PEXETO_VERSION', $pexeto_theme_data->Version );

//main theme info constants
if ( !defined( 'PEXETO_THEMENAME' ) )
	define( 'PEXETO_THEMENAME', $pexeto_theme_data->Name );


if ( !defined( 'PEXETO_LIB_PATH' ) )
	define( 'PEXETO_LIB_PATH', get_template_directory() . '/lib/' );
if ( !defined( 'PEXETO_FUNCTIONS_PATH' ) )
	define( 'PEXETO_FUNCTIONS_PATH', get_template_directory() . '/functions/' );
if ( !defined( 'PEXETO_LIB_URL' ) )
	define( 'PEXETO_LIB_URL', get_template_directory_uri().'/lib/' );
if ( !defined( 'PEXETO_FUNCTIONS_URL' ) )
	define( 'PEXETO_FUNCTIONS_URL', get_template_directory_uri().'/functions/' );
if ( !defined( 'PEXETO_IMAGES_URL' ) )
	define( 'PEXETO_IMAGES_URL', PEXETO_LIB_URL.'images/' );
if ( !defined( 'PEXETO_FRONT_IMAGES_URL' ) )
	define( 'PEXETO_FRONT_IMAGES_URL', get_template_directory_uri().'/images/' );
if ( !defined( 'PEXETO_PATTERNS_URL' ) )
	define( 'PEXETO_PATTERNS_URL', PEXETO_IMAGES_URL.'pattern_samples/' );
if ( !defined( 'PEXETO_FRONT_SCRIPT_URL' ) )
	define( 'PEXETO_FRONT_SCRIPT_URL', get_template_directory_uri().'/js/' );
if ( !defined( 'PEXETO_OPTIONS_PAGE' ) )
	define( 'PEXETO_OPTIONS_PAGE', 'pexeto_options' );


require PEXETO_LIB_PATH.'init.php';  //init file of the Pexeto library
require PEXETO_FUNCTIONS_PATH.'init.php';  //init file of the theme functions


/******************************************************************************\
	Custom functions
\******************************************************************************/

/**
 * Remove menu items for non-admin
 *
 */
function edit_admin_menus() {
    global $menu;
    $restricted = array(__('Dashboard'), __('Posts'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }

    // remove some more when not admin
    if (!current_user_can('manage_options')){
    	remove_menu_page('edit-comments.php');
    	remove_menu_page('tools.php');
    }
}
add_action( 'admin_menu', 'edit_admin_menus' );

/**
 * Redirect to pages
 */
function login_redirect( $redirect_to, $request, $user ){
    return (is_array($user->roles) && in_array('administrator', $user->roles)) ? admin_url() : 'wp-admin/edit.php?post_type=page';
	// return 'wp-admin/edit.php?post_type=page';
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );

/**
 * Remove elements for non-admin from general view
 */
function remove_items() {
    $screen = get_current_screen();
    global $current_screen;
    // only administrator gets the quick edit
    if( ! current_user_can('manage_options' )){
        ?>
        <script type="text/javascript">
	        // remove quick edit for pages
	        window.onload = function (){
	            <?php if ($_GET['post_type'] == 'page' || $_GET['post_type'] == 'gallery' || $_GET['post_type'] == 'vacatures') { ?>
	                // remove input fields from quick edit
	                var editinline = document.getElementsByClassName('inline');
	                if ( editinline != null ) {
	                    for (var i = editinline.length - 1; i >= 0; i--) {
	                        editinline[i].parentNode.removeChild(editinline[i]);
	                    };
	                }

                    <?php if ($_GET['post_type'] == 'page') { ?>
                        var editinline = document.getElementsByClassName('trash');
                        if ( editinline != null ) {
                            for (var i = editinline.length - 1; i >= 0; i--) {
                                editinline[i].parentNode.removeChild(editinline[i]);
                            };
                        }

                        var add_new_h2 = document.getElementsByClassName('add-new-h2');
                        if ( add_new_h2 != null ) {
                            for (var i = add_new_h2.length - 1; i >= 0; i--) {
                                add_new_h2[i].parentNode.removeChild(add_new_h2[i]);
                            };
                        }

                        var bulkactions = document.getElementsByClassName('bulkactions');
                        if ( bulkactions != null ) {
                            for (var i = bulkactions.length - 1; i >= 0; i--) {
                                bulkactions[i].parentNode.removeChild(bulkactions[i]);
                            };
                        }
                    <?php } ?>
	            <?php } ?>
	        }
        </script>
        <?php
    }
}
add_action( 'admin_head-edit.php', 'remove_items' );

/*
* Remove input fields on pages
*/
function remove_my_page_metaboxes() {
    global $current_screen;
    global $typenow;

    if ( !current_user_can('manage_options')){

        if (isset($_GET['post'])) {
        	$type = (get_post_type($_GET['post']));
        }
        else {
            $type = 'none';
        }

        if ($typenow == 'page'){ 
            ?>
            <script type="text/javascript">
                window.onload = function() {
                    // inladen elementen om te verwijderen
                    var homepage_metabox = document.getElementById('homepage_metabox');
                    var page_metabox = document.getElementById('page_metabox');
                    var pageparentdiv = document.getElementById('pageparentdiv');
                    var add_new_h2 = document.getElementsByClassName('add-new-h2');
                    var postimagediv = document.getElementById('postimagediv');
                    var contact_page_metabox = document.getElementById('contact_page_metabox');

                    // elementen verwijderen
                    if ( homepage_metabox !=null ){ homepage_metabox.remove(); }
                    if ( page_metabox != null ){ page_metabox.remove(); }
                    if ( pageparentdiv != null ){ pageparentdiv.remove(); }
                    if ( postimagediv != null ){ postimagediv.remove() }
                    if ( contact_page_metabox != null ){ contact_page_metabox.remove(); }

                    if ( add_new_h2 != null ) {
                        for (var i = add_new_h2.length - 1; i >= 0; i--) {
                            add_new_h2[i].remove();
                        };
                    }
                }
            </script>
        <?php }
        if (is_edit_page() && ($type == 'page' || $type == 'none')){
            ?>
            <script type="text/javascript">
                window.onload = function() {
                    // inladen elementen om te verwijderen
                    var commentstatusdiv = document.getElementById('commentstatusdiv');
                    var commentsdiv = document.getElementById('commentsdiv');
                    var pageparentdiv = document.getElementById('pageparentdiv');
                    var add_new_h2 = document.getElementsByClassName('add-new-h2');

                    // elementen verwijderen
                    if ( commentstatusdiv !=null ){ commentstatusdiv.remove(); }
                    if ( commentsdiv !=null ){ commentsdiv.remove(); }
                    if ( pageparentdiv !=null ){ pageparentdiv.remove(); }

                    if ( add_new_h2 != null ) {
                        for (var i = add_new_h2.length - 1; i >= 0; i--) {
                            add_new_h2[i].remove();
                        };
                    }

                    // set title readonly
                    var title = document.getElementById('title');
                    if ( title != null ) { title.readOnly = "readonly"; }
                }
            </script>
      <?php }
    }
}
// add_action('admin_menu','remove_my_page_metaboxes');

add_action('admin_menu','remove_elements');
function remove_elements(){
            if(is_edit_page()){
                
            }
}

function testing(){
    // global $current_screen;
    // global $typenow;

     // if ( !current_user_can('manage_options')){

        // if (isset($_GET['post'])) {
        //     $type = (get_post_type($_GET['post']));
        // }
        // else {
        //     $type = 'none';
        // }

        // if (is_edit_page() && ($type == 'page' || $type == 'none')){
        if (is_edit_page()){
            ?>
            <script>
                window.onload = function() {
                    console.log("test");
                }
            </script>
            <?php
        }
    // }
}

function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}
?>