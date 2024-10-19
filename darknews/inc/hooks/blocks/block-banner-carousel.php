<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package DarkNews
     */
    
    $darknews_posts_filter_by = darknews_get_option('select_main_banner_carousel_filterby');
    if ($darknews_posts_filter_by == 'tag') {
        $darknews_slider_category = darknews_get_option('select_slider_news_tag');
        $darknews_filterby = 'tag';
    } else {
        $darknews_slider_category = darknews_get_option('select_slider_news_category');
        $darknews_filterby = 'cat';
        
    }
    
    
    $darknews_number_of_slides = darknews_get_option('number_of_slides');
    $darknews_slider_mode = darknews_get_option('select_main_banner_section_mode');
    $darknews_main_banner_layout_section = darknews_get_option('select_main_banner_layout_section');
    
    $darknews_centerPadding = '';
    $darknews_break_point_1_centerPadding = '';
    $darknews_break_point_2_centerPadding = '';
    $darknews_break_point_3_centerPadding = '';
    
    
    if ($darknews_main_banner_layout_section == 'layout-7') {
        $darknews_centerMode = false;
        $darknews_slidesToShow = 2;
        $darknews_slidesToScroll = 1;
        $darknews_carousel_class = 'af-carousel-2';
        $darknews_break_point_1_slidesToShow = 2;
        $darknews_break_point_1_slidesToScroll = 1;
        $darknews_break_point_2_slidesToShow = 2;
        $darknews_break_point_2_slidesToScroll = 1;
        $darknews_break_point_3_slidesToShow = 1;
        $darknews_break_point_3_slidesToScroll = 1;
    } else {
        $darknews_centerMode = false;
        $darknews_slidesToShow = 1;
        $darknews_slidesToScroll = 1;
        $darknews_carousel_class = 'af-carousel-default';
        $darknews_break_point_1_slidesToShow = 1;
        $darknews_break_point_1_slidesToScroll = 1;
        $darknews_break_point_2_slidesToShow = 1;
        $darknews_break_point_2_slidesToScroll = 1;
        $darknews_break_point_3_slidesToShow = 1;
        $darknews_break_point_3_slidesToScroll = 1;
    }
    
    $darknews_carousel_args = array(
        'slidesToShow' => $darknews_slidesToShow,
        'slidesToScroll' => $darknews_slidesToScroll,
        'centerMode' => $darknews_centerMode,
        'centerPadding' => $darknews_centerPadding,
        'responsive' => array(
            array(
                'breakpoint' => 1025,
                'settings' => array(
                    'slidesToShow' => $darknews_break_point_2_slidesToShow,
                    'slidesToScroll' => $darknews_break_point_3_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $darknews_break_point_1_centerPadding,
                ),
            ),
            array(
                'breakpoint' => 600,
                'settings' => array(
                    'slidesToShow' => $darknews_break_point_2_slidesToShow,
                    'slidesToScroll' => $darknews_break_point_2_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $darknews_break_point_2_centerPadding,
                ),
            ),
            array(
                'breakpoint' => 480,
                'settings' => array(
                    'slidesToShow' => $darknews_break_point_3_slidesToShow,
                    'slidesToScroll' => $darknews_break_point_3_slidesToScroll,
                    'infinite' => true,
                    'centerPadding' => $darknews_break_point_3_centerPadding,
                ),
            ),
        ),
    );
    
    $darknews_carousel_args_encoded = wp_json_encode($darknews_carousel_args);
?>

<div class="af-widget-carousel aft-carousel">
    <div class="slick-wrapper af-banner-carousel af-banner-carousel-1 common-carousel af-cat-widget-carousel <?php echo esc_html($darknews_carousel_class); ?>"
         data-slick='<?php echo wp_kses_post($darknews_carousel_args_encoded); ?>'>
        <?php
            $darknews_slider_posts = darknews_get_posts($darknews_number_of_slides, $darknews_slider_category, $darknews_filterby);
            if ($darknews_slider_posts->have_posts()) :
                while ($darknews_slider_posts->have_posts()) : $darknews_slider_posts->the_post();
                    global $post;
                    $thumbnail_size = 'darknews-slider-full';
                    ?>
                    <div class="slick-item">
                        <?php do_action('darknews_action_loop_grid', $post->ID, 'grid-design-texts-over-image', $thumbnail_size); ?>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
</div>