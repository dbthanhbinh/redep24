<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* ----------------------------------------------------------------------------- */
/*  Enqueue css
/* ----------------------------------------------------------------------------- */ 
function webseo24h_styles() 
{
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/css.css"/>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/frame_script.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/same_height_columns.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/publicjs.js"></script>
    
    <!--[if IE 6]>
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/DD_belatedPNG_0.0.8a.js"></script>
        <script type="text/javascript">
                    DD_belatedPNG.fix('img, div, span, a, h1, h2, h3, h4, h5, h6, p, table, input');
        </script>
    <![endif]-->
    <!--[if lt IE 9]>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/FIX_IE.css" />
    <![endif]-->
    <?php
}
add_action( 'wp_enqueue_scripts', 'webseo24h_styles' );

function webseo24h_scripts_ajax() {
   
    echo "\n <script type='text/javascript'>\n\t";
    echo "var mytheme_urls = {";
    echo "\n \t\tajaxurl:'".admin_url('admin-ajax.php' )."'";
    echo "\n \t\t,url:'".get_site_url()."'";
    echo "\n \t\t,sourceurl:'".  get_template_directory_uri()."/images/'";
    echo "\n \t\t,shopurl:'".  get_template_directory_uri()."/webseo24h-shop/images/'";
    echo "\n\t};\n";
    echo " </script>\n";
}
add_action( 'wp_head', 'webseo24h_scripts_ajax' );