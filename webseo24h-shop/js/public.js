/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * var mydata = {"action":"delete_number_to_cart","productID":productID};	
 */

var Districts_A = [];
Districts_A['TP HỒ CHÍ MINH'] = ['Quận 1','Quận 2','Quận 3','Quận 4','Quận 5','Quận 6','Quận 7','Quận 8','Quận 9','Quận 10','Quận 11','Quận 12','Phú Nhuận','Gò Vấp','Tân Bình','Bình Thạnh','Tân Phú','Bình Tân','Thủ Đức','Hốc Môn','Bình Chánh','Nhà Bè']; 
Districts_A['HÀ NỘI'] = ['Hai Bà Trưng','Hoàn Kiếm','Từ liêm']; 

var jshcm = new Array('Quận 1','Quận 2','Quận 3','Quận 4','Quận 5','Quận 6','Quận 7','Quận 8','Quận 9','Quận 10','Quận 11','Quận 12','Phú Nhuận','Gò Vấp','Tân Bình','Bình Thạnh','Tân Phú','Bình Tân','Thủ Đức','Hốc Môn','Bình Chánh','Nhà Bè');
var jscities = new Array(
'TP HỒ CHÍ MINH',
'HÀ NỘI',
'Lào Cai',
'Yên Bái',
'Điện Biên',
'Hòa Bình',
'Lai Châu',
'Sơn La',
'Hà Giang',
'Cao Bằng',
'Bắc Kạn',
'Lạng Sơn',
'Tuyên Quang',
'Thái Nguyên',
'Phú Thọ',
'Bắc Giang',
'Quảng Ninh',
'Bắc Ninh',
'Hà Nam',
'Hải Dương',
'Hải Phòng',
'Hưng Yên',
'Nam Định',
'Ninh Bình',
'Thái Bình',
'Vĩnh Phúc',
'Thanh Hóa',
'Nghệ An',
'Hà Tĩnh',
'Quảng Bình',
'Quảng Trị',
'Thừa Thiên-Huế',
'Đà Nẵng',
'Quảng Nam',
'Quảng Ngãi',
'Bình Định',
'Phú Yên',
'Khánh Hòa',
'Ninh Thuận',
'Bình Thuận',
'Kon Tum',
'Gia Lai',
'Dak Lak',
'Dak Nong',
'Lâm Đồng',
'Bình Phước',
'Bình Dương',
'Đồng Nai',
'Tây Ninh',
'Bà Rịa-Vũng Tàu',
'Long An',
'Đồng Tháp',
'Tiền Giang',
'An Giang',
'Bến Tre',
'Vĩnh Long',
'Kiên Giang',
'Hậu Giang',
'Trà Vinh',
'Sóc Trăng',
'Bạc Liêu',
'Cà Mau',
'Cần Thơ'
);

jscities.sort();

function db_default_select_cities(current,gclass,gid,label)
{
	var html = '';
	html += '<select class="' + gclass + '" id="' + gid + '" name="' + gid + '">';
	html += '	<option selected="selected" value="0"> ' + label + ' </option>';

	for ( var i = 0; i < jscities.length; i = i + 1 ) 
	{	
		if(current==jscities[i])
			html += '<option selected="selected" value="' + jscities[i] + '"> ' + jscities[i] + ' </option>';
		else			
			html += '<option value="' + jscities[i] + '"> ' + jscities[i] + ' </option>';
	}
	html += '</select>';
	return html;
}

function db_default_select_districts(cities,current,gclass,gid,label)
{
	var html = '';
	
        if(Districts_A[cities])
        {
            html += '<select class="' + gclass + '" id="' + gid + '" name="' + gid + '">';
            html += '	<option selected="selected" value="0"> ' + label + ' </option>';

            for ( var i = 0; i < Districts_A[cities].length; i = i + 1 ) 
            {	
                    if(current==Districts_A[cities][i])
                            html += '<option selected="selected" value="' + Districts_A[cities][i] + '"> ' + Districts_A[cities][i] + ' </option>';
                    else			
                            html += '<option value="' + Districts_A[cities][i] + '"> ' + Districts_A[cities][i] + ' </option>';
            }


            html += '</select>';
        }
        else
        {
            html = '<select class="' + gclass + '" id="' + gid + '" name="' + gid + '">';
            html += '	<option selected="selected" value="-1"> Không ' + label + ' </option>';
            
            html += '</select>';
        }
	return html;
}

