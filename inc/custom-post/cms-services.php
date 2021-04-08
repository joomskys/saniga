<?php
if(!function_exists('saniga_cpt_service')){
	add_filter( 'cms_extra_post_types', 'saniga_cpt_service' );
	function saniga_cpt_service( $postypes ) {
		$service_slug = saniga_get_opt( 'service_slug', 'services' );
		$postypes['cms-service'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Service', 'saniga' ),
			'items_name' => esc_html__( 'CMS Services', 'saniga' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-hammer',
				'supports'           => array(
					'title',
					'thumbnail',
					'editor', 
					'excerpt',
					'page-attributes'
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'            => array(
	                'slug'  => $service_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('saniga_add_tax_service')){
	add_filter( 'cms_extra_taxonomies', 'saniga_add_tax_service' );
	function saniga_add_tax_service( $taxonomies ) {
		$taxonomies['service-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-service' ),
			'taxonomy'   => esc_html__( 'Service Category', 'saniga' ),
			'taxonomies' => esc_html__( 'Service Categories', 'saniga' ),
			'args'       => array(),
			'labels'     => array()
		);
		return $taxonomies;
	}
}