<?php
/**
 * All function for footer
*/
/**
 * Footer 
 **/
if(!function_exists('saniga_footer')){
    function saniga_footer()
    {
        if(is_singular('cms-header-top') || is_singular('cms-footer')) return;
        $footer_layout = saniga_get_opts( 'footer_layout', '1' );
        get_template_part( 'template-parts/footer/footer-layout', $footer_layout );
    }
}
/*
 * Footer css class
*/
if(!function_exists('saniga_footer_css_class')){
    function saniga_footer_css_class($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $footer_fixed = saniga_get_opts('footer_fixed', '0');
        $css_classes = [
            'cms-footer',
            'relative'
        ];
        if($footer_fixed == '1') $css_classes[] = 'cms-footer-fixed';
        echo trim(implode(' ', $css_classes));
    }
}

/**
 * Footer Copyright
**/
if(!function_exists('saniga_footer_copyright')){
    function saniga_footer_copyright($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $classes = ['cms-footer-copyright', $args['class']];

        $default_copyright_text = sprintf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','saniga'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/cmssuperheroes').'" target="_blank">'.esc_html__('CMSSuperHeroes','saniga').'</a>');
    ?>
    <div class="<?php echo trim(implode(' ', $classes));?>">
        <?php echo saniga_get_opts('footer_copyright', $default_copyright_text); ?>
    </div>
    <?php
    }
}

// Footer Bottom
if(!function_exists('saniga_footer_bottom')){
    function saniga_footer_bottom(){
    ?>
        <div class="cms-footer-bottom">
            <div class="container">
                <div class="row gutters-30 gutters-grid justify-content-between align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <?php saniga_footer_copyright(); ?>
                    </div>
                    <div class="cms-12 col-md-auto text-center text-md-end empty-none"><?php 
                        saniga_render_socials_list([
                            'name'   => 'f_social_list',
                            'before' => '<div class="cms-footer-social cms-socials justify-content-center">',
                            'after'  => '</div>'
                        ]);
                        dynamic_sidebar('sidebar-footer-bottom');
                    ?></div>
                </div>
            </div>
        </div>
    <?php
    }
}
// Foter elementor builder
if(!function_exists('saniga_footer_elementor_builder')){
    function saniga_footer_elementor_builder(){
        $footer_layout = saniga_get_opts('footer_layout', '1');
        if(in_array($footer_layout, ['-1', '0', '1', 'none'])) return;
        $cms_post = get_post($footer_layout);
        if (!is_wp_error($cms_post) && $cms_post->ID == $footer_layout && class_exists('Elementor_Theme_Core')){
            $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_layout );
            if(!empty($content)){
                etc_print_html($content);
            } else {
                etc_print_html($cms_post->post_content);
            }
        }
    }
}

/***
 * Back to top
*/
if(!function_exists('saniga_backtotop')){
    add_action('wp_footer', 'saniga_backtotop',2);
    function saniga_backtotop($args = []){
    $back_totop_on = saniga_get_opt('back_totop_on', true);
    $backtotop_icon = saniga_get_opt('backtotop_icon', 'cmsi-long-arrow-up');
    if ('1' !== $back_totop_on) return;
    ?>
        <a href="#" class="cms-scroll cms-scroll-top"><span class="cms-scroll-top-arrow cms-scroll-top-icon"><span class="<?php echo esc_attr($backtotop_icon);?>"></span></span></a>
    <?php 
    } 
}