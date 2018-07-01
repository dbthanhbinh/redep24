<?php
    $postmetas = get_post_custom();        
    $price = (isset($postmetas[$wpdb->prefix.'price'][0]) && $postmetas[$wpdb->prefix.'price'][0]) ? $postmetas[$wpdb->prefix.'price'][0] : '';
    $discount = (isset($postmetas[$wpdb->prefix.'discount'][0]) && $postmetas[$wpdb->prefix.'discount'][0]) ? $postmetas[$wpdb->prefix.'discount'][0] : '';     
?>

<div class="col-lg-3 col-md-6 mb-4 card-item">
    <div class="card h-100">
        <?php
        if(has_post_thumbnail()){   
        ?>
            <a href="<?php the_permalink();?>" title="<?php the_title();?>">
            <?php
                the_post_thumbnail();
            ?>
            </a>
            <?php    
        }
        ?>
        
        <div class="card-body">
            <h4 class="card-title">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
            </h4>
            <h5><?= webseo24h_tie_format_price_discount_show_return($price, $discount, true); ?></h5>
            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
        </div>
    </div>
</div>