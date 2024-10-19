<?php
if (!class_exists('DarkNews_Express_Posts_List')) :
    /**
     * Adds DarkNews_Express_Posts_List widget.
     */
    class DarkNews_Express_Posts_List extends DarkNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'darknews-express-posts-section-title',
                'darknews-number-of-posts',

            );
            $this->select_fields = array(

                'darknews-select-category',

            );

            $widget_ops = array(
                'classname' => 'darknews_express_posts_list_widget',
                'description' => __('Displays Express Posts from selected categories.', 'darknews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('darknews_express_posts_list', __('AFTDN Express Posts List', 'darknews'), $widget_ops);
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

            $darknews_express_section_title = apply_filters('widget_title', $instance['darknews-express-posts-section-title'], $instance, $this->id_base);

            $darknews_category = !empty($instance['darknews-select-category']) ? $instance['darknews-select-category'] : '0';
            $darknews_no_of_post = 5;



            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="aft-blocks aft-featured-category-section af-list-post featured-cate-sec pad-v">
                <?php $darknews_featured_express_posts_one = darknews_get_posts($darknews_no_of_post, $darknews_category); ?>

                <div class="af-main-banner-categorized-posts express-posts layout-1">
                    <div class="section-wrapper clearfix">
                        <div class="small-grid-style clearfix">
                            <?php

                            if ($darknews_featured_express_posts_one->have_posts()) :
                                ?>
                                <?php if (!empty($darknews_express_section_title)): ?>
                                <?php darknews_render_section_title($darknews_express_section_title); ?>
                            <?php endif; ?>
                                <div class="featured-post-items-wrap clearfix af-container-row af-widget-body">
                                    <?php
                                    $darknews_count = 1;
                                    while ($darknews_featured_express_posts_one->have_posts()) :
                                        $darknews_featured_express_posts_one->the_post();
                                        global $post;
                                        $darknews_first_section_class = '';
                                        if ($darknews_count == 1): ?>
                                            <div class="col-2 pad float-l af-sec-post <?php echo esc_html($darknews_first_section_class); ?>">
                                                <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-default', 'darknews-medium', true); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-2 pad float-l list-part af-sec-post">
                                                <?php do_action('darknews_action_loop_list', $post->ID, 'thumbnail', 0, false, true, false); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $darknews_count++;
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif;
                            ?>
                        </div>

                    </div>
                </div>
            </section>
            <?php
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
                echo parent::darknews_generate_text_input('darknews-express-posts-section-title', __('Title', 'darknews'), 'Express Posts List');
                echo parent::darknews_generate_select_options('darknews-select-category', __('Select Category', 'darknews'), $categories);


            }

            //print_pre($terms);


        }

    }
endif;