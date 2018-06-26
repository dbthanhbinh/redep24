<?php 
global $member,$orderDetail,$order,$ws24hShop,$options;

$orderid = $_GET['id'];

if($_POST['act_update_order_info'] && wp_verify_nonce($_POST['act_update_order_info'],'act_update_order_info'))
{
    
    $orderdata = $order->order_get_order_by_id($orderid);   
    $orderReceived = json_decode($orderdata['orderReceived']);

    $orderReceived->_mfirstname = $_POST['delivery_firstname'];
    $orderReceived->_mlastname  = $_POST['delivery_lastname'];
    $orderReceived->_mphone     = $_POST['delivery_phone'];            
    $orderReceived->_maddress1  = $_POST['delivery_address1'];
    $orderReceived->_maddress2  = $_POST['delivery_address2'];

    
    
    // update order detail number and price
    if(isset($_POST['number']) && $_POST['number'])
    {
        $_totalsub = 0;
        foreach ($_POST['number'] as $key=>$val)
        {
           
           $detailId = $key; // product id

           $_orderid  = $_POST['orderid'];  // order id
           $_detailIdPrice = $_POST['price'][$detailId];
           $_detailIdNumber = $_POST['number'][$detailId];

           $_detailIdSubprice = $_detailIdNumber*$_detailIdPrice;
           $_totalsub += $_detailIdSubprice;
           
           $_orderDetaildata = array(
               'productPrice'       => $_detailIdPrice,
               'productCount'       => $_detailIdNumber,
               'productSubprice'    => $_detailIdSubprice

           );
           
           $orderDetail->orderdetail_update_item($_orderDetaildata,$_orderid,$detailId);
        }
    }
    
    $orderdata = array(
        'orderStatus'       => $_POST['order_status'],
        'paymentStatus'     => $_POST['payment_status'],
        'orderNote'         => $_POST['order_note'],
        'orderPrice'        => $_totalsub,
        'orderReceived'     => json_encode($orderReceived)
    );
    
    $order->order_update_order_status($orderdata,$orderid);  // update order statust
   
   
}

