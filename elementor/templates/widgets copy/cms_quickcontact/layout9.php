<?php
	// Heading
	$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-16 lh-30 pb-35 mt-n8 '.saniga_elementor_align_class($settings));
	$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
	if ( $settings['heading_animation'] ) {
	    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
	}
	if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
	    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
	}
	// Description
	$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-14 lh-24');
	$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color',''));
	if ( $settings['description_animation'] ) {
	    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
	}
	if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
	    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
	}
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner">
		<?php if ( !empty($settings['heading_text']) ) { ?>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
	            echo esc_html($settings['heading_text']);
	        ?></div>
	    <?php } ?>
	    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
            echo wpautop($widget->get_setting('description_text','Please feel welcome to contact our friendly reception staff with any general or medical enquiry call us.')); 
        ?></div>
	    <div class="cms-contact-button text-19 p-tb-15 cms-heading">
	    	<?php 
	    		$phone_number = str_replace(' ', '', $widget->get_setting('phone_number','(002)01061245741'));
			?>
			<a href="tel:<?php echo esc_attr($phone_number);?>" class="text-<?php echo esc_attr($widget->get_setting('phone_text_color','accent'));?> text-hover-<?php echo esc_attr($widget->get_setting('phone_text_color_hover','white'));?>"><?php 
				saniga_elementor_icon_render($settings,['id' => 'phone_icon', 'tag' => 'span', 'class' => 'cms-phone-icon text-16', 'default_icon' => ['value' => 'cmsi-phone-alt','library' => 'cmsi'] ]);
				echo esc_html('&nbsp;'.$widget->get_setting('phone_number','(002) 01061245741'));
			?></a>
		</div>
		<?php if(!empty($settings['map_address'])){ ?>
			<div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
	            echo wpautop($widget->get_setting('map_address','')); 
	        ?></div>
	    <?php } ?>
        <?php if(!empty($settings['map_link'])){ ?>
		    <div class="map-image pt-20 empty-none font-700"><a href="<?php echo esc_url($settings['map_link']);?>" target="_blank" class="text-<?php echo esc_attr($settings['map_link_color']);?> text-hover-<?php echo esc_attr($settings['map_link_color_hover']); ?>"><span class="cms-icon cmsi-map-marker-alt mr-10"></span><span><?php esc_html_e('Get Directions', 'saniga'); ?></span></a></div>
		<?php } ?>
	</div>
</div>