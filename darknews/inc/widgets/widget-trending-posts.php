<?php
    
    if (!class_exists('DarkNews_Trending_Posts')) :
        /**
         * Adds DarkNews_Prime_News widget.
         */
        class DarkNews_Trending_Posts extends DarkNews_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array(
                    'darknews-trending-news-title',
                    'darknews-number-of-posts',
                
                );
                $this->select_fields = array(
                    
                    'darknews-news_filter-by',
                    'darknews-select-category',
                
                );
                
                $widget_ops = array(
                    'classname' => 'darknews_trending_news_widget',
                    'description' => __('Displays grid from selected categories.', 'darknews'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('darknews_trending_news', __('AFTDN Trending News', 'darknews'), $widget_ops);
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
                
                $darknews_trending_news_section_title = apply_filters('widget_title', $instance['darknews-trending-news-title'], $instance, $this->id_base);
                
                $darknews_no_of_post = 7;
                $darknews_trending_news_category = !empty($instance['darknews-select-category']) ? $instance['darknews-select-category'] : '0';

                // open the widget container
                echo $args['before_widget'];?>
                <div class="full-wid-resp pad-v">
                <?php
                
                if (!empty($darknews_trending_news_section_title)) { ?>
                    <?php darknews_render_section_title($darknews_trending_news_section_title); ?>
                <?php }
                ?>
                <div class="slick-wrapper af-post-carousel-list banner-vertical-slider af-widget-carousel af-widget-body">
                        
                        <?php

                            $darknews_filterby = 'cat';

                            $darknews_featured_posts = darknews_get_posts($darknews_no_of_post, $darknews_trending_news_category, $darknews_filterby);
                            if ($darknews_featured_posts->have_posts()) :
                                $darknews_count = 1;
                                while ($darknews_featured_posts->have_posts()) :
                                    $darknews_featured_posts->the_post();
                                    global $post;

                                    
                                    ?>
                                    <div class="slick-item pad">
                                        <div class="aft-trending-posts list-part af-sec-post">
                                            <?php do_action('darknews_action_loop_list', $post->ID, 'thumbnail', $darknews_count, false, true, false); ?>
                                        </div>
                                    </div>
                                <?php
                                    $darknews_count++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                    
                </div>
                </div>
                <?php echo $args['after_widget'];
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
                
                echo parent::darknews_generate_text_input('darknews-trending-news-title', __('Title', 'darknews'), 'Trending News');
                echo parent::darknews_generate_select_options('darknews-select-category', __('Select Category', 'darknews'), $categories);

            }
            
        }
    
    endif;