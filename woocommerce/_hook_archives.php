<?php
// remove page title on archive page
add_filter('woocommerce_show_page_title', function(){ return false;});
/**
 * Custom archive notices, catalog order and result count
*/
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// add custom layout for notices
if(!function_exists('saniga_woocommerce_output_all_notices')){
	add_action('woocommerce_before_shop_loop','saniga_woocommerce_output_all_notices', 10);
	add_action('saniga_woocommerce_output_all_notices', 'woocommerce_output_all_notices');
	function saniga_woocommerce_output_all_notices(){
	?>
		<div class="cms-wc-all-notices m-b30"><?php do_action('saniga_woocommerce_output_all_notices'); ?></div>
	<?php
	}
}
// add custom layout for catalog order and result count
if(!function_exists('saniga_woocommerce_catalog_result')){
	add_action('woocommerce_before_shop_loop','saniga_woocommerce_catalog_result', 20);
	add_action('saniga_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('saniga_woocommerce_result_count', 'woocommerce_result_count');
	function saniga_woocommerce_catalog_result(){
	?>
		<div class="row justify-content-between align-items-center gutters-30 gutters-grid">
			<div class="col-md-12 col-lg-auto order-lg-2 m-b30">
				<?php do_action('saniga_woocommerce_catalog_ordering'); ?>
			</div>
			<div class="col m-b30">
				<?php do_action('saniga_woocommerce_result_count'); ?>
			</div>
		</div>
	<?php
	}
}

/**
 * Custom products layout on archive page
 * 
*/
// Loop products columns 
/**
 * Change number of column that are displayed per page (shop page)
 * Return column number
*/
add_filter( 'loop_shop_columns', 'saniga_loop_shop_columns', 20 ); 
function saniga_loop_shop_columns() {
  $columns = saniga_get_opts('products_columns', 3);
  $sidebar_position   = saniga_get_opts('sidebar_pos', 'bottom');
  if(is_active_sidebar('sidebar-shop') && $sidebar_position !== 'bottom') {
  	if(class_exists('WPcleverWoosq') && class_exists('WPcleverWoosw') && class_exists('WPcleverWooscp'))
  		$columns = $columns ; //- 1;
  	else 
  		$columns = $columns ; //- 1;
  } elseif(class_exists('WPcleverWoosq') && class_exists('WPcleverWoosw') && class_exists('WPcleverWooscp') && $sidebar_position !== 'bottom'){
  	$columns = $columns ; //- 1;
  }
  return $columns;
}

/**
 * Change number of products that are displayed per page (shop page)
 * $limit contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 * 
 */
add_filter( 'loop_shop_per_page', 'saniga_loop_shop_per_page', 20 );
function saniga_loop_shop_per_page( $limit ) {
  $limit = saniga_get_opts('product_per_page', 9);
  return $limit;
}

// add div wrap
add_action('woocommerce_before_shop_loop_item', function(){ echo '<div class="cms-overlay-wrap text-center">';}, 0);
add_action('woocommerce_after_shop_loop_item', function(){ echo '</div>';}, 9999);
// remove link on product image
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// add link to product title
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open', 1 );
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close', 9999 );
// wrap product image by div
if(!function_exists('saniga_wrap_products_thumbnail_open')){
	add_action('woocommerce_before_shop_loop_item', 'saniga_wrap_products_thumbnail_open', 1);
	function saniga_wrap_products_thumbnail_open(){
		echo '<div class="cms-products-thumb relative">';
	}
}
if(!function_exists('saniga_wrap_products_thumbnail_close')){
	add_action('woocommerce_before_shop_loop_item', 'saniga_wrap_products_thumbnail_close', 999);
	function saniga_wrap_products_thumbnail_close(){
		echo '</div>';
	}
}
// product thumbnail & sale flash
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item','woocommerce_show_product_loop_sale_flash', 9);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_thumbnail', 10);
// add products overlay content
if(!function_exists('saniga_shop_loop_overlay_content')){
	add_action('woocommerce_before_shop_loop_item', 'saniga_shop_loop_overlay_content', 10);
	function saniga_shop_loop_overlay_content(){
	?>
		<div class="cms-overlay-content cms-overlay-center-to-side d-flex justify-content-center">
			<div class="cms-overlay-content-inner text-white link-white p-tb-40 p-lr-10 d-flex justify-content-center">
				<div class="cms-overlay-content-top empty-none align-self-start"><?php do_action('saniga_shop_loop_overlay_content_top'); ?></div>
				<div class="cms-overlay-content-middle cms-icon-list empty-none align-self-center"><?php do_action('saniga_shop_loop_overlay_content_midde'); ?></div>
				<div class="cms-overlay-content-end empty-none align-self-end"><?php do_action('saniga_shop_loop_overlay_content_end'); ?></div>
			</div>
		</div>
	<?php
	}
}
// Loop Icon add-to-cart
if(!function_exists('saniga_loop_add_to_cart_icon')){
	//add_action('saniga_shop_loop_overlay_content_midde', 'saniga_loop_add_to_cart_icon');
	function saniga_loop_add_to_cart_icon($args=[]){
		global $product;
		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'cms-icon cms-icon-46 brd-3 bdr-solid bdr-white bdr-hover-accent text-white text-hover-accent',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
				'icon' => 'cmsi-shopping-cart'
			);

			$args = apply_filters( 'saniga_woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			echo sprintf(
				'<a href="%s" data-quantity="%s" class="%s" %s><span class="%s"></span></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				$args['icon']
			);
		}
	}
}

// Loop default add to cart button
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('saniga_shop_loop_overlay_content_end', 'woocommerce_template_loop_add_to_cart');

add_filter('woocommerce_loop_add_to_cart_link', 'saniga_woocommerce_loop_add_to_cart_link', 10, 3);
function saniga_woocommerce_loop_add_to_cart_link($button, $product, $args){
	return sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s><span class="cms-btn-content">%s<span class="cms-btn-text">%s</span></span></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		'<span class="cms-btn-icon cms-addtocart-icon"></span>',
		esc_html( $product->add_to_cart_text() )
	);
}

if(!function_exists('saniga_woocommerce_loop_add_to_cart_args')){
	add_filter('woocommerce_loop_add_to_cart_args', 'saniga_woocommerce_loop_add_to_cart_args');
	function saniga_woocommerce_loop_add_to_cart_args($args){
		global $product;
		//$args['class'] = str_replace('button', 'button xxxx', $args['class']);
		$args['class'] = implode(
			' ',
			array_filter(
				array(
					'button btn btn-lg btn-primary btn-hover-white',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
				)
			)
		);
		return $args;
	}
}


// Wrap products infor by div 
if(!function_exists('saniga_loop_product_content_open')){
	add_action('woocommerce_before_shop_loop_item', 'saniga_loop_product_content_open', 1000);
	function saniga_loop_product_content_open(){
		echo '<div class="cms-products-content">';
	}
}
if(!function_exists('saniga_loop_product_content_close')){
	add_action('woocommerce_after_shop_loop_item', 'saniga_loop_product_content_close', 999);
	function saniga_loop_product_content_close(){
		echo '</div>';
	}
}

// Loop product title 
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		echo '<span class="cms-heading text-21">' . get_the_title() . '</span>';
	}
}

// paginate links
add_filter('woocommerce_pagination_args', 'saniga_woocommerce_pagination_args');
function saniga_woocommerce_pagination_args($default){
	$default = array_merge($default, [
		'prev_text' => '<span class="nav-prev-icon"></span>',
		'next_text' => '<span class="nav-next-icon"></span>',
		'type'      => 'plain',
	]);
	return $default;
}