<?php
/**
 * Implement theme metabox.
 *
 * @package DarkNews
 */

if (!function_exists('darknews_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function darknews_add_theme_meta_box()
    {

        $darknews_screens = array('post', 'page');

        foreach ($darknews_screens as $screen) {
            add_meta_box(
                'darknews-theme-settings',
                esc_html__('Layout Options', 'darknews'),
                'darknews_render_layout_options_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'darknews_add_theme_meta_box');

if (!function_exists('darknews_render_layout_options_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function darknews_render_layout_options_metabox($post, $metabox)
    {

        $darknews_post_id = $post->ID;

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'darknews_meta_box_nonce');
        // Fetch Options list.
        $darknews_content_layout = get_post_meta($darknews_post_id, 'darknews-meta-content-alignment', true);
        $darknews_global_single_content_mode = get_post_meta($darknews_post_id, 'darknews-meta-content-mode', true);

        if (empty($darknews_content_layout)) {
            $darknews_content_layout = darknews_get_option('global_content_alignment');
        }

        if (empty($darknews_global_single_content_mode)) {
            $darknews_global_single_content_mode = darknews_get_option('global_single_content_mode');
        }


        ?>
        <div id="darknews-settings-metabox-container" class="darknews-settings-metabox-container">
            <div id="darknews-settings-metabox-tab-layout">

                <div class="darknews-row-content">
                    <!-- Select Field-->
                    <h3><?php esc_html_e('Content Options', 'darknews') ?></h3>
                    <p>
                        <select name="darknews-meta-content-mode" id="darknews-meta-content-mode">

                            <option value="" <?php selected('', $darknews_global_single_content_mode); ?>>
                                <?php esc_html_e('Set as global layout', 'darknews') ?>
                            </option>
                            <option value="single-content-mode-default" <?php selected('single-content-mode-default', $darknews_global_single_content_mode); ?>>
                                <?php esc_html_e('Default', 'darknews') ?>
                            </option>
                            <option value="single-content-mode-boxed" <?php selected('single-content-mode-boxed', $darknews_global_single_content_mode); ?>>
                                <?php esc_html_e('Spacious', 'darknews') ?>
                            </option>

                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize>Themes Options for Single Post/Page.', 'darknews')?></small>

                </div><!-- .darknews-row-content -->
                <div class="darknews-row-content">
                    <!-- Select Field-->
                    <h3><?php esc_html_e('Sidebar Options', 'darknews') ?></h3>
                    <p>
                        <select name="darknews-meta-content-alignment" id="darknews-meta-content-alignment">

                            <option value="" <?php selected('', $darknews_content_layout); ?>>
                                <?php esc_html_e('Set as global layout', 'darknews') ?>
                            </option>
                            <option value="align-content-left" <?php selected('align-content-left', $darknews_content_layout); ?>>
                                <?php esc_html_e('Content - Primary Sidebar', 'darknews') ?>
                            </option>
                            <option value="align-content-right" <?php selected('align-content-right', $darknews_content_layout); ?>>
                                <?php esc_html_e('Primary Sidebar - Content', 'darknews') ?>
                            </option>
                            <option value="full-width-content" <?php selected('full-width-content', $darknews_content_layout); ?>>
                                <?php esc_html_e('No Sidebar', 'darknews') ?>
                            </option>
                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize>Frontpage Options for Homepage.', 'darknews')?></small>

                </div><!-- .darknews-row-content -->

            </div><!-- #darknews-settings-metabox-tab-layout -->
        </div><!-- #darknews-settings-metabox-container -->

        <?php
    }

endif;


if (!function_exists('darknews_save_layout_options_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $darknews_post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function darknews_save_layout_options_meta($darknews_post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['darknews_meta_box_nonce']) || !wp_verify_nonce($_POST['darknews_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $darknews_post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $darknews_post_id) {
            return;
        }

        // Check permission.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $darknews_post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $darknews_post_id)) {
            return;
        }

        $darknews_content_layout = isset($_POST['darknews-meta-content-alignment']) ? $_POST['darknews-meta-content-alignment'] : '';
        $darknews_global_single_content_mode = isset($_POST['darknews-meta-content-mode']) ? $_POST['darknews-meta-content-mode'] : '';
        update_post_meta($darknews_post_id, 'darknews-meta-content-alignment', sanitize_text_field($darknews_content_layout));
        update_post_meta($darknews_post_id, 'darknews-meta-content-mode', sanitize_text_field($darknews_global_single_content_mode));


    }

endif;

add_action('save_post', 'darknews_save_layout_options_meta', 10, 2);


//Category fields meta starts


if (!function_exists('darknews_taxonomy_add_new_meta_field')) :
// Add term page
    function darknews_taxonomy_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page

        $darknews_cat_color = array(
            'category-color-1' => __('Category Color 1', 'darknews'),
            'category-color-2' => __('Category Color 2', 'darknews'),
            'category-color-3' => __('Category Color 3', 'darknews'),

        );
        ?>
        <div class="form-field">
            <label for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'darknews'); ?></label>
            <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                <?php foreach ($darknews_cat_color as $key => $value): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'darknews'); ?></p>
        </div>
        <?php
    }
endif;
add_action('category_add_form_fields', 'darknews_taxonomy_add_new_meta_field', 10, 2);


if (!function_exists('darknews_taxonomy_edit_meta_field')) :
// Edit term page
    function darknews_taxonomy_edit_meta_field($term)
    {

        // put the term ID into a variable
        $darknews_t_id = $term->term_id;

        // retrieve the existing value(s) for this meta field. This returns an array
        $darknews_term_meta = get_option("category_color_$darknews_t_id");

        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label
                        for="term_meta[color_class_term_meta]"><?php esc_html_e('Color Class', 'darknews'); ?></label></th>
            <td>
                <?php
                $darknews_cat_color = array(
                    'category-color-1' => __('Category Color 1', 'darknews'),
                    'category-color-2' => __('Category Color 2', 'darknews'),
                    'category-color-3' => __('Category Color 3', 'darknews'),

                );
                ?>
                <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                    <?php foreach ($darknews_cat_color as $key => $value): ?>
                        <option value="<?php echo esc_attr($key); ?>"<?php selected(isset($darknews_term_meta['color_class_term_meta'])?$darknews_term_meta['color_class_term_meta']:'', $key); ?> ><?php echo esc_html($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php esc_html_e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'darknews'); ?></p>
            </td>
        </tr>
        <?php
    }
endif;
add_action('category_edit_form_fields', 'darknews_taxonomy_edit_meta_field', 10, 2);




if (!function_exists('darknews_save_taxonomy_color_class_meta')) :
// Save extra taxonomy fields callback function.
    function darknews_save_taxonomy_color_class_meta($darknews_term_id)
    {
        if (isset($_POST['term_meta'])) {
            $darknews_t_id = $darknews_term_id;
            $darknews_term_meta = get_option("category_color_$darknews_t_id");
            $darknews_cat_keys = array_keys($_POST['term_meta']);
            foreach ($darknews_cat_keys as $key) {
                if (isset ($_POST['term_meta'][$key])) {
                    $darknews_term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option("category_color_$darknews_t_id", $darknews_term_meta);
        }
    }

endif;
add_action('edited_category', 'darknews_save_taxonomy_color_class_meta', 10, 2);
add_action('create_category', 'darknews_save_taxonomy_color_class_meta', 10, 2);

