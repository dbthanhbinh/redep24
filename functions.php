<?php
if(!session_id())
{   
    session_set_cookie_params(0);
    session_start();    
    $sessionID = session_id();     
}

$themename = "Webseo24h";
define ('theme_name', $themename );

define("POSTS_PER_PAGE", get_option('posts_per_page'));
define("THEME_NAME", "webseo24htheme");
// Mobile detect theme options setting
require_once 'admins/device-detect/setting.php';
//Modify default
require_once 'admins/modifys/setting.php';

include (TEMPLATEPATH . '/functions/theme-functions.php');
include (TEMPLATEPATH . '/functions/common-script.php');

if(!function_exists("webseo24htheme_setup")):
    function webseo24htheme_setup()
    {
        //// Re-define meta box path and URL
        // define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/admins/meta-box-4141' ) );
        // define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/admins/meta-box/' ) );
        // //// Include the meta box script
        require_once trailingslashit( STYLESHEETPATH . '/admins/meta-box-4141/' ) . 'meta-box.php';
        // //// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
        // require_once TEMPLATEPATH.'/admins/meta-box/demo/demo.php';
       
         // Remove default
        // require_once TEMPLATEPATH.'/admins/rewrites/remove-category-slug.php';
        
        // filter setting
        require_once TEMPLATEPATH.'/admins/filter/setting.php';
        require_once TEMPLATEPATH.'/admins/filter/filter.php';
        
        // Enable support for Post Thumbnails, and declare two sizes.
	    add_theme_support( 'post-thumbnails' );  // 180 x 180
        add_image_size('mini-thumbnails', 60, 60, true); // 46x46
        add_image_size('medium', 470, 470, true);
       
        #### add excerpt to page
        add_post_type_support('page', 'excerpt');
        
        // This theme uses wp_nav_menu() in two locations.
	    register_nav_menus( array(
                'top-menu'   => __( 'Top primary menu (top-menu)', THEME_NAME ),
                'primary' => __( 'Primary menu (primary)', THEME_NAME ),
                'cat-menu' => __( 'Category menu (cat-menu)', THEME_NAME ),
                'member-menu' => __( 'Member menu (member-menu)', THEME_NAME ),
                'footer-menu-buyer' => __( 'Footer menu Buyer (footer-menu-buyer)', THEME_NAME ),
                'footer-menu-seller' => __( 'Footer menu Seller(footer-menu-seller)', THEME_NAME ),
            ) 
        );
    }
endif;
add_action( 'after_setup_theme', 'webseo24htheme_setup' );

include (TEMPLATEPATH . '/includes/banners.php');
include (TEMPLATEPATH . '/includes/home-recent-box.php');
include (TEMPLATEPATH . '/functions/pagenavi.php');
include (TEMPLATEPATH . '/functions/breadcrumbs.php');
include (TEMPLATEPATH . '/functions/theme-functions-ajax.php');

include (TEMPLATEPATH . '/functions/widgetize-theme.php');
include (TEMPLATEPATH . '/includes/widgets.php');
//echo 'query: ' . get_num_queries();

//Admin function
require_once 'admins/admins_function.php';

// webseo24h
include (TEMPLATEPATH . '/webseo24h-shop/webseo24h_shop_setting.php');

// Newsletter
if(tie_get_option('newsletter_setting_display'))
    include (TEMPLATEPATH . '/webseo24h-shop/newsletter/newsletter_setting.php');
    
// Lazy loading
include (TEMPLATEPATH . '/modules/lazyload/setting.php');

// stick div sidebar
include (TEMPLATEPATH . '/modules/stick_div/setting.php');