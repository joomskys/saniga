<?php
/**
 * Build Single Product Gallery and Summary layout 
 *
*/
if(!function_exists('saniga_woocommerce_before_single_product_summary')){
	add_action('woocommerce_before_single_product_summary','saniga_woocommerce_before_single_product_summary', 0);
	function saniga_woocommerce_before_single_product_summary(){
		$classes = ['cms-wc-img-summary cms-single-product-gallery-summary-wraps row gutters-50', saniga_get_opts('saniga_product_gallery_layout', saniga_configs('saniga_product_gallery_layout'))];
		$class = saniga_get_opts('saniga_product_gallery_thumb_position', saniga_configs('saniga_product_gallery_thumb_position'));
		echo '<div class="'.trim(implode(' ', $classes)).'">';
			echo '<div class="cms-single-product-gallery-wraps col-lg-6 thumbnail-'.esc_attr($class).'"><div class="cms-single-product-gallery-wraps-inner relative pr-xl-20">';
				do_action('saniga_before_single_product_gallery');
				do_action('saniga_single_product_gallery');
				do_action('saniga_adter_single_product_gallery');
			
	}
}
// close gallery column  and open summary column
if(!function_exists('saniga_woocommerce_single_gallery_close')){
	add_action('woocommerce_before_single_product_summary', 'saniga_woocommerce_single_gallery_close', 999);
	function saniga_woocommerce_single_gallery_close(){
		echo '</div></div>';
			echo '<div class="cms-single-product-summary-wrap col-lg-6">';
	}
}

// close summary columns and close galery-sumary row
if(!function_exists('saniga_woocommerce_after_single_product_summary')){
	add_action('woocommerce_after_single_product_summary', 'saniga_woocommerce_after_single_product_summary', 0);
	function saniga_woocommerce_after_single_product_summary(){
			echo '</div>';
		echo '</div>';
	}
}
// Remove default sale flash and gallery 
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
// Get back sale flash and galley 
add_action('saniga_before_single_product_gallery', 'woocommerce_show_product_sale_flash', 1);
add_action('saniga_single_product_gallery', 'woocommerce_show_product_images', 1);

/**
 * Add Custom CSS class to Gallery
*/
add_filter('woocommerce_single_product_image_gallery_classes','saniga_woocommerce_single_product_image_gallery_classes');
function saniga_woocommerce_single_product_image_gallery_classes($class){
	$class[] = 'cms-product-gallery-'.saniga_get_opts('saniga_product_gallery_layout', saniga_configs('saniga_product_gallery_layout'));
	$class[] = 'cms-product-gallery-'.saniga_get_opts('saniga_product_gallery_thumb_position', saniga_configs('saniga_product_gallery_thumb_position'));
	unset($class[3]);
	return $class;
}

/**
 * Single Product 
 *
 * Gallery style with thumbnail carousel in bottom
 *
*/
if(!function_exists('saniga_wc_single_product_gallery_layout')){
	add_filter('woocommerce_single_product_carousel_options', 'saniga_wc_single_product_gallery_layout' );
    function saniga_wc_single_product_gallery_layout($options){
        $gallery_layout = saniga_get_opts('saniga_product_gallery_layout', saniga_configs('saniga_product_gallery_layout'));

        $options['prevText']     = '<span class="flex-prev-icon"></span>';
		$options['nextText']     = '<span class="flex-next-icon"></span>';

        switch ($gallery_layout) {
	        case 'vertical':
				$options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    
	        case 'horizontal':
	            $options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    }
	    return $options;
    }
}

