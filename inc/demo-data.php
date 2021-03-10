<?php
/* Create Demo Data */
if(!function_exists('saniga_enable_export_mode')){
	add_filter('swa_ie_export_mode', 'saniga_enable_export_mode');
	function saniga_enable_export_mode() {
	    return false;
	}
}