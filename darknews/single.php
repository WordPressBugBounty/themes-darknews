<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DarkNews
 */

get_header();

?>
    <div class="section-block-upper">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php

                $wrap_class = 'social-after-title';
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('af-single-article'); ?>>

                        <div class="entry-content-wrap read-single <?php echo esc_attr($wrap_class); ?>">

                            <?php

                            if (is_single()) {

                                    do_action('darknews_action_single_header');

                            }
                            ?>


                            <?php
                            $show_featured_image = darknews_get_option('single_show_featured_image');
                            if ($show_featured_image):

                                ?>
                                <div class="read-img pos-rel">
                                    <?php darknews_post_thumbnail(); ?>
                                    <?php
                                    if (has_post_thumbnail($post->ID)):
                                        if ($aft_image_caption = get_post(get_post_thumbnail_id())->post_excerpt):
                                            if (trim($aft_image_caption) !== ''):
                                                ?>
                                                <span class="aft-image-caption">
                            <p>
                                <?php echo esc_html($aft_image_caption); ?>
                            </p>
                        </span>
                                            <?php
                                            endif;
                                        endif;
                                    endif;
                                    ?>
                                </div>

                            <?php endif; ?>

                            <?php
                            get_template_part('template-parts/content', get_post_type());
                            ?>
                        </div>


                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>


                        <?php
                        $show_related_posts = darknews_get_option('single_show_related_posts');
                        if ($show_related_posts):
                            if ('post' === get_post_type()) :
                                darknews_get_block('related');
                            endif;
                        endif;
                        ?>

                    </article>
                <?php

                endwhile; // End of the loop...
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->

        <?php
        get_sidebar();
        ?>
    </div>
<?php
get_footer();
