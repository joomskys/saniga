<?php
//hide default wishlist button on product archive page
add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );

//hide default wishlist button on product single page
/*add_filter( 'woosw_button_position_single', function() {
    return '0';
} );*/

// add wishlist to product archive page 
if(!function_exists('saniga_woosw_loop_product')){
	add_action('saniga_shop_loop_overlay_content_midde', 'saniga_woosw_loop_product', 9);
	function saniga_woosw_loop_product(){
		if(!class_exists('WPCleverWoosw')) return;
		echo do_shortcode('[woosw type="link"]');
	}
}