<?php get_header();?>
<body>

    <!-- #wrapper -->
    <div id="wrapper">
        <div id="container">
            <!-- top slider -->
            <?php 
            $author_meta = get_user_meta(get_the_author_meta('ID'));            
            ?>
            <!-- end top slider -->
            <div class="wrap_prod">
            
                <?php 
                    get_sidebar();
                ?>
                
                <div class="right_tlsp" <?php webseo24h_left_right_sidebar_class($layout='main');?>>                   
                    <div class="t_r_tlsp prod_details2">
                        <h1>
                            <span class="page-author-extra"><?php echo 'Đăng bởi : ' . $authordata->display_name;?></span>
                        </h1>
                        <?php 
                        webseo24h_tie_show_author_extra_page($author_meta)    
                        ?>
                    </div><!-- End .t_r_tlsp -->
                     
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