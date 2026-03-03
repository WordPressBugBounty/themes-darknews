<?php

/**
 * Option Panel
 *
 * @package DarkNews
 */

$darknews_default = darknews_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/frontpage-options.php';

//font and color options
require get_template_directory() . '/inc/customizer/font-color-options.php';

//selective refresh
require get_template_directory() . '/inc/customizer/customizer-refresh.php';

/**
 * Frontpage options section
 *
 * @package DarkNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel('site_header_option_panel',
    array(
        'title' => __('Header Options', 'darknews'),
        'priority' => 198,
        'capability' => 'edit_theme_options',
    )
);

/**
 * Header section
 *
 * @package DarkNews
 */

// Frontpage Section.
$wp_customize->add_section('header_options_settings',
    array(
        'title' => __('Header Options', 'darknews'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'site_header_option_panel',
    )
);


//section title
$wp_customize->add_setting('show_top_header_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'show_top_header_section_title',
        array(
            'label' => __("Top Header Section", 'darknews'),
            'section' => 'header_options_settings',
            'priority' => 10,

        )
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header_section',
    array(
        'default' => $darknews_default['show_top_header_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header_section',
    array(
        'label' => __('Show Top Header', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        //'active_callback' => 'darknews_top_header_status'
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('show_date_section',
    array(
        'default' => $darknews_default['show_date_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_date_section',
    array(
        'label' => __('Show Date', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'darknews_top_header_status'
    )
);



// Setting - show_site_title_section.
$wp_customize->add_setting('show_social_menu_section',
    array(
        'default' => $darknews_default['show_social_menu_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_social_menu_section',
    array(
        'label' => __('Show Social Menu', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 11,
        'active_callback' => 'darknews_top_header_status'
    )
);



// Advertisement Section.
$wp_customize->add_section('frontpage_advertisement_settings',
    array(
        'title' => __('Header Advertisement', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'site_header_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('banner_advertisement_section',
    array(
        'default' => $darknews_default['banner_advertisement_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);




$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_advertisement_section',
        array(
            'label' => __('Header Section Advertisement', 'darknews'),
            'description' => sprintf(__('Recommended Size %1$s px X %2$s px', 'darknews'), 930, 110),
            'section' => 'frontpage_advertisement_settings',
            'width' => 930,
            'height' => 110,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 120,
        )
    )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting('banner_advertisement_section_url',
    array(
        'default' => $darknews_default['banner_advertisement_section_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('banner_advertisement_section_url',
    array(
        'label' => __('URL Link', 'darknews'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'text',
        'priority' => 130,
    )
);



// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => __('Theme Options', 'darknews'),
        'priority' => 200,
        'capability' => 'edit_theme_options',
    )
);



$wp_customize->add_setting('global_site_layout_topbottom_gaps',
    array(
        'default' => $darknews_default['global_site_layout_topbottom_gaps'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('global_site_layout_topbottom_gaps',
    array(
        'label' => __("Enable Box's Top/Bottom Gaps", 'darknews'),
        'section' => 'site_layout_mode_settings',
        'type' => 'checkbox',
        'priority' => 130,
        'active_callback' => 'global_site_layout_boxed_layout_status'
    )
);



// Breadcrumb Section.
$wp_customize->add_section('site_breadcrumb_settings',
    array(
        'title' => __('Breadcrumb Options', 'darknews'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - breadcrumb.
$wp_customize->add_setting('enable_breadcrumb',
    array(
        'default' => $darknews_default['enable_breadcrumb'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_breadcrumb',
    array(
        'label' => __('Show breadcrumbs', 'darknews'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('select_breadcrumb_mode',
    array(
        'default' => $default['select_breadcrumb_mode'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_breadcrumb_mode',
    array(
        'label' => __('Select Breadcrumbs', 'darknews'),
        'description' => __("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'darknews'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'select',
        'choices' => array(
            'default' => __('Default', 'darknews'),
            'yoast' => __('Yoast SEO', 'darknews'),
            'rankmath' => __('Rank Math', 'darknews'),
            'bcn' => __('NavXT', 'darknews'),
        ),
        'priority' => 100,
    ));


/**
 * Layout options section
 *
 * @package DarkNews
 */

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title' => __('Global Settings', 'darknews'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - preloader.
$wp_customize->add_setting('enable_site_preloader',
    array(
        'default' => $darknews_default['enable_site_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_site_preloader',
    array(
        'label' => __('Enable Preloader', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Setting - global banner layout.
$wp_customize->add_setting('global_site_layout_setting',
    array(
        'default' => $darknews_default['global_site_layout_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_site_layout_setting',
    array(
        'label' => __('Site Layout Option', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'boxed' => __("Boxed", 'darknews'),
            'wide' => __("Wide", 'darknews'),
        ),
        'priority' => 130,
    ));



// Setting - global content alignment of news.
$wp_customize->add_setting('global_content_alignment',
    array(
        'default' => $darknews_default['global_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_content_alignment',
    array(
        'label' => __('Global Content Alignment', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => __('Content - Primary sidebar', 'darknews'),
            'align-content-right' => __('Primary sidebar - Content', 'darknews'),
            'full-width-content' => __('Full width content', 'darknews')
        ),
        'priority' => 130,
    ));



// Setting - global content alignment of news.
$wp_customize->add_setting('global_single_content_mode',
    array(
        'default'           => $default['global_single_content_mode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control( 'global_single_content_mode',
    array(
        'label'       => __('Single Content Mode', 'darknews'),
        'section'     => 'site_layout_settings',
        'type'        => 'select',
        'choices'               => array(
            'single-content-mode-default' => __( 'Default', 'darknews' ),
            'single-content-mode-boxed' => __( 'Spacious', 'darknews' ),
        ),
        'priority'    => 130,
    ));



// Setting - global content alignment of news.
$wp_customize->add_setting('global_scroll_to_top_position',
    array(
        'default' => $darknews_default['global_scroll_to_top_position'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_scroll_to_top_position',
    array(
        'label' => __('Scroll to Top Position', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'right' => __('Right', 'darknews'),
            'left' => __('Left', 'darknews'),
            'none' => __('None', 'darknews')

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_categories_settings',
    array(
        'title' => __('Categories Settings', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_categories',
    array(
        'default' => $darknews_default['global_show_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_show_categories',
    array(
        'label' => __('Post Categories', 'darknews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => __('Show', 'darknews'),
            'no' => __('Hide', 'darknews'),

        ),
        'priority' => 130,
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('global_number_of_categories',
    array(
        'default' => $darknews_default['global_number_of_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_number_of_categories',
    array(
        'label' => __('Categories to be displayed', 'darknews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'all' => __('Show All', 'darknews'),
            'one' => __('Top One Category', 'darknews'),


        ),
        'priority' => 130,
        'active_callback' => 'darknews_global_show_category_number_status'
    ));

// Setting - sticky_header_option.
$wp_customize->add_setting('global_custom_number_of_categories',
    array(
        'default' => $darknews_default['global_custom_number_of_categories'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('global_custom_number_of_categories',
    array(
        'label' => __('Number of Categories', 'darknews'),
        'section' => 'site_categories_settings',
        'type' => 'number',
        'priority' => 130,
        'active_callback' => 'darknews_global_show_custom_category_number_status'
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_comment_count',
    array(
        'default' => $darknews_default['global_show_comment_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_show_comment_count',
    array(
        'label' => __('Comment Count', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => __('Show', 'darknews'),
            'no' => __('Hide', 'darknews'),

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_author_and_date_settings',
    array(
        'title' => __('Author and Date Settings', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_post_date_author_setting',
    array(
        'default' => $darknews_default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_post_date_author_setting',
    array(
        'label' => __('For Spotlight Posts', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => __('Show Date and Author', 'darknews'),
            'hide-date-author' => __('Hide All', 'darknews'),
        ),
        'priority' => 130,
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('small_grid_post_date_author_setting',
    array(
        'default' => $darknews_default['small_grid_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('small_grid_post_date_author_setting',
    array(
        'label' => __('For Small Grid', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-only' => __('Show Date', 'darknews'),
            'hide-date-author' => __('Hide', 'darknews'),
        ),
        'priority' => 130,
    ));

// Setting - global content alignment of news.
$wp_customize->add_setting('list_post_date_author_setting',
    array(
        'default' => $darknews_default['list_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('list_post_date_author_setting',
    array(
        'label' => __('For List', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-only' => __('Show Date', 'darknews'),
            'hide-date-author' => __('Hide', 'darknews'),
        ),
        'priority' => 130,
    ));

// Setting - global content alignment of news.
$wp_customize->add_setting('global_author_icon_gravatar_display_setting',
    array(
        'default' => $darknews_default['global_author_icon_gravatar_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_author_icon_gravatar_display_setting',
    array(
        'label' => __('Author Icon/Gravatar', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'display-gravatar' => __('Show Gravatar', 'darknews'),
            'display-icon' => __('Show Icon', 'darknews'),
            'display-none' => __('None', 'darknews'),
        ),
        'priority' => 130,
        'active_callback' => 'darknews_display_author_status'
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('global_date_display_setting',
    array(
        'default' => $darknews_default['global_date_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_date_display_setting',
    array(
        'label' => __('Date Format', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'default-date' => __('WordPress Default Date Format', 'darknews'),
            'theme-date' => __('Ago Date Format', 'darknews'),
        ),
        'priority' => 130,
        'active_callback' => 'darknews_display_date_status'
    ));



//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section('site_min_read_settings',
    array(
        'title' => __('Minutes Read Count', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_min_read',
    array(
        'default' => $darknews_default['global_show_min_read'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_show_min_read',
    array(
        'label' => __('Minutes Read Count', 'darknews'),
        'section' => 'site_min_read_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => __('Show', 'darknews'),
            'no' => __('Hide', 'darknews'),

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_excerpt_settings',
    array(
        'title' => __('Excerpt Settings', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - related posts.
$wp_customize->add_setting('global_excerpt_length',
    array(
        'default' => $darknews_default['global_excerpt_length'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control('global_excerpt_length',
    array(
        'label' => __('Global Excerpt Length', 'darknews'),
        'section' => 'site_excerpt_settings',
        'type' => 'number',
        'priority' => 130,

    )
);

// Setting - related posts.
$wp_customize->add_setting('global_read_more_texts',
    array(
        'default' => $darknews_default['global_read_more_texts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('global_read_more_texts',
    array(
        'label' => __('Global Excerpt Read More', 'darknews'),
        'section' => 'site_excerpt_settings',
        'type' => 'text',
        'priority' => 130,

    )
);


//============= Watch Online Section ==========
//section title
$wp_customize->add_setting('show_watch_online_section_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'show_watch_online_section_section_title',
        array(
            'label' => __("Custom Menu Section", 'darknews'),
            'section' => 'header_options_settings',
            'priority' => 100,

        )
    )
);

$wp_customize->add_setting('show_watch_online_section',
    array(
        'default' => $darknews_default['show_watch_online_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_watch_online_section',
    array(
        'label' => __('Enable Custom Menu Section', 'darknews'),
        'section' => 'header_options_settings',
        'settings' => 'show_watch_online_section',
        'type' => 'checkbox',
        'priority' => 100,

    )
);



// Setting - related posts.
$wp_customize->add_setting('aft_custom_title',
    array(
        'default' => $darknews_default['aft_custom_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('aft_custom_title',
    array(
        'label' => __('Title', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_show_watch_online_section_status'
    )
);

// Setting - related posts.
$wp_customize->add_setting('aft_custom_link',
    array(
        'default' => $darknews_default['aft_custom_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('aft_custom_link',
    array(
        'label' => __('Link', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_show_watch_online_section_status'
    )
);


//========== single posts options ===============

// Single Section.
$wp_customize->add_section('site_single_posts_settings',
    array(
        'title' => __('Single Post', 'darknews'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_featured_image',
    array(
        'default' => $darknews_default['single_show_featured_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_featured_image',
    array(
        'label' => __('Show Featured Image', 'darknews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);




//========== related posts  options ===============

$wp_customize->add_setting('single_related_posts_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'single_related_posts_section_title',
        array(
            'label' => __("Related Posts Settings", 'darknews'),
            'section' => 'site_single_posts_settings',
            'priority' => 100,

        )
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_related_posts',
    array(
        'default' => $darknews_default['single_show_related_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_related_posts',
    array(
        'label' => __('Enable Related Posts', 'darknews'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_related_posts_title',
    array(
        'default' => $darknews_default['single_related_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('single_related_posts_title',
    array(
        'label' => __('Title', 'darknews'),
        'section' => 'site_single_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_related_posts_status'
    )
);




/**
 * Archive options section
 *
 * @package DarkNews
 */

// Archive Section.
$wp_customize->add_section('site_archive_settings',
    array(
        'title' => __('Archive Settings', 'darknews'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Disable main banner in blog
$wp_customize->add_setting('disable_main_banner_on_blog_archive',
    array(
        'default'           => $default['disable_main_banner_on_blog_archive'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('disable_main_banner_on_blog_archive',
    array(
        'label'    => __('Disable Main Banner on Blog', 'darknews'),
        'section'  => 'site_archive_settings',
        'type'     => 'checkbox',
        'priority' => 50,
        'active_callback' => 'darknews_main_banner_section_status'
    )
);

//Setting - archive content view of news.
$wp_customize->add_setting('archive_layout',
    array(
        'default' => $darknews_default['archive_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('archive_layout',
    array(
        'label' => __('Archive layout', 'darknews'),
        'description' => __('Select layout for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-layout-grid' => __('Grid', 'darknews'),
            'archive-layout-full' => __('Full', 'darknews'),

        ),
        'priority' => 130,
    ));

// Setting - latest blog carousel.
$wp_customize->add_setting('archive_layout_first_post_full',
    array(
        'default' => $darknews_default['archive_layout_first_post_full'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('archive_layout_first_post_full',
    array(
        'label' => __('Make First Post Full', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'checkbox',
        'priority' => 130,
        'active_callback' => 'darknews_archive_layout_first_post_full_status'
    )
);



// Setting - archive grid view column option
$wp_customize->add_setting('archive_grid_column_layout',
    array(
        'default' => $darknews_default['archive_grid_column_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('archive_grid_column_layout',
    array(
        'label' => __('Grid Column Layout', 'darknews'),
        'description' => __('Select column for archive grid', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'grid-layout-two' => __('Two Column', 'darknews'),
            'grid-layout-three' => __('Three Column', 'darknews'),

        ),
        'priority' => 130,
        'active_callback' => 'darknews_archive_image_gird_status'
    ));


//Settings - archive content full view
$wp_customize->add_setting('archive_layout_full',
    array(
        'default' => $darknews_default['archive_layout_full'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('archive_layout_full',
    array(
        'label' => __('Select Full Layout', 'darknews'),
        'description' => __('Select full layout for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'full-image-first' => __('Posts Title After Image', 'darknews'),
            'full-title-first' => __('Posts Title Before Image', 'darknews'),

        ),
        'priority' => 130,
        'active_callback' => 'darknews_archive_full_status'
    ));

//Setting - archive content view of news.
$wp_customize->add_setting('archive_content_view',
    array(
        'default' => $darknews_default['archive_content_view'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('archive_content_view',
    array(
        'label' => __('Content View', 'darknews'),
        'description' => __('Select content view for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-content-excerpt' => __('Post Excerpt', 'darknews'),
            'archive-content-full' => __('Full Content', 'darknews'),
            'archive-content-none' => __('None', 'darknews'),

        ),
        'priority' => 130,
    ));

//========== sidebar blocks options ===============

// Trending Section.
$wp_customize->add_section('sidebar_block_settings',
    array(
        'title' => __('Sidebar Settings', 'darknews'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting('frontpage_sticky_sidebar',
    array(
        'default' => $default['frontpage_sticky_sidebar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_sticky_sidebar',
    array(
        'label' => __('Make Sidebar Sticky', 'darknews'),
        'section' => 'sidebar_block_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('frontpage_sticky_sidebar_position',
    array(
        'default' => $default['frontpage_sticky_sidebar_position'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('frontpage_sticky_sidebar_position',
    array(
        'label' => __('Sidebar Sticky Position', 'darknews'),
        'section' => 'sidebar_block_settings',
        'type' => 'select',
        'choices' => array(
            'sidebar-sticky-top' => __('Top', 'darknews'),
            'sidebar-sticky-bottom' => __('Bottom', 'darknews'),
        ),
        'priority' => 100,
        'active_callback' => 'frontpage_sticky_sidebar_status'
    ));

//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section('frontpage_latest_posts_settings',
    array(
        'title' => __('You May Have Missed', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);
// Setting - latest blog carousel.
$wp_customize->add_setting('frontpage_show_latest_posts',
    array(
        'default' => $darknews_default['frontpage_show_latest_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_show_latest_posts',
    array(
        'label' => __('Show Above Footer', 'darknews'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Setting - featured_news_section_title.
$wp_customize->add_setting('frontpage_latest_posts_section_title',
    array(
        'default' => $darknews_default['frontpage_latest_posts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('frontpage_latest_posts_section_title',
    array(
        'label' => __('Posts Section Title', 'darknews'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_latest_news_section_status'

    )
);

//========== footer section options ===============
// Footer Section.
$wp_customize->add_section('site_footer_settings',
    array(
        'title' => __('Footer', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('footer_background_image',
    array(
        'default' => $default['footer_background_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_background_image',
        array(
            'label' => __('Footer Background Image', 'darknews'),
            'description' => sprintf(__('Recommended Size %1$s px X %2$s px', 'darknews'), 1024, 800),
            'section' => 'site_footer_settings',
            'width' => 1024,
            'height' => 800,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 100,
            'active_callback' => 'darknews_main_banner_section_status'
        )
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('footer_copyright_text',
    array(
        'default' => $darknews_default['footer_copyright_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('footer_copyright_text',
    array(
        'label' => __('Copyright Text', 'darknews'),
        'section' => 'site_footer_settings',
        'type' => 'text',
        'priority' => 100,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('hide_footer_menu_section',
    array(
        'default' => $darknews_default['hide_footer_menu_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('hide_footer_menu_section',
    array(
        'label' => __('Hide footer Menu Section', 'darknews'),
        'section' => 'site_footer_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);