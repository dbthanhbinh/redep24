<?php
#### BLOG COMMENT STYLE
####################################
function my_customComments($comment,$args,$depth){
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :

	case 'trackback' :
		echo '<li class="post pingback">';
	echo "<p>";
	_e( 'Pingback:','');
	comment_author_link();
	edit_comment_link( __('Sửa',''), ' ' ,'');
	echo "</p>";
	break;
	default :

	case '' :
		echo "<li ";
		comment_class();
		echo ' id="li-comment-';
		comment_ID();
		echo '">';
		echo '<div id="comment-';
		comment_ID();
		echo '">';
		echo '<div class="comment-author">';
		echo '<div class="gravatar"> <span>';
		echo get_avatar( $comment, 50 );
		echo '</span></div>';

		echo '<cite>'.ucfirst(get_comment_author_link()).'</cite>';
		echo '<div class="comment-meta">';
		printf(__( ' Lúc %1$s - %2$s',''),get_comment_time() ,get_comment_date('d/m/Y'));
		echo '</div>';
		echo '</div><!--.comment-author -->';
		echo '<div class="reply">';

		echo '</div><!-- .reply -->';
		echo '<div class="comment-body">';
		comment_text();
		if ( $comment->comment_approved == '0' ) :
		_e( 'Bình luận đang được xử lý.','');
		endif;
		echo comment_reply_link( array_merge( $args, array('reply_text' => 'Trả lời', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
		//edit_comment_link( __('Sửa','') );
		echo '</div><!-- .comment-body -->';
		echo '</div><!-- .comment-ID -->';
		break;
		endswitch;
}

?>
<div class="product-detail-comment">
	<div class="product-comment-title">
		<div class="product-comment-icon">
                    <h6>Bình luận (<?php comments_number(__('0',''), __('1',''), __('%','') );?>)</h6>
		</div>				
	</div>
		
	<div class="product-detail-comment-onlocal">
		<!-- **Comment Entries** -->   	
        <div id="comments" class="comment-entry">   
            <a name="respond"></a>
            <?php  
                /*
                $comments_args = array(
                        // change the must log in text and link url
                        'must_log_in'=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), 'http://khoedep360.vn/shop/thanh-vien' ) . '</p>'
                );
                */            
                $args = array(
                   'id_form'           => 'commentform',
                   'id_submit'         => 'submit',
                   'title_reply'       => __( '' ),
                   'title_reply_to'    => __( 'Tới trả lời %s' ),
                   'cancel_reply_link' => __( 'Hủy trả lời' ),
                   'label_submit'      => __( 'Gửi bình luận' ),

                   'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Ý kiến của bạn', 'noun' ) .
                     '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
                     '</textarea></p>',

                   'must_log_in' => '<p class="must-log-in">' .
                     sprintf(
                       __( 'Bạn phải &nbsp; <a href="%s">Đăng nhập</a> &nbsp; Để gửi bình luận.' ),
                       'http://khoedep360.vn/shop/thanh-vien'
                     ) . '</p>',

                    'logged_in_as' => '<p class="logged-in-as">' .
                     sprintf(
                     __( 'Đăng nhập với <a href="%1$s">%2$s</a>. <a href="%3$s" title="Đăng xuất khỏi acc này"> &nbsp;|&nbsp; Đăng xuất?</a>' ),
                       admin_url( 'profile.php' ),
                       $user_identity,
                       wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                     ) . '</p>',

                   'comment_notes_before' => '<p class="comment-notes">' .
                     __( 'Địa chỉ email của bạn sẽ không được công khai.' ) . ( (isset($req) && $req) ? $required_text : '' ) .
                     '</p>',

                   'comment_notes_after' => '<p class="form-allowed-tags">' .
                     sprintf(
                       __( '' ),
                       ' <code></code>'
                     ) . '</p>',

                   'fields' => apply_filters( 'comment_form_default_fields', array(

                     'author' =>
                       '<p class="comment-form-author">' .
                       '<label for="author">' . __( 'Tên bạn', 'domainreference' ) . '</label> ' .
                       ( (isset($req) && $req) ? '<span class="required">*</span>' : '' ) .
                       '<input id="author" name="author" type="text" value="' . esc_attr( (isset($commenter['comment_author']) && $commenter['comment_author']) ? $commenter['comment_author'] : '' ) .
                       '" size="30"/></p>',

                     'email' =>
                       '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                       ( (isset($req) && $req) ? '<span class="required">*</span>' : '' ) .
                       '<input id="email" name="email" type="text" value="' . esc_attr( (isset($commenter['comment_author_email']) && $commenter['comment_author_email']) ? $commenter['comment_author_email'] : '' ) .
                       '" size="30"/></p>',

                     )
                   ),
                 ); 
                 comment_form($args);
            ?>
            
            <ol class="commentlist">
            <?php
                    //Gather comments for a specific page/post 
                    $comments = get_comments(array(
                            'post_id' => get_the_ID(),
                            'status' => 'approve' //Change this to the type of comments to be displayed
                    ));

                    if($comments)
                    {
                        //Display the list of comments
                        wp_list_comments(array(
                                'per_page' => 10, //Allow comment pagination
                                'reverse_top_level' => false //Show the latest comments at the top of the list
                        ), $comments);
                    }
                    else
                    {
                        echo '<li> <p style="color:#336699;"> Chưa có phản hồi. </p> </li>';
                    }
            ?>
            </ol>
        </div><!-- **Comment Entries - End** -->
	</div>
</div>