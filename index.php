<?php get_header();?>

        <div id="container">
        
            <!-- home slider controll -->
            <?php get_template_part('page-templates/tpl', 'slidecontroll');?>
            <!-- End home slider controll -->
            
            <div class="wrap_prod">
            
                <?php
                //print_r(tie_get_option('on_home'));
                if( tie_get_option('on_home') != 'boxes' )
                {
                        //get_template_part( 'loop', 'index' );
                        //if ($wp_query->max_num_pages > 1) tie_pagenavi();
                }
                else
                {
                    
                    $cats = get_option( 'tie_home_cats' ) ;                    
                    if($cats)
                            foreach ($cats as $cat)	tie_get_home_cats($cat);
                     
                    else _e( 'You can use Homepage builder to build your homepage' , THEME_NAME );

                    ###tie_home_tabs();
                                       
                }
                ?>
            
            </div><!-- End .wrap_prod -->
            
            <!-- Partner -->
            <?php get_template_part('page-templates/tpl', 'partner');?>
            <!-- End Partner -->
        
        </div><!-- End #container -->
                
<?php 
    get_footer();
