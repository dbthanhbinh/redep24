<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo tie_get_option('favicon');?>" type="image/x-icon" />
    <link rel="icon" href="<?php echo tie_get_option('favicon');?>" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />  
    <!-- Bootstrap core CSS -->
    <link href="<?= get_template_directory_uri()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">    
    <?php wp_head();?>

    <!-- cslider -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/assets/plugin/cslider/css/jquery.cslider.css" />
    <!-- Custom styles for this template -->
    <link href="<?= get_template_directory_uri()?>/assets/css/style.min.css" rel="stylesheet">

    <?php 
        if(tie_get_option('header_code'))
        {
            echo tie_get_option('header_code');
        }        
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= get_template_directory_uri()?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= get_template_directory_uri()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/plugin/cslider/js/jquery.cslider.js"></script>    
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider.js"></script>
    
</head>
<body <?php body_class();?>>
    <header class="site-header">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </script>
        <div id="header">                
            <?php if(tie_get_option('top_menu')):?>        
                <div class="t_header">
                    <div class="note_t_header">
                        <?php if(tie_get_option('slogan1')):?>
                            <?php echo tie_get_option('slogan1');?>
                        <?php endif;?>
                        <span>
                            <?php if(tie_get_option('slogan2')):?>
                                <?php echo tie_get_option('slogan2');?>
                            <?php endif;?>
                        </span>
                    </div>

                    <div class="mn_t_header">                        
                        <?php wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'top-menu','fallback_cb' => 'webseo24h_tie_nav_fallback' ) ); ?>                
                    </div>

                </div><!-- End .t_header -->
            <?php endif;?>
        </div>
        <?php get_search_form();?>
        <div class="hotline"><span></span><?php tie_show_option('company_hotline');?></div>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark c_header">
            <div class="container-fluid">
                <?php webseo24h_tie_logo_show();?>                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse b_header" id="navbarResponsive"> 
                    <?php 
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'webseo24h_tie_nav_fallback',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="navbar-nav ml-auto ul_mn_b_header">%3$s</ul>',
                        'depth'           => 2,
                        'walker'          => ''
                    );
        
                    wp_nav_menu( $defaults );
                    ?>
                    <?php                     
                        if(tie_get_option("top_menu_member")){
                            do_action("do_top_menu_member");
                        }
                    ?>                
                </div>
            </div>
        </nav>
        <?php 
            $cl_item = 'ct_dmsp';
            if(is_home()||is_front_page()) 
                $cl_item = 'm_dmsp';
        ?>
        <div id="c_dmsp_hold" class="c_dmsp_hold">
            <div id="<?= $cl_item ?>_parent" class="c_dmsp">
                <span>Danh mục</span>
            </div>
            <div id="<?= $cl_item ?>" class="<?= $cl_item ?> hover_dmsp">        
                <?php 
                $catdefaults = array(
                        'theme_location'  => 'cat-menu',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'webseo24h_tie_nav_fallback',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="ul_m_dmsp hover_dmsp">%3$s</ul>',
                        'depth'           => 3,
                        'walker'          => new webseo24h_tie_mega_menu_walker()
                );
                wp_nav_menu( $catdefaults );
                ?>  
            </div>
        </div>
    </header>