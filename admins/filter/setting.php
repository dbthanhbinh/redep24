<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// modify Set featured image
function custom_admin_post_thumbnail_html( $content ) {
	return $content = str_replace( __( 'Set featured image' ), __( ' - Hình đại diện sản phẩm Kích thước 470x470 px' ), $content);
}
add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );
