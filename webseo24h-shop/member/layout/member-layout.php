<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function db_create_date_month_year($len,$gclass,$gid,$current,$label)
{
    $html = '<select class="'.$gclass.'" id="'.$gid.'">';
    $html .= '<option value="0">'.$label.'</option>';
    for($i=1 ; $i<=$len ; $i++)
    {
        if($current==$i)
            $html .= '<option selected="selected" value="' . $i . '"> ' . $i . ' </option>';
        else
            $html .= '<option value="' . $i . '"> ' . $i . ' </option>';
    }
    $html .= '</select>';
    
    return $html;
}

function db_create_month_year($gclass,$gid,$current,$label)
{
    $currentY = date('Y');
    $minY = $currentY-70;
    
    $html = '<select class="'.$gclass.'" id="'.$gid.'">';
    $html .= '<option value="0">'.$label.'</option>';
    for($i=$currentY ; $i>=$minY ; $i--)
    {
        if($current==$i)
            $html .= '<option selected="selected" value="' . $i . '"> ' . $i . ' </option>';
        else
            $html .= '<option value="' . $i . '"> ' . $i . ' </option>';
    }
    $html .= '</select>';
    
    return $html;
}

function member_layout_voucher_form()
{
    $html = ' 
            <h4 class="title_lfdn">Sử dụng voucher</h4>
                <ul style="margin-top:7px;" class="ul_m_lfdn">
                    <li>
                        <div class="l_lfdn">
                            Nhập mã Voucher
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">
                            <input class="ipt_lfdn" style="width:70px;" name="voucher_code" id="voucher_code" type="text" value=""/> 
                            <input type="button" name="use_voucher_code" id="use_voucher_code" class="btn_lfdn" value="Áp dụng" />
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="l_lfdn">
                            &nbsp;
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn voucher-intro">
                            <label>- Nếu bạn có mã Voucher hợp lệ => Nhập mã voucher và click "Áp dụng"</label> 
                            <label> <a target="_blank" href="#"> Sử dụng voucher như thế nào? </a> </label>
                            <label> <a target="_blank" href="#"> Tôi muốn có voucher? </a> </label>
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    
                </ul>
            ';
    return $html;
}

function member_layout_user_edit_form()
{
    $html = ' 
        <div class="l_f_dn">
                    
            <div class="m_lfdn">

                    <h4 class="title_lfdn">Thông tin cá nhân</h4>
                <div class="main_lfdn">

                    <form>
                            <ul class="ul_m_lfdn">
                            <li>
                                    <div class="l_lfdn">
                                    Email
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <input class="ipt_lfdn" type="text" value=""/>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Họ và tên
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <input class="ipt_lfdn" type="text" value=""/>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Ngày sinh
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <div class="f_ns">
                                            <ul>
                                            <li>
                                                    <select>
                                                    <option>Ngày</option>
                                                </select>
                                            </li>
                                            <li>
                                                    <select>
                                                    <option>Tháng</option>
                                                </select>
                                            </li>
                                            <li>
                                                    <select>
                                                    <option>Năm</option>
                                                </select>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div><!-- End .f_ns -->
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Giới tính
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">

                                    <div class="f_gt">
                                            <ul>
                                            <li>
                                                    <input id="s_nam" type="radio" checked="checked"/>
                                                <label for="s_nam">Nam</label>
                                            </li>
                                            <li>
                                                    <input id="s_nu" type="radio"/>
                                                <label for="s_nu">Nữ</label>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div><!-- End .f_gt -->

                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Địa chỉ
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <input class="ipt_lfdn" type="text" value=""/>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Điện thoại
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <input class="ipt_lfdn" type="text" value=""/>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Tỉnh/Thành phố
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <select class="s_ttp">
                                            <option>Chọn tỉnh/thành phố</option>
                                    </select>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    Quận huyện
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">
                                    <select class="s_ttp">
                                            <option>Chọn quận/huyện</option>
                                    </select>
                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                            <li>
                                    <div class="l_lfdn">
                                    &nbsp;
                                </div><!-- End .l_lfdn -->
                                <div class="r_lfdn">

                                    <input class="btn_lfdn" type="submit" value="Cập nhật thông tin"/>

                                </div><!-- End .r_lfdn -->
                                <div class="clear"></div>
                            </li>
                        </ul>
                    </form>

                </div><!-- End .main_lfdn -->

            </div><!-- End .m_lfdn -->

        </div><!-- End .l_f_dn -->

        <div class="r_f_dn">

            <div class="block_rfdn">
                    <h4 class="title_rfdn">Quản lý thông tin</h4>
                <div class="m_rfdn">
                    <ul class="ul_rfdn">
                            <li><a href="#" title="">Thông tin cá nhân</a></li>
                            <li><a href="#" title="">Đổi mật khẩu</a></li>
                            <li><a href="#" title="">Thoát</a></li>
                    </ul>
                </div><!-- End .m_rfdn -->
            </div><!-- End .block_rfdn -->

        </div><!-- End .r_f_dn -->

        <div class="clear"></div>
            ';
    
    return $html;
}


