<?php

/**
 * Front page section additions.
 */


if (!function_exists('darknews_full_width_upper_footer_section')) :
    /**
     *
     * @since DarkNews 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function darknews_full_width_upper_footer_section()
    {



        ?>

        <section class="aft-blocks above-footer-widget-section">
            <?php

            if (1 == darknews_get_option('frontpage_show_latest_posts')) {
                darknews_get_block('latest');
            }

            ?>
        </section>
        <?php

    }
endif;
add_action('darknews_action_full_width_upper_footer_section', 'darknews_full_width_upper_footer_section');
