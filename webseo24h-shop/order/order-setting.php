<?php
require_once 'orderdetail/orderDetail.php';
require_once 'order/order.php';

$order = new order();
$orderDetail = new orderDetail();
// include install database
####$order->order_install();
####$orderDetail->order_detail_install();
####$orderDetail->orderdetail_insert_new_orderdetail("14100002");

function ordersCustomPage ()
{
    ?>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url')?>/webseo24h-shop/order/css/jquery.autocomplete.css"/>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url')?>/webseo24h-shop/order/css/jquery.ui.all.css"/>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url')?>/webseo24h-shop/order/css/tablesorter.css"/>

    <?php
    global $order;
    if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action']=='View' && $_GET['id'])
    {
        require_once 'layout/order-detail.php';
    } 
    else if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action']=='Edit' && $_GET['id'])
    {
        require_once 'layout/order-edit.php';
    } 
    else
    {
       require_once 'layout/order-list.php';
    }
}

add_action('admin_menu','ordersAdminMenu');
/**
 * Create a admin menu name Hoa don
 */
function ordersAdminMenu(){
    
    $mypage=add_menu_page(__("Orders",THEME_NAME), __("Orders",THEME_NAME), "administrator", "orders",'ordersCustomPage','','110');	
}