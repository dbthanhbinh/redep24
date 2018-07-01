$(document).ready(function(){
	$(".f_info_tool ul li:last-child").css({'padding-bottom':'0', 'border-bottom-width':'0'});
	$(".block_prodduct:last-child").css({'padding-bottom':'0'});
	$(".dknm ul li:last-child").css({'padding-right':'0'});
	$(".ul_info_foot li.li_info_foot:first-child").css({'border-left-width':'0'});
	$(".ul_info_foot li.li_info_foot:last-child").css({'border-right-width':'0', 'width':'14%'});
	$(".block_r_tlsp:last-child").css({'padding-bottom':'0'});
	$(".breacrum_pd ul li:last-child a").css({'background':'none', 'padding-right':'0'});
	$(".m_spmc ul li:last-child .sp_i_spmc").css({'background':'none', 'padding-right':'0'});
	
	
});

$(document).ready(function(){
	
	
});


$(document).ready(function() {
	$(window).resize(function(){
		var width_win=$(document).width();
		if(width_win<=1200){
						
			$(".ttch_shop_pd").hide();
			
		}else{
			$(".ttch_shop_pd").show();
		}
	});
});

$(document).ready(function(){						
	/*
        $(".c_dmsp").mouseover(function(){
		$(".ct_dmsp").show();
	});
        */
        
});	

/*
$(document).mouseout(function(event) {
	if (!$(event.target).hasClass('c_dmsp') && !$(event.target).hasClass('hover_dmsp')) {
		 $(".ct_dmsp").hide();
	}
});
*/


$(document).ready(function() {
	setHeight('.li_info_foot');
});

var maxHeight = 0;
function setHeight(column) {
	//Get all the element with class = col
	column = $(column);
	//Loop all the column
	column.each(function() {       
		//Store the highest value
		if($(this).height() > maxHeight) {
			maxHeight = $(this).height();;
		}
	});
	//Set the height
	column.height(maxHeight);
}