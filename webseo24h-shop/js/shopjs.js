/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// load widget shopping icon data
function shopjs_loadding_data_shopping_icon()
{
    var mydata = {"action":"ajax_act_loadding_data_shopping_icon"};
    var myreturn = 0;
    var holdResult = '#hold-shop-cart-icon-number';
    public_process_ajax_send_data(mydata,myreturn,holdResult);
}

function shopjs_get_all_shopping_form()
{
    
}

function shopjs_thanks_you_send_order()
{
    var thanks = '';
    
    thanks += '<div style="float: left; padding: 1%; width: 98%;">';
            thanks += '<div class="main-right-head">';
                thanks += '<span>Thanks you for send contact us</span>';
            thanks += '</div>';
    thanks += '</div>';

    thanks += '<div class="detail-content">';
        thanks += '<p style="font-size: 130%; color: #c21b15; margin-bottom: 10px;">';
            thanks += 'Your order is being processed our,Our staff will contact you as soon as possible.';
        thanks += '</p>';
        thanks += '<p style="font-size: 130%; color: #c21b15;">';
            thanks += 'Please Call: (+1 678 793 5452) - Go to <a style="color: #003DAD;font-size: 13px;" href="'+ mytheme_urls.url +'">Home page.</a>';
        thanks += '</p>';
    thanks += '</div>';
    
    return thanks;
}
/******** Validate input form function ********/


function valid_elementName(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
    }
}

function valid_elementEmail(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');        
    }
    else
    {
        if(isValidEmailAddress(elementVal))
        {
            $(e).next('span').remove();
            $(e).css('border-color','');            
        }
        else
        {            
            $(e).next('span').remove();
            $(e).after("<span class='error'>*</span>");
            $(e).css('border-color','#ff0000');            
        }
    }
}
function valid_elementPhone(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
        return false;
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
        return true
    }
}

function valid_elementAddress(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
    }
}

function valid_elementCities(e,elementVal,elementName)
{
    
}

function valid_elementDistricts(e,elementVal,elementName)
{
    $('#' + elementName).html(db_default_select_districts(elementVal,'','elementName','elementName','Chọn'));
}


// return
function get_valid_elementName(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
        return 'name';
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
        return ''
    }
}

function get_valid_elementEmail(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');        
        return 'email';
    }
    else
    {
        if(isValidEmailAddress(elementVal))
        {
            $(e).next('span').remove();
            $(e).css('border-color','');            
            return '';
        }
        else
        {            
            $(e).next('span').remove();
            $(e).after("<span class='error'>*</span>");
            $(e).css('border-color','#ff0000');   
            return 'email';
        }
    }
}
function get_valid_elementPhone(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
        return 'phone';
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
        return '';
    }
}

function get_valid_elementAddress(e,elementVal,elementName)
{
    if(elementVal.length<5 || elementVal.length>150)
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>*</span>");
        $(e).css('border-color','#ff0000');
        return 'address';
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
        return '';
    }
}

function get_valid_elementCities(e,elementVal,elementName)
{
    //alert(elementVal);
    if(elementVal!='0')
    {
        $(e).next('span').remove();
        $(e).after("<span class='error'>Chọn tỉnh/Thành phố</span>");
        $(e).css('border-color','#ff0000');
        return false;
    }
    else
    {
        $(e).next('span').remove();
        $(e).css('border-color','');
        return true
    }
    
    public_process_change_info_shop();
    return true;
}

function get_valid_elementDistricts(e,elementVal,elementName)
{
    public_process_change_info_shop();
    return true;
}



function valid_elementCheckbox(elementName)
{    
    var im_agree = $('input[name=' + elementName + ']:checked').val();  // chon dia chi giao hang
    
    if(im_agree=='agree')
    {
        return true;
    }
    else
    {
        $('input[name=' + elementName + ']').focus();
        return false;
    }
}

function valid_elementFormInput()
{
    var received_address = $('#received_address').is(":checked"); 
    var mvalid = '';
    
    if(received_address)
    {
       var this_form = new Array('fullname_this_check','email_this_check','address_this_check');
       var other_form = new Array('fullname_other_check','email_other_check','phone_other_check','address_other_check');
       var second =  $.merge(this_form, other_form);
       
        $.each(second, function( index, value ) 
        {
            var melementVal = $("#" + value).val();
            var melementRel = $("#" + value).attr('rel');
            //valid_element(this,melementVal,melementRel);
            mvalid += get_valid_element("#" + value, melementVal, melementRel);
        });
    }
    else
    {
        var this_form = new Array('fullname_this_check','email_this_check','address_this_check');
       
        $.each(this_form, function( index, value ) 
        {
            var melementVal = $("#" + value).val();
            var melementRel = $("#" + value).attr('rel');
            //valid_element(this,melementVal,melementRel);
            mvalid += get_valid_element("#" + value,melementVal,melementRel);
        });
    }
    
    if(mvalid=='')
        return true
    return false;    
}

