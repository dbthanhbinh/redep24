<div class="content row">    
    <div id="cencol" class="cencol col-lg-9 col-md-12 mb-9">                
        <div class="m_cencol">
            <?php 
            if(tie_get_option('slider')):
                require_once 'tpl-slider.php';
            endif;?>

            <?php require_once 'tpl-tab.php';?>
        </div><!-- End .m_cencol -->
    </div><!-- End .cencol -->   

    <div class="rightcol col-lg-3 col-md-12 mb-3">    
        <?php 
            //get_template_part('page-templates/tpl', 'advcontroll');
            webseo24h_tie_banner_top("home_banner_right_slider", '<div class="adv_rightcol">', '</div>');
        ?>
    </div> <!-- End .rightcol --> 
</div><!-- End .content -->