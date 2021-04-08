<?php
	$widget->add_render_attribute( 'qc-lists', 'class', 'row');
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-'.$widget->get_setting('row-align_mobile','center'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-md-'.$widget->get_setting('row-align_tablet','center'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'justify-content-lg-'.$widget->get_setting('row-align','start'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-'.$widget->get_setting('text_color3', 'body'));
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner">
		<div class="row gutters-20 align-items-center">
			<div class="col-auto empty-none"><?php 
				saniga_elementor_icon_render($settings,[
					'wrap_class' => 'circle text-20 bg-secondary text-center',
					'class'      => 'text-'.$widget->get_setting('icon_color', 'white')
				]); 
			?></div>
			<div class="col">
				<div class="cms-heading text-17 text-<?php echo esc_attr($widget->get_setting('heading_color','primary')); ?> mb-8"><?php 
					etc_print_html($widget->get_setting('heading_text', 'Quick Contact')); 
				?></div>
				<div <?php etc_print_html($widget->get_render_attribute_string( 'qc-lists' )); ?>>
				<?php foreach ($settings['contact_list3'] as $value): 
					$link_attrs = [];
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
				?>
					<div class="cms-qc-list col-12 text-<?php echo esc_attr($value['contact_list_text_color3']);?> text-14">
			        	<div class="cms-qc-list-item">
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
			        	<div class="cms-qc-list-item"><span class="cms-contact-title"><?php echo esc_html($value['contact_list_title_2']); ?></span> <?php echo esc_html($value['contact_list_text_2']); ?></div>
			        </div>      
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>