function member_layout_login_form()
{
    $html = ' 
            <div class="l_f_dn">

                <div class="m_lfdn">

                        <h4 class="title_lfdn">'.__("Đăng nhập",THEME_NAME).'</h4>
                    <div class="main_lfdn">

                        <form>
                                <ul class="ul_m_lfdn">
                                <li>
                                        <div class="l_lfdn">
                                        '.__("Địa chỉ email",THEME_NAME).'
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <input class="ipt_lfdn" name="member_login_email" id="member_login_email" type="text" value=""/>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                <li>
                                        <div class="l_lfdn">
                                        '.__("Nhập mật khẩu",THEME_NAME).'
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <input class="ipt_lfdn" name="member_login_pass" id="member_login_pass" type="password" value=""/>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                <li>
                                        <div class="l_lfdn">
                                        &nbsp;
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <div class="" id="member_processing_mess">Điền đủ thông tin để đăng nhập.</div>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                
                                <li>
                                        <div class="l_lfdn">
                                        &nbsp;
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">

                                        <input class="btn_lfdn" id="member_login_btn" type="button" value="Đăng nhập"/>
                                        
                                        <label><a href="#" id="member_lostpass_act"> '.__("Quên mật khẩu",THEME_NAME).' </a></label>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </form>

                    </div><!-- End .main_lfdn -->

                </div><!-- End .m_lfdn -->

            </div><!-- End .l_f_dn -->
            ';
    
    return $html;
}

function member_layout_main_login($disabled)
{
    global $ws24hShop;
    $html = ' 
            <div class="main_lfdn" style="width:320px;">

                <form>
                    <ul class="ul_m_lfdn">
                        <!--<li>
                            <div class="l_lfdn">
                                '.__("Đăng nhập với",THEME_NAME).'
                            </div>
                            <div class="r_lfdn">
                                facebook
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                                <div class="l_lfdn">
                                '.__("Địa chỉ email",THEME_NAME).'
                            </div>
                            <div class="r_lfdn">
                                <input class="ipt_lfdn" type="text" value=""/>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li>
                                <div class="l_lfdn">
                                '.__("Nhập mật khẩu",THEME_NAME).'
                            </div>
                            <div class="r_lfdn">
                                <input class="ipt_lfdn" type="password" value=""/>
                            </div>
                            <div class="clear"></div>
                        </li>
                         -->       
                        <li>                             
                            <div class="r_lfdn">
                                <input class="btn_lfdn" id="member_login_act1" style="width:180px;" type="button" '.$disabled.' value="Đăng nhập & Mua hàng"/>
                            </div><!-- End .r_lfdn -->
                            <div class="r_lfdn" style="margin-top:7px;">
                                <label><a href=""> '.__("Quên mật khẩu",THEME_NAME).' </a></label>
                            </div><!-- End .r_lfdn -->
                            <div class="clear"></div>
                        </li>
                        <li>                            
                            <div class="r_lfdn">
                                <a class="btn_lfdn afix_btn_lfdn" '.$disabled.' style="width:180px;" href="'.$ws24hShop->shopCartUrlPage.'">Đặt hàng không cần đăng ký</a>
                            </div><!-- End .r_lfdn -->
                            <div class="clear"></div>
                        </li>
                    </ul>
                </form>

            </div><!-- End .main_lfdn -->
            ';
    return $html;
}

