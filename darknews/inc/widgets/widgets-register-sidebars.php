<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function darknews_widgets_init()
{
   
    
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'darknews'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));


    
    register_sidebar(array(
        'name' => esc_html__('Front-page Content Section', 'darknews'),
        'id' => 'home-content-widgets',
        'description' => esc_html__('Add widgets to front-page contents section.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Sidebar Section', 'darknews'),
        'id' => 'home-sidebar-widgets',
        'description' => esc_html__('Add widgets to front-page sidebar section.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Banner Ad Section', 'darknews'),
        'id'            => 'home-advertisement-widgets',
        'description'   => esc_html__('Add widgets for frontpage banner section advertisement.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));


    register_sidebar(array(
        'name'          => esc_html__('Off Canvas', 'darknews'),
        'id'            => 'express-off-canvas-panel',
        'description'   => esc_html__('Add widgets for off-canvas section.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Below Featured Section', 'darknews'),
        'id'            => 'home-below-featured-posts-widgets',
        'description'   => esc_html__('Add widgets for below featured section.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    
    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'darknews'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'darknews'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'darknews'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'darknews'),
        'before_widget' => '<div id="%1$s" class="widget darknews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
    ));
}

add_action('widgets_init', 'darknews_widgets_init');