function valid_elementCitiesDistricts()
{
    var mflags = '';
    var received_address = $('#received_address').is(":checked");    
    if(received_address)
    {
        mflags += process_valid_elementCitiesDistricts('cities_this_check','districts_this_check')
        mflags += process_valid_elementCitiesDistricts('cities_other_check','districts_other_check')        
    }
    else
    {
        mflags += process_valid_elementCitiesDistricts('cities_this_check','districts_this_check');
    }
    
    if(mflags=='')
        return true;
    return false;
}

function process_valid_elementCitiesDistricts(cities,districts) /** #cities,#districts **/
{
    var mtamp = '';
    var thiscities = $("#" + cities).val();
    var thisdistricts = $("#" + districts).val();           
    if(thiscities!='0')
    {
        $('#' + cities).next('span').remove();
        $('#' + cities).css('border-color','');
        mtamp += '';
    }
    else
    {
        $('#' + cities).next('span').remove();
        $('#' + cities).after("<span class='error'>*</span>");
        $('#' + cities).css('border-color','#ff0000');
        mtamp += 'cities';
    }
    
    if(thisdistricts)
    {
        if(Districts_A[thiscities])
        {         
            if(thisdistricts=='0')
            {
                $('#' + districts).next('span').remove();
                $('#' + districts).after("<span class='error'>*</span>");
                $('#' + districts).css('border-color','#ff0000');
                mtamp += 'districts';
            }
            else
            {
                $('#' + districts).next('span').remove();
                $('#' + districts).css('border-color','');
                mtamp += '';
            }
            
        }
    }
    else
    {
        $('#' + districts).next('span').remove();
        $('#' + districts).css('border-color','');
        mtamp += '';
    }
    return mtamp;
}

function process_valid_elementDateMonthYear(_date,_month,_year)
{
    var mtamp = '';
    var mdate = $("#" + _date).val();
    var mmonth = $("#" + _month).val();
    var myear = $("#" + _year).val();
    
    if(mdate=='0')
    {
        //$('#' + _date).next('span').remove();
        //$('#' + _date).after("<span class='error'>*</span>");
        $('#' + _date).css('border-color','#ff0000');
        mtamp += 'date';
    }
    else
    {
        //$('#' + _date).next('span').remove();
        $('#' + _date).css('border-color','');
        mtamp += '';
    }
    
    if(mmonth=='0')
    {
        //$('#' + _month).next('span').remove();
        //$('#' + _month).after("<span class='error'>*</span>");
        $('#' + _month).css('border-color','#ff0000');
        mtamp += 'month';
    }
    else
    {
        //$('#' + _month).next('span').remove();
        $('#' + _month).css('border-color','');
        mtamp += '';
    }
    
    if(myear=='0')
    {
        //$('#' + _year).next('span').remove();
        //$('#' + _year).after("<span class='error'>*</span>");
        $('#' + _year).css('border-color','#ff0000');
        mtamp += 'year';
    }
    else
    {
        //$('#' + _year).next('span').remove();
        $('#' + _year).css('border-color','');
        mtamp += '';
    }
}

function valid_elementRadio(elementName)
{
    var payment_method = $('input[name=' + elementName + ']:checked').val();  // chon dia chi giao hang
                
    if(payment_method=='COD' || payment_method=='CHUYENKHOAN'){
        return true;
    }
    else
    {
        $('input[name=' + elementName + ']')[0].focus();
        return false;
    }
}

function valid_elementRadioUser(elementName,error_label)
{
    var usersex = $('input[name=' + elementName + ']:checked').val();  // chon dia chi giao hang
    
    //alert(usersex);
    
    if(usersex=='NAM' || usersex=='NU' || usersex=='KHAC'){
        $('#' + error_label).css("color","");
        return true;
    }
    else
    {
        $('#' + error_label).css("color","#ff0000");
        $('input[name=' + elementName + ']')[0].focus();
        return false;
    }
}

