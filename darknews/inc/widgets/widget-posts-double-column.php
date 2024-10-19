<?php
if (!class_exists('DarkNews_Express_Posts_Double_Column')) :
    /**
     * Adds DarkNews_Express_Posts_Double_Column widget.
     */
    class DarkNews_Express_Posts_Double_Column extends DarkNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'darknews-posts-list-title-1',
                'darknews-posts-list-title-2',
                'darknews-posts-slider-number'

            );
            $this->select_fields = array(

                'darknews-select-category-1',
                'darknews-select-category-2',

            );

            $widget_ops = array(
                'classname' => 'darknews_posts_double_columns_widget',
                'description' => __('Displays grid from selected categories.', 'darknews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('darknews_posts_double_column', __('AFTDN Post Double Columns', 'darknews'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         * @see WP_Widget::widget()
         *
         */

        public function widget($args, $instance)
        {

            $instance = parent::darknews_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */


            $darknews_no_of_post = 3;

            for ($darknews_i = 1; $darknews_i <= 2; $darknews_i++) {
                $darknews_section_title = apply_filters('widget_title', $instance['darknews-posts-list-title-' . $darknews_i], $instance, $this->id_base);
                $darknews_category_id = !empty($instance['darknews-select-category-' . $darknews_i]) ? $instance['darknews-select-category-' . $darknews_i] : '0';
                $darknews_featured_categories['feature_' . $darknews_i][] = $darknews_category_id;
                $darknews_featured_categories['feature_' . $darknews_i][] = $darknews_section_title;


            }

            // open the widget container
            echo $args['before_widget'];
            if (isset($darknews_featured_categories)): ?>

                <div class="af-container-row pad-v clearfix">
                    <?php
                    foreach ($darknews_featured_categories as $darknews_fc): ?>
                        <div class="col-2 pad float-l af-sec-post">
                            <?php if (!empty($darknews_fc[1])): ?>
                                <?php darknews_render_section_title($darknews_fc[1]); ?>
                            <?php endif; ?>

                            <?php $darknews_all_posts_vertical = darknews_get_posts($darknews_no_of_post, $darknews_fc[0]); ?>
                            <div class="full-wid-resp af-widget-body">
                                <?php
                                if ($darknews_all_posts_vertical->have_posts()) :
                                    $darknews_count = 1;
                                    while ($darknews_all_posts_vertical->have_posts()) : $darknews_all_posts_vertical->the_post();
                                        global $post;
                                        if ($darknews_count == 1):
                                            ?>
                                            <div class="af-sec-post">
                                                <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-default', 'darknews-medium'); ?>
                                            </div>
                                        <?php else: ?>
                                            <?php do_action('darknews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                                        <?php
                                        endif;
                                        $darknews_count++;
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div><!--featured-category-item-->
                    <?php

                    endforeach; ?>

                </div>
            <?php
            endif;

            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @param array $instance Previously saved values from database.
         * @see WP_Widget::form()
         *
         */
        public function form($instance)
        {
            $this->form_instance = $instance;


            //print_pre($terms);
            $categories = darknews_get_terms();


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::darknews_generate_text_input('darknews-posts-list-title-1', __('Title', 'darknews'), 'Post Double Columns 1');
                echo parent::darknews_generate_text_input('darknews-posts-list-title-2', __('Title', 'darknews'), 'Post Double Columns 2');
                echo parent::darknews_generate_select_options('darknews-select-category-1', __('Select Category 1', 'darknews'), $categories);
                echo parent::darknews_generate_select_options('darknews-select-category-2', __('Select Category 2', 'darknews'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;