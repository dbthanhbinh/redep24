<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// ++++++++++++++++++++++++++ loadding process member process ++++++++++++++++++
function ajax_load_fc_ajax_act_member_process()
{
    $memberId = $_REQUEST['memberId'];
    if($memberId=='register')
        print_r(json_encode(member_layout_register_form()));            
    else if($memberId=='logined')
        print_r(json_encode(member_layout_login_form())); 
    else if($memberId=='lostpass')
        print_r(json_encode(member_layout_change_password_form())); 
    
    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_member_process', 'ajax_load_fc_ajax_act_member_process' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_member_process', 'ajax_load_fc_ajax_act_member_process' ); // ajax for not logged in users


// ++++++++++++++++++++++++++ loadding process member action btn login/register ++++++++++++++++++
function ajax_load_fc_ajax_act_member_login_process()
{
    global $member;
    $messages = '';
    $member_login_email = $_REQUEST['member_login_email'];
    $member_login_pass  = $_REQUEST['member_login_pass'];
    
    if(is_email($member_login_email))
    {
        if(email_exists($member_login_email))
        {
           $messages = $member->member_login_user($member_login_email,$member_login_pass);
        }
        else
        {
            $messages = '<span style="color:#ff0000;">Email không tồn tại.</span>';
        }
    }
    else
        $messages = '<span style="color:#ff0000;">Email sai định dạng.</span>';
    
    
    print_r(json_encode($messages)); 
    
    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_member_login_process', 'ajax_load_fc_ajax_act_member_login_process' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_member_login_process', 'ajax_load_fc_ajax_act_member_login_process' ); // ajax for not logged in users

// register
function ajax_load_fc_ajax_act_member_register_process()
{
    global $member;
    $messages = '';
    $member_login_email = $_REQUEST['useremail'];
    $member_login_user  = $_REQUEST['username'];
    $member_login_year  = $_REQUEST['useryear'];
    
    if(is_email($member_login_email))
    {
        if(email_exists($member_login_email)) // kiem email
        {
            $messages = '<span style="color:#ff0000;">Email đã được sử dụng.</span>';
        }
        else
        {
            if(username_exists($member_login_user))
            {
                $messages = '<span>Tên đăng nhập đã sử dụng</span>';
            }
            else
            {
                $currentY = date('Y');
                if($currentY-$member_login_year>=15)
                {
                    // code process here ok                    
                    $muserdata = array();
                    $muserdata['fullname']		= esc_attr($_REQUEST['fullname']);
                    $muserdata['username']              = esc_attr($_REQUEST['username']);
                    $muserdata['useremail']		= esc_attr($_REQUEST['useremail']);
                    
                    $muserdata['userdate']		= esc_attr($_REQUEST['userdate']);
                    $muserdata['usermonth']		= esc_attr($_REQUEST['usermonth']);
                    $muserdata['useryear']		= esc_attr($_REQUEST['useryear']);
                    $muserdata['usersex']		= esc_attr($_REQUEST['usersex']);
                    
                    $muserdata['userphone']             = esc_attr($_REQUEST['userphone']);                                        
                    $muserdata['useraddress']		= esc_attr($_REQUEST['useraddress']);
                    $muserdata['usercitie']		= esc_attr($_REQUEST['usercitie']);
                    $muserdata['userdistrict']		= esc_attr($_REQUEST['userdistrict']);
                    $muserdata['userregister']		= 'member_register';
                    ///
                    $messages = $member->member_register_user($muserdata);  // register insert data     
                    $messages = "success_register";
                }
                else
                {
                     $messages = '<span>Yêu cầu tuổi>=15</span>';
                }
            }            
        }
    }
    else
        $messages = '<span>Email sai định dạng.</span>';
    
    
    print_r(json_encode($messages)); 
    
    die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_member_register_process', 'ajax_load_fc_ajax_act_member_register_process' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_member_register_process', 'ajax_load_fc_ajax_act_member_register_process' ); // ajax for not logged in users



function member_scripts() {
    echo '<script src="'.  get_template_directory_uri().'/webseo24h-shop/member/js/memberjs.js" type="text/javascript"></script>';
}
add_action( 'wp_footer', 'member_scripts' );