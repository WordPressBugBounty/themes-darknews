<?php
/**
 * Custom template images for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package DarkNews
 */


if ( ! function_exists( 'darknews_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function darknews_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        global $post;

        if ( is_singular() ) :

            $darknews_theme_class = darknews_get_option('global_image_alignment');
            $darknews_post_image_alignment = get_post_meta($post->ID, 'darknews-meta-image-options', true);
            $darknews_post_class = !empty($darknews_post_image_alignment) ? $darknews_post_image_alignment : $darknews_theme_class;

            if ( $darknews_post_class != 'no-image' ):
                ?>
                <div class="post-thumbnail <?php echo esc_attr($darknews_post_class); ?>">
                    <?php the_post_thumbnail('darknews-featured'); ?>
                </div>
            <?php endif; ?>

        <?php else :
            $darknews_archive_layout = darknews_get_option('archive_layout');
            $darknews_archive_layout = $darknews_archive_layout;
            $darknews_archive_class = '';
            if ($darknews_archive_layout == 'archive-layout-list') {
                $darknews_archive_image_alignment = darknews_get_option('archive_image_alignment');
                $darknews_archive_class = $darknews_archive_image_alignment;
                $darknews_archive_image = 'medium';
            } elseif ($darknews_archive_layout == 'archive-layout-full') {
                $darknews_archive_image = 'darknews-medium';
            } else {
                $darknews_archive_image = 'post-thumbnail';
            }

            ?>
            <div class="post-thumbnail <?php echo esc_attr($darknews_archive_class); ?>">
                <a href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php
                    the_post_thumbnail( $darknews_archive_image, array(
                        'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                    ?>
                </a>
            </div>

        <?php endif; // End is_singular().
    }
endif;
