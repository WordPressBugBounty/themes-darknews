<?php
    /**
     * List block part for displaying page content in page.php
     *
     * @package DarkNews
     */


    $darknews_grid_design ='grid-design-default';
    $darknews_thumbnail_size = 'darknews-medium';

$darknews_content_view = darknews_get_option('archive_content_view');
$darknews_show_excerpt = true;
if($darknews_content_view == 'archive-content-none'){
    $darknews_show_excerpt = false;
}
?>

<div class="archive-grid-post">
    <?php do_action('darknews_action_loop_grid', $post->ID, $darknews_grid_design, $darknews_thumbnail_size, $darknews_show_excerpt, $darknews_content_view); ?>

    <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'darknews'),
            'after' => '</div>',
        ));
    ?>
</div>








