<?php
add_action( 'widgets_init', 'tie_best_seller_posts_widget' );
function tie_best_seller_posts_widget() {
	register_widget( 'tie_best_seller_posts' );
}
class tie_best_seller_posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 
			'classname' => 'best-seller-posts',
			'description' => 'My Widget is best-seller-posts-widget',
		);
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'best-seller-posts' );
		parent::__construct( 'best-seller-posts', theme_name .' - Ads 250*350', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$no_of_posts = $instance['no_of_posts'];
		$cats_id = $instance['cats_id'];
		$thumb = $instance['thumb'];
                $list_post_id = $instance['list_post_id'];
                $by_post_id = $instance['by_post_id'];
                $view_by_slider = $instance['view_by_slider'];

                
                echo '<div class="bcn_tlsp">';
                
		echo $before_widget;
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
                    <?php tie_last_posts_cat($no_of_posts , $thumb , $cats_id,$list_post_id,$by_post_id,$view_by_slider);?>	
                       
		<div class="clear"></div>
                
	<?php 
                echo $after_widget;
                
                echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['no_of_posts'] = strip_tags( $new_instance['no_of_posts'] );
		
		$instance['cats_id'] = implode(',' , $new_instance['cats_id'] );

		$instance['thumb'] = strip_tags( $new_instance['thumb'] );
                $instance['list_post_id'] = strip_tags( $new_instance['list_post_id'] );
                $instance['by_post_id'] = strip_tags( $new_instance['by_post_id'] );
                $instance['view_by_slider'] = strip_tags( $new_instance['view_by_slider'] );
                
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__( 'Best Seller Posts' , 'tie'), 'no_of_posts' => '5' , 'cats_id' => '1' , 'thumb' => 'true' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		                
		$categories_obj = get_categories();
		$categories = array();

		foreach ($categories_obj as $pn_cat) {
			$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>">Number of posts to show: </label>
			<input id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo $instance['no_of_posts']; ?>" type="text" size="3" />
		</p>
		<p>
			<?php $cats_id = explode ( ',' , $instance['cats_id'] ) ; ?>
			<label for="<?php echo $this->get_field_id( 'cats_id' ); ?>">Category : </label>
			<select multiple="multiple" id="<?php echo $this->get_field_id( 'cats_id' ); ?>[]" name="<?php echo $this->get_field_name( 'cats_id' ); ?>[]">
				<?php foreach ($categories as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( in_array( $key , $cats_id ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'thumb' ); ?>">Display Thumbinals : </label>
			<input id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" value="true" <?php if( $instance['thumb'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>
                <p>
                        <label for="<?php echo $this->get_field_id( 'list_post_id' ); ?>">Display By List Post ID : </label>
                        <textarea style="width:99%;" id="<?php echo $this->get_field_id( 'list_post_id' ); ?>" name="<?php echo $this->get_field_name( 'list_post_id' ); ?>" rows="5"><?php echo $instance['list_post_id']; ?></textarea>                        
                </p>
                <p>
			<label for="<?php echo $this->get_field_id( 'by_post_id' ); ?>">Display By List Post ID : </label>
			<input id="<?php echo $this->get_field_id( 'by_post_id' ); ?>" name="<?php echo $this->get_field_name( 'by_post_id' ); ?>" value="true" <?php if( $instance['by_post_id'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id( 'view_by_slider' ); ?>">View Best Seller with Slider : </label>
			<input id="<?php echo $this->get_field_id( 'view_by_slider' ); ?>" name="<?php echo $this->get_field_name( 'view_by_slider' ); ?>" value="true" <?php if( $instance['view_by_slider'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>

	<?php
	}
}
?>