<?php
add_filter('user_trailingslashit', 'no_page_slash_html',10, 3);
function no_page_slash_html($string, $type){
   global $wp_rewrite;
	if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes==true ){
		return untrailingslashit($string ) ;
  }else{
   return $string;
  }
}

add_filter('pre_get_posts','remove_html_slug_query');
function remove_html_slug_query( $query ) {
	if ( $query->is_single  ) {
		$query->query_vars = str_replace('.html', '', $query->query_vars);		
		
	}
	
	return $query;
}



add_filter('post_link', 'tour_permalink', 10, 3);
add_filter('post_type_link', 'tour_permalink', 10, 3); 
function tour_permalink($permalink, $post_id, $leavename) {	
	return $permalink .='.html';
}


//chua chay
//add_filter('tag_link', 'my_tag_link', 10, 2);
/*
function my_tag_link($tag_link, $tag_id) {
    $tag_base = get_option('tag_base');
    if ($tag_base) {
        $tag_link = preg_replace('@^' . preg_quote($tag_base, '@') . '@', '', $tag_link); 
    }
    return '/' . trim($tag_link, '/') . '.html';
}*/
// RewriteCond %{REQUEST_URI} !^/post-.*
// RewriteRule ^/?([^/]*)\.html$ /post-tag/$1

//chua chay
//add_filter('page_link', 'bce_page_link',10,3);
//add_filter('_page_link', 'bce_page_link');

function bce_page_link($permalink, $id)
{
	global $wp_query;
	print_r($permalink);
	return $permalink .='.html';
}