<?php get_header();?>

    <?php 
    the_post();
    webseo24h_tie_update_showpostview(get_the_ID());
    ?>
    <!-- #wrapper -->
    <div id="wrapper">
        <div id="container">
            <!-- top slider -->
            <?php 
                // show breadcrumbs
                //require_once 'page-templates/breadcrumbs.php';
            ?>
            <!-- end top slider -->
            <div class="wrap_prod">
               
                <?php 
                    get_sidebar();
                ?>        
                
                <div class="right_tlsp" <?php webseo24h_left_right_sidebar_class($layout='main');?>>                   
                    <div class="prod_details2">
                
                <div class="breacrum_pd">
                    <?php webseo24h_tie_breadcrumbs();?>
                    <div class="clear"></div>
                </div><!-- End .breacrum_pd -->
                
                <div class="f_pd">                	
                    <div class="info_pd">
                    	
                        <div class="slider_img_pd">
                        	
                            <div class="top_sipd">
                                
                                <?php 
                                $photos = get_post_meta(get_the_ID(), $wpdb->prefix.'photos', FALSE); // list photos
                                ?>
                                <div id="slider2" class="flexslider">
                                    
                                    <ul class="bxslider">
                                        
                                        <?php 
                                        if($photos)
                                        {
                                            foreach ($photos as $key=>$value) 
                                            {
                                                $mthumb = webseo24h_tie_thumb_multiple($value, 'medium',FALSE);
                                                if($mthumb):
                                                ?>
                                                <li>
                                                    <div class="sl_ca">
                                                        <table>
                                                                <tr>
                                                                    <td>
                                                                    <?php echo $mthumb;?>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                </li>
                                                <?php
                                                endif;
                                            }
                                        }
                                        else {
                                        ?>
                                                <li>
                                                    <div class="sl_ca">
                                                        <table>
                                                                <tr>
                                                                    <td>
                                                                    <?php 
                                                                    if(has_post_thumbnail())
                                                                        the_post_thumbnail('medium');
                                                                    ?>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                </li>    
                                        <?php    
                                        }
                                        ?>
                                        
                                    </ul>

                                      <div id="bx-pager">
                                        <?php 
                                        if($photos)
                                        {
                                            $tamp = 0;
                                            foreach ($photos as $key=>$value) 
                                            {
                                                $mthumb = webseo24h_tie_thumb_multiple($value, 'thumbnail',FALSE);
                                                if($mthumb):
                                                ?>
                                                <div class="sl_ca">
                                                   <a data-slide-index="<?php echo $tamp;?>" href="">
                                                        <?php echo $mthumb;?>
                                                    </a> 
                                                </div>    
                                                <?php
                                                endif;
                                                
                                                $tamp++;
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                        <div class="sl_ca">
                                            <a data-slide-index="<?php echo '1';?>" href="">
                                                  <?php 
                                                    if(has_post_thumbnail())
                                                        the_post_thumbnail('thumbnail');
                                                    ?>
                                             </a> 
                                         </div>   
                                        <?php  
                                        }
                                        ?>                                         
                                      </div>
                                    
                                </div><!-- End #slider -->
                                                                
                                <div class="clear"></div>
                                
                                <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/flexslider.css"/>
                                <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.flexslider.js"></script>
                                <script type="text/javascript">
                                        $(window).load(function(){
                                                /*
                                                $('#carousel2').flexslider({
                                                        animation: "slide",
                                                        controlNav: false,
                                                        animationLoop: false,
                                                        slideshow: true,
                                                        itemWidth: 50,
                                                        itemMargin: 5,
                                                        pauseOnHover: true,
                                                        asNavFor: '#slider2'
                                                });		
                                                */
                                               
                                                 $('.bxslider').bxSlider({
                                                    pagerCustom: '#bx-pager'
                                                  });
                                                
                                                /*
                                                $('#slider2').flexslider({
                                                        animation: "fade",
                                                        controlNav: false,
                                                        animationLoop: true,
                                                        slideshow: true,
                                                        pauseOnHover: true,
                                                        slideshowSpeed:10000,
                                                        sync: "#carousel2"
                                                });
                                               */     
                                        });
                                </script>
                                
                            </div><!-- End .top_sipd -->
                            
                        </div><!-- End .slider_img_pd -->
                        
                        <div class="tt_pd">
                        	
                            <h1 class="title_ttpd">
                            	 <?php the_title();?>
                            </h1><!-- End .title_ttpd -->
                            <?php 
                            $comment_postid = get_the_ID();
                            $_postmetas = new postmetas(get_the_ID());  
                            
                            //print_r($_postmetas);                             
                            $price              = $_postmetas->postmetas_get($wpdb->prefix.'price');  
                            $giasi              = $_postmetas->postmetas_get($wpdb->prefix.'price_si');  
                            $discount           = $_postmetas->postmetas_get($wpdb->prefix.'discount');
                            $code               = $_postmetas->postmetas_get($wpdb->prefix.'code');
                            $showpostview       = $_postmetas->postmetas_get($wpdb->prefix.'showpostview');
                            $state              = $_postmetas->postmetas_get($wpdb->prefix.'state');
                            $area               = $_postmetas->postmetas_get($wpdb->prefix.'area');
                            $colors             = $_postmetas->postmetas_get_multiple($wpdb->prefix.'color');
                            $sizes              = $_postmetas->postmetas_get_multiple($wpdb->prefix.'size');
                            
                            $hidden_unit_price  = webseo24h_tie_format_price_discount_unitprice($price, $discount);
                            /*
                            $postmetas = get_post_custom(get_the_ID());
                             $thumb = wp_get_attachment_image_src($postmetas['_thumbnail_id'][0],$postmetas[$wpdb->prefix.'thumbnail'][0], 'thumbnail');
                             echo 'fasdfasf';
                             print_r($thumb);
                             * 
                             */
                            ?>
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
                                    : <?php echo $code;?>
                                </div>
                                <?php endif;?>

                                <ul class="ct_ttpd">
                                    <?php if($state):?>
                                    <li>
                                        <div class="l_ctpd">
                                            Tình trạng
                                        </div>
                                        <div class="r_ctpd">
                                            : <?php echo webseo24h_tie_get_stock_state($state);?>
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
                                    : <select id="single-select-num">
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
                                
                            	<!--<input class="btn_addcard" name="product-item-add-to-cart" id="product-item-add-to-cart" type="submit" value="&nbsp;"/>-->
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
                                require_once 'includes/single-spnmc.php';
                            ?>
                        </div><!-- End .tt_pd -->
                        
                        <div class="clear"></div>
                        
                    </div><!-- End .info_pd -->                    
                    
                    <div class="clear"></div>
                    
                </div><!-- End .f_pd -->
                
                <div class="frame_ndct">
                
                	<div class="tab_khung_ctsp">
                        <div class="t_span1">
                            <span class="tab_ctsp1" id_tab="1">Thông tin chi tiết</span>
                            <a href="#comment"><span class="tab_ctsp2" id_tab="2">Đánh giá khách hàng</span></a>
                        </div><!-- End .t_span1 -->
                        <div class="clear"></div>
                    </div><!-- End .tab_khung_ctsp -->
                    
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
                        
                        <div class="" style="float:left; width: 100%; height: 20px;"></div>
                        <a name="comment"></a>
                        <?php require_once 'comments/tpl-comment.php';?>
                    </div><!-- End .tab_ctsp -->
                    <div class="tab_ctsp tab_ctsp_hidden" id="tab_ctsp2">
                    	<?php //require_once 'comments/tpl-comment.php';?>
                    </div><!-- End .tab_ctsp -->
                
                        <script type="text/javascript">
                            $(document).ready(function(){
                                    $(".tab_khung_ctsp .t_span1 span").css("cursor","pointer");
                                    $(".tab_ctsp1").attr("style","color:#fff").css({"cursor":"pointer", "background":"#FDA700"});
                                    //$(".tab_ctsp").load("tab_ctsp1.html");

                                    $(".tab_khung_ctsp .t_span1 span").click(function(){
                                            var id_tab=$(this).attr("id_tab");
                                            if(id_tab==1)
                                            {
                                                $("#tab_ctsp2").addClass("tab_ctsp_hidden");
                                                $("#tab_ctsp2").removeClass("tab_ctsp_open");                                                
                                                
                                                $("#tab_ctsp1").removeClass("tab_ctsp_hidden");
                                                $("#tab_ctsp1").addClass("tab_ctsp_open");
                                            }
                                            /*
                                            else
                                            {
                                                $("#tab_ctsp1").addClass("tab_ctsp_hidden");
                                                $("#tab_ctsp1").removeClass("tab_ctsp_open");                                                
                                                
                                                $("#tab_ctsp2").removeClass("tab_ctsp_hidden");
                                                $("#tab_ctsp2").addClass("tab_ctsp_open");
                                            }
                                            */
                                            //$(".tab_ctsp").load("tab_ctsp"+id_tab+".html");                                            
                                            $(".tab_khung_ctsp .t_span1 span").attr("style","background:#eee").css("cursor","pointer");
                                            $(".tab_ctsp"+id_tab).attr("style","color:#fff").css({"cursor":"pointer", "background":"#FDA700"});
                                    });
                            });
                        </script>
                
                </div>
                
                <?php 
                    // san phẩm khác cùng gian hàng
                    require_once 'includes/single-spkcgh.php';
                ?>
            
            </div><!-- End .prod_details2 -->
                    
                                      
                </div><!-- End .right_tlsp -->
                
                <div class="clear"></div>
            
            </div><!-- End .wrap_prod -->
            
            <!-- Partner -->
            <?php get_template_part('page-templates/tpl', 'partner');?>
            <!-- End Partner -->
            
        </div>
    
    </div><!-- End #wrapper -->

<?php get_footer();?>