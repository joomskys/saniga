<?php
/**
 * Header Top
*/
if(!function_exists('saniga_header_top_opts')){
	function saniga_header_top_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '0',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$header_top_layout_default = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$header_top_layout_default = '';
		}
		$opts = [
			'title'      => esc_html__('Header Top', 'saniga'),
		    'icon'       => 'el el-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'id'          => 'header_top_layout',
                    'type'        => 'image_select',
                    'title'       => esc_html__('Layout', 'saniga'),
                    'subtitle'    => esc_html__('Select a layout for upper header top area.', 'saniga'),
                    'desc'        => sprintf(esc_html__('%sClick Here%s to add your custom Header Top layout first.','saniga'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=cms-header-top' ) ) . '" target="_blank">','</a>'),
                    'placeholder' => esc_html__('Default','saniga'),
                    'options'     => saniga_list_post_thumbnail('cms-header-top', $args['default']),
                    'default'     => $header_top_layout_default,
                )
		    )
		];
		return $opts;
	}
}

/**
 * Header 
**/
if(!function_exists('saniga_header_opts')){
	function saniga_header_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => '1',
			'container_width' => 'container'
		]);
		$opt_default = [
			'-1' => get_template_directory_uri() . '/assets/images/default-opt/default.jpg',
			'0'    => get_template_directory_uri() . '/assets/images/default-opt/none.jpg',
		];
		$opt_list = [
			'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.png',
			'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.png',
			'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.png',
		];
		$header_container_width_default = [
			'-1'    => esc_html__('Theme Default', 'saniga')
		];
		$header_container_width_list = [
			'container'      => esc_html__('Default', 'saniga'),
			'container-wide' => esc_html__('Wide', 'saniga'),
			'container-full' => esc_html__('Full', 'saniga'),
		];
		if($args['default']){
			$opt_lists = $opt_default +  $opt_list;
			$header_container_width_opts = $header_container_width_default + $header_container_width_list;
		} else {
			$opt_lists = $opt_list;
			$header_container_width_opts = $header_container_width_list;
		}

		$opts = array(
		    'title'  => esc_html__('Header', 'saniga'),
		    'icon'   => 'el-icon-website',
		    'fields' => array(
		        array(
		            'id'       => 'header_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'saniga'),
		            'subtitle' => esc_html__('Select a layout for header.', 'saniga'),
		            'options'  => $opt_lists,
		            'default'  => $args['default_value']
		        ),
		        array(
		            'id'       => 'header_layout_width',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Header Container Width', 'saniga'),
		            'subtitle' => esc_html__('Choose your header container width', 'saniga'),
		            'options'  => $header_container_width_opts,
		            'default'  => $args['container_width']
		        ),
		        array(
		            'id'       => 'header_height',
		            'type'     => 'dimensions',
		            'title'    => esc_html__('Header Height', 'saniga'),
		            'subtitle' => esc_html__('Enter Height for header. Leave blank to use default', 'saniga'),
		            'width'    => false,
		            'unit'     => 'px'
		        ),
		    )
		);
		return $opts;
	}
}
if(!function_exists('saniga_header_logo_opts')){
	function saniga_header_logo_opts($args = []){
		$args = wp_parse_args($args, [
			'subsection'    => true
		]);
		return array(
		    'title'      => esc_html__('Logo', 'saniga'),
		    'icon'       => 'el el-picture',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'logo',
		            'type'     => 'media',
		            'title'    => esc_html__('Main Logo', 'saniga'),
		            'default' => array()
		        ),
		        array(
		            'id'       => 'logo_ontop',
		            'type'     => 'media',
		            'title'    => esc_html__('Ontop Logo', 'saniga'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_sticky',
		            'type'     => 'media',
		            'title'    => esc_html__('Stick Logo', 'saniga'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_mobile',
		            'type'     => 'media',
		            'title'    => esc_html__('Tablet & Mobile Logo', 'saniga'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_size',
		            'type'     => 'dimensions',
		            'title'    => esc_html__('Logo Size', 'saniga'),
		            'subtitle' => esc_html__('Enter dimensions for your logo, just in case the logo is too large. Leave blank to use default size from theme', 'saniga'),
		            'unit'     => 'px'
		        ),
		        array(
		            'id'       => 'logo_size_sm',
		            'type'     => 'dimensions',
		            'title'    => esc_html__('Enter dimensions for your logo on Tablet & Mobile', 'saniga'),
		            'unit'     => 'px'
		        ),
		    )
		);
	}
}
/**
 * Header OnTop (Transparent)
**/
if(!function_exists('saniga_header_ontop_opts')){
	function saniga_header_ontop_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header OnTop (Transparent)', 'saniga'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'header_ontop',
		            'title'    => esc_html__('OnTop Header', 'saniga'),
		            'subtitle' => esc_html__('Header will be overlay on next content when applicable.', 'saniga'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        )
		    )
		);
	}
}
/**
 * Header Sticky
**/
if(!function_exists('saniga_header_sticky_opts')){
	function saniga_header_sticky_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header Sticky', 'saniga'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'sticky_on',
		            'title'    => esc_html__('Sticky Header', 'saniga'),
		            'subtitle' => esc_html__('Header will be sticked when applicable.', 'saniga'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'       => 'header_sticky_bg',
					'type'     => 'background',
					'title'    => esc_html__('Background', 'saniga'),
					'output'   => array('#cms-header.is-sticky.header-sticky'),
					'required' => array( 0 => 'sticky_on', 1 => 'equals', 2 => '1' ),
					'force_output' => true
		        ),
		    )
		);
	}
}

