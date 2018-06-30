<?php 
$args = array('fields' => 'all');
$taxonomies = 'category';
//$obj_term = wp_get_post_terms($post->ID, $taxonomies,$args);
$obj_term = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
$spnmc = new WP_Query(array('post_type' => 'post','category_name' => $obj_term[0]->slug,'showposts'=>10));
?>
<div class="spnmc">                            
    <h4 class="t_spmc">Sản phẩm tham khảo</h4>
    <div class="m_spmc content_5">
        <ul>             
            <?php 
            if($spnmc->have_posts())
            {
                while ($spnmc->have_posts())
                {
                    $spnmc->the_post();
                    ?>
                    <li>
                        <div class="sp_i_spmc">
                            <table>
                                    <tr>
                                    <td>
                                        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                            <?php if(has_post_thumbnail()):?>
                                                <?php the_post_thumbnail('thumbnail');?>
                                            <?php endif;?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- End .sp_i_spmc -->
                        <div class="name_spmc"><?php the_title();?></div>                            
                    </li>
                    <?php
                }
            }
            else {
                echo 'No post.';
            }
            
            wp_reset_query();
            ?> 
        </ul>
    </div>
</div>