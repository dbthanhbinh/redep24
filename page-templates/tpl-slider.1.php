<?php
    $size = 'slider' ;
    $slider_query = tie_get_option( 'slider_query' );
    if( $slider_query == 'custom' )
    {
        $custom_slider_args = array( 'post_type' => 'tie_slider', 'p' => tie_get_option( 'slider_custom' ), 'no_found_rows' => 1  );
        $custom_slider = new WP_Query( $custom_slider_args );
    }
?>
<div class="slider_A">
    <ul class="ul_slider_A">        
        <?php 
        $i = 1;
        while ( $custom_slider->have_posts() ) : $custom_slider->the_post(); $i++; 
            $custom = get_post_custom($post->ID);
            $slider = unserialize( $custom["custom_slider"][0] );
            $number = count($slider);

            if( $slider )
            {    
                foreach( $slider as $slide ):

                    ?>
                    <li>
                            <a href="<?php  echo stripslashes( $slide['link'] );?>" title="<?php  echo stripslashes( $slide['title'] );?>">
                            <img src="<?php echo webseo24h_tie_slider_img_src( $slide['id'] , $size );?>" alt="<?php  echo stripslashes( $slide['title'] );?>"/>
                        </a>
                    </li>
                    <?php 

                endforeach;
            }
        endwhile;
        ?>
    </ul>
    <div class="clear"></div>                            
    <script type="text/javascript">
        $(document).ready(function(){
            $('.ul_slider_A').bxSlider({
                    auto:false,
                    pager: false,
                    slideWidth: 660,
                    minSlides: 1,
                    maxSlides: 1
            });
        });
    </script>
</div><!-- End .slider_A -->