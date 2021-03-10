<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-19 lh-29 empty-none');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','secondary'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-14 lh-24 pt-15 empty-none');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color',''));
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
$widget->add_render_attribute( 'background', 'class', 'cms-radius-br-8 overflow-hidden' );
// Gradient
$gradient = 'cms-gradient-'.$widget->get_setting('background_overlay', '');
$widget->add_render_attribute( 'gradient', 'class', $gradient);
$widget->add_render_attribute( 'gradient', 'style', 'background-color:'.$widget->get_setting('gradient_bg_color','#f6f6f6'));
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'background' )); ?>>
	<div <?php etc_print_html($widget->get_render_attribute_string( 'gradient' )); ?>>
		<div class="cms-qc-content p-tb-60 p-lr-40">
			<?php saniga_elementor_icon_render($settings,['class'=>'text-50 lh-50 mb-15 text-'.$widget->get_setting('heading_color','secondary'), 'default_icon' => [ 'value' => 'medical medical-medical-history', 'library' => 'cms-medical'] ]); ?>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
	            echo esc_html($widget->get_setting('heading_text','Opening Hours'));
	        ?></div>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
	            echo wpautop($widget->get_setting('description_text','')); 
	        ?></div>
	        <div class="cms-qc-timetable-wrap text-14 pt-8">
		        <?php foreach ($settings['timetable'] as $value): ?>
					<div class="cms-qc-timetable">
						<div class="row gutters-10 align-items-center justify-content-between">
							<div class="col-auto">
							<?php 
					        	saniga_elementor_icon_render($settings,[
					        		'id'      => $value['timetable_icon'],
						            'loop'    => true,
						            'class'   => 'cms-qc-timetable-icon text-accent',
						            'tag'	  => 'span'
					        	]);
					        ?>
					        <span class="cms-qc-timetable-date"><?php echo esc_html($value['date']); ?></span>
					        </div>
					        <div class="col text-end">
					        	<div><span class="cms-timetable-time"><?php echo esc_html($value['time']); ?></span></div>
					        </div>
					    </div>
				    </div>      
				<?php endforeach; ?>
			</div>
	        <?php if(!empty($settings['phone_number'])): ?>
    		<div class="cms-contact-button pt-23 text-24 cms-heading font-400 empty-none">
    			<a href="tel:<?php echo esc_attr($widget->get_setting('phone_number','01061245741'));?>" class="text-<?php echo esc_attr($widget->get_setting('heading_color','secondary'));?>"><?php 
    				saniga_elementor_icon_render($settings,['id' => 'phone_icon', 'tag' => 'span', 'class' => 'cms-phone-icon', 'default_icon' => ['value' => 'cmsi-phone-alt','library' => 'cmsi'] ]);
    				echo esc_html('&nbsp;'.$widget->get_setting('phone_number','01061245741'));
    			?></a>
    		</div>
    		<?php endif; ?>
		</div>
	</div>
</div>