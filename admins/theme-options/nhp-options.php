<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}
//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options()
{

    $args = array();

    //Set it to dev mode to view the class settings/info in the form - default is false
    $args['dev_mode'] = false;

    //Choose to disable the import/export feature
    //$args['show_import_export'] = false;
    //Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
    $args['opt_name'] = 'basic';

    //Custom menu icon
    //$args['menu_icon'] = '';

    //Custom menu title for options page - default is "Options"
    $args['menu_title'] = __('webseo24h.com', THEME_NAME);

    //Custom Page Title for options page - default is "Options"
    $args['page_title'] = __('Cài đặt theme', THEME_NAME);

    //Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
    $args['page_slug'] = 'nhp_theme_options';

    //Custom page capability - default is set to "manage_options"
    //$args['page_cap'] = 'manage_options';

    //page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
    //$args['page_type'] = 'submenu';

    //parent menu - default is set to "themes.php" (Appearance)
    //the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'themes.php';

    //custom page location - default 100 - must be unique or will override other items
    $args['page_position'] = 90;

    $sections = array();
      
    // General Settings  basic
    $sections[] = array(
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_137_computer_service.png',
		'title' => __('Cài đặt chung', THEME_NAME),
		'desc' => __('<p class="description"></p>', THEME_NAME),
		'fields' => array(
                            array(
                                'id' => 'basic_logo', //must be unique
                                'type' => 'upload', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Tải logo', THEME_NAME),
                                'sub_desc' => __('Tải hình logo tại đây', THEME_NAME),
                                'desc' => __('Chọn tải logo của bạn', THEME_NAME),
                            ),
                            array(
                                'id' => 'basic_favicon',
                                'type' => 'upload',
                                'title' => __('Tải Favicon', 'simple'),
                                'sub_desc' => __('Tải hình Favicon tại đây', THEME_NAME),
                                'desc' => __("Chọn tải Favicon a 16px x 16px ", THEME_NAME),
                                'msg' => '',
                                'std' => ''
                            ),	
                            array(
                                'id' => 'basic_slogan_1', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Slogan 1', THEME_NAME),
                                'sub_desc' => __('Nhập Slogan 1', THEME_NAME),
                                'desc' => __('Nhập Slogan 1 tại đây', THEME_NAME),
                            ),
                            array(
                                'id' => 'basic_slogan_2', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Slogan 2', THEME_NAME),
                                'sub_desc' => __('Nhập Slogan 2', THEME_NAME),
                                'desc' => __('Nhập Slogan 2 tại đây', THEME_NAME),
                            )
		)
    );
    
    
    // General Settings  contact 
    $sections[] = array(
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_137_computer_service.png',
		'title' => __('Thông tin liên hệ', THEME_NAME),
		'desc' => __('<p class="description">Thêm các thông tin liên hệ tại đây</p>', THEME_NAME),
		'fields' => array(
                            array(
                                'id' => 'contact_company_name', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Tên công ty', THEME_NAME),
                                'sub_desc' => __('Nhập tên công ty tại đây', THEME_NAME),
                                'desc' => __('Nhập tên công ty tại đây', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_address', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Địa chỉ công ty', THEME_NAME),
                                'sub_desc' => __('Nhập Địa chỉ công ty tại đây', THEME_NAME),
                                'desc' => __('Nhập Địa chỉ công ty tại đây', THEME_NAME),
                            ),				
                            array(
                                'id' => 'contact_company_fax', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Số fax', THEME_NAME),
                                'sub_desc' => __('Nhập số fax tại đây', THEME_NAME),
                                'desc' => __('Nhập số fax tại đây VD: (08)123456 or (04) 123 456', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_phone', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Số điện thọai', THEME_NAME),
                                'sub_desc' => __('Nhập số điện thoại tại đây', THEME_NAME),
                                'desc' => __('Nhập số điện thoại tại đây VD: (08)123456 or (04) 123 456 - 0909874825', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_hotline', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Số hotline', THEME_NAME),
                                'sub_desc' => __('Nhập số điện thoại hotline', THEME_NAME),
                                'desc' => __('Nhập số điện thoại hotline VD: (08)123456 or (04) 123 456 - 0909874825', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_email', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Email liên hệ', THEME_NAME),
                                'sub_desc' => __('Nhập email liên hệ', THEME_NAME),
                                'desc' => __('Email nhận liên hệ từ khách hàng', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_yahoo', //must be unique
                                'type' => 'multi_text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Danh sách yahoo nick', THEME_NAME),
                                'sub_desc' => __('Danh sách yahoo nick', THEME_NAME),
                                'desc' => __('Danh sách yahoo nick vd: nickname1,nickname2,...', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_skype', //must be unique
                                'type' => 'multi_text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Danh sách skype nick', THEME_NAME),
                                'sub_desc' => __('Danh sách skype nick', THEME_NAME),
                                'desc' => __('Danh sách skype nick vd: nickname1,nickname2,...', THEME_NAME),
                            ),
                            array(
                                'id' => 'contact_company_gmap',
                                'type' => 'textarea',
                                'title' => __('Thêm Google Maps Iframe', WS24_THEMENAME), 
                                'sub_desc' => __('', WS24_THEMENAME),
                                'desc' => __('Đặt kích thước width="894" và height="450" px', WS24_THEMENAME),
                                'std' => ''
                            )
		)
    );
    
    
    // setting social all site
    $sections[] = array(
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_137_computer_service.png',
		'title' => __('Mạng xã hội', THEME_NAME),
		'desc' => __('<p class="description">cài đặt thông tin về mạng xã hội.</p>', THEME_NAME),
		'fields' => array(
                            array(
                                'id' => 'social_facebook_key', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Facebook App ID', THEME_NAME),
                                'sub_desc' => __('Facebook API key', THEME_NAME),
                                'desc' => __('Cài đặt Facebook API key.', THEME_NAME),                                
                                'std' => ''
                            ),
                            array(
                                'id' => 'social_facebook_secret', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Facebook App Secret', THEME_NAME),
                                'sub_desc' => __('Facebook App Secret', THEME_NAME),
                                'desc' => __('Cài đặt Facebook App Secret.', THEME_NAME),                                
                                'std' => ''
                            ),
                            array(
                                'id' => 'social_facebook_page', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Facebook fan page url', THEME_NAME),
                                'sub_desc' => __('Facebook fan page url', THEME_NAME),
                                'desc' => __('Cài đặt Facebook fan page url.', THEME_NAME),                                
                                'std' => ''
                            ),
                            array(
                                'id' => 'social_google_page', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Google plus page url', THEME_NAME),
                                'sub_desc' => __('Google plus page url', THEME_NAME),
                                'desc' => __('Cài đặt Google plus page url.', THEME_NAME),                                
                                'std' => ''
                            ),
                            array(
                                'id' => 'social_twitter_page', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Twitter page url', THEME_NAME),
                                'sub_desc' => __('Twitter page url', THEME_NAME),
                                'desc' => __('Cài đặt Twitter page url.', THEME_NAME),                                
                                'std' => ''
                            ),
                            array(
                                'id' => 'social_youtube_page', //must be unique
                                'type' => 'text', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Youtube page url', THEME_NAME),
                                'sub_desc' => __('Youtube page url', THEME_NAME),
                                'desc' => __('Cài đặt Youtube page url.', THEME_NAME),                                
                                'std' => ''
                            )
		)
    );
    
    // setting image all site
    $sections[] = array(
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_137_computer_service.png',
		'title' => __('Hình ảnh bài viết', THEME_NAME),
		'desc' => __('<p class="description"></p>', THEME_NAME),
		'fields' => array(
                            array(
                                'id' => 'thumb_timthumb', //must be unique
                                'type' => 'radio', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Cài đặt hình', THEME_NAME),
                                'sub_desc' => __('Cài đặt hình ảnh', THEME_NAME),
                                'desc' => __('Cài đặt hình ảnh bài viết hiển thị: mặc định: off', THEME_NAME),
                                'options' => array('off' => 'Không sử dụng','crop' => 'Timthumb tự động cắt','no-crop' => 'Timthumb tự động co giãn'),
                                'std' => 'off'
                            ),	
                            array(
                                'id' => 'thumb_lazyload', //must be unique
                                'type' => 'radio', //builtin fields include:
                                //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
                                'title' => __('Cài đặt hình lazyload', THEME_NAME),
                                'sub_desc' => __('Cài đặt hình ảnh lazyload', THEME_NAME),
                                'desc' => __('lazyload giảm tải hiển thị website mặc định: off', THEME_NAME),
                                'options' => array('off' => 'Không sử dụng','on' => 'Timthumb Lazy loadding'),
                                'std' => 'off'
                            )
		)
    );
    
    
    
    
        				
    $tabs = array();

    if (function_exists('wp_get_theme')){
            $theme_data = wp_get_theme();
            $theme_uri = $theme_data->get('ThemeURI');
            $description = $theme_data->get('Description');
            $author = $theme_data->get('Author');
            $version = $theme_data->get('Version');
            $tags = $theme_data->get('Tags');
    }
    else{
            $theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
            $theme_uri = $theme_data['URI'];
            $description = $theme_data['Description'];
            $author = $theme_data['Author'];
            $version = $theme_data['Version'];
            $tags = $theme_data['Tags'];
    }	

    global $NHP_Options;
    $NHP_Options = new NHP_Options($sections, $args, $tabs);	
        
}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>