function db_change_district_input_cities(cities,current_dis)
{
    $("#member_register_userdistrict").html(db_default_select_districts(cities,current_dis,"district_select_value s_ttp","district_select_value","Quận/huyện"));
}

function db_success_order()
{
    var htm = '';
    htm += '<div class="block_rfdn" style="padding-right:20px;"><h4 class="title_lfdn">Đặt mua hàng thành công!</h4>';
    htm += '<div class="dat_hang_thanh_cong_mess">'
    htm += '<img alt="" src="' + mytheme_urls.sourceurl + 'dat_hang_thanh_cong1.jpg" />';
    htm += '<p><strong>Cảm ơn bạn đã đặt hàng thành công!Sẽ có nhân viên của Redep24.com liên hệ với quý vị trong thời gian sớm nhất. </strong><br/></p>';
    htm += '<p><strong>Lưu ý : </strong> Quý khách vui lòng truy cập email đăng ký mua hàng để xác thực thông tin chi tiết đơn hàng của mình.</p>'
    htm += '<p style="float:left;"><strong> Trân trọng cảm ơn. </strong> </p>';
    htm += '</div>';
    htm += '</div>';
    return htm;
}

/// Email valid
function isValidEmailAddress(email) 
{
	var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	return pattern.test(email);
}

function db_process_received_address(received_address)
{
   $('#other_check').toggle();
}

function public_get_mydata()
{
    var member_check_login_order = $('#member_check_login_order').val();
    var this_name            = '';
    var this_email           = '';
    var this_phone           = '';
    var this_address         = '';
    var this_cities          = '';
    var this_districts       = '';
    
    if(member_check_login_order)
    {
        // this check 
        this_name            = $('#fullname_this_check').val();
        this_email           = $('#email_this_check').val();
        this_phone           = $('#phone_this_check').val();
        this_address         = $('#address_this_check').val();
        this_cities          = $('#cities_this_check').val();
        this_districts       = $('#district_this_check').val();
    }
    else
    {    
        // this check 
        this_name            = $('#fullname_this_check').val();
        this_email           = $('#email_this_check').val();
        this_phone           = $('#phone_this_check').val();
        this_address         = $('#address_this_check').val();
        this_cities          = $('#cities_this_check').val();
        this_districts       = $('#district_this_check').val();
    }
    
    // received address
    //var received_address     = $('#fullname_this_check').val();
    var received_address       =  $('#received_address').is(":checked");   // true/false
    
    // other check
    var other_name            = this_name;
    var other_email           = this_email;
    var other_phone           = this_phone;
    var other_address         = this_address;
    var other_cities          = this_cities;
    var other_districts       = this_districts;
    
    if(received_address)
    {
        other_name            = $('#fullname_other_check').val();
        other_email           = $('#email_other_check').val();
        other_phone           = $('#phone_other_check').val();
        other_address         = $('#phone_other_check').val();
        other_cities          = $('#cities_other_check').val();
        other_districts       = $('#district_other_check').val();
    }
    
    // payment
    
    var payment_method        = $('input[name=payment_method]:checked').val(); 
    var text_shopping_note    = $('#text_shoping_note').val();
    
    var mydata = {
        "action":"ajax_act_shopping_cart_change_info_shop",
        "order_fullname":this_name,
        "order_email":this_email,
        "order_phone":this_phone,
        "order_address":this_address,
        "order_cities":this_cities,
        "order_district":this_districts,
        "order_check_this":received_address,
        "received_fullname":other_name,
        "received_email":other_email,
        "received_phone":other_phone,
        "received_address":other_address,
        "received_cities":other_cities,
        "received_district":other_districts,
        "shopPayment":payment_method,
        "shopNote":text_shopping_note
    };
    return mydata;
}

