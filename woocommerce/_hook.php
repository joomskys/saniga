<?php
// Sale Flash
if(!function_exists('saniga_woocommerce_sale_flash')){
	add_filter('woocommerce_sale_flash', 'saniga_woocommerce_sale_flash');
	function saniga_woocommerce_sale_flash(){
		global $post, $product;
		$classes = ['cms-onsale'];
		if(is_singular('product')) {
			$classes[] = 'single';
		} else {
			$classes[] = 'loop';
		}
		if ( $product->is_on_sale() ) : 
			echo '<span class="'.trim(implode(' ', $classes)).'">' . esc_html__( 'Sale', 'saniga' ) . '</span>';
		endif;
	}
}

// Share
if(!function_exists('saniga_woocommerce_template_single_sharing')){
	add_action('woocommerce_share', 'saniga_woocommerce_template_single_sharing');
	function saniga_woocommerce_template_single_sharing(){
		saniga_socials_share_default([
			'show_share'   => saniga_get_opts( 'post_social_share_on', '0' ),
			'class'		   => 'mt-30',	
			'title'        => '',
			'social_class' => 'cms-socials cms-social-layout-6 bg-colored'
		]);
	}
}
