<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
global $meta_boxes,$wpdb,$options;
$prefix = $wpdb->prefix;



$meta_boxes = array();


// thong tin lien he
$meta_boxes[] = array(
		'id'    => 'additional_infomation_product',
		'title' => __("<b>Thông tin thêm về sản phẩm</b>",THEME_NAME),
		'pages' => array('post'),
		'fields' => array(
			array(
					'name' => 'Mã sản phẩm',
					'desc' => '
						Nhập Mã sản phẩm: (ví dụ: felica001)
					',
					'id'   => "{$prefix}code",
					'type' => 'text',
			),
                        array(
					'name' => 'Giá sản phẩm',
					'desc' => '
						Nhập giá sản phẩm - Giá gốc chưa giảm giá: (ví dụ: 100000)					
					',
					'id'   => "{$prefix}price",
					'type' => 'text',
			),
                        array(
					'name' => 'Giá Sỉ sản phẩm',
					'desc' => '
						Nhập giá sỉ sản phẩm - Giá Sỉ (ví dụ: 100000)					
					',
					'id'   => "{$prefix}price_si",
					'type' => 'text',
			),
			array(
					'name' => 'Giảm giá',
					'desc' => '
						Nhập giảm giá sản phẩm: (ví dụ: 800000)
					',
					'id'   => "{$prefix}discount",
					'type' => 'text',
			),                        
			
			array(
					'name' => 'Trọng lượng sản phẩm',
					'desc' => '
						Trọng lượng thực tế của sản phẩm (Đơn vị tính gram): (ví dụ: 100)
					',
					'id'   => "{$prefix}weight",
					'type' => 'text',
			),
			array(
					'name' => 'Trọng lượng Tính phí giao hàng',
					'desc' => '
						Nhập trọng lượng để tính phí giao hàng  sản phẩm (Đơn vị tính gram): (ví dụ: 100)
					',
					'id'   => "{$prefix}weight_ship",
					'type' => 'text',
			),                                   
                        array(
                                'name' => 'Tình trạng còn hàng',
                                'id'   => "{$prefix}state",
                                'type' => 'select',
                                // Array of 'value' => 'Label' pairs for select box
                                'options' => webseo24h_tie_stock_state(),
                                // Select multiple values, optional. Default is false.
                                'multiple' => true,
                                // Default value, can be string (single value) or array (for both single and multiple values)
                                'std'  => array( 'conhang' ),
                                'desc' => 'Tình trạng còn hàng',
                        ),                    
			array(
					'name' => 'Lần hiển thị',
					'desc' => '
						Số lần xem bài viết , chỉ nhập số
					',
					'id'   => "{$prefix}showpostview",
					'type' => 'text',
					'std'  => 2
			),
                        array(
                                'name' => 'Phạm vi bán',
                                'id'   => "{$prefix}area",
                                'type' => 'select',
                                // Array of 'value' => 'Label' pairs for select box
                                'options' => webseo24h_tie_area_get_all(),
                                // Select multiple values, optional. Default is false.
                                'multiple' => true,
                                // Default value, can be string (single value) or array (for both single and multiple values)
                                'std'  => array( 'conhang' ),
                                'desc' => 'Tình trạng còn hàng',
                        ),                        
                        // CHECKBOX LIST
                        array(
                                'name' => 'Màu sắc',
                                'id'   => "{$prefix}color",
                                'type' => 'checkbox_list',
                                // Options of checkboxes, in format 'value' => 'Label'
                                'options' => webseo24h_tie_color_get(),
                                'desc' => 'Chọn các màu cho sản phẩm',
                        ),
                        // CHECKBOX LIST
                        array(
                                'name' => 'chọn size',
                                'id'   => "{$prefix}size",
                                'type' => 'checkbox_list',
                                // Options of checkboxes, in format 'value' => 'Label'
                                'options' => webseo24h_tie_size_get(),
                                'desc' => 'Chọn các size hiển thị cho sản phẩm',
                        ),                
                        array(
                                'name'             => 'Hình ảnh sản phẩm',
                                'desc'             => 'Các hình ảnh sản phẩm  tối đa 7 hình <br/> kích thước dang vuông tối đa 470x470',
                                'id'               => "{$prefix}photos",
                                'type'             => 'plupload_image',
                                'max_file_uploads' => 4,
                        )                       
		)
);


// thong tin slide show
$meta_boxes[] = array(
		'id'    => 'additional_infomation_slide_show',
		'title' => __("<b>Link liên kết</b>",THEME_NAME),
		'pages' => array('sliders'),
		'fields' => array(
                        array(
                                        'name' => 'Link liên kết',
                                        'desc' => '
                                        Nhập link liên kết',
                                        'id'   => "{$prefix}url",
                                        'type' => 'text',
			),
                        array(
                                       'name' => 'Hình slider show',
                                       'desc' => '
                                       <span style="color:#ff0000;"> Tải hình slider show kích thước: 660x260 px </span>',
                                       'id'   => "{$prefix}slider-thumb",
                                       'type' => 'image',
			)
		)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );


?>