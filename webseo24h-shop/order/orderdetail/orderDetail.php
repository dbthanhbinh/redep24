<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class orderDetail
{    
    public $_table;


    // create
    public function __construct() {        
        global $wpdb;
        
        $this->_table = $wpdb->prefix . 'order_detail';
    }

    public function order_detail_install()
    {
        global $wpdb;
        if($wpdb->get_var("SHOW TABLES LIKE '$this->_table'") != $this->_table)
	{
		$wpdb->query("CREATE TABLE {$this->_table}
		(			
			ID  mediumint(10) 		AUTO_INCREMENT PRIMARY KEY ,	
			orderId			VARCHAR(50) NULL,		
			productId 		INT NOT NULL,			
			productName		VARCHAR(255) NULL,                        
                        productPrice		VARCHAR(50) NULL,                                                
                        productCount 		INT NOT NULL,
                        productSubprice         VARCHAR(50) NULL,                        
                        productPerlink		VARCHAR(255) NULL,
                        productThumb		VARCHAR(255) NULL
					
		)ENGINE=MyISAM DEFAULT CHARSET=utf8");
	}
    }

        // destroy
    public function __destruct() {
        
    }
    
    public function orderdetail_insert_new_orderdetail($orderid)
    {
        global $ws24hShop, $wpdb;
        $totals = $ws24hShop->shop_db_get_total_item_shopping_cart();  
        
        if($totals>0)
        {
            $ti = 1;
            foreach ($_SESSION[$ws24hShop->sessionShop]['shoppingCart'] as $key => $val1) 
            {
                $tams = time().$ti;
                ////update_option("aaaabinhtotal", $tams);
                if($key)
                {
                    $orderdetail = array(
                        'orderId'               => $orderid,
                        'productId'             => $key,
                        'productName'           => $ws24hShop->shopCartGetItemProductTitle($key),
                        'productPrice'          => $ws24hShop->shop_show_price_format($ws24hShop->shopCartGetItemProductPrice($key),$ws24hShop->shop_get_item_productDiscount($key),1),
                        'productCount'          => $ws24hShop->shop_get_item_productCount($key),
                        'productSubprice'       => $ws24hShop->shop_get_price_unit_format($ws24hShop->shopCartGetItemProductPrice($key),$ws24hShop->shop_get_item_productCount($key),1),
                        'productPerlink'        => $ws24hShop->shopCartGetItemProductUrl($key),
                        'productThumb'          => $ws24hShop->shopCartGetItemProductThumb($key)
                    );     

                    $wpdb->insert($this->_table, $orderdetail);
                    $ti++;
                }
            }                                        
        }
        
    }
    
    //// get list order_detail by order id
    public function get_list_order_detail($orderid)
    {
            global $wpdb;
            $query	= "SELECT * FROM $this->_table WHERE orderId='$orderid'";


            $result	= $wpdb->get_results($query, OBJECT);

            if($result)
                    return $result;
            else
                    return false;
    }
    
    // delete order by orderid
    public function db_delete_orderdetail_by_orderid($orderid)
    {
        global $wpdb;           
        $wpdb->delete($this->_table, array('orderId' => $orderid));
    }
    
    // update order status complete
    public function orderdetail_update_item($orderDetaildata,$orderid,$productId)
    {
        global $wpdb;
        $wpdb->update($this->_table,$orderDetaildata,array('orderId' => $orderid,'productId' => $productId));
    }
    
    
}

//$orderDetail->orderdetail_insert_new_orderdetail("14100002");