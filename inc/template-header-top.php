<?php
/**
 * Header Top
**/
if(!function_exists('saniga_header_top_social')){
    function saniga_header_top_social($args=[]) {
        $args = wp_parse_args($args, [
            'tag'    => 'div',
            'class'  => '',
            'before' => '',
            'after'  => ''
        ]);
        $social_list = saniga_get_opts( 't_social_list' );
        if(!empty($args['before'])) echo wp_kses_post($args['before']);
            echo '<'.$args['tag'].' class="'.implode(' ', ['cms-social-list', $args['class']]).'">';
                if($social_list && isset($social_list['enabled'])){
                    foreach ($social_list['enabled'] as $social_key => $social_name){
                        $social_link = saniga_get_opt( 'social_' . $social_key . '_url' );
                        $social_link = !empty($social_link)?$social_link:'#';
                        if($social_key == 'facebook') $social_key = $social_key.'-f';
                        if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank"><span class="cms-icon cmsi-' . esc_attr($social_key) . '"></span></a>';
                    }
                }
            echo '</'.$args['tag'].'>';
        if(!empty($args['after'])) echo wp_kses_post($args['after']);
    }
}
if(!function_exists('saniga_header_top')){
    function saniga_header_top($args = []){
        if(is_singular('cms-header-top') || is_singular('cms-footer') ) return;
        $args = wp_parse_args($args, []);
        $header_top_layout = saniga_get_opts('header_top_layout', '');
        $cms_post = get_post($header_top_layout);
        if(in_array($header_top_layout, ['-1', '0', 'none', ''])) return;
        if (!is_wp_error($cms_post) && $cms_post->ID == $header_top_layout && class_exists('Elementor_Theme_Core')){
            $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $header_top_layout );
            if(empty($content)){
                $content = $cms_post->post_content;
            }
        } else {
            $content = '';
        }
    ?>
    <div id="cms-header-top" class="cms-header-top empty-none container-full"><?php 
        printf('%s', $content); 
    ?></div>
    <?php
    }
}