/**
 * Header Navigation 
**/
if(!function_exists('saniga_navigation_opts')){
	function saniga_navigation_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1'
		]);
		if($args['default']){
			$menus = ['-1' => esc_html__('Theme Options','saniga')] + saniga_get_nav_menu();
			$default_menu  = '-1';
		} else {
			$menus = saniga_get_nav_menu();
			$default_menu  = '0';
		}
		$opts = array(
		    'title'      => esc_html__('Navigation', 'saniga'),
		    'icon'       => 'el el-lines',
		    'subsection' => true,
		    'fields'     => array(
		    	array(
					'title'       => esc_html__('Choose Menu', 'saniga'),
					'subtitle'    => esc_html__('Choose your menu', 'saniga'),
					'placeholder' => esc_html__('Choose your menu', 'saniga'),
					'id'          => 'primary_menu',
					'type'        => 'select',
					'options'     => $menus,
					'default'     => $default_menu,
					//'required'    => array( 0 => 'show_secondary_menu', 1 => 'equals', 2 => '1' ),
                ),
		        array(
					'title'  => esc_html__('Main Menu', 'saniga'),
					'type'   => 'section',
					'id'     => 'main_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'main_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'saniga'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Ontop Menu', 'saniga'),
					'type'   => 'section',
					'id'     => 'ontop_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'ontop_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'saniga'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Sticky Menu', 'saniga'),
					'type'   => 'section',
					'id'     => 'sticky_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'sticky_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'saniga'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        )
		    )
		);
		return $opts;
	}
}
/**
 * Header Secondary Menu 
**/
if(!function_exists('saniga_header_secondary_menu_opts')){
	function saniga_header_secondary_menu_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '-1';
			$menus = ['-1' => esc_html__('Theme Options','saniga')] + saniga_get_nav_menu();
			$default_menu  = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '0';
			$menus = saniga_get_nav_menu();
			$default_menu  = '';
		}
		// Return
		return array(
		    'title'      => esc_html__('Header Secondary Menu', 'saniga'),
		    'icon'       => 'el el-lines',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'title'    => esc_html__('Show Secondary Menu', 'saniga'),
                    'subtitle' => esc_html__('Show/Hide Secondary Menu', 'saniga'),
                    'id'       => 'show_secondary_menu',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                array(
					'title'       => esc_html__('Secondary Menu Title', 'saniga'),
					'subtitle'    => esc_html__('Enter your secondary menu title', 'saniga'),
					'placeholder' => esc_html__('Leave blank to use default', 'saniga'),
					'id'          => 'secondary_menu_title',
					'type'        => 'text',
					'default'     => '',
					'required'    => array( 0 => 'show_secondary_menu', 1 => 'equals', 2 => '1' ),
                ),
                array(
					'title'       => esc_html__('Choose Secondary Menu', 'saniga'),
					'subtitle'    => esc_html__('Choose your menu', 'saniga'),
					'placeholder' => esc_html__('Choose your menu', 'saniga'),
					'id'          => 'secondary_menu',
					'type'        => 'select',
					'options'     => $menus,
					'default'     => $default_menu,
					'required'    => array( 0 => 'show_secondary_menu', 1 => 'equals', 2 => '1' ),
                ),

		    )
		);
	}
}

