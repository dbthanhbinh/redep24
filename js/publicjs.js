function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function CommaFormatted(amount) {    
	var delimiter = ","; // replace comma if desired
	var a = amount.split('.',2)
	var d = a[1];
	var i = parseInt(a[0]);
	if(isNaN(i)) { return ''; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	var n = new String(i);
	var a = [];
	while(n.length > 3) {
		var nn = n.substr(n.length-3);
		a.unshift(nn);
		n = n.substr(0,n.length-3);
	}
	if(n.length > 0) { a.unshift(n); }
	n = a.join(delimiter);
	if(d.length < 1) { amount = n; }
	else { amount = n + '.' + d; }
	amount = minus + amount;
        
        alert("fasd" + amount);
	return amount;
}

function goBack() {
    window.history.go(-2)
}

function process_ajax_load_data_tab(mydata)
{	
    //Ajax call
    $.ajax({
            type: 'POST',
            url		:  mytheme_urls.ajaxurl,	
            dataType:'json',
            data	: mydata,
            beforeSend: function(){
                // $(mydata.myholddata).html("Xử lý...");
            },				
            success:function(msg)
            {
                 $(mydata.myholddata).html(msg);
            }
            ,error: function(){
                console.log("error");
            }

    });
}

jQuery(function($){

    // Toggle Shortcode
    $(".toggle-head-open").click(function () 
    {
            $(this).parent().find(".toggle-content").slideToggle("slow");
            $(this).hide();
            $(this).parent().find(".toggle-head-close").show();
    });
    $(".toggle-head-close").click(function () 
    {
            $(this).parent().find(".toggle-content").slideToggle("slow");
            $(this).hide();
            $(this).parent().find(".toggle-head-open").show();
    });
    
    $('#ct_dmsp_parent').click(function(){
        $(this).parent().toggleClass('open');
    });


});




