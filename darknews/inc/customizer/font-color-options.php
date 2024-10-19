<?php

/**
 * Font and Color Option Panel
 *
 * @package DarkNews
 */

$darknews_default = darknews_get_default_theme_options();
//============= Font Options ===================
// font Section.
$wp_customize->add_section('font_typo_section',
    array(
        'title' => esc_html__('Fonts & Typography', 'darknews'),
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

global $darknews_google_fonts;


// Trending Section.
$wp_customize->add_setting('site_title_font_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Section_Title(
        $wp_customize,
        'site_title_font_section_title',
        array(
            'label' => esc_html__("Font Family Section", 'darknews'),
            'section' => 'font_typo_section',
            'priority' => 100,

        )
    )
);



// Setting - secondary_font.
$wp_customize->add_setting('site_title_font',
    array(
        'default' => $darknews_default['site_title_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);
$wp_customize->add_control('site_title_font',
    array(
        'label' => esc_html__('Site Title Font', 'darknews'),

        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $darknews_google_fonts,
        'priority' => 100,
    )
);

// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default' => $darknews_default['primary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label' => esc_html__('Primary Font', 'darknews'),

        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $darknews_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default' => $darknews_default['secondary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label' => esc_html__('Secondary Font', 'darknews'),
        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $darknews_google_fonts,
        'priority' => 110,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_site_mode_setting',
    array(
        'default' => $darknews_default['global_site_mode_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'darknews_sanitize_select',
    )
);

$wp_customize->add_control('global_site_mode_setting',
    array(
        'label' => esc_html__('Site Color Mode', 'darknews'),
        'section' => 'colors',
        'type' => 'select',
        'choices' => array(
            'aft-dark-mode' => esc_html__('Dark', 'darknews'),
            'aft-default-mode' => esc_html__('Light', 'darknews'),
        ),
        'priority' => 5,
    ));

//section title
$wp_customize->add_setting('global_color_section_notice',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new DarkNews_Simple_Notice_Custom_Control(
        $wp_customize,
        'global_color_section_notice',
        array(
            'description' => esc_html__('Body Background Color (Light Mode) will be applied for this mode.', 'darknews'),
            'section' => 'colors',
            'priority' => 10,
            'active_callback' => 'darknews_global_site_mode_light_status'
        )
    )
);



// Setting - slider_caption_bg_color.
$wp_customize->add_setting('light_background_color',
    array(
        'default' => $darknews_default['light_background_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'light_background_color',
        array(
            'label' => esc_html__('Body Background Color (Light Mode)', 'darknews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 10,
            'active_callback' => 'darknews_global_site_mode_light_status'

        )
    )
);

// Setting - secondary_color.
$wp_customize->add_setting('secondary_color',
    array(
        'default' => $darknews_default['secondary_color'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color',
        array(
            'label' => esc_html__('Secondary Color', 'darknews'),
            'section' => 'colors',
            'type' => 'color',
            'priority' => 5,
            //'active_callback' => 'darknews_solid_secondary_color_status'
        )
    )
);