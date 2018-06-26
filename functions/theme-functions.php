<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function webseo24h_tie_scroll_to_top()
{
	?>
	<!-- Scroll to top -->
	<style type='text/css'>
	#bttop{background: url('<?php echo get_template_directory_uri();?>/modules/scroll-top/scroll-top.png') no-repeat scroll left 0 transparent;;text-align:center;padding:5px;position:fixed;bottom:5px;right:0px;cursor:pointer;display:none;color:#fff;font-size:11px;font-weight:900; width:46px; height:46px; z-index:1000;}
	#bttop:hover{}
	</style>
	<div id='bttop'>&nbsp;</div>
	<script type='text/javascript'>$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#bttop').fadeIn();}else{$('#bttop').fadeOut();}});$('#bttop').click(function(){$('body,html').animate({scrollTop:0},800);});});</script>
	<!-- End Scroll to top -->
	<?php
	
}

/*-----------------------------------------------------------------------------------*/
# single postmetas Class
/*-----------------------------------------------------------------------------------*/
class postmetas
{
    public $post_id;
    public $postmetas;


    public function __construct($post_id) 
    {
        $this->post_id = $post_id;
        $this->postmetas = get_post_custom($this->post_id);
    }
    
    public function __destruct() 
    {
        
    }
    
    // set postmeta value
    public function postmetas_set($key,$value)
    {
        $this->postmetas[$key][0] = $value;
    }
    
    // get postmeta value
    public function postmetas_get($key)
    {
       return isset($this->postmetas[$key][0]) ? $this->postmetas[$key][0] : '';
    }
    
    // get postmeta value
    public function postmetas_get_multiple($key)
    {
       return isset($this->postmetas[$key]) ? $this->postmetas[$key] : '';
    }
    
    // show postmeta value
    public function postmetas_show($key)
    {
        echo $this->postmetas[$key][0];
    }

    public function test($key)
    {
        print_r($this->postmetas[$key][0]);
    }
}

/*-----------------------------------------------------------------------------------*/
# Tình trạng hàng
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_stock_state()
{
    $options = array(
                            'conhang'       => '(Còn hàng)',
                            'hethang'       => '(Tạm hết hàng)',
                            'moive'         => '(Hàng mới về)',
                            'sapve'         => '(Hàng sắp về)'    
                    );
    return $options;        
}

/*-----------------------------------------------------------------------------------*/
# Lấy Tình trạng hàng
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_get_stock_state($name)
{
    $stock = webseo24h_tie_stock_state();
    if(key_exists($name, $stock))
        return $stock[$name];
}

/*-----------------------------------------------------------------------------------*/
# update showpostview
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_update_showpostview($post_id)
{
    global  $wpdb;
    $showpostview = get_post_meta($post_id,$wpdb->prefix.'showpostview',true);
    $tshowpostview = intval($showpostview);
    $showpostviewnew  = $tshowpostview+1;						
    update_post_meta($post_id, $wpdb->prefix.'showpostview',$showpostviewnew);
}


/*-----------------------------------------------------------------------------------*/
# Get Home Cats Boxes
/*-----------------------------------------------------------------------------------*/
function tie_get_home_cats($cat_data){

	switch( $cat_data['type'] ){
	
		case 'n':
			get_home_cats( $cat_data );
			break;
		
		case 's':
			get_home_scroll( $cat_data );
			break;
			
		case 'news-pic':
			get_home_news_pic( $cat_data );
			break;
			
		case 'videos':
			get_home_news_videos( $cat_data );
			break;	
			
		case 'recent':
			get_home_recent( $cat_data );
			break;	
			
		case 'divider': ?>
			<div class="divider" style="height:<?php if( !empty($cat_data['height']) ) echo $cat_data['height'] ?>px"></div>
			<div class="clear"></div>
		<?php
			break;
			
		case 'ads': ?>
			<div class="home-ads"><?php if( !empty($cat_data['text']) ) echo do_shortcode( htmlspecialchars_decode(stripslashes ($cat_data['text']) )) ?></div>
			<div class="clear"></div>
		<?php
			break;
	}
}

/*-----------------------------------------------------------------------------------*/
# Get setting format price width prefix $100 or 100$ 
/*-----------------------------------------------------------------------------------*/
 function webseo24h_tie_format_price_with_prefix($price,$echo=FALSE)
{
     global $ws24hShop;
    $curencyPrefix = 'last'; 
    $curency = $ws24hShop->curency;
    $price = number_format_i18n($price, 0);
    
    $html = '';
    if($curencyPrefix=='first')
    {
        $html .= $curency . ' ' . $price;
    }
    else 
    {
        $html .= $price . ' ' . $curency;
    }

    if($echo)
        echo $html;
    else 
        return $html;
}

/*-----------------------------------------------------------------------------------*/
# Get setting format price width prefix $100 or 100$
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_format_price_discount_unitprice($price,$discount)
{
    $price = intval($price);
    $discount = intval($discount);

    if($price<1)
        return 0;

    if($discount<1 || $discount>=$price)
    {
        return $price;
    }
    else if($discount>1 && $discount < $price)
    {
        return $discount;
    }
}

