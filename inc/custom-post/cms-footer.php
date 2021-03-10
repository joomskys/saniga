<?php
if(!function_exists('saniga_cpt_footer')){
	add_filter( 'cms_extra_post_types', 'saniga_cpt_footer' );
	function saniga_cpt_footer( $postypes ) {
		$postypes['cms-footer'] = array(
	        'status'     => true,
	        'item_name'  => esc_html__( 'Footers', 'saniga' ),
	        'items_name' => esc_html__( 'Footers', 'saniga' ),
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