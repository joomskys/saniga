<?php
/**
 * Page title layout
 **/
if(!function_exists('saniga_page_title_layout')){
    function saniga_page_title_layout($args = []) {
        if(is_singular('cms-header-top') || is_singular('cms-footer') || is_404()) return;
		$show_pagetitle  = saniga_get_opts( 'pagetitle', '1' );
        if(is_singular('post')){
            $ptitle_layout = saniga_configs('single_post')['title_layout'];
        } elseif(is_singular('product')){
            $ptitle_layout = saniga_get_opts( 'product_ptitle_layout', saniga_configs('ptitle')['layout'] );
        } else {
            $ptitle_layout = saniga_get_opts( 'ptitle_layout', saniga_configs('ptitle')['layout'] );
        }

		$show_title      = saniga_get_opts( 'ptitle_title_on', '1');
		$show_breadcrumb = saniga_get_opts( 'ptitle_breadcrumb_on', '1' );
        $show_scroll     = saniga_get_opts( 'ptitle_scroll_on', '0' );
    	if($show_pagetitle !== '1' || ($show_title !== '1' && $show_breadcrumb !== '1') ) return;

    	$args = wp_parse_args($args, [
    		'class' => ''
    	]);
        // Wrap 
        $wrap_class = 'pb-30 pb-lg-60 pb-xl-120 pt-xl-130';
        // Title
        $title_class = 'text-30 text-lg-50 text-xl-75 font-700';
        //  Breadcrumb
        $divider_icon         = 'cmsi-chevron-right rtl-flip';
        $breadcrumb_separator = '<span class="breadcrumb-divider '.$divider_icon.'"></span>';
        $breadcrumb_class     = 'cms-pagetitle-breadcrumb';
     	?>
    	<div id="cms-pagetitle" class="cms-pagetitle cms-page-title-layout<?php echo esc_attr($ptitle_layout); ?> relative">
        	<div class="cms-page-title-overlay"></div>
        	<div class="container relative">
        		<div class="cms-page-title-inner">
        			<?php
                        switch ($ptitle_layout) {
                            case '1':
                                    saniga_page_title([
                                        'class'      => 'text-center',
                                        'title_class' => 'heading '.$title_class
                                    ]);
                                    saniga_breadcrumb([
                                        'class'   => 'justify-content-center '.$breadcrumb_class, 
                                        'divider' => $breadcrumb_separator
                                    ]);
                                break;
                            case '2':
                                    saniga_breadcrumb([
                                        'class'   => 'justify-content-center pb-17 '.$breadcrumb_class, 
                                        'divider' => $breadcrumb_separator
                                    ]);
                                    saniga_page_title([
                                        'class'      => $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                break;
                            case '3':
                                printf('%s', '<div class="row justify-content-between align-items-center">');
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-6">',
                                        'after'       => '</div>',
                                        'class'       =>  $title_class,
                                        'title_class' =>  $title_class
                                    ]);
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-6 text-lg-end">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                            case '4':
                                printf('%s', '<div class="row justify-content-between align-items-center">');
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-6">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-6 text-lg-end">',
                                        'after'       => '</div>',
                                        'class'       =>  $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                            case '5':
                                printf('%s', '<div class="row justify-content-start">');
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-8 col-xl-6">',
                                        'after'       => '</div>',
                                        'class'       => $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                    printf('%s','<div class="col-12"></div>');
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-8 col-xl-6">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                             case '6':
                                printf('%s', '<div class="row justify-content-end text-end">');
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-8 col-xl-6">',
                                        'after'       => '</div>',
                                        'class'       =>  $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                    printf('%s','<div class="col-12"></div>');
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-8 col-xl-6">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                            case '7':
                                printf('%s', '<div class="row justify-content-start">');
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-8 col-xl-6">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                    printf('%s','<div class="col-12"></div>');
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-8 col-xl-6">',
                                        'after'       => '</div>',
                                        'class'       => $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                            case '8':
                                printf('%s', '<div class="row justify-content-end">');
                                    saniga_breadcrumb([
                                        'before'  => '<div class="col-lg-8 col-xl-6">',
                                        'after'   => '</div>',
                                        'divider' => $breadcrumb_separator,
                                        'class'   => $breadcrumb_class
                                    ]);
                                    printf('%s','<div class="col-12"></div>');
                                    saniga_page_title([
                                        'before'      => '<div class="col-lg-8 col-xl-6">',
                                        'after'       => '</div>',
                                        'class'       => $wrap_class,
                                        'title_class' => $title_class
                                    ]);
                                printf('%s', '</div>');
                                break;
                            case '9':
                                saniga_page_title([
                                    'before'      => '<div class="text-center p-tb-lg-145">',
                                    'after'       => '</div>',
                                    'class'       => $wrap_class,
                                    'title_class' => $title_class
                                ]);
                                break;
                            case '10':
                                saniga_breadcrumb([
                                    'divider' => $breadcrumb_separator, 
                                    'class'   => $breadcrumb_class.' justify-content-center'
                                ]);
                                break;
                            case '11' :
                                saniga_page_title([
                                    'class'       => 'text-center '.$wrap_class,
                                    'title_class' => $title_class
                                ]);
                                saniga_breadcrumb([
                                    'class'   => 'mb-n35 justify-content-center '.$breadcrumb_class, 
                                    'divider' => $breadcrumb_separator
                                ]);
                                break;
                            case '12' :
                                saniga_page_title([
                                    'class'       => 'text-center '.$wrap_class,
                                    'title_class' => $title_class
                                ]);
                                saniga_breadcrumb([
                                    'class'   => 'justify-content-center '.$breadcrumb_class, 
                                    'divider' => $breadcrumb_separator
                                ]);
                            break;
                        }
                    ?>
        		</div>
        	</div>
            <?php if($show_scroll): ?>
                <a href="#cms-main" class="cms-scroll cms-ripple cms-ripple-accent cms-vibrate"><span class="cmsi-long-arrow-down"></span></a>
            <?php endif; ?>
        </div>
        <?php
    }
}

