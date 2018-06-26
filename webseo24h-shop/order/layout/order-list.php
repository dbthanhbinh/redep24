<?php
global $ws24hShop,$paging;

if(isset($_GET['act']) && $_GET['act']=='del' && isset($_GET['delid']) && $_GET['delid'])
{
    $order->db_delete_order_by_orderid($_GET['delid']);
    wp_redirect(get_bloginfo("url").'/wp-admin/admin.php?page=orders');
}

if(isset($_POST['hoantatid']) && $_POST['hoantatid'])
{
    $orderdata = array(
        'orderStatus'       => 'Complete',
        'paymentStatus'     => 'Complete'
    );
    $uorderid = $_POST['hoantatid'];
    $order->order_update_order_status($orderdata,$uorderid);
    //print_r($_POST);
}

//$order_list = $order->order_get_all_orders();
//print_r($order->order_get_all_orders_limit(2,0));
$currentPage = 1;
if(isset($_GET['paged']) && $_GET['paged'])
{
    $currentPage = $_GET['paged'];            
}
$paging = new paging();

$totalPost = $order->order_count_all_orders();
$postsPerpage = 10;
$ofset = 0;
if($currentPage>1)
{
    $ofset = ($postsPerpage * ($currentPage-1));
}

$paging->paging_set_all($totalPost,$postsPerpage);    
$order_list = $order->order_get_all_orders_limit($postsPerpage,$ofset);
?>
<h1>Danh sách đơn hàng</h1>
<table id="insured_list" class="tablesorter"> 
  <thead>
        <tr>
            <th style="width: 70px;text-align:center;"><strong> Mã </strong></th>		    
            <th style="width: 120px;text-align:center;"><strong> Đơn hàng </strong></th>
            <th style="width: 120px;text-align:center;"><strong> Thanh toán </strong></th>
            <th style="width: 120px;text-align:center;"><strong> Phương thức </strong></th>
            <th style="width: 120px;text-align:center;"><strong> Vận chuyển </strong></th>
            <th style="text-align:center;"><strong> Khách hàng </strong></th>
             <th style="text-align:center; width: 90px;"><strong>Ngày</strong></th>
            <th style="width: 110px;text-align:center;"><strong> # </strong></th>
            <th style="width: 30px;text-align:center;">
                #
            </th>
    </tr>
  </thead>
  <tbody style="width:99%;">
          <?php	  	  
          if($order_list)
          {
                  foreach ($order_list as $value) 
                  {   
                      //print_r($value);
                      //echo '<br/>';
                        ?>
                        <tr valign="top" class="result">
                            <td style="text-align:center"><?php echo $value->orderId;?></td>			 
                            <td style="text-align:center">
                                <span style="float: left; width: 100%; line-height: 22px;"><b>
                                    (<?php echo $ws24hShop->shop_show_price_format_prefix($value->orderPrice, 0);?>)</b>
                                </span>
                                <strong <?php if($value->orderStatus=='Pendding') echo 'style="color:#ff0000"'; else if($value->orderStatus=='Processing') echo 'style="color:#ff0000; font-weight:normal;"';?>>
                                        <?php echo $value->orderStatus;?>
                                </strong>
                            </td>
                            <td style="text-align:center"><?php echo $value->paymentStatus;?></td>
                            <td style="text-align:center"><?php echo $value->paymentMethod;?></td>
                            <td style="text-align:center"><?php echo $value->shipPing;?></td>
                            <td style="text-align:left"><?php echo $value->customerName;?></td>
                                <td style="text-align:center;"><?php echo $value->orderDate;?></td>
                                <td style="text-align:center;">			
                                    <a class="button-secondary" href="<?php echo get_bloginfo('url');?>/wp-admin/admin.php?page=orders&action=View&id=<?php echo $value->orderId;?>">Detail</a>
                                        <?php if($value->orderStatus!='Complete'){?>
                                        <form action="" method="post">
                                            <input type="hidden" name="hoantatid" value="<?php echo $value->orderId;?>"/>
                                            <input  type="submit" value="Comlete" style="background: #F0F0F6; margin-top:5px; border: 1px solid #ddd; color:#D54E21; cursor: pointer;"/>
                                        </form>
                                        <?php }?>
                                </td>
                                 <td style="text-align:center">                                        
                                    <a title="Delete order" href="<?php bloginfo('url');?>/wp-admin/admin.php?page=orders&act=del&delid=<?php echo $value->orderId;?>">
                                        <img alt="" src="<?php bloginfo('template_url')?>/webseo24h-shop/order/images/cart-del.png"/></a>
                                 </td>
                        </tr>			
                        <?php 
                  }

          }
          else
          {
            ?>
            <tr>
                    <td colspan="9">
                        Chưa có đơn hàng!
                    </td>
            </tr>
            <?php 
          }

          ?>		  
  </tbody>
</table>
	
<div id="pager" class="pager">
    Trang: <?php  
    $paging->paging_show_paging($currentPage);    
    ?>           
</div>
