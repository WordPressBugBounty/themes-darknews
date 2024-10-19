<?php
if (!function_exists('darknews_loop_list')) :
    /**
     * Banner Slider
     *
     * @since Newsical 1.0.0
     *
     */
    function darknews_loop_list($darknews_post_id, $darknews_thumbnail_size = 'thumbnail', $darknews_count = 0, $show_cat = false, $show_meta = true, $show_excerpt = false, $big_img = false, $archive_content_view = 'archive-content-excerpt' )
    {
        $darknews_post_display = 'list-post';
        if($big_img){
            $darknews_post_display = 'spotlight-post';
        }

        ?>
        <div class="af-double-column list-style clearfix aft-list-show-image">
            <div class="read-single color-pad">
                <div class="col-3 float-l pos-rel read-img read-bg-img">
                    <a class="aft-post-image-link"
                       href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php the_post_thumbnail($darknews_thumbnail_size); ?>
                    <?php if (absint($darknews_count) > 0): ?>
                        <span class="trending-no"><?php echo esc_html($darknews_count); ?></span>
                    <?php endif; ?>
                    <?php if ($big_img != false): ?>
                        <div class="category-min-read-wrap af-cat-widget-carousel">
                            <div class="post-format-and-min-read-wrap">
                                <?php darknews_post_format($darknews_post_id); ?>
                                <?php darknews_count_content_words($darknews_post_id); ?>
                            </div>
                            <div class="read-categories">
                                <?php darknews_post_categories(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-66 float-l pad read-details color-tp-pad">
                    <?php if ($big_img == false): ?>
                        <?php if ($show_cat != false): ?>
                            <div class="read-categories">
                                <?php darknews_post_categories(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="read-title">
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($show_meta != false): ?>
                        <div class="post-item-metadata entry-meta">
                            <?php darknews_post_item_meta($darknews_post_display); ?>
                            <?php darknews_get_comments_views_share($darknews_post_id); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($show_excerpt != false):

                        ?>
                        <div class="read-descprition full-item-discription">
                            <div class="post-description">
                                <?php
                                if ($archive_content_view == 'archive-content-full') {
                                    the_content();
                                } else {
                                    echo wp_kses_post(darknews_get_the_excerpt($darknews_post_id));
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php
    }
endif;
add_action('darknews_action_loop_list', 'darknews_loop_list', 10, 8);