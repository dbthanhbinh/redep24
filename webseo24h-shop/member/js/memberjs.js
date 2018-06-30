/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function db_user_logined()
{
    var member_login_email = $('#member_login_email').val();
    var member_login_pass = $('#member_login_pass').val();

    var mydata = {"action":"ajax_act_member_login_process","member_login_email":member_login_email,"member_login_pass":member_login_pass};
    var myreturn = 0;
    var holdResult = '#member_processing_mess';
    var popup = '';
    public_process_ajax_send_data_member(mydata,myreturn,holdResult,popup);
}

function db_user_registed()
{
    var mflag = '';
    /*
    if(valid_elementFormInputUser())
    {
        mflag = ''
    }
    else
        mflag = 'Nhập thông tin';
    
    if(process_valid_elementDateMonthYear('date_select_value','month_select_value','year_select_value'))
    {
        mflag = ''
    }
    else
        mflag = 'Chọn ngày tháng';
    
    if(process_valid_elementCitiesDistricts('cities_select_value','district_select_value'))
    {
        mflag = ''
    }   
    else
        mflag = 'Chọn địa chỉ';
    
    if(valid_elementRadioUser('member_register_sex','error_sex'))
    {
        mflag = ''
    }
    else
        mflag = 'Chọn giới tính';
    */
    return mflag;
}

function db_user_register_info()
{
    var processid = 'process_register';
    var mydata = {
        "action":"ajax_act_member_register_process",
        "processid":processid,
        "fullname":$('#member_register_fullname').val(),
        "username":$('#member_register_username').val(),
        "useremail":$('#member_register_useremail').val(),
        "userdate":$('#date_select_value').val(),
        "usermonth":$('#month_select_value').val(),
        "useryear":$('#year_select_value').val(),
        "usersex":$('input[name=member_register_sex]:checked').val(),
        "userphone":$('#member_register_userphone').val(),
        "usercitie":$('#cities_select_value').val(),
        "userdistrict":$('#district_select_value').val(),
        "useraddress":$('#member_register_useraddress').val()
    }

    var myreturn = mytheme_urls.url + '/member';
    var holdResult = '#member_processing_mess';
    var popup = '';
    public_process_ajax_send_data_member(mydata,myreturn,holdResult,popup);
}

function valid_elementFormInputUser()
{
    var mvalid = '';
    
    var this_form = new Array('member_register_fullname','member_register_username','member_register_useremail','member_register_userphone','member_register_useraddress');
    //var other_form = new Array('fullname_other_check','email_other_check','phone_other_check','address_other_check');
    //var second =  $.merge(this_form,other_form);
    var second = this_form;
    
    $.each(second, function( index, value ) 
    {
         var melementVal = $("#" + value).val();
         var melementRel = $("#" + value).attr('rel');
         //valid_element(this,melementVal,melementRel);
         mvalid += get_valid_element("#" + value,melementVal,melementRel);
    });
    
    if(mvalid=='')
        return true
    return false;    
}

(function($){
    
    // register process form
    $('#member_register_act').live('click',function(){
        var memberId = 'register';    
        
        var mydata = {"action":"ajax_act_member_process","memberId":memberId};
        var myreturn = 0;
        var holdResult = '#ws24h_background_popup_message';
        var popup = 2;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);
        
    });
    
    // Login process form
    $('#member_login_act,#member_login_act1').live('click',function(){
        var memberId = 'logined';    
        
        var mydata = {"action":"ajax_act_member_process","memberId":memberId};
        var myreturn = 0;
        var holdResult = '#ws24h_background_popup_message';
        var popup = 2;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);
        
    });
    
    // Lost pass form
    $('#member_lostpass_act').live('click',function(){
        var memberId = 'lostpass';    
        
        var mydata = {"action":"ajax_act_member_process","memberId":memberId};
        var myreturn = 0;
        var holdResult = '#ws24h_background_popup_message';
        var popup = 2;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);
        
    });
    
    // Login form account
    $('#member_login_btn').live('click',function(){
        db_user_logined();
    });
    
    $("#member_login_email,#member_login_pass").live('keypress',function(){           
        if (event.keyCode == 13) {    
            db_user_logined();
        }
    }); 
    
    // register form account
    $('#member_register_btn').live('click',function(){        
        var mflag = db_user_registed(); //javascript process input
        if(mflag=='')
            db_user_register_info();
    });
    
});


