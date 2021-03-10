<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Saniga
 */

/**
 * Setup default image sizes after the theme has been activated
 */
function saniga_after_setup_theme()
{

}
add_action( 'after_setup_theme', 'saniga_after_setup_theme' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function saniga_body_classes( $classes )
{   
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (saniga_get_opts( 'site_boxed', false )) {
        $classes[] = 'cms-site-boxed';
    }

    if ( class_exists('WPBakeryVisualComposerAbstract') ) {
        $classes[] = 'cms-visual-composer';
    }

    if (class_exists('ReduxFramework')) {
        $classes[] = 'redux-page';
    }
    if (saniga_get_opts( 'sticky_on', false )) {
        $classes[] = 'cms-header-sticky';
    }
    if(saniga_get_opts('footer_fixed', '0') == '1'){
        $classes[] = 'cms-page-footer-fixed';
    }
    $classes[] = 'cms-body-font-'.saniga_get_opts('body_typo','default');
    $classes[] = 'cms-heading-font-'.saniga_get_opts('heading_font_typo','default');
    $classes[] = 'cms-subheading-font-'.saniga_get_opts('sub_heading_default_font','default');
    return $classes;
}
add_filter( 'body_class', 'saniga_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function saniga_posts_classes( $classes )
{
    if(has_post_thumbnail() || saniga_configs('default_post_thumbnail'))
        $classes[] = 'cms-has-post-thumbnail';
    else 
        $classes[] = 'cms-no-post-thumbnail';

    return $classes;
}
add_filter( 'post_class', 'saniga_posts_classes' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function saniga_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'saniga_pingback_header' );
