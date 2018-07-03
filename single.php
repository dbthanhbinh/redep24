<?php get_header();?>
<div class="container-fluid">
    <div class="row">
        <?php 
            the_post();
            webseo24h_tie_update_showpostview(get_the_ID());
        ?>
        <?php  // require_once 'page-templates/breadcrumbs.php'; ?>
        <div class="col-lg-9">
            <div class="clear-30"></div>
            <div class="row">
                <div class="col-lg-6">
                    <?php include TEMPLATEPATH . '/page-templates/tpl-single-cf.php'?>  
                    <?php 
                    if(has_post_thumbnail()):
                    ?>
                        <div class="screen-thumb">
                            <?php
                                include TEMPLATEPATH . '/modules/single_slider/elevatezoom-master/setting.php'
                            ?>
                        </div>
                    <?php 
                    endif;
                    ?>
                </div>                
                <div class="col-lg-6">
                    <div class="tt_pd">                                    
                        <h1 class="title_ttpd">
                            <?php the_title();?>
                        </h1>
                        
                        <div style="margin-top: 3px; margin-bottom: 0px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">
                            
                            <?php if($area):?>
                            <?php echo '<b> Bán : ' .  webseo24h_tie_area_get_name($area) . '</b>';?>
                            <?php endif;?>
                            
                            <?php if($showpostview):?>    
                                | <b><?php echo $showpostview;?></b>  Lượt xem.
                            <?php endif;?>                            
                                | Cập nhật : <b><?php the_date('d/m/Y');?></b>
                            
                        </div>
                        <div class="single-dt-bg">
                            <div>
                                <input type="hidden" id="single-hidden-unit-price" value="<?php echo $hidden_unit_price;?>"/>
                                <?php webseo24h_tie_format_price_discount_show_return_single($price, $discount, true);?>

                                <?php 
                                if( current_user_can( 'author' ) || current_user_can( 'administrator' ) )
                                {
                                    if($giasi){
                                        echo '<b style="color:#FDA700; margin-left:20px;">Giá sỉ : '.  webseo24h_tie_format_price_with_prefix($giasi).' </b>';
                                    }
                                } // only if author

                                ?>

                            </div>
                            <?php if($code):?>
                            <div style="padding:5px 0; margin-top: 5px;">
                                <span class="items-product-single">Mã sản phẩm</span>
                                <?php echo $code;?>
                            </div>
                            <?php endif;?>

                            <ul class="ct_ttpd">
                                <?php if($state):?>
                                <li>
                                    <div class="l_ctpd">
                                        Tình trạng
                                    </div>
                                    <div class="r_ctpd">
                                        <?php echo webseo24h_tie_get_stock_state($state);?>
                                    </div>
                                    <div class="clear"></div>
                                </li>  
                                <?php endif;?>

                                <?php if(!empty($colors)):?>
                                <li>
                                    <div class="l_ctpd">
                                        Mầu sắc
                                    </div>
                                    <div class="r_ctpd color-setting">
                                        <?php webseo24h_tie_color_show($colors);?>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                                <?php endif;?>

                                <?php if(!empty($sizes)):?>
                                <li>
                                    <div class="l_ctpd">
                                        Loại size
                                    </div>
                                    <div class="r_ctpd size-setting">
                                        <?php webseo24h_tie_size_show($sizes);?>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                                <?php endif;?>

                            </ul><!-- End .ct_ttpd -->

                            <div style="padding:5px 0;">
                                <span class="items-product-single">Số lượng</span>
                                <select id="single-select-num">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    </select>
                            </div>

                            <div style="padding-top:5px;">
                                <span class="items-product-single">Tổng tiền</span>
                                : <b class="price_ctpd" id="single-price-total"><?php echo webseo24h_tie_format_price_with_prefix($hidden_unit_price);?></b>
                            </div>
                        </div>
                        <div id="product-item-add-to-cart" class="product-item-add-to-cart" style="margin-top:10px;" >
                            <div id="shop-add-to-cart-'.$postid.'" class="shop-add-to-cart">
                            <?php 
                                $ws24hShop->shop_show_button_add_to_cart(get_the_ID());
                                webseo24h_tie_social_button(get_permalink(),$items='');
                            ?>
                            </div>
                        </div>
                        
                        <div class="tools_share_num">
                            <?php //webseo24h_tie_social_addthis();?>                                                                
                        </div><!-- End .tools_share_num -->   
                        
                        <script type="text/javascript">
                            $(document).ready(function(){                                
                                // change number of products
                                $('#single-select-num').change(function(){
                                    var single_hidden_unit_price =  $('#single-hidden-unit-price').val();
                                    var single_select_num = $(this).val();
                                    var single_new_price_num = formatNumber (single_select_num*single_hidden_unit_price);
                                    $('#single-price-total').html(single_new_price_num + ' VNĐ');
                                });       
                                // change select color
                                $( ".color-setting-hidden span" ).each(function() 
                                {
                                    $( ".color-setting-hidden span" ).click(function(){
                                        $( ".color-setting-hidden span" ).removeClass('open');                                            
                                        $( this ).addClass( "open" );
                                        $('#color-setting-hidden').val($(this).attr('rel'));
                                    });
                                    
                                });
                                
                                // change select size
                                $( ".size-setting-hidden span" ).each(function() 
                                {
                                    $( ".size-setting-hidden span" ).click(function(){
                                        $( ".size-setting-hidden span" ).removeClass('open');                                            
                                        $( this ).addClass( "open" );
                                        $('#size-setting-hidden').val($(this).attr('rel'));
                                    });
                                    
                                });                               
                                
                            });
                        </script>
                        
                        <?php 
                            // require_once 'includes/single-spnmc.php';
                        ?>
                    </div>
                </div>
            </div>

            <div class="clear-20"></div>                
            <!-- Detail -->
            <div class="frame_ndct">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab_khung_ctsp">
                            <div class="t_span1">
                                <span class="tab_ctsp1" id_tab="1">Thông tin chi tiết</span>
                                <span class="tab_ctsp2" id_tab="2">Đánh giá khách hàng</span>
                            </div><!-- End .t_span1 -->
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab_ctsp tab_ctsp_open" id="tab_ctsp1">
                            <?php 
                                the_content();
                            ?>                        
                            <div class="tools_share_num">
                                <?php //webseo24h_tie_social_addthis();?>                                                                
                                <?php webseo24h_tie_social_button(get_permalink(),$items='all');?>
                            </div><!-- End .tools_share_num -->
                            <div class="tools_share_num single-tags">
                                <label>Tags</label>
                                <?php the_tags('','','');?>
                            </div>
                            <div class="" style="float:left; width: 100%; height: 10px;"></div>
                            <a name="comment"></a>
                            <?php require_once 'comments/tpl-comment.php';?>
                        </div><!-- End .tab_ctsp -->
                        <div class="tab_ctsp tab_ctsp_hidden" id="tab_ctsp2">
                            <?php //require_once 'comments/tpl-comment.php';?>
                        </div>
                    </div>
                </div>
            </div>
            <?php // require_once 'includes/single-spkcgh.php'; ?>
        </div>
        <?php 
            get_sidebar();
        ?>        
    </div>
</div>
<?php get_footer();?>