// info order
function member_layout_main_order($disabled){
    global $ws24hShop,$member;
        $shopDataInfo = [];    
        $form_check = 'this_check';
        $class_df = '';
        
        $html = '<div class="main_lfdn enter-info-this-order">';    
            if($member->member_check_login())
            {
                $html .= member_layout_form_is_loged($class_df);
                $class_df = "display:none;";
                
                $display_name   = $member->member_get_user_display_name();
                $email          = $member->member_get_user_email();
                $phone          = $member->member_get_user_phone();
                $address        = $member->member_get_user_address();
                $district       = $member->member_get_user_district();
                $cities         = $member->member_get_user_cities();
                $register       = 'register';
                
                $html .= member_layout_form_check($form_check,$class_df,$display_name,$email,$phone,$address,$district,$cities);
                
                $shopDataInfo = $ws24hShop->shop_get_data_info($display_name,$email,$phone,$address,$district,$cities,$register);
            }
            else
            {
                $class_df = "";
                
                $display_name   = '';
                $email          = '';
                $phone          = '';
                $address        = '';
                $district       = '';
                $cities         = '';
                $register       = '';
                
                $html .= member_layout_form_check($form_check,$class_df,$display_name,$email,$phone,$address,$district,$cities);
                
                $shopDataInfo = $ws24hShop->shop_get_data_info($display_name,$email,$phone,$address,$district,$cities,$register);
            }
            
            // set order infomation
            $ws24hShop->shopCartSetShopInfomation($shopDataInfo);            
            
            
        $html .= ' 
            <ul style="margin-top:7px;" class="ul_m_lfdn">
                <li>
                    <div class="l_lfdn">
                        &nbsp;
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">
                        <input id="received_address" type="checkbox" '.$disabled.' value="other"/> <b> Giao hàng địa chỉ khác </b>
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
            </ul>';
               
        $form_check = 'other_check';
        $class_df = "display:none;";
            
        $html .= member_layout_form_check($form_check,$class_df,'','','','','','');
    
        $html .= ' 
                <h4 class="title_lfdn">Phương thức thanh toán</h4>
                <ul style="margin-top:7px;" class="ul_m_lfdn">
                    <li>
                        <div style="height:18px;" class="l_lfdn">
                            &nbsp;
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn" style="height:18px;">
                            <input name="payment_method" '.$disabled.' class="payment_method" type="radio" value="COD"/> Thanh toán tại nhà (COD)
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div style="height:18px;" class="l_lfdn">
                            &nbsp;
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn" style="height:18px;">
                            <input name="payment_method" '.$disabled.' class="payment_method" type="radio" value="CHUYENKHOAN"/> Chuyển khoản ngân hàng
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div style="height:18px;" class="l_lfdn">
                            &nbsp;
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn" id="payment_method_error">
                           
                        </div><!-- End .r_lfdn -->                        
                    </li>
                </ul>';
    
        //$html .= member_layout_voucher_form();        
    
        $html .= ' 
                <h4 class="title_lfdn">Qui định mua hàng</h4>
                <ul style="margin-top:7px;" class="ul_m_lfdn">
                    <li>
                        <div class="l_lfdn">
                            &nbsp;
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">
                            <label style="margin-bottom:10px; width:100%; display:inline-block;">
                                <a target="_blank" href="'.  get_bloginfo("url").'/quy-dinh-mua-hang">Xem quy định mua hàng</a>
                            </label>
                            <div class="checkbox_i_agree" id="checkbox_i_agree">
                                <input type="checkbox" name="i_agree" class="i_agree" checked="checked" id="i_agree" value="agree" style="float:left; margin-right:5px;"/> 
                                <b class="bi_agree"> Tôi đồng ý </b>
                            </div>
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                </ul>';
        $html .= '</div><!-- End .main_lfdn -->';    
    return $html;
}


