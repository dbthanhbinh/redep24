<?php 
if(have_posts())
{
    while (have_posts())
    {
        the_post();

        $postmetas = get_post_custom();        
        $price = (isset($postmetas[$wpdb->prefix.'price'][0]) && $postmetas[$wpdb->prefix.'price'][0]) ? $postmetas[$wpdb->prefix.'price'][0] : '';
        $discount = (isset($postmetas[$wpdb->prefix.'discount'][0]) && $postmetas[$wpdb->prefix.'discount'][0]) ? $postmetas[$wpdb->prefix.'discount'][0] : '';     
        ?>
        <li>
            <div class="overflow_box">    
                <div class="sp_i_wf">
                    <table>
                        <tr>
                            <td>
                                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                    <?php
                                    if(has_post_thumbnail())
                                    {
                                        the_post_thumbnail('thumbnail');
                                    }
                                    ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div><!-- End .sp_i_wf -->
                <?php
                webseo24h_tie_format_price_discount_show_return($price, $discount, true);
                ?>  
                <div class="name_wf">
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                        <?php the_title();?>
                    </a>
                </div><!-- End .name_wf -->
                
            </div>
        </li>
         <?php
    }
}
else 
{
    webseo24h_tie_notfound();
}