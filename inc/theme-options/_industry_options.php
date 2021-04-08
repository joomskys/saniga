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
add_action( 'cms_post_metabox_register', 'saniga_industry_options_register' );

function saniga_industry_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'cms-industry' ) ) {
		$metabox->set_args( 'cms-industry', array(
			'opt_name'     => 'cms_industry_option',
			'display_name' => esc_html__( 'Industry Settings', 'saniga' ),
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config industry meta options
	 *
	 */
	//Icon
	$metabox->add_section( 'cms-industry', array(
		'title'      => esc_html__( 'Icon', 'saniga' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_service_icon',
				'type'     => 'cms_iconpicker',
				'title'    => esc_html__( 'Choose your icon', 'saniga' ),
				'subtitle' => esc_html__( 'This icon will use in shortcode', 'saniga' )
			),
			array(
				'id'       => 'cms_service_icon_img',
				'type'     => 'media',
				'title'    => esc_html__( 'Choose your icon image', 'saniga' ),
				'subtitle' => esc_html__( 'This icon will use in shortcode', 'saniga' )
			),
			array(
				'id'       => 'cms_saleoff',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter sale off value', 'saniga' ),
				'subtitle' => ''
			)
		)
	));
	// Page title
	$metabox->add_section( 'cms-industry', saniga_page_title_opts(['default' => true, 'default_value' => '0']));
}