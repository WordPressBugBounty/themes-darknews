<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package DarkNews
 */

if (!function_exists('darknews_post_categories')) :
  function darknews_post_categories($darknews_is_single = false)
  {
    $darknews_global_show_categories = darknews_get_option('global_show_categories');
    if ($darknews_global_show_categories == 'no') {
      return;
    }

    $darknews_global_number_of_categories = darknews_get_option('global_number_of_categories');
    if ($darknews_global_number_of_categories == 'one') {
      $show_category_number = 1;
    } else {
      $show_category_number = 0;
    }

    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      global $post;
      $darknews_post_categories = get_the_category($post->ID);
      if ($darknews_post_categories) {

        $darknews_output = '<ul class="cat-links">';
        $category_count = 0;
        foreach ($darknews_post_categories as $post_category) {
          $darknews_t_id = $post_category->term_id;
          $darknews_color_id = "category_color_" . $darknews_t_id;

          // retrieve the existing value(s) for this meta field. This returns an array
          $darknews_term_meta = get_option($darknews_color_id);
          $darknews_color_class = ($darknews_term_meta) ? $darknews_term_meta['color_class_term_meta'] : 'category-color-1';

          

                        $darknews_output .= '<li class="meta-category">
                             <a class="darknews-categories ' . esc_attr($darknews_color_class) . '" aria-label="' . esc_attr($post_category->name) . '" href="' . esc_url(get_category_link($post_category)) . '">
                                 ' . esc_html($post_category->name) . '
                             </a>
                        </li>';

          if ($darknews_is_single == false) {
            if (++$category_count == $show_category_number) break;
          }
        }
        $darknews_output .= '</ul>';
        echo wp_kses_post($darknews_output);
      }
    }
  }
endif;


if (!function_exists('darknews_get_category_color_class')) :

  function darknews_get_category_color_class($term_id)
  {

    $darknews_color_id = "category_color_" . $term_id;
    // retrieve the existing value(s) for this meta field. This returns an array
    $darknews_term_meta = get_option($darknews_color_id);
    $darknews_color_class = ($darknews_term_meta) ? $darknews_term_meta['color_class_term_meta'] : '';
    return $darknews_color_class;
  }
endif;

if (!function_exists('darknews_post_item_meta')) :

  function darknews_post_item_meta($darknews_post_display = 'spotlight-post')
  {

    global $post;
    if ('post' == get_post_type($post->ID)):

      $darknews_author_id = $post->post_author;
      $darknews_date_display_setting = darknews_get_option('global_date_display_setting');
      $darknews_author_icon_gravatar_display_setting = darknews_get_option('global_author_icon_gravatar_display_setting');

      if ($darknews_post_display == 'list-post') {
        $darknews_post_meta = darknews_get_option('list_post_date_author_setting');
      } elseif ($darknews_post_display == 'grid-post') {
        $darknews_post_meta = darknews_get_option('small_grid_post_date_author_setting');
      } else {
        $darknews_post_meta = darknews_get_option('global_post_date_author_setting');
      }

      if ($darknews_post_meta == 'show-date-only') {
        $darknews_display_author = false;
        $darknews_display_date = true;
      } elseif ($darknews_post_meta == 'show-author-only') {
        $darknews_display_author = true;
        $darknews_display_date = false;
      } elseif (($darknews_post_meta == 'show-date-author')) {
        $darknews_display_author = true;
        $darknews_display_date = true;
      } else {
        $darknews_display_author = false;
        $darknews_display_date = false;
      }

?>


      <span class="author-links">
        <?php if ($darknews_display_author): ?>
          <span class="item-metadata posts-author byline">

            <?php if ($darknews_author_icon_gravatar_display_setting == 'display-gravatar') {
              darknews_by_author($gravatar = true);
            } elseif ($darknews_author_icon_gravatar_display_setting == 'display-icon') { ?>
              <i class="far fa-user-circle"></i>
            <?php darknews_by_author($gravatar = false);
            } else {
              darknews_by_author($gravatar = false);
            } ?>

          </span>
        <?php endif; ?>


        <?php
        if ($darknews_display_date): ?>
          <span class="item-metadata posts-date">
            <i class="far fa-clock" aria-hidden="true"></i>
            <?php
            if ($darknews_date_display_setting == 'default-date') {
              the_time(get_option('date_format'));
            } else {
              echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'darknews'));
            }

            ?>
          </span>
        <?php endif; ?>

      </span>
<?php
    endif;
  }
endif;


if (!function_exists('darknews_post_item_tag')) :

  function darknews_post_item_tag($view = 'default')
  {
    global $post;

    if ('post' === get_post_type()) {

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list('', ' ');
      if ($tags_list) {
        /* translators: 1: list of tags. */
        printf('<span class="tags-links">' . esc_html('Tags: %1$s') . '</span>', $tags_list);
      }
    }

    if (is_single()) {
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __('Edit <span class="screen-reader-text">%s</span>', 'darknews'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
    }
  }
endif;
