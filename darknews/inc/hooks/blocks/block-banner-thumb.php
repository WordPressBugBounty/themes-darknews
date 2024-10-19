<div class="af-main-banner-thumb-posts">
    <div class="section-wrapper">
        <div class="small-grid-style clearfix">
            <?php
                
                $darknews_posts_filter_by = darknews_get_option('select_editors_picks_filterby');
                
                if ($darknews_posts_filter_by == 'tag') {
                    $darknews_editors_pick_category = darknews_get_option('select_editors_picks_news_tag');
                    $darknews_filterby = 'tag';
                } else {
                    
                    $darknews_editors_pick_category = darknews_get_option('select_editors_picks_news_category');
                    $darknews_filterby = 'cat';
                }
                
                $darknews_featured_posts = darknews_get_posts(2, $darknews_editors_pick_category, $darknews_filterby);
                if ($darknews_featured_posts->have_posts()) :
                    $darknews_count = 1;
                    while ($darknews_featured_posts->have_posts()) :
                        $darknews_featured_posts->the_post();
                        global $post;

                        ?>

                        <div class="af-sec-post">
                            <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-texts-over-image'); ?>
                        </div>


                        <?php
                        $darknews_count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
        </div>
    </div>
</div>
<!-- Editors Pick line END -->
