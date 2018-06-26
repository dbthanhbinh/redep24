<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function webseo24h_tie_banner_top( $banner , $before= false , $after = false){
    if(tie_get_option($banner)):
        echo $before;
        ?>    
            <ul>
                <?php
                for($mi=1 ; $mi <= 3 ; $mi++)
                {
                    if(tie_get_option($banner.'_img'.$mi)):
                        $target  =  $nofollow = "";
                        
                        if( tie_get_option( $banner.'_tab'.$mi)) $target='target="_blank"';
                        if( tie_get_option( $banner.'_nofollow'.$mi)) $nofollow='rel="nofollow"'; 
                        ?>
                        <li>
                            <a href="<?php echo tie_get_option( $banner.'_url'.$mi );?>" title="<?php echo tie_get_option( $banner.'_alt'.$mi );?>" <?php echo $target; echo $nofollow;?>>
                                <img src="<?php echo tie_get_option( $banner.'_img'.$mi ) ?>" alt="<?php echo tie_get_option( $banner.'_alt'.$mi); ?>" />
                            </a>
                        </li>
                        <?php 
                    endif;
                }
                ?>
            </ul>    
    <?php
        echo $after;
    endif;
}
