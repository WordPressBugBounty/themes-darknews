<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package DarkNews
 */

/*select page for slider*/
if (!function_exists('darknews_frontpage_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_frontpage_content_status($control)
    {

        if ('page' == $control->manager->get_setting('show_on_front')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for darknews_show_date_on_header news*/
if (!function_exists('darknews_top_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_top_header_status($control)
    {

        if (true == $control->manager->get_setting('show_top_header_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for darknews_show_date_on_header news*/
if (!function_exists('darknews_show_date_on_header')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_show_date_on_header($control)
    {

        if ('header-layout-compressed' != $control->manager->get_setting('header_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('darknews_popular_tags_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_popular_tags_section_status($control)
    {

        if (true == $control->manager->get_setting('show_popular_tags_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('darknews_flash_posts_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_flash_posts_section_status($control)
    {

        if (true == $control->manager->get_setting('show_flash_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_global_site_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_site_mode_status($control)
    {

        if (('aft-default-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_global_site_mode_dark_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_site_mode_dark_status($control)
    {

        if (('aft-dark-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_global_site_mode_light_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_site_mode_light_status($control)
    {

        if (('aft-default-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_solid_secondary_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_solid_secondary_color_status($control)
    {

        if ('solid-color' == $control->manager->get_setting('secondary_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_gradient_secondary_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_gradient_secondary_color_status($control)
    {

        if ('gradient-color' == $control->manager->get_setting('secondary_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_main_navigation_background_color_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_navigation_background_color_mode_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('main_navigation_background_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;
    

    //Youtube section
    if (!function_exists('darknews_youtube_video_section_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function darknews_youtube_video_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_youtube_video')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
        
        //Express Posts Section


    if (!function_exists('darknews_express_posts_section_status')) :

        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function darknews_express_posts_section_status($control)
        {

            if (true == $control->manager->get_setting('show_express_post_section')->value()) {
                return true;
            } else {
                return false;
            }

        }

    endif;



    
    /*select page for slider*/
if (!function_exists('darknews_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    
    
    if (!function_exists('darknews_main_banner_layout_trending_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function darknews_main_banner_layout_trending_status($control)
        {
            
            if ('layout-3' == $control->manager->get_setting('select_main_banner_layout_section')->value()|| 'default-main' == $control->manager->get_setting('select_main_banner_layout_section')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;
    
    
    if (!function_exists('darknews_main_banner_layout_editor_picks_status')) :
        
        /**
         * Check if slider section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function darknews_main_banner_layout_editor_picks_status($control)
        {
            
            if ('layout-2' == $control->manager->get_setting('select_main_banner_layout_section')->value() || 'default-main' == $control->manager->get_setting('select_main_banner_layout_section')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;


/*select page for slider*/
if (!function_exists('darknews_main_banner_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_main_banner_carousel_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_main_banner_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_main_banner_carousel_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_editors_picks_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_editors_picks_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_editors_picks_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_editors_picks_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_editors_picks_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_editors_picks_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*select page for slider*/
if (!function_exists('darknews_trending_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_trending_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_trending_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_trending_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_popular_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_popular_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_popular_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_popular_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_popular_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_popular_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('darknews_show_watch_online_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_show_watch_online_section_status($control)
    {

        if ( true == $control->manager->get_setting('show_watch_online_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('darknews_sidebar_trending_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_sidebar_trending_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_sidebar_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_sidebar_trending_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_sidebar_trending_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_sidebar_trending_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;




/* Display if the slider is selected */
if (!function_exists('darknews_main_banner_carousel_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_carousel_status($control)
    {

        if ('banner-carousel' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/* Display if the slider is selected */
if (!function_exists('darknews_main_banner_carousel_layout_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_carousel_layout_status($control)
    {

        if ('carousel-layout-default' == $control->manager->get_setting('select_main_banner_carousel_option')->value() || 'carousel-layout-4' == $control->manager->get_setting('select_main_banner_carousel_option')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_banner_latest_post_section_filterby_cat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_banner_latest_post_section_filterby_cat_status($control)
    {

        if ('cat' == $control->manager->get_setting('select_banner_latest_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_banner_latest_post_section_filterby_tag_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_banner_latest_post_section_filterby_tag_status($control)
    {

        if ('tag' == $control->manager->get_setting('select_banner_latest_post_filterby')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the Grid is selected */
if (!function_exists('darknews_main_banner_grid_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_grid_status($control)
    {

        if ('banner-grid' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the Grid is selected */
if (!function_exists('darknews_main_banner_grid_carousel_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_grid_carousel_status($control)
    {

        if ('default' == $control->manager->get_setting('select_main_banner_section_mode')->value() || 'banner-grid' == $control->manager->get_setting('select_main_banner_section_mode')->value() || 'banner-carousel' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/* Display if the slider is selected */
if (!function_exists('darknews_main_banner_slider_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_main_banner_slider_status($control)
    {

        if ('banner-slider' == $control->manager->get_setting('select_main_banner_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_banner_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_banner_mode_status($control)
    {

        if (('banner-slider' == $control->manager->get_setting('select_main_banner_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_tabbed_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_tabbed_mode_status($control)
    {

        if (('default' == $control->manager->get_setting('select_tab_section_mode')->value()) || ('trending' == $control->manager->get_setting('select_tab_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select post*/
if (!function_exists('darknews_featured_posts_section')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_posts_section($control)
    {

        if (true == $control->manager->get_setting('show_featured_posts_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_featured_post_list_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_post_list_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_post_list_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;
    
    if (!function_exists('darknews_featured_post_carousel_section_status')) :
        
        /**
         * Check if ticker section page/post is active.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function darknews_featured_post_carousel_section_status($control)
        {
            
            if (true == $control->manager->get_setting('show_post_carousel_section')->value()) {
                return true;
            } else {
                return false;
            }
            
        }
    
    endif;


/*select page for slider*/
if (!function_exists('darknews_featured_news_category_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_news_category_section_status($control)
    {

        if ('category' == $control->manager->get_setting('show_featured_category_page_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


//choose page

/*select page for slider*/
if (!function_exists('darknews_featured_news_pages_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_news_pages_section_status($control)
    {

        if ('page' == $control->manager->get_setting('show_featured_category_page_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

//choose page

/*select page for slider*/
if (!function_exists('darknews_featured_news_custom_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_news_custom_section_status($control)
    {

        if ('custom' == $control->manager->get_setting('show_featured_category_page_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_featured_product_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_featured_product_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_products_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_display_author_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_display_author_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-author-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_display_date_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_display_date_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-date-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select sticky sidebar*/
if (!function_exists('darknews_frontpage_content_alignment_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_frontpage_content_alignment_status($control)
    {

        if ('align-content-left' == $control->manager->get_setting('frontpage_content_alignment')->value() || 'align-content-right' == $control->manager->get_setting('frontpage_content_alignment')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if ( ! function_exists( 'frontpage_sticky_sidebar_status' ) ) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function frontpage_sticky_sidebar_status( $control ) {

        if ( true == $control->manager->get_setting( 'frontpage_sticky_sidebar' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_latest_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_latest_news_section_status($control)
    {

        if (true == $control->manager->get_setting('frontpage_show_latest_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_archive_image_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_archive_image_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_archive_image_gird_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_archive_image_gird_status($control)
    {

        if ('archive-layout-grid' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select layout for masonary for slider*/
if (!function_exists('darknews_archive_masonry_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_archive_masonry_status($control)
    {

        if ('archive-layout-masonry' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select layout for masonary for slider*/
if (!function_exists('darknews_archive_full_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_archive_full_status($control)
    {

        if ('archive-layout-full' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select layout for masonary for slider*/
if (!function_exists('darknews_archive_layout_first_post_full_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_archive_layout_first_post_full_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value() || 'archive-layout-grid' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('darknews_related_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_related_posts_status($control)
    {

        if (true == $control->manager->get_setting('single_show_related_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*mailchimp*/
if (!function_exists('darknews_mailchimp_subscriptions_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_mailchimp_subscriptions_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_mailchimp_subscriptions')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('darknews_footer_instagram_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_footer_instagram_posts_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_instagram_post_carousel')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_global_show_category_number_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_show_category_number_status($control)
    {

        if ('yes' == $control->manager->get_setting('global_show_categories')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_global_show_custom_category_number_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_show_custom_category_number_status($control)
    {

        if ('custom' == $control->manager->get_setting('global_number_of_categories')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('darknews_global_show_minutes_count_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_show_minutes_count_status($control)
    {

        if ('yes' == $control->manager->get_setting('global_show_min_read')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('darknews_global_show_view_count_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function darknews_global_show_view_count_status($control)
    {

        if ('yes' == $control->manager->get_setting('global_show_view_count')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

