<?php
if (!function_exists('darknews_single_header')) :
    /**
     * Banner Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_single_header()
    {
        global $post;
        $darknews_post_id = $post->ID;
        ?>
        <header class="entry-header pos-rel">
            <div class="read-details">
                <div class="entry-header-details af-cat-widget-carousel">
                    <?php if ('post' === get_post_type()) : ?>

                        <div class="figure-categories read-categories figure-categories-bg ">
                            <?php darknews_post_format($post->ID); ?>
                            <?php darknews_post_categories(true); ?>
                        </div>
                    <?php endif; ?>
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>


                    <div class="aft-post-excerpt-and-meta color-pad">
                        <?php if ('post' === get_post_type($darknews_post_id)) :
                            if (has_excerpt($darknews_post_id)):

                                ?>
                                <div class="post-excerpt">
                                    <?php echo wp_kses_post(get_the_excerpt($post->ID)); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="entry-meta">

                            <?php darknews_post_item_meta(); ?>
                            <?php darknews_count_content_words($post->ID); ?>
                            <?php
                            $darknews_social_share_icon_opt = darknews_get_option('single_post_social_share_view');
                            if($darknews_social_share_icon_opt == 'after-title-default'){
                                darknews_single_post_social_share_icons($post->ID);
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>



        </header><!-- .entry-header -->




        <!-- end slider-section -->
        <?php
    }
endif;
add_action('darknews_action_single_header', 'darknews_single_header', 40);