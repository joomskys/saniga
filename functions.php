<?php
/**
 * Functions and definitions
 *
 * @package Saniga
 */
if(!function_exists('saniga_require_folder')){
    function saniga_require_folder($foldername,$path = '')
    {
        if($path === '') $path = get_template_directory();
        $dir = $path . DIRECTORY_SEPARATOR . $foldername;
        if (!is_dir($dir)) {
            return;
        }
        $files = array_diff(scandir($dir), array('..', '.'));
        foreach ($files as $file) {
            $patch = $dir . DIRECTORY_SEPARATOR . $file;
            if (file_exists($patch) && strpos($file, ".php") !== false) {
                require_once $patch;
            }
        }
    }
}
saniga_require_folder('inc');
saniga_require_folder('inc/theme-configs');
saniga_require_folder('inc/extends');

if ( ! function_exists( 'saniga_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    add_action( 'after_setup_theme', 'saniga_setup' );
    function saniga_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'saniga', get_template_directory() . '/languages' );
        // Custom Header
        add_theme_support( "custom-header" );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        // Set post thumbnail size.
        set_post_thumbnail_size( saniga_configs('thumbnail')['post_thumbnail_size_w'], saniga_configs('thumbnail')['post_thumbnail_size_h'] );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Saniga Primary', 'saniga' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'saniga_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => saniga_configs('logo')['width'],
            'width'       => saniga_configs('logo')['height'],
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        add_theme_support( 'post-formats', array(
            'gallery',
            'video',
        ) );
        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );
        // Enable support for WooCommerce.
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
/* Display Custom Image Sizes */
if(!function_exists('saniga_custom_sizes')){
    add_filter('image_size_names_choose','saniga_custom_sizes');
    function saniga_custom_sizes($sizes){
        return array_merge($sizes, array(
            'medium_large' => esc_html__('Medium Large', 'saniga')
        ));
    }
}
if(!function_exists('saniga_update')){
    add_action('after_switch_theme', 'saniga_update');
    function saniga_update(){
        /* Change default image thumbnail sizes in wordpress */
        $thumbnail_size = array(
            'large_size_w'        => saniga_configs('thumbnail')['large_size_w'],
            'large_size_h'        => saniga_configs('thumbnail')['large_size_h'],
            'large_crop'          => 1, 
            'medium_large_size_w' => saniga_configs('thumbnail')['medium_large_size_w'],
            'medium_large_size_h' => saniga_configs('thumbnail')['medium_large_size_h'],
            'medium_large_crop'   => 1, 
            'medium_size_w'       => saniga_configs('thumbnail')['medium_size_w'],
            'medium_size_h'       => saniga_configs('thumbnail')['medium_size_h'],
            'medium_crop'         => 1, 
            'thumbnail_size_w'    => saniga_configs('thumbnail')['thumbnail_size_w'],
            'thumbnail_size_h'    => saniga_configs('thumbnail')['thumbnail_size_h'],
            'thumbnail_crop'      => 1,
        );
        foreach ($thumbnail_size as $option => $value) {
            if (get_option($option, '') != $value)
                update_option($option, $value);
        }
    }
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set up the content width value based on the theme's design and stylesheet.
if(!function_exists('saniga_content_width')){
    add_action('after_setup_theme', 'saniga_content_width', 0);
    if (!isset($content_width))
        $content_width = apply_filters('saniga_content_width', saniga_configs('content_width'));
    function saniga_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('saniga_content_width', saniga_configs('content_width'));
    }
}

// Add new menu Locations
add_action( 'cms_locations', function ( $cms_locations ) {
    //$cms_locations['cms-test'] ='Test Menu';
    return $cms_locations;
} );
/**
 * Register widget area.
 */
