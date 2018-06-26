<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cleanInput($input) 
{
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
}
  
function sanitize($input) 
{
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}


/** Add product to cart **/
function ajax_load_fc_ajax_act_add_to_cart(){
	global $wpdb,$ws24hShop;	
    $productId = $_REQUEST['productId'];    
    $title = get_the_title($productId);
    $postmetas = get_post_custom($productId);
    $thumb = wp_get_attachment_image_src($postmetas['_thumbnail_id'][0],$postmetas[$wpdb->prefix.'thumbnail'][0], 'thumbnail');
    $perlink = get_permalink($productId);
        
	$productData = array(
        'productId'         => $productId,
        'productCount'      => 1,
        'productPrice'      => intval($postmetas[$wpdb->prefix.'price'][0]),
        'productDiscount'   => intval($postmetas[$wpdb->prefix.'new-price'][0]),
        'productTitle'      => $title,
        'productThumb'      => $thumb[0],
        'productUrl'        => $perlink
    );    
    if($productId && $productData)
    {
        $ws24hShop->shop_session_add_to_cart($productId, $productData);           
    }
    
    print_r(json_encode($ws24hShop->shop_show_shopping_cart()));    
        
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_add_to_cart', 'ajax_load_fc_ajax_act_add_to_cart' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_add_to_cart', 'ajax_load_fc_ajax_act_add_to_cart' ); // ajax for not logged in users


// view shop cart
function ajax_load_fc_ajax_act_view_gh_shop()
{
    global $ws24hShop;
    print_r(json_encode($ws24hShop->shop_show_shopping_cart()));   

    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_view_gh_shop', 'ajax_load_fc_ajax_act_view_gh_shop' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_view_gh_shop', 'ajax_load_fc_ajax_act_view_gh_shop' ); // ajax for not logged in users


// ++++++++++++++++++++++++++ loadding data to shopping cart icon ++++++++++++++++++
function ajax_load_fc_ajax_act_loadding_data_shopping_icon()
{
	global $wpdb,$ws24hShop;	
        
        print_r(json_encode($ws24hShop->shop_get_shopping_cart_loadding()));    
        
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_loadding_data_shopping_icon', 'ajax_load_fc_ajax_act_loadding_data_shopping_icon' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_loadding_data_shopping_icon', 'ajax_load_fc_ajax_act_loadding_data_shopping_icon' ); // ajax for not logged in users

// ++++++++++++++++++++++++++ shopping cart complete send data ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_btn_complete()
{    
    global $tempemail,$ws24hShop,$member,$order,$orderDetail;   
    // update session info and cod, ship, voucher ...
    $mydata = $_REQUEST;
    $ws24hShop->shop_update_info_option($mydata);
    
    //process member if login or not
    $userRegister = '';
    $ordercode = $order->order_random_ordercode();
    $userID = $member->member_process_user_when_order($mydata);
    if($userID!=-1)  // member is login 
    {          
        $userRegister = 'register';
    }
    else if($userID==-1) // member not register
    {
        $userID = '';
        $userRegister = 'noregister';
        
        // process user add more save user not register
        $memberdata = array(
            'userFullname'	=> $ws24hShop->shopCartGetShopInfomationElementItem('order_fullname'),
            'userEmail'		=> $ws24hShop->shopCartGetShopInfomationElementItem('order_email'),
            'userPhone'		=> $ws24hShop->shopCartGetShopInfomationElementItem('order_phone'),
            'userAddress'	=> $ws24hShop->shopCartGetShopInfomationElementItem('order_address'),
            'userDistrict'	=> $ws24hShop->shopCartGetShopInfomationElementItem('order_district'),
            'userCities'	=> $ws24hShop->shopCartGetShopInfomationElementItem('order_cities'),
            'userRegister'	=> 'noregister',
            'orderId'           => $ordercode,
            'date'    		=> date('Y-m-d H:i:s'),
        );
        $userID = $member->member_insert_new_member($memberdata);
        
    }
    
    // process order data infomation    
    $orderdata = array(
        'orderId'               => $ordercode,
        'customerId'            => $userID,
        'customerName'          => $ws24hShop->shopCartGetShopInfomationElementItem('order_fullname'),
        'customerRegister'      => $userRegister,
        'orderPrice'            => $ws24hShop->shopCartGetShopInfomationElementItem('totalPricesEnd'),
        'voucherCode'           => $ws24hShop->shopCartGetShopInfomationElementItem('voucherCode'),
        'voucherValue'          => $ws24hShop->shopCartGetShopInfomationElementItem('voucherValue'),
        'orderPoint'            => $ws24hShop->shopCartGetShopInfomationElementItem('orderPoint'),
        'orderPointStatus'      => 0,
        'usePoint'              => $ws24hShop->shopCartGetShopInfomationElementItem('usePoint'),
        'shipPing'              => $ws24hShop->shopCartGetShopInfomationElementItem('shopPayment'),
        'shippingValue'         => $ws24hShop->shopCartGetShopInfomationElementItem('shopShipping'),
        'codValue'              => $ws24hShop->shopCartGetShopInfomationElementItem('shopCod'),
        'paymentMethod'         => $ws24hShop->shopCartGetShopInfomationElementItem('shopPayment'),
        'paymentStatus'         => 'Chờ xử lý',
        'orderAdminNote'        => '',
        'orderbook'             => json_encode($mydata),
        'orderStatus'           => 'Chờ xử lý',
        'orderNote'             => $ws24hShop->shopCartGetShopInfomationElementItem('shopNote'),
        'orderDate'             => date('Y-m-d H:i:s')
    );

    $orderid = $order->order_insert_new_order($orderdata);
    if($orderid)
        // process order detail
        $orderDetail->orderdetail_insert_new_orderdetail($ordercode); 
    
    $tempemail->email_send_order($sendemail='all'); // send email to admin
    ////$ws24hShop->shop_destroy(); // huy session   
    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_btn_complete', 'ajax_load_fc_ajax_act_shopping_cart_btn_complete' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_btn_complete', 'ajax_load_fc_ajax_act_shopping_cart_btn_complete' ); // ajax for not logged in users


