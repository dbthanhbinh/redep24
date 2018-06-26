<?php
function change_post_menu_label() 
{
	global $menu;
	global $submenu;
	$menu[5][0] = __('Products',THEMENAME);
	$submenu['edit.php'][5][0] = __('All Products',THEMENAME);
	$submenu['edit.php'][10][0] = __('New Products',THEMENAME);
	//$submenu['edit.php'][15][0] = 'Category';
	//$submenu['edit.php'][16][0] = 'Tag';
	echo '';
}
function change_post_object_label() 
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = __('Products',THEMENAME);
	$labels->singular_name = __('Products',THEMENAME);
	$labels->add_new = __('Add new Products',THEMENAME);
	$labels->add_new_item = __('Add new',THEMENAME);
	$labels->edit_item = __('Edit Products',THEMENAME);
	$labels->new_item = __('Products new',THEMENAME);
	$labels->view_item = __('View Products',THEMENAME);
	$labels->search_items = __('Search Products',THEMENAME);
	$labels->not_found = __('not found Products',THEMENAME);
	$labels->not_found_in_trash = __('Not found Products',THEMENAME);
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );