<?php
/**
 * Template part for displaying default header layout
 */
?>
<header id="cms-header" class="<?php saniga_header_css_class(); ?>">
    <div class="<?php saniga_header_container_css_class(); ?>">
        <div class="row gutters-xl-40 justify-content-between align-items-center">
            <?php saniga_logo(['class' => 'col-auto']); ?>
            <div class="header-separator col-auto cms-hidden-lg"><span></span></div>
            <div class="cms-navigation col">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-xl-auto">
                        <div class="row align-items-center gutters-20">
                            <?php saniga_secondary_menu([
                                'before' => '<div class="col-auto font-700 order-xl-first">',
                                'after'  => '</div>'
                            ]); ?>
                            <div class="cms-main-navigation col-12 col-xl-auto">
                                <?php get_template_part( 'template-parts/header/header-menu' ); ?>
                            </div>
                            <?php saniga_header_search(['class' => 'col-auto cms-hidden-lg']); ?>
                        </div>
                    </div>
                    <div class="<?php saniga_site_menu_right_class('col-12 col-xl-auto');?>">
                        <div class="cms-navigation-attrs-inner row gutters-20 gutters-xl-40 align-items-center">
                            <?php 
                                saniga_header_social([
                                    'before' => '<div class="cms-socials-wrap col-auto cms-hidden-lg"><div class="row gutters-5 gutters-grid justify-content-center">', 
                                    'after'  => '</div></div>',
                                    'icon_class' => 'menu-icon menu-color'
                                ]);
                                saniga_header_hotline([
                                    'class' => 'col-12 col-md-auto'
                                ]);
                                saniga_header_button([
                                    'class'     => 'col-12 col-md-6 col-xl-auto',
                                    'btn_class' => 'btn btn-md btn-secondary cms-btn-header'
                                ]);
                                saniga_header_button2([
                                    'class'      => 'col-12 col-md-6 col-xl-auto',
                                    'btn_class'  => 'btn btn-md btn-accent btn-hover-secondary cms-btn-header'
                                ]);
                                do_action('saniga_header_atts');
                            ?>
                            <div class="header-separator col-auto cms-hidden-lg"><span></span></div>
                            <?php saniga_header_cart(['class' => 'col-auto cms-hidden-lg']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                if( (saniga_get_opts( 'hidden_sidebar_on', '0' ) == '1' && is_active_sidebar('sidebar-hidden')) || saniga_get_opts('header_switch_language', '0') == 'all' )  {
                    $hidden_sidebar = '';
                } else {
                    $hidden_sidebar = 'cms-hidden-n-xl';
                }
            ?>
            <div class="col col-lg-auto <?php echo esc_attr($hidden_sidebar);?>">
                <div class="row align-items-center justify-content-end">
                    <?php
                        saniga_header_search(['class' => 'col-auto cms-hidden-n-xl']);
                        saniga_header_cart(['class' => 'col-auto cms-hidden-n-xl']);
                        saniga_header_social([
                            'before' => '<div class="cms-header-socials col-auto cms-hidden-n-xl">', 
                            'after'  => '</div>',
                            'icon_class' => 'menu-icon menu-color'
                        ]);
                        saniga_header_language_switcher(['class' => 'col-auto cms-hidden-text', 'full_names' => false]);
                        do_action('saniga_header_mobile_atts');
                        saniga_hidden_sidebar_icon(['class' => 'col-auto']);
                        saniga_mobile_menu_icon(['class' => 'col-auto']);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php do_action('saniga_header_popup_content'); ?>
</header>