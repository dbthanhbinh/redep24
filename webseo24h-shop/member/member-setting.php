<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'functions_.php';
require_once 'layout/member-layout.php';

class member
{
    public $userId;
    public $userData;
    public $userMetaData;
    public $userMetaExtra;
    public $userLoginPage;
    public $userRegisterPage;
    public $userMemberPageUrl;
    public $_table;


    public function __construct() {
        global $wpdb;
        
        $this->_table = $wpdb->prefix . 'add_users';        
        $this->userMetaExtra = 'ws24h_user_extra_info';
        $this->userLoginPage = 'dang-nhap';
        $this->userRegisterPage = 'dang-ky';
        $this->userLoginPageUrl = home_url() . '/' . $this->userLoginPage;
        $this->userRegisterPageUrl = home_url() . '/' . $this->userLoginPage;
        $this->userMemberPageUrl = home_url() . '/author/';
        
        if(is_user_logged_in())
        {
            $this->userId = get_current_user_id();
            $this->userData = get_userdata($this->userId);
            $this->userMetaData = get_user_meta($this->userId);
        }
        //print_r($this->userMetaData);
        //print_r($this->userMetaData['address_info_district'][0]);
    }
    
    public function __destruct() {
        
    }
    
    // set , get user extra infomation
    public function member_set_user_extra_meta_data($value)
    {
        update_usermeta($this->userId, $this->userMetaExtra, $value);
    }
    public function member_set_user_extra_meta_data_by_userid($value,$userid)
    {
        update_usermeta($userid, $this->userMetaExtra, $value);
    }
    
    public function member_get_user_extra_meta_data()
    {
        return get_usermeta($this->userId, $this->userMetaExtra);
    }
    public function member_get_user_extra_meta_data_by_userid($userid)
    {
        return get_usermeta($userid, $this->userMetaExtra);
    }

    // pub get user_display_name
    public function member_get_user_display_name()
    {
        return $this->userData->display_name;
    }
    
    // pub get user_display_email
    public function member_get_user_email()
    {
        return $this->userData->user_email;
    }
    
    // pub get user_display_login
    public function member_get_user_login_name()
    {
        return $this->userData->user_login;
    }
    
    // pub get user_display_phone
    public function member_get_user_phone()
    {
        return $this->userMetaData['phone'][0];
    }
    
    // pub get user_display_address
    public function member_get_user_address()
    {
        return $this->userMetaData['address_info_address'][0];
    }
    
    // pub get user_display_cities
    public function member_get_user_cities()
    {
        return $this->userMetaData['address_info_city'][0];
    }
    
    // pub get user_display_district
    public function member_get_user_district()
    {
        return $this->userMetaData['address_info_district'][0];
    }
    
    // redirect to login page
    public function member_redirect_to_login()
    {
        wp_redirect(home_url().'/'.$this->userLoginPage);
    }
    
    // redirect to register page
    public function member_redirect_to_register()
    {
        wp_redirect(home_url().'/'.$this->userRegisterPage);
    }
    
    // redirect to register page
    public function member_redirect_to_member()
    {
        wp_redirect($this->userMemberPageUrl.$this->member_get_user_login_name());
    }


    // member check is login or not
    public function member_check_login()
    {
        return is_user_logged_in();
    }
    
    // member login form
    public function member_login_form()
    {
        return member_layout_login_form();
    }
    
    // member register form
    public function member_register_form()
    {
        return member_layout_register_form();
    }
    
    // member Change password form
    public function member_change_password_form()
    {
        return member_layout_change_password_form();
    }
    
    // member show html member_menu_top 
    public function member_show_member_menu_top()
    {
        echo member_layout_show_menu_top_member($this->member_check_login());
    }
    
    // member show user edit form
    public function member_show_user_edit_form()
    {
        echo member_layout_user_edit_form();
    }
    
