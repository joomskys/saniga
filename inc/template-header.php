<?php
/**
 * Header layout
 **/
if(!function_exists('saniga_header_layout')){
    function saniga_header_layout()
    {
        if(is_singular('cms-header-top') || is_singular('cms-footer')  || is_singular('cms-mega-menu') ) return;
        $header_layout = saniga_get_opts( 'header_layout', '1' );
        get_template_part( 'template-parts/header/header-layout', $header_layout );
    }
}
/**
 * Header css class
*/
if(!function_exists('saniga_header_css_class')){
    function saniga_header_css_class($class=''){
        $classes = [
            'cms-header',
            'header-layout'.saniga_get_opts('header_layout','1')
        ];
        $header_sticky = saniga_get_opts('sticky_on','0');
        $header_ontop = saniga_get_opts('header_ontop','0');
        if($header_sticky == '1') $classes[] = 'is-sticky header-sticky';
        if($header_ontop == '1') $classes[] = 'is-ontop header-ontop';
        if(!empty($class)) $classes[] = $class;

        echo esc_attr(implode(' ', $classes));
    }
}

/**
 * Header Container CSS class
*/
if(!function_exists('saniga_header_container_css_class')){
    function saniga_header_container_css_class($class = ''){
        $classes = ['header-container'];
        $classes[] = saniga_get_opts('header_layout_width', 'container');
        $classes[] = $class;
        echo esc_attr(trim(implode(' ', $classes)));
    }
}

/**
 * Header Logo
*/ 
if(!function_exists('saniga_logo')){
    function saniga_logo($args = []){
        $args = wp_parse_args($args, [
            'class' => '',
            'before' => '',
            'after' => ''
        ]);
    ?>
        <div class="<?php echo implode(' ', ['cms-header-logo', $args['class']]); ?>">
            <?php 
                printf('%s', $args['before']);
                do_action('saniga_before_logo');
                get_template_part( 'template-parts/header/header-branding' ); 
                do_action('saniga_after_logo');
                printf('%s', $args['after']);
            ?>
        </div>  
    <?php
    }
}


