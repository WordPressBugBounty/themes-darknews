<?php
if (!function_exists('darknews_banner_exclusive_posts')):
    /**
     * Ticker Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_banner_exclusive_posts()  {



        if ( false != darknews_get_option('show_popular_tags_section')) : ?>
            <div class="aft-popular-tags">
                <div class="container-wrapper">
                    <?php

                    $darknews_show_popular_tags_title = darknews_get_option('frontpage_popular_tags_section_title');
                    $darknews_select_popular_tags_mode = darknews_get_option('select_popular_tags_mode');
                    $darknews_number_of_popular_tags = darknews_get_option('number_of_popular_tags');


                    darknews_list_popular_taxonomies($darknews_select_popular_tags_mode, $darknews_show_popular_tags_title, $darknews_number_of_popular_tags);


                    ?>
                </div>
            </div>
        <?php endif;



        ?>
        <?php if (false != darknews_get_option('show_flash_news_section')) :
		    
            $darknews_em_ticker_news_mode = 'aft-flash-slide left';
            $darknews_dir = 'left';
            if(is_rtl()){
                $darknews_em_ticker_news_mode = 'aft-flash-slide right';
                $darknews_dir = 'right';
		    }
            ?>
            <div class="banner-exclusive-posts-wrapper">

                <?php
                $darknews_categories = darknews_get_option('select_flash_news_category');
                $darknews_number_of_posts = darknews_get_option('number_of_flash_news');
                $darknews_em_ticker_news_title = darknews_get_option('flash_news_title');

                $darknews_all_posts = darknews_get_posts($darknews_number_of_posts, $darknews_categories);
                $darknews_show_trending = true;
                $darknews_count = 1;
                ?>

                <div class="container-wrapper">
                    <div class="exclusive-posts">
                        <div class="exclusive-now primary-color">
                            <div class="aft-ripple">
                                <div></div>
                                <div></div>
                            </div>
                            <?php if (!empty($darknews_em_ticker_news_title)): ?>
                                <span><?php echo esc_html($darknews_em_ticker_news_title); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="exclusive-slides" dir="ltr">
                            <?php
                            if ($darknews_all_posts->have_posts()) : ?>
                            <div class='marquee <?php echo esc_attr($darknews_em_ticker_news_mode); ?>' data-speed='80000'
                                 data-gap='0' data-duplicated='true' data-direction="<?php echo esc_attr($darknews_dir); ?>" >
                                <?php
                                while ($darknews_all_posts->have_posts()) : $darknews_all_posts->the_post();
                                    global $post;
                                    $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'thumbnail');
                                    $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($darknews_show_trending == true): ?>

                                        <?php endif; ?>

                                        <span class="circle-marq">
                                            <span class="trending-no">
                                                <?php echo esc_html( $darknews_count); ?>
                                            </span>
                                            <?php if ($darknews_img_url) { ?>
                                                <img src="<?php echo esc_url($darknews_img_url); ?>"
                                                     alt="<?php echo esc_attr(darknews_get_img_alt($darknews_img_thumb_id)); ?>">
                                            <?php } ?>
                                    </span>

                                        <?php the_title(); ?>
                                    </a>
                                    <?php
                                    $darknews_count++;
                                endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluive line END -->
            <?php

        endif;
    }
endif;

add_action('darknews_action_banner_exclusive_posts', 'darknews_banner_exclusive_posts', 10);