    public function member_login_user($email,$pass)
    {
        $userdata = get_user_by_email($email);
        $_login = $userdata->user_login;
        
        //-----------------------------------------        
        $info = array();
        $info['user_login'] = $_login;
        $info['user_password'] = $pass;
        $info['remember'] = true;
        $user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){
           $json = 'Đăng nhập thất bại';
        } else {
           $json = 'Đăng nhập thành công.';
        }
        //------------------------------------------
        
        return $json;
    }
    
    public function member_register_user($muserdata)
    {
        global $member,$tempemail;
        /*
        $muserdata['userpassword']		= wp_generate_password(6);            
        */
        // user extra data 1
        $user_extra = serialize($muserdata);

        $muserdata['userpassword']		= wp_generate_password(6);  
        $user_login		= trim($muserdata['username']);
        $user_pass		= trim($muserdata['userpassword']); // mat khau dang nhap
        $user_email 	= trim($muserdata['useremail']);
        $display_name	= trim($muserdata['fullname']);

        $user_data = compact('user_login', 'user_email', 'user_pass','display_name');
        $user_id = wp_insert_user($user_data);
        if($user_id)
        {
            // update user data extra  (phone, email, add ...) 1
            $member->member_set_user_extra_meta_data_by_userid($user_extra,$user_id);

            $contactmethods = array();
            $contactmethods['phone']            = $muserdata['userphone'];
            $contactmethods['phone_2']          = '';
            $contactmethods['shop']             = '';
            $contactmethods['support_name']     = '';
            $contactmethods['twitter']          = '';
            $contactmethods['facebook']         = '';    
            $contactmethods['googleplus']       = '';
            $contactmethods['yahoo']            = '';
            $contactmethods['skype']            = '';
            $contactmethods['address_info_address']            = $muserdata['useraddress'];
            $contactmethods['address_info_city']               = $muserdata['usercitie'];
            $contactmethods['address_info_district']           = $muserdata['userdistrict'];
            foreach ($contactmethods as $key=>$value) 
            {
                if($value)
                    update_user_meta($user_id,$key, trim($value));
            }

            // message register.
            $subject = 'Hoàn tất đăng ký thành viên.';
            $sento   = $user_email;
            $tempemail->email_template_send($sento,$subject,$tempemail->email_template_register($muserdata));
            $messages = "success_register";   
        }
        else
            $messages = "Đăng ký thất bại";
        
        return $messages;
    }
    
    // process when user book order
    public function member_process_user_when_order($mydata)
    {
        $userid ='';
        if($this->member_check_login())  // login when book order
        {
            $userid = $this->userId;
        }
        else // book order and not register
        {
            /*
            $memail = $mydata['_memail'];
            if(email_exists($memail))  // email exitst
            {
                $muserdata = get_user_by('email', $memail);
                $userid = $muserdata->ID;
            }
            else
            {
                $userid = $this->user_register_process($mydata);                
            }             
            */
            $userid = -1;
        }
        
        return $userid;
    }
    
    public function member_insert_new_member($memberdata)
    {
        global $wpdb;
        $wpdb->insert($this->_table, $memberdata);
        $member_id = $wpdb->insert_id;  // member id
        
        return $member_id;
    }
    
    public function member_install()
    {        
        global $wpdb;
        if($wpdb->get_var("SHOW TABLES LIKE '$this->_table'") != $this->_table)
	{
		$wpdb->query("CREATE TABLE {$this->_table}
		(			
			ID  mediumint(10) 		AUTO_INCREMENT PRIMARY KEY ,	
			userFullname			VARCHAR(255) NULL,		
			userEmail			VARCHAR(255) NULL,
                        userPhone			VARCHAR(255) NULL,
                        userAddress			VARCHAR(255) NULL,
                        userDistrict			VARCHAR(255) NULL,
                        userCities			VARCHAR(100) NULL,
                        userRegister			VARCHAR(50) NULL,
                        orderId                         VARCHAR(50) NULL,
                        date    			DATE NULL
		)ENGINE=MyISAM DEFAULT CHARSET=utf8");
	}
    }
}

$member = new member();
//print_r($member->userData);
// install data
####$member->member_install();