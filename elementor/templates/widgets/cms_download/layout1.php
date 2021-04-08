<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-20 mt-n5 mb-5 text-'.$widget->get_setting('heading_text_color', 'primary'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay').'ms');
}
// Default Download Icon
ob_start();
	switch ($widget->get_setting('icon_type', 'img')) {
		case 'img':
	        saniga_elementor_image_render($settings,[
	            'class'       => 'cms-download-icon',
	            'default_img' => '/wp-content/themes/saniga/elementor/templates/widgets/cms_download/layout-images/download-icon.png',
	            'custom_size' => '32x32',
	            'before'		=> '<span class="cms-download-icon">',
			    'after'			=> '</span>'
	        ]);
	    break;
	    case 'icon':
	        saniga_elementor_icon_render($settings,[
	        	'tag'		   => 'span',
	            'wrap_class'   => 'cms-download-icon',
	            'class'        => 'text-32',
	            'default_icon' => [
	                'library' => 'cmsi',
	                'value'   => 'cmsi-folder-open'
	            ]
	        ]);
	    break;
	}
$icon = ob_get_clean();
?>
<div class="cms-downloads p-tb-50 p-lr-25 p-lr-md-50 bg-white cms-shadow-1 relative cms-divider cms-divider-top">
	<div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
        etc_print_html($widget->get_setting('heading_text','Download Brochure'));
    ?></div>
	<?php
		foreach ($settings['download_list'] as $value): 
		$link_attrs = [];
		if ( ! empty( $value['download_link']['url'] ) ) {
			$link_attrs[] = 'href="'.$value['download_link']['url'].'"';
		}
	    if ( ! empty($value['download_link']['is_external'] )) {
	        $link_attrs[] = 'target="_blank"';
	    }
	    if ( ! empty($value['download_link']['nofollow'] )) {
	        $link_attrs[] = 'rel="nofollow"';
	    }
	    if( ! empty($value['download_link']['custom_attributes'])){
	    	$custom_attributes = explode('|', $value['download_link']['custom_attributes']);
	    	foreach ($custom_attributes as $atts_value) {
	    		$_custom_attributes = explode(':', $atts_value);
	    		$link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
	    	}
	    }
	    $text_color = !empty($value['text_color']) ? $value['text_color'] : 'white';
	    $bg_color = !empty($value['bg_color']) ? $value['bg_color'] : 'secondary';
	?>
    <div class="cms-download cms-download-item bg-<?php echo esc_attr($bg_color);?> link-<?php echo esc_attr($text_color);?> mt-20 font-700">
		<a <?php echo implode(' ', $link_attrs); ?>>
			<?php 
			ob_start();
			switch ($value['download_icon_type']) {
				case 'icon':
					saniga_elementor_icon_render($settings,[
			    		'tag'		 => 'span',		
						'id'         => $value['download_icon'],
						'loop'       => true,
						'wrap_class' => 'cms-download-icon',
						'class'      => 'text-32',
						'default_icon' => [
							'library' => 'cmsi',
							'value'   => 'cmsi-folder-open'
						]
			    	]);
					break;
				case 'img':
					saniga_elementor_image_render($value,[
						'id'		  => 'download_icon_img',
			            'class'       => 'cms-download-icon',
			            'default_img' => '/wp-content/themes/saniga/elementor/templates/widgets/cms_download/layout-images/download-icon.png',
			            'custom_size' => '32x32',
			            'before'		=> '<span class="cms-download-icon">',
			            'after'			=> '</span>'
			        ]);
					break;
			}
	    	$each_icon = ob_get_clean();
	    	if($value['download_icon_type'] === ''){
	    		$use_icon = $icon;
	    	} else {
	    		$use_icon = $each_icon;
	    	}
	    	etc_print_html($use_icon .'<span class="cms-download-text">' .$value['download_title'].'</span>');
	    	?>
    	</a>
    </div>  
	<?php endforeach; ?>
</div>
