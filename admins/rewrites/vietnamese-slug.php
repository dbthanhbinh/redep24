<?php
/*
    Plugin Name: Slug Tiếng Việt
    Plugin URI: http://vietta.vn
    Description: Plugin loại bỏ dấu và hạn chế ký tự trong slug (ur);
    Author: Phạm Văn Thanh
    Version: 1.1
    Author URI: http://vietta.vn
*/

//add_filter('name_save_pre', 'vietnamese_slug', 0);

function vietnamese_slug($slug) {
    if ($slug) return $slug;
    
    $title = ($_POST['post_title']);
    $title = slug_trim($title);
	$title = vietnamese_to_english_characters($title);
	$title = sanitize_title($title);
    return $title;
}

 
 function vietnamese_to_english_characters ($str){  
         $unicode = array(  
             'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',  
             'd'=>'đ',  
             'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',  
             'i'=>'í|ì|ỉ|ĩ|ị',  
             'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',  
             'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',  
             'y'=>'ý|ỳ|ỷ|ỹ|ỵ',  
             'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',  
             'D'=>'Đ',  
             'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',  
             'I'=>'Í|Ì|Ỉ|Ĩ|Ị',  
             'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',  
             'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',  
             'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',  
         );  
           
        foreach($unicode as $nonUnicode=>$uni){  
             $str = preg_replace("/($uni)/i", $nonUnicode, $str);  
        }  
         return strtolower($str);  
}  

function slug_trim($title,$max = 60) {
		$title = str_replace(']]>', ']]&gt;', $title);
        $title = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $title );
        $title = preg_replace('/&.+?;/', '', $title); 
		$title = strip_tags($title);
		if (strlen($title)>$max  )
        {
           for ($i=$max; $i>0; $i--)  {
              if(substr($title, $max,1) ==' ')
              {
                $text = substr($title, 0, $i);
                break;
              }
           }
		}
		return trim(stripcslashes($title));
}

