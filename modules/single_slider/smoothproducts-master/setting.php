<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/modules/smoothproducts-master/css/smoothproducts.css">

<div class="sp-loading"><img src="<?php echo get_template_directory_uri();?>/modules/smoothproducts-master/images/sp-loading.gif" alt=""><br>LOADING IMAGES</div>

<?php 
//print_r($post_metas[$wpdb->prefix .'gallery']);
?>

<div class="sp-wrap">
    <?php 
    if($post_metas[$wpdb->prefix .'gallery']):
        foreach($post_metas[$wpdb->prefix .'gallery'] as $va)
        {
            $thumb = wp_get_attachment_image_src($va,'large');
        ?>
        <a href="<?php echo $thumb[0];?>"><img src="<?php echo $thumb[0];?>" alt="thumbnail"></a>
        <?php         
        }
    else:
    
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
        ?>
        <a href="<?php echo $thumb[0];?>"><img src="<?php echo $thumb[0];?>" alt="thumbnail"></a>
        <?php
    
    endif;
    ?>
	
</div>

<!-- JS ======================================================= -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/modules/smoothproducts-master/js/smoothproducts.js"></script>
<script type="text/javascript">
/* wait for images to load */
$(window).load(function() {
	$('.sp-wrap').smoothproducts();
});
</script>