/*-----------------------------------------------------------------------------------*/
# Get setting format price unit width price and price show in single page
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_format_price_discount_show_return_single($price,$discount,$echo)
{
    $html = '';
    $price = intval($price);
    $discount = intval($discount);

    if($price<1)
    {            
        $html .= ' 
            <span class="items-product-single">Giá bán</span>
                : <b class="price_ctpd"> Liên hệ</b>
            ';        
    }
    else if($discount<1 || $discount>=$price)
    {
        $html .= '             
            <span class="items-product-single">Giá bán</span>
                : <b class="price_ctpd">'.webseo24h_tie_format_price_with_prefix($price, FALSE).'</b>
            ';
    }
    else if($discount>1 && $discount < $price)
    {
        $html .= '             
             <b class="price_ctpd">'.webseo24h_tie_format_price_with_prefix($discount, FALSE).'</b><b class="price_ctpd2"> Giá cũ: '.webseo24h_tie_format_price_with_prefix($price, FALSE).'</b>
            ';
    }

    if($echo)
        echo $html;
    else
        return $html;
}


/*-----------------------------------------------------------------------------------*/
# Get setting format price width prefix $100 or 100$
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_format_price_discount_show_return($price,$discount,$echo)
{
    $html = '';
    $price = intval($price);
    $discount = intval($discount);

    if($price<1)
    {            
        $html .= ' 
            <div class="group-price">                    
                <span class="pri1_wf">Liên hệ</span>   
            </div> 
            ';        
    }
    else if($discount<1 || $discount>=$price)
    {
        $html .= ' 
            <div class="group-price">                    
                <span class="pri2_wf">'.webseo24h_tie_format_price_with_prefix($price, FALSE).'</span>   
            </div> 
            ';
    }
    else if($discount>1 && $discount < $price)
    {
        $html .= ' 
            <div class="group-price">                    
                <span class="pri1_wf">'.webseo24h_tie_format_price_with_prefix($price, FALSE).'</span> 
                <span class="pri2_wf">'.webseo24h_tie_format_price_with_prefix($discount, FALSE).'</span>   
            </div> 
            ';
    }

    if($echo)
        echo $html;
    else
        return $html;
}

/*-----------------------------------------------------------------------------------*/
# Not found post
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_notfound()
{
    ?>
        <p style="padding:30px 0; color: #ff0000;"> Không tìm thấy bài viết. </p> 
    <?php                    
}


/*-----------------------------------------------------------------------------------*/
# Genaral logo site
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_logo_show()
{
    if(tie_get_option('logo')):
    ?>
        <a class="logo1" href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
            <img alt="<?php bloginfo("name");?>" src="<?php echo tie_get_option('logo');?>" />
        </a>                    
    <?php    
    else:
    ?>
        <a class="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>"></a>                    
    <?php
    endif;
}


/*-----------------------------------------------------------------------------------*/
# Page Navigation
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_pagenavi( $query = false, $num = false ){
    ?>
    <div class="frame_phantrang">
        <div class="PageNum">
            <?php webseo24h_tie_get_pagenavi( $query, $num ) ?>
        </div>
    </div><!-- End .frame_phantrang -->
    <?php
}


/*-----------------------------------------------------------------------------------*/
# If the menu doesn't exist
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_nav_fallback(){
	echo '<div class="menu-alert">'.__( 'You can use WP menu builder to build menus' , THEME_NAME ).'</div>';
}


/*-----------------------------------------------------------------------------------*/
# Categories Mega Menus
/*-----------------------------------------------------------------------------------*/
class webseo24h_tie_mega_menu_walker extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = [] ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
            );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // add main/sub classes to li's and links
     function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		
        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'li_m_dmsp hover_dmsp' : 'li_m_dmsp hover_dmsp' )
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		$menu_item_subtitle = get_post_meta( $item->ID, '_menu_item_subtitle', true );
		$menu_item_icon = get_post_meta( $item->ID, '_menu_item_icon', true );
		$menu_item_icon = $menu_item_icon ? $menu_item_icon : 'icon_m_dmsp_0';
        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '"><span class="hover_dmsp icon_m_dmsp '.$menu_item_icon.'"></span>';

        // link attributes        
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';        
        $attributes .= ' class="hover_dmsp menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
		// print_r('<pre>'.$item_output.$menu_item_subtitle.'</pre>');

		$item_output .= '<label class="menu-subtitle">'.$menu_item_subtitle.'</label>';
        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
}

/*-----------------------------------------------------------------------------------*/
# Exclude pages From Search
/*-----------------------------------------------------------------------------------*/
function tie_Search_Filter($query) {
    if( $query->is_search )
    {
        $query->set('post_type', array('post'));
    }
    return $query;
}
add_filter('pre_get_posts','tie_Search_Filter');


/*-----------------------------------------------------------------------------------*/
# Get all Area
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_area_get_all()
{
    $area = array(
                'all'           => 'Toàn quốc',
                'hanoi'         => 'Hà nội',
                'tphcm'		=> 'TP . Hồ Chí Minh',
                'danang'	=> 'Đà Nẵng'    
        );
    return $area;
}

