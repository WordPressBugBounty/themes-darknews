<?php
    if (!class_exists('DarkNews_Posts_Carousel')) :
        /**
         * Adds DarkNews_Posts_Carousel widget.
         */
        class DarkNews_Posts_Carousel extends DarkNews_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array('darknews-posts-slider-title', 'darknews-posts-slider-number');
                $this->select_fields = array('darknews-select-category');
                
                $widget_ops = array(
                    'classname' => 'darknews_posts_carousel_widget carousel-layout',
                    'description' => __('Displays posts carousel from selected category.', 'darknews'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('darknews_posts_carousel', __('AFTDN Posts Carousel', 'darknews'), $widget_ops);
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
    
                $darknews_featured_news_title = apply_filters('widget_title', $instance['darknews-posts-slider-title'], $instance, $this->id_base);

                $darknews_category_id = !empty($instance['darknews-select-category']) ? $instance['darknews-select-category'] : '0';
                $darknews_no_of_post = 5;

                $darknews_featured_posts = darknews_get_posts($darknews_no_of_post, $darknews_category_id);
                // open the widget container
                echo $args['before_widget'];
                ?>
                <div class="af-main-banner-categorized-posts express-carousel pad-v">
                <div class="section-wrapper">
                    <?php if (!empty($darknews_featured_news_title)): ?>
                        <?php darknews_render_section_title($darknews_featured_news_title); ?>
                    <?php endif; ?>
                    <div class="slick-wrapper af-post-carousel af-widget-post-carousel clearfix af-cat-widget-carousel af-widget-carousel af-widget-body">
                        <?php
                            
                
                            if ($darknews_featured_posts->have_posts()) :
                                $darknews_count = 1;
                                while ($darknews_featured_posts->have_posts()) :
                                    $darknews_featured_posts->the_post();
                                    global $post;
                                    $darknews_img_thumb_id = get_post_thumbnail_id($post->ID);
                                    $darknews_first_section_class = '';
                                    $darknews_img_url = darknews_get_freatured_image_url($post->ID, 'darknews-medium-square');
                                    ?>
                                    <div class="slick-item pad float-l af-sec-post">
                                        <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-texts-over-image'); ?>
                                    </div>
                                    <?php
                                    $darknews_count++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                    </div>
                </div>
                </div>
                
                <?php
                //print_pre($all_posts);
                
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
                    echo parent::darknews_generate_text_input('darknews-posts-slider-title', 'Title', 'Posts Carousel');
                    echo parent::darknews_generate_select_options('darknews-select-category', __('Select category', 'darknews'), $categories);

                }
            }
        }
    endif;