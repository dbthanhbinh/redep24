<?php
	//Remove update
	//add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
	//if ( !current_user_can( 'edit_users' ) ) {
	 // add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	 // add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
	//}
 	
  	//Load jQuery
   if ( !is_admin() )
   {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"), false,'1.3.2');
        wp_deregister_script('l10n');
        wp_enqueue_script('jquery');
   }

    // Top Panel instead of Admin Bar
   add_filter( 'show_admin_bar', '__return_false' );
   // Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
        // remove junk from head
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator'); //removes WP Version # for security
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    }

   	add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

        // Remove post meta fields
      add_action( 'admin_menu' , 'crm_remove_page_fields' );
      function crm_remove_page_fields() {
      	remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); //removes comments status
      	remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); //removes comments
      	//remove_meta_box( 'postexcerpt' , 'post' , 'normal' );

        remove_meta_box( 'postexcerpt' , 'product' , 'normal' );
      	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
      	remove_meta_box( 'authordiv' , 'post' , 'normal' );
      	remove_meta_box( 'postcustom' , 'post' , 'normal' );
      	remove_meta_box( 'revisionsdiv'	, 'post' , 'normal' );
      //	remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
      }

      // Remove dashboard widgets
      add_action( 'admin_menu', 'crm_remove_dashboard_boxes' );
      function crm_remove_dashboard_boxes() {
      	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
      	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
      }

      // Remove sidebar widgets
      add_action( 'widgets_init', 'crm_remove_widgets', 1 );
      function crm_remove_widgets(){
      	unregister_widget('WP_Widget_Pages');
      	unregister_widget('WP_Widget_Calendar');
      	unregister_widget('WP_Widget_Archives');
      	unregister_widget('WP_Widget_Links');
      	unregister_widget('WP_Widget_Meta');
      	unregister_widget('WP_Widget_Search');
      	unregister_widget('WP_Widget_Categories');
      	unregister_widget('WP_Widget_Recent_Posts');
      	unregister_widget('WP_Widget_Recent_Comments');
      	unregister_widget('WP_Widget_RSS');
      	unregister_widget('WP_Widget_Tag_Cloud');
      }

      // Remove admin sidebar items
     // add_action( 'admin_menu', 'crm_remove_admin_menu_items' );
      function crm_remove_admin_menu_items() {
       	$remove_menu_items = array(__('Comments'),__('Phản hồi'));
      	global $menu;
      	end ($menu);
      	while (prev($menu)){
      		$item = explode(' ',$menu[key($menu)][0]);
      		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
      			unset($menu[key($menu)]);
      		}
      	}
      }
    // add_action('admin_menu', 'bt_remove_submenus');
		function bt_remove_submenus() {
		  global $submenu, $menu;
		  unset($submenu['index.php'][10]); // Removes 'Updates'.
		  unset($submenu['themes.php'][5]); // Removes 'Themes'.
		  unset($submenu['options-general.php'][15]); // Removes 'Writing'.
		  unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
		  unset($submenu['edit.php'][16]); // Removes 'Tags'.

			
				
	}
		
	// Change version
	function change_footer_admin_vs () 
	{
		return '&nbsp;';
	}
	add_filter('admin_footer_text', 'change_footer_admin_vs', 9999);
	function change_footer_version() 
	{
		return ' ';
	}
	add_filter( 'update_footer', 'change_footer_version', 9999);

	//My remove
	add_action('admin_menu', 'remove_menus', 102);
	function remove_menus()
	{
	global $submenu;
	
	remove_menu_page( 'edit-comments.php' ); // Comments
	/*
	 * remove_menu_page( 'edit.php'); // post
	remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	//remove_menu_page( 'edit.php?post_type=page' ); // Pages
	remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	remove_menu_page( 'users.php' ); // Users
	remove_menu_page( 'tools.php' ); // Tools
	//remove_menu_page('options-general.php'); // Settings
	*/
	///remove_menu_page( 'tools.php' ); // Tools
	//remove_menu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
	//remove_menu_page( 'link-manager.php' ); // Links
	///remove_submenu_page ( 'index.php', 'update-core.php' );    //Dashboard->Updates
	
	//remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
	///remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
	///remove_submenu_page ( 'themes.php', 'nav-menus.php' ); // Appearance-->nav-menus.php
	/*
	remove_submenu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
	remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
	remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
	remove_submenu_page ( 'themes.php', 'nav-menus.php' ); // Appearance-->nav-menus.php
	       
	remove_submenu_page ( 'options-general.php', 'options-general.php' ); // Settings->General
	remove_submenu_page ( 'options-general.php', 'options-writing.php' ); // Settings->writing
	remove_submenu_page ( 'options-general.php', 'options-reading.php' ); // Settings->Reading
	remove_submenu_page ( 'options-general.php', 'options-discussion.php' ); // Settings->Discussion
	remove_submenu_page ( 'options-general.php', 'options-media.php' ); // Settings->Media
	remove_submenu_page ( 'options-general.php', 'options-privacy.php' ); // Settings->Privacy
	*/               
	}
	
	
	
	
	
	
	/*
	 * 
	 * function remove_submenus() {
  global $submenu;
  //Dashboard menu
  unset($submenu['index.php'][10]); // Removes Updates
  //Posts menu
  unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
  unset($submenu['edit.php'][10]); // Add new post
  unset($submenu['edit.php'][15]); // Remove categories
  unset($submenu['edit.php'][16]); // Removes Post Tags
  //Media Menu
  unset($submenu['upload.php'][5]); // View the Media library
  unset($submenu['upload.php'][10]); // Add to Media library
  //Links Menu
  unset($submenu['link-manager.php'][5]); // Link manager
  unset($submenu['link-manager.php'][10]); // Add new link
  unset($submenu['link-manager.php'][15]); // Link Categories
  //Pages Menu
  unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
  unset($submenu['edit.php?post_type=page'][10]); // Add New page
  //Appearance Menu
  unset($submenu['themes.php'][5]); // Removes 'Themes'
  unset($submenu['themes.php'][7]); // Widgets
  unset($submenu['themes.php'][15]); // Removes Theme Installer tab
  //Plugins Menu
  unset($submenu['plugins.php'][5]); // Plugin Manager
  unset($submenu['plugins.php'][10]); // Add New Plugins
  unset($submenu['plugins.php'][15]); // Plugin Editor
  //Users Menu
  unset($submenu['users.php'][5]); // Users list
  unset($submenu['users.php'][10]); // Add new user
  unset($submenu['users.php'][15]); // Edit your profile
  //Tools Menu
  unset($submenu['tools.php'][5]); // Tools area
  unset($submenu['tools.php'][10]); // Import
  unset($submenu['tools.php'][15]); // Export
  unset($submenu['tools.php'][20]); // Upgrade plugins and core files
  //Settings Menu
  unset($submenu['options-general.php'][10]); // General Options
  unset($submenu['options-general.php'][15]); // Writing
  unset($submenu['options-general.php'][20]); // Reading
  unset($submenu['options-general.php'][25]); // Discussion
  unset($submenu['options-general.php'][30]); // Media
  unset($submenu['options-general.php'][35]); // Privacy
  unset($submenu['options-general.php'][40]); // Permalinks
  unset($submenu['options-general.php'][45]); // Misc
}
add_action('admin_menu', 'remove_submenus');
	 * 
	 * 
	 */
?>