<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta http-equiv="content-language" content="vi" />        
    <link rel="shortcut icon" href="<?php echo tie_get_option('favicon');?>" type="image/x-icon" />
    <link rel="icon" href="<?php echo tie_get_option('favicon');?>" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />  
    <?php wp_head();?>
    <?php 
        if(tie_get_option('header_code'))
        {
            echo tie_get_option('header_code');
        }        
    ?>
</head>
<body <?php body_class();?>>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </script>

	<div id="wrapper">

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
                    </div><!-- End .note_t_header -->

                    <div class="mn_t_header">                        
                        <?php wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'top-menu','fallback_cb' => 'webseo24h_tie_nav_fallback' ) ); ?>
                        <div class="clear"></div>
                    </div><!-- End .mn_t_header -->

                </div><!-- End .t_header -->
                <?php endif;?>
                
                <div class="c_header">

                    <?php webseo24h_tie_logo_show();?>
                    <?php if(is_home() || is_front_page()) echo '<h1 style="display:none;"> ' . get_bloginfo("name") . ' </h1>';?>
                    
                    <!-- Search form -->
                    <?php get_search_form();?>
                    <!-- End search form -->

                    <?php                     
                    if(tie_get_option("top_menu_member"))
                    {
                        do_action("do_top_menu_member");
                    }
                    ?>

                    <div class="hotline"><span></span><?php tie_show_option('company_hotline');?></div>

                </div><!-- End .c_header -->

                <div class="b_header">

                        <?php 
                        $defaults = array(
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'container'       => 'div',
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
                                'items_wrap'      => '<ul id="%1$s" class="ul_mn_b_header">%3$s</ul>',
                                'depth'           => 2,
                                'walker'          => ''
                        );

                        wp_nav_menu( $defaults );

                        //wp_nav_menu( array( 'container_class' => 'primary', 'theme_location' => 'primary','fallback_cb' => 'webseo24h_tie_nav_fallback' ) ); ?>                        
                   <!-- End .ul_mn_b_header -->

                    <div class="clear"></div>

                    <div class="dmsp">

                        <span class="c_dmsp">
                            <span>Danh mục</span>
                        </span><!-- End .c_dmsp -->

                        <div class="<?php if(is_home()||  is_front_page()) echo 'm_dmsp'; else echo 'ct_dmsp';?> hover_dmsp">
                            
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
                        
                                //wp_nav_menu( array( 'container_class' => 'cat-menu', 'theme_location' => 'cat-menu','fallback_cb' => 'webseo24h_tie_nav_fallback','walker' => new rc_scm_walker(),'depth' => 3 ) ); 
                                ?>                                
                            
                        </div><!-- End .m_dmsp -->

                    </div><!-- End .dmsp -->

                </div><!-- End .b_header -->

            </div><!-- End #header -->   
            
            <?php if(is_home() || is_front_page()){}else{?>
            <script type="text/javascript">
             // Create a clone of the menu, right next to original.
            $('.b_header').addClass('original').clone().insertAfter('.b_header').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

            scrollIntervalID = setInterval(stickIt, 10);


            function stickIt() {

              var orgElementPos = $('.original').offset();
              orgElementTop = orgElementPos.top;               

              if ($(window).scrollTop() >= (orgElementTop)) {
                // scrolled past the original position; now only show the cloned, sticky element.

                // Cloned element should always have same left position and width as original element.     
                orgElement = $('.original');
                coordsOrgElement = orgElement.offset();
                leftOrgElement = coordsOrgElement.left;  
                widthOrgElement = orgElement.css('width');

                $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement+'px').show();
                $('.original').css('visibility','hidden');                
              } else {
                // not scrolled past the menu; only show the original menu.
                $('.cloned').hide();
                $('.original').css('visibility','visible');                
                
              }
            }   
        
        </script>
            <?php }?>