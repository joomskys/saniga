<?php
	$widget->add_render_attribute( 'socials-wrap', 'class', 'row gutters-5 gutters-grid');
	$widget->add_render_attribute( 'socials-wrap', 'class', 'justify-content-'.$widget->get_setting('row-align_mobile','center'));
	if(!empty($settings['row-align_tablet'])){
		$widget->add_render_attribute( 'socials-wrap', 'class', 'justify-content-md-'.$widget->get_setting('row-align_tablet',''));
	}
	if(!empty($settings['row-align'])) {
		$widget->add_render_attribute( 'socials-wrap', 'class', 'justify-content-lg-'.$widget->get_setting('row-align',''));
	}
?>
<div class="cms-socials-wrap">
	<div <?php etc_print_html($widget->get_render_attribute_string( 'socials-wrap' )); ?>>
		<?php foreach ($settings['social_list'] as $value): 
			$link_attrs = [];
			if ( ! empty( $value['social_link']['url'] ) ) {
				$link_attrs[] = 'href="'.$value['social_link']['url'].'"';
			}
		    if ( ! empty($value['social_link']['is_external'] )) {
		        $link_attrs[] = 'target="_blank"';
		    }
		    if ( ! empty($value['social_link']['nofollow'] )) {
		        $link_attrs[] = 'rel="nofollow"';
		    }
		    if( ! empty($value['social_link']['custom_attributes'])){
		    	$custom_attributes = explode('|', $value['social_link']['custom_attributes']);
		    	foreach ($custom_attributes as $atts_value) {
		    		$_custom_attributes = explode(':', $atts_value);
		    		$link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
		    	}
		    }
			$icon_color       = $widget->get_setting('social_icon_color', 'secondary');
			$icon_color_hover = $widget->get_setting('social_icon_color_hover', 'white');
			$bg_color         = $widget->get_setting('social_bg_color', 'transparent');
			$bg_color_hover   = $widget->get_setting('social_bg_color_hover', 'accent');
			$icon_size		  = !empty($widget->get_setting('social_size')['size']) ? $widget->get_setting('social_size')['size'] : '25';
			$icon_shape		  = $widget->get_setting('social_shape', 'circle');
		?>
		<div class="cms-social cms-social-item col-auto">
			<?php if ( ! empty( $link_attrs ) ){ ?>
    			<a <?php echo implode(' ', $link_attrs); ?>>
    		<?php }
	        	saniga_elementor_icon_render($settings,[
	        		'tag'		 => 'span',		
					'id'         => $value['social_icon'],
					'loop'       => true,
					'wrap_class' => 'transition d-block text-center icon-size-'.$icon_size.' bg-'.$bg_color.' bg-hover-'.$bg_color_hover.' cms-'.$icon_shape. ' text-'.$icon_color.' text-hover-'.$icon_color_hover,
					'class'      => '',
	        	]);
	        if ( ! empty( $link_attrs ) ) {  ?>
	        	</a>
	        <?php } ?>
		</div>    
		<?php endforeach; ?>
	</div>
</div>