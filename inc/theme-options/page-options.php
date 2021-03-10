<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CMS_Post_Metabox $metabox
 */

add_action( 'cms_post_metabox_register', 'saniga_page_options_register' );
function saniga_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => saniga_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'saniga' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config page meta options
	 *
	 */
	// Header Top
	$metabox->add_section('page', saniga_header_top_opts(['default' => true, 'default_value' => '-1']));
	// Main Header
	$metabox->add_section( 'page',  saniga_header_opts([
			'default'         => true,
			'default_value'   => '-1',
			'container_width' => '-1'
		])
	);
	// Ontop Header
	$metabox->add_section( 'page', saniga_header_ontop_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Sticky Header
	$metabox->add_section( 'page', saniga_header_sticky_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Navigation
	$metabox->add_section('page', saniga_navigation_opts(['default' => true]));
	// Secondary Menu
	$metabox->add_section('page', saniga_header_secondary_menu_opts(['default' => true]));
	// Attribute:  search, cart, ...
	$metabox->add_section('page', saniga_header_atts_opts(['default' => true]));
	// Page title
	$metabox->add_section( 'page', saniga_page_title_opts(['default' => true, 'default_value' => '-1']));
	// Sidebar
	$metabox->add_section('page', saniga_page_layout_opts(['default' => true, 'subsection' => false]));
	// Footer 
	$metabox->add_section('page', saniga_footer_opts(['default' => true, 'default_value'=>'-1', 'subsection' => false]));
}

function saniga_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( saniga_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}