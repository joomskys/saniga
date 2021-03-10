<?php
/**
 * removing default submit tag
 */
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/**
 * adding action with function which handles our button markup
 */
add_action('wpcf7_init', 'saniga_cf7_submit_button');
/**
 * adding out submit button tag
 */
if (!function_exists('saniga_cf7_submit_button')) {
	function saniga_cf7_submit_button() {
		wpcf7_add_form_tag('submit', 'saniga_cf7_submit_button_handler');
	}
}
/**
 * out button markup inside handler
 */
if (!function_exists('saniga_cf7_submit_button_handler')) {
	function saniga_cf7_submit_button_handler($tag) {
		$tag              = new WPCF7_FormTag($tag);
		$class            = wpcf7_form_controls_class($tag->type);
		$atts             = array();
		$atts['class']    = $tag->get_class_option($class);
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value            = isset($tag->values[0]) ? $tag->values[0] : '';
		if (empty($value)) {
			$value = esc_html__('Send', 'saniga');
		}
		$atts['type'] = 'submit';
		$atts['icon'] = saniga_cf7_get_icon($tag->options);
		$icon = '';
		if(isset($atts['icon']) && $atts['icon'] != '') $icon = '<span class="wpcf7-submit-icon cms-btn-icon '.$atts['icon'].'"></span>';

		$atts['icon_position'] = saniga_cf7_get_icon_position($tag->options);
		$icon_before = $icon_after = '';
		if(isset($atts['icon_position']) && $atts['icon_position'] === 'before'){
			$icon_before = $icon;
		} else{
			$icon_after = $icon;
		}
		unset($atts['icon']);
		unset($atts['icon_position']);
		$atts = wpcf7_format_atts($atts);	
		
		$html = sprintf('<button %1$s><span class="cms-btn-content">%2$s<span class="cms-btn-text">%3$s</span>%4$s</span></button>', $atts, $icon_before, $value, $icon_after);
		return $html;
	}
}

if(!function_exists('saniga_cf7_get_icon')){
	function saniga_cf7_get_icon($data, $default=''){
		if ( is_string( $default ) ) {
			$default = explode( ' ', $default );
		}
		$options = array_merge(
			(array) $default,
			(array) saniga_cf7_get_atts( $data, 'icon', 'icon' ) );

		$options = array_filter( array_unique( $options ) );

		return implode( ' ', $options );
	}
}

if(!function_exists('saniga_cf7_get_icon_position')){
	function saniga_cf7_get_icon_position($data, $default=''){
		if ( is_string( $default ) ) {
			$default = explode( ' ', $default );
		}
		$options = array_merge(
			(array) $default,
			(array) saniga_cf7_get_atts( $data, 'icon_position', 'icon_position' ) );

		$options = array_filter( array_unique( $options ) );

		return implode( ' ', $options );
	}
}

function saniga_cf7_get_atts( $data, $opt, $pattern = '', $single = false ) {
	$preset_patterns = array(
		'date'          => '([0-9]{4}-[0-9]{2}-[0-9]{2}|today(.*))',
		'int'           => '[0-9]+',
		'signed_int'    => '-?[0-9]+',
		'class'         => '[-0-9a-zA-Z_]+',
		'icon'          => '[-0-9a-zA-Z_]+',
		'icon_position' => '[-0-9a-zA-Z_]+',
		'id'            => '[-0-9a-zA-Z_]+',
	);

	if ( isset( $preset_patterns[$pattern] ) ) {
		$pattern = $preset_patterns[$pattern];
	}

	if ( '' == $pattern ) {
		$pattern = '.+';
	}

	$pattern = sprintf( '/^%s:%s$/i', preg_quote( $opt, '/' ), $pattern );

	if ( $single ) {
		$matches = saniga_cf7_get_first_match_option( $data, $pattern );

		if ( ! $matches ) {
			return false;
		}

		return substr( $matches[0], strlen( $opt ) + 1 );
	} else {
		$matches_a = saniga_cf7_get_all_match_options( $data, $pattern );

		if ( ! $matches_a ) {
			return false;
		}

		$results = array();

		foreach ( $matches_a as $matches ) {
			$results[] = substr( $matches[0], strlen( $opt ) + 1 );
		}

		return $results;
	}
}
function saniga_cf7_get_first_match_option( $options, $pattern ) {
	foreach( (array) $options as $option ) {
		if ( preg_match( $pattern, $option, $matches ) ) {
			return $matches;
		}
	}

	return false;
}
function saniga_cf7_get_all_match_options( $options, $pattern ) {
		$result = array();

		foreach( (array) $options as $option ) {
			if ( preg_match( $pattern, $option, $matches ) ) {
				$result[] = $matches;
			}
		}

		return $result;
	}