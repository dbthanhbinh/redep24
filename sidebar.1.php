<?php 
/*
$sidebar_pos = tie_get_option('sidebar_pos');
$sidebar_float = '';
if($sidebar_pos && $sidebar_pos=='right')
    $sidebar_float = 'style="float:right; margin-left: 20px;"';
 * 
 */
?>

<div class="col-lg-3" <?php webseo24h_left_right_sidebar_class($layout='sidebar');?>>
    <div class="block_r_tlsp">
        <div id="sidebar-sticky-name">
        <?php
            if(is_single())
            {
                if(tie_get_option('note_shop_info')):
                    require 'includes/single-shop-info.php';
                endif;
            }
            
            require 'includes/sidebar-view-info.php';
            
            if( is_page())
            {
                $sidebar_page = tie_get_option( 'sidebar_page' );
                if( $sidebar_page )
                    dynamic_sidebar ( sanitize_title( $sidebar_page )); 
                else 
                    dynamic_sidebar( 'primary-widget-area' );
            }
            elseif(is_category())
            {                
                $sidebar_page = tie_get_option( 'sidebar_archive' );                   
                if( $sidebar_page )
                    dynamic_sidebar ( sanitize_title( $sidebar_page )); 
                else 
                {                    
                    dynamic_sidebar( 'primary-widget-area' );
                }
            }
            elseif(is_tax())
            {
                $sidebar_page = tie_get_option( 'sidebar_archive' );
                if( $sidebar_page )
                    dynamic_sidebar ( sanitize_title( $sidebar_page )); 
                else 
                    dynamic_sidebar( 'primary-widget-area' );
            }
            elseif(is_search() | is_tag())
            {
                $sidebar_page = tie_get_option( 'sidebar_archive' );
                if( $sidebar_page )
                    dynamic_sidebar ( sanitize_title( $sidebar_page )); 
                else 
                    dynamic_sidebar( 'primary-widget-area' );
            }
            elseif(is_single())
            {
                $sidebar_post = tie_get_option( 'sidebar_post' );
                if( $sidebar_post )
                    dynamic_sidebar ( sanitize_title( $sidebar_post )); 
                else 
                    dynamic_sidebar( 'primary-widget-area' );
            }
            wp_reset_query();
        ?>
        </div>  
        
        
     </div>     
</div>
