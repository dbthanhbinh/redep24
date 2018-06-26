<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// shop class
class ws24hShop
{
    public $productID;   // id product
    public $productCount;  // number of product
    public $shopCartIconUrl; // url img shop cart icon
    public $shopCartUrlPage;  // link to shopping cart url
    public $shopCheckoutUrlPage;  // link to shopping cart checkout url
    public $shoppingCart;     // array session shopping 
    public $shoppingInfo;     // array session shopping info
    public $sessionShop;
    public $curency;
    public $curencyPrefix;
    public $iconDelUrl;
    public $counTrys;
    public $emailHotline;
    public $defaultDomain;

    // construct shop
    public function __construct() {
        global $sessionID;        
        $this->shopCartIconUrl = get_template_directory_uri().'/public/default/images/icon-giohang.png';
        $this->productID = 0;
        $this->productCount = 1;
        $this->shopCartUrlPage = get_bloginfo('url').'/dat-hang';
        $this->shopCheckoutUrlPage = get_bloginfo('url').'/checkout';
        $this->sessionShop = $sessionID.'_ws24hShop';   
        $this->curency = ' VNĐ';
        $this->curencyPrefix = 'last';
        $this->iconDelUrl = get_template_directory_uri().'/webseo24h-shop/images/icon_del.png';
        $this->emailHotline = '0909 874 825';
        $this->defaultDomain = get_bloginfo('url');
        $this->shoppingInfo = 'shoppingInfo';
    }

    // destruct shop
    public function __destruct(){}

    // +++++++++  shop set value  ++++++++++++
    public function shopCartSetTotalItems($total) {
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalItems'] = $value;
    }
    
    // public function shop_get_shopping_cart_total_items()
    public function shopCartGetTotalItems(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalItems'];
    }
    
    // total shopping price
    // public function shop_set_shopping_cart_total_price($value)
    public function shopCartSetTotalPrice($totalPrice){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalPrices'] = $totalPrice;
    }
    
    // public function shop_get_shopping_cart_total_price()
    public function shopCartGetTotalPrice(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalPrices'];
    }
    
    public function shopCartSetTotalPriceEnd($totalPricesEnd){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalPricesEnd'] = $totalPricesEnd;
    }
    
    // public function shop_get_shopping_cart_total_price_end()
    public function shopCartGetTotalPriceEnd(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['totalPricesEnd'];
    }
    
    // shopping Note
    // public function shop_set_shopping_cart_note($value)
    public function shopCartSetNote($note){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopNote'] = $note;
    }
    
    // public function shop_get_shopping_cart_note()
    public function shopCartGetNote(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopNote'];
    }
    
    // shopping Payment
    // public function shop_set_shopping_cart_payment($value)
    public function shopCartSetPayment($shopPayment){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopPayment'] = $shopPayment;
    }
    
    // public function shop_get_shopping_cart_payment()
    public function shopCartGetPayment(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopPayment'];
    }
    
    // shopping Voucher Price
    // public function shop_set_shopping_cart_voucherprice($value)
    public function shopCartSetVoucherPrice($voucherPrice){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['voucherPrice'] = $voucherPrice;
    }
    
    // public function shop_get_shopping_cart_voucherprice()
    public function shopCartGetVoucherPrice(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['voucherPrice'];
    }
    
    // shopping Shipping
    // public function shop_set_shopping_cart_shipping($shopShipping)
    public function shopCartSetShipping($shopShipping){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopShipping'] = $shopShipping;
    }
    
    // public function shop_get_shopping_cart_shipping()
    public function shopCartGetShipping(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopShipping'];
    }
    
    // shopping COD
    // public function shop_set_shopping_cart_cod($value)
    public function shopCartSetCodFree($codFree){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopCod'] = $codFree;
    }
    
    // public function shop_get_shopping_cart_cod()
    public function shopCartGetCodFree(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopCod'];
    }
    
    // shopping buyer
    // public function shop_set_shopping_cart_buyer($value)
    public function shopCartSetBuyer($shopBuyer){
        $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopBuyer'] = $shopBuyer;
    }
    
