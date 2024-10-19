<?php
    $darknews_featured_categories = array();
    
    for ($darknews_i = 1; $darknews_i <= 3; $darknews_i++) {
        $darknews_category_id = darknews_get_option('featured_post_list_category_section_' . $darknews_i);
        $darknews_featured_categories['feature_' . $darknews_i][] = $darknews_category_id;
        $darknews_featured_categories['feature_' . $darknews_i][] = darknews_get_option('featured_post_list_section_title_' . $darknews_i);
        
    }
    
    if (isset($darknews_featured_categories)):
        $darknews_count = 1;
        foreach ($darknews_featured_categories as $darknews_fc): ?>
            <div class="featured-category-item pad float-l">
                <div class="af-title-subtitle-wrap">
                    <?php if (!empty($darknews_fc[1])): ?>
                        <?php darknews_render_section_title($darknews_fc[1]); ?>
                    <?php endif; ?>
                </div>
                
                <?php $darknews_all_posts_vertical = darknews_get_posts(3, $darknews_fc[0]); ?>
                <div class="full-wid-resp af-widget-body">
                    <?php
                        if ($darknews_all_posts_vertical->have_posts()) :
                            while ($darknews_all_posts_vertical->have_posts()) : $darknews_all_posts_vertical->the_post();
                                global $post;
                                $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium-square');
                                $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                                ?>
                                <?php do_action('darknews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
            </div><!--featured-category-item-->
            <?php
            $darknews_count++;
        endforeach;
    endif;