function public_process_change_info_shop()
{
    var mydata = public_get_mydata(); 
    public_process_ajax_change_info_shop(mydata);
}

// update shop in fo when chang info received
function public_process_ajax_change_info_shop(mydata)
{   
    $.ajax({
		type: "POST",
		url		:  mytheme_urls.ajaxurl,	
		dataType:"json",
		data	: mydata,
		beforeSend: function(){                        
                    $('#hold_shop_reload_total_info').html("Đang xử lý...");		
                 },				
		success:function(msg){  
                    $('#hold_shop_reload_total_info').html(msg);
		}
		,error: function(){
                    console.log("error");
		}				
	});	
}

function public_process_check_email_for_voucher_code()
{
    var melementVal = $("#email_this_check").val();
    var melementRel = $("#email_this_check").attr('rel');
    valid_element("#email_this_check",melementVal,melementRel); 
    $("#email_this_check").focus();
}

function goBack() {
    window.history.back();
}

//************* Add Show Popup ***********//************************************//*******************************//
function public_add_popup_html(holdResult,popup,productId)
{
    if(popup==1) /*** Mini popup ***/
    {
        var html = "";
        html += "<div class='site-block-popup-bg' id='site-block-popup-bg' onclick='db_remove_popup_html('" + productId + "');' style='background:#010101; opacity:0.3; position:fixed; width:100%; top:0; left:0; height:100%; z-index:8888;'> </div>";
        
        var block_w = $('#ws24h_background_popup_message').width();
        var block_m = block_w - 900;
        var block_pos = parseInt(block_m/2);
        
        html += "<div class='site-block-popup-content' id='site-block-popup-content' style='position:absolute; width:980px; top:10%; left:" + block_pos + "px; min-height:100px; height:auto; display:inline-flex; background:none; opacity:1; z-index:9999;'> <span class='shop-top-loading-span'>Chờ xử lý...</span> <img class='shop-top-loading' alt='' src='" + mytheme_urls.shopurl + "/live.gif' /> </div> ";       
        
        $(holdResult).html(html);
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    }
    if(popup==2) /*** Register popup and Login Popup ***/
    {
        var html = "";
        html += "<div class='site-block-popup-bg' id='site-block-popup-bg' onclick='db_remove_popup_html(" + productId + ");' style='background:#010101; opacity:0.3; position:fixed; width:100%; top:0; left:0; height:100%; z-index:8888;'> </div>";
        
        var block_w = $('#ws24h_background_popup_message').width();
        var block_m = block_w - 500;
        var block_pos = parseInt(block_m/2);
        
        html += "<div class='site-block-popup-content' id='site-block-popup-content' style='position:absolute; width:500px; top:10%; left:" + block_pos + "px; min-height:100px; height:auto; display:inline-flex; background:none; opacity:1; z-index:9999;'> <span class='shop-top-loading-span'>Chờ xử lý...</span> <img class='shop-top-loading' alt='' src='" + mytheme_urls.shopurl + "/live.gif' /> </div> ";       
        
        $(holdResult).html(html);
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    }
    else if(popup==10)
    {
        var html = "";
        html += "<div class='site-block-popup-bg' id='site-block-popup-bg' onclick='db_remove_popup_html(" + productId + ");' style='background:#010101; opacity:0.1; position:fixed; width:100%; top:0; left:0; height:100%; z-index:100;'> </div>";
        html += "<div class='site-block-popup-content' id='site-block-popup-content' style='position:absolute; width:100%; top:0; left:0; height:65px; display:inline-flex; background:none; opacity:0.6; z-index:110;'> <span class='shop-top-loading-span'>Chờ xử lý ...</span> <img class='shop-top-loading' alt='' src='" + mytheme_urls.shopurl + "/live.gif' /> </div> ";       
        $(holdResult).html(html);
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    }
    else
    {
        
    }
     
}

