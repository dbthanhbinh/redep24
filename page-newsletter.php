<?php get_header();?>
<body>

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
                        <?php 
                        if(have_posts()):the_post();
                            ?>
                            <h1 class="t_r_tlsp">
                                <span><?php the_title();?></span>
                            </h1><!-- End .t_r_tlsp -->

                            <div class="m_r_tlsp">

                                <div class="content-details">

                                    <!-- Page content -->
                                    <h2>Bạn đã hủy đăng ký nhận tin thành công.</h2>
                                    <p>Cảm ơn bạn đã quan tâm trong thời gian qua.</p>
                                    <p>Hãy thường xuyên truy cập website để nhận được nhiều thông tin hấp dẫn.</p>
                                    <?php 
                                    if(isset($_GET['act']) && $_GET['act']=='cancel' && isset($_GET['active_code']) && $_GET['active_code']!='' && isset($_GET['sento']))
                                    {
                                        $act = $_GET['act'];
                                        $active_code = $_GET['active_code'];
                                        $sento = $_GET['sento'];                                        
                                        $newsletter->newsletter_cancel_register($sento,$active_code);
                                    }
                                    ?>

                                    <!-- end Page content -->

                                </div><!-- End .full_width -->

                            </div><!-- End .m_r_tlsp -->

                        <?php 
                        endif;
                        ?>
                    </div>        
                </div><!-- End .right_tlsp -->
                
                <div class="clear"></div>
            
            </div><!-- End .wrap_prod -->
            
            <!-- Partner -->
            <?php get_template_part('page-templates/tpl', 'partner');?>
            <!-- End Partner -->
            
        </div>
    
    </div><!-- End #wrapper -->

</body>
<?php get_footer();?>