<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'saniga' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[$key] = sprintf( esc_html__( 'Form %s', 'saniga' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = saniga_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Elementor_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'saniga'),
    'page_title'           => esc_html__('Theme Options', 'saniga'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Elementor_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => false,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'             => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'saniga'),
    'icon'   => 'el-icon-home',
    'fields' => array()
));
/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Colors', 'saniga'),
    'icon'       => 'dashicons dashicons-dashboard',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'accent_color',
            'type'        => 'color',
            'title'       => esc_html__('Accent Color', 'saniga'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'saniga'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'saniga'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'saniga'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
        )
    )
));

/*--------------------------------------------------------------
# Tools
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Tools', 'saniga'),
    'icon'       => 'el-icon-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'saniga'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'saniga'),
            'default'  => '0'
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'saniga'),
            'default'  => '0'
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Back To Top', 'saniga'),
            'default'  => '1'
        ),
        array(
            'id'       => 'backtotop_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__( 'Choose your Back To Top icon', 'saniga' ),
            'default'  => 'cmsi-long-arrow-up',
            'required' => [
                ['back_totop_on', 'equals', '1']
            ]
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'saniga'),
            'description' => 'no minimize , generate css over time...',
            'default'  => '0'
        )
    )
));
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'saniga'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_typo',
            'type'     => 'select',
            'title'    => esc_html__('Body Typography', 'saniga'),
            'options'  => array(
                'default' => esc_html__('Default', 'saniga'),
                'custom'  => esc_html__('Custom', 'saniga'),
            ),
            'default'  => 'default',
        ),
        array(
            'id'             => 'body_font_typo',
            'type'           => 'typography',
            'title'          => esc_html__('Body Google Font', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'body_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'       => 'heading_font_typo',
            'type'     => 'select',
            'title'    => esc_html__('Heading Typography', 'saniga'),
            'options'  => array(
                'default' => esc_html__('Default', 'saniga'),
                'custom'  => esc_html__('Google Font', 'saniga'),
            ),
            'default'  => 'default',
        ),
        array(
            'id'             => 'h1_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H1', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H1 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'             => 'h2_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H2', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H2 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'             => 'h3_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H3', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H3 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'             => 'h4_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H4', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H4 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'             => 'h5_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H5', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H5 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'             => 'h6_typo',
            'type'           => 'typography',
            'title'          => esc_html__('H6', 'saniga'),
            'subtitle'       => esc_html__('This will be the default font for all H6 tags of your website.', 'saniga'),
            'letter-spacing' => true,
            'text-align'     => false,
            'units'          => 'px',
            'required'       => array( 0 => 'heading_font_typo', 1 => 'equals', 2 => 'custom' ),
        ),
        array(
            'id'       => 'sub_heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Sub Heading Default Font', 'saniga'),
            'options'  => array(
                'default' => esc_html__('Default', 'saniga'),
                'custom'  => esc_html__('Google Font', 'saniga'),
            ),
            'default'  => 'default',
        ),
        array(
            'id'           => 'font_sub_heading',
            'type'         => 'typography',
            'title'        => esc_html__('Sub Heading', 'saniga'),
            'subtitle'     => esc_html__('This will be the default font for sub heading of your website.', 'saniga'),
            'text-align'   => false,
            'units'        => 'px',
            'required'     => array( 0 => 'sub_heading_default_font', 1 => 'equals', 2 => 'custom' ),
        ),
    )
));
$custom_font_selectors_1 = Redux::getOption($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Custom Fonts', 'saniga'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'saniga'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'saniga'),
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',
        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'saniga'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'saniga'),
            'validate' => 'no_html'
        )
    )
));
/**
 * Header Top
*/
Redux::setSection($opt_name, saniga_header_top_opts());
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
// Header layout
Redux::setSection($opt_name, saniga_header_opts());
// Logo
Redux::setSection($opt_name, saniga_header_logo_opts());
// Header OnTop (Transparent)
Redux::setSection($opt_name, saniga_header_ontop_opts());
// Header Sticky
Redux::setSection($opt_name, saniga_header_sticky_opts());
// Header Navigation
Redux::setSection($opt_name, saniga_navigation_opts());
// Secondary Menu
Redux::setSection($opt_name, saniga_header_secondary_menu_opts());
// Header Attribute:  search, cart,....
Redux::setSection($opt_name, saniga_header_atts_opts());
// Header Social
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Social Link', 'saniga'),
    'icon'       => 'el el-share',
    'subsection' => true,
    'fields'     => array(
        saniga_social_list_opts()
    )
));
/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, saniga_page_title_opts());

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
        'title'  => esc_html__('Content', 'saniga'),
        'icon'   => 'el-icon-pencil',
        'fields' => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'saniga'),
            'subtitle' => esc_html__('Content background color.', 'saniga'),
            'output'   => array('background-color' => '.cms-main')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#cms-main'),
            'right'          => false,
            'left'           => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'saniga'),
            'desc'           => esc_html__('Default: Top-90px, Bottom-90px', 'saniga'),
            'default'        => array(
                'padding-top'    => '',
                'padding-bottom' => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'saniga'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'saniga'),
        ),
        array(
            'id'      => 'default_post_thumbnail',
            'type'    => 'button_set',
            'title'   => esc_html__('Use Placeholder Image for post have not featured image?', 'saniga'),
            'options' => array(
                '1'  => esc_html__('Yes', 'saniga'),
                '0' => esc_html__('No', 'saniga'),
            ),
            'default' => '0',
        ),
        array(
            'id'      => 'thumbnail_is_bg',
            'type'    => 'button_set',
            'title'   => esc_html__('Use Featured Image as Background', 'saniga'),
            'options' => array(
                '1'  => esc_html__('Yes', 'saniga'),
                '0' => esc_html__('No', 'saniga'),
            ),
            'default' => '0',
        ),
    )
));
// Single Page
Redux::setSection($opt_name, saniga_page_layout_opts() );

