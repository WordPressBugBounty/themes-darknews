<?php
    if (!class_exists('DarkNews_author_info')) :
        /**
         * Adds DarkNews_author_info widget.
         */
        class DarkNews_author_info extends DarkNews_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array('darknews-author-info-title', 'darknews-author-info-subtitle', 'darknews-author-info-image', 'darknews-author-info-name', 'darknews-author-info-desc', 'darknews-author-info-phone', 'darknews-author-info-email');
                $this->url_fields = array('darknews-author-info-facebook', 'darknews-author-info-twitter', 'darknews-author-info-linkedin', 'darknews-author-info-instagram', 'darknews-author-info-vk', 'darknews-author-info-youtube');
                
                $widget_ops = array(
                    'classname' => 'darknews_author_info_widget aft-widget',
                    'description' => __('Displays author info.', 'darknews'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('darknews_author_info', __('AFTDN Author Info', 'darknews'), $widget_ops);
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
    
                $darknews_featured_news_title = apply_filters('widget_title', $instance['darknews-author-info-title'], $instance, $this->id_base);
               
                
                $profile_image = isset($instance['darknews-author-info-image']) ? ($instance['darknews-author-info-image']) : '';
                
                if ($profile_image) {
                    $image_attributes = wp_get_attachment_image_src($profile_image, 'large');
                    $image_src = $image_attributes[0];
                    $image_class = 'data-bg data-bg-hover';
                    
                } else {
                    $image_src = '';
                    $image_class = 'no-bg';
                }
                
                $name = isset($instance['darknews-author-info-name']) ? ($instance['darknews-author-info-name']) : '';
                
                $desc = isset($instance['darknews-author-info-desc']) ? ($instance['darknews-author-info-desc']) : '';
                $facebook = isset($instance['darknews-author-info-facebook']) ? ($instance['darknews-author-info-facebook']) : '';
                $twitter = isset($instance['darknews-author-info-twitter']) ? ($instance['darknews-author-info-twitter']) : '';
                $instagram = isset($instance['darknews-author-info-instagram']) ? ($instance['darknews-author-info-instagram']) : '';
                
                echo $args['before_widget'];
                ?>
                <section class="aft-blocks af-author-info pad-v">
                    <div class="af-author-info-wrap">
                        <?php if (!empty($darknews_featured_news_title)): ?>
                            <?php darknews_render_section_title($darknews_featured_news_title); ?>
                        <?php endif; ?>
                    <div class="widget-block widget-wrapper af-widget-body">
                        <div class="posts-author-wrapper">
                            
                            <?php if (!empty($image_src)) : ?>


                                <figure class="read-img af-author-img">
                                    <img src="<?php echo esc_attr($image_src); ?>" alt=""/>
                                </figure>
                            
                            <?php endif; ?>
                            <div class="af-author-details">
                                <?php if (!empty($name)) : ?>
                                    <h4 class="af-author-display-name"><?php echo esc_html($name); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($desc)) : ?>
                                    <p class="af-author-display-name"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                                
                                <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin) || !empty($youtube) || !empty($instagram) || !empty($vk)) : ?>
                                    <div class="social-navigation aft-small-social-menu">
                                        <ul>
                                            <?php if (!empty($facebook)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($instagram)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($twitter)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>


                                        </ul>
                                    </div>
                                <?php endif; ?>
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
                    echo parent::darknews_generate_text_input('darknews-author-info-title', __('About Author', 'darknews'), __('Title', 'darknews'));
                    
                    echo parent::darknews_generate_image_upload('darknews-author-info-image', __('Profile image', 'darknews'), __('Profile image', 'darknews'));
                    echo parent::darknews_generate_text_input('darknews-author-info-name', __('Name', 'darknews'), __('Name', 'darknews'));
                    echo parent::darknews_generate_text_input('darknews-author-info-desc', __('Descriptions', 'darknews'), '');
                    echo parent::darknews_generate_text_input('darknews-author-info-facebook', __('Facebook', 'darknews'), '');
                    echo parent::darknews_generate_text_input('darknews-author-info-instagram', __('Instagram', 'darknews'), '');
                    echo parent::darknews_generate_text_input('darknews-author-info-twitter', __('Twitter', 'darknews'), '');
                    
                    
                    
                }
            }
        }
    endif;