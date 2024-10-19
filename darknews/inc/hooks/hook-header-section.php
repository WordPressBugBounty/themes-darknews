<?php
if (!function_exists('darknews_header_section')) :
    /**
     * Banner Slider
     *
     * @since DarkNews 1.0.0
     *
     */
    function darknews_header_section()
    {


        ?>

        <header id="masthead" class="header-layout-default darknews-header">
            <?php darknews_get_block('layout-default', 'header'); ?>
        </header>

        <!-- end slider-section -->
        <?php
    }
endif;
add_action('darknews_action_header_section', 'darknews_header_section', 40);

//Load main nav menu
if (!function_exists('darknews_main_menu_nav_section')):

    function darknews_main_menu_nav_section()
    {

        ?>
        <div class="navigation-container">
            <nav class="main-navigation clearfix">

                                        <button class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                                        <span class="screen-reader-text">
                                            <?php esc_html_e('Primary Menu', 'darknews'); ?>
                                        </span>
                                        <i class="ham"></i>
                                    </button>


                <?php
                $darknews_global_show_home_menu = darknews_get_option('global_show_primary_menu_border');
                wp_nav_menu(array(
                    'theme_location' => 'aft-primary-nav',
                    'menu_id' => 'primary-menu',
                    'container' => 'div',
                    'container_class' => 'menu main-menu menu-desktop ' . $darknews_global_show_home_menu,
                ));
                ?>
            </nav>
        </div>


    <?php }
endif;

add_action('darknews_action_main_menu_nav', 'darknews_main_menu_nav_section', 40);

//load search form
if (!function_exists('darknews_load_search_form_section')):

    function darknews_load_search_form_section()
    {
        ?>
        <div class="af-search-wrap">
            <div class="search-overlay">
                <a href="#" title="Search" class="search-icon">
                    <i class="fa fa-search"></i>
                </a>
                <div class="af-search-form">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

    <?php }

endif;
add_action('darknews_load_search_form', 'darknews_load_search_form_section');


//watch online
if (!function_exists('darknews_load_watch_online_section')):

    function darknews_load_watch_online_section()
    {

        $darknews_aft_enable_custom_link = darknews_get_option('show_watch_online_section');
        if ($darknews_aft_enable_custom_link):
            $darknews_aft_custom_link = darknews_get_option('aft_custom_link');
            $darknews_aft_custom_link = !empty($darknews_aft_custom_link) ? $darknews_aft_custom_link : '#';
            $darknews_aft_custom_icon = darknews_get_option('aft_custom_icon');
            $darknews_aft_custom_title = darknews_get_option('aft_custom_title');
            if (!empty($darknews_aft_custom_title)):
                ?>
                <div class="custom-menu-link">
                    <a href="<?php echo esc_url($darknews_aft_custom_link); ?>">
                        <?php if (!empty($darknews_aft_custom_icon)): ?>
                            <i class="<?php echo esc_attr($darknews_aft_custom_icon); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php echo esc_html($darknews_aft_custom_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    <?php }

endif;
add_action('darknews_load_watch_online', 'darknews_load_watch_online_section');

//Load off canvas section
if (!function_exists('darknews_load_off_canvas_section')):

    function darknews_load_off_canvas_section()
    {
        if (is_active_sidebar('express-off-canvas-panel')) :
            ?>


            <span class="offcanvas">
				<a href="#" class="offcanvas-nav">
					<div class="offcanvas-menu">
						<span class="mbtn-top"></span>
						<span class="mbtn-mid"></span>
						<span class="mbtn-bot"></span>
					</div>
				</a>
			</span>
        <?php
        endif;
    }

endif;
add_action('darknews_load_off_canvas', 'darknews_load_off_canvas_section');

//load date part
if (!function_exists('darknews_load_date_section')):
    function darknews_load_date_section()
    {
        $darknews_show_date = darknews_get_option('show_date_section');
        if ($darknews_show_date == true): ?>
            <span class="topbar-date">
        <?php
        echo wp_kses_post(date_i18n(get_option('date_format')));
        ?>
    </span>
        <?php endif;
    }
endif;
add_action('darknews_load_date', 'darknews_load_date_section');

//load social icon menu
if (!function_exists('darknews_load_social_menu_section')):

    function darknews_load_social_menu_section()
    {
        ?>
        <?php
        $darknews_show_social_menu = darknews_get_option('show_social_menu_section');
        if (has_nav_menu('aft-social-nav') && $darknews_show_social_menu == true): ?>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'aft-social-nav',
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>',
                'container' => 'div',
                'container_class' => 'social-navigation'
            ));
            ?>

        <?php endif; ?>
    <?php }

endif;

add_action('darknews_load_social_menu', 'darknews_load_social_menu_section');

//Load site branding section

if (!function_exists('darknews_load_site_branding_section')):
    function darknews_load_site_branding_section()
    {
        ?>
        <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() || is_home()) : ?>
                <h1 class="site-title font-family-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-anchor"
                       rel="home"><?php bloginfo('name'); ?></a>
                </h1>
            <?php else : ?>
                <p class="site-title font-family-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-anchor"
                       rel="home"><?php bloginfo('name'); ?></a>
                </p>
            <?php endif; ?>

            <?php
            $darknews_description = get_bloginfo('description', 'display');
            if ($darknews_description || is_customize_preview()) : ?>
                <p class="site-description"><?php echo esc_html($darknews_description); ?></p>
            <?php
            endif; ?>
        </div>

    <?php }

endif;
add_action('darknews_load_site_branding', 'darknews_load_site_branding_section');

