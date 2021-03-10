<?php
/**
 * Change flags folder path for certain languages.
 *
 * Add the language codes you wish to replace in the list below.
 * Make sure you place your desired flags in a folder called "flags" next to this file.
 * Make sure the file names for the flags  are identical with the ones in the original folder located at 'plugins/translatepress/assets/images/flags/'.
 * If you wish to change the file names, use filter trp_flag_file_name .
 *
 */

add_filter( 'trp_flags_path', 'saniga_trpc_flags_path', 10, 2 );
function saniga_trpc_flags_path( $original_flags_path,  $language_code ){
	// only change the folder path for the following languages:
	$languages_with_custom_flags = array( 'en_US', 'es_ES', 'ar_AR', 'ar' );

	if ( in_array( $language_code, $languages_with_custom_flags ) ) {
		return  get_template_directory_uri() . '/assets/images/language-flags/' ;
	}else{
		return $original_flags_path;
	}
}