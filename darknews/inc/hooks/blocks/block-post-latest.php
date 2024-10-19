<?php
    /**
     * List block part for displaying latest posts in footer.php
     *
     * @package DarkNews
     */
    
    $darknews_latest_posts_title = darknews_get_option('frontpage_latest_posts_section_title');
    $darknews_latest_posts_subtitle = darknews_get_option('frontpage_latest_posts_section_subtitle');
    $darknews_number_of_posts = 4;
    $darknews_all_posts = darknews_get_posts($darknews_number_of_posts);
?>
<div class="af-main-banner-latest-posts grid-layout darknews-customizer">
    <div class="container-wrapper">
        <div class="widget-title-section">
            <?php if (!empty($darknews_latest_posts_title)): ?>
                <?php darknews_render_section_title($darknews_latest_posts_title); ?>
            <?php endif; ?>
        </div>
        <div class="af-container-row clearfix">
            <?php
                if ($darknews_all_posts->have_posts()) :
                    while ($darknews_all_posts->have_posts()) : $darknews_all_posts->the_post();
                        global $post;
                        $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium');
                        $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                        ?>
                        <div class="col-4 pad float-l">
                            <?php do_action('darknews_action_loop_grid', $post->ID); ?>
                        </div>
                    <?php
                    endwhile; ?>
                <?php
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
