<?php
// Cart Coupon
if(!function_exists('saniga_woocommerce_cart_actions')){
	//add_action('woocommerce_cart_actions','saniga_woocommerce_cart_actions', 0);
	function saniga_woocommerce_cart_actions(){
	?>
		<div class="p-tb-20 p-lr-30 row justify-content-between gutters-30 gutters-grid">
			<?php if ( wc_coupons_enabled() ) { ?>
				<div class="coupon col-12 col-md-auto">
					<div class="row gutters-10 gutters-grid">
						<div class="col">
							<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'saniga' ); ?>" />
						</div>
						<div class="col-12 col-sm-auto">
							<button type="submit" class="button btn-xlg w-100 btn-primary btn-hover-secondary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'saniga' ); ?>"><?php esc_html_e( 'Apply coupon', 'saniga' ); ?></button>
						</div>
						<div class="col-12 empty-none"><?php do_action( 'woocommerce_cart_coupon' ); ?></div>
					</div>
				</div>
			<?php } ?>
			<div class="col-12 col-xl-auto">
				<div class="row gutters-10 gutters-grid justify-content-end">
					<div class="col-12 col-sm-auto">
						<button type="submit" class="button btn-xlg w-100 btn-accent" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'saniga' ); ?>"><?php esc_html_e( 'Update cart', 'saniga' ); ?></button>
					</div>
					<div class="col-12 col-sm-auto">
						<a class="btn btn-xlg w-100 cms-continue-shop text-center btn-primary" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<?php esc_html_e( 'Continue Shopping', 'saniga' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

// Continue Shopping Button
if(!function_exists('saniga_woocommerce_return_to_shop')){
	//add_action('woocommerce_cart_actions', 'saniga_woocommerce_return_to_shop', 2);
	function saniga_woocommerce_return_to_shop(){ ?>
		<div class="text-end pt-10">
			<a class="btn cms-continue-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php esc_html_e( 'Continue Shopping', 'saniga' ); ?>
			</a>
		</div>
	<?php
	}
}

if ( ! function_exists( 'woocommerce_button_proceed_to_checkout' ) ) {
	/**
	 * Output the proceed to checkout button.
	 */
	function woocommerce_button_proceed_to_checkout() {
		?>
		<div class="text-end pt-10">
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button btn btn-accent btn-xlg">
				<?php esc_html_e( 'Proceed to checkout', 'saniga' ); ?>
			</a>
		</div>
		<?php
	}
}