function member_layout_form_check($form_check,$class_df,$display_name,$email,$phone,$address,$district,$cities)
{
    $html = '';
    global $member; 
        $html .= ' 
            <ul id="'.$form_check.'" class="ul_m_lfdn" style="'.$class_df.'">
                <li>
                    <div class="l_lfdn">
                        Họ và tên
                        <input type="hidden" id="member_check_login_order" value="'.$member->member_check_login().'" />
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">
                        <input id="fullname_'.$form_check.'" name="fullname_'.$form_check.'" class="ipt_lfdn" rel="validName" type="text" value="'.$display_name.'"/>
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
                <li>
                        <div class="l_lfdn">
                        Email
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">
                        <input id="email_'.$form_check.'" name="email_'.$form_check.'" class="ipt_lfdn" rel="validEmail" type="text" value="'.$email.'"/>
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
                <li>
                        <div class="l_lfdn">
                        Điện thoại
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">
                        <input id="phone_'.$form_check.'" name="phone_'.$form_check.'" class="ipt_lfdn" rel="validPhone" type="text" value="'.$phone.'"/>
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
                <li>
                        <div class="l_lfdn">
                        Tỉnh/Thành phố
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">';
        
                    if($class_df=='display:none;' && $form_check=='this_check')
                    {
            $html .= '<input type="hidden" id="cities_'.$form_check.'" value="'.$cities.'" />';            
                    }
                    else
                    {
            $html .= ' 
                    <select id="cities_'.$form_check.'" name="cities_'.$form_check.'" rel="districts_'.$form_check.'" class="s_ttp">

                    </select>
                    ';            
                    }    
        
            $html .= '                         
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
                <li>
                        <div class="l_lfdn">
                        Quận huyện
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">';
                    if($class_df=='display:none;' && $form_check=='this_check')
                    {
            $html .= '<input type="hidden" id="districts_'.$form_check.'" value="'.$district.'" />';            
                    }
                    else
                    {
            $html .= ' 
                    <select id="districts_'.$form_check.'" name="districts_'.$form_check.'" rel="valid_'.$form_check.'" class="s_ttp">

                    </select>
                    ';            
                    }
            $html .= '                     
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li> 
                <li>
                        <div class="l_lfdn">
                        Địa chỉ
                    </div><!-- End .l_lfdn -->
                    <div class="r_lfdn">
                        <input id="address_'.$form_check.'" name="address_'.$form_check.'" class="ipt_lfdn" rel="validAddress" type="text" value="'.$address.'"/>
                    </div><!-- End .r_lfdn -->
                    <div class="clear"></div>
                </li>
            </ul>
                ';  
    return $html;
}

function member_layout_form_is_loged($class_df)
{
    global $member;
    $html .= '<ul class="ul_m_lfdn" style="'.$class_df.'">';
        $html .= ' 
                    <li>
                        <div class="l_lfdn">
                            Họ và tên
                            <input type="hidden" id="member_check_login_order" value="'.$member->member_check_login().'" />
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">
                            ' . $member->member_get_user_display_name() . '
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="l_lfdn">
                            Email
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">
                            ' . $member->member_get_user_email() . '
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="l_lfdn">
                            Điện thoại
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">
                            '.$member->member_get_user_phone().'
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>

                    <li>
                            <div class="l_lfdn">
                            Địa chỉ
                        </div><!-- End .l_lfdn -->
                        <div class="r_lfdn">';
        
                        if($member->member_get_user_address())
                            $html .= $member->member_get_user_address();
                        if($member->member_get_user_district())
                            $html .= ' - ' . $member->member_get_user_district();
                        if($member->member_get_user_cities())
                            $html .= ' - ' . $member->member_get_user_cities();
                            
        $html .= ' 
                        </div><!-- End .r_lfdn -->
                        <div class="clear"></div>
                    </li>
                 ';
        $html .= '</ul>';
        
        return $html;
}

function member_layout_form_is_login($form_check,$class_df)
{    
    global $member;

    $html = '';    
    if($member->member_check_login()):
        
        $html .= '';
        
    endif;
    
    return $html;
}

function member_layout_form_check_hidden($form_check,$class_df)
{
    global $member;
    $html = '';
    $html .= ' 
        <ul id="'.$form_check.'" class="ul_m_lfdn" style="'.$class_df.'">
            <li>
                <div class="l_lfdn">
                    Họ và tên
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input id="fullname_'.$form_check.'" name="fullname_'.$form_check.'" class="ipt_lfdn" rel="validName" type="text" value="' . $member->member_get_user_display_name() . '"/>
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>
            <li>
                    <div class="l_lfdn">
                    Email
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input id="email_'.$form_check.'" name="email_'.$form_check.'" class="ipt_lfdn" rel="validEmail" type="text" value="' . $member->member_get_user_email() . '"/>
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>
            <li>
                    <div class="l_lfdn">
                    Điện thoại
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input id="phone_'.$form_check.'" name="phone_'.$form_check.'" class="ipt_lfdn" rel="validPhone" type="text" value="'.$member->member_get_user_phone().'"/>
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>

            <li>
                    <div class="l_lfdn">
                    Địa chỉ
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input id="address_'.$form_check.'" name="address_'.$form_check.'" class="ipt_lfdn" rel="validAddress" type="text" value="'.$member->member_get_user_address().'"/>
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>

            <li>
                    <div class="l_lfdn">
                    Tỉnh/Thành phố
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input type="hidden" id="cities_'.$form_check.'" value="'.$member->member_get_user_cities().'" />                    
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>
            <li>
                    <div class="l_lfdn">
                    Quận huyện
                </div><!-- End .l_lfdn -->
                <div class="r_lfdn">
                    <input type="hidden" id="district_'.$form_check.'" value="'.$member->member_get_user_district().'" />                   
                </div><!-- End .r_lfdn -->
                <div class="clear"></div>
            </li>                                                        
        </ul>
            ';
    return $html;
}

