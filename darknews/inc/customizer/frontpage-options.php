<?php

/**
 * Option Panel
 *
 * @package DarkNews
 */

$darknews_default = darknews_get_default_theme_options();


/**
 * Frontpage options section
 *
 * @package DarkNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel('main_banner_option_panel',
    array(
        'title' => esc_html__('Main Banner Options', 'darknews'),
        'priority' => 199,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Main Banner Slider Section
 * */

// Main banner Sider Section.
$wp_customize->add_section('frontpage_main_banner_section_settings',
    array(
        'title' => esc_html__('Main Banner', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting('show_main_news_section',
    array(
        'default' => $darknews_default['show_main_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_main_news_section',
    array(
        'label' => esc_html__('Enable Main Banner Section', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('main_banner_background_section',
    array(
        'default' => $default['main_banner_background_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'main_banner_background_section',
        array(
            'label' => esc_html__('Main Banner Background Image', 'darknews'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'darknews'), 1024, 800),
            'section' => 'frontpage_main_banner_section_settings',
            'width' => 1024,
            'height' => 800,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 100,
            'active_callback' => 'darknews_main_banner_section_status'
        )
    )
);

//main banner order

$wp_customize->add_setting('select_main_banner_order',
    array(
        'default' => $darknews_default['select_main_banner_order'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_main_banner_order',
    array(
        'label' => esc_html__('Select Main Banner Order', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',        
        'type' => 'select',
        'choices' => array(
            'order-1' => esc_html__("Order 1", 'darknews'),
            'order-2' => esc_html__("Order 2", 'darknews'),
            'order-3' => esc_html__("Order 3", 'darknews'),
        ),
        'priority' => 100,
    ));


/**
 * Main Banner Section
 * */

//section title
$wp_customize->add_setting('main_banner_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'main_banner_panel_section_title',
        array(
            'label' => esc_html__('Main News Section ', 'darknews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => 'darknews_main_banner_section_status',
        )
    )
);



// Setting - select_main_banner_section_mode.
$wp_customize->add_setting('select_main_banner_carousel_filterby',
    array(
        'default' => $darknews_default['select_main_banner_carousel_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_main_banner_carousel_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'settings' => 'select_main_banner_carousel_filterby',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'darknews'),
            'tag' => esc_html__("Tag", 'darknews'),
        ),
        'priority' => 100,
        'active_callback' => 'darknews_main_banner_section_status'
    ));


// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_news_category',
    array(
        'default' => $darknews_default['select_slider_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_news_category',
    array(
        'label' => esc_html__('Select Category', 'darknews'),
        'description' => esc_html__('Select category to be shown on main slider section', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_main_banner_section_filterby_cat_status($control)
            );
        },

    )));


// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_news_tag',
    array(
        'default' => $darknews_default['select_slider_news_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_news_tag',
    array(
        'label' => esc_html__('Select Tag', 'darknews'),
        'description' => esc_html__('Select tag to be shown on main slider section', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_main_banner_section_filterby_tag_status($control)
            );
        },
    )));

/**
 * Editor's Picks Post Section
 * */

//section title
$wp_customize->add_setting('editors_picks_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'editors_picks_panel_section_title',
        array(
            'label' => esc_html__("Editor's Picks Section", 'darknews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => 'darknews_main_banner_section_status',
        )
    )
);


// Setting - select_main_banner_section_mode.
$wp_customize->add_setting('select_editors_picks_filterby',
    array(
        'default' => $darknews_default['select_editors_picks_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_editors_picks_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'settings' => 'select_editors_picks_filterby',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'darknews'),
            'tag' => esc_html__("Tag", 'darknews'),
        ),
        'priority' => 100,
        'active_callback' => function($control){
            return(darknews_main_banner_section_status($control)

            );
        },
    ));


// Setting - drop down category for slider.
$wp_customize->add_setting('select_editors_picks_news_category',
    array(
        'default' => $darknews_default['select_editors_picks_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_editors_picks_news_category',
    array(
        'label' => esc_html__('Select Category', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_editors_picks_section_filterby_cat_status($control)

            );
        },

    )));


// Setting - drop down category for slider.
$wp_customize->add_setting('select_editors_picks_news_tag',
    array(
        'default' => $darknews_default['select_editors_picks_news_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_editors_picks_news_tag',
    array(
        'label' => esc_html__('Select Tag', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_editors_picks_section_filterby_tag_status($control)

            );
        },
    )));




/**
 * Latest Post Section
 * */

//section title
$wp_customize->add_setting('banner_latest_post_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'banner_latest_post_panel_section_title',
        array(
            'label' => esc_html__("Latest Section", 'darknews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (
                    darknews_main_banner_section_status($control)

                );
            },
        )
    )
);



$wp_customize->add_setting('main_latest_news_section_title',
    array(
        'default' => $darknews_default['main_latest_news_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_latest_news_section_title',
    array(
        'label' => esc_html__('Section Title ', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)

            );
        },

    )

);

// Setting - select_main_banner_section_mode.
$wp_customize->add_setting('select_banner_latest_post_filterby',
    array(
        'default' => $darknews_default['select_banner_latest_post_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_banner_latest_post_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'darknews'),
            'tag' => esc_html__("Tag", 'darknews'),

        ),
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)

            );
        },
    ));



// Setting - drop down category for slider.
$wp_customize->add_setting('select_banner_latest_post_category',
    array(
        'default' => $darknews_default['select_banner_latest_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_banner_latest_post_category',
    array(
        'label' => esc_html__('Select', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_banner_latest_post_section_filterby_cat_status($control)

            );
        },

    )));


// Setting - drop down category for slider.
$wp_customize->add_setting('select_latest_post_tag',
    array(
        'default' => $darknews_default['select_latest_post_tag'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_latest_post_tag',
    array(
        'label' => esc_html__('Select Tag', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'post_tag',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_banner_latest_post_section_filterby_tag_status($control)

            );
        },

    )));


/**
 * Popular Post Section
 * */

//section title
$wp_customize->add_setting('popular_post_panel_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'popular_post_panel_section_title',
        array(
            'label' => esc_html__("Popular Section", 'darknews'),
            'section' => 'frontpage_main_banner_section_settings',
            'priority' => 100,
            'active_callback' => function ($control) {
                return (
                    darknews_main_banner_section_status($control)


                );
            },
        )
    )
);


$wp_customize->add_setting('main_popular_news_section_title',
    array(
        'default' => $darknews_default['main_popular_news_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_popular_news_section_title',
    array(
        'label' => esc_html__('Section Title ', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)

            );
        },

    )

);

// Setting - select_main_banner_section_mode.
$wp_customize->add_setting('select_popular_post_filterby',
    array(
        'default' => $darknews_default['select_popular_post_filterby'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('select_popular_post_filterby',
    array(
        'label' => esc_html__('Filter Posts By', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'cat' => esc_html__("Category", 'darknews'),
            'comment' => esc_html__("Comment Count", 'darknews'),
        ),
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)

            );
        },
    ));



// Setting - drop down category for slider.
$wp_customize->add_setting('select_popular_post_category',
    array(
        'default' => $darknews_default['select_popular_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_popular_post_category',
    array(
        'label' => esc_html__('Select', 'darknews'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => function ($control) {
            return (
                darknews_main_banner_section_status($control)
                &&
                darknews_popular_post_section_filterby_cat_status($control)

            );
        },

    )));



//Popular Tags
// Advertisement Section.
$wp_customize->add_section('frontpage_popular_tags_settings',
    array(
        'title' => esc_html__('Popular Tags', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('frontpage_popular_tags_settings',
    array(
        'default' => $darknews_default['frontpage_popular_tags_settings'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_setting('show_popular_tags_section',
    array(
        'default' => $darknews_default['show_popular_tags_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_popular_tags_section',
    array(
        'label' => esc_html__('Enable Popular Tags', 'darknews'),
        'section' => 'frontpage_popular_tags_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


$wp_customize->add_setting('frontpage_popular_tags_section_title',
    array(
        'default' => $darknews_default['frontpage_popular_tags_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('frontpage_popular_tags_section_title',
    array(
        'label' => esc_html__('Section Title ', 'darknews'),
        'section' => 'frontpage_popular_tags_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_popular_tags_section_status'

    )

);


//Flash news
$wp_customize->add_section('frontpage_flash_news_settings',
    array(
        'title' => esc_html__('Breaking News', 'darknews'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'main_banner_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('frontpage_flash_news_settings',
    array(
        'default' => $darknews_default['frontpage_flash_news_settings'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_setting('show_flash_news_section',
    array(
        'default' => $darknews_default['show_flash_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_flash_news_section',
    array(
        'label' => esc_html__('Enable Breaking News', 'darknews'),
        'section' => 'frontpage_flash_news_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


$wp_customize->add_setting('flash_news_title',
    array(
        'default' => $darknews_default['flash_news_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('flash_news_title',
    array(
        'label' => esc_html__('Section Title ', 'darknews'),
        'section' => 'frontpage_flash_news_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'darknews_flash_posts_section_status'

    )

);

$wp_customize->add_setting('select_flash_news_category',
    array(
        'default'           => $darknews_default['select_flash_news_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new darknews_Dropdown_Taxonomies_Control($wp_customize, 'select_flash_news_category',
    array(
        'label'       => esc_html__('Breaking Posts Category', 'darknews'),
        'description' => esc_html__('Select category to be shown on breaking news ', 'darknews'),
        'section'     => 'frontpage_flash_news_settings',
        'type'        => 'dropdown-taxonomies',
        'taxonomy'    => 'category',
        'priority'    => 100,
        'active_callback' => 'darknews_flash_posts_section_status'
    )));


/**
 * Frontpage options section
 *
 * @package DarkNews
 */


// Add Frontpage Options Panel.
$wp_customize->add_panel('frontpage_option_panel',
    array(
        'title' => esc_html__('Frontpage Options', 'darknews'),
        'priority' => 199,
        'capability' => 'edit_theme_options',
    )
);



/**
 * Featured Post Section
 * */

    $wp_customize->add_section('frontpage_featured_posts_settings',
        array(
            'title' => esc_html__('Featured Posts', 'darknews'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );




// Setting - show_featured_posts_section.
    $wp_customize->add_setting('show_featured_posts_section',
        array(
            'default' => $darknews_default['show_featured_posts_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'darknews_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('show_featured_posts_section',
        array(
            'label' => esc_html__('Enable Featured Post Section', 'darknews'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'checkbox',
            'priority' => 22,


        )
    );

    $wp_customize->add_setting('featured_news_section_title',
        array(
            'default' => $darknews_default['featured_news_section_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('featured_news_section_title',
        array(
            'label' => esc_html__('Section Title ', 'darknews'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'text',
            'priority' => 130,
            'active_callback' => 'darknews_featured_posts_section'

        )

    );

    //List of categories

    $wp_customize->add_setting('select_featured_news_category',
        array(
            'default' => $darknews_default['select_featured_news_category'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'select_featured_news_category',
        array(
            'label' => sprintf(__('Select Category ', 'darknews')),
            'description' => esc_html__('Select category to be shown on featured section ', 'darknews'),
            'section' => 'frontpage_featured_posts_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'category',
            'priority' => 130,
            'active_callback' => 'darknews_featured_posts_section',


        )));




    /**
     * Posts List Section
     * */


    $wp_customize->add_section('frontpage_featured_post_list_settings',
        array(
            'title' => esc_html__('Posts List', 'darknews'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );

// Setting - show_featured_category_section.
    $wp_customize->add_setting('show_featured_post_list_section',
        array(
            'default' => $darknews_default['show_featured_post_list_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'darknews_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('show_featured_post_list_section',
        array(
            'label' => esc_html__('Enable Post List Section', 'darknews'),
            'section' => 'frontpage_featured_post_list_settings',
            'type' => 'checkbox',
            'priority' => 22,


        )
    );

    for ($darknews_i = 1; $darknews_i <= 3; $darknews_i++) {

        //section title
        $wp_customize->add_setting('express_posts_panel_section_title_'.$darknews_i,
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new DarkNews_Section_Title(
                $wp_customize,
                'express_posts_panel_section_title_'.$darknews_i,
                array(
                    'label' => sprintf(esc_html__('Section %d', 'darknews'),$darknews_i),
                    'section' => 'frontpage_featured_post_list_settings',
                    'priority' => 130,
                    'active_callback' => 'darknews_featured_post_list_section_status'
                )
            )
        );


        // Setting - featured_category_section.
        $wp_customize->add_setting('featured_post_list_section_title_'.$darknews_i,
            array(
                'default' => $darknews_default['featured_post_list_section_title_'.$darknews_i],
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'featured_post_list_section_title_'.$darknews_i,
            array(
                'label' => esc_html__('Section Title', 'darknews'),
                'section' => 'frontpage_featured_post_list_settings',
                'type' => 'text',
                'priority' => 130,
                'active_callback' => 'darknews_featured_post_list_section_status'

            )

        );


        // Setting - featured  category1.
        $wp_customize->add_setting('featured_post_list_category_section_' . $darknews_i,
            array(
                'default' => $darknews_default['featured_post_list_category_section_' . $darknews_i],
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(new DarkNews_Dropdown_Taxonomies_Control($wp_customize, 'featured_post_list_category_section_' . $darknews_i,
            array(
                'label' => esc_html__('Category', 'darknews'),
                'description' => esc_html__('Select category to be shown on featured section ', 'darknews'),
                'section' => 'frontpage_featured_post_list_settings',
                'type' => 'dropdown-taxonomies',
                'taxonomy' => 'category',
                'priority' => 130,
                'active_callback' => 'darknews_featured_post_list_section_status'
            )));


    }
    /* End Featured Category Section */


// Frontpage Layout Section.
$wp_customize->add_section('frontpage_layout_settings',
    array(
        'title' => esc_html__('Frontpage Layout Settings', 'darknews'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting - show_main_news_section.
$wp_customize->add_setting('frontpage_content_type',
    array(
        'default' => $darknews_default['frontpage_content_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('frontpage_content_type',
    array(
        'label' => esc_html__('Frontpage Content Display', 'darknews'),
        'description' => esc_html__('Select frontpage content display', 'darknews'),
        'section' => 'frontpage_layout_settings',
        'type' => 'select',
        'choices' => array(
            'frontpage-widgets' => esc_html__('Frontpage Widgets', 'darknews'),
            'frontpage-widgets-and-content' => esc_html__('Page Contents & Frontpage Widgets', 'darknews'),            
        ),
        'priority' => 10,
    ));



// Setting - show_main_news_section.
$wp_customize->add_setting('frontpage_content_alignment',
    array(
        'default' => $darknews_default['frontpage_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('frontpage_content_alignment',
    array(
        'label' => esc_html__('Frontpage Content Alignment', 'darknews'),
        'description' => esc_html__('Select frontpage content alignment', 'darknews'),
        'section' => 'frontpage_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Home Content - Home Sidebar', 'darknews'),
            'align-content-right' => esc_html__('Home Sidebar - Home Content', 'darknews'),
            'full-width-content' => esc_html__('Only Home Content', 'darknews')
        ),
        'priority' => 10,
    ));