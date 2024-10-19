<?php
    /**
     * List block part for displaying header content in page.php
     *
     * @package DarkNews
     */
    
    $darknews_class = '';
    $darknews_background = '';
    if (has_header_image()) {
        $darknews_class = 'af-header-image data-bg';
        $darknews_background = get_header_image();
    }
$darknews_show_top_header_section = darknews_get_option('show_top_header_section');
?>
<?php if($darknews_show_top_header_section): ?>
<div class="top-header">
    <div class="container-wrapper">
        <div class="top-bar-flex">
            <div class="top-bar-left col-2">
                <div class="date-bar-left">
                    <?php do_action('darknews_load_date'); ?>
                </div>
            </div>
            <div class="top-bar-right col-2">
                <div class="aft-small-social-menu">
                    <?php do_action('darknews_load_social_menu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="af-middle-header <?php echo esc_attr($darknews_class); ?>"
     data-background="<?php echo esc_attr($darknews_background); ?>">
    <div class="container-wrapper">
        <div class="af-middle-container">
            <div class="logo">
                <?php do_action('darknews_load_site_branding'); ?>
            </div>

                    <div class="header-promotion">
                        <?php do_action('darknews_action_banner_advertisement'); ?>
                    </div>

        </div>
    </div>
</div>
<div id="main-navigation-bar" class="af-bottom-header">
    <div class="container-wrapper">
        <div class="bottom-bar-flex">
            <div class="offcanvas-navigaiton">
                <?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
                    <div class="off-cancas-panel">
                        <?php do_action('darknews_load_off_canvas'); ?>
                    </div>
                    <div id="sidr" class="primary-background">
                        <a class="sidr-class-sidr-button-close" href="#sidr-nav"></a>
                        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
                    </div>
                <?php endif; ?>
                <div class="af-bottom-head-nav">
                    <?php do_action('darknews_action_main_menu_nav'); ?>
                </div>
            </div>
            <div class="search-watch">
                <?php do_action('darknews_load_search_form'); ?>
                <?php do_action('darknews_load_watch_online'); ?>
            </div>
        </div>
    </div>
</div>
    
