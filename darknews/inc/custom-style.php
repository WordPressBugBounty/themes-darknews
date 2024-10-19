<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


/**
 * Customizer
 *
 * @class   darknews
 */

if (!function_exists('darknews_custom_style')) {

    function darknews_custom_style()
    {

        global $darknews_google_fonts;


        $secondary_color = darknews_get_option('secondary_color');
        $site_title_font = $darknews_google_fonts[darknews_get_option('site_title_font')];
        $primary_font = $darknews_google_fonts[darknews_get_option('primary_font')];
        $secondary_font = $darknews_google_fonts[darknews_get_option('secondary_font')];
        $darknews_background_color = get_background_color();
        $dark_background_color = '#' . $darknews_background_color;
        $light_background_color = darknews_get_option('light_background_color');


        ob_start();
        ?>

        <?php if (!empty($dark_background_color)): ?>
        body.aft-dark-mode #sidr,
        body.aft-dark-mode,
        body.aft-dark-mode #af-preloader {
        background-color: <?php darknews_esc_custom_style($dark_background_color) ?>;
        }
    <?php endif; ?>

        <?php if (!empty($light_background_color)): ?>
        body.aft-default-mode #sidr,
        body.aft-default-mode #af-preloader {
        background-color: <?php darknews_esc_custom_style($light_background_color) ?>;
        }
        body.aft-default-mode.custom-background,
        body.aft-default-mode {
        background-color: <?php darknews_esc_custom_style($light_background_color) ?> ;
        }
    <?php endif; ?>

    <?php if (!empty($secondary_color)): ?>
            .woocommerce span.onsale,
            .woocommerce #respond input#submit.disabled, 
            .woocommerce #respond input#submit:disabled, 
            .woocommerce #respond input#submit:disabled[disabled], 
            .woocommerce a.button.disabled, 
            .woocommerce a.button:disabled, 
            .woocommerce a.button:disabled[disabled], 
            .woocommerce button.button.disabled, 
            .woocommerce button.button:disabled, 
            .woocommerce button.button:disabled[disabled], 
            .woocommerce input.button.disabled, 
            .woocommerce input.button:disabled, 
            .woocommerce input.button:disabled[disabled],
            .woocommerce #respond input#submit, 
            .woocommerce a.button, 
            .woocommerce button.button, 
            .woocommerce input.button,
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt,

            .widget-title-fill-and-border .wp-block-group__inner-container h1.wp-block-heading,
            .widget-title-fill-and-border .wp-block-group__inner-container h2.wp-block-heading,
            .widget-title-fill-and-border .wp-block-group__inner-container h3.wp-block-heading,
            .widget-title-fill-and-border .wp-block-group__inner-container h4.wp-block-heading,
            .widget-title-fill-and-border .wp-block-group__inner-container h5.wp-block-heading,
            .widget-title-fill-and-border .wp-block-group__inner-container h6.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h1.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h2.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h3.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h4.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h5.wp-block-heading,
            .widget-title-fill-and-no-border .wp-block-group__inner-container h6.wp-block-heading,

            .widget-title-fill-and-border .wp_post_author_widget .widget-title .header-after,
            .widget-title-fill-and-no-border .wp_post_author_widget .widget-title .header-after,

            footer .aft-small-social-menu ul li a:hover, 
            header .top-header .aft-small-social-menu ul li a:hover,
            .darknews_author_info_widget .aft-small-social-menu ul li a:hover,
            footer .aft-small-social-menu ul li a:hover,
            body.widget-title-border-center .widget-title .heading-line-before,
            body.widget-title-border-bottom .header-after1 .heading-line-before, 
            body.widget-title-border-bottom .widget-title .heading-line-before,
            body .af-cat-widget-carousel a.darknews-categories.category-color-1,
            .widget-title-fill-and-no-border .widget-title .heading-line, 
            .widget-title-fill-and-border .widget-title .heading-line, 
            .widget-title-border-bottom .wp-block-group__inner-container h1.wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group__inner-container h2.wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group__inner-container h3.wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group__inner-container h4.wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group__inner-container h5.wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group__inner-container h6.wp-block-heading::before,
            .widget-title-border-bottom .wp_post_author_widget .widget-title .header-after::before,
            .widget-title-border-center .wp-block-group__inner-container h1.wp-block-heading::before,
            .widget-title-border-center .wp-block-group__inner-container h2.wp-block-heading::before,
            .widget-title-border-center .wp-block-group__inner-container h3.wp-block-heading::before,
            .widget-title-border-center .wp-block-group__inner-container h4.wp-block-heading::before,
            .widget-title-border-center .wp-block-group__inner-container h5.wp-block-heading::before,
            .widget-title-border-center .wp-block-group__inner-container h6.wp-block-heading::before,
            .widget-title-border-center .wp_post_author_widget .widget-title .heading-line-before,
            .widget-title-border-center .wp_post_author_widget .widget-title .header-after::before,

            .aft-posts-tabs-panel .nav-tabs>li>a.active, 
            .aft-main-banner-wrapper .widget-title .heading-line,
            a.sidr-class-sidr-button-close,

            .widget-title-fill-and-border .wp-block-group__inner-container h1.wp-block-heading::before,
            .widget-title-fill-and-border .wp-block-group__inner-container h2.wp-block-heading::before,
            .widget-title-fill-and-border .wp-block-group__inner-container h3.wp-block-heading::before,
            .widget-title-fill-and-border .wp-block-group__inner-container h4.wp-block-heading::before,
            .widget-title-fill-and-border .wp-block-group__inner-container h5.wp-block-heading::before,
            .widget-title-fill-and-border .wp-block-group__inner-container h6.wp-block-heading::before,

            body.aft-default-mode.woocommerce span.onsale,
            body.aft-dark-mode input[type="button"],
            body.aft-dark-mode input[type="reset"],
            body.aft-dark-mode input[type="submit"],
            body.aft-dark-mode .inner-suscribe input[type=submit],
            body.aft-default-mode input[type="button"],
            body.aft-default-mode input[type="reset"],
            body.aft-default-mode input[type="submit"],
            .wp-block-search__button,
            body.aft-default-mode .inner-suscribe input[type=submit],
            .af-youtube-slider .af-video-wrap .af-bg-play i,
            .af-youtube-video-list .entry-header-yt-video-wrapper .af-yt-video-play i,
            body .btn-style1 a:visited,
            body .btn-style1 a,
            body .darknews-pagination .nav-links .page-numbers.current,
            body #scroll-up,
            .aft-readmore-wrapper a.aft-readmore:hover,
            body.aft-dark-mode .aft-readmore-wrapper a.aft-readmore:hover, 
            footer.site-footer .aft-readmore-wrapper a.aft-readmore:hover,
            .aft-readmore-wrapper a.aft-readmore:hover,
            .read-img .trending-no,
            body .trending-posts-vertical .trending-no{
            background-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }

            .grid-design-texts-over-image .aft-readmore-wrapper a.aft-readmore:hover, 
            .aft-readmore-wrapper a.aft-readmore:hover,
            body.aft-dark-mode .aft-readmore-wrapper a.aft-readmore:hover, 
            body.aft-default-mode .aft-readmore-wrapper a.aft-readmore:hover, 

            body.single .entry-header .aft-post-excerpt-and-meta .post-excerpt,
            .aft-posts-tabs-panel .nav-tabs, 
            .widget-title-fill-and-border .widget-title,
            body.aft-dark-mode.single span.tags-links a:hover,
            .darknews-pagination .nav-links .page-numbers.current,
            .aft-readmore-wrapper a.aft-readmore:hover,
            p.awpa-more-posts a:hover{
            border-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }
            .wp-post-author-meta .wp-post-author-meta-more-posts a.awpa-more-posts:hover{
                border-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }
            #scroll-up::after,
            .aft-dark-mode #loader,
            .aft-default-mode #loader {
                border-bottom-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }
            body.aft-default-mode #secondary .darknews-widget ol[class*="wp-block-"] a:hover,
            body.aft-default-mode #secondary .darknews-widget ul[class*="wp-block-"] a:hover,
            body.aft-dark-mode #secondary .darknews-widget ol[class*="wp-block-"] a:hover,
            body.aft-dark-mode #secondary .darknews-widget ul[class*="wp-block-"] a:hover,
            .widget_text a ,
            body.aft-default-mode .sidebar-area .wp-block-tag-cloud a:hover,
            body.aft-default-mode .site-footer .wp-block-tag-cloud a:hover, 
            body.aft-default-mode .site-footer .tagcloud a:hover,
            .wp_post_author_widget .wp-post-author-meta .awpa-display-name a:hover, 
            body.aft-dark-mode .sidebar-area .wp-block-tag-cloud a:hover,
            body.aft-dark-mode .site-footer .wp-block-tag-cloud a:hover, 
            body.aft-dark-mode .site-footer .tagcloud a:hover,
            .wp-post-author-meta .wp-post-author-meta-more-posts a.awpa-more-posts:hover,
            body.aft-default-mode .af-breadcrumbs a:hover,
            body.aft-dark-mode .af-breadcrumbs a:hover,
            .aft-default-mode .site-footer .wp-calendar-nav a,
            body.aft-dark-mode .wp-calendar-nav a,
            body .entry-content > [class*="wp-block-"] a:not(.has-text-color),
            body .entry-content > ul a,
            body .entry-content > ol a,
            body .entry-content > p a ,
            body p.logged-in-as a,
            a,  a:visited,  a:hover,  a:focus,  a:active,
            body.aft-default-mode .tagcloud a:hover,
            body.aft-default-mode.single span.tags-links a:hover,
            body.aft-default-mode p.awpa-more-posts a:hover,
            body.aft-default-mode p.awpa-website a:hover ,
            body.aft-default-mode .wp-post-author-meta .awpa-display-name a:hover,
            body.aft-default-mode .widget ul.menu >li a:hover,
            body.aft-default-mode .nav-links a:hover,
            body.aft-default-mode ul.trail-items li a:hover,
            body.aft-dark-mode .wp-post-author-meta .awpa-display-name a:hover,
            body.aft-dark-mode .tagcloud a:hover,
            body.aft-dark-mode.single span.tags-links a:hover,
            body.aft-dark-mode p.awpa-more-posts a:hover,
            body.aft-dark-mode p.awpa-website a:hover ,
            body.aft-dark-mode .widget ul.menu >li a:hover,
            body.aft-dark-mode .nav-links a:hover,
            body.aft-dark-mode ul.trail-items li a:hover,
            .site-footer .secondary-footer a:hover,
            body.aft-default-mode .comment-meta a:hover,
            body.aft-dark-mode .comment-meta a:hover,
            body.aft-default-mode .fn a:hover,
            body.aft-dark-mode .fn a:hover,
            body.aft-dark-mode .entry-content a:hover,
            body.aft-dark-mode .entry-content > [class*="wp-block-"] a:not(.has-text-color):hover,
            body.aft-dark-mode .entry-content > ol a:hover,
            body.aft-dark-mode .entry-content > ul a:hover,
            body.aft-dark-mode .entry-content > p a:hover,
            body.aft-default-mode .entry-content a:hover,
            body.aft-default-mode .entry-content > [class*="wp-block-"] a:not(.has-text-color):hover,
            body.aft-default-mode .entry-content > ol a:hover,
            body.aft-default-mode .entry-content > ul a:hover,
            body.aft-default-mode .entry-content > p a:hover,
            .comment-metadata a{
            color:<?php darknews_esc_custom_style($secondary_color) ?>;
            }   

            @media only screen and (min-width: 992px){
                body.aft-default-mode .darknews-header .main-navigation .menu-desktop > ul > li:hover > a:before,
                body.aft-default-mode .darknews-header .main-navigation .menu-desktop > ul > li.current-menu-item > a:before {
                background-color: <?php darknews_esc_custom_style($secondary_color) ?>;
                }
            }
        <?php endif; ?>

        <?php if (!empty($secondary_color)): ?>
            .woocommerce-product-search button[type="submit"], input.search-submit{
                background-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }
            #wp-calendar tbody td a,
            body.aft-dark-mode #wp-calendar tbody td#today,
            body.aft-default-mode #wp-calendar tbody td#today,
            body .entry-content > [class*="wp-block-"] a:not(.has-text-color),
            body .entry-content > ul a, body .entry-content > ul a:visited,
            body .entry-content > ol a, body .entry-content > ol a:visited,
            body .entry-content > p a, body .entry-content > p a:visited
            {
            color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }
            .woocommerce-product-search button[type="submit"], input.search-submit,
            body.single span.tags-links a:hover{
            border-color: <?php darknews_esc_custom_style($secondary_color) ?>;
            }

            @media only screen and (min-width: 993px){
                .main-navigation .menu-desktop > li.current-menu-item::after, 
                .main-navigation .menu-desktop > ul > li.current-menu-item::after, 
                .main-navigation .menu-desktop > li::after, .main-navigation .menu-desktop > ul > li::after{
                    background-color: <?php darknews_esc_custom_style($secondary_color) ?>;
                }
            }
        <?php endif; ?>


        <?php if (!empty($site_title_font)): ?>
        .site-title {
        font-family: <?php darknews_esc_custom_style($site_title_font) ?>;
        }
    <?php endif; ?>

        <?php if (!empty($primary_font)): ?>
        body,
        button,
        input,
        select,
        optgroup,
        .cat-links li a,
        .min-read,
        .af-social-contacts .social-widget-menu .screen-reader-text,
        textarea, p {
        font-family: <?php darknews_esc_custom_style($primary_font) ?>;
        }
    <?php endif; ?>

        <?php if (!empty($secondary_font)): ?>
        div.custom-menu-link > a,
        .aft-main-banner-wrapper .nav-tabs>li>a,
        .aft-posts-tabs-panel .nav-tabs>li>a,
        .exclusive-posts .exclusive-now span,
        .aft-posts-tabs-panel .nav-tabs>li>a,
        .nav-tabs>li,
        .widget ul ul li,
        .widget ul.menu >li ,
        .widget > ul > li,
        .main-navigation ul li a,
        h1, h2, h3, h4, h5, h6 {
        font-family: <?php darknews_esc_custom_style($secondary_font) ?>;
        }
    <?php endif; ?>

    .elementor-page .elementor-section.elementor-section-full_width > .elementor-container,
        .elementor-page .elementor-section.elementor-section-boxed > .elementor-container,
        .elementor-default .elementor-section.elementor-section-full_width > .elementor-container,
        .elementor-default .elementor-section.elementor-section-boxed > .elementor-container{
            max-width: 1244px;
        }
        @media screen and (min-width: 1360px){
            .af-full-layout.elementor-page .elementor-section.elementor-section-full_width > .elementor-container,
            .af-full-layout.elementor-page .elementor-section.elementor-section-boxed > .elementor-container,
            .af-full-layout.elementor-default .elementor-section.elementor-section-full_width > .elementor-container,
            .af-full-layout.elementor-default .elementor-section.elementor-section-boxed > .elementor-container{
                max-width: 1920px;
            }
        }
        .full-width-content .elementor-section-stretched,
        .align-content-left .elementor-section-stretched,
        .align-content-right .elementor-section-stretched {
            max-width: 100%;
            left: 0 !important;
        }
        <?php
        return ob_get_clean();
    }
}

if (!function_exists('darknews_esc_custom_style(')) {

    function darknews_esc_custom_style($props)  {
        echo wp_kses( $props, array( "\'", '\"' ) );
        
    }
}

