<?php
if(!function_exists('saniga_cpt_header_top')){
	add_filter( 'cms_extra_post_types', 'saniga_cpt_header_top' );
	function saniga_cpt_header_top( $postypes ) {
		$postypes['cms-header-top'] = array(
	        'status'     => true,
	        'item_name'  => esc_html__( 'Header Top', 'saniga' ),
	        'items_name' => esc_html__( 'Headers Top', 'saniga' ),
	        'args'       => array(
	            'menu_icon'          => 'dashicons-editor-insertmore',
	            'supports'           => array(
	                'title',
	                'editor',
	                'thumbnail',
	            ),
	            'public'             => true,
	            'publicly_queryable' => true,
	            'exclude_from_search' => true
	        ),
	        'labels'     => array()
	    );
		return $postypes;
	}
}