// Archive
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'saniga'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        saniga_sidebar_opts([
            'name'          => 'archive_sidebar_pos',
            'fields_only'   =>  true,
            'default_value' => saniga_configs('blog')['archive_sidebar_pos']  
        ]),
        array(
            'id'            => 'archive_content_col',
            'title'         => esc_html__('Content Columns', 'saniga'),
            'subtitle'      => esc_html__('Choose content Columns', 'saniga'),
            'type'          => 'slider',
            'default'       => saniga_configs('blog')['archive_content_col'],
            'min'           => 1,
            'step'          => 1,
            'max'           => 11,
            'display_value' => 'label',
            'required'      => [ 
                ['archive_sidebar_pos', '!=', '0'],
                ['archive_sidebar_pos', '!=', 'bottom']
            ],
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'saniga'),
            'subtitle' => esc_html__('Show author name on each post.', 'saniga'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'saniga'),
            'subtitle' => esc_html__('Show date posted on each post.', 'saniga'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'saniga'),
            'subtitle' => esc_html__('Show category names on each post.', 'saniga'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'saniga'),
            'subtitle' => esc_html__('Show comments count on each post.', 'saniga'),
            'type'     => 'switch',
            'default'  => true,
        ),
    )
));
// Sinlge post
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'saniga'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        saniga_sidebar_opts([
            'name'          => 'single_sidebar_pos',
            'fields_only'   =>  true,
            'default_value' => saniga_configs('blog')['single_sidebar_pos']  
        ]),
        array(
            'id'            => 'single_content_col',
            'title'         => esc_html__('Content Columns', 'saniga'),
            'subtitle'      => esc_html__('Choose content Columns', 'saniga'),
            'type'          => 'slider',
            'default'       => saniga_configs('blog')['single_content_col'],
            'min'           => 1,
            'step'          => 1,
            'max'           => 12,
            'display_value' => 'label',
            'required'      => [ 
                ['single_sidebar_pos', '!=', '0'],
                ['single_sidebar_pos', '!=', 'bottom']
            ],
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'saniga'),
            'subtitle' => esc_html__('Show author name on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '0'
        ),
        array(
            'id'       => 'post_author_info_on',
            'title'    => esc_html__('Author Info', 'saniga'),
            'subtitle' => esc_html__('Show author info name on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '0'
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'saniga'),
            'subtitle' => esc_html__('Show date on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'saniga'),
            'subtitle' => esc_html__('Show category names on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'saniga'),
            'subtitle' => esc_html__('Show tag names on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'saniga'),
            'subtitle' => esc_html__('Show comments count on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'saniga'),
            'subtitle' => esc_html__('Show social share on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '0',
        ),
        array(
            'id'       => 'post_nav_link_on',
            'title'    => esc_html__('Post Navigation', 'saniga'),
            'subtitle' => esc_html__('Show next/preview Navigation.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1',
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'saniga'),
            'subtitle' => esc_html__('Show comments form on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_comments_rating_on',
            'title'    => esc_html__('Comments Rating', 'saniga'),
            'subtitle' => esc_html__('Show comments rating field on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '0',
            'required' => [
               'post_comments_form_on',
               'equals',
               '1' 
            ]
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'saniga'),
            'subtitle' => esc_html__('Show feature image on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '1'
        ),
        array(
            'id'       => 'post_related_on',
            'title'    => esc_html__('Related Post', 'saniga'),
            'subtitle' => esc_html__('Show related on single post.', 'saniga'),
            'type'     => 'switch',
            'default'  => '0'
        ),
    )
));
//Redux::setSection($opt_name, saniga_sidebar_opts());
/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'      => esc_html__('404 Page', 'saniga'),
    'icon'       => 'el-cog-alt el',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'heading_404_page',
            'type'     => 'text',
            'title'    => esc_html__('Heading', 'saniga'),
            'subtitle' => esc_html__('Enter your text', 'saniga'),
            'desc'     => esc_html__('Leave blank to use default text', 'saniga'),
            'default'  => '',
        ),
        array(
            'id'       => 'subheading_404_page',
            'type'     => 'text',
            'title'    => esc_html__('SubHeading', 'saniga'),
            'subtitle' => esc_html__('Enter your text', 'saniga'),
            'desc'     => esc_html__('Leave blank to use default text', 'saniga'),
            'default'  => '',
        ),
        array(
            'id'       => 'content_404_page',
            'type'     => 'textarea',
            'title'    => esc_html__('Content', 'saniga'),
            'subtitle' => esc_html__('Enter your text', 'saniga'),
            'desc'     => esc_html__('Leave blank to use default text', 'saniga'),
            'default' => '',
        ),
        array(
            'id'       => 'btn_text_404_page',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'saniga'),
            'subtitle' => esc_html__('Enter your text', 'saniga'),
            'default'  => '',
            'desc'     => esc_html__('Leave blank to use default text', 'saniga')
        ),
        array(
            'id'               => 'bg_404_page',
            'type'             => 'background',
            'title'            => esc_html__('Background', 'saniga'),
            'subtitle'         => esc_html__('Choose your Background', 'saniga'),
            'desc'             => esc_html__('Leave blank to use default background', 'saniga'),
            'background-color' => false,
            'output'           => 'body.error404 .cms-main'
        ),
    ),
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'saniga'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            saniga_sidebar_opts([
                'name'          => 'product_page_sidebar_pos',
                'fields_only'   =>  true,
                'default_value' => saniga_configs('blog')['single_sidebar_pos']  
            ]),
            array(
                'id'            => 'product_page_content_col',
                'title'         => esc_html__('Content Columns', 'saniga'),
                'subtitle'      => esc_html__('Choose content Columns', 'saniga'),
                'type'          => 'slider',
                'default'       => saniga_configs('blog')['archive_content_col'],
                'min'           => 1,
                'step'          => 1,
                'max'           => 11,
                'display_value' => 'label',
                'required'      => [ 
                    ['product_page_sidebar_pos', '!=', '0'],
                    ['product_page_sidebar_pos', '!=', 'bottom']
                ],
            ),
            array(
                'title'         => esc_html__('Products displayed per row', 'saniga'),
                'id'            => 'products_columns',
                'type'          => 'slider',
                'subtitle'      => esc_html__('Number product to show per row', 'saniga'),
                'default'       => 3,
                'min'           => 2,
                'step'          => 1,
                'max'           => 6,
                'display_value' => 'text'
            ),
            array(
                'title'         => esc_html__('Products displayed per page', 'saniga'),
                'id'            => 'product_per_page',
                'type'          => 'slider',
                'subtitle'      => esc_html__('Number product to show', 'saniga'),
                'default'       => 9,
                'min'           => 3,
                'step'          => 1,
                'max'           => 50,
                'display_value' => 'text'
            ),
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Sinlge Products', 'saniga'),
        'icon'       => 'el el-shopping-cart',
        'subsection' => true,
        'fields'     => array(
            saniga_sidebar_opts([
                'name'          => 'product_single_sidebar_pos',
                'fields_only'   =>  true,
                'default_value' => saniga_configs('blog')['single_sidebar_pos']  
            ]),
            array(
                'id'            => 'product_single_content_col',
                'title'         => esc_html__('Content Columns', 'saniga'),
                'subtitle'      => esc_html__('Choose content Columns', 'saniga'),
                'type'          => 'slider',
                'default'       => saniga_configs('blog')['archive_content_col'],
                'min'           => 1,
                'step'          => 1,
                'max'           => 11,
                'display_value' => 'label',
                'required'      => [ 
                    ['product_page_sidebar_pos', '!=', '0'],
                    ['product_page_sidebar_pos', '!=', 'bottom']
                ],
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
Redux::setSection($opt_name, saniga_footer_opts());

/* API Key /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('API Key', 'saniga'),
    'icon'   => 'el el-key',
    'fields' => array(
        array(
            'id'      => 'gm_api_key',
            'type'    => 'text',
            'title'   => esc_html__('Google Maps', 'saniga'),
            'default' => 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM',
            'desc'    => esc_html__('Register a Google Maps Api key then put it in here.', 'saniga')
        ),
    ),
));

/* Socials 
--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Links', 'saniga'),
    'icon'   => 'el el-share',
    'fields' => array(
        array(
            'id'       => 'social_facebook_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Facebook Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'saniga'),
            'default' => '#',
        ),
         array(
            'id'       => 'social_twitter_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Twitter Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'saniga'),
            'default' => '#',
        ),
         array(
            'id'       => 'social_linkedin_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('LinkedIn Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_linkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_instagram_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Instagram Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_gplus_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Google Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_gplus_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_skype_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Skype Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_pinterest_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Pinterest Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_vimeo_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Vimeo Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_youtube_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Youtube Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_yelp_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Yelp Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_tumblr_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Tumblr Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'saniga'),
            'default' => '#',
        ),
        array(
            'id'       => 'social_tripadvisor_icon',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Tripadvisor Icon', 'saniga'),
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'saniga'),
            'default' => '#',
        ),
    ),
));

// Social list for Social Widget 
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Widget Social', 'saniga'),
    'icon'       => 'el el-share',
    'subsection' => true,
    'fields'     => array(
        saniga_social_list_opts(['param_name' => 'wg_social'])
    )
));