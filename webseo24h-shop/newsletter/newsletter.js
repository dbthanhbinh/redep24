/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function public_remove_popup_newsletter()
{
   $("#ws24h_background_popup_message").html(""); 
}

function public_add_popup_300(holdResult,msg)
{
    var html = "";
    html += "<div class='site-block-popup-bg' id='site-block-popup-bg' onclick='db_remove_popup_html('');' style='background:#010101; opacity:0.3; position:fixed; width:100%; top:0; left:0; height:100%; z-index:8888;'> </div>";

    var mwidth = 300;
    var block_w = $('#ws24h_background_popup_message').width();
    var block_m = block_w - mwidth;
    var block_pos = parseInt(block_m/2);

    html += "<div class='site-block-popup-content popup_300_popup_content' id='site-block-popup-content' style='position:absolute; width:"+mwidth+"px; top:15%; left:" + block_pos + "px; min-height:100px; opacity:1; z-index:9999;'>\n\
             <div class='popup_300_title'> Thông báo! </div>\n\
             <div class='popup_300_content'> " + msg + " </div>\n\
             <div class='popupclosebtn'> <a title='Close popup' onclick='public_remove_popup_newsletter();' href='#'> </a> </div> </div> ";       

    $(holdResult).html(html);
    $('html, body').animate({ scrollTop: 0 }, 'slow');
}



$("#act_newsletter_btn").live('click',function(){
    
    var newsletter = $('#newsletter_input').val();
    
    if(newsletter=="Email của bạn..." || newsletter=="")
    {
        var holdResult = '#ws24h_background_popup_message';
        var msg = 'Nhập email của bạn!';
        public_add_popup_300(holdResult,msg);
        return false;
    }
    else if(!isValidEmailAddress(newsletter))
    {
        var holdResult = '#ws24h_background_popup_message';
        var msg = 'Email không hợp lệ';
        public_add_popup_300(holdResult,msg);
        return false;
    }
    else
    {
        //Ajax call
        $.ajax({
                type: 'POST',
                url	:  mytheme_urls.ajaxurl,				
                data	: 
                        {
                                "action":"newsletter_ajax_register",
                                "newsletter":newsletter
                        },
                beforeSend: function(){
                        
                },				
                success:function(msg){	

                    var holdResult = '#ws24h_background_popup_message';                   
                    public_add_popup_300(holdResult,msg);
                    return false;

                }
                ,error: function(){
                                console.log("error");
                }

        });
    }    
});


