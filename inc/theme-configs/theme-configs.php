<?php
// make some configs
if(!function_exists('saniga_configs')){
    function saniga_configs($value){
        $body_font    = '\'Roboto\', sans-serif';
        $heading_font = '\'Fira Sans\', sans-serif';
        $btn_font     = '\'Roboto\', sans-serif';
        $logo_w = '150px';
        $logo_h = '55px'; 

        $header_height = '111px';
        $header_width = '320px';
 
        $configs = [
            // color
            'theme_colors' => [
                'accent'    => ['title' => esc_html__('Accent (#16bae1)', 'saniga'), 'value' => saniga_get_opts('accent_color', '#16bae1')],
                'primary'   => ['title' => esc_html__('Primary (#161616)', 'saniga'), 'value' => saniga_get_opts('primary_color', '#161616')],
                'secondary' => ['title' => esc_html__('Secondary (#ffbe2e)', 'saniga'), 'value' => saniga_get_opts('secondary_color', '#ffbe2e')],
                'rating' => ['title' => esc_html__('Rating (#16bae1)', 'saniga'), 'value' => saniga_get_opts('rating_color', '#16bae1')],
                'body'     => ['title' => esc_html__('Body (#9b9b9b)', 'saniga'), 'value' => '#9b9b9b'],
                'white'     => ['title' => esc_html__('White (#ffffff)', 'saniga'), 'value' => '#ffffff'],
            ],
            'link_color'  => [
                'regular' => 'var(--color-primary)',
                'hover'   => 'var(--color-accent)',
                'active' => 'var(--color-accent)',
            ],
            // spacing (use for: padding, margin, row gutters, ...)
            'theme_spacings' => [
                '0' => '0',
                '5' => '5px',
                '8' => '8px',
                '10' => '10px',
                '15' => '15px',
                '20' => '20px',
                '25' => '25px',
                '30' => '30px',
                '35' => '35px',
                '40' => '40px',
                '45' => '45px',
                '50' => '50px',
                '55' => '55px',
                '60' => '60px',
                '65' => '65px',
                '70' => '70px',
                '75' => '75px',
                '80' => '80px',
                '85' => '85px',
                '90' => '90px',
                '95' => '95px',
                '100' => '100px',
                '105' => '105px',
                '110' => '110px',
                '115' => '115px',
                '120' => '120px',
                '125' => '125px',
                '130' => '130px',
            ],
            // screen size use in
            'theme_size_screen'    => [
                'xs' => 0,
                'sm' => 576,
                'md' => 768,
                'lg' => 992,
                'xl' => 1200
            ],
            // logo
            'logo' => [
                'width'     => saniga_get_opts('logo_size', ['width' => $logo_w, 'height' => $logo_h])['width'],
                'height'    => saniga_get_opts('logo_size', ['width' => $logo_w, 'height' => $logo_h])['height'],
                'units'     => saniga_get_opts('logo_size', ['units' => 'px'])['units'],
                'width-sm'  => saniga_get_opts('logo_size_sm', ['width' => $logo_w, 'height' => $logo_h])['width'],
                'height-sm' => saniga_get_opts('logo_size_sm', ['width' => $logo_w, 'height' => $logo_h])['height'],
                'default'   => get_template_directory_uri().'/assets/images/logo/logo.png',  
                'ontop'     => get_template_directory_uri().'/assets/images/logo/logo-ontop.png',  
                'sticky'    => get_template_directory_uri().'/assets/images/logo/logo-sticky.png',  
                'mobile'    => get_template_directory_uri().'/assets/images/logo/logo-mobile.png',  
            ],
            // Blog 
            'blog' => [
                'archive_content_col' => 8,
                'archive_sidebar_pos' => 'right',
                'single_content_col'  => 8,
                'single_sidebar_pos'  => 'right',
            ],
            // single post
            'single_post' => [
                'title_layout' => '10'
            ],
            // body typo
            'body' => [
                'bg'                => '#fff',
                'font-family'       => saniga_get_opts('body_font_typo',['font-family' => $body_font])['font-family'],
                'font-size'         => saniga_get_opts('body_font_typo',['font-size' => '15px'])['font-size'],
                'font-weight'       => saniga_get_opts('body_font_typo',['font-weight' => '400'])['font-weight'],
                'font-color'        => saniga_get_opts('body_font_typo',['color' => 'var(--color-body)'])['color'],
                'line-height'       => saniga_get_opts('body_font_typo',['line-height' => '1.666666666666667'])['line-height'],
                'letter-spacing'    => saniga_get_opts('body_font_typo',['letter-spacing' => '0px'])['letter-spacing'],
                'font-size-large'   => '17px',
                'font-size-medium'  => '16px',
                'font-size-small'   => '13px',
                'font-size-xsmall'  => '12px',
                'font-size-xxsmall' => '11px',
            ],
            // heading type
            'heading' => [
                // default
                'h1-size'          => '36px',
                'h2-size'          => '30px',
                'h3-size'          => '24px',
                'h4-size'          => '20px',
                'h5-size'          => '18px',
                'h6-size'          => '16px',
                'font-family'      => $heading_font,
                'font-color'       => 'var(--color-primary)',
                'font-color-hover' => 'var(--color-primary)',
                'font-weight'      => '500',
                'line-height'      => 1.4,
                'letter-spacing'   => 0,
                // custom 
                'h1_typo'               => [
                    'font-family'       => saniga_get_opts('h1_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h1_typo',['font-size' => 'var(--heading-h1-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h1_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h1_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h1_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h1_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h2_typo'               => [
                    'font-family'       => saniga_get_opts('h2_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h2_typo',['font-size' => 'var(--heading-h2-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h2_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h2_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h2_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h2_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h3_typo'               => [
                    'font-family'       => saniga_get_opts('h3_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h3_typo',['font-size' => 'var(--heading-h3-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h3_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h3_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h3_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h3_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h4_typo'               => [
                    'font-family'       => saniga_get_opts('h4_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h4_typo',['font-size' => 'var(--heading-h4-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h4_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h4_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h4_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h4_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h5_typo'               => [
                    'font-family'       => saniga_get_opts('h5_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h5_typo',['font-size' => 'var(--heading-h5-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h5_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h5_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h5_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h5_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h6_typo'               => [
                    'font-family'       => saniga_get_opts('h6_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => saniga_get_opts('h6_typo',['font-size' => 'var(--heading-h6-size)'])['font-size'],
                    'font-weight'       => saniga_get_opts('h6_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => saniga_get_opts('h6_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => saniga_get_opts('h6_typo',['line-height' => '1.4667'])['line-height'],
                    'letter-spacing'    => saniga_get_opts('h6_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ]
            ],
            // button 
            'button' => [
                'font-family'       => saniga_get_opts('btn_typo',['font-family' => $btn_font])['font-family'],
                'font-size'         => saniga_get_opts('btn_typo',['font-size' => '15px'])['font-size'],
                'font-weight'       => saniga_get_opts('btn_typo',['font-weight' => '700'])['font-weight'],
                'font-color'        => saniga_get_opts('btn_typo',['color' => 'var(--color-white)'])['color'],
                'letter-spacing'    => saniga_get_opts('btn_typo',['letter-spacing' => '0'])['letter-spacing'],
                'border'            => '0px solid '.saniga_hexToRgb(saniga_get_opts('secondary_color', '#eaeaea'), 1), 
                'border-color'      => saniga_hexToRgb(saniga_get_opts('secondary_color', '#eaeaea'), 1), 
                'radius'            => '0',     
                'radius-rtl'        => '0',
            ],
            // meta 
            'meta' => [
                'font-family'           => $body_font,
                'font-size'             => '13px',   
                'font-color'            => 'var(--color-body)',    
                'font-color-hover'      => 'var(--color-accent)',
                'font-weight'           => '400',
                'separate-color'        => 'var(--border-color)'
            ],
            // border
            'border' => [
                'color'          => '#eaeaea',
                'main'           => '1px solid var(--border-color)', 
                'main2'          => '2px solid var(--border-color)',
            ],
            // shadow 
            'shadow' => [
                '1'  => 'xx',
            ],
            // Radius
            'radius'    => [
                '0' => '0',
            ],
            // Gradient
            'gradient' => [
                '1' => 'none',
            ],

            // thumbnail size
            'thumbnail' => [
                'large_size_w'                   => 840,
                'large_size_h'                   => 562,
                'medium_large_size_w'            => 770,
                'medium_large_size_h'            => 370,
                'medium_size_w'                  => 570,
                'medium_size_h'                  => 570,
                'thumbnail_size_w'               => 120,
                'thumbnail_size_h'               => 80,
                'post_thumbnail_size_w'          => 1170,
                'post_thumbnail_size_h'          => 500,    
            ],
            // comments
            'comment' => [
                'avatar-size'  => 60,
                'border'       => '0',
                'radius'       => '0' 
            ],                                   
            // Default Thumbnail
            // use placeholder image if post dont have feature image
            'default_post_thumbnail' => saniga_get_theme_opt('default_post_thumbnail', false), 
            // make post thumbnail as background of it
            'thumbnail_is_bg'        => saniga_get_theme_opt('thumbnail_is_bg', false),
            // Header 
            'header' => [
                'height' => saniga_get_opts('header_height', ['height' => $header_height])['height'], // use for default header
                'width'  => saniga_get_opts('header_width', ['width' => $header_width])['width'] // use for sidebar header
            ],
            // Menu Color
            'menu' => array_merge(
                ['bg'            => '#fff'],
                saniga_get_opts('main_menu_color', [
                    'regular' => 'var(--color-primary)',
                    'hover'   => 'var(--color-accent)',
                    'active'  => 'var(--color-accent)',
                ]),
                [
                    'font-size'   => '15px',
                    'font-weight' => 700,
                    'font-family' => 'var(--body-font-family)' 
                ]
            ),
            // Menu Ontop Color
            'ontop' => array_merge(
                ['bg'            => 'transparent'],
                saniga_get_opts('ontop_menu_color', [
                    'regular' => 'var(--color-white)',
                    'hover'   => 'var(--color-accent)',
                    'active'  => 'var(--color-accent)'
                ])
            ),
            // Menu Sticky Color
            'sticky' => array_merge(
                ['bg'            => 'var(--color-white)'],
                saniga_get_opts('sticky_menu_color', [
                    'regular' => 'var(--color-primary)',
                    'hover'   => 'var(--color-accent)',
                    'active'  => 'var(--color-accent)'
                ])
            ),
            // Dropdown
            'dropdown' => array_merge(
                [
                    'bg'            => 'var(--color-white)',
                    'shadow'        => '0px 5px 83px 0px rgba(40, 40, 40, 0.05)'
                ],
                saniga_get_opts('dropdown_menu_color', [
                    'regular' => 'var(--color-body)',
                    'hover'   => 'var(--color-accent)',
                    'active'  => 'var(--color-accent)'
                ]),
                [
                    'font-size'     => '14px',  
                    'item-bg'       => 'transparent',
                    'item-bg-hover' => 'transparent'
                ]
            ),
            // Page title
            'ptitle' => array_merge(
                [
                    'layout' => '1'
                ],
                saniga_get_opts('ptitle_color', [
                    'color' => 'var(--color-white)',
                    'alpha' => '1',
                    'rgba'  => 'unset'
                ]),
                saniga_get_opts('ptitle_bg', [
                    'background-color'      => '#999',
                    'background-image'      => '',
                    'background-repeat'     => 'no-repeat',
                    'background-size'       => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position'   => 'center'
                ])
            ),
            'ptitle_overlay' => saniga_get_opts('ptitle_overlay_color', [
                'color' => 'inherit',
                'rgba'  => 'rgba(0, 0, 0, 0.25)'
            ]),
            'ptitle_breadcrumb' => saniga_get_opts('ptitle_breadcrumb_link_color', [
                'regular' => 'var(--color-white)', 
                'hover'   => 'var(--color-accent)', 
                'active'  => 'var(--color-white)'
            ]),
            // 404 page
            '404' => [
                'background' => saniga_get_opts('bg_404_page', [
                    'background-repeat'     => 'no-repeat',
                    'background-size'       => 'cover',
                    'background-attachment' => 'fixed',
                    'background-position'   => 'center center'
                ])
            ],
            // google font
            'google_fonts'          => 'Fira+Sans:wght@500;700&family=Roboto:wght@400;500;700&display=swap',
            'content_width'         => 1170,          
            // WooCommerce,
            'saniga_product_single_image_w'          => '570',
            'saniga_product_single_image_h'          => '570',
            
            'saniga_product_loop_image_w'            => '370',
            'saniga_product_loop_image_h'            => '370',

            'saniga_product_gallery_layout'          => 'default', // simplle, default, horizontal, vertical
            'saniga_product_gallery_thumb_position'  => 'bottom', // bottom, left, right

            'saniga_product_gallery_thumbnail_w'     => '80',
            'saniga_product_gallery_thumbnail_h'     => '80',
            
            'saniga_product_gallery_thumbnail_v_w'   => '80',
            'saniga_product_gallery_thumbnail_v_h'   => '80',
            
            'saniga_product_gallery_thumbnail_h_w'   => '80',
            'saniga_product_gallery_thumbnail_h_h'   => '80',
            
            'saniga_product_gallery_thumbnail_space_vertical'   => '10',
            'saniga_product_gallery_thumbnail_space_horizontal' => '10',

            // API 
            'api' => [
                'google' => saniga_get_theme_opt('gm_api_key', 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM')
            ],
        ];
        return $configs[$value];
    }
}

if(!function_exists('saniga_inline_styles')){
    function saniga_inline_styles() {
        ob_start();
        // CSS Variable
        $theme_colors      = saniga_configs('theme_colors');
        $link_color        = saniga_configs('link_color');
        $body              = saniga_configs('body');
        $logo              = saniga_configs('logo');
        $header            = saniga_configs('header');
        $menu              = saniga_configs('menu');
        $ontop             = saniga_configs('ontop');
        $sticky            = saniga_configs('sticky');
        $dropdown          = saniga_configs('dropdown');
        $ptitle            = saniga_configs('ptitle');
        $ptitle_overlay    = saniga_configs('ptitle_overlay');
        $ptitle_breadcrumb = saniga_configs('ptitle_breadcrumb');
        $heading           = saniga_configs('heading');
        $meta              = saniga_configs('meta');
        $border            = saniga_configs('border');
        $comment           = saniga_configs('comment');
        $gradient          = saniga_configs('gradient');
        unset($logo['default']);
        unset($logo['ontop']);
        unset($logo['sticky']);
        unset($logo['mobile']);
        unset($ptitle['media']);
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--color-%1$s: %2$s;', $color, $value['value']);
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s-color: %2$s;', $color, $value);
            }
            foreach ($body as $key => $value) {
                printf('--body-%1$s: %2$s;', $key, $value);
            }
            foreach ($header as $key => $value) {
                printf('--header-%1$s: %2$s;', $key, $value);
            }
            foreach ($menu as $key => $value) {
                printf('--menu-%1$s: %2$s;', $key, $value);
            }
            foreach ($ontop as $key => $value) {
                printf('--ontop-%1$s: %2$s;', $key, $value);
            }
            foreach ($sticky as $key => $value) {
                printf('--sticky-%1$s: %2$s;', $key, $value);
            }
            foreach ($dropdown as $key => $value) {
                printf('--dropdown-%1$s: %2$s;', $key, $value);
            }
            foreach ($ptitle as $key => $value) {
                if($key === 'background-image') $value = 'url('.$value.')';
                printf('--ptitle-%1$s: %2$s;', $key, $value);
            }
            foreach ($ptitle_overlay as $key => $value) {
                printf('--ptitle-overlay-%1$s: %2$s;', $key, $value);
            }
            foreach ($ptitle_breadcrumb as $key => $value) {
                printf('--ptitle-breadcrumb-%1$s: %2$s;', $key, $value);
            }
            foreach ($heading as $key => $value) {
                if(!is_array($value)){
                    printf('--heading-%1$s: %2$s;', $key, $value);
                } else {
                    foreach ($value as $_key => $_value) {
                        printf('--heading-%3$s-%1$s: %2$s;', $_key, $_value, str_replace('_', '-', $key));
                    }
                }
            }
            foreach ($meta as $key => $value) {
                printf('--meta-%1$s: %2$s;', $key, $value);
            }
            foreach ($border as $key => $value) {
                printf('--border-%1$s: %2$s;', $key, $value);
            }
            foreach ($comment as $key => $value) {
                printf('--comment-%1$s: %2$s;', $key, $value);
            }
            foreach ($logo as $key => $value) {
                printf('--logo-%1$s:%2$s;', $key, $value);
            }
            foreach ($gradient as $key => $value) {
                printf('--gradient-%1$s:%2$s;', $key, $value);
            }
        echo '}';
        return ob_get_clean();
    }
}