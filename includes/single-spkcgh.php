<?php
////$obj_term = wp_get_object_terms(get_the_ID(), 'category');
////$obj_term_slug = $obj_term[0]->slug;                
global $authordata, $post,$wpdb;
//query_posts( array( 'author' => $authordata->ID,'post_status' => array('publish'),'post__not_in' => array( $post->ID ), 'posts_per_page' => 10,'orderby'=> 'meta_value_num','order'=>'DESC' ) );
////query_posts( array( 'author' => $authordata->ID,'post_status' => array('publish'),'post__not_in' => array( $post->ID ),'category_name' => $obj_term_slug,'posts_per_page' => 10,'orderby'=> 'meta_value_num','order'=>'DESC' ) );
query_posts( array('post_type'=>'post', 'author' => $authordata->ID,'post_status' => array('publish'),'post__not_in' => array( $post->ID ),'posts_per_page' => 10,'orderby'=> 'meta_value_num','order'=>'DESC' ) );
if(have_posts())
{            
?>
<div class="row related-list">
    <div class="col-lg-12 col-md-12 mb-12">
        <h5 class="title_spc_S">
            Cùng người đăng
        </h5>
    </div>

    <div class="col-lg-12 col-md-12 mb-12">
        <div class="row">
            <div class="m_spc_cat">
                <?php                 
                get_template_part('page-templates/tpl', 'loop');
                ?>                
            </div>
        </div>
    </div><!-- End .m_spc_S -->
</div>
<?php 
}
?>

<?php 
global $authordata, $post,$wpdb;
query_posts( array('post_type'=>'post' ,'post__not_in' => array( $post->ID ),'post_status' => array('publish'),'posts_per_page' => 10,'orderby'=> 'rand','order'=>'DESC' ) );
if(have_posts())
{           
?>
<div class="row related-list">
    <div class="col-lg-12 col-md-12 mb-12">
        <h5 class="title_spc_S">
            Có thể bạn muốn xem
        </h5>
    </div>
    <div class="col-lg-12 col-md-12 mb-12">
        <div class="row">
            <div class="m_spc_sugest">
                <?php                 
                get_template_part('page-templates/tpl', 'loop');
                ?>                
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.m_spc_cat').bxSlider({                   
                auto: false,
                infiniteLoop: true,
                moveSlides: 1,                    
                pause:5000,
                speed:2000,
                slideWidth: 186,
                controls: true,
                pager: false,
                minSlides: 5,
                maxSlides: 10,
                slideMargin: 10
        });
        
        $('.m_spc_sugest').bxSlider({   
                
                auto: true,
                infiniteLoop: true,
                moveSlides: 1,                    
                pause:4000,
                speed:1800,
                slideWidth: 187,
                controls: true,
                pager: false,
                minSlides: 5,
                maxSlides: 10,
                slideMargin: 10
        });
    });
</script>