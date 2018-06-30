<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function webseo24h_stick_div_script()
{
?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/modules/stick_div/stick.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            
            $("#stick-extra-add-fix").addClass("stick-extra-add-fix");
            $("#sidebar-sticky-name").addClass("sidebar-sticky");
            
            $('.stick-extra-add-fix').hcSticky({
                top: 0,
                bottomEnd: 0,
                wrapperClassName: 'sidebar-sticky'
            });

        });    

    </script>  
<?php
}

// add_action("wp_footer", 'webseo24h_stick_div_script');

