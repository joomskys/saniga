<?php
	$widget->add_render_attribute( 'qc-lists', 'class', 'row');
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-'.$widget->get_setting('row-align_mobile','center'));
	if(!empty($settings['row-align_tablet'])){
		$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-md-'.$widget->get_setting('row-align_tablet',''));
	}
	if(!empty($settings['row-align'])) {
		$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-lg-'.$widget->get_setting('row-align',''));
	}
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-'.$widget->get_setting('text_color', 'body'));
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner p-30 p-lg-60">
		<div <?php etc_print_html($widget->get_render_attribute_string( 'qc-lists' )); ?>>
		<?php foreach ($settings['contact_list'] as $value): 
			$link_attrs = [];
			if ( ! empty( $value['contact_list_text_link']['url'] ) ) {
				$link_attrs[] = 'href="'.$value['contact_list_text_link']['url'].'"';
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
		    $icon_color = !empty($value['contact_list_text_icon_color']) ? $value['contact_list_text_icon_color'] : $widget->get_setting('contact_list_icon_color', 'primary');
		?>
			<div class="cms-qc-list col-12 text-<?php echo esc_attr($value['contact_list_text_color']);?>">
				<div class="row gutters-10 align-items-center">
					<div class="col-auto empty-none"><?php 
			        	saniga_elementor_icon_render($settings,[
			        		'id'      => $value['contact_list_icon'],
				            'loop'    => true,
				            'class'   => 'text-30 text-'.$icon_color,
			        	]);
			        ?></div>
			        <div class="col empty-none">
			        	<div>
			        		<div class="cms-heading text-17 cms-contact-title empty-none"><?php
			        			if ( ! empty( $link_attrs ) ){
		        			?>
		        				<a <?php echo implode(' ', $link_attrs); ?>><?php 
		        			}
			        			echo esc_html($value['contact_list_title_1']); 
			        		?></div>
			        		<?php
			        			echo esc_html($value['contact_list_text_1']);
			        		if ( ! empty( $link_attrs ) ) { 
			        			?></a><?php 
			        		}
			        	?></div>
			        	<div><div class="cms-heading text-17 cms-contact-title empty-none"><?php echo esc_html($value['contact_list_title_2']); ?></div> <?php echo esc_html($value['contact_list_text_2']); ?></div>
			        </div>
			    </div>
		    </div>      
		<?php endforeach; ?>
		</div>
		<?php 
			saniga_elementor_button_render($settings,[
				'prefix' => 'layout10',
				'class'  => 'mt-10'
            ]);
		?>
	</div>
</div>