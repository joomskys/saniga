<?php
if(!function_exists('saniga_get_sidebar')){
    function saniga_get_sidebar($check = true){
        global $wp_query;
        if ( isset($_GET['post_type'])) {
            $sidebar = 'sidebar-'.$_GET['post_type'];
        } elseif (isset($wp_query->post->post_type) && !is_search()){
            $sidebar = 'sidebar-'.$wp_query->post->post_type;
        } elseif ( is_search() ) {
            $sidebar = 'sidebar-post';
        } else {
            $sidebar = 'sidebar-post';
        }

        if($check)
            return is_active_sidebar($sidebar);
        else 
            return $sidebar;
    }
}
if(!function_exists('saniga_sidebar_position')){
    function saniga_sidebar_position($args = []){ 
        global $wp_query;
        $args = wp_parse_args($args, [
            'sidebar_pos' => 'archive_sidebar_pos'
        ]);
        $sidebar_pos = saniga_get_opts($args['sidebar_pos'], saniga_configs('blog')['archive_sidebar_pos']);
        return $sidebar_pos;
    }
}
/*
 * Sidebar area css class
*/
function saniga_sidebar_css_class($args=[]){
    $args = wp_parse_args($args, [
        'content_col' => 'archive_content_col',
        'sidebar_pos' => 'archive_sidebar_pos',
        'class'       => ''
    ]);
    $classes = [
        'cms-sidebar-area',
        'cms-sidebar-area-'.saniga_sidebar_position(['sidebar_pos' => $args['sidebar_pos']])
    ];
    $sidebar_position   = saniga_sidebar_position(['sidebar_pos' => $args['sidebar_pos']]);
    if( in_array($sidebar_position, ['0', 'none', 'bottom']) ){
        $classes[] = 'col-12';
    } else {
        $content_grid_class = (int) saniga_get_opts($args['content_col'], saniga_configs('blog')['archive_content_col']);
        $sidebar_grid_class = 12 - $content_grid_class;
        $classes[] = 'col-lg-'.$sidebar_grid_class; 
    }
    $classes[] = $args['class'];
    echo trim(implode(' ', $classes));
}
/**
 * Show Sidebar
*/
function saniga_sidebar($args = []){
    $args = wp_parse_args($args, [
        'content_col' => 'archive_content_col',
        'sidebar_pos' => 'archive_sidebar_pos',
        'class'       => ''
    ]);
    $sidebar            = saniga_get_sidebar(false);
    $sidebar_position   = saniga_sidebar_position([
        'sidebar_pos' => $args['sidebar_pos']
    ]);
    if( in_array($sidebar_position, ['0','none']) ) return;
    ?>
    <div id="cms-sidebar-area" class="<?php saniga_sidebar_css_class(['content_col' => $args['content_col'], 'sidebar_pos' => $args['sidebar_pos'],'class' => $args['class']]); ?>">
        <div class="cms-sidebar-area-inner"><?php
            get_sidebar(); 
        ?></div>
    </div>
    <?php
}
/**
 * Sidebar Hidden
 */
if(!function_exists('saniga_sidebar_hidden')){
    add_action('wp_footer', 'saniga_sidebar_hidden');
    function saniga_sidebar_hidden()
    {
        $hidden_sidebar_on = saniga_get_opts( 'hidden_sidebar_on', '0' );
        if($hidden_sidebar_on == '0' || !is_active_sidebar('sidebar-hidden')) return; 
        ?>
            <div class="cms-hidden-sidebar">
                <div class="cms-hidden-close cmsi-times"></div>
                <div class="cms-hidden-sidebar-inner cms-mousewheel p-30">
                    <div class="cms-hidden-sidebar-inner2 cms-mousewheel-inner">
                        <div class="cms-sidebar-area">
                            <div class="cms-sidebar-area-inner">
                                <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
if(!function_exists('saniga_hidden_sidebar_icon')){
    function saniga_hidden_sidebar_icon($args = []){
        if(saniga_get_opts( 'hidden_sidebar_on', '0' ) != '1' || !is_active_sidebar('sidebar-hidden')) return;
        $args = wp_parse_args($args, [
            'class' => '',
            'icon'  => 'cmsi-sign-out-alt'
        ]);
    ?>
        <div class="<?php echo trim(implode(' ', ['cms-header-hidden-sidebar header-icon cms-transition', $args['class']]));?>">
            <span class="menu-color <?php echo trim(implode(' ', [$args['icon']]));?>"></span>
        </div>
    <?php
    }
}