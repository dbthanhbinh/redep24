<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(tie_get_option("shop_setting_display"))
{
    if(!session_id())
    {
        session_start();
    }
    set_time_limit(900);
    $sessionID = session_id();  // get session id
    @ini_set("memory_limit","80M");

    function webseo24h_style_shop() {
        echo '<link href="'.  get_template_directory_uri().'/webseo24h-shop/css/shopping.css" rel="stylesheet" type="text/css" />';
        echo '<link href="'.  get_template_directory_uri().'/webseo24h-shop/member/css/member.css" rel="stylesheet" type="text/css"/>';
    }
    add_action( 'wp_head', 'webseo24h_style_shop' );

    function webseo24h_scripts() {
        echo '<script src="'.  get_template_directory_uri().'/webseo24h-shop/js/shopjs.js" type="text/javascript"></script>';
        echo '<script src="'.  get_template_directory_uri().'/webseo24h-shop/js/public.js" type="text/javascript"></script>';
        echo '<script src="'.  get_template_directory_uri().'/webseo24h-shop/js/validate.js" type="text/javascript"></script>';        
    }
    add_action( 'wp_footer', 'webseo24h_scripts' );

    // include country
    require_once 'publics/country.php';

    // Delivery Free
    require_once 'delivery/DeliveryFree.php';

    // include shopping function process
    require_once 'functions_.php';
    // include shopping class
    require_once 'webseo24h_shop.php';
    // include shopping email
    require_once 'email/webseo24h-email.php';
    // include shopping payment
    ####require_once 'payment/payment-setting.php';
    // include shopping member
    require_once 'member/member-setting.php';

    // include shopping order
    require_once 'order/order-setting.php';

    
    // add back ground ajax loading to footer
    add_action('wp_footer', 'db_background_popup_message');
    function db_background_popup_message(){
            $html = '
                <div class="ws24h_background_popup_message" id="ws24h_background_popup_message"></div>		
                ';
            echo $html;
    }
}

