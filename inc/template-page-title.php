<?php
/**
 * Page title layout
 **/
if(!function_exists('saniga_page_title_layout')){
    function saniga_page_title_layout($args = []) {
        if(is_singular('cms-header-top') || is_singular('cms-footer') || is_404()) return;
		$show_pagetitle  = saniga_get_opts( 'pagetitle', '1' );
        if(is_singular('post')){
            $ptitle_layout =  saniga_get_opts( 'ptitle_layout', saniga_configs('single_post')['title_layout'] );
        } else {
            $ptitle_layout   = saniga_get_opts( 'ptitle_layout', saniga_configs('ptitle')['layout'] );
        }
		$show_title      = saniga_get_opts( 'ptitle_title_on', '1');
		$show_breadcrumb = saniga_get_opts( 'ptitle_breadcrumb_on', '1' );
        $show_scroll     = saniga_get_opts( 'ptitle_scroll_on', '0' );
    	if($show_pagetitle !== '1' || ($show_title !== '1' && $show_breadcrumb !== '1') ) return;

    	$args = wp_parse_args($args, [
    		'class' => ''
    	]);
    	?>
    	<div id="cms-pagetitle" class="cms-pagetitle cms-page-title-layout<?php echo esc_attr($ptitle_layout); ?> relative">
        	<div class="cms-page-title-overlay"></div>
        	<div class="container relative">
        		<div class="cms-page-title-inner">
        			<?php get_template_part( 'template-parts/page-title/layout', $ptitle_layout ); ?>
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
            'class'     => '',
            'sub_class' => '',
            'before'    => '',
            'after'     => ''
		]);
		$titles        = saniga_get_page_titles();
		$sub_title     = saniga_get_opts( 'sub_title','');

		printf('%s', $args['before']);
			if ( $titles['title'] ){
			    printf( '<div class="cms-page-title cms-heading text-25 %1$s">%2$s</div>',$args['class'], $titles['title'] );
			}
	        if(!empty($sub_title)) { 
	        	printf( '<div class="cms-page-sub-title cms-heading text-20 %1$s">%2$s</div>',$args['sub_class'], $sub_title);
	        }
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