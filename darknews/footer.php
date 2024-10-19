<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DarkNews
 */

$sidebar_col = 0;
if(is_active_sidebar( 'footer-first-widgets-section')){
    $sidebar_col +=1;
}

if(is_active_sidebar( 'footer-second-widgets-section')){
    $sidebar_col +=1;
}

if(is_active_sidebar( 'footer-third-widgets-section')){
    $sidebar_col +=1;
}

$sidebar_col_class = 'aft-footer-sidebar-col-'.$sidebar_col;

$darknews_footer_background = darknews_get_option('footer_background_image');
$darknews_footer_background_url = '';
if(!empty($darknews_footer_background)){

    $darknews_footer_background = absint($darknews_footer_background);
    $darknews_footer_background_url = wp_get_attachment_url($darknews_footer_background);

    $sidebar_col_class .= ' data-bg';

}


?>


</div>



<?php do_action('darknews_action_full_width_upper_footer_section'); ?>

<footer class="site-footer <?php echo esc_attr($sidebar_col_class); ?>" data-background="<?php echo esc_attr($darknews_footer_background_url); ?>">
    
    <?php if (is_active_sidebar( 'footer-first-widgets-section') || is_active_sidebar( 'footer-second-widgets-section') || is_active_sidebar( 'footer-third-widgets-section')) : ?>
    <div class="primary-footer">
        <div class="container-wrapper">
            <div class="af-container-row">
                <?php if (is_active_sidebar( 'footer-first-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-first-widgets-section col-3 float-l pad">
                        <section class="widget-area color-pad">
                                <?php dynamic_sidebar('footer-first-widgets-section'); ?>
                        </section>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar( 'footer-second-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-second-widgets-section  col-3 float-l pad">
                        <section class="widget-area color-pad">
                            <?php dynamic_sidebar('footer-second-widgets-section'); ?>
                        </section>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar( 'footer-third-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-third-widgets-section  col-3 float-l pad">
                        <section class="widget-area color-pad">
                            <?php dynamic_sidebar('footer-third-widgets-section'); ?>
                        </section>
                    </div>
                <?php endif; ?>
               
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(1 != darknews_get_option('hide_footer_menu_section')): ?>
    <?php if (has_nav_menu( 'aft-footer-nav' ) || has_nav_menu( 'aft-social-nav' )):
        $class = 'col-1';
        if (has_nav_menu( 'aft-footer-nav' ) && has_nav_menu( 'aft-social-nav' )){
            $class = 'col-2';
        }

        ?>
    <div class="secondary-footer">
        <div class="container-wrapper">
            <div class="af-container-row clearfix af-flex-container">
                <?php if (has_nav_menu( 'aft-footer-nav' )): ?>
                    <div class="float-l pad color-pad <?php echo esc_attr($class); ?>">
                        <div class="footer-nav-wrapper">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'aft-footer-nav',
                            'menu_id' => 'footer-menu',
                            'depth' => 1,
                            'container' => 'div',
                            'container_class' => 'footer-navigation'
                        )); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php if (has_nav_menu( 'aft-social-nav' )): ?>
                    <div class="float-l pad color-pad <?php echo esc_attr($class); ?>">
                        <div class="footer-social-wrapper">
                            <div class="aft-small-social-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'container' => 'div',
                                    'container_class' => 'social-navigation'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="site-info">
        <div class="container-wrapper">
            <div class="af-container-row">
                <div class="col-1 color-pad">
                    <?php $darknews_copy_right = darknews_get_option('footer_copyright_text'); ?>
                    <?php if (!empty($darknews_copy_right)): ?>
                        <?php echo esc_html($darknews_copy_right); ?>
                    <?php endif; ?>
                    <?php $darknews_theme_credits = darknews_get_option('hide_footer_copyright_credits'); ?>
                    <?php if ($darknews_theme_credits != 1): ?>
                        <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf(esc_html__('%1$s by %2$s.', 'darknews'), '<a href="https://afthemes.com/products/darknews/" target="_blank">DarkNews</a>', 'AF themes');
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php $darknews_scroll_to_top_position = darknews_get_option('global_scroll_to_top_position');
if($darknews_scroll_to_top_position != 'none'):
    ?>

    <a id="scroll-up" class="secondary-color <?php echo esc_attr($darknews_scroll_to_top_position); ?>">
    </a>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