// Header Button 
if(!function_exists('saniga_header_button')){
    function saniga_header_button($args=[]){
        $args = wp_parse_args($args,[
            'class'     => '',
            'btn_class' => '',
            'show_icon'  => false,
            'icon_class' => '',
            'icon_pos'   => 'before'
        ]);
        $h_btn_on          = saniga_get_opts( 'h_btn_on', '0' );
        if($h_btn_on == '0') return;

        $h_btn_text        = saniga_get_opts( 'h_btn_text', 'Your Text' );
        $h_btn_link_type   = saniga_get_opts( 'h_btn_link_type', 'page' );
        $h_btn_link        = saniga_get_opts( 'h_btn_link' );
        $h_btn_link_custom = saniga_get_opts( 'h_btn_link_custom' );
        $h_btn_target      = saniga_get_opts( 'h_btn_target', '_self' );
        if($h_btn_link_type == 'page') {
            $h_btn_url = get_permalink($h_btn_link);
        } else {
            $h_btn_url = $h_btn_link_custom;
        }
        $btn_icon = '';
        if($args['show_icon'] === true){
            $btn_icon = '<span class="cms-btn-icon '.$args['icon_class'].'"></span>';
        }
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-header-btn', $args['class']])); ?>">
                <a href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>" class="<?php echo trim(implode(' ', ['h-btn', $args['btn_class']])); ?>">
                    <span class="cms-btn-content">
                        <?php if($args['icon_pos'] === 'before') printf('%s', $btn_icon); ?>
                        <span class="cms-btn-text"><?php  echo esc_html( $h_btn_text ); ?></span>
                        <?php if($args['icon_pos'] === 'after') printf('%s', $btn_icon); ?>
                    </span>
                </a>
            </div>
    <?php
    }
}
// Header Button 02
if(!function_exists('saniga_header_button2')){
    function saniga_header_button2($args=[]){
        $args = wp_parse_args($args,[
            'class'      => '',
            'btn_class'  => '',
            'show_icon'  => false,
            'icon_class' => '',
            'icon_pos'   => 'before'
        ]);
        $h_btn_on          = saniga_get_opts( 'h_btn_on2', '0' );
        if($h_btn_on == '0') return;
        
        $h_btn_text        = saniga_get_opts( 'h_btn_text2', 'Your Text' );
        $h_btn_link_type   = saniga_get_opts( 'h_btn_link_type2', 'page' );
        $h_btn_link        = saniga_get_opts( 'h_btn_link2' );
        $h_btn_link_custom = saniga_get_opts( 'h_btn_link_custom2' );
        $h_btn_target      = saniga_get_opts( 'h_btn_target2', '_self' );
        if($h_btn_link_type == 'page') {
            $h_btn_url = get_permalink($h_btn_link);
        } else {
            $h_btn_url = $h_btn_link_custom;
        }
        $btn_icon = '';
        if($args['show_icon'] === true){
            $btn_icon = '<span class="cms-btn-icon '.$args['icon_class'].'"></span>';
        }
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-header-btn', $args['class']])); ?>">
                <a href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>" class="<?php echo trim(implode(' ', ['h-btn', $args['btn_class']])); ?>">
                    <span class="cms-btn-content">
                        <?php if($args['icon_pos'] === 'before') printf('%s', $btn_icon); ?>
                        <span class="cms-btn-text"><?php echo esc_html( $h_btn_text ); ?></span>
                        <?php if($args['icon_pos'] === 'after') printf('%s', $btn_icon); ?>
                    </span>
                </a>
            </div>
    <?php
    }
}
// Header Hotline
if(!function_exists('saniga_header_hotline')){
    function saniga_header_hotline($args=[]){
        $args = wp_parse_args($args,[
            'class'      => '',
            'show_icon'  => true,
            'icon_class' => '',
            'icon_pos'   => 'before'
        ]);
        $h_btn_on          = saniga_get_opts( 'h_hotline_on', '0' );
        if($h_btn_on == '0') return;
        
        $h_btn_text        = saniga_get_opts( 'h_hotline_text', '01061245741' );
        $h_btn_url         = 'tel:'. $h_btn_text;
        $btn_icon = '';
        if($args['show_icon'] === true && !empty($args['icon_class'])){
            $btn_icon = '<span class="cms-btn-icon '.$args['icon_class'].'"></span>';
        }
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-header-btn', $args['class']])); ?>">
                <a href="<?php echo esc_url( $h_btn_url ); ?>">
                    <span class="cms-btn-content">
                        <?php if($args['icon_pos'] === 'before') printf('%s', $btn_icon); ?>
                        <span class="cms-btn-text"><?php echo esc_html( $h_btn_text ); ?></span>
                        <?php if($args['icon_pos'] === 'after') printf('%s', $btn_icon); ?>
                    </span>
                </a>
            </div>
    <?php
    }
}
// Header Search
if(!function_exists('saniga_header_search')){
    function saniga_header_search($args=[]){
        $args = wp_parse_args($args, [
            'class' => '',
            'icon'  => 'cmsi-search',
            'before' => '',
            'after'  => ''
        ]);
        $search_on = saniga_get_opts('search_on', '0');
        $css_class = ['cms-header-search header-icon', $args['class']];
        if($search_on == '0') return;
        wp_enqueue_script('magnific-popup');
        wp_enqueue_style('magnific-popup');
        printf('%s', $args['before']);
    ?>
        <div class="<?php echo implode(' ', $css_class);?>">
            <a href="#cms-search-popup" class="h-btn-search menu-color cms-transition"><span class="<?php echo esc_attr($args['icon']);?>"></span></a>
        </div>
    <?php
        printf('%s', $args['after']);
    }
}
/**
 * Search Popup
 */
