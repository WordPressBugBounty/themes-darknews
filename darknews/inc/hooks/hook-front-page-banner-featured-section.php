<?php
if (!function_exists('darknews_banner_featured_section')):
    /**
     * Ticker Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_banner_featured_section()
    {
        ?>
        <div class="aft-frontpage-feature-section-wrapper">

            <?php $darknews_show_featured_section = darknews_get_option('show_featured_posts_section');
            if ($darknews_show_featured_section): ?>
                <section class="aft-blocks af-main-banner-featured-posts">
                    <div class="container-wrapper">
                        <?php do_action('darknews_action_banner_featured_posts'); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php
            $darknews_show_post_list_section = darknews_get_option('show_featured_post_list_section');
            if ($darknews_show_post_list_section) { ?>
                <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec darknews-customizer">
                    <div class="container-wrapper">
                        <div class="af-container-row">
                            <?php darknews_get_block('list-posts', 'featured'); ?>
                        </div>
                    </div>
                </section>
            <?php } ?>



            <?php
            if (is_active_sidebar('home-below-featured-posts-widgets')): ?>

                <div class="home-featured-widgets">
                    <div class="container-wrapper">
                        <?php dynamic_sidebar('home-below-featured-posts-widgets'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
endif;


add_action('darknews_action_banner_featured_section', 'darknews_banner_featured_section', 10);