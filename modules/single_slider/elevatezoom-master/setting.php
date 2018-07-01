<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/modules/single_slider/elevatezoom-master/style.css">
<script src='<?php echo get_template_directory_uri();?>/modules/single_slider/elevatezoom-master/jquery.elevatezoom.js'></script>

<div class="sp-wrap" style="position: relative; max-width: 100%;">
    <?php 
    if($post_metas[$wpdb->prefix .'photos']):        
        $ttm = 1;
        foreach($post_metas[$wpdb->prefix .'photos'] as $va)
        {
            if($ttm==1)
            {
                $thumb = wp_get_attachment_image_src($va,'large');
                ?>
                <img id="zoom_01" src='<?php echo $thumb[0];?>' data-zoom-image="<?php echo $thumb[0];?>"/>
                <div id="gallery_01">                    
                <?php    
            }
            else
            {
                $thumb = wp_get_attachment_image_src($va,'thumbnail');
                $thumb2 = wp_get_attachment_image_src($va,'large');
                ?>
                    <a href="#" class="elevatezoom-gallery" data-image="<?php echo $thumb2[0];?>" data-zoom-image="<?php echo $thumb2[0];?>"> 
                        <img src="<?php echo $thumb[0];?>" /> 
                    </a> 
                <?php    
            }
            $ttm++;         
        }
        ?>
    </div>    
    <?php    
    else:    
        $thumb1 = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
        $thumb2 = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail');
        ?> 
        <img id="zoom_01" src='<?php echo $thumb1[0];?>' data-zoom-image="<?php echo $thumb1[0];?>"/>
        <div id="gallery_01"></div>
        <?php
    endif;
    ?> 
</div>

<!-- JS ======================================================= -->
<script type="text/javascript">
    $("#zoom_01").elevateZoom({
        gallery:'gallery_01', 
        cursor: 'pointer', 
        galleryActiveClass: 'active', 
        imageCrossfade: true,
        zoomEnabled: false,  // show zoom or not
        loadingIcon: '<?= get_template_directory_uri()?>/images/bx_loader.gif'
    }); 

	// $("#zoom_01").bind("click", function(e) { 
    //     var ez = $('#zoom_01').data('elevateZoom');	
    //     $.fancybox(ez.getGalleryList()); 
    //     return false; 
    // });
</script>