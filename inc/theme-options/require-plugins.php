<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/libs/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'saniga_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
*/
function saniga_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $default_path = 'https://cmssuperheroes.com/plugins/elementor/';
    $plugins = array(
        /* CMS Plugin */
        array(
            'name'               => esc_html__('Redux Framework', 'saniga'),
            'slug'               => 'redux-framework',
            'required'           => true
        ),
        array(
            'name'               => esc_html__('Elementor', 'saniga'),
            'slug'               => 'elementor',
            'required'           => true
        ),
        array(
            'name'               => esc_html__('Theme Core', 'saniga'),
            'slug'               => 'elementor-theme-core',
            'source'             => 'elementor-theme-core.zip',
            'required'           => true
        ),
        array(
            'name'               => esc_html__('SWA Import Export', 'saniga'),
            'slug'               => 'swa-import-export',
            'source'             => 'swa-import-export.zip',
            'required'           => true
        ),
        array(
            'name'               => esc_html__('Revolution Slider', 'saniga'),
            'slug'               => 'revslider',
            'source'             => esc_url('https://cmssuperheroes.com/plugins/revslider.zip'),
            'required'           => true
        ),
        array(
            'name'               => esc_html__('WooCommerce', 'saniga'),
            'slug'               => 'woocommerce',
            'required'           => false
        ),
        array(
            'name'               => esc_html__('Contact Form 7', 'saniga'),
            'slug'               => 'contact-form-7',
            'required'           => false
        ),
        array(
            'name'               => esc_html__('Contact Form 7 Cost Calculator', 'saniga'),
            'slug'               => 'contact-form-7-cost-calculator',
            'source'             => esc_url('https://cmssuperheroes.com/plugins/contact-form-7-cost-calculator.zip'),
            'required'           => false
        ),
        array(
            'name'               => esc_html__('Newslettes', 'saniga'),
            'slug'               => 'newsletter',
            'required'           => false
        ),
        
        array(
            'name'               => esc_html__('WP User Avatar', 'saniga'),
            'slug'               => 'wp-user-avatar',
            'required'           => false
        ),
        array(
            'name'               => esc_html__('Translatepress Multilingual', 'saniga'),
            'slug'               => 'translatepress-multilingual',
            'required'           => false
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
    */
    $config = array(
        'default_path' => $default_path,                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true
    );

    tgmpa( $plugins, $config );

}