<?php
/**
 * Default theme options.
 *
 * @package DarkNews
 */

if (!function_exists('darknews_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function darknews_get_default_theme_options() {

    $defaults = array();
    // Preloader options section
    $defaults['enable_site_preloader'] = 1;

    // Header options section
    $defaults['header_layout'] = 'header-layout-default';
    $defaults['show_top_header_section'] = 1;
    $defaults['show_top_menu'] = 1;
    $defaults['show_social_menu_section'] = 1;
    $defaults['enable_sticky_header_option'] = 0;
    
    $defaults['show_date_section'] = 1;

    $defaults['global_show_min_read']           = 'no';
    $defaults['global_show_min_read_number']   = 250;
    $defaults['global_show_categories']           = 'yes';
    $defaults['global_show_home_menu_border']    = 'show-menu-border';
    $defaults['global_site_mode_setting']    = 'aft-dark-mode';
    $defaults['aft_language_switcher']           = '';
    $defaults['show_watch_online_section']           = 1;
    $defaults['aft_custom_icon']           = 'fas fa-play';
    $defaults['aft_custom_title']           = __('Watch Online', 'darknews');
    $defaults['aft_custom_link']           = '';



    $defaults['disable_header_image_tint_overlay'] = 0;
    $defaults['select_header_image_mode'] = 'default';
    $defaults['show_offpanel_menu_section'] = 1;
    
    
    $defaults['banner_advertisement_section'] = '';
    $defaults['banner_advertisement_section_url'] = '';
    $defaults['banner_advertisement_open_on_new_tab'] = 1;
    $defaults['banner_advertisement_scope'] = 'site-wide';

    //Popular Tags
    $defaults['frontpage_popular_tags_settings'] = '';
    $defaults['show_popular_tags_section'] = 1;
    $defaults['frontpage_popular_tags_section_title'] = __('Popular Tags', 'darknews');
    $defaults['number_of_popular_tags'] = 9;
    $defaults['select_popular_tags_mode'] = 'post_tag';
    
    
    //Flash news
    $defaults['frontpage_flash_news_settings'] = '';
    $defaults['show_flash_news_section'] = 1;
    $defaults['flash_news_title'] = __('Breaking News', 'darknews');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;

    
    
    //Youtube video  section
    $defaults['frontpage_youtube_video_settings'] = __('Youtube video Section','darknews');
    $defaults['show_youtube_video'] = 0;
    $defaults['frontpage_youtube_video_section_title'] = __('Videos','darknews');
    
    for ($i = 1; $i <= 5; $i++) {
        $defaults['youtube_video_url' . $i] = '';
        
    }
    
    //Express post section
    $defaults['frontpage_express_section_settings'] = __('Express Posts Section','darknews');
    $defaults['show_express_post_section']= 0;
    $defaults['frontpage_express_post_section_title_1'] = __('Express Posts 1','darknews');
    $defaults['frontpage_express_post_section_title_2'] = __('Express Posts 2','darknews');
    for ($i = 1; $i <= 2; $i++) {
        $defaults['select_express_post_category_' . $i] = 0;
    }
    
    //List post section
    $defaults['frontpage_list_pots_section_settings'] = __('Posts List Section','darknews');
    $defaults['show_featured_post_list_section'] = 0;
    for ($i = 1; $i <= 3; $i++) {
        $defaults['featured_post_list_section_title_'.$i] = sprintf(esc_html__('Posts List %d','darknews'),$i);
        $defaults['featured_post_list_category_section_' . $i] =0;
    }
    
    //Grid Post section
    $defaults['show_post_carousel_section'] = 0;
    $defaults['featured_post_carousel_section_title']= __('Posts Carousel','darknews');
    $defaults['select_featured_post_carousel_category'] = 0;
    $defaults['number_of_featured_gird'] = 7;
    
    // breadcrumb options section
    $defaults['enable_breadcrumb'] = 1;
    $defaults['select_breadcrumb_mode'] = 'default';

    // Frontpage Section.
    $defaults['show_main_news_section'] = 1;
    $defaults['main_banner_background_section'] = 0;

    $defaults['select_main_banner_layout_section'] = 'layout-1';
    $defaults['select_main_banner_order'] = 'order-1';

    $defaults['latest_tab_title'] = __('Latest', 'darknews');
    $defaults['popular_tab_title'] = __('Popular', 'darknews');
    $defaults['trending_tab_title'] = __('Trending', 'darknews');
    $defaults['select_trending_tab_news_category'] = 0;

    $defaults['main_trending_news_section_title'] = __('Trending', 'darknews');
    $defaults['select_trending_post_filterby'] = 'cat';
    $defaults['select_trending_post_category'] = 0;
    $defaults['select_trending_post_tag'] = 0;
    $defaults['trending_post_number_of_slides'] = 4;


    $defaults['main_popular_news_section_title'] = __('Popular', 'darknews');    ;
    $defaults['select_popular_post_filterby'] = 'comment';
    $defaults['select_popular_post_category'] = 0;
    $defaults['select_popular_post_tag'] = 0;

    $defaults['main_latest_news_section_title'] = __('Latest', 'darknews');
    $defaults['select_banner_latest_post_filterby'] = 'cat';
    $defaults['select_banner_latest_post_category'] = 0;
    $defaults['select_latest_post_tag'] = 0;


    $defaults['select_slider_news_category'] = 0;
    $defaults['select_slider_news_tag'] = 0;
    $defaults['select_tab_section_mode'] = 'default';
    $defaults['select_trending_tab_news_category'] = 0;


    
    $defaults['select_main_banner_section_mode'] = 'banner-carousel';


    
    $defaults['select_main_banner_grid_option'] = 'grid-layout-1';
    
    $defaults['select_main_banner_carousel_option'] = 'carousel-layout-default';
    $defaults['select_main_banner_carousel_filterby'] = 'cat';

    $defaults['select_main_banner_carousel_position'] = 'aft-position-1';
    $defaults['select_editors_picks_news_position'] = 'aft-position-2';
    $defaults['select_trending_post_position'] = 'aft-position-3';

    $defaults['main_editors_picks_section_title'] = __("Editor's Picks", 'darknews');
    $defaults['select_editors_picks_filterby'] = 'cat';
    $defaults['select_editors_picks_news_category'] = 0;
    $defaults['select_editors_picks_news_tag'] = 0;

    $defaults['select_main_banner_carousel_layout_option'] = 'square-default';

    $defaults['main_banner_section_background_color'] = '#1c1c1c';
    $defaults['main_banner_section_secondary_background_color'] = '#212121';
    $defaults['main_banner_section_texts_color'] = '#ffffff';
    $defaults['main_banner_section_background_image'] = 0;
    $defaults['number_of_slides'] = 5;

    $defaults['editors_picks_title'] = __("Editor's Picks", 'darknews');
    $defaults['select_editors_picks_category'] = 0;

    $defaults['trending_slider_title'] = __("Trending Story", 'darknews');
    $defaults['select_trending_news_category'] = 0;
    $defaults['number_of_trending_slides'] = 5;

    $defaults['show_featured_posts_section'] = 1;
    $defaults['featured_news_section_title'] = __('Featured Posts', 'darknews');
    $defaults['number_of_featured_news'] = 4;
    //$defaults['select_featured_post'] = 0;
    
    $defaults['show_featured_category_section'] = 0;
    $defaults['select_featured_news_category'] = 0;
    
    $defaults['featured_category_section'] = __('Featured Categories', 'darknews');
    $defaults['featured_page_section'] = __('Featured Pages', 'darknews');
    $defaults['featured_custom_section'] = __('Custom Options', 'darknews');
    
    
    for ( $i = 1; $i < 5; $i++ ) {
        $defaults['featured_category_section_'.$i] =  sprintf(esc_html__('Post list Section Title %d','darknews'),$i);
        $defaults['featured_category_image_'.$i] = '';
        $defaults['select_featured_category_'.$i] = 0;
        $defaults['select_featured_page_'.$i] = 0;
        $defaults['featured_custom_image_'.$i] = '';
        $defaults['featured_custom_url_' .$i] = '';
        $defaults['featured_custom_text_' .$i] = __('View More','darknews');
    }
    
    $defaults['show_featured_category_page_section'] = 'category';

    $defaults['frontpage_content_alignment'] = 'align-content-left';
    $defaults['frontpage_content_type'] = 'frontpage-widgets';
    $defaults['frontpage_sticky_sidebar'] = 1;
    $defaults['frontpage_sticky_sidebar_position'] = 'sidebar-sticky-top';

    //layout options
    $defaults['global_content_layout'] = 'default-content-layout';
    $defaults['global_content_alignment'] = 'align-content-left';
    $defaults['global_single_content_mode'] = 'single-content-mode-default';
    $defaults['global_image_alignment'] = 'full-width-image';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['small_grid_post_date_author_setting'] = 'show-date-only';
    $defaults['list_post_date_author_setting'] = 'show-date-only';
    $defaults['global_author_icon_gravatar_display_setting'] = 'display-gravatar';

    $defaults['global_excerpt_length'] = 18;
    $defaults['global_read_more_texts'] = __('Read More', 'darknews');
    $defaults['global_widget_excerpt_setting'] = 'default-excerpt';
    $defaults['global_date_display_setting'] = 'default-date';

    $defaults['archive_layout'] = 'archive-layout-grid';
    $defaults['archive_layout_first_post_full'] = 0;
    $defaults['archive_pagination_view'] = 'archive-default';
    $defaults['archive_image_alignment_grid'] = 'archive-image-default';
    
    //grid column optoon
    $defaults['archive_grid_column_layout'] = 'grid-layout-two';
    
    $defaults['archive_image_alignment'] = 'archive-image-left';
    
    //masonary column option
    $defaults['archive_layout_masonry'] = 'masonry-layout-two';
    
    $defaults['archive_layout_full'] = 'full-image-first';
    
    
    
    
    $defaults['archive_content_view'] = 'archive-content-excerpt';
    $defaults['disable_main_banner_on_blog_archive'] = 1;


    //Related posts
    $defaults['single_show_featured_image'] = 1;
    $defaults['single_show_mailchimp_subscriptions'] = 1;
    $defaults['single_show_trending_post_list'] = 1;
    $defaults['single_post_title_view']     = 'boxed';
    
    $defaults['single_post_social_share_view']     = 'after-title-default';
    $defaults['single_post_view_count']     = 'each-load-default';
    
   
    //Sidebar Block
    $defaults['show_sidebar_trending_post_in_frontpage'] = 1;
    $defaults['sidebar_trending_post_title'] = __('Trending Now', 'darknews');
    $defaults['select_sidebar_trending_post_filterby'] = 'cat';
    $defaults['select_sidebar_trending_post_category'] = 0;
    $defaults['select_sidebar_trending_post_tag'] = 0;

    $defaults['show_sidebar_trending_post_in_archive'] = 1;
    $defaults['show_sidebar_trending_post_in_single'] = 1;
    $defaults['sidebar_trending_post_position'] = 'aft-position-1';

    $defaults['show_sidebar_social_contacts_in_frontpage'] = 1;
    $defaults['sidebar_social_contacts_section_title'] = __('Connect with Us','darknews');
    $defaults['show_sidebar_social_contacts_in_archive'] = 1;
    $defaults['show_sidebar_social_contacts_in_single'] = 1;
    $defaults['sidebar_social_contacts_position'] = 'aft-position-2';

    $defaults['show_sidebar_instagram_in_frontpage'] = 1;
    $defaults['sidebar_instagram_section_title_text']= __('Instagram','darknews');
    $defaults['show_sidebar_instagram_in_archive'] = 1;
    $defaults['show_sidebar_instagram_in_single'] = 1;
    $defaults['sidebar_instagram_position'] = 'aft-position-3';


    $defaults['show_sidebar_popular_post_in_frontpage'] = 1;
    $defaults['sidebar_popular_post_section_title_text'] = __('Popular News','darknews');
    $defaults['show_sidebar_popular_post_in_archive'] = 1;
    $defaults['show_sidebar_popular_post_in_single'] = 1;
    $defaults['select_sidebar_popular_post_filterby'] = 'comment';
    $defaults['show_sidebar_popular_post_position'] = 'aft-position-4';

    //Related posts
    $defaults['single_show_related_posts'] = 1;
    $defaults['single_related_posts_title']     = __( 'Related Stories', 'darknews' );
    $defaults['single_number_of_related_posts']  = 6;

    //Pagination.
    $defaults['site_pagination_type'] = 'default';


    // Footer.
    // Latest posts
    $defaults['frontpage_show_latest_posts'] = 1;
    $defaults['frontpage_latest_posts_section_title'] = __('You may have missed', 'darknews');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Instagram
    $defaults['footer_show_instagram_post_carousel'] = 0;
    $defaults['footer_instagram_post_carousel_scopes'] = 'front-page';
    $defaults['instagram_username'] = 'your_username';
    $defaults['instagram_access_token'] = '7513125878.1677ed0.4859561aaca443e588fb8a37bc5f1e3b';
    $defaults['number_of_instagram_posts'] = 6;
    $defaults['footer_instagram_post_carousel_thumb_size'] = 'small';


    $defaults['footer_copyright_text'] = esc_html__('Copyright &copy; All rights reserved.', 'darknews');
    $defaults['hide_footer_menu_section']  = 0;
    $defaults['hide_footer_site_title_section']  = 0;
    $defaults['hide_footer_copyright_credits']  = 0;
    $defaults['number_of_footer_widget']  = 3;
    $defaults['footer_background_image'] = 0;


    // font and color options
    $defaults['secondary_color']     = '#d72924 ';
    $defaults['light_background_color']     = '#eeeeee ';

//font options additional value
    global $darknews_google_fonts;
    $darknews_google_fonts = array(
        'Lato:400,300,400italic,900,700'            => 'Lato',
        'Oswald:300,400,700'                        => 'Oswald',
        'Old+Standard+TT:400,400italic,700'         => 'Old Standard TT',
        'Open+Sans:400,400italic,600,700'           => 'Open Sans',
        'Playfair+Display:400,400italic,700,900'    => 'Playfair Display',
        'Poppins:300,400,500,600,700'               => 'Poppins',
        'Roboto:100,300,400,500,700'                => 'Roboto',
    );

    //font option

    $defaults['site_title_font']   = 'Roboto:100,300,400,500,700';
    $defaults['primary_font']      = 'Open+Sans:400,400italic,600,700';
    $defaults['secondary_font']    = 'Roboto:100,300,400,500,700';


    $defaults['global_widget_title_border']           = 'widget-title-fill-and-border';
    $defaults['global_scroll_to_top_position']    = 'right';
    $defaults['global_show_comment_count']           = 'yes';
    $defaults['global_show_view_count']           = 'yes';
    $defaults['global_show_primary_menu_border']    = 'show-menu-border';

    $defaults['global_show_categories']           = 'yes';
    $defaults['global_number_of_categories']        = 'all';
    $defaults['global_custom_number_of_categories']  = 3;

    $defaults['global_site_layout_setting']    = 'boxed';
    $defaults['global_site_layout_topbottom_gaps']    = true;

    //font size

    $defaults['site_title_font_size']    = 56;


    // Pass through filter.
    $defaults = apply_filters('darknews_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
