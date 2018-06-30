<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ajax_load_fc_ajax_act_load_tab_new_views_hot()
{
	global $wpdb;	
        $tab_id = $_REQUEST['tabid'];
        $numberpost = 3;
        $posttype  = 'post';
        
        if($tab_id==2)
        {
            $args = array(
                'post_type'         => $posttype,
                'posts_per_page'    => $numberpost,
                'meta_key'          => $wpdb->prefix.'showpostview',
                'orderby'           => 'meta_value_num'                
            );
        }
        else if($tab_id==3)
        {
            $args = array(
                'post_type'         => $posttype,
                'posts_per_page'    => $numberpost,
                'orderby'           => 'modified'
            );
        }
        else
        {
            $args = array(
                'post_type'         => $posttype,
                'posts_per_page'    => $numberpost,                
            );
        }
        
        $tab_views = new WP_Query($args);
        
        $html = '';
        
        $html .= ' 
            <style type="text/css">
                    .clear{clear:both;}
                    .m_slider_B{padding:20px 0 0 0; background:#fff;}
                    .m_slider_B ul li{float:left; width:213px; margin-left:0; position:relative; min-height:80px;}
                    .m_slider_B ul li + li{margin-left:10px;}
                    .sp_i_m_slider_B{width:80px; float:left;}
                    .sp_i_m_slider_B table{width:100%; height:100%;}
                    .sp_i_m_slider_B table td{vertical-align:middle; text-align:center;}
                    .sp_i_m_slider_B table td img{max-width:80px; max-height:80px;}
                    .info_m_slider_B{overflow:hidden; padding-left:10px; position:relative; min-height:80px;}
                    .info_m_slider_B h4{font-weight:normal;}
                    .info_m_slider_B h4 a{color:#004b91;}
                    .info_m_slider_B h4 a:hover{color:#e77911; text-decoration:underline;}
                    .price1{color:#7a7a7b; display:block; padding-top:5px; text-decoration:line-through;}
                    .price2{color:#e80000; display:block; padding-top:5px;}
                    .info_m_slider_B .group-price{text-align:left; padding-left:10px;}
            </style>

            <div class="m_slider_B">

                    <div class="row">';
                    
                    if($tab_views->have_posts())
                    {
                        while ($tab_views->have_posts())
                        {
                            $tab_views->the_post();
                            
                            $postmetas = get_post_custom(get_the_ID());                                    
                            $price      = $postmetas[$wpdb->prefix.'price'][0];
                            $discount   = $postmetas[$wpdb->prefix.'discount'][0];
                            
                            $html .= ' 
                                <div class="col-lg-4 col-md-4 mb-12">
                                    <div class="sp_i_m_slider_B">
                                    <table>
                                            <tr>
                                            <td>
                                                <a href="'.  get_permalink().'" title="'.  get_the_title().'">';
                                                    if(has_post_thumbnail())
                                                    {
                                                        $html .= get_the_post_thumbnail(get_the_ID(),'thumbnail');
                                                    }    
                            $html .= ' 
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    </div><!-- End .sp_i_m_slider_B -->
                                    <div class="info_m_slider_B">
                                        <h4>
                                                <a href="'.  get_permalink().'" title="'.  get_the_title().'">'.  get_the_title().'</a>
                                        </h4>';
                            $html .= webseo24h_tie_format_price_discount_show_return($price, $discount, FALSE);           
                            $html .= ' 
                                    </div><!-- End .info_m_slider_B -->
                                </div>
                                    ';
                            
                        }
                    }
                    else {
                        $html .= '<p style="display: block; padding: 20px 2%; float: left; width: 96%; color: #ff853c;"></p>';
                    }
                    wp_reset_postdata();
                    
            $html .= ' 
                    </div>

                <div class="clear"></div>

            </div><!-- End .m_slider_B -->
                ';
        
        print_r(json_encode($html));    
        
	die(); // stop executing script
}

add_action( 'wp_ajax_ajax_act_load_tab_new_views_hot', 'ajax_load_fc_ajax_act_load_tab_new_views_hot' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_act_load_tab_new_views_hot', 'ajax_load_fc_ajax_act_load_tab_new_views_hot' ); // ajax for not logged in users



