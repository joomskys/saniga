<?php
// remove support post type portfolio
if(!function_exists('saniga_remove_post_type_portfolio')){
	add_filter('cms_extra_post_types','saniga_remove_post_type_portfolio');
	function saniga_remove_post_type_portfolio($post_types){
		$post_types['portfolio'] = array(
			'status' => false
		);
		return $post_types;
	}
}
if(!function_exists('saniga_add_tax_portfolio')){
	add_filter( 'cms_extra_taxonomies', 'saniga_add_tax_portfolio' );
	function saniga_add_tax_portfolio( $taxonomies ) {
		$taxonomies['portfolio-category'] = array(
			'status'     => false,
		);
		return $taxonomies;
	}
}