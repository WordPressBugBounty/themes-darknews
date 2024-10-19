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
        'title' => esc_html__('Header Options', 'darknews'),
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
        'title' => esc_html__('Header Options', 'darknews'),
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
            'label' => esc_html__("Top Header Section", 'darknews'),
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
        'label' => esc_html__('Show Top Header', 'darknews'),
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
        'label' => esc_html__('Show Date', 'darknews'),
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
        'label' => esc_html__('Show Social Menu', 'darknews'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 11,
        'active_callback' => 'darknews_top_header_status'
    )
);



// Advertisement Section.
$wp_customize->add_section('frontpage_advertisement_settings',
    array(
        'title' => esc_html__('Header Advertisement', 'darknews'),
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
            'label' => esc_html__('Header Section Advertisement', 'darknews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'darknews'), 930, 110),
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
        'label' => esc_html__('URL Link', 'darknews'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'text',
        'priority' => 130,
    )
);



// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'darknews'),
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
        'label' => esc_html__("Enable Box's Top/Bottom Gaps", 'darknews'),
        'section' => 'site_layout_mode_settings',
        'type' => 'checkbox',
        'priority' => 130,
        'active_callback' => 'global_site_layout_boxed_layout_status'
    )
);



// Breadcrumb Section.
$wp_customize->add_section('site_breadcrumb_settings',
    array(
        'title' => esc_html__('Breadcrumb Options', 'darknews'),
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
        'label' => esc_html__('Show breadcrumbs', 'darknews'),
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
        'label' => esc_html__('Select Breadcrumbs', 'darknews'),
        'description' => esc_html__("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'darknews'),
        'section' => 'site_breadcrumb_settings',
        'type' => 'select',
        'choices' => array(
            'default' => esc_html__('Default', 'darknews'),
            'yoast' => esc_html__('Yoast SEO', 'darknews'),
            'rankmath' => esc_html__('Rank Math', 'darknews'),
            'bcn' => esc_html__('NavXT', 'darknews'),
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
        'title' => esc_html__('Global Settings', 'darknews'),
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
        'label' => esc_html__('Enable Preloader', 'darknews'),
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
        'label' => esc_html__('Site Layout Option', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'boxed' => esc_html__("Boxed", 'darknews'),
            'wide' => esc_html__("Wide", 'darknews'),
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
        'label' => esc_html__('Global Content Alignment', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Content - Primary sidebar', 'darknews'),
            'align-content-right' => esc_html__('Primary sidebar - Content', 'darknews'),
            'full-width-content' => esc_html__('Full width content', 'darknews')
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
        'label'       => esc_html__('Single Content Mode', 'darknews'),
        'section'     => 'site_layout_settings',
        'type'        => 'select',
        'choices'               => array(
            'single-content-mode-default' => esc_html__( 'Default', 'darknews' ),
            'single-content-mode-boxed' => esc_html__( 'Spacious', 'darknews' ),
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
        'label' => esc_html__('Scroll to Top Position', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'right' => esc_html__('Right', 'darknews'),
            'left' => esc_html__('Left', 'darknews'),
            'none' => esc_html__('None', 'darknews')

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_categories_settings',
    array(
        'title' => esc_html__('Categories Settings', 'darknews'),
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
        'label' => esc_html__('Post Categories', 'darknews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'darknews'),
            'no' => esc_html__('Hide', 'darknews'),

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
        'label' => esc_html__('Categories to be displayed', 'darknews'),
        'section' => 'site_categories_settings',
        'type' => 'select',
        'choices' => array(
            'all' => esc_html__('Show All', 'darknews'),
            'one' => esc_html__('Top One Category', 'darknews'),


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
        'label' => esc_html__('Number of Categories', 'darknews'),
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
        'label' => esc_html__('Comment Count', 'darknews'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'darknews'),
            'no' => esc_html__('Hide', 'darknews'),

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_author_and_date_settings',
    array(
        'title' => esc_html__('Author and Date Settings', 'darknews'),
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
        'label' => esc_html__('For Spotlight Posts', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'darknews'),
            'hide-date-author' => esc_html__('Hide All', 'darknews'),
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
        'label' => esc_html__('For Small Grid', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-only' => esc_html__('Show Date', 'darknews'),
            'hide-date-author' => esc_html__('Hide', 'darknews'),
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
        'label' => esc_html__('For List', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-only' => esc_html__('Show Date', 'darknews'),
            'hide-date-author' => esc_html__('Hide', 'darknews'),
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
        'label' => esc_html__('Author Icon/Gravatar', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'display-gravatar' => esc_html__('Show Gravatar', 'darknews'),
            'display-icon' => esc_html__('Show Icon', 'darknews'),
            'display-none' => esc_html__('None', 'darknews'),
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
        'label' => esc_html__('Date Format', 'darknews'),
        'section' => 'site_author_and_date_settings',
        'type' => 'select',
        'choices' => array(
            'default-date' => esc_html__('WordPress Default Date Format', 'darknews'),
            'theme-date' => esc_html__('Ago Date Format', 'darknews'),
        ),
        'priority' => 130,
        'active_callback' => 'darknews_display_date_status'
    ));



//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section('site_min_read_settings',
    array(
        'title' => esc_html__('Minutes Read Count', 'darknews'),
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
        'label' => esc_html__('Minutes Read Count', 'darknews'),
        'section' => 'site_min_read_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'darknews'),
            'no' => esc_html__('Hide', 'darknews'),

        ),
        'priority' => 130,
    ));



// Global Section.
$wp_customize->add_section('site_excerpt_settings',
    array(
        'title' => esc_html__('Excerpt Settings', 'darknews'),
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
            'label' => esc_html__("Custom Menu Section", 'darknews'),
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
        'label' => esc_html__('Enable Custom Menu Section', 'darknews'),
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
        'title' => esc_html__('Single Post', 'darknews'),
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
            'label' => esc_html__("Related Posts Settings", 'darknews'),
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
        'title' => esc_html__('Archive Settings', 'darknews'),
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
        'label'    => esc_html__('Disable Main Banner on Blog', 'darknews'),
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
        'label' => esc_html__('Archive layout', 'darknews'),
        'description' => esc_html__('Select layout for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-layout-grid' => esc_html__('Grid', 'darknews'),
            'archive-layout-full' => esc_html__('Full', 'darknews'),

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
        'label' => esc_html__('Grid Column Layout', 'darknews'),
        'description' => esc_html__('Select column for archive grid', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'grid-layout-two' => esc_html__('Two Column', 'darknews'),
            'grid-layout-three' => esc_html__('Three Column', 'darknews'),

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
        'label' => esc_html__('Select Full Layout', 'darknews'),
        'description' => esc_html__('Select full layout for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'full-image-first' => esc_html__('Posts Title After Image', 'darknews'),
            'full-title-first' => esc_html__('Posts Title Before Image', 'darknews'),

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
        'label' => esc_html__('Content View', 'darknews'),
        'description' => esc_html__('Select content view for archive', 'darknews'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-content-excerpt' => esc_html__('Post Excerpt', 'darknews'),
            'archive-content-full' => esc_html__('Full Content', 'darknews'),
            'archive-content-none' => esc_html__('None', 'darknews'),

        ),
        'priority' => 130,
    ));

//========== sidebar blocks options ===============

// Trending Section.
$wp_customize->add_section('sidebar_block_settings',
    array(
        'title' => esc_html__('Sidebar Settings', 'darknews'),
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
        'label' => esc_html__('Make Sidebar Sticky', 'darknews'),
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
        'label' => esc_html__('Sidebar Sticky Position', 'darknews'),
        'section' => 'sidebar_block_settings',
        'type' => 'select',
        'choices' => array(
            'sidebar-sticky-top' => esc_html__('Top', 'darknews'),
            'sidebar-sticky-bottom' => esc_html__('Bottom', 'darknews'),
        ),
        'priority' => 100,
        'active_callback' => 'frontpage_sticky_sidebar_status'
    ));

//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section('frontpage_latest_posts_settings',
    array(
        'title' => esc_html__('You May Have Missed', 'darknews'),
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
        'label' => esc_html__('Posts Section Title', 'darknews'),
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
        'title' => esc_html__('Footer', 'darknews'),
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
            'label' => esc_html__('Footer Background Image', 'darknews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'darknews'), 1024, 800),
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