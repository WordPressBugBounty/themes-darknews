<?php
if (!class_exists('DarkNews_Express_Posts_Single_Column')) :
    /**
     * Adds DarkNews_Express_Posts_Single_Column widget.
     */
    class DarkNews_Express_Posts_Single_Column extends DarkNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'darknews-posts-list-title',
                'darknews-posts-slider-number'

            );
            $this->select_fields = array(
                'darknews-select-category',
            );

            $widget_ops = array(
                'classname' => 'darknews_posts_single_column_widget',
                'description' => __('Displays posts single column from selected categories.', 'darknews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('darknews_posts_single_column', __('AFTDN Post Single Column', 'darknews'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::darknews_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */

            $title_1 = apply_filters('widget_title', $instance['darknews-posts-list-title'], $instance, $this->id_base);

            $darknews_no_of_post = 5;
            $category_1 = !empty($instance['darknews-select-category']) ? $instance['darknews-select-category'] : '0';





            // open the widget container
            echo $args['before_widget'];
            ?>
                <section class="aft-blocks aft-featured-category-section archive-list-post featured-cate-sec pad-v">
                    <?php if (!empty($title_1)): ?>
                        <?php darknews_render_section_title($title_1); ?>
                    <?php endif; ?>
                    <?php $darknews_all_posts_vertical = darknews_get_posts($darknews_no_of_post, $category_1); ?>

                    <div class="full-wid-resp af-widget-body clearfix">
                        <?php
                            if ($darknews_all_posts_vertical->have_posts()) :
                                while ($darknews_all_posts_vertical->have_posts()) : $darknews_all_posts_vertical->the_post();
                                    global $post;
                                    $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium');
                                    $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    ?>
                                    <div class="list-style">
                                        <?php do_action('darknews_action_loop_list', $post->ID, 'medium', 0, true, true, true, true); ?>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
                </section>
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;


            //print_pre($terms);
            $categories = darknews_get_terms();


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::darknews_generate_text_input('darknews-posts-list-title', __('Title', 'darknews'), 'Post Single Column');
                echo parent::darknews_generate_select_options('darknews-select-category', __('Select Category', 'darknews'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;