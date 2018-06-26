<?php get_header();?>
<?php 
    // print_r($_SESSION);
?>
<body>
    <!-- #wrapper -->
    <div id="wrapper">        
        <div id="container">   
            <div id="container">
                <div class="wrap_prod">
                    <?php 
                        get_sidebar();
                    ?> 
                    <div class="right_tlsp" <?php webseo24h_left_right_sidebar_class($layout='main');?>>
                        <div class="form_user">
                            <div class="form_dn" id="shopping-cart-hold-success">
                                <?php                                
                                    echo $ws24hShop->shop_loop_shopping_cart_order();  
                                ?>   
                                <div class="clear"></div>
                            </div><!-- End .form_dn -->
                        </div><!-- End .form_user -->
                    </div>                    
                    <?php 
                       //print_r($_SESSION);
                    ?>
                </div>
            </div><!-- End #container -->
        </div><!-- End #container -->    
    </div><!-- End #wrapper -->
</body>
<?php get_footer();?>