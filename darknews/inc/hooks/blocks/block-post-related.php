<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package DarkNews
     */
?>

<div class="promotionspace enable-promotionspace">
    <div class="af-reated-posts darknews-customizer">
        <?php
            global $post;
            $darknews_categories = get_the_category($post->ID);
            $darknews_related_section_title = esc_attr(darknews_get_option('single_related_posts_title'));
            $darknews_number_of_related_posts = 3;
            
            if ($darknews_categories) {
            $darknews_cat_ids = array();
            foreach ($darknews_categories as $darknews_category) $darknews_cat_ids[] = $darknews_category->term_id;
            $darknews_args = array(
                'category__in' => $darknews_cat_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $darknews_number_of_related_posts, // Number of related posts to display.
                'ignore_sticky_posts' => 1
            );
            $darknews_related_posts = new wp_query($darknews_args);
            
            if ($darknews_related_posts->have_posts()) { ?>
                <?php darknews_render_section_title($darknews_related_section_title);

                ?>
            <?php }
        ?>
        <div class="af-container-row clearfix">
            <?php
                while ($darknews_related_posts->have_posts()) {
                    $darknews_related_posts->the_post();
                    global $post;
                    $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium');
                    $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);

                    ?>
                    <div class="col-3 float-l pad latest-posts-grid af-sec-post">
                        <?php do_action('darknews_action_loop_grid', $post->ID); ?>
                    </div>
                <?php }
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>


