<?php
    $size = 'slider' ;
    $slider_query = tie_get_option( 'slider_query' );
    if( $slider_query == 'custom' )
    {
        $custom_slider_args = array( 'post_type' => 'tie_slider', 'p' => tie_get_option( 'slider_custom' ), 'no_found_rows' => 1  );
        $custom_slider = new WP_Query( $custom_slider_args );
    }
?>
<div id="da-slider" class="da-slider">
    <div class="triangle"></div>
    <!-- mask elemet use for masking background image -->
    <div class="mask"></div>
    <!-- All slides centred in container element -->
    <div class="container">
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
                    <div class="da-slide">
                        <h2 class="fittext2"><?= stripslashes( $slide['title'] );?></h2>                        
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
                        <a href="<?php  echo stripslashes( $slide['link'] );?>" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="<?php echo webseo24h_tie_slider_img_src( $slide['id'] , $size );?>" alt="<?php  echo stripslashes( $slide['title'] );?>" width="320">
                        </div>
                    </div>
                    <?php 

                endforeach;
            }
        endwhile;
        ?>

        <div class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
        </div>
        <!-- End cSlide navigation arrows -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        //Initialize header slider.
        $('#da-slider').cslider();
    });
</script>