/**
 * Page Title 
*/
if(!function_exists('saniga_page_title')){
	function saniga_page_title($args = []){
		$show_title = saniga_get_opts('ptitle_title_on', '1');
		if($show_title !== '1') return;
		$args = wp_parse_args($args, [
            'class'      => '',
            'title_class' => 'cms-heading',
            'sub_class'  => '',
            'before'     => '',
            'after'      => ''
		]);
		$titles        = saniga_get_page_titles();

		printf('%s', $args['before']);
            printf('<div class="cms-page-title %1$s">', $args['class']);
    			if (!empty($titles['title'])){
    			    printf( '<div class="main-title %1$s">%2$s</div>',$args['title_class'], $titles['title'] );
    			}
    	        if(!empty($titles['sub_title'])) { 
    	        	printf( '<div class="cms-page-sub-title %1$s">%2$s</div>',$args['sub_class'], $titles['sub_title']);
    	        }
            printf('%s','</div>');
        printf('%s', $args['after']);
	}
}

/**
 * Prints HTML for breadcrumbs.
 */
if(!function_exists('saniga_breadcrumb')){
    function saniga_breadcrumb($args = []){
        $args = wp_parse_args($args, [
            'show_breadcrumb' => saniga_get_opts( 'ptitle_breadcrumb_on', '1' )
        ]);
        if ( ! class_exists( 'CMS_Breadcrumb' ) || $args['show_breadcrumb'] !== '1' )
        {
            return;
        }

        $breadcrumb = new CMS_Breadcrumb();
        $entries = $breadcrumb->get_entries();
        if ( empty( $entries ) )
        {
            return;
        }
        $args = wp_parse_args($args, [
            'before'     => '',
            'after'      => '',
            'divider'    => '',
            'class'      => '',
            'link_class' => '',
            'text_class' => ''
        ]);
        ob_start();
        foreach ( $entries as $entry )
        {
            $entry = wp_parse_args( $entry, array(
                'label' => '',
                'url'   => ''
            ) );

            if ( empty( $entry['label'] ) )
            {
                continue;
            }

            echo '<div class="breadcrumb-item">';

            if ( ! empty( $entry['url'] ) )
            {
                printf(
                    '<a class="breadcrumb-link '.$args['link_class'].'" href="%1$s">%2$s</a>%3$s',
                    esc_url( $entry['url'] ),
                    esc_attr( $entry['label'] ),
                    $args['divider']
                );
            }
            else
            {
                printf( '<span class="breadcrumb-text '.$args['text_class'].'" >%s</span>%2$s', $entry['label'], $args['divider'] );
            }

            echo '</div>';
        }

        $output = ob_get_clean();

        if ( $output )
        {
        	printf('%s', $args['before']);
            printf( '<div class="cms-breadcrumb %s">%s</div>', $args['class'], $output);
            printf('%s', $args['after']);
        }
    }
}