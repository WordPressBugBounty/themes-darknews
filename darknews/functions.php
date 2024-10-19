<?php
/**
 * DarkNews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DarkNews
 */

/**
 * Define Theme Constants.
 */

defined('ESHF_COMPATIBILITY_TMPL') or define('ESHF_COMPATIBILITY_TMPL', 'darknews');


if (!function_exists('darknews_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    /**
     *
     */
    /**
     *
     */
    function darknews_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on DarkNews, use a find and replace
         * to change 'darknews' to the name of your theme in all the template files.
         */
        load_theme_textdomain('darknews', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        // Add featured image sizes
        add_image_size('darknews-slider-full', 1280, 720, true); // width, height, crop
        add_image_size('darknews-featured', 1024, 0, false); // width, height, crop
        add_image_size('darknews-medium', 720, 530, true); // width, height, crop
        add_image_size('darknews-medium-square', 350, 350, true); // width, height, crop

        /*
         * Enable support for Post Formats on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array('image', 'video', 'gallery'));

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'aft-primary-nav' => esc_html__('Primary Menu', 'darknews'),
            'aft-social-nav' => esc_html__('Social Menu', 'darknews'),
            'aft-footer-nav' => esc_html__('Footer Menu', 'darknews'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('darknews_custom_background_args', array(
            'default-color' => '000000',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');



        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'flex-width' => true,
            'flex-height' => true,
        ));


        /** 
	    * Add theme support for gutenberg block
	    */
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'appearance-tools' );
        add_theme_support( 'custom-spacing' );        
		add_theme_support( 'custom-units' );
        add_theme_support( 'custom-line-height' );
        add_theme_support( 'border' );
        add_theme_support( 'link-color' );

  


    }
endif;
add_action('after_setup_theme', 'darknews_setup');
    
    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function darknews_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('darknews_content_width', 640);
    }
    
    add_action('after_setup_theme', 'darknews_content_width', 0);

/**
 * function for google fonts
 */
if (!function_exists('darknews_fonts_url')):

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function darknews_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        $darknews_site_title_font = darknews_get_option('site_title_font');
        $darknews_primary_font = darknews_get_option('primary_font');
        $darknews_secondary_font = darknews_get_option('secondary_font');

        $darknews_fonts = array();
        $darknews_fonts[] = $darknews_site_title_font;
        $darknews_fonts[] = $darknews_primary_font;
        $darknews_fonts[] = $darknews_secondary_font;

        $i = 0;
        for ($i = 0; $i < count($darknews_fonts); $i++) {

            if ('off' !== sprintf(_x('on', '%s font: on or off', 'darknews'), $darknews_fonts[$i])) {
                $fonts[] = $darknews_fonts[$i];
            }

        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;


/**
 * Load Init for Hook files.
 */
 require get_template_directory() . '/inc/custom-style.php';

/**
 * Enqueue styles.
 */
 
add_action('wp_enqueue_scripts', 'darknews_style_files');
function darknews_style_files(){
    
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // wp_enqueue_style('font-awesome-v5', get_template_directory_uri() . '/assets/font-awesome/css/all' . $min . '.css');
    wp_enqueue_style('aft-icons', get_template_directory_uri() . '/assets/icons/style.css', array());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/css/slick' . $min . '.css');
    
    wp_enqueue_style('sidr', get_template_directory_uri() . '/assets/sidr/css/jquery.sidr.dark.css');
    
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css');
    

    
    $fonts_url = darknews_fonts_url();
    
    if (!empty($fonts_url)) {
        wp_enqueue_style('darknews-google-fonts', $fonts_url, array(), null);
    }
    
    /**
     * Load WooCommerce compatibility file.
     */
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('darknews-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');
        
        $font_path = WC()->plugin_url() . '/assets/fonts/';
        $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';
        
        wp_add_inline_style('darknews-woocommerce-style', $inline_font);
    }
    
    
    wp_enqueue_style('darknews-style', get_stylesheet_uri());
    wp_add_inline_style('darknews-style', darknews_custom_style());
}

/**
* Enqueue scripts.
*/

function darknews_scripts()
{

    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    wp_enqueue_script('jquery');
    wp_enqueue_script('darknews-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('darknews-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/js/slick' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('sidr', get_template_directory_uri() . '/assets/sidr/js/jquery.sidr' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/jquery.magnific-popup' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('matchheight', get_template_directory_uri() . '/assets/jquery-match-height/jquery.matchHeight' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('marquee', get_template_directory_uri() . '/assets/marquee/jquery.marquee.js', array('jquery'), '', true);

    wp_enqueue_script('masonry');
    wp_enqueue_script('darknews-script', get_template_directory_uri() . '/assets/script.js', array('jquery'), '', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'darknews_scripts');
    
    
    /**
     * Enqueue admin scripts and styles.
     *
     * @since DarkNews 1.0.0
     */
    function darknews_admin_scripts($hook)
    {
        if ('widgets.php' === $hook) {
            wp_enqueue_media();
            wp_enqueue_script('darknews-widgets', get_template_directory_uri() . '/assets/widgets.js', array('jquery'), '1.0.0', true);
        }
        
        wp_enqueue_style('darknews-notice', get_template_directory_uri().'/assets/css/notice.css');
    }
    
    add_action('admin_enqueue_scripts', 'darknews_admin_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Multi Author tags for this theme.
 */
require get_template_directory() . '/inc/multi-author.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-images.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/init.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/ocdi.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Descriptions on Header Menu
 * @author AF themes
 * @param string $item_output , HTML outputp for the menu item
 * @param object $item , menu item object
 * @param int $depth , depth in menu structure
 * @param object $args , arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function darknews_header_menu_desc($item_output, $item, $depth, $args)
{

    if (isset($args->theme_location) && 'aft-primary-nav' == $args->theme_location && $item->description)
        $item_output = str_replace('</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output);

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'darknews_header_menu_desc', 10, 4);

function darknews_menu_notitle( $menu ){
    return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'darknews_menu_notitle' );
add_filter( 'wp_page_menu', 'darknews_menu_notitle' );
add_filter( 'wp_list_categories', 'darknews_menu_notitle' );



function darknews_print_pre($args)
{
    if ($args) {
        echo "<pre>";
        print_r($args);
        echo "</pre>";
    } else {
        echo "<pre>";
        print_r('Empty');
        echo "</pre>";
    }

}

add_action( 'after_setup_theme', 'darknews_transltion_init');

function darknews_transltion_init() {
    load_theme_textdomain( 'darknews', false, get_template_directory()  . '/languages' );
}