/**
 * Header Attribute
*/
if(!function_exists('saniga_header_atts_opts')){
	function saniga_header_atts_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '-1';

			$h_btn_link_type = [
				'-1' => esc_html__('Default','saniga'),
                'page'  => esc_html__('Page','saniga'),
                'custom'  => esc_html__('Custom','saniga'),
			];
			$h_btn_link_type_value = '-1';

			$h_btn_target = [
				'-1' => esc_html__('Default','saniga'),
                '_self'  => esc_html__('Self', 'saniga'),
		        '_blank'  => esc_html__('Blank', 'saniga')
			];
			$h_btn_target_value = '-1';

			$language_opts = [
				'-1'    => esc_html__('Default','saniga'),
				'0'     => esc_html__('Disable','saniga'),
				'all'   => esc_html__('All Screen', 'saniga'),
				'small d-xl-none' => esc_html__('Small Screen (=< 1200)','saniga')
			];
			$default_language_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$default_value = '0';

			$h_btn_link_type = [
                'page'  => esc_html__('Page', 'saniga'),
		        'custom'  => esc_html__('Custom', 'saniga')
			];
			$h_btn_link_type_value = 'page';

			$h_btn_target = [
                '_self'  => esc_html__('Self', 'saniga'),
		        '_blank'  => esc_html__('Blank', 'saniga')
			];
			$h_btn_target_value = '_self';

			$language_opts = [
				'0'     => esc_html__('Disable','saniga'),
				'all'   => esc_html__('All Screen', 'saniga'),
				'small d-xl-none' => esc_html__('Small Screen (=< 1200)','saniga')
			];
			$default_language_value = '0';
		}
		// Return
		return array(
		    'title'      => esc_html__('Header Attribute', 'saniga'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'title'    => esc_html__('Show Search', 'saniga'),
                    'subtitle' => esc_html__('Show/Hide search icon', 'saniga'),
                    'id'       => 'search_on',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                saniga_woo_header_cart_opts([
                	'options' => $options,
                	'default' => $default_value	
                ]),
                saniga_header_language_switcher_opts([
                	'options' => $language_opts,
                	'default' => $default_language_value	
                ]),
                array(
					'title'  => esc_html__('Hidden Sidebar', 'saniga'),
					'type'   => 'section',
					'id'     => 'hidden_sidebar',
					'indent' => true
		        ),
		        array(
		            'id'       => 'hidden_sidebar_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Hidden Sidebar', 'saniga'),
		            'desc'	   => esc_html__('When it is YES, you need add widget to Hidden Sidebar','saniga'),	
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'title'  => esc_html__('Button Navigation 01', 'saniga'),
					'type'   => 'section',
					'id'     => 'button_navigation_01',
					'indent' => true,
		        ),
		        array(
		            'id'       => 'h_btn_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Button', 'saniga'),
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'           => 'h_btn_text',
					'type'         => 'text',
					'title'        => esc_html__('Button Text', 'saniga'),
					'default'      => '',
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'h_btn_link_type',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Link Type', 'saniga'),
		            'options'  => $h_btn_link_type,
					'default'      => $h_btn_link_type_value,
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'    => 'h_btn_link',
		            'type'  => 'select',
		            'title' => esc_html__( 'Page Link', 'saniga' ), 
		            'data'  => 'page',
		            'args'  => array(
		                'post_type'      => 'page',
		                'posts_per_page' => -1,
		                'orderby'        => 'title',
		                'order'          => 'ASC',
		            ),
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
		        ),
		        array(
		            'id' => 'h_btn_link_custom',
		            'type' => 'text',
		            'title' => esc_html__('Custom Link', 'saniga'),
		            'default' => '',
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
		        ),
		        array(
		            'id'       => 'h_btn_target',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Target', 'saniga'),
		            'options'  => $h_btn_target,
		            'default'  => $h_btn_target_value,
		            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'title'  => esc_html__('Button Navigation 02', 'saniga'),
					'type'   => 'section',
					'id'     => 'button_navigation_02',
					'indent' => true,
		        ),
		        array(
		            'id'       => 'h_btn_on2',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Button', 'saniga'),
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'           => 'h_btn_text2',
					'type'         => 'text',
					'title'        => esc_html__('Button Text', 'saniga'),
					'default'      => '',
					'required'     => array( 0 => 'h_btn_on2', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'h_btn_link_type2',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Link Type', 'saniga'),
		            'options'  => $h_btn_link_type,
					'default'      => $h_btn_link_type_value,
					'required'     => array( 0 => 'h_btn_on2', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'    => 'h_btn_link2',
		            'type'  => 'select',
		            'title' => esc_html__( 'Page Link', 'saniga' ), 
		            'data'  => 'page',
		            'args'  => array(
		                'post_type'      => 'page',
		                'posts_per_page' => -1,
		                'orderby'        => 'title',
		                'order'          => 'ASC',
		            ),
		            'required' => array( 0 => 'h_btn_link_type2', 1 => 'equals', 2 => 'page' ),
		        ),
		        array(
		            'id' => 'h_btn_link_custom2',
		            'type' => 'text',
		            'title' => esc_html__('Custom Link', 'saniga'),
		            'default' => '',
		            'required' => array( 0 => 'h_btn_link_type2', 1 => 'equals', 2 => 'custom' ),
		        ),
		        array(
		            'id'       => 'h_btn_target2',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Target', 'saniga'),
		            'options'  => $h_btn_target,
		            'default'  => $h_btn_target_value,
		            'required' => array( 0 => 'h_btn_on2', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'title'  => esc_html__('Hotline', 'saniga'),
					'type'   => 'section',
					'id'     => 'button_navigation_hotline',
					'indent' => true,
		        ),
		        array(
		            'id'       => 'h_hotline_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Hotline', 'saniga'),
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'           => 'h_hotline_text',
					'type'         => 'text',
					'title'        => esc_html__('Hotline Number', 'saniga'),
					'default'      => '',
					'required'     => array( 0 => 'h_hotline_on', 1 => 'equals', 2 => '1' ),
		        )
		    )
		);
	}
}
/**
 * Social list
**/
if(!function_exists('saniga_social_list_opts')){
	function saniga_social_list_opts($args=[]){
		$args = wp_parse_args($args,[
			'param_name' => 'social_list'
		]);
		$opts = array(
            'id'      => $args['param_name'],
            'type'    => 'sorter',
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(),
                'disabled' => array(
					'facebook'    => 'Facebook',
					'twitter'     => 'Twitter',
					'linkedin'    => 'Linkedin',
					'instagram'   => 'Instagram',
					'google'      => 'Google',
					'tripadvisor' => 'Tripadvisor',
					'youtube'     => 'Youtube',
					'vimeo'       => 'Vimeo',
					'tumblr'      => 'Tumblr',
					'pinterest'   => 'Pinterest',
					'yelp'        => 'Yelp',
					'skype'       => 'Skype',
                )
            ),
        );
        return $opts;
	}
}
/**
 * Page Title
***/
if(!function_exists('saniga_page_title_opts')){
	function saniga_page_title_opts($args = []){
		$args = wp_parse_args($args, [
			'prefix'		 => '',	
			'default'        => '',
			'default_value'  => '1',
			'default_layout' => '',
			'subsection'     => ''
		]);		
		return array(
			'title'      => esc_html__('Page Title', 'saniga'),
			'icon'       => 'el-icon-map-marker',
			'subsection' => $args['subsection'],
			'fields'     => saniga_page_title_opts_fields($args)
		);
	}
}
if(!function_exists('saniga_page_title_opts_fields')){
	function saniga_page_title_opts_fields($args = []){
		$args = wp_parse_args($args, [
			'prefix'         => '',
			'default'        => false,
			'default_value'  => '1',
			'default_layout' => '',
			'subsection'     => false,
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			// Default Layout 
			$ptitle_layout = !empty($args['default_layout']) ? $args['default_layout'] : '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			// Default Layout 
			$ptitle_layout = !empty($args['default_layout']) ? $args['default_layout'] : saniga_configs('ptitle')['layout'];
		}
		// layout
		$layout_default = [
			'-1' => get_template_directory_uri() . '/assets/images/default-opt/default.jpg',
		];
		$layout_list = [
			'1' => get_template_directory_uri() . '/assets/images/ptitle-layout/p1.jpg',
			'2' => get_template_directory_uri() . '/assets/images/ptitle-layout/p2.jpg',
			'3' => get_template_directory_uri() . '/assets/images/ptitle-layout/p3.jpg',
			'4' => get_template_directory_uri() . '/assets/images/ptitle-layout/p4.jpg',
			'5' => get_template_directory_uri() . '/assets/images/ptitle-layout/p5.jpg',
			'6' => get_template_directory_uri() . '/assets/images/ptitle-layout/p6.jpg',
			'7' => get_template_directory_uri() . '/assets/images/ptitle-layout/p7.jpg',
			'8' => get_template_directory_uri() . '/assets/images/ptitle-layout/p8.jpg',
			'9' => get_template_directory_uri() . '/assets/images/ptitle-layout/p9.jpg',
			'10' => get_template_directory_uri() . '/assets/images/ptitle-layout/p10.jpg',
			'11' => get_template_directory_uri() . '/assets/images/ptitle-layout/p11.jpg',
			'12' => get_template_directory_uri() . '/assets/images/ptitle-layout/p12.jpg',
		];
		
		if($args['default']){
			$layout_opts = $layout_default +  $layout_list;
		} else {
			$layout_opts = $layout_list;
		}
		// Show/Hide
		if($args['default']){
			$sh_options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Show','saniga'),
                '0'  => esc_html__('Hide','saniga'),
			];
		} else {
			$sh_options = [
				'1'  => esc_html__('Show','saniga'),
                '0'  => esc_html__('Hide','saniga'),
			];
		}

		$args = array_merge($args,[
			'layout_opts'   => $layout_opts,
			'sh_options'    => $sh_options,
			'ptitle_layout' => $ptitle_layout
		]);
		return array(
	        array(
	            'id'           => $args['prefix'].'pagetitle',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Page Title', 'saniga' ),
	            'subtitle'     => esc_html__('Show/Hide page title?', 'saniga'),
	            'options'      => $args['sh_options'],
	            'default'      => $args['default_value'],
	        ),
	        array(
	            'id'       => $args['prefix'].'ptitle_layout',
	            'type'     => 'image_select',
	            'title'    => esc_html__('Layout', 'saniga'),
	            'subtitle' => esc_html__('Select a layout for page title.', 'saniga'),
	            'options'  => $args['layout_opts'],
	            'default'  => $args['ptitle_layout'],
	            'required' => array( 0 => $args['prefix'].'pagetitle', 1 => 'equals', 2 => '1' ),
	        ),
	        array(
				'id'                    => $args['prefix'].'ptitle_bg',
				'type'                  => 'background',
				'title'                 => esc_html__('Background', 'saniga'),
				'subtitle'              => esc_html__('Page title background.', 'saniga'),
				'output'                => array('body #pagetitle'),
				'required'              => array( 0 => $args['prefix'].'pagetitle', 1 => 'equals', 2 => '1' ),
	        ),
	        array(
				'id'           => $args['prefix'].'ptitle_overlay_color',
				'type'         => 'color_rgba',
				'title'        => esc_html__('Overlay Background Color', 'saniga'),
				'required'     => array( 0 => $args['prefix'].'pagetitle', 1 => 'equals', 2 => '1' ),
	        ),
	        array(
	            'id'       => $args['prefix'].'ptitle_title_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Show Title', 'saniga'),
	            'options'  => $args['sh_options'],
	            'default'  => $args['default_value'],
	            'required' => array( 0 => $args['prefix'].'pagetitle', 1 => 'equals', 2 => '1' ),
	        ),
	        saniga_page_title_custom_text_opts($args['default']),
	        saniga_page_title_custom_sub_text_opts($args['default']),
	        array(
				'id'          => $args['prefix'].'ptitle_color',
				'type'        => 'color_rgba',
				'title'       => esc_html__('Title Color', 'saniga'),
				'subtitle'    => esc_html__('Page title color.', 'saniga'),
				'required'    => array( 0 => $args['prefix'].'ptitle_title_on', 1 => 'equals', 2 => '1' ),
	        ),
	        array(
	            'id'       => $args['prefix'].'ptitle_breadcrumb_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Show Breadcrumb', 'saniga'),
	            'options'  => $args['sh_options'],
	            'default'  => $args['default_value'],
	            'required' => array( 0 => $args['prefix'].'pagetitle', 1 => 'equals', 2 => '1' ),
	        ),
	        array(
	            'id'      => $args['prefix'].'ptitle_breadcrumb_link_color',
	            'type'    => 'link_color',
	            'title'   => esc_html__('Breadcrumb Color', 'saniga'),
	            'default' => array(
	                'regular' => '',
	                'hover'   => '',
	                'active'  => '',
	            ),
	            'required' => array( 0 => $args['prefix'].'ptitle_breadcrumb_on', 1 => 'equals', 2 => '1' ),
	        ),
	    );
	}
}
if(!function_exists('saniga_page_title_custom_text_opts')){
	function saniga_page_title_custom_text_opts($show){
		if(!$show) return;
		return array(
			'id'           => 'custom_title',
			'type'         => 'textarea',
			'title'        => esc_html__( 'Custom Title', 'saniga' ),
			'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'saniga' ),
			'required' 	   => array( 
				array(0 => 'ptitle_title_on', 1 => 'equals', 2 => '1' )
			)
		);
	}
}
if(!function_exists('saniga_page_title_custom_sub_text_opts')){
	function saniga_page_title_custom_sub_text_opts($show){
		if(!$show) return;
		return array(
			'id'           => 'custom_sub_title',
			'type'         => 'textarea',
			'title'        => esc_html__( 'Custom Sub Title', 'saniga' ),
			'subtitle'     => esc_html__( 'Add short description for page title', 'saniga' ),
			'required' 	   => array( 
				array(0 => 'ptitle_title_on', 1 => 'equals', 2 => '1' )
			)
		);
	}
}
/**
 * Page Options 
*/ 
if(!function_exists('saniga_page_layout_opts')){
	function saniga_page_layout_opts($args = []){
		$args = wp_parse_args($args, [
			'name'          => 'page_sidebar_pos',	
			'title'         => esc_html__('Single Page', 'saniga'),
			'default'       => false,
			'default_value' => saniga_configs('blog')['archive_sidebar_pos'],
			'subsection'    => true,
			'fields_only'   => false
		]);
		
		if($args['default']){
			$custom_sidebar_width = [];
		} else {
			$custom_sidebar_width = [
				'id'            => 'page_content_col',
	            'title'         => esc_html__('Content Columns', 'saniga'),
	            'subtitle'      => esc_html__('Choose content Columns', 'saniga'),
	            'type'          => 'slider',
	            'default'       => saniga_configs('blog')['single_content_col'],
	            'min'           => 1,
	            'step'          => 1,
	            'max'           => 11,
	            'display_value' => 'label',
	            'required'      => [ 
	                [$args['name'], '!=', '0'],
	                [$args['name'], '!=', 'bottom']
	            ]
			];
		}
		return array(
		    'title'      => $args['title'],
		    'icon'       => 'el-icon-file-edit',
		    'subsection' => true,
		    'fields'     => array(
		        saniga_sidebar_opts([
		            'name'          => $args['name'],
		            'default'		=> $args['default'],
		            'default_value' => $args['default_value'],
		            'subsection'    => $args['subsection'],
		            'fields_only'   => $args['fields_only']
		        ]),
		        $custom_sidebar_width
		    )
		);
	}
}
/**
 * Footer Options
**/
if(!function_exists('saniga_footer_opts')){
	function saniga_footer_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => false
		]);
		if($args['default']){
			$footer_fixed_options = [
				'-1' => esc_html__('Default','saniga'),
                '1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$footer_layout_default = '-1';
			$footer_fixed_default_value = '-1';
		} else {
			$footer_fixed_options = [
				'1'  => esc_html__('Yes','saniga'),
                '0'  => esc_html__('No','saniga'),
			];
			$footer_layout_default = '1';
			$footer_fixed_default_value = '0';
		}
		
		// Return
		return array(
		    'title'      => esc_html__('Footer', 'saniga'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'id'          => 'footer_layout',
                    'type'        => 'image_select',
                    'title'       => esc_html__('Layout', 'saniga'),
                    'subtitle'    => esc_html__('Select a layout for upper footer area.', 'saniga'),
                    'desc'        => sprintf(esc_html__('%sClick Here%s to add your custom footer layout.','saniga'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=cms-footer' ) ) . '" target="_blank">','</a>'),
                    'placeholder' => esc_html__('Default','saniga'),
                    'options'     => saniga_list_post_thumbnail('cms-footer', $args['default'], [
                    	'1' => get_template_directory_uri() . '/assets/images/footer-layout/default.png'
                    ]),
                    'default'     => $footer_layout_default
                ),
	            array(
                    'title'    => esc_html__('Footer Fixed', 'saniga'),
                    'subtitle' => esc_html__('Make footer fixed at bottom?', 'saniga'),
                    'id'       => 'footer_fixed',
                    'type'     => 'button_set',
                    'options'  => $footer_fixed_options,
                    'default'  => $footer_fixed_default_value,
                )
            )
		);
	}
}
if(!function_exists('saniga_footer_bottom_opts')){
	function saniga_footer_bottom_opts($args = []){
		return array(
		    'title'      => esc_html__('Footer Bottom', 'saniga'),
		    'icon'       => 'el el-circle-arrow-right',
		    'subsection' => true,
		    'fields'     => array(
		        array(
					'id'           =>'footer_copyright',
					'type'         => 'textarea',
					'title'        => esc_html__('Copyright', 'saniga'),
					'validate'     => 'html_custom',
					'default'      => '',
					'allowed_html' => array(
		                'a' => array(
		                    'href' => array(),
		                    'title' => array(),
		                    'class' => array(),
		                    'target' => array()
		                )
		            ),
		            'required' => [
				    	['footer_layout', 'equals', '1']
				    ]
		        ),
		        array(
		            'title'  => esc_html__('Social', 'saniga'),
		            'type'   => 'section',
		            'id'     => 'footer_social',
		            'indent' => true,
		            'required' => [
				    	['footer_layout', 'equals', '1']
				    ]
		        ),
		        saniga_social_list_opts(['param_name' => 'f_social_list']),
		    )
		);
	}
}
/**
 * Sidebar
*/
if(!function_exists('saniga_sidebar_opts')){
	function saniga_sidebar_opts($args = []){
		$args = wp_parse_args($args, [
			'name'          => 'sidebar_page_pos',
			'default'       => false,
			'default_value' => saniga_configs('blog')['archive_sidebar_pos'],
			'subsection'    => true,
			'fields_only'	=> false
		]);
		if($args['default']){
			$options = [
				'-1'    => esc_html__('Default','saniga'),
				'0'     => esc_html__('No Sidebar','saniga'),
				'left'  => esc_html__('Left','saniga'),
				'right' => esc_html__('Right','saniga'),
				'bottom' => esc_html__('Bottom','saniga'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'0'     => esc_html__('No Sidebar','saniga'),
				'left'  => esc_html__('Left','saniga'),
				'right' => esc_html__('Right','saniga'),
				'bottom' => esc_html__('Bottom','saniga'),
			];
			$default_value = $args['default_value'];
		}
		// Return
		return array(
            'title'    => esc_html__('Sidebar Position', 'saniga'),
            'subtitle' => esc_html__('Choose position for sidebar', 'saniga'),
            'id'       => $args['name'],
            'type'     => 'button_set',
            'options'  => $options,
            'default'  => $default_value,
        );
	}
}

if(!function_exists('saniga_woo_header_cart_opts')){
	function saniga_woo_header_cart_opts($args = []){
		if(!class_exists('WooCommerce')) return array();
		$args = wp_parse_args($args, [
			'options' => '',
			'default' => ''
		]);
		return array(
            'title'    => esc_html__('Show Cart', 'saniga'),
            'subtitle' => esc_html__('Show/Hide cart icon', 'saniga'),
            'id'       => 'cart_on',
            'type'     => 'button_set',
            'options'  => $args['options'],
            'default'  => $args['default'],
        );
	}
}

if(!function_exists('saniga_header_language_switcher_opts')){
	function saniga_header_language_switcher_opts($args = []){
		if(!class_exists('TRP_Translate_Press') ) return array();
		$args = wp_parse_args($args, [
			'options' => '',
			'default' => ''
		]);
		return array(
            'title'    => esc_html__('Show Language Switcher', 'saniga'),
            'subtitle' => esc_html__('Show/Hide Language Switcher', 'saniga'),
            'id'       => 'header_switch_language',
            'type'     => 'button_set',
            'options'  => $args['options'],
            'default'  => $args['default'],
        );
		
	}
}