// change password
function member_layout_change_password_form()
{
    $html = ' 
            <div class="l_f_dn">

                <div class="m_lfdn">

                        <h4 class="title_lfdn">Đổi mật khẩu</h4>
                    <div class="main_lfdn">

                        <form>
                                <ul class="ul_m_lfdn">
                                <li>
                                        <div class="l_lfdn">
                                        Mật khẩu hiện tại
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <input class="ipt_lfdn" type="password" value=""/>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                <li>
                                        <div class="l_lfdn">
                                        Nhập lại mật khẩu
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <input class="ipt_lfdn" type="password" value=""/>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                <li>
                                        <div class="l_lfdn">
                                        Mã xác nhận
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">
                                        <input class="ipt_lfdn2" type="text" value=""/>
                                        <div class="img_capcha2">
                                            <img class="img_cap" align="absmiddle" src="http://vuongphatco.com/scripts/capcha/dongian.php">
                                        </div>
                                        <div class="clear"></div>
                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                                <li>
                                        <div class="l_lfdn">
                                        &nbsp;
                                    </div><!-- End .l_lfdn -->
                                    <div class="r_lfdn">

                                        <input class="btn_lfdn" type="submit" value="Đổi mật khẩu"/>

                                    </div><!-- End .r_lfdn -->
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </form>

                    </div><!-- End .main_lfdn -->

                </div><!-- End .m_lfdn -->

            </div><!-- End .l_f_dn -->
            ';
    
    return $html;
}

// register form
function member_layout_register_form()
{
    $html = ' 
            <div class="l_f_dn">
                    
                    	<div class="m_lfdn">
                        
                        	<h4 class="title_lfdn">Đăng ký thông tin thành viên</h4>
                            <div class="main_lfdn">
                            	
                                <form action="" method="POST">
                                    <ul class="ul_m_lfdn">                                    	
                                        <li>
                                            <div class="l_lfdn" style="height:15px; line-height:15px;">
                                            	Yêu cầu (Mầu đỏ)
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<div class="" id="member_processing_mess">Điền đủ thông tin để đăng ký.</div>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                        <li>
                                        	<div class="l_lfdn">
                                            	Họ và tên
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<input class="ipt_lfdn" id="member_register_fullname" rel="validName" type="text" value=""/>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                        <li>
                                        	<div class="l_lfdn">
                                            	Tên đăng nhập
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<input class="ipt_lfdn" id="member_register_username" rel="validName" type="text" value=""/>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                        <li>
                                        	<div class="l_lfdn">
                                            	Email
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<input class="ipt_lfdn" id="member_register_useremail" rel="validEmail" type="text" value=""/>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    	
                                    	<li>
                                        	<div class="l_lfdn">
                                            	Ngày sinh
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<div class="f_ns">
                                                	<ul>
                                                    	<li>
                                                            '.db_create_date_month_year(30,'date_select_value','date_select_value','','Ngày').'
                                                        </li>
                                                    	<li>
                                                            '.db_create_date_month_year(12,'month_select_value','month_select_value','','Tháng').'
                                                        </li>
                                                    	<li>
                                                            '.db_create_month_year('year_select_value','year_select_value','','Năm').'
                                                        </li>
                                                    </ul>
                                                    <div class="clear"></div>
                                                </div><!-- End .f_ns -->
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    	<li>
                                        	<div class="l_lfdn" id="error_sex">
                                            	Giới tính
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	
                                                <div class="f_gt">
                                                	<ul>
                                                    	<li>
                                                            <input  id="member_register_sexname" name="member_register_sex" value="NAM" type="radio"/>
                                                            <label for="s_nam">Nam</label>
                                                        </li>
                                                    	<li>
                                                        	<input id="member_register_sexnu" name="member_register_sex" value="NU" type="radio"/>
                                                            <label for="s_nu">Nữ</label>
                                                        </li>
                                                        <li>
                                                        	<input id="member_register_sexkhac" name="member_register_sex" value="KHAC" type="radio"/>
                                                            <label for="s_nu">Khác</label>
                                                        </li>
                                                    </ul>
                                                    <div class="clear"></div>
                                                </div><!-- End .f_gt -->
                                                
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                        <li>
                                        	<div class="l_lfdn">
                                            	Điện thoại
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<input class="ipt_lfdn" id="member_register_userphone" rel="validPhone" type="text" value=""/>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    	                                    	
                                    	<li>
                                        	<div class="l_lfdn">
                                            	Tỉnh/Thành phố
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<div id="member_register_usercities">
                                                    
                                                </div>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    	<li>
                                        	<div class="l_lfdn">
                                            	Quận huyện
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<div id="member_register_userdistrict">
                                                	
                                                </div>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                        <li>
                                        	<div class="l_lfdn">
                                            	Địa chỉ
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	<input class="ipt_lfdn" id="member_register_useraddress" rel="validAddress" type="text" value=""/>
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    	<li>
                                        	<div class="l_lfdn">
                                            	&nbsp;
                                            </div><!-- End .l_lfdn -->
                                            <div class="r_lfdn">
                                            	
                                                <input class="btn_lfdn" id="member_register_btn" type="button" value="'.__("Đăng ký",THEME_NAME).'"/>
                                                
                                            </div><!-- End .r_lfdn -->
                                            <div class="clear"></div>
                                        </li>
                                    </ul>
                                </form>
                                
                            </div><!-- End .main_lfdn -->
                        
                        </div><!-- End .m_lfdn -->
                    
                    </div><!-- End .l_f_dn -->
                    <script type="text/javascript">
                        jQuery(function($){
                            $("#member_register_usercities").html(db_default_select_cities("Hà Nội","cities_select_value s_ttp","cities_select_value","Tỉnh/Thành phố"));                            
                            db_change_district_input_cities("TP HỒ CHÍ MINH","");
                            
                            $("#cities_select_value").live("change",function(){
                                var current_cities = $("#cities_select_value").val();
                                db_change_district_input_cities(current_cities,"");
                            });

                        });                            
                    </script>
            ';
    
    return $html;
}


