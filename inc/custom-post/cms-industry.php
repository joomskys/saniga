<?php
if(!function_exists('saniga_cpt_industry')){
	add_filter( 'cms_extra_post_types', 'saniga_cpt_industry' );
	function saniga_cpt_industry( $postypes ) {
		$industry_slug = saniga_get_opt( 'industry_slug', 'industry' );
		$postypes['cms-industry'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Industry', 'saniga' ),
			'items_name' => esc_html__( 'CMS Industries', 'saniga' ),
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
	                'slug'  => $industry_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('saniga_add_tax_industry')){
	add_filter( 'cms_extra_taxonomies', 'saniga_add_tax_industry' );
	function saniga_add_tax_industry( $taxonomies ) {
		$taxonomies['industry-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-industry' ),
			'taxonomy'   => esc_html__( 'Industry Category', 'saniga' ),
			'taxonomies' => esc_html__( 'Industry Categories', 'saniga' ),
			'args'       => array(),
			'labels'     => array()
		);
		return $taxonomies;
	}
}