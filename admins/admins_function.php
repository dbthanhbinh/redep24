<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// back-end theme options setting
require_once 'theme-options/setting-nhp-options.php';
require_once 'user_contactmethods_hook.php';
//require_once 'register-posttype.php';

// tie-Panel
/*-----------------------------------------------------------------------------------*/
# Get Theme Options
/*-----------------------------------------------------------------------------------*/
function tie_get_option( $name ) 
{
    global $tie_options;
    return $tie_options->get($name);
}

/*-----------------------------------------------------------------------------------*/
# Show Theme Options
/*-----------------------------------------------------------------------------------*/
function tie_show_option( $name ) 
{
    global $tie_options;
    $tie_options->show($name);
}

/*-----------------------------------------------------------------------------------*/
# set Theme Options
/*-----------------------------------------------------------------------------------*/
function tie_set_option( $opt_name,$value ) 
{
    global $tie_options;
    $tie_options->set($opt_name,$value);
}

include (TEMPLATEPATH . '/panel/shortcodes/shortcode.php');
if (is_admin()) 
{
    include (TEMPLATEPATH . '/panel/mpanel-ui.php');
    include (TEMPLATEPATH . '/panel/mpanel-functions.php');
    include (TEMPLATEPATH . '/panel/category-options.php');
    include (TEMPLATEPATH . '/panel/post-options.php');
    
    if(current_user_can('manage_categories')) // chi admin chỉnh sửa được category mới xuất hiện cái này slider
        include (TEMPLATEPATH . '/panel/custom-slider.php');

    include (TEMPLATEPATH . '/admins/custom-menu/sweet-custom-menu.php');
    //include (TEMPLATEPATH . '/panel/importer/tie-importer.php');
}

/*-----------------------------------------------------------------------------------*/
# Custom Admin Bar Menus
/*-----------------------------------------------------------------------------------*/
function tie_admin_bar() {
	global $wp_admin_bar;
	
	if ( current_user_can( 'switch_themes' ) ){
		$wp_admin_bar->add_menu( array(
			'parent' => 0,
			'id' => 'mpanel_page',
			'title' => theme_name ,
			'href' => admin_url( 'admin.php?page=panel')
		) );
	}
	
}
add_action( 'wp_before_admin_bar_render', 'tie_admin_bar' );