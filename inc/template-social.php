<?php
/**
 * Social Icon
*/
function saniga_render_socials_list($args=[]) {
    $args = wp_parse_args($args,[
		'name'       => '',
		'icon_class' => '',
		'before'     => '',
		'after'      => ''
    ]);
    if(empty($args['name'])) return;
    $social_list = saniga_get_opts($args['name']);
    
    if(isset($social_list['enabled']) && count($social_list['enabled']) === 1) return;
    if($social_list && isset($social_list['enabled'])){
        printf('%s', $args['before']);
        foreach ($social_list['enabled'] as $social_key => $social_name){
            $social_link = saniga_get_opt( 'social_' . $social_key . '_url' );
            $social_icon = !empty(saniga_get_opt( 'social_' . $social_key . '_icon')) ? saniga_get_opt( 'social_' . $social_key . '_icon') : 'cmsi-'.$social_key;
            $social_link = !empty($social_link)?$social_link:'#';
            if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank" class="'.esc_attr($args['icon_class']).'"><span class="'.esc_attr($social_icon).'"></span></a>';
        }
        printf('%s', $args['after']);
    }
}