    // public function shop_get_shopping_cart_buyer()
    public function shopCartGetBuyer(){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo]['shopBuyer'];
    }
    
    // all shopinfo set
    // public function shop_set_shopping_cart_infomation($value)
    public function shopCartSetShopInfomation($shoppingInfo){
        $_SESSION[$this->sessionShop][$this->shoppingInfo] = $shoppingInfo;
    }
    
    // element shopinfo set
    // public function shop_set_shopping_cart_infomation_element($value)
    public function shopCartSetShopInfomationElement($shoppingInfoElement){
        foreach ($shoppingInfoElement as $key=>$val){
            $_SESSION[$this->sessionShop][$this->shoppingInfo][$key] = $val;
        }
    }    
    
    // shopping shoppingInfo
    // public function shop_set_shoppingInfo_element($key,$value)
    public function shopCartSetShopInfomationElementItem($key,$value){
        $_SESSION[$this->sessionShop][$this->shoppingInfo][$key] = $value;
    }
    
    // public function shop_get_shoppingInfo_element($key)
    public function shopCartGetShopInfomationElementItem($key){
        return $_SESSION[$this->sessionShop][$this->shoppingInfo][$key];
    }
    
    // +++++++++  shop get value  ++++++++++++
    
    // get item productTitle
    // public function shop_get_item_productTitle($productId)
    public function shopCartGetItemProductTitle($productId){
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productTitle'];
    }
    
    // get item productUrl
    // public function shop_get_item_productUrl($productId)
    public function shopCartGetItemProductUrl($productId){
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productUrl'];
    }
    
    // get item productThumb
    // public function shop_get_item_productThumb($productId)
    public function shopCartGetItemProductThumb($productId){
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productThumb'];
    }
    
    // get item productPrice
    // public function shop_get_item_productPrice($productId)
    public function shopCartGetItemProductPrice($productId){
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productPrice'];
    }
    
    // get item productDiscount
    public function shop_get_item_productDiscount($productId)
    {
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productDiscount'];
    }
    
    // get item productCount
    public function shop_get_item_productCount($productId)
    {
        return $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productCount'];
    }

    public function db_show_html_trangthaidonhang($current)
    {
        $ttdh = array(
            'Pendding',
            'Processing',
            'Complete',
            'Cancel'
        );
        $html = '';
        foreach ($ttdh as $value)
        {
            if($value==$current)
                $html .= '<option selected="selected" value="'.$value.'">'.$value.'</option>';
            else
                $html .= '<option value="'.$value.'">'.$value.'</option>';
        }
        return $html;
    }

    public function shop_db_get_total_item_shopping_cart()
    {
        $items = 0;        
        if(isset($_SESSION[$this->sessionShop]['shoppingCart']) && !empty($_SESSION[$this->sessionShop]['shoppingCart']))
        {
            foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
            {
                
                $items+=$value['productCount'];
            }
        }
        
        return $items;
    }


    public function shop_show_shopping_cart_icon(){
        $html = ' 
            <div class="shop-shopping-cart-icon">  
                <a href="'.$this->shopCartUrlPage.'">
                    <img alt="shopping-cart" src="'.$this->shopCartIconUrl.'" />
                </a>        
                <div class="hold-shop-cart-icon-number" id="hold-shop-cart-icon-number">
                    <a class="shop-cart-icon-number" href="'.$this->shopCartUrlPage.'"> <label> <span>0</span><span>items</span> </label>  </a>
                </div>

            </div>
        ';
        echo $html;
        unset($html);
    }
    
    // $unitPrice = 0 ; return show price html: $unitPrice = 1 return price unit no html
    public function shop_show_price_format_prefix($productPrice,$unitPrice){
        if($unitPrice==1)
        {
            return $productPrice;
        }
        else if($unitPrice==0)
        {
            if($this->curencyPrefix=='first')
            {
                return $this->curency.' '. number_format($productPrice, 0);
            }
            else
            {
                return number_format($productPrice, 0) .' '.$this->curency;
            } 
        }       
    }

    public function shop_get_price_unit_format($productPrice,$productCount,$unitPrice){               
        $mprice = $productPrice*$productCount;
        return $this->shop_show_price_format_prefix($mprice,$unitPrice);
    }
    
    public function shop_show_price_format($productPrice,$productDiscount,$unitPrice){
        $price = 1;
        if($productDiscount>0)
        {
            if($productPrice <= $productDiscount)
                $price = $productPrice;
            else if($productDiscount < $productPrice)
                $price =$productDiscount;
        }
        else
            $price = $productPrice;
            
        return $this->shop_show_price_format_prefix($price,$unitPrice);
    }

    public function shop_get_shopping_cart_loadding_first(){
        $html = ' 
            <div class="shop-shopping-cart-icon">  
                <a href="'.$this->shopCartUrlPage.'">
                    <img alt="shopping-cart" src="'.$this->shopCartIconUrl.'" />
                </a>        
                <div class="hold-shop-cart-icon-number" id="hold-shop-cart-icon-number">
                    ' . $this->shop_get_shopping_cart_loadding() . '
                </div>

            </div>
        ';
        echo $html;
    }
    
    public function shop_get_shopping_cart_loadding(){
        $totals = $this->shop_db_get_total_item_shopping_cart();        
        $html = ' 
                <a class="shop-cart-icon-number" href="'.$this->shopCartUrlPage.'"> <label> <span>'.$totals.'</span><span>items</span> </label>  </a>
                <div class="shoping-cart-tooltip" id="shoping-cart-tooltip">
                        <div class="shoping-cart-tooltip-title">
                            <p> Shopping cart current <label>('.$totals.' items)</label></p>
                        </div>
                        <div class="shoping-cart-tooltip-content">
                                <ul>
                                ';
                                if($totals>0)
                                {
                                    foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
                                    {
                                        
                                        $html .= ' 
                                                <li>
                                                    <a href="'.$this->shopCartGetItemProductUrl($key).'">
                                                        <img alt="'.$this->shopCartGetItemProductTitle($key).'" src="'.$this->shopCartGetItemProductThumb($key).'">
                                                    </a>			
                                                    <div class="cart-tooltip-content">
                                                            <a href="'.$this->shopCartGetItemProductUrl($key).'">'.$this->shopCartGetItemProductTitle($key).'</a>
                                                            <br><label>'.$this->shop_show_price_format($this->shopCartGetItemProductPrice($key),$this->shop_get_item_productDiscount($key),0).' (Num: '.$this->shop_get_item_productCount($key).')</label>
                                                    </div>
                                                </li>
                                            ';
                                        
                                    }                                        
                                }
                                else 
                                {
                                    $html .= '<li><p style=" padding:20px;"> Not found items  </p></li>';
                                }
                $html .= '                                     										
                                </ul>
                        </div>
                        <div class="shoping-cart-tooltip-bottom">
                                <a href="'.$this->shopCartUrlPage.'"> Thanh toán </a>	
                        </div>					
                    </div>
                ';
        $this->shopCartSetTotalItems($totals);
        return $html;      
    }

    public function shop_show_shopping_cart_top_menu()
    {
        $totals = $this->shop_db_get_total_item_shopping_cart();
        
        $html = ' 
            <ul class="mn_child_tool">
                <li>
                        <div class="f_info_tool">

                        <ul>';
                        
                        if($totals>0):
                            foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
                            {
        $html .= ' 
                            <li>
                                <div class="sp_i_info_tool">
                                        <table>
                                        <tr>
                                                <td>
                                                    <img alt="'.$this->shopCartGetItemProductTitle($key).'" src="'.$this->shopCartGetItemProductThumb($key).'">
                                                </td>
                                        </tr>
                                    </table>
                                </div><!-- End .sp_i_info_tool -->
                                <div class="name_info_tools">
                                        <a href="'.$this->shopCartGetItemProductUrl($key).'" title="'.$this->shopCartGetItemProductTitle($key).'">
                                        '.$this->shopCartGetItemProductTitle($key).'
                                    </a>
                                    <span>Số lượng: '.$this->shop_get_item_productCount($key).'</span>
                                </div><!-- End .name_info_tools -->
                                <div class="clear"></div>
                            </li>';
                            }
                        else:
                            $html .= '<li> <p style="color:#ff0000;"> Giỏ hàng rỗng. </p> </li>';
                        endif;
                        
                        
        $html .= '                 
                        </ul>

                        <a class="view_gh" id="view_gh_shop" href="#" title="">
                                Xem giỏ hàng ('.$totals.' sp)
                        </a><!-- End .view_gh -->

                    </div><!-- End .f_info_tool -->
                </li>
            </ul><!-- End .mn_child_tool -->'
            ;
        
        return $html;      
    }
    
    
        /** show buttion add to cart 
     * 
     * @param type $postid is number
     * show button in detail page, or foreach product on product page
     */
    
    public function shop_show_button_add_to_cart($postid){
        $html = '<input class="btn_addcard" type="submit" class="productID" rel="'.$postid.'" value="'.__("Add to cart",THEME_NAME).'"/>';
        echo $html;        
    }

    /**
     * 
     * @param type $cartdata
     * $cartdata = array(
     *  'productId' => '',
     *  'productCount' => '', 
     * );
     */
    public function shop_session_add_to_cart($productId, $productData){        
       if(!isset($_SESSION[$this->sessionShop]['shoppingCart']) || 
            empty($_SESSION[$this->sessionShop]['shoppingCart'])
        ){
           $_SESSION[$this->sessionShop]['shoppingCart'][$productId] = $productData;
       }
       else {
           if(!key_exists($productId, $_SESSION[$this->sessionShop]['shoppingCart'])){
                $_SESSION[$this->sessionShop]['shoppingCart'][$productId] = $productData;
           }
       }
       
       if(!isset($_SESSION[$this->sessionShop][$this->shoppingInfo]) || 
            empty($_SESSION[$this->sessionShop][$this->shoppingInfo])
        ){
            $_SESSION[$this->sessionShop][$this->shoppingInfo] = [];
        }
    }

    
    // show shopping cart loop
    public function shop_loop_shopping_cart()
    {
        $html = '';
        $totalPrice = 0;
        $tamp = 1;
        foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
        {
            $unitprices = $this->shop_show_price_format($this->shopCartGetItemProductPrice($key), $this->shop_get_item_productDiscount($key), 1);
            $subPrice = $unitprices*$this->shop_get_item_productCount($key);
            $totalPrice += $subPrice;
            // set shopping cart total price
            $this->shopCartSetTotalPrice($totalPrice);
            $html .= ' 
                    <tr class="shopping-item">   
                            <td>
                                '.$tamp.'
                            </td>
                            <td colspan="2" class="shopping-cols1">
                                <a href="'.$this->shopCartGetItemProductUrl($key).'">
                                    <img alt="" src="'.$this->shopCartGetItemProductThumb($key).'">
                                </a>
                                <a href="'.$this->shopCartGetItemProductUrl($key).'"> <span>'.$this->shopCartGetItemProductTitle($key).'</span> </a>
                            </td>
                            <td class="shopping-cols2">                                
                                    <select class="shopping-cart-item-count" rel="'.$key.'" name="shopping-cart-item-count-'.$key.'" id="shopping-cart-item-count-'.$key.'"> ';
                       
                                       $html .= db_create_options_number($this->shop_get_item_productCount($key), 30) ;
            
            $html .= ' 
                                    </select>   
                            </td>
                            <td class="shopping-cols3">'.$this->shop_show_price_format($this->shopCartGetItemProductPrice($key), $this->shop_get_item_productDiscount($key), 0).'</td>
                            <td class="shopping-cols4">                                
                                <div id="shopping_price_item_1151">'.$this->shop_show_price_format_prefix($subPrice, 0).'</div>
                            </td>
                            <td class="shopping-cols5">   
                                <label class="shopping-cart-item-del" rel="'.$key.'">
                                    <img style="width:16px; height:16px;" alt="" src="'.$this->iconDelUrl.'">                               
                                </label>        
                            </td>
                    </tr>
                ';
            $tamp++;
        }  
        return $html;      
    }

    public function shop_loop_shopping_cart_check_out()
    {
        $disabled = '';
        $totalCount = $this->shop_db_get_total_item_shopping_cart();  //items in cart
        if($totalCount<=1)
            $disabled = 'disabled="true"';
        
        $html = ' 
                <div class="l_f_dn">
                    
                    <div class="m_lfdn order-m_lfdn">

                        <h4 class="title_lfdn">Tiến hành mua hàng</h4>';
        $html .= member_layout_main_login($totalCount,$disabled);                

        $html .= ' 
                    </div><!-- End .m_lfdn -->

                </div><!-- End .l_f_dn -->


                <div class="r_f_dn">
                    <div class="block_rfdn">
                            <h4 class="title_lfdn">Thông tin đơn hàng</h4>
                        <div class="m_rfdn">
                        <table class="mcheckout-form" bordercolor="#eee"  align="center" border="1"  cellpadding="0" cellspacing="0" style="width:99%;">
                        
                            <tr class="summary-shopping-item">
                                <th class="shopping-cols1">Sản phẩm</th>
                                <th class="shopping-cols2">Số lượng</th>
                                <th class="shopping-cols3">Thành tiền</th>
                            </tr>                        
                            ';
                            
                            $totalPrice = 0;                            
                            if($totalCount>0)
                            {
                                foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
                                {
                                    $unitprices = $this->shop_show_price_format($this->shopCartGetItemProductPrice($key), $this->shop_get_item_productDiscount($key), 1);
                                    $subPrice = $unitprices*$this->shop_get_item_productCount($key);
                                    $totalPrice += $subPrice;
                                    // set shopping cart total price
                                    $this->shopCartSetTotalPrice($totalPrice);
                                    $html .= ' 
                                            <tr class="shopping-item summary-shopping-item">                                           
                                                    <td class="shopping-cols1">                                
                                                        <a href="'.$this->shopCartGetItemProductUrl($key).'"> <span>'.$this->shopCartGetItemProductTitle($key).'</span> </a>
                                                    </td>
                                                    <td class="shopping-cols2">';                             


                                    $html .= ' 
                                                       <label>'.$this->shop_get_item_productCount($key).'</label>
                                                    </td>                            
                                                    <td class="shopping-cols3">                                
                                                        <div id="shopping_price_item_1151">'.$this->shop_show_price_format_prefix($subPrice, 0).'</div>
                                                    </td>  
                                            </tr>
                                        ';

                                } 
                            }
                            else 
                            {
                                $html .= ' 
                                            <tr class="shopping-item summary-shopping-item">                                           
                                                <td class="shopping-cols1" colspan="4">                                
                                                    <p style="color:#ff0000;"> Giỏ hàng rỗng </p>
                                                </td>
                                            </tr>        
                                        '; 
                            }
        
        
        $html .= '                 
                                <tr class="summary-shopping-item summary-total-shopping-item"> 
                                    <td class="summary-total1" colspan="2" >Thành tiền: </br> <i>( Giá chưa bao gồm phí vận chuyển )</i></td>
                                    <td class="summary-total2">
                                        '.$this->shop_show_price_format_prefix($this->shopCartGetTotalPrice(), 0).'                                        
                                    </td>
                                </tr>                          
                        </table>
                        </div><!-- End .m_rfdn -->
                    </div><!-- End .block_rfdn -->

                </div><!-- End .r_f_dn -->

                <div class="clear"></div>
                ';         
        return $html;      
    }
    
    public function shop_reload_total_info($disabled)
    {
        //process shipping price
        $totalPrice = $this->shopCartGetTotalPrice();
        $totalShipping = $this->shop_process_shipping('','','');
        $totalPrice += $totalShipping;
        $this->shopCartSetShipping($totalShipping);

        // process cod price
        $totalCod = $this->shop_process_cod($totalPrice, $this->shopCartGetPayment());
        $this->shopCartSetCodFree($totalCod);

        // end shop price
        $totalPriceEnd = $totalPrice + $totalCod;
        $this->shopCartSetTotalPriceEnd($totalPriceEnd);

        $html = '        
            <table bordercolor="#eee"  align="center" border="0"  style="margin-top:10px;" cellpadding="0" cellspacing="0" width="100%">
                <tr class="summary-shopping-item complete-total-shopping-item"> 
                    <td class="summary-total1" colspan="3" >Thành tiền:</td>
                    <td>
                        '.$this->shop_show_price_format_prefix($this->shopCartGetTotalPrice(), 0).'                                        
                    </td>
                </tr>';
                
                if($this->shopCartGetVoucherPrice()): 
                    $html .= '             
                        <tr class="summary-shopping-item complete-total-shopping-item"> 
                            <td class="summary-total1" colspan="3" >Sử dụng voucher:</td>
                            <td>
                                - '.$this->shop_show_price_format_prefix($this->shopCartGetVoucherPrice(), 0).'
                            </td>
                        </tr>';
                endif;

                if($this->shopCartGetShipping()):
                    $html .= '                  
                        <tr class="summary-shopping-item complete-total-shopping-item"> 
                            <td class="summary-total1" colspan="3" >Phí vận chuyển:</td>
                            <td>
                                + '.$this->shop_show_price_format_prefix($this->shopCartGetShipping(), 0).'
                            </td>
                        </tr>';
                endif;

                if($this->shopCartGetCodFree()):                            
                    $html .= ' 
                        <tr class="summary-shopping-item complete-total-shopping-item"> 
                            <td class="summary-total1" colspan="3" >Phí COD:</td>
                            <td>
                                +'.$this->shop_show_price_format_prefix($this->shopCartGetCodFree(),0).'
                            </td>
                        </tr>
                        ';
                    
                endif;      

        $html .= '                 
                <tr class="summary-shopping-item summary-total-shopping-item" style="border-top:1px solid #ddd;">  
                    <td class="summary-total1" colspan="3" >Tổng thanh toán:</td>
                    <td class="summary-total2">
                        '.$this->shop_show_price_format_prefix($this->shopCartGetTotalPriceEnd(), 0).'                                        
                    </td>
                </tr> 
            </table>

            <ul style="margin-top:10px;" class="ul_m_lfdn">
                <li>
                    <div class="l_lfdn">
                        &nbsp;
                    </div>
                    <div class="r_lfdn">
                        <input class="btn_lfdn" '.$disabled.' id="btn_book_this_order" style="float:right;" type="submit" value="Đặt đơn hàng này"/>
                    </div>
                    <div class="clear"></div>
                </li>
            </ul>';

        return $html;
    }
    
    public function shop_process_shipping($thanhpho,$quanhuyen,$weightship)
    {
        $free_shipp = 0;
        /*    
        if($thanhpho=="TP HỒ CHÍ MINH")
        {
            $free_shipp = db_get_shipping_free_hcm($quanhuyen);
            if($free_shipp==20000 && $this->ws24hShop_get_shopprice()>$this->hcm_price_fix1)
                $free_shipp = 0;
            else if($free_shipp==30000 && $this->ws24hShop_get_shopprice()>$this->hcm_price_fix2)
                $free_shipp = 0;

                if($this->ws24hShop_get_payment_method_shipfree()=="SHIPFREE")
                    $free_shipp = 0;
        }
        else 
        {            
            $free_shipp = db_get_shipping_order($address=$thanhpho,$weight_shipp=$weightship);											

            //$html .= 'fdsafff: '.$free_shipp;

           if($this->ws24hShop_get_payment_method_shipfree()=="SHIPFREE")
               $free_shipp = 0;
        }
        */
        return $free_shipp;
    }

    public function shop_process_cod($totalPrice, $paymentMethod=null)
    {
        $cod_shipp = 0;
        if($paymentMethod && strtoupper($paymentMethod) != 'COD')
            return $cod_shipp;

        $_price = ($totalPrice*2)/100;
        $_price = number_format($_price,0);
        $_price = round(str_ireplace(",", ".", $_price));
        $cod_shipp = $_price*1000;
        if($cod_shipp<15000)
            $cod_shipp = 15000;
                
        return $cod_shipp;
    }

    public function hold_loading_shop_change_info($totalCount,$disabled){
        $html = '';        
        $html .= '<table bordercolor="#eee"  align="center" border="1"  cellpadding="0" cellspacing="0" width="100%" style="margin-top:5px;">
                    <tr class="summary-shopping-item">
                        <th class="shopping-cols1" colspan="2">Sản phẩm</th>
                        <th class="shopping-cols2">Số lượng</th>
                        <th class="shopping-cols3">Thành tiền</th>
                    </tr>                        
                    ';
                    $totalPrice = 0;
                    $totalCod = 0;                            
                    if($totalCount>0){
                        foreach ($_SESSION[$this->sessionShop]['shoppingCart'] as $key => $value) 
                        {
                            $unitprices = $this->shop_show_price_format($this->shopCartGetItemProductPrice($key), $this->shop_get_item_productDiscount($key), 1);
                            $subPrice = $unitprices*$this->shop_get_item_productCount($key);
                            $totalPrice += $subPrice;

                            $html .= ' 
                                <tr class="shopping-item summary-shopping-item">                                           
                                    <td colspan="2" class="shopping-cols1">                                
                                        <a href="'.$this->shopCartGetItemProductUrl($key).'"> <span>'.$this->shopCartGetItemProductTitle($key).'</span> </a>
                                    </td>
                                    <td class="shopping-cols2">'; 
                            $html .= '<label>'.$this->shop_get_item_productCount($key).'</label>
                                    </td>                            
                                    <td class="shopping-cols3">                                
                                        <div id="shopping_price_item_1151">'.$this->shop_show_price_format_prefix($subPrice, 0).'</div>
                                    </td>  
                                </tr>
                                ';
                        }
                        // set shopping cart total price
                        $this->shopCartSetTotalPrice($totalPrice); 

                        // //process shipping price
                        // $totalShipping = $this->shop_process_shipping('','','');
                        // $totalPrice += $totalShipping;
                        // $this->shopCartSetShipping($totalShipping);

                        // // process cod price
                        // $totalCod = $this->shop_process_cod($totalPrice, $this->shopCartGetPayment());
                        // $this->shopCartSetCodFree($totalCod);

                        // // end shop price
                        // $totalPriceEnd = $totalPrice + $totalCod;
                        // $this->shopCartSetTotalPriceEnd($totalPriceEnd);
                    }
                    else {
                        $html .= '<tr class="shopping-item summary-shopping-item">                                           
                                <td colspan="4" class="shopping-cols1">                                
                                    <p style="color:#ff0000;"> Giỏ hàng rỗng </p>
                                </td>                                                     
                            </tr>';
                    }                            
        $html .= '</table>';
        $html .= ' 
                <div class="field_shoping_note">
                    <label> Nhập ghi chú đơn hàng </label>
                    <textarea '.$disabled.' id="text_shoping_note" class="text_shoping_note"></textarea>
                </div>    
                ';
        $html .= '<div id="hold_shop_reload_total_info">';
        $html .= $this->shop_reload_total_info($disabled);
        $html .= '</div>';        
        return $html;
    }

    public function shop_get_data_info($display_name,$email,$phone,$address,$district,$cities,$register)
    {
        $shopDataInfo = array(
            'order_fullname'                => $display_name,
            'order_email'                   => $email,
            'order_phone'                   => $phone,
            'order_address'                 => $address,
            'order_district'                => $district,
            'order_cities'                  => $cities,
            'order_check_this'              => '',
            'received_fullname'             => $display_name,
            'received_email'                => $email,
            'received_phone'                => $phone,
            'received_address'              => $address,
            'received_district'             => $district,
            'received_cities'               => $cities,
            'shopPayment'                   => '',
            'totalItems'                    => '',
            'admin_note'                    => '',
            'totalPrices'                   => '',
            'shopShipping'                  => '',
            'shopCod'                       => '',
            'totalPricesEnd'                => '',
            'shopNote'                      => '',
            'voucherPrice'                  => '',
            'order_count'                   => '',
            'order_register'                => $register

        );
        
        return $shopDataInfo;
    }
    
        // enter info order
    public function shop_loop_shopping_cart_order()
    {
        $disabled = '';
        $html = '';
        $totalCount = $this->shop_db_get_total_item_shopping_cart();  //items in cart        
        if($totalCount<=0)
            $disabled = 'disabled="true"';        
            $html .= ' 
                <div class="l_f_dn">                    
                    <div class="m_lfdn order-m_lfdn">
                        <h4 class="title_lfdn">Thông tin mua hàng</h4>';
            $html .= member_layout_main_order($disabled);
            $html .= ' 
                    </div><!-- End .m_lfdn -->
                </div><!-- End .l_f_dn -->
                <div class="r_f_dn">
                    <div class="block_rfdn">
                        <h4 class="title_lfdn">Thông tin đơn hàng</h4>
                        <div class="m_rfdn" id="hold-loading-shop-change-info">';                   
                        $html .= $this->hold_loading_shop_change_info($totalCount,$disabled);        
                    $html .= '                 
                        </div><!-- End .m_rfdn -->
                    </div><!-- End .block_rfdn -->
                </div><!-- End .r_f_dn -->
                <div class="clear"></div>
                ';         
        return $html;      
    }
    

    // show shopping cart
    public function shop_show_shopping_cart()
    {
        $totalItems = $this->shop_db_get_total_item_shopping_cart();
        $html =' 

            <div class="shopping-content">
            <form action="'.$this->shopCheckoutUrlPage.'" method="POST">
            ';
                if($totalItems>0)
                {
        $html .= ' 
                    <div class="your-shopping-cart">
                        <h5>Giỏ hàng của bạn</h5>
                    </div>
                    <table align="center" bordercolor="#eee" border="1" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="shopping-title">                 
                            <th class="shopping-cols1"></th>
                            <th colspan="2" class="shopping-cols1">Sản phẩm</th>
                            <th class="shopping-cols2">Số lượng</th>
                            <th class="shopping-cols3">Đơn giá</th>
                            <th class="shopping-cols4">Thành tiền</th>
                            <th class="shopping-cols5">Cập nhật</th>                            
                        </tr>';
        $html .= $this->shop_loop_shopping_cart();
	
        $html.=   '</table>    
                    ';
        
         $html.=' 			
			<div class="action-continue">
                            <div class="step1-summary" style="float:left; width:100%;">
                                <div class="step1-summary-l"> </div>
                                <div class="step1-summary-r"> 
                                    <p><label>Tổng: </label> <span> '.$this->shop_show_price_format_prefix($this->shopCartGetTotalPrice(), 0).' </span></p>
                                    <p class="mt2"><label>Thanh toán<i style="font-size:11px;">( Chưa phí )</i>: </label> <span> '.$this->shop_show_price_format_prefix($this->shopCartGetTotalPrice(), 0).' </span></p>
                                </div>                                 
                            </div>
                            

                            <div class="btn-shopping-continue">

                                    <div class="button-bg">
                                        <div class="input-left"></div>
                                            <div class="input-mid">                    
                                                <label class="btn_lfdn" onclick="goBack()" >Mua hàng tiếp</label>
                                                <input type="submit" class="btn_lfdn" id="go-to-checkout" value="Tiến hành đặt hàng">                                                        
                                            </div>
                                        <div class="input-right"></div>
                                    </div>
                            </div>
                        </div>';            
        
                }
                else
                {
                    $html .= '<p style="padding:20px;"> Chưa chọn sản phẩm trong giỏ hàng! </p>';
                }
            $html .= ' 
              </form>  
              </div>
                ';
        return $html;
        
    }

    // show shoping cart send order success. click continue
    public function shop_shopping_cart_send_data_succuss()
    {
        global $companyInfo;
        $html = ' 
                <div style="float: left; padding: 1%; width: 98%;">
                        <div class="main-right-head">
                            <span>Thanks you for send contact us</span>
                        </div>				
                </div>

                <div class="detail-content">
                    <p style="font-size: 130%; color: #c21b15; margin-bottom: 10px;">
                        Your order is being processed our,Our staff will contact you as soon as possible.
                    </p>  
                    <p style="font-size: 130%; color: #c21b15;">
                        Please Call: '.$companyInfo->get_CHotline().' - Go to <a style="color: #003DAD;font-size: 13px;" href="'.get_bloginfo("url").'">Home page.</a>
                    </p>
                </div>
                ';
        
        return $html;
    }

    public function shop_show_country()
    {
        $countrys = db_get_countries();
        $html = '';
        foreach ($countrys as $val)
        {
            $html .= '<option value="'.$val.'"> '.$val.' </option>';
        }
        
        return $html;
    }

    public function shop_shopping_cart_check_out_prev($use_paypal_payment)
    {
        $html = ' 
            <div style="float: left; padding: 1% 1% 0 1%; width: 98%;">
                    <div class="main-right-head">
                        <span>Shopping - Checkout</span>
                    </div>				
            </div>

            <div class="detail-content" id="page-content-shopping-cart" style="margin-top:0;">					

                <div class="checkout-shopping-cart-shipping">

                    <div class="shopping-cart-shipping-title">
                        <p> <label> Checkout:</label><span> Shipping address</span></p>
                        <p id="checkout-form-error">Please provide a shipping address so that we can calculate shipping fees and applicable taxes.</p>

                    </div>

                    <div class="checkout-items checkout-items-country ">
                        <label>Country</label>
                        <select id="mshopping-country">';
        
                        $countrys = db_get_countries();                        
                        foreach ($countrys as $val)
                        {
                            $html .= '<option value="'.$val.'"> '.$val.' </option>';
                        }
        
$html .= ' 
                        </select>
                    </div>   
                    <div class="checkout-items">
                        <div class="checkout-items-1">
                            <label>First name</label>
                            <input id="mshopping-first-name" type="text" value=""/>

                        </div>
                        <div class="checkout-items-2">
                            <label>Last name</label>
                            <input id="mshopping-last-name" type="text" value=""/>

                        </div>

                    </div>

                    <div class="checkout-items">
                        <label>Address</label>
                        <input id="mshopping-address-1" type="text" value=""/>
                        <input id="mshopping-address-2" type="text" value=""/>
                    </div>

                    <div class="checkout-items">
                        <div class="checkout-items-1">    
                            <label>City/Town</label>
                            <input id="mshopping-city-town" type="text" value=""/>
                        </div>    
                        <div class="checkout-items-2">    
                            <label>State</label>
                            <input id="mshopping-state" type="text" value=""/>
                        </div>
                    </div>
                    <div class="checkout-items checkout-items-zip-code">
                        <div class="checkout-items-1">
                            <label>Zip code</label>
                            <input id="mshopping-zip-code" type="text" value=""/>
                        </div> 
                        <div class="checkout-items-1">
                            <label>Phone number</label>
                            <input id="mshopping-phone-number" type="text" value=""/>
                        </div>
                    </div>

                    <div class="checkout-items checkout-items-email">
                        <label>Email address</label>
                        <input id="mshopping-email" type="text" value=""/>
                    </div>

                    <div class="shopping-cart-shipping-title shopping_cart_review" style="margin-bottom: 0;">
                        <p> <span> Shopping cart Review</span></p>                                            
                    </div>

                    <div style="float: left; display: block; width: 100%;" class="checkout-shop-prev">';
                        
                    $html .= $this->shop_loop_shopping_cart_check_out();
$html .= '
                    </div>

                </div>


                <div class="checkout-shopping-cart-summary">
                    <div class="shopping-cart-shipping-title">
                        <p> <label> Shopping Payment:</label></p>                                           
                    </div>

                    <div class="checkout-items">
                        <label>Shopping note</label>
                        <textarea class="shopping-note" id="mshopping-note"></textarea>
                    </div>

                    <div class="checkout-items">
                        <label class="final-total"><strong>Subtotal: <span>'.$this->shop_show_price_format_prefix($this->shopCartGetTotalPrice(),0).'</span></strong></label>
                    </div>';

                   if($use_paypal_payment=='on')
                   {
                       $html .= ' 
                            <div class="checkout-items checkout-items-payment">
                                <p><input type="radio" id="mshopping-payment-cod" name="mshopping-payment" class="mshopping-payment" value="cod" /> <span>Send data with us</span></p>
                                <p><input type="radio" id="mshopping-payment-paypal" name="mshopping-payment" class="mshopping-payment" value="paypal" /> <img alt="" src="'.get_template_directory_uri().'/webseo24h-shop/images/paypal.png" /></p>
                            </div>
                               ';
                   }
                   else
                   {
                       $html .= ' 
                            <div class="checkout-items checkout-items-payment">
                                <p><input type="radio" checked="checked" id="mshopping-payment-cod" name="mshopping-payment" class="mshopping-payment" value="cod" /> <span>Send data with us</span></p>                                
                            </div>
                               ';
                   }

$html .= ' 
                    <div class="checkout-items by-it-now">
                        <div id="checkout-load-form-paypal">

                            <input class="go-to-checkout" type="button" id="mshopping-btn-complete" value="Complete"/>
                        </div>

                    </div>

                </div>

            </div>
                ';
        
        return $html;
    }

    public function shop_update_info_option($mydata)
    {
        // update session
        $this->shopCartSetShopInfomationElement($mydata);
        
        // update cod, ship, voucher ...
    }

    public function shop_shopping_cart_delete_item($productID)
    {
            if(isset($_SESSION[$this->sessionShop]['shoppingCart']))
            {
                if(key_exists($productID, $_SESSION[$this->sessionShop]['shoppingCart']))
                {
                    unset($_SESSION[$this->sessionShop]['shoppingCart'][$productID]);
                }
            }

            $totalItems = $this->shop_db_get_total_item_shopping_cart();
            if($totalItems<=0)
            {
                $this->shop_destroy();
                $totalItems = 0;
            }
            
            $this->shopCartSetTotalItems($totalItems);  // set total item again
    }
    
    
     public function shop_shopping_cart_update_item($productId,$productCount)
    {
        if(isset($_SESSION[$this->sessionShop]['shoppingCart']))
        {
            if(key_exists($productId, $_SESSION[$this->sessionShop]['shoppingCart']))
            {
                $_SESSION[$this->sessionShop]['shoppingCart'][$productId]['productCount'] = $productCount;
            }
        }   
         
        $totalItems = $this->shop_db_get_total_item_shopping_cart();    
        $this->shopCartSetTotalItems($totalItems);  // set total item again
    }
    
    
    public function shop_destroy()
    {
        //session_destroy();
        unset($_SESSION[$this->sessionShop]);
        //session_destroy();
    }

        // test shop
    public function test(){
        print_r($_SESSION[$this->sessionShop]);
    }
    
    
}
$ws24hShop = new ws24hShop();