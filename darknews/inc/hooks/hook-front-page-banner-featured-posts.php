<?php
if (!function_exists('darknews_banner_featured_posts')):
    /**
     * Ticker Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_banner_featured_posts()
    {

        $darknews_enable_featured_news = darknews_get_option('show_featured_posts_section');

        if ($darknews_enable_featured_news):
            $darknews_featured_news_title = darknews_get_option('featured_news_section_title');
            ?>
            <div class="af-main-banner-featured-posts featured-posts darknews-customizer">
                <div class="af-title-subtitle-wrap">
                <?php if (!empty($darknews_featured_news_title)): ?>
                    <?php darknews_render_section_title($darknews_featured_news_title); ?>
                <?php endif; ?>
                </div>


                <div class="section-wrapper af-widget-body">
                    <div class="af-container-row clearfix">
                        <?php
                        $darknews_featured_category = darknews_get_option('select_featured_news_category');
                        $darknews_number_of_featured_news = darknews_get_option('number_of_featured_news');
                        $darknews_featured_posts = darknews_get_posts($darknews_number_of_featured_news, $darknews_featured_category);
                        if ($darknews_featured_posts->have_posts()) :
                            while ($darknews_featured_posts->have_posts()) :
                                $darknews_featured_posts->the_post();
                                global $post;
                                ?>


                                    <div class="af-sec-post col-4 pad float-l">
                                        <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-texts-over-image'); ?>
                                    </div>


                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <!-- Trending line END -->
        <?php

    }
endif;

add_action('darknews_action_banner_featured_posts', 'darknews_banner_featured_posts', 10);