// member menu top
function member_layout_show_menu_top_member($is_login)
{
    global $member;
    if($is_login)
    {
        $html = ' 

            <!--
            <li class="li_dktv li_tools">
                    <span>
                            <a class="t_dktv" href="#" id="member_register_act" title="">Đăng ký</a>
                </span>
            </li>
            <li class="li_dktv li_tools">
                    <span>
                            <a class="t_dktv" href="#" id="member_login_act" title="">Đăng nhập</a>
                </span>
            </li>
            -->

            <li class="li_dktv li_tools">
                <span>
                <a class="t_dktv" href="'. wp_logout_url(get_bloginfo("url")) .'" title="">'.__("Thoát",THEME_NAME).'</a>
                </span>
            </li>
            <li class="li_tk li_tools">
                    <span>
                            <a class="t_tk" href="'.  get_author_posts_url($member->userId).'" title="">'.$member->member_get_user_display_name().'</a>
                </span>
                <ul class="mn_child_tool">
                    <li>
                            <div class="f_info_tool">
                            <ul>
                                    <li>
                                    <a href="#" title="">Thông tin tài khoản</a>
                                </li>
                                    <li>
                                    <a href="'.  home_url().'/members?act=change-password" title="">Đổi mật khẩu</a>
                                </li>
                                    <li>
                                    <a href="'. wp_logout_url(get_bloginfo("url")) .'" title="">Thoát</a>
                                </li>
                            </ul>
                        </div><!-- End .f_info_tool -->
                    </li>
                </ul><!-- End .mn_child_tool -->
            </li>
            ';
    }
    else
    {
        $html = ' 
            <li class="li_dktv li_tools">
                    <span>
                            <a class="t_dktv" href="#" id="member_register_act" title="">Đăng ký</a>
                </span>
            </li>
            <li class="li_tk li_tools">
                    <span>
                            <a class="t_tk" href="#" id="member_login_act" title="">Đăng nhập</a>
                </span>                
            </li>
                ';
    }
    return $html;
}

function member_layout_show_top_menu_member()
{
    global $member,$ws24hShop;
    $html = ' 
        <div class="tools_header">
                	<ul>                    	
                        '.member_layout_show_menu_top_member($member->member_check_login()).'
                    	
                    	<li class="li_gh li_tools">
                        	<span>
                        		<a class="t_gh" href="#" title="">Giỏ hàng</a>
                            </span>
                            <!-- -->
                            '.$ws24hShop->shop_show_shopping_cart_top_menu().'
                            <!-- -->
                        </li>
                    </ul>
                </div><!-- End .tools_header -->
            ';
    echo $html;
}

add_action("do_top_menu_member", 'member_layout_show_top_menu_member');