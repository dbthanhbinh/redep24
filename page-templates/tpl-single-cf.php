<?php 
    $comment_postid = get_the_ID();
    $_postmetas = new postmetas(get_the_ID()); 
    
    $price              = $_postmetas->postmetas_get($wpdb->prefix.'price');  
    $giasi              = $_postmetas->postmetas_get($wpdb->prefix.'price_si');  
    $discount           = $_postmetas->postmetas_get($wpdb->prefix.'discount');
    $code               = $_postmetas->postmetas_get($wpdb->prefix.'code');
    $showpostview       = $_postmetas->postmetas_get($wpdb->prefix.'showpostview') ? $_postmetas->postmetas_get($wpdb->prefix.'showpostview') : 100;
    $state              = $_postmetas->postmetas_get($wpdb->prefix.'state');
    $area               = $_postmetas->postmetas_get($wpdb->prefix.'area');
    $colors             = $_postmetas->postmetas_get_multiple($wpdb->prefix.'color');
    $sizes              = $_postmetas->postmetas_get_multiple($wpdb->prefix.'size');
    $photos             = $_postmetas->postmetas_get_multiple($wpdb->prefix.'photos');
    
    $hidden_unit_price  = webseo24h_tie_format_price_discount_unitprice($price, $discount);
    
    /****** Update showpostview ******/
    $showpostview = intval($showpostview);
    $showpostviewnew  = ($showpostview < 1000) ? 1000 : $showpostview++;
    update_post_meta(get_the_ID(), $wpdb->prefix.'showpostview',$showpostviewnew);
    /****** End Update showpostview ******/  
    ?>