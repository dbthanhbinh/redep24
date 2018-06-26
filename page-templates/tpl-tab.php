<div class="slider_B">

        <div class="tab_khung">
        <span class="t_span1">
            <span class="tab1" id_tab="1">Sản phẩm mới nhất</span>
            <span class="tab2" id_tab="2">Sản phẩm xem nhiều nhất</span>
            <span class="tab3" id_tab="3">Sản phẩm đang HOT</span>
        </span><!-- End .t_span1 -->
        <div class="clear"></div>
    </div><!-- End .tab_khung -->

    <div class="tab_nd">

    </div><!-- End .tab_nd -->

    <style type="text/css">
        .tab_khung{text-align:center;}
        .tab_khung span{display:inline-block; font-weight:bold;}
        .tab_khung .t_span1 span{float:left; padding:0 20px 17px 20px;}
        .sp_i_m_slider_B table td img{border: 1px solid #ddd;}
        li:hover .sp_i_m_slider_B table td img{border-color: #FDA700;}
        
    </style>

    <script type="text/javascript">
        $(document).ready(function(){	

            $(".tab_khung .t_span1 span").css("cursor","pointer");
            $(".tab2").attr("style","color:#e77911").css({"cursor":"pointer", "background":"url(<?php echo get_template_directory_uri();?>/images/layout/t_span1.png) no-repeat center bottom"});	
            //$(".tab_nd").load("tab_ajax2.html");


            var myholddata = ".tab_nd";
            var mydata = {"action":"ajax_act_load_tab_new_views_hot","tabid":2,"myholddata":myholddata};                        
            process_ajax_load_data_tab(mydata);


            $(".tab_khung .t_span1 span").click(function(){                                
                    var id_tab=$(this).attr("id_tab");

                    //$(".tab_nd").load("tab_ajax"+id_tab+".html");
                    var myholddata = ".tab_nd";
                    var mydata = {"action":"ajax_act_load_tab_new_views_hot","tabid":id_tab,"myholddata":myholddata};                        
                    process_ajax_load_data_tab(mydata);

                    $(".tab_khung .t_span1 span").attr("style","background:#fff").css("cursor","pointer");
                    $(".tab"+id_tab).attr("style","color:#e77911").css({"cursor":"pointer", "background":"url(<?php echo get_template_directory_uri();?>/images/layout/t_span1.png) no-repeat center bottom"});
            });			

        });
    </script>

</div><!-- End .slider_B -->