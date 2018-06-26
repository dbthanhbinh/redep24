<?php
	// Change logo header in Admin
    function custom_admin_logo() 
    {
        echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/icon.ico) !important;}</style>';
    }
    add_action('admin_head', 'custom_admin_logo');
 	add_filter('admin_footer_text', 'change_footer_admin');
 	
  	function  change_footer_admin () 
  	{  		
    	echo 'copyright 2012 <a href="'.get_bloginfo('url').'">'.get_bloginfo('url').'</a><br/>Theme by :'.get_bloginfo('name');
  	}

 	add_action('login_head', 'custom_logo');
 	function custom_logo() 
 	{
    	echo '<style type="text/css">
    	h1 a {    
    		background-image:url('.WP_MYSITE_TEMPLATE_URL.'/images/logo.png) !important;
    		height:90px !important;
  		};
    	</style>';
    }

    //Custom Login Screen
  	function change_wp_login_url() 
  	{
 		//echo bloginfo('url');
  	}

  	function change_wp_login_title() 
  	{
  		//echo get_option('blogname');
  	}

  	add_filter('login_headerurl', 'change_wp_login_url');
  	add_filter('login_headertitle', 'change_wp_login_title');
?>