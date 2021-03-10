<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-19 lh-29 mt-n8');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','white'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-14 lh-24 p-tb-25');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color','white'));
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}
// Background image
$background_image = $settings['background_image']['url'];
if(!empty($background_image)){
	$widget->add_render_attribute( 'background', 'style', 'background-image:url('.$background_image.'); background-repeat: no-repeat; background-size: cover; background-position:center;');
}
$widget->add_render_attribute( 'background', 'class', 'bg-accent cms-radius-8 overflow-hidden' );
// Gradient
$gradient = 'cms-gradient-'.$widget->get_setting('background_overlay', '4');
$widget->add_render_attribute( 'gradient', 'class', $gradient);
$widget->add_render_attribute( 'gradient', 'style', 'background-color:'.$widget->get_setting('gradient_bg_color','#4aab3dE0'));
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'background' )); ?>>
	<div <?php etc_print_html($widget->get_render_attribute_string( 'gradient' )); ?>>
		<div class="p-tb-60 p-lr-40">
			<?php 
				saniga_elementor_icon_render($settings,[
					'class'        => 'text-50 lh-50 mb-15 text-'.$widget->get_setting('heading_color','white'), 
					'default_icon' => [ 
						'value'   => '', 
						'library' => ''
					]
				]); 
			?>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
	            etc_print_html($widget->get_setting(
	            	'heading_text',
	            	'Dedicated Customer Teams &  Agile Services'
	            ));
	        ?></div>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
	            echo wpautop($widget->get_setting(
	            	'description_text',
	            	'Our worldwide presence ensures the timeliness, cost efficiency compliance adherence required to ensure your production timelines are met.'
	            )); 
	        ?></div>
	        <?php 
	        	saniga_elementor_button_render($settings, [
	        		'prefix' => 'btn2',
	        		'class'	 => 'mt-10 mb-20'
	        	]); 
	        ?>
    		<div class="cms-contact-button text-24 cms-heading font-400 mb-n10">
    			<a href="tel:<?php echo esc_attr($widget->get_setting('phone_number','01061245741'));?>" class="text-<?php echo esc_attr($widget->get_setting('heading_color','white'));?> text-hover-white"><?php 
    				saniga_elementor_icon_render($settings,[
						'id'           => 'phone_icon', 
						'tag'          => 'span', 
						'class'        => 'cms-phone-icon', 
						'default_icon' => [
							'value'   => 'cmsi-phone-alt',
							'library' => 'cmsi'
    					] 
    				]);
    				echo esc_html('&nbsp;'.$widget->get_setting('phone_number','01061245741'));
    			?></a>
    		</div>
		</div>
	</div>
</div>