if(!function_exists('saniga_widgets_init')){
    add_action( 'widgets_init', 'saniga_widgets_init' );
    function saniga_widgets_init() {
        if(class_exists('Elementor_Theme_Core')){
            $all_post_type = saniga_all_post_types();
            foreach ($all_post_type as $key => $value) {
                register_sidebar( array(
                    'name'          => sprintf( esc_html__( '%s Sidebar', 'saniga' ), $value ),
                    'id'            => 'sidebar-'.$key,
                    'description'   => sprintf(esc_html__( 'Add widgets here to show in %1$s archive page and single %2$s page', 'saniga' ), strtoupper(str_replace('-', ' ', $key)), $value),
                    'class'         => 'cms-post-type-widget',
                    'title_class'   => ''
                ) );
            }
            // Hidden sidebar
            register_sidebar( array(
                'name'          => esc_html__( 'Hidden Sidebar', 'saniga' ),
                'id'            => 'sidebar-hidden',
                'description'   => esc_html__( 'Add widgets here.', 'saniga' ),
                'class'         => 'cms-hidden-widget',
                'title_class'   => ''
            ) );
        } else {
            register_sidebar( array(
                'name'          => esc_html__( 'Blog Widgets', 'saniga' ),
                'id'            => 'sidebar-post',
                'description'   => esc_html__( 'Add widgets here to show on blog/archives/single post page', 'saniga' ),
                'class'         => 'cms-blog-widget',
                'title_class'   => ''
            ) );
            if(class_exists('WooCommerce')){
                register_sidebar( array(
                    'name'          => esc_html__( 'WooCommerce Widgets', 'saniga' ),
                    'id'            => 'sidebar-product',
                    'description'   => esc_html__( 'Add widgets here to show on woocommerce page', 'saniga' ),
                    'class'         => 'cms-blog-widget',
                    'title_class'   => ''
                ) );
            }
        }
    }
}
/**
 * Change default widget title structure
*/
if(!function_exists('saniga_widgets_title')){
    add_filter('widget_display_callback', 'saniga_widgets_structure');
    add_filter('register_sidebar_defaults', 'saniga_widgets_structure');
    function saniga_widgets_structure($args){
        $args = wp_parse_args($args, [
            'title_class' => ''
        ]);
        $widget_title_tag = 'div';
        $title_class = [
            'cms-widget-title',
            'cms-heading',
            isset($args['title_class']) ? $args['title_class'] : ''
        ];
        $args['before_widget'] = '<div id="%1$s" class="cms-widget %2$s"><div class="cms-widget-inner">';
        $args['after_widget']  = '</div></div>';
        $args['before_title']  = '<'.$widget_title_tag.' class="'.trim(implode(' ', $title_class)).'">';
        $args['after_title']   = '</'.$widget_title_tag.'>';
        return $args;
    }
}
/**
 * Enqueue scripts and styles.
 */
