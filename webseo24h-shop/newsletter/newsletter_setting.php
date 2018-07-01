<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function newsletter_style_script()
{
    echo '<link rel="stylesheet" type="text/css" href="'.  get_template_directory_uri().'/webseo24h-shop/newsletter/newsletter.css"/>';
    echo '<script type="text/javascript" src="'.  get_template_directory_uri().'/webseo24h-shop/newsletter/newsletter.js"></script>';
}

add_action('wp_footer', 'newsletter_style_script');

class newsletter
{
    public $newsletter_slogan;
    public $table;
    
    public function __construct() {
        global $wpdb;
        $this->table = $wpdb->prefix.'newsletter';
        
        $this->newsletter_slogan = 'Để nhận thông tin về các chương trình khuyến mãi  và xu hướng sản phẩm.';
    }
    
    public function __destruct() {
        
    }
    
    // init database
    public function newsletter_init_database()
    {

            global $wpdb;
            // Đăng ký theo doi khoa hoc
            $newsletter = $wpdb->prefix.'newsletter';

            if ($wpdb->get_var("SHOW TABLES LIKE '$newsletter'") != $newsletter)
            {
                    $wpdb->query("CREATE TABLE {$newsletter}
                    (
                    ID  mediumint(10) AUTO_INCREMENT PRIMARY KEY ,
                    email 			VARCHAR(250)  NULL,
                    status			INT NULL,
                    options			VARCHAR(255) NULL,
                    active_code                 VARCHAR(255) NULL,
                    date			DATETIME

                    )ENGINE=MyISAM DEFAULT CHARSET=utf8");
                    
                    //init create page
                    $new_post = array(
                    'post_title' => 'Newsletter',
                    'post_content' => 'My newsletter page template (Not delete)',
                    'post_status' => 'publish',
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_author' => 1,
                    'post_type' => 'page',
                    'post_category' => array(0)
                    );
                    wp_insert_post($new_post);
            }
    }
    
    // newsletter layout
    public function newsletter_layout($show)
    {
        $html = ' 
            <div class="col-lg-6 col-md-6 mb-6">
                <form class="newsletter_form">
                    <input class="ipt_dknm" id="newsletter_input" type="text" placeholder="Email của bạn..."/>
                    <input class="btn_dknm" id="act_newsletter_btn" type="button" value="&nbsp;"/>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 mb-6">'.$this->newsletter_slogan.'</div>
            ';
        if($show)
            echo $html;
        else
            return $html;
    }
    
    public function newsletter_cancel_register($email,$active_code)
    {
        global $wpdb;
        $data = array(            
            'status'		=> 1,                        
	);        
       $wpdb->update($this->table,$data,array('active_code'=>$active_code));
    }

    public function test()
    {
        echo 'newsletter';
    }
}

$newsletter = new newsletter();
function db_newsletter_show($show)
{
    global $newsletter;
    $newsletter->newsletter_layout($show);
}

//initdata
function db_newsletter_init_data()
{
    global $newsletter;
    $newsletter->newsletter_init_database();
}
db_newsletter_init_data();
//$newsletter->test();


#### Newsletter register
function ajax_action_newsletter_ajax_register()
{
	global $wpdb,$sessionID,$tempemail;
	$newsletter = $_REQUEST['newsletter'];
	$newtable = $wpdb->prefix.'newsletter';

	$data = array(
			'email'			=> $newsletter,
			'status'		=> 0,
			'options'		=> '',
                        'active_code'           => $sessionID,
			'date'			=> date('Y-m-d H:i:s')
	);

	$query	= "SELECT * FROM $newtable WHERE email='$newsletter'";
	$re	= $wpdb->get_results($query, OBJECT);

	if(count($re)>0)
	{
		$result = "Email này đã được đăng ký, chọn email khác.";
	}
	else
	{
		if($wpdb->insert($wpdb->prefix.'newsletter', $data))
                {
                    $result = "Bạn đã đăng ký nhận bản tin qua email thành công.";
                    $result .= "\n Thông tin của bạn sẽ được chúng tôi xử lý trong thời gian sớm nhất.";

                    $tempemail->email_template_newsletter($newsletter,$sessionID);
		}
		else
			$result = "Đăng ký nhận email thất bại.";
	}
	print_r($result);
	die(); // stop executing script
}
add_action( 'wp_ajax_newsletter_ajax_register', 'ajax_action_newsletter_ajax_register' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_newsletter_ajax_register', 'ajax_action_newsletter_ajax_register' ); // ajax for not logged in users


