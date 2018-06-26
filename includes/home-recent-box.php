<?php
function get_home_recent( $cat_data ){

    global $wpdb;
    $exclude = $Posts = $Box_Title = $pagination = $offset = '';
	
	$exclude = (!empty($cat_data['exclude'])) ? $cat_data['exclude'] : '';			
	$Posts = (!empty($cat_data['number'])) ? $cat_data['number'] : '';	
    $Box_Title = (!empty($cat_data['title'])) ? $cat_data['title'] : '';
    $Box_Style = (!empty($cat_data['title_style'])) ? $cat_data['title_style'] : '';        
    $Box_url = (!empty($cat_data['title_url'])) ? $cat_data['title_url'] : '';
    $Box_logo = (!empty($cat_data['title_images'])) ? $cat_data['title_images'] : '';    
    $Box_bigimage = (!empty($cat_data['title_bigimages'])) ? $cat_data['title_bigimages'] : '';    
    $Box_bigimage_show = (!empty($cat_data['title_bigimages_show'])) ? $cat_data['title_bigimages_show'] : '';    
    $Box_bigimage_pos = (!empty($cat_data['title_bigimages_pos'])) ? $cat_data['title_bigimages_pos'] : '';
		
	$display = (!empty($cat_data['display'])) ? $cat_data['display'] : '';
	$pagination = (!empty($cat_data['pagi'])) ? $cat_data['pagi'] : '';	
	$offset = (!empty($cat_data['offset'])) ? $cat_data['offset'] : '';

	//$args = array ( 'posts_per_page' => $Posts , 'category__in' => $exclude , 'offset' => $offset, 'ignore_sticky_posts' => 1   );
        $args = array ( 'posts_per_page' => $Posts , 'category__in' => $exclude , 'offset' => $offset);
	if ( !empty( $pagination ) && $pagination == 'y' ) $args[ 'paged' ] = get_query_var('paged');
	else $args[ 'no_found_rows' ] = 1 ;
	
	$cat_query = new WP_Query( $args ); 
        ?>

        <div class="block_prodduct">
                    
                <?php if($Box_logo):?>  
                <h2 class="title_product <?php echo $Box_Style;?>">                                          
                    <a href="<?php echo $Box_url;?>"><img src="<?php echo $Box_logo;?>" alt="<?php echo $Box_Title;?>"/></a>                                           
                </h2><!-- End .title_product1 -->
                 <?php 
                    else:
                    ?>   
                    <h2 class="<?php echo $Box_Style;?>_title_2">
                        <label><?php echo $Box_Title;?></label>
                    </h2>
                    <?php
                    endif;
                    ?>

                <div class="m_b_p" id="cha_float1">

                    <?php if($Box_bigimage && $Box_bigimage_show=='y'):?>
                    <div class="f_Float1" <?php if($Box_bigimage_pos=='left') echo 'style="float:left;"';?>>
                        
                        <?php if($Box_url!=''):?>
                        <a href="<?php echo $Box_url;?>">
                            <img src="<?php echo $Box_bigimage;?>" alt="<?php echo $Box_Title;?>"/>    
                        </a> 
                        <?php 
                        else:
                        ?>
                            <img src="<?php echo $Box_bigimage;?>" alt="<?php echo $Box_Title;?>"/>
                        <?php
                        endif;
                        ?>                        
                    </div><!-- End .f_Fw2 -->
                    <?php endif;?>

                    <div class="f_Float2">

                            <div class="full_width">

                            <ul>
                                <?php if($cat_query->have_posts()):?>
                                <?php 
                                    while ($cat_query->have_posts()):$cat_query->the_post();
                                    $postmetas = get_post_custom(get_the_ID());
                                    
                                    $price      = isset($postmetas[$wpdb->prefix.'price'][0]) ? $postmetas[$wpdb->prefix.'price'][0] : '';
                                    $discount   = isset($postmetas[$wpdb->prefix.'discount'][0]) ? $postmetas[$wpdb->prefix.'discount'][0] : '';
                                ?>
                                    <li>
                                        <div class="overflow_box">  
                                            <div class="sp_i_wf">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                                <?php 
                                                                if(has_post_thumbnail())
                                                                    the_post_thumbnail('thumbnail');
                                                                ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div><!-- End .sp_i_wf -->
                                            <?php 
                                               webseo24h_tie_format_price_discount_show_return($price, $discount, true);
                                            ?>
                                            <div class="name_wf">
                                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                        <?php the_title();?>
                                                    </a>
                                            </div><!-- End .name_wf -->
                                            
                                        </div>    
                                    </li>
                                <?php endwhile;?>
                                <?php endif;?>
                                
                            </ul>

                        </div><!-- End .full_width -->

                    </div><!-- End .f_Fw1 -->

                    <div class="clear"></div>

                </div><!-- End .m_b_p -->

            </div><!-- End .block_prodduct -->

        <?php
}
