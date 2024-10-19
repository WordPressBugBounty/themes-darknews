<?php
/**
 * Full block part for displaying page content in page.php
 *
 * @package DarkNews
 */

$darknews_grid_design = 'grid-design-default';
$darknews_thumbnail_size = 'darknews-featured';
$darknews_title_position = 'bottom';
$darknews_content_view = darknews_get_option('archive_content_view');
$darknews_show_excerpt = true;
if ($darknews_content_view == 'archive-content-none') {
    $darknews_show_excerpt = false;
}


$darknews_archive_image = darknews_get_option('archive_layout_full');
if($darknews_archive_image  == 'full-image-tile'){
    $darknews_grid_design ='grid-design-texts-over-image';
}

if($darknews_archive_image == 'full-title-first'){
    $darknews_title_position = 'top';
}

do_action('darknews_action_loop_grid', $post->ID, $darknews_grid_design, $darknews_thumbnail_size, $darknews_show_excerpt, $darknews_content_view, $darknews_title_position);