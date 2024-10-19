<?php
if (!class_exists('DarkNews_Posts_lists')) :
    /**
     * Adds DarkNews_Posts_lists widget.
     */
    class DarkNews_Posts_lists extends DarkNews_Widget_Base
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
                'classname' => 'darknews_posts_lists_widget',
                'description' => __('Displays grid from selected categories.', 'darknews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('darknews_posts_list', __('AFTDN Post List', 'darknews'), $widget_ops);
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

            $category_1 = !empty($instance['darknews-select-category']) ? $instance['darknews-select-category'] : '0';
            $darknews_no_of_post = 8;


            // open the widget container
            echo $args['before_widget'];
            ?>
                <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec pad-v">
                    <?php if (!empty($title_1)): ?>
                        <?php darknews_render_section_title($title_1); ?>
                    <?php endif; ?>
                    <?php $darknews_all_posts_vertical = darknews_get_posts($darknews_no_of_post, $category_1); ?>

                    <div class="full-wid-resp af-widget-body af-container-row clearfix">
                        <?php
                            if ($darknews_all_posts_vertical->have_posts()) :
                                while ($darknews_all_posts_vertical->have_posts()) : $darknews_all_posts_vertical->the_post();
                                    global $post;
                                    $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium-square');
                                    $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    ?>
                                    <div class="pad float-l col-2">
                                        <?php do_action('darknews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
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
                echo parent::darknews_generate_text_input('darknews-posts-list-title', __('Title', 'darknews'), 'Posts List');
                echo parent::darknews_generate_select_options('darknews-select-category', __('Select Category', 'darknews'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;