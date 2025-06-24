<?php
/**
 * Recommended plugins
 *
 * @package DarkNews
 */

if ( ! function_exists( 'darknews_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function darknews_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Templatespare', 'darknews' ),
                'slug'     => 'templatespare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Elespare', 'darknews' ),
                'slug'     => 'elespare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Blockspare', 'darknews' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'darknews' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Free Live Chat using 3CX', 'darknews' ),
                'slug'     => 'wp-live-chat-support',
                'required' => false,
            )
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'darknews_recommended_plugins' );
