<?php get_header();?>
    <div class="container-fluid">
        <div class="row">
            <?php  require_once 'page-templates/breadcrumbs.php'; ?>
            <div class="col-lg-9">
                <div class="clear-20"></div>        
                <div class="row">
                    <?php 
                        if(have_posts()):the_post();
                            ?>
                            <div class="content-details col-lg-12">
                            <h1 class="t_r_tlsp">
                                <span><?php the_title();?></span>
                            </h1>
                                <?php the_content();?>
                            </div>
                        <?php 
                        endif;
                        ?>
                </div>
            </div>
            <?php 
                get_sidebar();
            ?>
            <?php get_template_part('page-templates/tpl', 'partner');?> 
        </div>
    </div>
<?php get_footer();?>