/*-----------------------------------------------------------------------------------*/
# Get Area name
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_area_get_name($key)
{
    $area = webseo24h_tie_area_get_all();
    return $area[$key];
}


/*-----------------------------------------------------------------------------------*/
# Get all country
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_get_countries()
{	
	$countries_array = array("
        Vietnam,    
        United States,
	Thailand,
	Laos,
	Cambodia,
	Singapore,
	Malaysia,
	Indonesia,
	Afghanistan,
	Albania,
	Algeria,
	American Samoa,
	Andorra,
	Angola,
	Anguilla,
	Antigua and Barbuda,
	Argentina,
	Armenia,
	Aruba,
	Australia,
	Austria,
	Azerbaijan,
	Bahamas,
	Bahrain,
	Bangladesh,
	Barbados,
	Belarus,
	Belgium,
	Belize,
	Benin,
	Bermuda,
	Bhutan,
	Bolivia,
	Bosnia-Herzegovina,
	Botswana,
	Bouvet Island,
	Brazil,
	Brunei,
	Bulgaria,
	Burkina Faso,
	Burundi,
	Cameroon,
	Canada,
	Cape Verde,
	Cayman Islands,
	Central African Republic,
	Chad,
	Chile,
	China,
	Christmas Island,
	Cocos (Keeling) Islands,
	Colombia,
	Comoros,
	Congo, Democratic Republic of the (Zaire),
	Congo, Republic of,
	Cook Islands,
	Costa Rica,
	Croatia,
	Cuba,
	Cyprus,
	Czech Republic,
	Denmark,
	Djibouti,
	Dominica,
	Dominican Republic,
	Ecuador,
	Egypt,
	El Salvador,
	Equatorial Guinea,
	Eritrea,
	Estonia,
	Ethiopia,
	Falkland Islands,
	Faroe Islands,
	Fiji,
	Finland,
	France,
	French Guiana,
	Gabon,
	Gambia,
	Georgia,
	Germany,
	Ghana,
	Gibraltar,
	Greece,
	Greenland,
	Grenada,
	Guadeloupe (French),
	Guam (USA),
	Guatemala,
	Guinea,
	Guinea Bissau,
	Guyana,
	Haiti,
	Holy See,
	Honduras,
	Hong Kong,
	Hungary,
	Iceland,
	India,
	Iran,
	Iraq,
	Ireland,
	Israel,
	Italy,
	Ivory Coast (Cote D`Ivoire),
	Jamaica,
	Japan,
	Jordan,
	Kazakhstan,
	Kenya,
	Kiribati,
	Kuwait,
	Kyrgyzstan,
	Latvia,
	Lebanon,
	Lesotho,
	Liberia,
	Libya,
	Liechtenstein,
	Lithuania,
	Luxembourg,
	Macau,
	Macedonia,
	Madagascar,
	Malawi,
	Maldives,
	Mali,
	Malta,
	Marshall Islands,
	Martinique (French),
	Mauritania,
	Mauritius,
	Mayotte,
	Mexico,
	Micronesia,
	Moldova,
	Monaco,
	Mongolia,
	Montenegro,
	Montserrat,
	Morocco,
	Mozambique,
	Myanmar,
	Namibia,
	Nauru,
	Nepal,
	Netherlands,
	Netherlands Antilles,
	New Caledonia (French),
	New Zealand,
	Nicaragua,
	Niger,
	Nigeria,
	Niue,
	Norfolk Island,
	North Korea,
	Northern Mariana Islands,
	Norway,
	Oman,
	Pakistan,
	Palau,
	Panama,
	Papua New Guinea,
	Paraguay,
	Peru,
	Philippines,
	Pitcairn Island,
	Poland,
	Polynesia (French),
	Portugal,
	Puerto Rico,
	Qatar,
	Reunion,
	Romania,
	Russia,
	Rwanda,
	Saint Helena,
	Saint Kitts and Nevis,
	Saint Lucia,
	Saint Pierre and Miquelon,
	Saint Vincent and Grenadines,
	Samoa,
	San Marino,
	Sao Tome and Principe,
	Saudi Arabia,
	Senegal,
	Serbia,
	Seychelles,
	Sierra Leone,
	Slovakia,
	Slovenia,
	Solomon Islands,
	Somalia,
	South Africa,
	South Georgia and South Sandwich Islands,
	South Korea,
	Spain,
	Sri Lanka,
	Sudan,
	Suriname,
	Svalbard and Jan Mayen Islands,
	Swaziland,
	Sweden,
	Switzerland,
	Syria,
	Taiwan,
	Tajikistan,
	Tanzania,
	Timor-Leste (East Timor),
	Togo,
	Tokelau,
	Tonga,
	Trinidad and Tobago,
	Tunisia,
	Turkey,
	Turkmenistan,
	Turks and Caicos Islands,
	Tuvalu,
	Uganda,
	Ukraine,
	United Arab Emirates,
	United Kingdom,	
	Uruguay,
	Uzbekistan,	
	Vanuatu,
	Venezuela,
	Virgin Islands,
	Wallis and Futuna Islands,
	Yemen,
	Zambia,
	Zimbabwe");
			
	//print_r($countries);	
	$countries = explode(',', $countries_array[0]);	
	return $countries;
}

function webseo24h_tie_get_cities()
{	
	$cities_array = array("
            TP HỒ CHÍ MINH,
            HÀ NỘI,
            Lào Cai,
            Yên Bái,
            Điện Biên,
            Hòa Bình,
            Lai Châu,
            Sơn La,
            Hà Giang,
            Cao Bằng,
            Bắc Kạn,
            Lạng Sơn,
            Tuyên Quang,
            Thái Nguyên,
            Phú Thọ,
            Bắc Giang,
            Quảng Ninh,
            Bắc Ninh,
            Hà Nam,
            Hải Dương,
            Hải Phòng,
            Hưng Yên,
            Nam Định,
            Ninh Bình,
            Thái Bình,
            Vĩnh Phúc,
            Thanh Hóa,
            Nghệ An,
            Hà Tĩnh,
            Quảng Bình,
            Quảng Trị,
            Thừa Thiên-Huế,
            Đà Nẵng,
            Quảng Nam,
            Quảng Ngãi,
            Bình Định,
            Phú Yên,
            Khánh Hòa,
            Ninh Thuận,
            Bình Thuận,
            Kon Tum,
            Gia Lai,
            Dak Lak,
            Dak Nong,
            Lâm Đồng,
            Bình Phước,
            Bình Dương,
            Đồng Nai,
            Tây Ninh,
            Bà Rịa-Vũng Tàu,
            Long An,
            Đồng Tháp,
            Tiền Giang,
            An Giang,
            Bến Tre,
            Vĩnh Long,
            Kiên Giang,
            Hậu Giang,
            Trà Vinh,
            Sóc Trăng,
            Bạc Liêu,
            Cà Mau,
            Cần Thơ
        ");
			
	//print_r($countries);	
	$cities = explode(',', $cities_array[0]);	
	return $cities;
}

/*-----------------------------------------------------------------------------------*/
# Get fill country option
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_get_countries_options($current)
{
    $countries = webseo24h_tie_get_countries();
    foreach ($countries as $key => $value) 
    {
        if($current==$value)
        {
        ?>
            <option selected="selected" value="<?php echo $value;?>"><?php echo $value;?></option>
        <?php    
        }
        else 
        {
        ?>
            <option value="<?php echo $value;?>"><?php echo $value;?></option>
        <?php
        }
    }
}

function webseo24h_tie_get_cities_options($current)
{
    $cities = webseo24h_tie_get_cities();
        
    foreach ($cities as $key => $value) 
    {   
        if($current==$value)
        {
        ?>
            <option selected="selected" value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
        <?php    
        }
        else 
        {
        ?>
            <option value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
        <?php
        }
    }
}


// Social
/*-----------------------------------------------------------------------------------*/
# addthis social in single or page
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_social_addthis()
{
    ?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54c78bac5f4b0ffb" async="async"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_native_toolbox"></div>        
    <?php        
}

function webseo24h_tie_social_button($perlink,$items)
{
?>
    <div class="spc_S" style="margin-top:0; padding:0; float: left;">
        <div class="googleplus_social_button social_button_items">
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone"></div>
        </div>
        <?php if($items=='all'):?>
        <div class="google_share_social_button social_button_items">
            <!-- Place this tag where you want the share button to render. -->
            <div class="g-plus" data-action="share" data-annotation="bubble" data-height="24"></div>
        </div>
        <?php endif;?>
        <div class="facebook_social_button social_button_items">
            <!-- face book -->
            <div class="fb-like" data-href="<?php echo $perlink;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>
        
    </div>
<?php    
}

/*-----------------------------------------------------------------------------------*/
# webseo24h tie Thumb 
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_thumb( $size = 'medium' ){
    global $post;
    $image_id = get_post_thumbnail_id($post->ID);  
    $image_url = wp_get_attachment_image($image_id, $size , false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title()  ));  
    echo $image_url;
}

// remove width + height  images
function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}


function webseo24h_tie_thumb_multiple($image_id, $size = 'medium',$echo=true){
    global $post;
    //$image_id = get_post_thumbnail_id($post->ID);  
    $image_url = wp_get_attachment_image($image_id, $size , false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title()  ));  
    
    $image_url = remove_thumbnail_dimensions($image_url);
    
    if($echo)
        echo $image_url;
    else {
        return $image_url;
    }
}

/*-----------------------------------------------------------------------------------*/
# tie Thumb slider_img
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_slider_img_src( $image_id , $size ){
	global $post;
	if( tie_get_option( 'timthumb') ){
	
		if( $size == 'tie-medium' ){$width = 272; $height = 125;}
		elseif( $size == 'tie-large' ){$width = 290;	$height = 195;}
		elseif( $size == 'slider' ){	$width 	= 660;$height = 260;}
		elseif( $size == 'big-slider' ){$width = 995; $height = 498;}
		else{ $width = 55; $height = 55;}
		
		$img =  wp_get_attachment_image_src( $image_id , 'full' );	
		if( !empty($img) ){
			return $img_src = get_template_directory_uri()."/timthumb.php?src=". $img[0] ."&amp;h=".$height ."&amp;w=". $width ."&amp;a=c";
		}
	}else{
		$image_url = wp_get_attachment_image_src($image_id, $size );  
		return $image_url[0];
	}
}




/*-----------------------------------------------------------------------------------*/
# Get Social Counter
/*-----------------------------------------------------------------------------------*/
function tie_remote_get( $url ) {
	$request = wp_remote_retrieve_body( wp_remote_get( $url , array( 'timeout' => 18 , 'sslverify' => false ) ) );
	return $request;
}

function tie_followers_count() {
	$twitter_username 		= tie_get_option('twitter_username');
	$twitter['page_url'] = 'http://www.twitter.com/'.$twitter_username;
	$twitter['followers_count'] = get_transient('twitter_count');
	if( empty( $twitter['followers_count']) ){
		try {
		
			$data = @json_decode(tie_remote_get("https://twitter.com/users/$twitter_username.json") , true);
			$twitter['followers_count'] = (int) $data['followers_count'];	
			
			$consumerKey 			= tie_get_option('twitter_consumer_key');
			$consumerSecret			= tie_get_option('twitter_consumer_secret');

			$token = get_option('tie_TwitterToken');
		 
			// getting new auth bearer only if we don't have one
			if(!$token) {
				// preparing credentials
				$credentials = $consumerKey . ':' . $consumerSecret;
				$toSend = base64_encode($credentials);
		 
				// http post arguments
				$args = array(
					'method' => 'POST',
					'httpversion' => '1.1',
					'blocking' => true,
					'headers' => array(
						'Authorization' => 'Basic ' . $toSend,
						'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
					),
					'body' => array( 'grant_type' => 'client_credentials' )
				);
		 
				add_filter('https_ssl_verify', '__return_false');
				$response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
		 
				$keys = json_decode(wp_remote_retrieve_body($response));
		 
				if($keys) {
					// saving token to wp_options table
					update_option('tie_TwitterToken', $keys->access_token);
					$token = $keys->access_token;
				}
			}
			
			// we have bearer token wether we obtained it from API or from options
			$args = array(
				'httpversion' => '1.1',
				'blocking' => true,
				'headers' => array(
					'Authorization' => "Bearer $token"
				)
			);
		 
			add_filter('https_ssl_verify', '__return_false');
			$api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$twitter_username";
			$response = wp_remote_get($api_url, $args);
		 
			if (!is_wp_error($response)) {
				$followers = json_decode(wp_remote_retrieve_body($response));
				$twitter['followers_count'] = $followers->followers_count;
			} 
			
		} catch (Exception $e) {
			$twitter['followers_count'] = 0;
		}
		if( !empty( $twitter['followers_count'] ) ){
			set_transient( 'twitter_count' , $twitter['followers_count'] , 1200);
			if( get_option( 'followers_count') != $twitter['followers_count'] ) 
				update_option( 'followers_count' , $twitter['followers_count'] );
		}
			
		if( $twitter['followers_count'] == 0 && get_option( 'followers_count') )
			$twitter['followers_count'] = get_option( 'followers_count');
				
		elseif( $twitter['followers_count'] == 0 && !get_option( 'followers_count') )
			$twitter['followers_count'] = 0;
	}
	return $twitter;
}

function tie_facebook_fans( $page_link ){
	$face_link = @parse_url($page_link);

	if( $face_link['host'] == 'www.facebook.com' || $face_link['host']  == 'facebook.com' ){
		$fans = get_transient('fans_count');
		if( empty( $fans ) ){
			try {
				$data = @json_decode(tie_remote_get("http://graph.facebook.com/".$page_link));
				$fans = $data->likes;
			} catch (Exception $e) {
				$fans = 0;
			}
				
			if( !empty($fans) ){
				set_transient( 'fans_count' , $fans , 1200);
				if ( get_option( 'fans_count') != $fans )
					update_option( 'fans_count' , $fans );
			}
				
			if( $fans == 0 && get_option( 'fans_count') )
				$fans = get_option( 'fans_count');
					
			elseif( $fans == 0 && !get_option( 'fans_count') )
				$fans = 0;
		}	
		return $fans;
	}
}


function tie_youtube_subs( $channel_link ){
	$youtube_link = @parse_url($channel_link);

	if( $youtube_link['host'] == 'www.youtube.com' || $youtube_link['host']  == 'youtube.com' ){
		$subs = get_transient('youtube_count');
		if( empty( $subs ) ){
			try {
				if (strpos( strtolower($channel_link) , "channel") === false)
					$youtube_name = substr(@parse_url($channel_link, PHP_URL_PATH), 6);
				else
					$youtube_name = substr(@parse_url($channel_link, PHP_URL_PATH), 9);

				$json = @tie_remote_get("http://gdata.youtube.com/feeds/api/users/".$youtube_name."?alt=json");
				$data = json_decode($json, true); 
				$subs = $data['entry']['yt$statistics']['subscriberCount']; 
			} catch (Exception $e) {
				$subs = 0;
			}
			
			if( !empty($subs) ){
				set_transient( 'youtube_count' , $subs , 1200);
				if( get_option( 'youtube_count') != $subs )
					update_option( 'youtube_count' , $subs );
			}
				
			if( $subs == 0 && get_option( 'youtube_count') )
				$subs = get_option( 'youtube_count');
					
			elseif( $subs == 0 && !get_option( 'youtube_count') )
				$subs = 0;
		}
		return $subs;
	}
}


function tie_vimeo_count( $page_link ) {
	$vimeo_link = @parse_url($page_link);

	if( $vimeo_link['host'] == 'www.vimeo.com' || $vimeo_link['host']  == 'vimeo.com' ){
		$vimeo = get_transient('vimeo_count');
		if( empty( $vimeo ) ){
			try {
				$page_name = substr(@parse_url($page_link, PHP_URL_PATH), 10);
				@$data = @json_decode(tie_remote_get( 'http://vimeo.com/api/v2/channel/' . $page_name  .'/info.json'));
			
				$vimeo = $data->total_subscribers;
			} catch (Exception $e) {
				$vimeo = 0;
			}

			if( !empty($vimeo) ){
				set_transient( 'vimeo_count' , $vimeo , 1200);
				if( get_option( 'vimeo_count') != $vimeo )
					update_option( 'vimeo_count' , $vimeo );
			}
				
			if( $vimeo == 0 && get_option( 'vimeo_count') )
				$vimeo = get_option( 'vimeo_count');
			elseif( $vimeo == 0 && !get_option( 'vimeo_count') )
				$vimeo = 0;
		}
		return $vimeo;
	}
}

function tie_dribbble_count( $page_link ) {
	$dribbble_link = @parse_url($page_link);

	if( $dribbble_link['host'] == 'www.dribbble.com' || $dribbble_link['host']  == 'dribbble.com' ){
		$dribbble = get_transient('dribbble_count');
		if( empty( $dribbble ) ){
			try {
				$page_name = substr(@parse_url($page_link, PHP_URL_PATH), 1);
				@$data = @json_decode(tie_remote_get( 'http://api.dribbble.com/' . $page_name));
			
				$dribbble = $data->followers_count;
			} catch (Exception $e) {
				$dribbble = 0;
			}

			if( !empty($dribbble) ){
				set_transient( 'dribbble_count' , $dribbble , 1200);
				if( get_option( 'dribbble_count') != $dribbble )
					update_option( 'dribbble_count' , $dribbble );
			}
				
			if( $dribbble == 0 && get_option( 'dribbble_count') )
				$dribbble = get_option( 'dribbble_count');
			elseif( $dribbble == 0 && !get_option( 'dribbble_count') )
				$dribbble = 0;
		}
		return $dribbble;
	}
}

function tie_soundcloud_count( $page_link , $api ) {
	$soundcloud_link = @parse_url($page_link);
	if( $soundcloud_link['host'] == 'www.soundcloud.com' || $soundcloud_link['host']  == 'soundcloud.com' ){
		$soundcloud = get_transient('soundcloud_count');
		if( empty( $soundcloud ) ){
			try {
				$username = substr( $soundcloud_link['path'] , 1);
				$data = @json_decode(tie_remote_get("http://api.soundcloud.com/users/$username.json?consumer_key=$api") , true );
				$soundcloud = (int) $data['followers_count'];
			
			} catch (Exception $e) {
				$soundcloud = 0;
			}

			if( !empty($soundcloud) ){
				set_transient( 'soundcloud_count' , $soundcloud , 1200);
				if( get_option( 'soundcloud_count') != $soundcloud )
					update_option( 'soundcloud_count' , $soundcloud );
			}
			
			if( $soundcloud == 0 && get_option( 'soundcloud_count') )
				$soundcloud = get_option( 'soundcloud_count');
			elseif( $soundcloud == 0 && !get_option( 'soundcloud_count') )
				$soundcloud = 0;
		}
		return $soundcloud;
	}	
}

function tie_behance_count( $page_link , $api ) {
	$behance_link = @parse_url($page_link);
	if( $behance_link['host'] == 'www.behance.net' || $behance_link['host']  == 'behance.net' ){
		$behance = get_transient('behance_count');
		if( empty( $behance ) ){
			try {
				$username = substr( $behance_link['path'] , 1);
				$data = @json_decode( tie_remote_get("http://www.behance.net/v2/users/$username?api_key=$api") , true );
				$behance = (int) $data['user']['stats']['followers'];		
			} catch (Exception $e) {
				$behance = 0;
			}

			if( !empty($behance) ){
				set_transient( 'behance_count' , $behance , 1200);
				if( get_option( 'behance_count') != $behance )
					update_option( 'behance_count' , $behance );
			}
			
			if( $behance == 0 && get_option( 'behance_count') )
				$behance = get_option( 'behance_count');
			elseif( $behance == 0 && !get_option( 'behance_count') )
				$behance = 0;
		}
		return $behance;
	}	
}

function tie_instagram_count( $page_link , $api ) {
	$instagram_link = @parse_url($page_link);
	if( $instagram_link['host'] == 'www.instagram.com' || $instagram_link['host']  == 'instagram.com' ){
		$instagram = get_transient('instagram_count');
		if( empty( $instagram ) ){
			try {
				$username = explode(".", $api);
				$data = @json_decode( tie_remote_get("https://api.instagram.com/v1/users/$username[0]/?access_token=$api") , true );
				$instagram = (int) $data['data']['counts']['followed_by'];	
			
			} catch (Exception $e) {
				$instagram = 0;
			}

			if( !empty($instagram) ){
				set_transient( 'instagram_count' , $instagram , 1200);
				if( get_option( 'instagram_count') != $instagram )
					update_option( 'instagram_count' , $instagram );
			}
			
			if( $instagram == 0 && get_option( 'instagram_count') )
				$instagram = get_option( 'instagram_count');
			elseif( $instagram == 0 && !get_option( 'instagram_count') )
				$instagram = 0;
		}
		return $instagram;
	}	
}

/*-----------------------------------------------------------------------------------*/
# Get Most Racent posts from Category
/*-----------------------------------------------------------------------------------*/
function tie_last_posts_cat($numberOfPosts = 5 , $thumb = true , $cats = 1,$list_post_id=NULL,$by_post_id=false,$view_by_slider=false)
{
    global $post,$wpdb;
    $orig_post = $post;        
    if(!empty($list_post_id) && $by_post_id)
    {
        $lastPosts = explode(',', $list_post_id);            
    }
    else
        $lastPosts = get_posts('category='.$cats.'&no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
    
    ?>
    
    <div class="m_bcn_tlsp">
            <div class="ul_bcn">
                
                <?php 
                if($lastPosts):
        
                    foreach($lastPosts as $post): 
                        $postmetas = get_post_custom($post->ID);
                        $price = $postmetas[$wpdb->prefix.'price'][0];
                        $discount = $postmetas[$wpdb->prefix.'discount'][0]; 
                        ?>
                        <div class="li_bcn">
                            <div class="sp_i_bcn">
                                    <table>
                                    <tr>
                                        <td>
                                            <?php if(has_post_thumbnail()):?>
                                            <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                <?php the_post_thumbnail('thumbnail');?>
                                            </a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- End .sp_i_bcn -->
                            <div class="info_bcn">
                                <div class="name_wf2">
                                        <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                </div><!-- End .name_wf -->
                                <?php
                                webseo24h_tie_format_price_discount_show_return($price, $discount, true);
                                ?>
                            </div><!-- End .info_bcn -->
                            <div class="clear"></div>
                        </div>    
                        <?php

                    endforeach;

                endif;
                ?>
                
            </div>
            <div class="clear"></div>
            <?php if($view_by_slider):?>
            <script type="text/javascript">
                $(document).ready(function(){
                        $('.ul_bcn').bxSlider({
                                /*
                                mode: 'vertical',
                                auto: false,
                                infiniteLoop: false,
                                slideWidth: 213,
                                controls: true,
                                pager: false,
                                minSlides: 5
                                */

                                 /*
                                mode: 'vertical',
                                auto: false,
                                infiniteLoop: false,
                                slideWidth: 213,
                                controls: true,
                                pager: false,
                                minSlides: 5
                                */
                                
                                mode: 'vertical',
                                auto: true,
                                infiniteLoop: true,
                                moveSlides: 1,
                                slideWidth: 300,
                                pause:5000,
                                speed:100,
                                controls: true,
                                pager: false,
                                minSlides: 5,
                                maxSlides: 5
                               
                        });
                });
            </script>
            <?php endif;?>
        </div><!-- End .m_bcn_tlsp -->
    
    <?php
}

function tie_post_class( $classes = false ) {
    global $post;
	
	$post_format = get_post_meta($post->ID, 'tie_post_head', true);
	if( !empty($post_format) ){
		if( !empty($classes) ) $classes .= ' ';
		$classes .= 'tie_'.$post_format;
	}
	if( !empty($classes) )	
		echo 'class="'.$classes.'"';
}

function webseo24h_left_right_sidebar_class($layout='sidebar')
{
    $sidebar_pos = tie_get_option('sidebar_pos');
    $layout_style = '';
    
    if($layout=='sidebar')
    {
        if($sidebar_pos && $sidebar_pos=='right')
            $layout_style = 'style="float:right; margin-left: 0px;"';
    }
    else 
    {
        if($sidebar_pos && $sidebar_pos=='right')
            $layout_style = 'style="padding-left: 0px;"';
        else
            $layout_style = 'style="padding-left: 10px;"';
        
    }
    
    echo $layout_style;
}

/*-----------------------------------------------------------------------------------*/
# Get the post time
/*-----------------------------------------------------------------------------------*/
function tie_get_time(){
	global $post ;
	if( tie_get_option( 'time_format' ) == 'none' ){
		return false;
	}elseif( tie_get_option( 'time_format' ) == 'modern' ){	
		$to = current_time('timestamp'); //time();
		$from = get_the_time('U') ;
		
		$diff = (int) abs($to - $from);
		if ($diff <= 3600) {
			$mins = round($diff / 60);
			if ($mins <= 1) {
				$mins = 1;
			}
			$since = sprintf(_n('%s min', '%s mins', $mins), $mins) .' '. __( 'ago' , 'tie' );
		}
		else if (($diff <= 86400) && ($diff > 3600)) {
			$hours = round($diff / 3600);
			if ($hours <= 1) {
				$hours = 1;
			}
			$since = sprintf(_n('%s hour', '%s hours', $hours), $hours) .' '. __( 'ago' , 'tie' );
		}
		elseif ($diff >= 86400) {
			$days = round($diff / 86400);
			if ($days <= 1) {
				$days = 1;
				$since = sprintf(_n('%s day', '%s days', $days), $days) .' '. __( 'ago' , 'tie' );
			}
			elseif( $days > 29){
				$since = get_the_time(get_option('date_format'));
			}
			else{
				$since = sprintf(_n('%s day', '%s days', $days), $days) .' '. __( 'ago' , 'tie' );
			}
		}
	}else{
		$since = get_the_time(get_option('date_format'));
	}
	echo '<span>'.$since.'</span>';
}


/*-----------------------------------------------------------------------------------*/
# Get setting format color Ex:Green,Red,Yellow,Pink...
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_color_get()
{
    $mcolors = array();
    $colors = tie_get_option('color_setting');
    if($colors)
    {
        $mcolors = explode(',', $colors);
    }
    return $mcolors;
}

/*-----------------------------------------------------------------------------------*/
# Get setting format color Ex:Green,Red,Yellow,Pink...
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_color_show($colors)
{
    if(!empty($colors))
    {
        echo '<div class="color-setting-hidden">';
        foreach ($colors as $value) 
        {
            echo webseo24h_tie_color_get_name($value);           
        }
        echo '<input type="hidden" id="color-setting-hidden" class="" value=""/>';
        echo '</div>';
    }
}

/*-----------------------------------------------------------------------------------*/
# Get setting format color Ex:Green,Red,Yellow,Pink...
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_size_get()
{
    $msizes = array();
    $sizes = tie_get_option('size_setting');
    if($sizes)
    {
        $msizes = explode(',', $sizes);
    }
    return $msizes;
}

/*-----------------------------------------------------------------------------------*/
# Get setting format color Ex:Green,Red,Yellow,Pink...
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_size_show($sizes)
{
    if(!empty($sizes))
    {
        echo '<div class="size-setting-hidden">';
        foreach ($sizes as $value) 
        {
            echo webseo24h_tie_size_get_name($value);            
        }
        
        echo '<input type="hidden" id="size-setting-hidden" class="" value=""/>';
        echo '</div>';
    }
}

/*-----------------------------------------------------------------------------------*/
# Get setting get name in array
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_color_get_name($items)
{
    $msizes = array();
    $sizes = tie_get_option('color_setting');
    if($sizes)
    {
        $msizes = explode(',', $sizes);
    }
    return '<span rel="'.$items.'"> '.$msizes[$items].' </span>';
}

/*-----------------------------------------------------------------------------------*/
# Get setting get name in array
/*-----------------------------------------------------------------------------------*/
function webseo24h_tie_size_get_name($items)
{
    $msizes = array();
    $sizes = tie_get_option('size_setting');
    if($sizes)
    {
        $msizes = explode(',', $sizes);
    }
    return '<span rel="'.$items.'"> '.$msizes[$items].' </span>';
}


/*-----------------------------------------------------------------------------------*/
# Author extra in author pages
/*-----------------------------------------------------------------------------------*/

function webseo24h_tie_show_author_extra_page($author_meta)
{
    //print_r( $author_meta);
    if($author_meta['phone'][0] || $author_meta['skype'][0]):
    ?>
    <div class="page-author-extra">
        <?php if($author_meta['phone'][0]):?>
        <label><span class="author-extra author-phone-extra"></span> <span><?php echo $author_meta['phone'][0]?></span></label>
        <?php endif;?>
        
        <?php if($author_meta['skype'][0]):?>
        <label >
            <a href="skype:<?php echo $author_meta['skype'][0];?>?chat"> 
                <img style="float: left; margin-top: -5px;" alt="Talk with me via Skype" src="http://mystatus.skype.com/mediumicon/<?php echo $author_meta['skype'][0];?>">
            </a></label>
        <?php endif;?>
        
        <?php if($author_meta['yahoo'][0]):?>
        <label style="padding-left: 0; margin-left: 0;">
            <a href="ymsgr:sendIM?<?php echo $author_meta['yahoo'][0];?>"> 
                <img style="float: left;" src='http://opi.yahoo.com/online?u=<?php echo $author_meta['yahoo'][0];?>&m=g&t=1&l=vi' alt ='' />
            </a>
        </label>
        <?php endif;?>
    </div>            
    <?php
    endif;
}