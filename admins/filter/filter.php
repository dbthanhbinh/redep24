<?php
function remove_core_updates(){
    global $wp_version;
    return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_plugins','remove_core_updates'); // disable plugin
add_filter('pre_site_transient_update_themes','remove_core_updates');  // disable themes

// Change featured image default
add_filter('admin_post_thumbnail_html','change_thumbnail_html');
function change_thumbnail_html( $content ) 
{    
    $featured = str_replace(__('Set featured image'), __('Set Image size: 700x448 px'), $content);
    if ( 'featured' === get_post_type() ) {
        $featured = str_replace(__('Set featured image'), __('Set Image size: 600x448 px'), $content);
    }
    return $featured;
}


// GET FEATURED IMAGE
function thumb_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);    
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function thumb_columns_head($defaults) {       
    $defaults['featured_image'] = 'Featured';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function thumb_columns_content($column_name, $post_ID) {
    global $wpdb;
    if ($column_name == 'featured_image') 
    {
        $post_featured_image = thumb_get_featured_image($post_ID);
        if ($post_featured_image) 
        {
            echo '<img style="max-width:70px; float:left; margin-right:5px;" src="' . $post_featured_image . '" />';            
        }
    }
}

add_filter('manage_posts_columns', 'thumb_columns_head');
add_action('manage_posts_custom_column', 'thumb_columns_content', 10, 2);
