<?php
if (!function_exists('darknews_banner_advertisement')):
    /**
     * Ticker Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_banner_advertisement()
    {


        $darknews_banner_advertisement = darknews_get_option('banner_advertisement_section');

        if (('' != $darknews_banner_advertisement) ) { ?>
            <div class="banner-promotions-wrapper">
                <?php if (('' != $darknews_banner_advertisement)):
                    $darknews_banner_advertisement = absint($darknews_banner_advertisement);
                    $darknews_banner_advertisement = wp_get_attachment_image($darknews_banner_advertisement, 'full');
                    $darknews_banner_advertisement_url = darknews_get_option('banner_advertisement_section_url');
                    $darknews_banner_advertisement_url = isset($darknews_banner_advertisement_url) ? esc_url($darknews_banner_advertisement_url) : '#';
        ?>
                    <div class="promotion-section">
                        <a href="<?php echo esc_url($darknews_banner_advertisement_url); ?>">
                            <?php echo wp_kses_post($darknews_banner_advertisement); ?>
                        </a>
                    </div>
                <?php endif; ?>                

            </div>
            <!-- Trending line END -->
            <?php
        }

         if (is_active_sidebar('home-advertisement-widgets')): ?>
                     <div class="banner-promotions-wrapper">
                    <div class="promotion-section">
                        <?php dynamic_sidebar('home-advertisement-widgets'); ?>
                    </div>
                </div>
                <?php endif;
    }
endif;

add_action('darknews_action_banner_advertisement', 'darknews_banner_advertisement', 10);