function ajax_load_fc_ajax_act_shopping_cart_paypal_complete()
{
	global $wpdb,$ws24hShop,$payMent;	
        
        $quantity = 1;
        $amount = intval($ws24hShop->shopCartGetTotalPrice());
        $item_number = date('mdyhi');        
        print_r(json_encode($payMent->payMent_get_button_submit_form($quantity,$amount,$item_number)));  
       //print_r(json_encode($item_number));
        
	die(); // stop executing script          
	
}

add_action( 'wp_ajax_ajax_act_shopping_cart_paypal_complete', 'ajax_load_fc_ajax_act_shopping_cart_paypal_complete' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_paypal_complete', 'ajax_load_fc_ajax_act_shopping_cart_paypal_complete' ); // ajax for not logged in users



// ++++++++++++++++++++++++++ Shopping cart delete item ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_load_button_paypal()
{
	global $wpdb,$ws24hShop,$payMent;	
        
        $quantity = 1;
        $amount = intval($ws24hShop->shopCartGetTotalPrice());
        $item_number = "#order" . time();
        
        print_r(json_encode($payMent->payMent_get_button($quantity,$amount,$item_number)));            
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_load_button_paypal', 'ajax_load_fc_ajax_act_shopping_cart_load_button_paypal' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_load_button_paypal', 'ajax_load_fc_ajax_act_shopping_cart_load_button_paypal' ); // ajax for not logged in users



// ++++++++++++++++++++++++++ Shopping cart continue ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_load_continue()
{
	global $ws24hShop;	      
            
        print_r(json_encode($ws24hShop->shop_shopping_cart_check_out_prev()));            
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_load_continue', 'ajax_load_fc_ajax_act_shopping_cart_load_continue' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_load_continue', 'ajax_load_fc_ajax_act_shopping_cart_load_continue' ); // ajax for not logged in users



// ++++++++++++++++++++++++++ Shopping cart delete item ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_delete_item()
{
	global $wpdb,$ws24hShop;	
        
        $productID = $_REQUEST['productId'];        
        $ws24hShop->shop_shopping_cart_delete_item($productID);        
        print_r(json_encode($ws24hShop->shop_show_shopping_cart()));    
        
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_delete_item', 'ajax_load_fc_ajax_act_shopping_cart_delete_item' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_delete_item', 'ajax_load_fc_ajax_act_shopping_cart_delete_item' ); // ajax for not logged in users


// ++++++++++++++++++++++++++ Shopping cart update item ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_update_item()
{
	global $wpdb,$ws24hShop;	
        
        $productId = $_REQUEST['productId'];   
        $productCount = $_REQUEST['productCount'];   
        
        $ws24hShop->shop_shopping_cart_update_item($productId,$productCount);        
        print_r(json_encode($ws24hShop->shop_show_shopping_cart()));    
        
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_update_item', 'ajax_load_fc_ajax_act_shopping_cart_update_item' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_update_item', 'ajax_load_fc_ajax_act_shopping_cart_update_item' ); // ajax for not logged in users




// ++++++++++++++++++++++++++ create select option ++++++++++++++
function  db_create_options_number($current,$max)
{
    $html = '';
    for($i=1 ; $i <= $max ; $i++)
    {
        if($current==$i)
        {
            $html .= '<option selected="selected" value="'.$i.'"> '.$i.' </option>';
        }
        else
        {
            $html .= '<option value="'.$i.'"> '.$i.' </option>';
        }
    }
    
    return $html;    
}


// update change shopping car infomation
// ++++++++++++++++++++++++++ loadding data to shopping cart icon ++++++++++++++++++
function ajax_load_fc_ajax_act_shopping_cart_change_info_shop()
{   
    global $ws24hShop;
    $mydata = $_REQUEST;    
    $ws24hShop->shop_update_info_option($mydata);
    
    print_r(json_encode($ws24hShop->shop_reload_total_info('')));     
    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_shopping_cart_change_info_shop', 'ajax_load_fc_ajax_act_shopping_cart_change_info_shop' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_shopping_cart_change_info_shop', 'ajax_load_fc_ajax_act_shopping_cart_change_info_shop' ); // ajax for not logged in users
