<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DarkNews
 */

?>


<?php if (is_singular()) : ?>
    <div class="color-pad">
        <div class="entry-content read-details">
            <div class="inner-entry-content">
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'darknews'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )); ?>
            </div>
            <?php if (is_single()): ?>
                <div class="post-item-metadata entry-meta">
                    <?php darknews_post_item_tag(); ?>
                </div>
            <?php endif; ?>
            <?php
            the_post_navigation(array(
                'prev_text' => __('<span class="em-post-navigation">Previous:</span> %title', 'darknews'),
                'next_text' => __('<span class="em-post-navigation">Next:</span> %title', 'darknews'),
                'in_same_term' => true,
                'taxonomy' => __('category', 'darknews'),
                'screen_reader_text' => __('Continue Reading', 'darknews'),
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'darknews'),
                'after' => '</div>',
            ));
            ?>

        </div><!-- .entry-content -->
    </div>
<?php else:



    do_action('darknews_action_archive_layout');

endif;
