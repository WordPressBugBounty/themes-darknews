<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package DarkNews
     */
    
    $darknews_trending_posts_title = darknews_get_option('main_trending_news_section_title');
    $darknews_main_posts_title = darknews_get_option('main_banner_news_section_title');
    $darknews_editors_picks_posts_title = darknews_get_option('main_editors_picks_section_title');
    $darknews_editors_picks_news_position = darknews_get_option('select_editors_picks_news_position');
    $darknews_main_banner_carousel_position = darknews_get_option('select_main_banner_carousel_position');
    $darknews_trending_post_position = darknews_get_option('select_trending_post_position');
?>

<div class="aft-main-banner-part af-container-row-5 clearfix">

    <div class="aft-slider-part col-2 pad float-l <?php echo esc_attr($darknews_main_banner_carousel_position); ?>">

        <?php darknews_get_block('carousel', 'banner'); ?>
    </div>

    <div class="aft-trending-part col-4 pad float-l <?php echo esc_attr($darknews_trending_post_position); ?>">

        <?php darknews_get_block('tabs', 'banner'); ?>
    </div>

    <div class="aft-thumb-part col-4 pad float-l <?php echo esc_attr($darknews_editors_picks_news_position); ?>">


        <?php darknews_get_block('thumb', 'banner'); ?>
    </div>


</div>