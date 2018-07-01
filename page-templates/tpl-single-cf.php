<?php                     
    $comment_postid = get_the_ID();        
    $_postmetas = new postmetas(get_the_ID());
    
    $post_metas     = get_post_custom(get_the_ID());
    $price 		    = $_postmetas->postmetas_get_multiple($wpdb->prefix.'price'); //$post_metas[$wpdb->prefix.'price'][0];
    $discount 	    = $_postmetas->postmetas_get_multiple($wpdb->prefix.'discount'); //$post_metas[$wpdb->prefix.'discount'][0];
    // $weight_ship 	= $_postmetas->postmetas_get_multiple($wpdb->prefix.'weight_ship'); //$post_metas[$wpdb->prefix.'weight_ship'][0];
    
    // ////$obj_brand      = wp_get_object_terms(get_the_ID(),'nhan-hieu');						 	
    // $xuatxu 	    = $_postmetas->postmetas_get_multiple($wpdb->prefix.'source'); //get_post_meta(get_the_ID(),$wpdb->prefix.'source',true);
    // $state          = $_postmetas->postmetas_get_multiple($wpdb->prefix.'state'); //get_post_meta(get_the_ID(),$wpdb->prefix.'state',true);
    
    // $display_colors         = $_postmetas->postmetas_get_multiple($wpdb->prefix.'display_color');
    // $colors                 = $_postmetas->postmetas_get_multiple_a($wpdb->prefix.'color');
    
    // $display_size           = $_postmetas->postmetas_get_multiple($wpdb->prefix.'display_size');
    // $sizes                  = $_postmetas->postmetas_get_multiple_a($wpdb->prefix.'size');
                            
    /****** Update showpostview ******/
    $showpostview = $_postmetas->postmetas_get_multiple($wpdb->prefix.'showpostview'); //get_post_meta(get_the_ID(),$wpdb->prefix.'showpostview',true);
    $tshowpostview = intval($showpostview);
    $showpostviewnew  = $tshowpostview+1;						
    update_post_meta(get_the_ID(), $wpdb->prefix.'showpostview',$showpostviewnew);
    /****** End Update showpostview ******/  
    ?>