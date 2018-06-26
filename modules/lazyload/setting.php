<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function db_get_lazy_load_script()
{
    if(tie_get_option('lazyload'))
    {
        $html = '
                    <script type="text/javascript" src="'.get_template_directory_uri().'/modules/lazyload/echo.js"></script>               
                    
                    <script>
                        echo.init({
                          offset: 100,
                          throttle: 250,
                          unload: false,
                          callback: function (element, op) {
                            console.log(element, "has been", op + "ed")
                          }
                        });
                    </script>  
                    
                    ';
        return $html;
    }
    else
        return '';
}


if(tie_get_option('lazyload')):
    //echo 'fasdfads' . tie_get_option('lazyload');
    add_action('wp_footer', "db_get_lazy_load_script");

    // remove default width height, add class lazy, data-href in the_content
    function addClass_images( $content ) {	

            $html = preg_replace_callback(
                            '#(<img\s[^>]*src)="([^"]+)"#',
                            "callback_img", $content );
            return preg_replace( '/(height|width)="\d*"\s/', "", $html );
    }
    //add_filter( 'the_content', 'addClass_images', 100 );
    add_filter( 'post_thumbnail_html', 'addClass_images', 10 );

    function callback_img($match) {
            list(, $img, $src,$width,$height) = $match;
            $url = get_stylesheet_directory_uri().'/modules/lazyload/loading_icon.gif';
            return "$img=\"$url\" data-echo=\"$src\" ";
    }


    // lazy loading hinh trong chi tiet noi dung
    // remove default width height, add class lazy, data-href in the_content
    function addClass_images_content( $content ) {

        if(is_single()){
            $content = preg_replace( '/(width|height)="\d*"\s/', "", $content );
            //$content = preg_replace('/class=".*?"/', '', $content);
            $html = preg_replace_callback(
                            '#(<img\s[^>]*src)="([^"]+)"#',
                            "callback_img_content", $content );
            return $html;
        }
        else
            return $content;
    }
    add_filter( 'the_content', 'addClass_images_content', 100 );
    //add_filter( 'post_thumbnail_html', 'addClass_images_content', 100 );

    function callback_img_content($match) {
            list(, $img, $src,$width,$height) = $match;
            $url = get_stylesheet_directory_uri().'/modules/lazyload/loading_icon.gif';
            return "$img=\"$url\" class=\"lazy\" data-echo=\"$src\" ";
    }

endif;