if(!function_exists('saniga_scripts')){
    add_action( 'wp_enqueue_scripts', 'saniga_scripts', 10);
    function saniga_scripts() {
        $theme = wp_get_theme( get_template() );
        $dev_mode   = saniga_get_opt('dev_mode', false);
        if($dev_mode === '' || $dev_mode === '0' || $dev_mode === false){
            $min = '.min';
        } else {
            $min = '';
        }
        // google font
        wp_enqueue_style( 'saniga-google-fonts', saniga_fonts_url() );
        // theme font icon
        wp_enqueue_style( 'font-cmsi', get_template_directory_uri() . '/assets/fonts/font-cmsi/styles.css', array(), $theme->get( 'Version' ) );
        // Saniga incon
        wp_enqueue_style( 'font-saniga', get_template_directory_uri() . '/assets/fonts/font-saniga/flaticon.css', array(), $theme->get( 'Version' ) );
        // theme style
        wp_enqueue_style( 'saniga', get_template_directory_uri() . '/assets/css/theme'.$min.'.css', array(), $theme->get( 'Version' ) );
        wp_add_inline_style( 'saniga', saniga_inline_styles() );
        // WP Comment
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        // magnific-popup
        wp_register_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
        wp_register_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
        // Slick Slider 
        wp_register_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
        // Theme JS
        wp_enqueue_script( 'saniga', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
        wp_localize_script( 'saniga', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        /*
         * Elementor Widget JS
         */
        // Accordion
        wp_register_script('cms-accordion', get_template_directory_uri() . '/elementor/js/cms-accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        // Counter
        wp_register_script('cms-counter', get_template_directory_uri() . '/elementor/js/cms-counter.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        // Post Grid Widget
        wp_register_script('cms-post-grid', get_template_directory_uri() . '/elementor/js/cms-post-grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
        // Progress Bar Widget
        wp_register_script( 'cms-progressbar', get_template_directory_uri() . '/elementor/js/cms-progressbar.js', [ 'jquery' ], $theme->get( 'Version' ) );
        // Slick Slider
        wp_register_script('cms-jquery-slick', get_template_directory_uri() . '/elementor/js/cms-slick-slider.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        // Elementor Custom
        wp_enqueue_script('cms-elementor-custom-js', get_template_directory_uri() . '/elementor/js/elementor-custom.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    }
}

/* add editor styles */
if(!function_exists('saniga_add_editor_styles')){
    add_action( 'admin_init', 'saniga_add_editor_styles' );
    function saniga_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
}

/* add admin styles */
if(!function_exists('saniga_admin_style')){
    add_action( 'admin_enqueue_scripts', 'saniga_admin_style' );
    function saniga_admin_style() {
        $theme = wp_get_theme( get_template() );
        wp_enqueue_style( 'saniga-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
        wp_enqueue_script('saniga-main-admin', get_template_directory_uri() . '/assets/js/main-admin.js', array( 'jquery' ), $theme->get('Version'), true);
    }
}

/**
 * Register Google Fonts
 *
 * https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 * https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
*/
function saniga_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    if ( 'off' !== _x( 'on', 'Fira Sans font: on or off', 'saniga' ) ) {
        $fonts[] = 'Fira Sans:400,400i,500,500i,600,600i,700,700i';
    }
    
    if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'saniga' ) ) {
        $fonts[] = 'Roboto:400,400i,500,500i,700,700i';
    }
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
/**
 * Incudes file
 *
*/
saniga_require_folder('inc/classes');
saniga_require_folder('inc/theme-options');
saniga_require_folder('inc/cms-iconpicker');

/**
 * Additional widgets for the theme
 */
saniga_require_folder('widgets');
/**
 * Custom post type
*/
saniga_require_folder('inc/custom-post');
/**
 * Elementor
*/
saniga_require_folder('inc/elementor');
/**
 *  Woocommerce
 */
if(class_exists('Woocommerce')){
    saniga_require_folder('woocommerce');
}
/**
 * other extensions
*/
saniga_require_folder('inc/extensions');
/**
 * Remove all Font Awesome from 3rd extension 
 * to use only font-awesome latest from our theme
 * //'font-awesome',
 * //'gglcptch',
*/
if(!function_exists('saniga_remove_styles')){
    add_filter('etc_remove_styles', 'saniga_remove_styles');
    function saniga_remove_styles($styles){
        $_styles = [
            // gutenberg
            'wp-block-library',
            // newsletter
            'newsletter',
            // elementor
            'elementor-frontend-legacy',
            // woo
            'woocommerce-smallscreen',
            'woocommerce-general',
            'woocommerce-layout',
            'wc-block-vendors-style',
            'wc-block-style',
            // theme core
            'oc-css',
            'etc-main-css',
            'progressbar-lib-css',
            // language switcher
            'trp-floater-language-switcher-style',
            'trp-language-switcher-style',
            // Profile Press 
            'ppress-frontend',
            'ppress-flatpickr',
            'ppress-select2',
        ];
        $styles = array_merge($styles, $_styles);
        return $styles;
    }
}
if(!function_exists('etc_remove_styles')){
    add_action( 'wp_enqueue_scripts', 'etc_remove_styles', 999 );
    add_action( 'wp_footer', 'etc_remove_styles', 999 );
    add_action( 'wp_header', 'etc_remove_styles', 999 );
    function etc_remove_styles() {
        $default = ['gglcptch' ];
        $styles  = apply_filters( 'etc_remove_styles', $default );
        foreach ( $styles as $style ) {
            wp_dequeue_style( $style );
            wp_deregister_style( $style );
        }
    }
}

if(!function_exists('saniga_elementor_base_scripts')){
    //add_action( 'wp_enqueue_scripts', 'saniga_elementor_base_scripts', 10000);
    function saniga_elementor_base_scripts() {
        // elementor font awesome
        if(function_exists('elementor_load_plugin_textdomain')){
            wp_enqueue_style( 'font-awesome-5-all', plugins_url() . '/elementor/assets/lib/font-awesome/css/all.min.css' );
        }
    }
}
// remove comment cookies
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );
// remove lazy load 
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
// Remove Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );