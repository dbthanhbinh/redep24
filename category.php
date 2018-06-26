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
                        <h1 class="t_r_tlsp">
                            <span><?php single_cat_title('',true);?></span>
                        </h1><!-- End .t_r_tlsp -->

                        <div class="m_r_tlsp">

                            <div class="full_width">

                                    <ul>
                                        <?php 
                                            get_template_part('page-templates/loop', 'cat');
                                        ?>
                                    </ul>

                                </div><!-- End .full_width -->

                            <?php if ($wp_query->max_num_pages > 1) webseo24h_tie_pagenavi(); ?>

                        </div><!-- End .m_r_tlsp -->
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