//************* Remove Show Popup ***********//
function public_remove_popup_html(popup)
{
    if(popup==1)
    {
        $("#site-block-popup").html("");
    }   
}

function db_remove_popup_html(productId)
{
    $('#ws24h_background_popup_message').html('');
    //$('#shop-add-to-cart-' + productId + ' input').prop("disabled", false).css("opacity","1");
    $('.btn_addcard').prop("disabled", false).css("opacity","1");
}

function public_show_popup_custom(msg,tamproductid)
{
    var popupclose = '<div class="popupclosebtn"> <a href="#" onclick="db_remove_popup_html(' + tamproductid + ');"> </a> </div>';
    msg += popupclose;
    $('#site-block-popup-content').html(msg);
}

function public_process_ajax_send_data(mydata,myreturn,holdResult,popup)
{   
    var tamproductid = mydata.productId;
    $.ajax({
		type: "POST",
		url		:  mytheme_urls.ajaxurl,	
		dataType:"json",			
		data	: mydata,
		beforeSend: function(){                                               
                    	public_add_popup_html(holdResult,popup,tamproductid);		
                 },				
		success:function(msg){                      
                    public_show_popup_custom(msg,tamproductid);  
                    
		}
		,error: function(){
                    console.log("error");
		}				
	});	
}

function public_process_ajax_send_data_complete(mydata,myreturn,holdResult,popup)
{
    $.ajax({
		type: "POST",
		url		:  mytheme_urls.ajaxurl,	
		dataType:"json",			
		data	: mydata,
		beforeSend: function(){
                    $(holdResult).html("Đang xử lý...");  	
                 },				
		success:function(msg){                    
                   ////$(holdResult).html(msg);                    
		}
		,error: function(){
                    console.log("error");
		}				
	});	
}

function public_process_ajax_send_data_member(mydata,myreturn,holdResult,popup)
{
    $.ajax({
		type: "POST",
		url		:  mytheme_urls.ajaxurl,	
		dataType:"json",			
		data	: mydata,
		beforeSend: function(){
                    $(holdResult).html("Đang xử lý...");
                    $('#member_register_btn').attr('disabled','disabled').css("opacity","0.4"); 
                 },				
		success:function(msg){                    
                   $(holdResult).html(msg);   
                   
                   if(mydata.processid=='process_register')
                   {
                       if(msg=='success_register')
                           window.location.href = myreturn;
                       else
                           $('#member_register_btn').attr('disabled','');
                   }
                   else
                   {
                        if(msg=='Đăng nhập thành công.')
                            location.reload();
                   }
		}
		,error: function(){
                    console.log("error");
		}				
	});	
}

function get_valid_element(e,elementVal,elementName)
{    
    //alert(elementName);
    var mflag = false;
    switch(elementName) 
    {    
        case "validName":
            mflag = get_valid_elementName(e,elementVal,elementName);
            break;
        case "validEmail":
            mflag = get_valid_elementEmail(e,elementVal,elementName);
            break;
        case "validPhone":
            mflag = get_valid_elementPhone(e,elementVal,elementName);
            break;
        case "validAddress":
            mflag = get_valid_elementAddress(e,elementVal,elementName);
            break;           
    }
    
    return mflag;
}

function get_valid_element_user(e,elementVal,elementName)
{    
    var mflag = false;
    switch(elementName) 
    {
        case "validName":
            mflag = get_valid_elementName(e,elementVal,elementName);
            break;
        case "validEmail":
            mflag = get_valid_elementEmail(e,elementVal,elementName);
            break;
        case "validPhone":
            mflag = get_valid_elementPhone(e,elementVal,elementName);
            break;
        case "validAddress":
            mflag = get_valid_elementAddress(e,elementVal,elementName);
            break; 
        case "districts_this_check":
            mflag = get_valid_elementCities(e,elementVal,elementName);
            break; 
        case "validDistricts":
            mflag = get_valid_elementDistricts(e,elementVal,elementName);
            break; 
    }
    
    return mflag;
}

