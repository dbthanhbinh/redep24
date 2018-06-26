<?php
	add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
   	function my_custom_dashboard_widgets() 
   	{
            global $wp_meta_boxes;
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
            wp_add_dashboard_widget('custom_feed_widget', 'Tin mới:  gmc.vn', 'custom_dashboard_feed');
            wp_add_dashboard_widget('custom_support_widget', 'Support', 'custom_dashboard_support');

            unregister_sidebar( 'primary-widget-area' );
            unregister_sidebar( 'secondary-widget-area' );
            unregister_sidebar( 'first-footer-widget-area' );
            unregister_sidebar( 'second-footer-widget-area' );
            unregister_sidebar( 'third-footer-widget-area' );
            unregister_sidebar( 'fourth-footer-widget-area' );
     }

     
	function custom_dashboard_feed()
	{
		$url_feed = 'http://gmc.vn/feed';
		echo '<ul>';
		$rss = fetch_feed($url_feed);
		if(!is_wp_error($rss))
		{
		    $maxitems = $rss->get_item_quantity(3);
		    $rss_items = $rss->get_items(0, $maxitems);
		}
		
		if($maxitems == 0) echo '<li>Tin mới từ <a href="'.str_replace('feed', '', $url_feed).'">gmc.vn</a>.</li>';
		else 
		{
			foreach($rss_items as $item) 
			{
				
				echo '<li><h3><a href="'.esc_url($item->get_permalink()) .'">' . esc_html($item->get_title()).'</a> - <a href="'.esc_url($item->get_permalink()) .'" sytle="color:#ff0000"> Chi tiết</a></h3> ' ;
			}
		}
		echo '</ul>';
	}
	
	function custom_dashboard_support()
	{
		?>
		<style>
		#custom_support_widget .input-text-wrap, #dashboard_quick_press .textarea-wrap {
			margin: 0 0 1em 5em;
		}
		#custom_support_widget h4 {
			font-family: sans-serif;
			float: left;
			width: 100%;
			clear: both;
			font-weight: normal;
			text-align: left;
			padding-top: 5px;
			font-size: 12px;
		}
		#custom_support_widget h4 label {
			margin-right: 10px;
		}
		#custom_support_widget .input-text-wrap, #custom_support_widget .textarea-wrap {
			margin: 0;
		}
		</style>
		
		
		<hr>
		<form action="" method="post">
                    <p style="margin:5px 0;"><strong>
			<?php 
			if(wp_verify_nonce($_POST['support'], 'submit'))
			{
				// REQUEST
				$support_name = $_POST['support_name'];
				$support_mail = $_POST['support_mail'];
				$support_phone = $_POST['support_phone'];
				$support_title = $_POST['support_title'];
				$support_content = $_POST['support_content'];
				// CHECK
				if(!$support_name) echo 'Please enter name!<br>';
				elseif(!$support_mail) echo 'Please enter email!<br>';
				elseif(!is_email($support_mail)) echo 'Email invalid!';
				elseif(!$support_phone) echo 'Please enter phone number!<br>';
				elseif(!$support_title) echo 'Please enter title!<br>';
				elseif(!$support_content) echo 'Please enter content!<br>';
				else 
				{
					$message = "Name: $support_name
					Email: $support_mail
					Tel: $support_phone
					Title: $support_title
					Content: $support_content";
					if(wp_mail("gmc.achau@gmail.com", $support_title, $message))
					{
						echo 'Cảm ơn bạn đã liên hệ với chúng tôi.!';
					}
					else 
					{
						echo 'Gửi email lỗi, xin thử lại.';
					}
				}			
			}
			else 
			{
				echo 'Bạn cần hỗ trợ website? Nhập đầy đủ thông tin và gửi yêu cầu !';
			}
			?>
			</strong>
                        <label style="color:#ff0000; width: 100%; display: block;"><strong>Hotline: 0909 874 825 - Mr.Bình</strong> - Gửi email tới: <a href="mailto:gmc.achau@gmail.com">gmc.achau@gmail.com</a></label>
                    </p>
			<h4><label for="support_name">Họ tên </label></h4> 
			<div class="input-text-wrap"> 
				<input type="text" name="support_name" id="support_name" tabindex="1" autocomplete="off" value="<?php echo $_POST['support_name']; ?>" /> 
			</div> 
			 
			<h4><label for="support_mail">Địa chỉ email</label></h4> 
			<div class="input-text-wrap"> 
				<input type="text" name="support_mail" id="support_mail" tabindex="2" autocomplete="off" value="<?php echo $_POST['support_email']; ?>" /> 
			</div> 
			 
			<h4><label for="support_phone">Điện thoại</label></h4> 
			<div class="input-text-wrap"> 
				<input type="text" name="support_phone" id="support_phone" tabindex="3" autocomplete="off" value="<?php echo $_POST['support_phone']; ?>" /> 
			</div>  
			 
			<h4><label for="support_title">Tiêu đề</label></h4> 
			<div class="input-text-wrap"> 
				<input type="text" name="support_title" id="support_title" tabindex="4" autocomplete="off" value="Support website: <?php  bloginfo('url'); ?>" /> 
			</div> 
	 
			<h4><label for="support_content">Nội dung yêu cầu hỗ trợ</label></h4> 
			<div class="textarea-wrap"> 
				<textarea name="support_content" id="support_content" class="mceEditor" rows="3" cols="15" tabindex="5"><?php echo $_POST['support_content']; ?></textarea> 
			</div> 
	 
			<p class="submit"> 
				<span id="publishing-action"> 
					<input type="submit" name="support_submit" id="support_submit" accesskey="p" tabindex="6" value="Gửi yêu cầu hỗ trợ" /> 
				</span> 
				<br class="clear" />
				<?php wp_nonce_field('submit', 'support'); ?> 
			</p> 
	 
		</form>
		<?php 
	}