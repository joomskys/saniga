<?php
//Message
if(!function_exists('saniga_woocommerce_checkout_coupon_message')){
	add_filter('woocommerce_checkout_coupon_message','saniga_woocommerce_checkout_coupon_message');
	function saniga_woocommerce_checkout_coupon_message(){
		return '<span class="cms-added-to-cart-msg">'.esc_html__( 'Have a coupon?', 'saniga' ) . '</span> <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'saniga' ) . '</a>';
	}
}

// add inner wrap div to order review columns
if(!function_exists('saniga_woocommerce_checkout_order_review_inner_open')){
	add_action('woocommerce_checkout_order_review','saniga_woocommerce_checkout_order_review_inner_open', 0);
	function saniga_woocommerce_checkout_order_review_inner_open(){
		echo '<div class="cms-woocommerce-checkout-review-order-inner p-30 bg-accent">';
	}
}
if(!function_exists('saniga_woocommerce_checkout_order_review_inner_close')){
	add_action('woocommerce_checkout_order_review','saniga_woocommerce_checkout_order_review_inner_close', 999);
	function saniga_woocommerce_checkout_order_review_inner_close(){
		echo '</div>';
	}
}

// add heading to order review columns
if(!function_exists('saniga_woocommerce_checkout_order_review')){
	add_action('woocommerce_checkout_order_review','saniga_woocommerce_checkout_order_review', 1);
	function saniga_woocommerce_checkout_order_review(){ ?>
		<div id="cms-order-review-heading" class="h2 text-white text-uppercase"><?php esc_html_e( 'Your order', 'saniga' ); ?></div>
	<?php }
}

// add div wrap content after order review title
if(!function_exists('saniga_woocommerce_checkout_order_review_inner2_open'))
{
	add_action('woocommerce_checkout_order_review','saniga_woocommerce_checkout_order_review_inner2_open', 2);
	function saniga_woocommerce_checkout_order_review_inner2_open(){
		echo '<div class="cms-woocommerce-checkout-review-order-inner2 cms-radius-8 cms-shadow-1 overflow-hidden bg-white text-body">';
	}
}
if(!function_exists('saniga_woocommerce_checkout_order_review_inner2_close'))
{
	add_action('woocommerce_checkout_order_review','saniga_woocommerce_checkout_order_review_inner2_close', 998);
	function saniga_woocommerce_checkout_order_review_inner2_close(){
		echo '</div>';
	}
}

// custom proceed to paypal button
if(!function_exists('saniga_woocommerce_order_button_html')){
	add_filter('woocommerce_order_button_html', 'saniga_woocommerce_order_button_html');
	function saniga_woocommerce_order_button_html(){
		$order_button_text = apply_filters( 'woocommerce_order_button_text', esc_html__( 'Place order', 'saniga' ) );
		return '<div class="cms-checkout-place-order text-end"><button type="submit" class="button btn-lg btn-accent btn-hover-secondary" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button></div>';
	}
}