if(!function_exists('saniga_search_popup')){
    add_action('wp_footer', 'saniga_search_popup', 1);
    function saniga_search_popup(){
        $search_on = saniga_get_opts( 'search_on', '0' );
        $search_text = saniga_get_opts( 'search_text', 'Type Words Then Enter' );
        ?>
        <div class="d-none">
            <div id="cms-search-popup" class="cms-search-popup">
                <div class="container">
                    <form role="search" method="get" class="cms-search-form cms-search-form-popup" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" class="cms-search-field" placeholder="<?php echo esc_attr( $search_text); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="cms-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'saniga' ); ?>"></button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
// Header Cart
if(!function_exists('saniga_header_cart')){
    function saniga_header_cart($args=[]){
        $cart_on = saniga_get_opts( 'cart_on', '0' );
        if(!class_exists('Woocommerce') || $cart_on == '0') return;
        $args = wp_parse_args($args,[
            'class'  => '',
            'text'   => '',
            'style'  => '1',
            'icon'   => 'cmsi-shopping-cart',
            'before' => '',
            'after'  => ''
        ]);
        $css_class = ['cms-header-cart header-icon relative', $args['class']];
        //add_action('saniga_header_popup_content', 'saniga_header_popup_cart');

        printf('%s', $args['before']);
    ?>
        <div class="<?php echo implode(' ', $css_class); ?>">
            <span class="h-btn-cart menu-color cms-transition">
                <?php if(!empty($args['text'])) { ?><span class="menu-text menu-color"><?php echo esc_html($args['text']);?></span><?php }?>
                <span class="<?php echo esc_attr($args['icon']);?>"></span>
                <span class="header-count cart-count cart_total style-<?php echo esc_attr($args['style']);?>"><?php saniga_woocommerce_cart_counter(['style' => $args['style']]); ?></span>
            </span>
            
        </div>
    <?php
        printf('%s', $args['after']);
    }
}
if(!function_exists('saniga_header_popup_cart')){
    add_action('wp_footer', 'saniga_header_popup_cart');
    function saniga_header_popup_cart(){
        if(!class_exists('Woocommerce')) return;
        ?>
        <div class="cms-header-cart-content">
            <div class="widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('saniga_woocommerce_add_to_cart_fragments')){
    add_filter('woocommerce_add_to_cart_fragments', 'saniga_woocommerce_add_to_cart_fragments', 10, 1 );
    function saniga_woocommerce_add_to_cart_fragments( $fragments ) {
        if(!class_exists('WooCommerce')) return;
        ob_start();
        $header_layout = saniga_get_opts('header_layout','1');
        switch ($header_layout) {
            case '5':
                $cart_style = '2';
                break;
            
            default:
                $cart_style = '1';
                break;
        }
        ?>
        <span class="header-count cart-count cart_total style-<?php echo esc_attr($cart_style);?>"><?php saniga_woocommerce_cart_counter(['style' => $cart_style]); ?></span>
        <?php
        $fragments['.cart_total'] = ob_get_clean();
        return $fragments;
    }
}

if(!function_exists('saniga_woocommerce_cart_counter')){
    function saniga_woocommerce_cart_counter($args=[]){
        if(!class_exists('WooCommerce')) return;
        $args = wp_parse_args($args, [
            'style' => '1'
        ]);
        switch ($args['style']) {
            case '2':
                $count = WC()->cart->cart_contents_count;
                break;
            
            default:
                $count = WC()->cart->cart_contents_count;
                break;
        }
        echo saniga_html($count);
    }
}

// Mobile menu icon
if(!function_exists('saniga_mobile_menu_icon')){
    function saniga_mobile_menu_icon($args=[]){
        $args = wp_parse_args($args,[
            'class' => ''
        ]);
        $css_class = ['main-menu-mobile', $args['class']];
        ?>
            <div id="main-menu-mobile" class="<?php echo implode(' ', $css_class);?>">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        <?php
    }
}
// Menu Right Class
if(!function_exists('saniga_site_menu_right_class')){
    function saniga_site_menu_right_class($class=''){
        $css_class         = ['cms-navigation-attrs'];
        $cart_on           = saniga_get_opts('cart_on','0');
        $search_on         = saniga_get_opts('search_on','0');
        $social_list       = saniga_get_opts( 'social_list', ['enabled' => []]);
        $social_on         = (count($social_list['enabled']) > 1) ? '1' : '0';
        $hidden_sidebar_on = saniga_get_opts('hidden_sidebar_on', '0');
        if($cart_on == '1' || $search_on == '1' || $social_on == '1' || $hidden_sidebar_on == '1') $css_class[] = 'has-atts';
        $css_class[] =  $class;
        echo implode(' ', $css_class);
    }
}

/**
 * Social Icon
*/
function saniga_header_social($args=[]) {
    $args = wp_parse_args($args,[
        'icon_class' => '',
        'before' => '',
        'after'  => ''
    ]);
    $social_list = saniga_get_opts( 'social_list' );
    if(isset($social_list['enabled']) && count($social_list['enabled']) === 1) return;
    if($social_list && isset($social_list['enabled'])){
        printf('%s', $args['before']);
        foreach ($social_list['enabled'] as $social_key => $social_name){
            $social_link = saniga_get_opt( 'social_' . $social_key . '_url' );
            $social_icon = !empty(saniga_get_opt( 'social_' . $social_key . '_icon')) ? saniga_get_opt( 'social_' . $social_key . '_icon') : 'cmsi-'.$social_key;
            $social_link = !empty($social_link)?$social_link:'#';
            if($social_key !== 'placebo') echo '<div class="cms-social cms-social-item col-auto"><a href="'. esc_url($social_link) .'" target="_blank" class="'.esc_attr($args['icon_class']).'"><span class="cms-icon-wrap transition d-block text-center icon-size-25 bg-transparent bg-hover-accent cms-circle text-secondary text-hover-white"><span class="cms-icon '.esc_attr($social_icon).'"></span></span></a></div>';
        }
        printf('%s', $args['after']);
    }
}

/**
 * Secondary Menu
**/
if(!function_exists('saniga_secondary_menu')){
    function saniga_secondary_menu($args = []){
        $args = wp_parse_args($args, [
            'before'     => '',
            'after'      => '',
            'class'      => '',
            'menu_class' => '',
            'walker'     => ''
        ]);
        if(saniga_get_opts('show_secondary_menu') !== '1' || empty(saniga_get_opts('secondary_menu', ''))) return;
        printf('%s', $args['before']);
        ?>
        <div class="cms-secondary-menu-wrap">
            <div class="cms-secondary-menu-title"><?php echo esc_html(saniga_get_opts('secondary_menu_title', 'Your Menu')); ?></div>
            <?php
                wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => saniga_get_opts('secondary_menu', ''), 
                    'container'       => '',
                    'container_class' => $args['class'],
                    'menu_id'         => 'cms-secondary-menu',
                    'menu_class'      => trim('cms-secondary-menu unstyled clearfix '.$args['menu_class']),
                    'walker'          => $args['walker'],
                ) );
            ?>
        </div>
        <?php
        printf('%s', $args['after']);
    }
}
/**
 * Language Switcher
*/
if(!function_exists('saniga_header_language_switcher')){
    function saniga_header_language_switcher($args = []){
        if(!class_exists('TRP_Translate_Press') || saniga_get_opts('header_switch_language', '0') == '0') return;
        $args = wp_parse_args($args, [
            'class'  => '',
            'before' => '',
            'after'  => '',
            'full_names' => true
        ]);
        $classes = ['empty-none cms-language-switcher', 'cms-language-switcher-on-'.saniga_get_opts('header_switch_language', '0'), $args['class']];
        printf('%s', $args['before']);
        ?>
        <div class="<?php echo trim(implode(' ', $classes));?>"><?php 
            echo do_shortcode('[language-switcher full_names = "'.$args['full_names'].'"]'); 
        ?></div>
        <?php
        printf('%s', $args['after']);
    }
}