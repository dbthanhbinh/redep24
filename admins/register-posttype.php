<?php
$rg_posttypes = array(
		array('posttype' => 'sliders','taxonomy' => array(),'postname'=> "Slider show",'support' => array('title','excerpt')),
		//array('posttype' => 'slide-show','taxonomy' => array(),'postname'=> "Slider show2",'support' => array('title','excerpt','thumbnail')),
		/*array('posttype' => 'website-wordpress','taxonomy' => array(),'postname'=> "Website wordpress",'support' => array('title','excerpt','editor','thumbnail')),		
		array('posttype' => 'dich-vu','taxonomy' => array(),'postname'=> "Dịch vụ SEO",'support' => array('title','excerpt','editor','thumbnail')),		
		array('posttype' => 'tu-van-seo','taxonomy' => array('dich-vu'),'postname'=> "Tư vấn SEO",'support' => array('title','excerpt','editor','thumbnail')),
		
		array('posttype' => 'du-an','taxonomy' => array(),'postname'=> "Dự án mới",'support' => array('title','excerpt','editor','thumbnail')),
		array('posttype' => 'thiet-ke-in-an','taxonomy' => array(),'postname'=> "Thiết kế in ấn",'support' => array('title','excerpt','editor','thumbnail'))
		*/
);

$db_list_posttypes_rg = array();
if(!empty($rg_posttypes))
{
	foreach ($rg_posttypes as $value) 
	{
		$db_list_posttypes_rg[] = $value['posttype'];
	}
}	

// Register posttype
add_action( 'init', 'register_custom_posttype' );
function register_custom_posttype()
{
	global $rg_posttypes;
	if(!empty($rg_posttypes))
	{	
		foreach ($rg_posttypes as $key => $value)
		{
			$labels = array(
					'name' 					=> __($value['postname'], WS24_THEMENAME),
					'singular_name' 		=> __($value['postname'], WS24_THEMENAME),
					'add_new' 				=> __("Add new", WS24_THEMENAME),
					'add_new_item' 			=> __("Add new ".$value['postname'],WS24_THEMENAME),
					'edit_item' 			=> __('Edit'.$value['postname'],WS24_THEMENAME),
					'new_item' 				=> __($value['postname'].' new',WS24_THEMENAME),
					'all_items' 			=> __('All '.$value['postname'],WS24_THEMENAME),
					'view_item'				=> __('View '.$value['postname'],WS24_THEMENAME),
					'search_items'			=> __('Search '.$value['postname'],WS24_THEMENAME),
					'not_found' 			=> __('Not found '.$value['postname'],WS24_THEMENAME),
					'not_found_in_trash' 	=> __('Not found '.$value['postname'],WS24_THEMENAME),
					'parent_item_colon' 	=> '',
					'menu_name' 			=> __($value['postname'],WS24_THEMENAME)
		
			);
			$args = array(
					'labels' 				=> $labels,
					'public' 				=> true,
					'publicly_queryable' 	=> true,
					'show_ui' 				=> true,
					'show_in_menu' 			=> true,
					'query_var' 			=> true,
					'rewrite' 				=> true,
					'capability_type' 		=> 'post',
					'has_archive' 			=> true,
					'hierarchical' 			=> false,
					'taxonomies'			 => $value['taxonomy'],
					'menu_icon'				=> get_stylesheet_directory_uri().'/admins/images/setting_icon.jpg',
					'supports' 				=> $value['support']
			);
			register_post_type($value['posttype'],$args);
		}
	}
}



function my_feed_request($qv) {	
	    if (isset($qv['feed']) && !isset($qv['post_type']))
	        $qv['post_type'] = array('post');
	    return $qv;
	}
add_filter('request', 'my_feed_request');