<?php            
global $authordata, $post,$wpdb;
query_posts( array(
    'post_type'=>'post', 
    'author' => $authordata->ID,
    'post_status' => array('publish'),
    'post__not_in' => array( $post->ID ),
    'posts_per_page' => 8,
    'orderby'=> 'meta_value_num',
    'order'=>'DESC' ) 
);

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
            <?php
            if(have_posts()){
                while (have_posts()){ the_post();
                    get_template_part('page-templates/tpl', 'loop');
                }
            }
            else {
                webseo24h_tie_notfound();
            }
            ?>
        </div>
    </div><!-- End .m_spc_S -->
</div>
<?php 
}
?>

<?php 
global $authordata, $post,$wpdb;
query_posts( array(
    'post_type'=>'post' ,
    'post__not_in' => array( $post->ID ),
    'post_status' => array('publish'),
    'posts_per_page' => 8,
    'orderby'=> 'rand',
    'order'=>'DESC' ) 
);

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
            <?php                 
                if(have_posts()){
                    while (have_posts()){ the_post();
                        get_template_part('page-templates/tpl', 'loop');
                    }
                }
                else {
                    webseo24h_tie_notfound();
                }
            ?>
        </div>
    </div>
</div>
<?php
}
?>