function valid_element(e,elementVal,elementName)
{
    switch(elementName) 
    {
        case "validName":
            valid_elementName(e,elementVal,elementName);
            break;
        case "validEmail":
            valid_elementEmail(e,elementVal,elementName);
            break;
        case "validPhone":
            valid_elementPhone(e,elementVal,elementName);
            break;
        case "validAddress":
            valid_elementAddress(e,elementVal,elementName);
            break;
        case "districts_this_check":
            valid_elementDistricts(e,elementVal,elementName);
            break;
        case "districts_other_check":
            valid_elementDistricts(e,elementVal,elementName);
            break;
    }
}



jQuery(function($){
    
    //genaral cities
    var this_cities =   'cities_this_check_hidden';
    var other_cities =   'cities_other_check_hidden';    
    
    $("#cities_this_check").html(db_default_select_cities(this_cities,'cities_this_check','cities_this_check','Tỉnh/Thành phố'));
    $("#cities_other_check").html(db_default_select_cities(other_cities,'cities_other_check','cities_other_check','Tỉnh/Thành phố'));
    
    //var cities = '';
    // $("#districts_this_check").html(db_default_select_districts(cities,''));
    
    
    /******** Validate input form ********/
    var inclass = '.ipt_lfdn';
    var inclassselect = '.s_ttp';
    
    $(inclass).focusout(function(){        
        var melementVal = $(this).val();
        var melementRel = $(this).attr('rel');
        valid_element(this,melementVal,melementRel);              
    });
    
    
    $(inclassselect).change(function(){        
        var melementVal = $(this).val();        
        var melementRel = $(this).attr('rel'); 
        valid_element(this,melementVal,melementRel);  
        public_process_change_info_shop();
    });
    
    
    // received other address infomation
    $('#received_address').on('change',function(){
        var received_address = $(this).is(":checked");        
        db_process_received_address(received_address);
        public_process_change_info_shop();
    });
    
    // Select payment method
    $(".payment_method").click(function()
    {     
        public_process_change_info_shop();
        //.$("#hold-loading-shop-change-info").html("fadsfasf");
    });
    
    // use voucher click btn
    $("#use_voucher_code").on('click',function(){        
        public_process_change_info_shop();
    });
    
    // fill voucher code
    $('#voucher_code').on('keydown',function(){	        
        public_process_check_email_for_voucher_code();    
    });
    
    /***** btn book this order ******/    
    $("#btn_book_this_order").on('click', function(e){
        e.preventDefault();
        console.log('=================')
        var mvalid = '';       
         if(valid_elementCheckbox('i_agree'))
         { 
             $('#checkbox_i_agree').next('span').remove();

            // check payment method 
            if(valid_elementRadio('payment_method')){
                $('#payment_method_error').html("");
               if(valid_elementFormInput()){
                   if(valid_elementCitiesDistricts()){
                        //var mydata = {"action":"ajax_act_shopping_cart_btn_complete"};
                        var mydata = public_get_mydata();
                        mydata.action = "ajax_act_shopping_cart_btn_complete";                
                        var myreturn = 0;
                        var holdResult = '#shopping-cart-hold-success';
                        var popup = 0;
                        public_process_ajax_send_data_complete(mydata,myreturn,holdResult,popup);                
                        $('#shopping-cart-hold-success').html(db_success_order());
                    }
               }               
            }
            else {
                $('#payment_method_error').html("<span class='error'>Chọn phương thức thanh toán</span>");
                $('#payment_method').focus();
            }
        }
        else
        {
            $('#checkbox_i_agree').next('span').remove();
            $('#checkbox_i_agree').after("<span class='error'>Click 'Tôi đồng ý' và tiếp tục</span>");
        }        
         
    });
    
    
    // shop view
    $("#view_gh_shop").on('click',function(){
        
        var mydata = {"action":"ajax_act_view_gh_shop"};
        var myreturn = 0;
        var holdResult = '#ws24h_background_popup_message';
        var popup = 1;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);
        
    });
    
    
    /**** Process Add product to cart session ****/
    $('.btn_addcard').bind('click',function()
    {   
    
        var productid = $(this).attr('rel');    
        $('#shop-add-to-cart-' + productid + ' input').attr('disabled','disabled').css("opacity","0.4");        
        
        var mydata = {
            "action":"ajax_act_add_to_cart",
            "productId":productid
        };
        var myreturn = 0;
        var holdResult = '#ws24h_background_popup_message';
        var popup = 1;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);
        
    });
    
    // change select items
    $('body').on('change', 'select.shopping-cart-item-count',function(e){
        e.preventDefault();
        var productCount = $(this).val();        
        var productid = $(this).attr('rel');        
        var mydata = {"action":"ajax_act_shopping_cart_update_item","productId":productid,"productCount":productCount};
        var myreturn = 0;
        var holdResult = '#page-content-shopping-cart';  // load again content shopping cart after delete item
        var popup = '';
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup); 
    });
    
    // delete items in shopping cart
    $('label.shopping-cart-item-del').on('click',function(){
        
        var productid = $(this).attr('rel');        
        var mydata = {"action":"ajax_act_shopping_cart_delete_item","productId":productid};
        var myreturn = 0;
        var holdResult = '#page-content-shopping-cart';  // load again content shopping cart after delete item
        var popup = '';
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);        
        //shopjs_loadding_data_shopping_icon();
    });
    
    
    // checkout shopping cart  step1 continue
    $('#go-to-checkout').on('click',function(){
        
        var holdResult = '#page-checkout-shopping-cart';          
        var mydata = {"action":"ajax_act_shopping_cart_load_continue"};
        var myreturn = 0;   
        var popup = 1;
        public_process_ajax_send_data(mydata,myreturn,holdResult,popup);  
    });
    
    // mshopping-payment click change
    $('.mshopping-payment').on('click',function(){
        var holdResult = '#checkout-load-form-paypal';
        var mval = $(this).val();
        if(mval=='cod')
        {
            var mbutton = '<input class="go-to-checkout" type="button" id="mshopping-btn-complete" value="Complete" />';
            $(holdResult).html(mbutton);
        }
        else if(mval=='paypal')
        {    
            var mbutton = '';
            
                mbutton += '<form name="paypal_form" action="" method="post" class="checkout-load-form-paypal">';
                mbutton += '<div class="mshopping-btn-complete-fix">';
                mbutton += '<input class="go-to-checkout" type="button" id="mshopping-btn-complete" value="Complete" />';
                mbutton += '<img  alt="" src="' + mytheme_urls.shopurl + '/paypal-buy-now-button.jpg" />';
                mbutton += '</div>';
                mbutton += '</form>';
            
            $(holdResult).html(mbutton);                    
        }    
    });
    
    // Complete shopping cart step2
    $('#mshopping-btn-complete').on('click',function(){
        
        
        var holdResult = '#page-checkout-shopping-cart'; 
        var popup = 1;
        var _payment = $('input[name=mshopping-payment]:checked').val();
        
        if(_payment=='cod' || _payment=='paypal')
        {
            var mydata = {
                "action":"ajax_act_shopping_cart_btn_complete",
                "_mcountry":$('#mshopping-country').val(),
                "_mfirstname":$('#mshopping-first-name').val(),
                "_mlastname":$('#mshopping-last-name').val(),
                "_maddress1":$('#mshopping-address-1').val(),
                "_maddress2":$('#mshopping-address-2').val(),
                "_mcitytown":$('#mshopping-city-town').val(),
                "_mstate":$('#mshopping-state').val(),
                "_mzipcode":$('#mshopping-zip-code').val(),
                "_mphone":$('#mshopping-phone-number').val(),
                "_memail":$('#mshopping-email').val(),
                "_mnote":$('#mshopping-note').val(),
                "_destroy":1,
                "_mpayment":_payment
            };
            
            // create class instance
            var myCheck = new jsCheck();

            // call method
            if(!myCheck._isCheckForm())
            {                   
                $("#checkout-form-error").css({"background-color":"","color":""});
                if(_payment=='cod')
                {                       
                    var myreturn = 0;           
                    var popup = '';
                    public_process_ajax_send_data(mydata,myreturn,holdResult,popup);   
                                       
                   $(holdResult).html(shopjs_thanks_you_send_order());
                   //shopjs_loadding_data_shopping_icon();
                }
                else if(_payment=='paypal')
                {                    
                    var myreturn = 0;    
                    
                    // su ly lưu data
                    mydata._destroy = 0; 
                    var popup = '';
                    holdResult = '#checkout-load-form-paypal1';
                    public_process_ajax_send_data(mydata,myreturn,holdResult,popup);   
                    
                    // goi button pay pal and load
                    popup = 1;                   
                    holdResult = '#checkout-load-form-paypal';
                    mydata._destroy = 0; 
                    mydata.action = 'ajax_act_shopping_cart_paypal_complete';                    
                    public_process_ajax_send_data(mydata,myreturn,holdResult,popup);                                         
                    //return true;
                }
                return true;
            }
            else
            {
                $("#checkout-form-error").css({"background-color":myCheck.errorBg,"color":myCheck.errorText,"padding-left":"1%","width":"98%"});
                return false;
            }            
        }
        else
        {
            alert("Please choosen payment method?");
        }
        
        
    });
    
    
    // load widget shopping icon data
    //shopjs_loadding_data_shopping_icon();
});