if(isset($_GET['action']) && $_GET['action']=='Edit' && isset($_GET['id']) && intval($_GET['id'])>0)
{    
    if($orderid)
    {    
        // +++++++++++++++++++++++++++++++++++++++++++++++++++
        $orderdata = $order->order_get_order_by_id($orderid);    
        $userdata = get_user_meta($orderdata['customerId'], $member->userMetaExtra, true);

        $orderDetailData = $orderDetail->get_list_order_detail($orderdata['ID']);
        $orderReceived = json_decode($orderdata['orderReceived']);
        //print_r(json_decode($orderdata['orderReceived']));
    ?>

    <div id="mypageprint" style="position: relative;">
     <form action="" method="POST">    
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
                            <div align="center" style="color:#00aaf1; font-size:20px; padding:10px 0;">Order Edit (<?php echo $orderid;?>)</div>

                        <div style="float:left; width:40%;">
                            <div style="text-decoration:underline; display:inline-block; width:100%; margin-top:0">                            
                                <strong style="float:left; font-size:18px;">Order Infomation : </strong>
                            </div>

                            <div style="width:100%; border: 1px solid #a8d59d; float:left; width:100%">
                                <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Order Code : </label><strong><?php echo $orderid;?></strong></div>
                                <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Order date : </label><strong><?php echo $orderdata['orderDate'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Order status : </label>
                                        <strong style="color:#ff0000;">                                            
                                            <select name="order_status">
						<option value="0">All</option>
                                                <?php echo $ws24hShop->db_show_html_trangthaidonhang($orderdata['orderStatus']);?>
                                            </select>    
                                        </strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Payment status : </label>
                                        <strong style="color:#ff0000;">                                            
                                            <select name="payment_status">
						<option value="0">All</option>
                                                <?php echo $ws24hShop->db_show_html_trangthaidonhang($orderdata['paymentStatus']);?>
                                            </select> 
                                        </strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Payment method : </label><strong><?php echo $orderdata['paymentMethod'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Delivery : </label><strong><?php echo $orderdata['shipPing'];?></strong></div>
                                    <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:150px; padding:0 5px;">Note payment : </label><strong style="color:#ff0000;"><?php echo $orderdata['orderStatusNote'];?></strong></div>
                                    <div style="margin:2px 0; float:left; width:100%">
                                        <label style="float:left; width:150px; padding:0 5px;">Note : </label>
                                        <strong>                                            
                                            <textarea name="order_note"><?php echo $orderdata['orderNote'];?></textarea>
                                        </strong>
                                    </div>
                            </div>
                        </div>	
                        <div style="float:right; width:58%;">
                                <div style="text-decoration:underline; display:inline-block; height:30px; ">

                                </div>
                                <div style="width:100%; border: 1px solid #a8d59d; float:left; width:100%">
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><strong style="padding:0 5px;">Order info</strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Full name : </label><strong style="text-transform:capitalize"><?php echo $userdata['_mfirstname'] . ' ' . $userdata['_mlastname'];?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Email : </label><strong><?php echo $userdata['_memail'];?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Phone : </label><strong><?php echo $userdata['_mphone'];?></strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Address : </label><strong>
                                                        <?php echo $userdata['_maddress1'];?>

                                                        </strong>
                                        </div>
                                        <?php
                                        if($userdata['_maddress2'])
                                        {
                                        ?>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Address 2 : </label><strong>
                                                        <?php echo $userdata['_maddress2'];?>

                                                        </strong>
                                        </div>
                                        <?php 
                                        }
                                        ?>

                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><strong style="padding:0 5px;">Delivery Info</strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Full name: </label><strong>                                            
                                                <input style="width:170px" type="text" name="delivery_firstname" value="<?php echo $orderReceived->_mfirstname;?>" /> 
                                                <input style="width:170px" type="text" name="delivery_lastname" value="<?php echo $orderReceived->_mlastname;?>" />
                                            </strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Phone : </label><strong>
                                            
                                                <input type="text" name="delivery_phone" value="<?php echo $orderReceived->_mphone;?>" />
                                            </strong></div>
                                        <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Email : </label><strong>
                                            <?php echo $orderReceived->_memail;?>
                                            </strong></div>
                                        <div style="margin:2px 0; float:left; width:100% "><label style="float:left; width:100px; padding:0 5px;">Address : </label><strong>
                                                        
                                                        <input type="text" name="delivery_address1" value="<?php echo $orderReceived->_maddress1;?>" />
                                                        </strong>
                                        </div>
                                        <?php
                                        if($orderReceived->_maddress2)
                                        {
                                        ?>
                                            <div style="margin:2px 0; border-bottom: 1px solid #a8d59d; float:left; width:100%"><label style="float:left; width:100px; padding:0 5px;">Address 2 : </label><strong>
                                                    <input type="text" name="delivery_address2" value="<?php echo $orderReceived->_maddress2;?>" />

                                                </strong>
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                </div>	
                        </div>

                        <div style="text-decoration:underline; display:inline-block; height:30px; margin-top:20px; width:100%;">                        
                            <strong style="float:left; font-size:18px;">Detail infomation </strong>
                        </div>

                        <table width="100%" border="0" id="mytableid" cellspacing="0" cellpadding="0">
                          <tr>
                            <td style="border-top:1px solid #A8D59D!important;" width="5%"><div align="center"><strong>No</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="42%"><div align="center"><strong>Product</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="14%"><div align="center"><strong>Price</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="5%"><div align="center"><strong>Amount</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important;" width="14%"><div align="center"><strong>Sub pay</strong></div></td>
                            <td style="border-top:1px solid #A8D59D!important; border-right:1px solid #A8D59D!important"  width="20%"><div align="center"><strong>Note</strong></div></td>
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
                                    <td><div align="center">
                                        <?php echo $ws24hShop->shop_show_price_format_prefix($value->productPrice,0);?>
                                            <input type="hidden" name="orderid" value="<?php echo $value->orderId;?>" />    
                                            <input type="hidden" name="price[<?php echo $value->productId;?>]" value="<?php echo $value->productPrice;?>" />    
                                        </div></td>
                                    <td><div align="center">
                                            <input style="width:50px;" type="text" name="number[<?php echo $value->productId;?>]" value="<?php echo $value->productCount;?>"/>
                                        </div></td>
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
                                                      		
                            <p style="display:inline-block; width:100%; margin:5px 0; border-top:1px solid #ddd; padding-top:10px;">
                                <label style="float:left; width:60%; font-size:18px; text-transform:uppercase;">Total Pay</label>
                                <label style="float:right; font-size:18px; color:#ff0000; width:38%; text-align:right;"><?php echo $ws24hShop->shop_show_price_format_prefix($orderdata['orderPrice'],0);?></label>
                          </p> 

                        </div>

                        <div style="float:left; width:100%; margin-top:0px;"> 	 
                            <p>Please contact with us <a href="'.get_bloginfo('url').'" style="color:#da46fa"><?php bloginfo("url");?></a> Call : <b style="color:#ff0000;"><?php $options->show("contact-hotline")?></b></p>
                           
                            <p><img style="height:50px; float:right" alt=""  src="<?php echo get_bloginfo('template_url')?>/public/default/images/logo.png"/></p>				
                        </div>	
                        </td>
                      </tr>
                    </table>


                    </td>
                  </tr>
                </table>	

                <?php wp_nonce_field('act_update_order_info', 'act_update_order_info');?>
            </div>

            <div class="myreports" style="width: 250px; top: 70px; right: -10px;">  
                
                <input type="submit" value="Update Order" style="margin-right:10px;"/>
                
                <a style="margin-right: 5px;" href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=orders';?>" title="Go to Orders"><strong>Go to Orders >></strong></a>	
            </div>
            </form> 

    </div>
    <?php 
    }
    else
    {
            wp_redirect(get_bloginfo('url').'/wp-admin/admin.php?page=orders');
    }
}//--------
?>