<?php
if (!function_exists('darknews_archive_layout_selection')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_archive_layout_selection($darknews_archive_layout = 'default')
    {

        switch ($darknews_archive_layout) {
            case "archive-layout-full":
                darknews_get_block('full', 'archive');
                break;
            default:
                darknews_get_block('grid', 'archive');
        }
    }
endif;

if (!function_exists('darknews_archive_layout')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_archive_layout($cat_slug = '')
    {

        $darknews_archive_args = darknews_archive_layout_class($cat_slug);
        if (!empty($darknews_archive_args['data_mh'])): ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($darknews_archive_args['add_archive_class']); ?>
                 data-mh="<?php echo esc_attr($darknews_archive_args['data_mh']); ?>">
            <?php darknews_archive_layout_selection($darknews_archive_args['archive_layout']); ?>
        </article>
    <?php else: ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($darknews_archive_args['add_archive_class']); ?> >
            <?php darknews_archive_layout_selection($darknews_archive_args['archive_layout']); ?>
        </article>
    <?php endif; ?>

        <?php

    }

    add_action('darknews_action_archive_layout', 'darknews_archive_layout', 10, 1);
endif;

function darknews_archive_layout_class($darknews_cat_slug)
{
    $darknews_archive_class = darknews_get_option('archive_layout');
    $darknews_archive_layout_grid = darknews_get_option('archive_image_alignment_grid');

    if ($darknews_archive_class == 'archive-layout-grid') {
        $darknews_archive_args['archive_layout'] = 'archive-layout-grid';
        $darknews_archive_args['add_archive_class'] = 'af-sec-post latest-posts-grid col-3 float-l pad ';
        $darknews_archive_layout_mode = $darknews_archive_layout_grid;
        if ($darknews_archive_layout_mode == 'archive-image-full-alternate' || $darknews_archive_layout_mode == 'archive-image-list-alternate') {
            $darknews_archive_args['data_mh'] = '';
        } else {
            $darknews_archive_args['data_mh'] = 'archive-layout-grid';
        }
        $darknews_image_align_class = $darknews_archive_layout_grid;
        $darknews_archive_args['add_archive_class'] .= ' ' . $darknews_archive_class . ' ' . $darknews_image_align_class;

    } else {
        $darknews_archive_args['archive_layout'] = 'archive-layout-full';
        $darknews_archive_args['add_archive_class'] = 'latest-posts-full col-1 float-l pad';
        $darknews_archive_args['data_mh'] = '';
    }

    return $darknews_archive_args;

}

//Archive div wrap before loop

if (!function_exists('darknews_archive_layout_before_loop')) :

    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Darknews 1.0.0
     *
     */

    function darknews_archive_layout_before_loop()
    {

        if (is_category()) {

            //check is category
            $darknews_archive_class = '';
            $darknews_archive_mode = darknews_get_option('archive_layout');
            $darknews_queried_object = get_queried_object();
            $darknews_t_id = $darknews_queried_object->term_id;
            $darknews_term_meta = get_option("category_layout_".$darknews_t_id);
            $darknews_term_meta_masonry = get_option("category_layout_masonry_".$darknews_t_id);
            $darknews_term_meta_full = get_option("category_layout_full_".$darknews_t_id);
            $darknews_term_meta_grid_column = get_option("category_layout_grid_column_".$darknews_t_id);

            if (!empty($darknews_term_meta)) {
                $darknews_term_meta = $darknews_term_meta['archive_layout_term_meta'];
                // grid  column layout
                if ($darknews_term_meta == 'archive-layout-grid') {

                    if ($darknews_term_meta_grid_column['archive_layout_grid'] == 'grid-layout-two') {
                        $darknews_col_grid = 'two-col-masonry';

                    }  else {
                        $darknews_col_grid = 'three-col-masonry';

                    }

                    $darknews_archive_class .= $darknews_archive_mode . " " . $darknews_col_grid;
                }//full layout option
                else if ($darknews_term_meta == 'archive-layout-full') {
                    if ($darknews_term_meta_full['archive_layout_full'] == 'full-image-first') {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-image-first';
                    } else if ($darknews_term_meta_full['archive_layout_full'] == 'full-title-first') {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-title-first';
                    } else if ($darknews_term_meta_full['archive_layout_full'] == 'archive-full-grid') {
                        $darknews_archive_class = $darknews_archive_mode . " " . "full-with-grid";
                    } else {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-title-first';
                    }
                } else {
                    $darknews_archive_class = $darknews_term_meta;
                }


            } else {
                //grid layout option
                if ($darknews_archive_mode == 'archive-layout-grid') {
                    $darknews_archive_layout_grid = darknews_get_option('archive_grid_column_layout');
                    if ($darknews_archive_layout_grid == 'grid-layout-two') {
                        $darknews_col_grid = $darknews_archive_mode . " " . 'two-col-masonry';
                    }  else {
                        $darknews_col_grid = $darknews_archive_mode . " " . 'three-col-masonry';
                    }
                    $darknews_archive_class = $darknews_col_grid;
                }  //full layout option
                elseif ($darknews_archive_mode == 'archive-layout-full') {
                    $darknews_archive_layout_full = darknews_get_option('archive_layout_full');
                    if ($darknews_archive_layout_full == 'full-image-first') {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-image-first';
                    } else if ($darknews_archive_layout_full == 'full-title-first') {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-title-first';
                    } else if ($darknews_archive_layout_full == 'archive-full-grid') {
                        $darknews_archive_class = $darknews_archive_mode . " " . "full-with-grid";
                    } else {
                        $darknews_archive_class = $darknews_archive_mode . " " . 'archive-title-first';
                    }
                } else {
                    $darknews_archive_class = $darknews_archive_mode;
                }
            }
        } else {
            //grid layout option
            $darknews_archive_mode = darknews_get_option('archive_layout');
            if ($darknews_archive_mode == 'archive-layout-grid') {
                $darknews_archive_layout_grid = darknews_get_option('archive_grid_column_layout');
                if ($darknews_archive_layout_grid == 'grid-layout-two') {
                    $darknews_col_grid = $darknews_archive_mode . " " . 'two-col-masonry';
                } else if ($darknews_archive_layout_grid == 'grid-layout-four') {
                    $darknews_col_grid = $darknews_archive_mode . " " . 'four-col-masonry';
                } else {
                    $darknews_col_grid = $darknews_archive_mode . " " . 'three-col-masonry';
                }
                $darknews_archive_class = $darknews_col_grid;
            }//full layout option
            elseif ($darknews_archive_mode == 'archive-layout-full') {
                $darknews_archive_layout_full = darknews_get_option('archive_layout_full');
                if ($darknews_archive_layout_full == 'full-image-first') {
                    $darknews_archive_class = $darknews_archive_mode . " " . 'full-image-first';
                } else if ($darknews_archive_layout_full == 'full-title-first') {
                    $darknews_archive_class = $darknews_archive_mode . " " . 'archive-title-first';
                } else if ($darknews_archive_layout_full == 'archive-full-grid') {
                    $darknews_archive_class = $darknews_archive_mode . " " . "full-with-grid";
                } else {
                    $darknews_archive_class = $darknews_archive_mode;
                }
            } else {

                $darknews_archive_class = $darknews_archive_mode;
            }
        }
        ?>
        <div class="af-container-row aft-archive-wrapper darknews-customizer clearfix <?php echo esc_attr($darknews_archive_class); ?>">
        <?php

    }

    add_action('darknews_archive_layout_before_loop', 'darknews_archive_layout_before_loop');
endif;


if (!function_exists('darknews_archive_layout_after_loop')):

    function darknews_archive_layout_after_loop()
    {
        ?>
        </div>
    <?php }

    add_action('darknews_archive_layout_after_loop', 'darknews_archive_layout_after_loop');

endif;