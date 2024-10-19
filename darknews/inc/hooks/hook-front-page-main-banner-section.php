<?php
if (!function_exists('darknews_front_page_main_section')) :
    /**
     * Banner Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_front_page_main_section()
    {
        $darknews_enable_main_slider = darknews_get_option('show_main_news_section');

        do_action('darknews_action_banner_exclusive_posts');


        if ($darknews_enable_main_slider):


            $darknews_banner_background = darknews_get_option('main_banner_background_section');
            $darknews_layout_class = 'aft-banner-layout-1';
            $darknews_main_banner_order = darknews_get_option('select_main_banner_order');
            $darknews_layout_class .= ' aft-banner-'.$darknews_main_banner_order;

            $darknews_main_banner_url = '';

            if (!empty($darknews_banner_background)) {

                $darknews_banner_background = absint($darknews_banner_background);
                $darknews_main_banner_url = wp_get_attachment_url($darknews_banner_background);
                $darknews_layout_class .= ' data-bg';

            }

            ?>

            <section
                    class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed  darknews-customizer <?php echo esc_attr($darknews_layout_class); ?>"
                    data-background="<?php echo esc_attr($darknews_main_banner_url); ?>">
                <div class="container-wrapper">

                    <div class="aft-main-banner-wrapper">
                        <?php
                            darknews_get_block('main-layout-1', 'banner');
                        ?>
                    </div>
                </div>
            </section>


        <?php endif;
    }
endif;
add_action('darknews_action_front_page_main_section', 'darknews_front_page_main_section', 40);