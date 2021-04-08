<?php
	$widget->add_render_attribute( 'qc-lists', 'class', 'row');
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-'.$widget->get_setting('row-align_mobile','center'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-md-'.$widget->get_setting('row-align_tablet','center'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-lg-'.$widget->get_setting('row-align','start'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-'.$widget->get_setting('text_color', 'body'));
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner">
		<div <?php etc_print_html($widget->get_render_attribute_string( 'qc-lists' )); ?>>
		<?php foreach ($settings['contact_list'] as $value): 
			$link_attrs = [];
			$link_attrs[] = 'class="link-'.$widget->get_setting('link_color', 'secondary').'"';
			if ( ! empty( $value['contact_list_text_link']['url'] ) ) {
				$url = str_replace(' ', '', $value['contact_list_text_link']['url']);
				$link_attrs[] = 'href="'.$url.'"';
			}
		    if ( ! empty($value['contact_list_text_link']['is_external'] )) {
		        $link_attrs[] = 'target="_blank"';
		    }
		    if ( ! empty($value['contact_list_text_link']['nofollow'] )) {
		        $link_attrs[] = 'rel="nofollow"';
		    }
		    if( ! empty($value['contact_list_text_link']['custom_attributes'])){
		    	$custom_attributes = explode('|', $value['contact_list_text_link']['custom_attributes']);
		    	foreach ($custom_attributes as $atts_value) {
		    		$_custom_attributes = explode(':', $atts_value);
		    		$link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
		    	}
		    }
		    $icon_color = !empty($value['contact_list_text_icon_color']) ? $value['contact_list_text_icon_color'] : $widget->get_setting('contact_list_icon_color', 'accent');
		?>
			<div class="cms-qc-list col-12 col-sm-auto text-<?php echo esc_attr($value['contact_list_text_color']);?>">
				<div class="row gutters-10 align-items-center justify-content-center">
					<div class="col-auto">
					<?php 
			        	saniga_elementor_icon_render($settings,[
			        		'id'      => $value['contact_list_icon'],
				            'loop'    => true,
				            'class'   => 'text-'.$icon_color,
			        	]);
			        ?>
			        </div>
			        <div class="col">
			        	<div>
			        		<span class="cms-contact-title"><?php
			        			echo esc_html($value['contact_list_title_1']); 
			        		?></span>
			        		<?php
			        		if ( ! empty( $link_attrs ) ){
		        			?>
		        				<a <?php echo implode(' ', $link_attrs); ?>><?php 
		        			}
			        			echo esc_html($value['contact_list_text_1']);
			        		if ( ! empty( $link_attrs ) ) { 
			        			?></a><?php 
			        		}
			        	?></div>
			        	<div><span class="cms-contact-title"><?php echo esc_html($value['contact_list_title_2']); ?></span> <?php echo esc_html($value['contact_list_text_2']); ?></div>
			        </div>
			    </div>
		    </div>      
		<?php endforeach; ?>
		</div>
	</div>
</div>