/**
 * Single Product Gallery
 *
 * Add thumbnail product gallery 
 *
*/
if(!function_exists('saniga_product_gallery_thumbnail_sync')){
	add_action('saniga_single_product_gallery', 'saniga_product_gallery_thumbnail_sync', 2);
	function saniga_product_gallery_thumbnail_sync($args=[]){
		global $product;
		$gallery_layout = saniga_get_opts('saniga_product_gallery_layout', saniga_configs('saniga_product_gallery_layout'));
		$product_gallery_thumb_position = saniga_get_opts('saniga_product_gallery_thumb_position', saniga_configs('saniga_product_gallery_thumb_position'));
        $args = wp_parse_args($args, [
            'gallery_layout' => $gallery_layout
        ]);
        $post_thumbnail_id = $product->get_image_id();
    	$attachment_ids = array_merge( (array)$post_thumbnail_id , $product->get_gallery_image_ids() );

        if('simple' === $args['gallery_layout'] || '' === $args['gallery_layout'] || 'default' === $args['gallery_layout'] || empty($attachment_ids[0])) return;
        $flex_class = '';

        $thumb_v_w = saniga_configs('saniga_product_gallery_thumbnail_v_w');
        $thumb_v_h = saniga_configs('saniga_product_gallery_thumbnail_v_h');

        $thumb_h_w = saniga_configs('saniga_product_gallery_thumbnail_h_w');
        $thumb_h_h = saniga_configs('saniga_product_gallery_thumbnail_h_h');

        switch ($args['gallery_layout']) {
	        case 'vertical':
				$thumbnail_size = $thumb_v_w.'x'.$thumb_v_h;
				$thumb_w        = $thumb_v_w;
				$thumb_h        = $thumb_v_h;
				$flex_class     = 'flex-vertical';
				$thumb_margin   = saniga_configs('saniga_product_gallery_thumbnail_space_vertical');
	            break;
	    
	        case 'horizontal':
	            $thumbnail_size = $thumb_h_w.'x'.$thumb_h_h;
	            $thumb_w = $thumb_h_w;
	            $thumb_h = $thumb_h_h;
	            $flex_class = 'flex-horizontal';
	            $thumb_margin   = saniga_configs('saniga_product_gallery_thumbnail_space_horizontal');
	            break;

	    }
	    $gallery_css_class = ['wc-gallery-sync', 'thumbnail-'.$gallery_layout, 'thumbnail-pos-'.$product_gallery_thumb_position];
    ?>
    	<div class="<?php echo trim(implode(' ', $gallery_css_class));?>" data-thumb-w="<?php echo esc_attr($thumb_w);?>" data-thumb-h="<?php echo esc_attr($thumb_h);?>" data-thumb-margin="<?php echo esc_attr($thumb_margin); ?>">
			<div class="wc-gallery-sync-slides flexslider <?php echo esc_attr($flex_class);?>">
	            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
	                <div class="wc-gallery-sync-slide flex-control-thumb"><?php saniga_image_by_size(['id' => $attachment_id, 'size' => $thumbnail_size]);?></div>
	            <?php } ?>
	        </div>
	    </div>
    <?php
	}
}

// single product title
if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
	/**
	 * Output the product title.
	 */
	function woocommerce_template_single_title() {
		the_title('<div class="cms-heading text-29">', '</div>');
	}
}
// move rating to after price
//remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
//add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 11);

// change rating html
if ( ! function_exists( 'woocommerce_template_single_rating' ) ) {

	/**
	 * Output the product rating.
	 */
	function woocommerce_template_single_rating() {
		global $product;

		if ( ! wc_review_ratings_enabled() ) { 
			return;
		}

		$rating_count = $product->get_rating_count();
		$review_count = $product->get_review_count();
		$average      = $product->get_average_rating();

		//if ( $rating_count > 0 ) : ?>

			<div class="woocommerce-product-rating">
				<?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
				<?php if ( comments_open() ) : ?>
					<?php //phpcs:disable ?>
					<a href="#reviews" class="woocommerce-review-link cms-scroll" rel="nofollow"><?php printf( _n( '%s Review', '%s Reviews', $review_count, 'saniga' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?> / <?php esc_html_e('Add Review','saniga');?></a>
					<?php // phpcs:enable ?>
				<?php endif ?>
			</div>

		<?php //endif; 
	}
}

// single price 
add_filter('woocommerce_product_price_class', function(){
	return 'text-22 text-secondary font-700 mb-20';
});
// Wrap add-to-cart and some other button
add_action('woocommerce_single_product_summary', function(){ echo '<div class="cms-single-product-btns d-flex align-items-end">';}, 29);
add_action('woocommerce_single_product_summary', function(){ echo '</div>';}, 39);

// remove tab content title 
add_filter('woocommerce_product_description_heading', '__return_false');
add_filter('woocommerce_product_additional_information_heading', '__return_false');

// Change  added to cart message
if(!function_exists('saniga_wc_add_to_cart_message_html')){
	add_filter('wc_add_to_cart_message_html', 'saniga_wc_add_to_cart_message_html', 10, 3);
	function saniga_wc_add_to_cart_message_html($message, $products, $show_qty){
		$titles = array();
		$count  = 0;

		if ( ! is_array( $products ) ) {
			$products = array( $products => 1 );
			$show_qty = false;
		}

		if ( ! $show_qty ) {
			$products = array_fill_keys( array_keys( $products ), 1 );
		}

		foreach ( $products as $product_id => $qty ) {
			/* translators: %s: product name */
			$titles[] = apply_filters( 'woocommerce_add_to_cart_qty_html', ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ), $product_id ) . apply_filters( 'woocommerce_add_to_cart_item_name_in_quotes', sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'saniga' ), strip_tags( get_the_title( $product_id ) ) ), $product_id );
			$count   += $qty;
		}

		$titles = array_filter( $titles );
		/* translators: %s: product name */
		$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'saniga' ), wc_format_list_of_items( $titles ) );

		// Output success messages.
		if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
			$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
			$message   = sprintf( '<span class="cms-added-to-cart-msg">%s</span> <a href="%s" tabindex="1" class="btn btn-accent btn-lg">%s</a>', esc_html( $added_text ), esc_url( $return_to ), esc_html__( 'Continue shopping', 'saniga' ) );
		} else {
			$message = sprintf( '<span class="cms-added-to-cart-msg">%s</span> <a href="%s" tabindex="1" class="btn btn-accent btn-lg">%s</a>',esc_html( $added_text ), esc_url( wc_get_cart_url() ), esc_html__( 'View cart', 'saniga' ) );
		}
		return $message;
	}
}