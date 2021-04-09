<?php
/**
 * @since: 1.0.0
 * @author: Chinh Duong Manh
 * @descriptions:
 * @create: April 09, 2021
 */
if (!defined('ABSPATH')) {
    die();
}

class Saniga_Mega_Menu_Walker extends Walker_Nav_Menu
{
    /**
     * @see Walker::start_el()
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_html = '';
        $megamenu = apply_filters('cms_enable_megamenu', false);

        if ('[divider]' === $item->title) {
            $output .= '<li class="menu-item-divider"></li>';
            return;
        }

        $extra_menu_custom = apply_filters("cms_menu_edit", array());
        if ($item->cms_onepage === 'is-one-page' && !wp_script_is('single-page-nav')) {
            wp_register_script('single-page-nav', ETC_URL . 'assets/js/lib/jquery.singlePageNav.js', array('jquery', 'elementor-waypoints'), 'all', true);
            wp_localize_script('single-page-nav', 'one_page_options', array('filter' => '.is-one-page', 'speed' => '1000'));
            wp_enqueue_script('single-page-nav');
        }
        foreach ($extra_menu_custom as $key => $f) {
            $val = get_post_meta($item->ID, '_menu_item_' . $key, true);
            if (!empty($val)) {
                $item->classes[] = $val;
            }
        }

        add_filter('nav_menu_link_attributes', function ($atts, $item) {
            if (isset($item->cms_onepage) && $item->cms_onepage === 'is-one-page') {
                if(!isset($atts['class']) || empty($atts['class'])){
                    $atts['class'] = 'is-one-page';
                }
                elseif(strpos($atts['class'], 'is-one-page') === false){
                    $atts['class'] = trim($atts['class'] . ' is-one-page');
                }
            }

            if (isset($item->cms_onepage_offset)) {
                $atts['data-onepage-offset'] = $item->cms_onepage_offset;
            }

            return $atts;
        }, 10, 2);
        if (!empty($item->cms_megaprofile) && $megamenu) {
            $item->classes[] = 'megamenu';
            $item->classes[] = 'menu-item-has-children';
        }

        if (!empty($args->local_scroll) && $depth === 0) {
            $item->classes[] = 'local-scroll';
        }
        $item->cms_icon_position = 'left';
        if (!empty($item->cms_icon)) {
            if ('left' === $item->cms_icon_position) {
                $args->old_link_before = $args->link_before;
                $args->link_before = '<span class="link-icon left-icon"><i class="' . esc_attr($item->cms_icon) . '"></i></span>' . $args->link_before;
            } else {
                $args->old_link_after = $args->link_after;
                $args->link_after = $args->link_after . '<span class="link-icon right-icon"><i class="' . esc_attr($item->cms_icon) . '"></i></span>';
            }
        }

        parent::start_el($item_html, $item, $depth, $args, $id);

        if (isset($args->old_link_before)) {

            $args->link_before = $args->old_link_before;
            $args->old_link_before = '';
        }

        if (isset($args->old_link_after)) {
            $args->link_after = $args->old_link_after;
            $args->old_link_after = '';
        }

        if (!empty($item->cms_megaprofile)) {
            $item_html .= $this->get_megamenu($item->cms_megaprofile);
        }

        $output .= $item_html;
    }

    public function get_megamenu($id)
    {
        $post = get_post($id);
        $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $id );
        $megamenu = apply_filters('cms_enable_megamenu', false);
        if ($megamenu)
            return '<div class="sub-menu"><div class="cms-megamenu-item">' . $content . '</div></div>';
        else
            return false;
    }
}