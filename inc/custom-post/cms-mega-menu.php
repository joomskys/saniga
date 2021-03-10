<?php
// Remove support Mega Menu
if(!function_exists('saniga_enable_megamenu')){
	add_filter( 'cms_enable_megamenu', 'saniga_enable_megamenu' );
	function saniga_enable_megamenu() {
		return false;
	}
}
if(!function_exists('saniga_enable_onepage')){
	add_filter( 'cms_enable_onepage', 'saniga_enable_onepage' );
	function saniga_enable_onepage() {
		return false;
	}
}