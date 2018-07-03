<?php get_header();?>
    <div class="container-fluid">
        <div class="row">
            <?php  //require_once 'page-templates/breadcrumbs.php'; ?>
            <div class="col-lg-9">
                <?php 
                    $author_meta = get_user_meta(get_the_author_meta('ID'));            
                ?>
                <h1 class="header_title t_r_tlsp">
                    <?php echo 'Đăng bởi : ' . $authordata->display_name;?>
                </h1>
                <div class="row product-list">
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

                    <?php if ($wp_query->max_num_pages > 1) webseo24h_tie_pagenavi(); ?>
                </div>
            </div>
            <?php 
                get_sidebar();
            ?>
            <?php get_template_part('page-templates/tpl', 'partner');?> 
        </div>
    </div>
<?php get_footer();?>