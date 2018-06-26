<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TempEmail
{
    public $adminEmail;
    public $customerEmail;
    public $fanpageurl;
    public $subjectOrderAdmin;
    public $subjectOrderCustom;
    public $domainName;


    // construct shop
    public function __construct()
    {
        $this->fanpageurl = 'https://www.facebook.com/lavadep24h';
        $this->domainName = 'www.redep24.com';
        $this->subjectOrderAdmin = 'Redep24.com - Đặt hàng thành công';
        $this->subjectOrderCustom = 'Redep24.com - Đặt hàng thành công';
        $this->adminEmail = tie_get_option('company_email');
        
    }
    
    public function email_template_register($params)
    {
        $html ='
        <table width="700" border="0" cellspacing="0" cellpadding="0" style="color:#545454; line-height:22px; font-size:14px; font-family:Helvetica; margin:auto auto 30px;">
            <tr>
              <td><div align="center" style="color:#00aaf1; padding:10px 0; font-size:20px;">HOÀN TẤT ĐĂNG KÝ THÀNH VIÊN</div></td>
            </tr>

            <tr>
              <td>

            <table width="700" bordercolor="#9fcc5d;" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding:10px;">
                <p>Chào bạn : <b>'.$params["fullname"].'!</b></p>
                <p>Tài khoản của bạn đã được đăng ký trên website <a href="'.get_bloginfo('url').'" style="color:#da46fa">'.get_bloginfo('url').'</a></p>
                <p style="text-decoration:underline;">Thông tin đăng nhập:</p>

                        <ul>
                            <li><b>Email đăng nhập:</b> '.$params["useremail"].'</li>                            
                            <li><b>Mật khẩu:</b> '.$params["userpassword"].'</li>
                            <li><b>*****</b></li>    
                            <li> Hãy truy cập website <a href="'.get_bloginfo('url').'">'.get_bloginfo('url').'</a> => Đăng nhập tài khoản trên=> mua hàng online,để nhận nhiều ưu đãi hấp dẫn.</li>                
                        </ul>
                </p>
                ';


        $html.='
                 <p>Mọi thắc mắc nào, vui lòng liên hệ với <a href="'.get_bloginfo('url').'" style="color:#da46fa">'.get_bloginfo('url').'</a> theo hotline : <b style="color:#ff0000;">'.tie_get_option('company_hotline').'</b></p>
                 <p style="text-decoration:none">Chúc  bạn có những trải nghiệm thú vị khi mua sắm trên <a style="color:#da46fa" href="'.get_bloginfo('url').'">'.get_bloginfo('url').'</a></p>
                 <p>*****</p>
                 <p style="text-decoration:none">Thông tin khuyễn mãi FaceBook <a style="color:#da46fa" href="'.$this->fanpageurl.'">'.$this->fanpageurl.'</a></p> 

                 </td>
               </tr>
             </table>
            </td>
          </tr>
        </table>
        ';
        
        return $html;
    }
    
    // email template order
    public function email_template_send_order_header($shopPayment)
    {
        $html ='
                <table width="700" border="0" cellspacing="0" cellpadding="0" style="color:#545454; line-height:22px; font-size:14px; font-family:Helvetica; margin:auto auto 30px;">
                <tr>
                <td>

                <table width="700" bordercolor="#9fcc5d;" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; border: 1px solid #a8d59d;">
                  <tr>
                    <td style="padding:10px;">
                    <div align="center" style="color:#00aaf1; font-size:20px; padding:10px 0;">THÔNG BÁO ĐƠN HÀNG</div>			            
                    <p>Thời gian đặt hàng: <strong> '.date('d/m/Y H:i:s').' </strong></p>
                    <p>Phương thức thanh toán: <strong> '.$shopPayment.' </strong></p>    

                    <p style="text-decoration:underline; display:inline-block;">
                        <strong style="float:left; font-size:18px;">Chi tiết đơn hàng </strong></p>
                    <p>';
                        
        return $html;                
    }
    public function email_template_send_order_mid()
    {
        global $ws24hShop;
        $html .= ' 
            <table width="700" border="0" cellspacing="0" cellpadding="0" style=" border: 1px solid #a8d59d;"">
                <tr>
                  <th width="36" scope="col" style="border-right:1px solid #a8d59d;">STT</th>
                  <th width="239" scope="col">Sản phẩm</th>
                  <th width="113" scope="col" style="border-left:1px solid #a8d59d;">Giá</th>
                  <th width="30" scope="col" style="border-left:1px solid #a8d59d;">SL</th>
                  <th width="117" scope="col">Thành tiền</th>
                  <th width="165" scope="col" style="border-bottom:1px solid #a8d59d; border-left:1px solid #a8d59d;">Ghi chú</th>
                </tr>
        <tr>
          <td colspan="5">
          <table width="541" border="0" cellspacing="1" cellpadding="1" style="border: 1px solid #a8d59d; border-left:none; border-bottom:none;">
            <tr>
                <td colspan="5">';

                  $temp=1;
                  $mtotal = 0;
                  
                  foreach ($_SESSION[$ws24hShop->sessionShop]['shoppingCart'] as $key => $value) 
                  {
                      $unitprices = $ws24hShop->shop_show_price_format($ws24hShop->shopCartGetItemProductPrice($key), $ws24hShop->shop_get_item_productDiscount($key), 1);
                      $subPrice = $unitprices*$ws24hShop->shop_get_item_productCount($key);
                      $mtotal += $subPrice;
                          if($temp%2==1)
                                  $mclass = 'background:#e5e6e5;';
                          else
                                  $mclass = '';

                          $html .= '

                                    <div style="float:left; width:100%; '.$mclass.'">
                                        <div style="float:left; width:34px;">'.$temp.'</div>
                                            <div style="float:left; width:243px;">
                                            <a href="'.$ws24hShop->shopCartGetItemProductUrl($key).'"> '.$ws24hShop->shopCartGetItemProductTitle($key).' </a>';
                          $html .= '
                                            </div>
                                            <div style="float:left; width:115px; text-align:center;">'.$ws24hShop->shop_show_price_format_prefix($unitprices,0).'</div>
                                            <div style="float:left; width:29px; text-align:center;">'.$ws24hShop->shop_get_item_productCount($key).'</div>
                                            <div style="float:left; width:114px; text-align:center;">'.$ws24hShop->shop_show_price_format_prefix($subPrice,0).'</div>
                                           </div>';
                          $temp++;
                          
                          $ws24hShop->shopCartSetTotalPrice($mtotal);
                  }

        $html .= '
            </td>
        </tr>
          </table>
          </td>
          <td>'.$ws24hShop->shopCartGetNote().'</td>
        </tr>
        </table>
                <div style="float:right; width:50%;">
                    <p style="display:inline-block; width:100%; margin:5px 0 2px 0; line-height:18px;">
                    <label style="float:left; width:60%;"><strong>Thành tiền</strong></label>
                    <label style="float:right; width:38%; text-align:right;">'.$ws24hShop->shop_show_price_format_prefix($ws24hShop->shopCartGetTotalPrice(),0).'</label>
                </p>';
                  if($ws24hShop->shopCartGetVoucherPrice()>0):
                  $html .= ' 
                      <p style="display:inline-block; width:100%; margin:2px 0; line-height:18px;">
                          <label style="float:left; width:60%;"><strong>Voucher</strong></label>
                          <label style="float:right; width:38%; text-align:right;"> -'.$ws24hShop->shop_show_price_format_prefix($ws24hShop->shopCartGetVoucherPrice(),0).'</label>
                    </p>';
                  endif;

                  if($ws24hShop->shopCartGetShipping()>0):
        $html .= '
                      <p style="display:inline-block; width:100%; margin:2px 0; line-height:18px;">
                          <label style="float:left; width:60%;"><strong>Phí vận chuyển</strong></label>
                          <label style="float:right; width:38%; text-align:right;"> +'.$ws24hShop->shop_show_price_format_prefix($ws24hShop->shopCartGetShipping(),0).'</label>
                    </p>';
                  endif;

                    if($ws24hShop->shopCartGetCodFree()>0): 
        $html .= ' 
                      <p style="display:inline-block; width:100%; margin:2px 0; line-height:18px;">
                          <label style="float:left; width:60%;"><strong>Phí (COD)</strong></label>
                          <label style="float:right; width:38%; text-align:right;"> +'.$ws24hShop->shop_show_price_format_prefix($ws24hShop->shopCartGetCodFree(),0).'</label>
                    </p>';
                      endif;

        $html .= ' 
                      <p style="display:inline-block; width:100%; margin:5px 0; border-top:1px solid #ddd; padding-top:10px;">
                          <label style="float:left; width:60%; font-size:18px; text-transform:uppercase;">Tổng thanh toán</label>
                          <label style="float:right; font-size:18px; color:#ff0000; width:38%; text-align:right;">'.$ws24hShop->shop_show_price_format_prefix($ws24hShop->shopCartGetTotalPrice(),0).'</label>
                    </p>

                  </div>

                    <p style="text-decoration:underline; display:inline-block; width:100%;">
                    <strong style="float:left; font-size:18px;">Thông tin giao hàng : </strong></p>
              <p>
              <div style="background:#a8d59d; padding:2%; margin-left:-10px; width:96%;">
                  <p>Họ tên : <strong> '.$ws24hShop->shopCartGetShopInfomationElementItem('received_fullname').' </strong></p>
                  <p>Số điện thoại : <strong> '.$ws24hShop->shopCartGetShopInfomationElementItem('received_phone').' </strong></p>
                  <p>Địa chỉ : <strong> '.$ws24hShop->shopCartGetShopInfomationElementItem('received_address').' </strong></p>
              </div>';
                                        
        return $html;                               
    }
    public function email_template_send_order_footer()
    {
        $html = '';           
            $html .= '<p style="margin:3px 0;"><br/> - Quý khách có thể chuyển khoản cho chúng tôi thông tin ngân hàng sau: </p>';
            $html .= '<p style="margin:3px 0;"> <strong style="font-weight:bold;">Vietcombank :</strong>  </p>';
            $html .= '<p style="margin:3px 0;"> <strong style="font-weight:bold;">ACB :</strong> </p> <br/>';
   
            $html .='<p style="margin:3px 0;">Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với <a href="'.get_bloginfo('url').'" style="color:#da46fa">'.$this->domainName.'</a> theo số hotline : <b style="color:#ff0000;"> '.  tie_get_option("company_hotline").' </b></p>
                    <p style="text-decoration:underline; margin:3px 0;">Chúc  bạn có những trải nghiệm thú vị khi mua sắm trên <a style="color:#da46fa" href="'.get_bloginfo('url').'">'.$this->domainName.'</a></p>
                ';

            $html .= '<p style="margin:3px 0;"> <strong style="font-weight:bold;">***</strong></p>';
            $html .= '<p style="text-decoration:underline; margin:3px 0;">Thông tin khuyến mãi Facebook: <a style="color:#da46fa" href="'.$this->fanpageurl.'">'.$this->fanpageurl.'</a></p>';
            $html .= '<p style="margin:3px 0;"> <strong style="font-weight:bold;">***</strong></p>';
            $html .='<p style="margin:3px 0;">! Ngoại trừ hư hỏng hoặc khác sản phẩm yêu cầu, những trường hợp còn lại Quý khách không được đổi-trả hàng. Vui lòng xem kỹ Thông tin sản phẩm hoặc hỏi rõ nhân viên chúng tôi trước khi đặt hàng. Xin quý khách vui lòng thông cảm.</p>			            
                    <p>&nbsp;</p>
                </td>
              </tr>
            </table>


            </td>
          </tr>
        </table>
        ';
                    
        return $html;            
    }
    
    public function email_template_newsletter($sento,$active_code)
    {
        $subject = 'Đăng ký nhận bản tin.';
        $bodyemail = ' 
                <h2>Cảm ơn bạn đã đăng ký nhận bản tin tại <a href="'.$this->domainName.'">'.$this->domainName.'</a> </h2>
                <p>Bạn sẽ luôn nhận được nhiều những chương trình khuyễn mãi hấp dẫn từ chúng tôi.</p>    
                <p> Chúc bạn có những trãi nghiệm thú vị tại <a href="'.$this->domainName.'">'.$this->domainName.'</a> </p>
                <p>Để hủy đăng ký này vui lòng truy cập link sau: <a href="'.$this->domainName.'/newsletter?act=cancel&sento='.$sento.'&active_code='.$active_code.'">Tôi hủy đăng ký </a> </p>    
                ';
        $this->email_template_send($sento,$subject,$bodyemail);
    }

    public function email_send_order($sendemail='all')
    {
        global $ws24hShop;
        // body email
        
        $bodyemail_header = $this->email_template_send_order_header($ws24hShop->shopCartGetShopInfomationElementItem('shopPayment'));        
        $bodyemail_mid = $this->email_template_send_order_mid();   
        $bodyemail_footer = $this->email_template_send_order_footer();
        $bodyemail = $bodyemail_header . $bodyemail_mid . $bodyemail_footer;
        
        $subjectAdmin = $this->subjectOrderAdmin;
        $subjectCustomer = $this->subjectOrderCustom;
        
        if($sendemail=='all')
        {
            $emailCustomer = $ws24hShop->shopCartGetShopInfomationElementItem('order_email'); // nguoi dat hang
            $emailCustomer1 = $ws24hShop->shopCartGetShopInfomationElementItem('received_email');
            
            if($emailCustomer==$emailCustomer1)
                $this->email_template_send($emailCustomer,$subjectCustomer,$bodyemail); // customer1, customer2    
            else 
            {
                $this->email_template_send($emailCustomer,$subjectCustomer,$bodyemail); // customer1, customer2    
                $this->email_template_send($emailCustomer1,$subjectCustomer,$bodyemail); // customer1, customer2    
            }
            
        }
        else if($sendemail=='admin')
        {
            // send email  
            ///$bodyemail = $bodyemail_header . $bodyemail_mid . $bodyemail_footer;            
        }
        else if($sendemail=='customer')
        {  
            ///$bodyemail = $bodyemail_header . $bodyemail_mid . $bodyemail_footer;            
        }
        
        // send email            
        $this->email_template_send($this->adminEmail,$subjectAdmin,$bodyemail); // admin
        
        //return $bodyemail;
    }

    public function email_template_send($sento,$subject,$bodyemail)
    {
	$headers = "From: " . get_option('mail_from_name') . "\r\n";
	$headers .= "Reply-To: ". get_option('mail_from') . "\r\n";
	
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	$message .= '<html><body>';	
        
	$message .= $bodyemail;	//////
	
        $message .= '</body></html>';	
	   /////wp_mail($sento, $subject, $message,$headers);
       
       mail($sento, $subject, $message,$headers);
       	        
    }

    public function __destruct() 
    {
        
    }
    
    public function test()
    {
        return 'test email';
    }
}

$tempemail = new TempEmail();

//echo 'fasd' . $tempemail->test();
//$tempemail->email_template_newsletter($sessionID);

