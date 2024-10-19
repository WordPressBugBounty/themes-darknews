<?php
if (!function_exists('darknews_loop_grid')) :
    /**
     * Banner Slider
     *
     * @since Newsical 1.0.0
     *
     */
    function darknews_loop_grid($darknews_post_id, $darknews_grid_design = 'grid-design-default', $darknews_thumbnail_size = 'medium', $darknews_show_excerpt = false, $archive_content_view = 'archive-content-excerpt', $darknews_title_position = 'bottom')
    {
        $darknews_post_display = 'spotlight-post';
        if ($darknews_thumbnail_size == 'medium') {
            $darknews_post_display = 'grid-post';
        }



        ?>

        <div class="pos-rel read-single color-pad clearfix af-cat-widget-carousel <?php echo esc_attr($darknews_grid_design); ?>">
            <?php if ($darknews_title_position == 'top'): ?>
                <div class="read-title">
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
                <div class="post-item-metadata entry-meta">
                    <?php darknews_post_item_meta($darknews_post_display); ?>
                    <?php darknews_get_comments_views_share($darknews_post_id); ?>
                </div>
            <?php endif; ?>
            <div class="read-img pos-rel read-bg-img">
                <a class="aft-post-image-link"
                   href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php the_post_thumbnail($darknews_thumbnail_size); ?>
                <div class="post-format-and-min-read-wrap">
                    <?php darknews_post_format($darknews_post_id); ?>
                    <?php darknews_count_content_words($darknews_post_id); ?>
                </div>
                <?php if ($darknews_grid_design == 'grid-design-default'): ?>
                    <div class="category-min-read-wrap">
                        <div class="read-categories">
                            <?php darknews_post_categories(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pad read-details color-tp-pad">
                <?php if ($darknews_grid_design == 'grid-design-texts-over-image'): ?>
                    <div class="read-categories">
                        <?php darknews_post_categories(); ?>
                    </div>
                <?php endif; ?>
                <?php if ($darknews_title_position == 'bottom'): ?>
                    <div class="read-title">
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <div class="post-item-metadata entry-meta">
                        <?php darknews_post_item_meta($darknews_post_display); ?>
                        <?php darknews_get_comments_views_share($darknews_post_id); ?>
                    </div>
                <?php endif; ?>

                <?php if ($darknews_show_excerpt == true): ?>
                    <div class="post-description">
                        <?php
                        if ($archive_content_view == 'archive-content-full') {
                            the_content();
                        } else {
                            echo wp_kses_post(darknews_get_the_excerpt($darknews_post_id));
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
endif;
add_action('darknews_action_loop_grid', 'darknews_loop_grid', 10, 6);