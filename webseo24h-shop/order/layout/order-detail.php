<?php 
global $member,$orderDetail,$order,$ws24hShop,$options,$wpdb;
if(isset($_GET['action']) && $_GET['action']=='View' && isset($_GET['id']) && intval($_GET['id'])>0)
{
    $orderid = $_GET['id'];
    if($orderid)
    {
        $orderdata = $order->order_get_order_by_id($orderid);        
        $orderReceived = json_decode($orderdata['orderbook']);
        $orderDetailData = $orderDetail->get_list_order_detail($orderid);       
    ?>

    <div id="mypageprint" style="position: relative;">

    <div id="mypageprintters" style="position: relative; font-size: 12px;">
        <script type="text/javascript">
            function printdiv(printpage)
            {

                    var headstr = "<html><head><title>Booking Details</title></head><body>";
                    var footstr = "</body>";
                    var newstr = document.getElementById('mypageprintters').innerHTML;
                    var oldstr = document.body.innerHTML;
                    document.body.innerHTML = headstr+newstr+footstr;
                    window.print();
                    document.body.innerHTML = oldstr;

                    return false;
            }
        </script>
        <style>	
            table#mytableid tr td{border: 1px solid #A8D59D!important; border-top: none!important; border-right: none!important;}
         </style>


        <table border="0" cellspacing="0" cellpadding="0" style="color:#545454; width:100%; line-height:22px; font-size:12px; font-family:Helvetica; margin:10px auto auto auto;">
          <tr>
                    <td>

                    <table bordercolor="#9fcc5d;" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; border: 1px solid #a8d59d;  width:100%;">
                      <tr>
                        <td style="padding:10px;">
                            <div align="center" style="color:#00aaf1; font-size:20px; padding:10px 0;">Chi tiết đơn hàng (<?php echo $orderid;?>)</div>

                        <div style="float:left; width:40%;">
                            <div style="text-decoration:underline; display:inline-block; width:100%; margin-top:0">                            
                                <strong style="float:left; font-size:18px;">Thông tin đơn hàng : </strong>
                            </div>

                            <div style="width:100%; border: 1px solid #a8d59d; float:left; width:100%">
                                <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Mã đơn hàng : </label><strong><?php echo $orderid;?></strong></div>
                                <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Ngày đặt hàng : </label><strong><?php echo $orderdata['orderDate'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Trang thái đơn hàng : </label><strong style="color:#ff0000;"><?php echo $orderdata['orderStatus'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Thạng thái thanh toán : </label><strong style="color:#ff0000;"><?php echo $orderdata['paymentStatus'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Phương thức thanh toán : </label><strong><?php echo $orderdata['paymentMethod'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Vận chuyển : </label><strong><?php echo $orderdata['shipPing'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Ghi chú thanh toán : </label><strong style="color:#ff0000;"><?= (isset($orderdata['orderStatusNote']) && $orderdata['orderStatusNote']) ? $orderdata['orderStatusNote'] : ''?></strong></div>
                                    <div style="margin:2px 0; float:left; width:100%">
                                        <label style="float:left; width:150px; padding:0 5px;">Ghi chú khách hàng : </label><strong><?php echo $orderdata['orderNote'];?></strong>
                                    </div>
                            </div>
                        </div>	
                        <div style="float:right; width:58%;">
                                <div style="text-decoration:underline; display:inline-block; height:30px; ">

                                </div>
                                <div style="width:100%; border: 1px solid #a8d59d; float:left; width:100%">
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><strong style="padding:0 5px;">Đặt hàng</strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Họ tên : </label><strong style="text-transform:capitalize"><?php echo $orderReceived->order_fullname;?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Email : </label><strong><?php  echo $orderReceived->order_email;?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Điện thoại : </label><strong><?php echo $orderReceived->order_phone;?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Địa chỉ : </label><strong>
                                            <?php 
                                            echo $orderReceived->order_address;
                                            if( isset($orderReceived->order_district) && $orderReceived->order_district)
                                                echo ' - ' . $orderReceived->order_district;
                                            if($orderReceived->order_cities)
                                                echo ' - ' . $orderReceived->order_cities;
                                            ?>
                                                
                                            </strong>
                                        </div>
                                        
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><strong style="padding:0 5px;">Thông tin nhận hàng</strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Họ tên: </label><strong><?php echo $orderReceived->received_fullname;?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Điện thoại : </label><strong><?php echo $orderReceived->received_phone;?></strong></div>	
                                         <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Email : </label><strong>
                                            <?php echo $orderReceived->received_email;?>
                                            </strong></div>
                                        <div style="margin:2px 0; float:left; width:100% "><label style="float:left; width:100px; padding:0 5px;">Địa chỉ : </label><strong>
                                            <?php 
                                            echo $orderReceived->received_address;
                                            if( isset($orderReceived->received_district) && $orderReceived->received_district)
                                                echo ' - ' . $orderReceived->received_district;
                                            if($orderReceived->received_cities)
                                                echo ' - ' . $orderReceived->received_cities;
                                            ?>
                                            </strong>
                                        </div>                                       
                                </div>	
                        </div>

                        <div style="text-decoration:underline; display:inline-block; height:30px; margin-top:20px; width:100%;">                        
                            <strong style="float:left; font-size:18px;">Chi tiết đơn hàng </strong>
                        </div>

                        <table width="100%" border="0" id="mytableid" cellspacing="0" cellpadding="0">
                          <tr>
                            <td style="border-top:1px solid #A8D59D!important;" width="5%"><div align="center"><strong>Số TT</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="42%"><div align="center"><strong>Sản phẩm</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="14%"><div align="center"><strong>Giá</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="5%"><div align="center"><strong>Số lượng</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="14%"><div align="center"><strong>Thành tiền</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important; border-right:1px solid #A8D59D!important"  width="20%"><div align="center"><strong>Ghi chú khách hàng</strong></div></td>
                          </tr>
                          <?php 
                          if($orderDetailData)
                          {
                              $temp = 1;
                              foreach ($orderDetailData as $key=>$value)
                              {
                                  ?>
                                  <tr>
                                      <td><div align="center"><?php echo $temp;?></div></td>
                                    <td>
                                        <div align="left" style="padding:0 3px;">
                                            <a target="_blank" href="<?php echo $value->productPerlink;?>">
                                                <?php echo $value->productName;?>
                                              </a>
                                        </div>
                                        </td>
                                    <td><div align="center"><?php echo $ws24hShop->shop_show_price_format_prefix($value->productPrice,0);?></div></td>
                                    <td><div align="center"><?php echo $value->productCount;?></div></td>
                                    <td><div align="center"><?php echo $ws24hShop->shop_show_price_format_prefix($value->productSubprice,0);?></div></td>
                                        <td style="border-right:1px solid #A8D59D!important" rowspan="">
                                            <div style="padding:5px;"><?php echo $orderdata['orderNote'];?></div>
                                        </td>
                                  </tr>
                                  <?php
                                  $temp++;
                              }
                          }
                          ?>  
                          
                        </table>

                        <div style="float:right; width:50%;">

                            <?php 
                            if($orderdata['shippingValue']>=0):
                            ?>   
                            <p style="">
                                <label style="float:left; width:60%; font-size:12px;">Phí vận chuyển</label>
                                <label style="float:right; font-size:18px; color:#ff0000; width:38%; text-align:right;"><?php echo $ws24hShop->shop_show_price_format_prefix($orderdata['shippingValue'],0);?></label>
                            </p> 
                            <?php    
                            endif;
                            ?>
                            <?php 
                            if($orderdata['codValue']>=0):
                            ?>   
                            <p style="">
                                <label style="float:left; width:60%; font-size:12px;">Phí thu hộ (COD)</label>
                                <label style="float:right; font-size:18px; color:#ff0000; width:38%; text-align:right;"><?php echo $ws24hShop->shop_show_price_format_prefix($orderdata['codValue'],0);?></label>
                            </p> 
                            <?php    
                            endif;
                            ?>
                            <p style="display:inline-block; width:100%; margin:5px 0; border-top:1px solid #ddd; padding-top:10px;">
                                <label style="float:left; width:60%; font-size:18px; text-transform:uppercase;">Tổng thanh toán</label>
                                <label style="float:right; font-size:18px; color:#ff0000; width:38%; text-align:right;"><?php echo $ws24hShop->shop_show_price_format_prefix($orderdata['orderPrice'],0);?></label>
                            </p> 

                        </div>

                        <div style="float:left; width:100%; margin-top:0px;"> 	 
                            <p>Mọi chi tiết yêu cầu, liên hệ với chúng tôi: <a href="'.get_bloginfo('url').'" style="color:#da46fa"><?php bloginfo("url");?></a> Call : <b style="color:#ff0000;">
                                <?php tie_show_option('company_hotline'); ?></b>
                            </p>                           
                        </div>	
                        </td>
                      </tr>
                    </table>


                    </td>
                  </tr>
                </table>	

            </div>

            <div class="myreports" style="width: 300px; top: 70px; right: -10px;">                    
                    <a style="margin-right: 5px;" href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=orders&action=Edit&id='.$orderid;?>" title="Edit order">Edit order &nbsp;(<?php echo $orderid;?>) </a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <?php //}?>
                    <a style="margin-right: 5px;" href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=orders';?>" title="Go to Orders"><strong>Go to Orders >></strong></a>	
            </div>

    </div>
    <?php 
    }
    else
    {
            wp_redirect(get_bloginfo('url').'/wp-admin/admin.php?page=orders');
    }
}//--------
?>