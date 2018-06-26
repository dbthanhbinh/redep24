<div id="cencol" class="cencol">
                
        <div class="m_cencol">

        <div class="slider_A">
            <ul class="ul_slider_A">
                <li>
                        <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img6.png" alt=""/>
                    </a>
                </li>
                <li>
                        <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img7.png" alt=""/>
                    </a>
                </li>
                <li>
                        <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img8.png" alt=""/>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>                            
            <script type="text/javascript">
                $(document).ready(function(){
                        $('.ul_slider_A').bxSlider({
                                auto:true,
                                pager: false,
                                slideWidth: 660,
                                minSlides: 1,
                                maxSlides: 1
                        });
                });
            </script>
        </div><!-- End .slider_A -->

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
            </style>

            <script type="text/javascript">
                $(document).ready(function(){	

                        $(".tab_khung .t_span1 span").css("cursor","pointer");
                        $(".tab2").attr("style","color:#e77911").css({"cursor":"pointer", "background":"url(<?php echo get_template_directory_uri();?>/images/layout/t_span1.png) no-repeat center bottom"});	
                        $(".tab_nd").load("tab_ajax2.html");

                        $(".tab_khung .t_span1 span").click(function(){
                                var id_tab=$(this).attr("id_tab");
                                $(".tab_nd").load("tab_ajax"+id_tab+".html");
                                $(".tab_khung .t_span1 span").attr("style","background:#fff").css("cursor","pointer");
                                $(".tab"+id_tab).attr("style","color:#e77911").css({"cursor":"pointer", "background":"url(<?php echo get_template_directory_uri();?>/images/layout/t_span1.png) no-repeat center bottom"});
                        });			

                });
            </script>

        </div><!-- End .slider_B -->

    </div><!-- End .m_cencol -->

</div><!-- End .cencol -->