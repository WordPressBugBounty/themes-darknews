<?php
if (!class_exists('DarkNews_Posts_Slider')) :
    /**
     * Adds DarkNews_Posts_Slider widget.
     */
    class DarkNews_Posts_Slider extends DarkNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('darknews-posts-slider-title','darknews-number-of-posts');
            $this->select_fields = array('darknews-select-category');

            $widget_ops = array(
                'classname' => 'darknews_posts_slider_widget aft-widget',
                'description' => __('Displays posts slider from selected category.', 'darknews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('darknews_posts_slider', __('AFTDN Posts Slider', 'darknews'), $widget_ops);
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
            $darknews_posts_slider_title = apply_filters('widget_title', $instance['darknews-posts-slider-title'], $instance, $this->id_base);
            $category = isset($instance['darknews-select-category']) ? $instance['darknews-select-category'] : 0;
            $number_of_posts = 5;
           

          
            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php
            
            ?>
            <section class="aft-blocks pad-v">
                <div class="af-slider-wrap">
    
                    <?php if (!empty($darknews_posts_slider_title)): ?>
                        <?php darknews_render_section_title($darknews_posts_slider_title); ?>
                    <?php endif; ?>
                    <div class="widget-block widget-wrapper af-widget-body">
                        <div class="af-posts-slider posts-slider banner-slider-2  af-posts-slider af-widget-carousel af-cat-widget-carousel slick-wrapper">
                            <?php
                                $darknews_slider_posts = darknews_get_posts($number_of_posts, $category);
                                if ($darknews_slider_posts->have_posts()) :
                                    while ($darknews_slider_posts->have_posts()) : $darknews_slider_posts->the_post();
            
                                        global $post;

                                        ?>
                                        <div class="slick-item">
                                            <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-texts-over-image', 'darknews-slider-full'); ?>
                                        </div>
                                    <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
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
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            

            $categories = darknews_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::darknews_generate_text_input('darknews-posts-slider-title', __('Title', 'darknews'), 'Posts Slider');
                echo parent::darknews_generate_select_options('darknews-select-category', __('Select category', 'darknews'), $categories);
            }
        }
    }
endif;