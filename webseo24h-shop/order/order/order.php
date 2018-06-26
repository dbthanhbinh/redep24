<?php
class paging
{
    public $totalPost;
    public $totalPage;
    public $postsPerpage;
    public $orderUrl;


    public function __construct() {
        $this->totalPost = 0;
        $this->totalPage = 0;
        $this->postsPerpage = 6;        
        $this->orderUrl = get_bloginfo("url").'/wp-admin/admin.php?page=orders';
    }
    
    public function paging_set_total_post($value)
    {
        $this->totalPost = $value;
    }
    
    public function paging_get_total_post()
    {
        return $this->totalPost;
    }

    public function paging_set_total_page($value)
    {
        $this->totalPage = $value;
    }
    
    public function paging_get_total_page()
    {
        return $this->totalPage;
    }
    
    public function paging_set_posts_per_page($value)
    {
        $this->postsPerpage = $value;
    }
    
    public function paging_get_posts_per_page()
    {
        return $this->postsPerpage;
    }
    
    public function paging_set_all($totalPost,$postsPerpage)
    {
        $totalPage = ceil($totalPost/$postsPerpage);
        
        $this->paging_set_total_post($totalPost);
        $this->paging_set_total_page($totalPage);
        $this->paging_set_posts_per_page($postsPerpage);
    }
    
    public function paging_get_order_url() 
    {
        return $this->orderUrl;
    }

    public function paging_show_paging($currentPage)
    {
        $html = '';
        if($this->totalPage > 1)
        {
            $html .= ' 
                    <style type="text/css">
                        .mypaging{}
                        .mypaging span.current,.mypaging a:hover{background-color:#e6EEEE; border:1px solid #ddd;}
                        .mypaging span,.mypaging a{padding:5px 10px; margin:5px 1px; display:block; float:left;"}
                    </style>    
                    <div id="mypaging" class="mypaging">';
                    $html .= '<a href=" ' . $this->paging_get_order_url() . '&paged=1 "> First </a>'; 
                    for($i=1 ; $i <= $this->totalPage ; $i++)
                    {
                        if($i==$currentPage)
                        {
                           $html .= '<span class="current"> ' . $i . ' </span>'; 
                        }
                        else
                        {
                            $html .= '<a href=" ' . $this->paging_get_order_url() . '&paged='.$i.' "> ' . $i . ' </a>'; 
                        }
                    }
                    $html .= '<a href=" ' . $this->paging_get_order_url() . '&paged='.$this->totalPage.' "> End </a>';
            $html .= '</div>';
        }
        
        echo $html;
    }

    public function __destruct() 
    {
        
    }
    
}


class order
{    
    public $_table;

    // create
    public function __construct() {        
        global $wpdb;
        
        $this->_table = $wpdb->prefix . 'orders';
    }

    public function order_install()
    {        
        global $wpdb;
        if($wpdb->get_var("SHOW TABLES LIKE '$this->_table'") != $this->_table)
	{
		$wpdb->query("CREATE TABLE {$this->_table}
		(			
			ID  mediumint(10) 		AUTO_INCREMENT PRIMARY KEY ,	
			orderId			VARCHAR(50) NULL,		
			customerId 		INT NULL,			
			customerName		VARCHAR(255) NULL,
                        customerRegister	VARCHAR(255) NULL,                        
                        orderPrice		INT NULL,                        
                        voucherCode 		VARCHAR(50) NULL,
			voucherValue 		INT NULL,
                        orderPoint              INT NULL,
                        orderPointStatus        INT NULL,
                        usePoint                INT NULL,                        
                        shipPing		VARCHAR(255) NULL, 
			shippingValue		INT NULL,
			codValue        	INT NULL,
			paymentMethod		VARCHAR(255) NULL,			
			paymentStatus		VARCHAR(50) NULL,			
			orderAdminNote		TEXT NULL,			
                        orderbook               TEXT NULL,	
                        orderStatus		VARCHAR(255) NULL,                        
                        orderNote		TEXT NULL,
                        orderDate		DATE NULL,                        
			UNIQUE KEY  (orderId)			
		)ENGINE=MyISAM DEFAULT CHARSET=utf8");
	}
    }

    
    public function test(){
        echo 'fasdfasf';
    }

    // destroy
    public function __destruct() {
        
    }
    
    // get all order for random order code
    public function get_all_orders_random_code()
    {
        global $wpdb;
        $query	= "SELECT * FROM $this->_table ORDER BY orderid DESC";
        ////$result	= $wpdb->get_results($query, OBJECT);
        $result	= $wpdb->get_row($query,ARRAY_A);
        if($result)
                return $result;
        else
                return false;
		
    }
    
    // get random code order when order customer
    public function order_random_ordercode()
    {
        $morderinfo = $this->get_all_orders_random_code();       
        $currentorderid = $morderinfo['orderId'];
        $currentorderid = intval(substr($currentorderid, -4));
        $currentorderid +=1;

        if($currentorderid<10)
                $nexorderid = '000'.$currentorderid;
        else if($currentorderid<100)
                $nexorderid = '00'.$currentorderid;
        else if($currentorderid<1000)
                $nexorderid = '0'.$currentorderid;
        else
                $nexorderid = $currentorderid;

        $y = date('y');
        $m = date('m');
        $ordercode = $y.$m.$nexorderid;
        $ordercode = "$ordercode";

        if($ordercode)
            return $ordercode;
        else
            return FALSE;
        
    }
    
    public function order_insert_new_order($orderdata)
    {
        global $wpdb;
        $wpdb->insert($this->_table, $orderdata);
        $order_id = $wpdb->insert_id;  // order id
        
        return $order_id;
    }
    
    // update order status complete
    public function order_update_order_status($orderdata,$orderid)
    {
        global $wpdb;
        $wpdb->update($this->_table,$orderdata,array('orderId' => $orderid));
    }
    
    
    // get all order have    
    public function order_get_all_orders()
    {
            global $wpdb;
            $query	= "SELECT * FROM $this->_table ORDER BY ID DESC";
            $result	= $wpdb->get_results($query, OBJECT);
            if($result)
                    return $result;
            else
                    return false;
    }
    
     // get all order have    
    public function order_get_all_orders_limit($postsPerpage,$ofset)
    {
            global $wpdb;
            $query	= "SELECT * FROM $this->_table ORDER BY ID DESC LIMIT $postsPerpage OFFSET $ofset";
            $result	= $wpdb->get_results($query, OBJECT);
            if($result)
                    return $result;
            else
                    return false;
    }
    
    // get all order have    
    public function order_count_all_orders()
    {
        global $wpdb;
        $result = $wpdb->get_var( "SELECT COUNT(DISTINCT ID) FROM $this->_table" );
        return $result;            
    }
    
    //// get order by order id
    public function order_get_order_by_id($orderid)
    {	
            global $wpdb;
            $query	= "SELECT * FROM $this->_table WHERE orderId='$orderid'";
            $result	= $wpdb->get_row($query,ARRAY_A);

            if($result)
                    return $result;
            else
                    return false;

    }
    
    // delete order by orderid
    public function db_delete_order_by_orderid($orderid)
    {
        global $wpdb,$orderDetail;
      
        $orderdata = $this->order_get_order_by_id($orderid);       
        if($orderdata)
        {    
            $orderDetail->db_delete_orderdetail_by_orderid($orderdata['ID']);            
            $wpdb->delete($this->_table, array('orderId' => $orderid));
        }
    }
    
}

//echo 'fadsfassafasfas ầ';
//$ordercode = $order->order_random_ordercode();
//echo 'fasdfsafa: ' . $ordercode;