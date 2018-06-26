<?php
function webseo24h_tie_single_shop_info()
{
    global $authordata;   
    $create_date = $authordata->user_registered;
    $create_email = $authordata->user_email;    
    $author_meta = get_user_meta(get_the_author_meta('ID'));
    //print_r(get_user_meta(get_the_author_meta('ID')));
        
    
?>
<div class="ttch_shop_pd">
                    
    <div class="m_spd">

        <h4 class="t_spd">
            Bởi: 
            <?php echo '<a class="author-link" href="'.get_author_posts_url($authordata->ID).'">'.$author_meta['nickname'][0].'</a>';?>
            <a class="home_t_spd" href="#" title=""></a>
        </h4><!-- End .t_spd -->

        <div class="f_spd">
            <ul>
                <?php if($create_date):?>
                <li>
                    <div class="l_f_spd">
                            Ngày tạo
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                            <span class="s2_r_f_spd"><?php echo $create_date;?></span>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php endif;?>
                
                <?php if($author_meta['support_name'][0]): ?>
                <li>
                    <div class="l_f_spd">
                            Tư vấn
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                            <span class="s2_r_f_spd"><?php echo $author_meta['support_name'][0];?></span>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php endif;?>
                
                <?php if($author_meta['phone'][0]):?>
                <li>
                    <div class="l_f_spd">
                            Điện thoại
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                            <span class="s2_r_f_spd" style="color: #FDA700; font-size: 14px;"><?php echo $author_meta['phone'][0];?></span>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php endif;?>
                
                <?php if($author_meta['phone_2'][0]):?>
                <li>
                    <div class="l_f_spd">
                            Hoặc
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                            <span class="s2_r_f_spd" style="color: #FDA700; font-size: 14px;"><?php echo $author_meta['phone_2'][0];?></span>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php endif;?>
                
                <li>
                    <div class="l_f_spd">
                            Địa chỉ
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                        <span class="s2_r_f_spd">
                            <?php 
                            echo $author_meta['address_info_address'][0];
                            
                            if($author_meta['address_info_district'][0])
                                echo ' - ' . $author_meta['address_info_district'][0];
                            if($author_meta['address_info_city'][0])
                                echo ' - ' . $author_meta['address_info_city'][0];
                            ?>                            
                        </span>
                    </div>
                    <div class="clear"></div>
                </li>
                
                <?php if($create_email):?>
                <li>
                    <div class="l_f_spd">
                            Email
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                        <span class="s2_r_f_spd">
                            <a href="#" title=""><?php echo $create_email;?></a>
                        </span>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php endif;?>
                             
                <li>
                    <div class="l_f_spd">
                            Tình trạng
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd">:</span>
                        <span class="s2_r_f_spd">Đã xác thực</span>
                    </div>
                    <div class="clear"></div>
                </li>
                
                <li>
                    <div class="l_f_spd" style="padding-top:5px;">
                            Hỗ trợ
                    </div>
                    <div class="r_f_spd">
                            <span class="s1_r_f_spd" style="padding-top:5px;">:</span>
                        <span class="s2_r_f_spd">
                            <?php if($author_meta['yahoo'][0]):?>
                            <a class="sp_spd" href="ymsgr:sendIM?<?php echo $author_meta['yahoo'][0];?>" title="">
                                <img src='http://opi.yahoo.com/online?u=<?php echo $author_meta['yahoo'][0];?>&m=g&t=1&l=vi' alt ='' />
                            </a>
                            <?php 
                            endif;
                            if($author_meta['skype'][0]):
                            ?>
                            <a class="sp_spd" href="skype:<?php echo $author_meta['skype'][0];?>?call" title="">
                                <img alt="Talk with me via Skype" src="http://mystatus.skype.com/mediumicon/<?php echo $author_meta['skype'][0];?>">
                            </a>
                            <?php endif;?>
                        </span>
                    </div>
                    <div class="clear"></div>
                </li>
            </ul>
        </div><!-- End .f_spd -->

    </div><!-- End .m_spd -->

    <?php if(tie_get_option('note_shop_display')):?>
    <div class="note_spd">
        Chú ý: <?php echo tie_get_option('note_shop');?> Vui lòng tham khảo cách mua hàng an toàn <a href="<?php bloginfo('url');?>/cach-mua-hang-an-toan" title="">tại đây</a>
    </div><!-- End .note_spd -->
    <?php endif;?>
    
    <?php if(tie_get_option('note_shop_vip')):?>
    <div class="img_ctgh">
            <center>
                    <a href="#" title=""></a>
        </center>
    </div><!-- End .img_ctgh -->
    <?php endif;?>

</div><!-- End .ttch_shop_pd -->
<?php
}

webseo24h_tie_single_shop_info();
