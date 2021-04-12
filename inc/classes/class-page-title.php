<?php
/**
 * Get page title and description.
 *
 * @return array Contains 'title'
 */
function saniga_get_page_titles() {
	$title = '';
	// Default titles
	if ( ! is_archive() ) {
		// Posts page view
		if ( is_home() ) {
			// Only available if posts page is set.
			if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
				$title = get_post_meta( $page_for_posts, 'custom_title', true );
				if ( empty( $title ) ) {
					$title = get_the_title( $page_for_posts );
				}
			}
			if ( is_front_page() ) {
				$title = esc_html__( 'Welcome to', 'saniga' ).' '.get_bloginfo('name');
			}
		} elseif ( is_404() ) {
			$title = esc_html__( '404', 'saniga' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results', 'saniga' );
		} else {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if(is_singular('post') && empty($title)) {
				$title = esc_html__('Blog Post', 'saniga'); 
				// get_the_title(); 
			} elseif ( ! $title ) {
				$title = get_the_title();
			} else {
				$title = get_the_title();
			}
		}
		$sub_title = get_post_meta( get_the_ID(), 'custom_sub_title', true );
	} elseif ( is_author() ) {
		//esc_html__( 'Author:', 'saniga' ) . ' ' .
		$title     = get_the_author();
		$sub_title = saniga_get_opts('custom_sub_title');
	} else {
		$custom_title = saniga_get_opts('custom_title');
		$_title = get_the_archive_title();
		if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
			$_title = esc_html__( 'Our Products', 'saniga' );
		}
		$title = !empty($custom_title) ? $custom_title : $_title;
		$sub_title = saniga_get_opts('custom_sub_title');
	}
	return array(
		'title'     => $title,
		'sub_title' => $sub_title
	);
}