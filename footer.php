        <div id="footer">
        
            <div class="dknm">
            	<!-- Newsletter -->
            	<?php 
                db_newsletter_show(TRUE);
                ?>
                <div class="clear"></div>
                <!-- End newsletter -->
            </div><!-- End .dknm -->
            
            <div class="info_foot">
            
            	<div class="D_info_foot">
                    
                    <?php get_sidebar('footer');?>
                    
                    <div class="clear"></div>
                </div><!-- End .ul_info_foot -->
                
                <?php if(tie_get_option('keywords_footer')):?>
                <div class="keyworks_foot">
                        <?php if(tie_get_option('logo_register_footer')): ?>
                            <img class="sdkgd" src="<?php echo get_template_directory_uri();?>/images/layout/sdkgd.png" alt=""/>
                        <?php endif;?>
                	<div>
                            <?php 
                            $args = array(
                                    'smallest'                  => 9, 
                                    'largest'                   => 12,                                    
                                    'number'                    => 100,  
                                    'format'                    => 'flat',
                                    'separator'                 => "\n | \n",
                                    'orderby'                   => 'name', 
                                    'order'                     => 'ASC',  
                                    'link'                      => 'view', 
                                    'taxonomy'                  => 'post_tag', 
                                    'echo'                      => true,
                                    'child_of'                  => null, // see Note!
                                );
                            wp_tag_cloud($args);?>
                        </div>
                
                </div><!-- End .keyworks_foot -->
                <?php endif;?>
                
            </div><!-- End .info_foot -->
        
        </div><!-- End #footer -->
    
    </div><!-- End #wrapper -->

    
    <?php if( tie_get_option('footer_top') ): ?>
	<?php webseo24h_tie_scroll_to_top();?>
    <?php endif; ?>

    <?php wp_footer();?>
        
    <?php //echo get_num_queries().' queries in '.timer_stop(0).' seconds.'.PHP_EOL;?>
    
    
    
    
    <!--Start of Tawk.to Script-->
    <!--
    <script type="text/javascript">
    var $_Tawk_API={},$_Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5468d50beebdcbe3576ff753/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    -->
    <!--End of Tawk.to Script-->
    
    <?php 
        if(tie_get_option('footer_code'))
        {
            echo tie_get_option('footer_code');
        }        
    ?>
    
    <!-- Faceboo develop -->
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    
    <!-- Google + -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'vi'}
    </script>
    
    
    
</body>
</html>