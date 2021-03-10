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

// Time table timetable_color
$widget->add_render_attribute( 'timetable', 'class', 'cms-qc-timetable-wrap text-14 pt-8');
$widget->add_render_attribute( 'timetable', 'class', 'text-'.$widget->get_setting('timetable_color',''));
if($settings['timetable_color'] === 'custom' && !empty($settings['timetable_custom_color'])){
    $widget->add_render_attribute( 'timetable', 'style', 'color:'.$settings['timetable_custom_color']);
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
		<div class="cms-qc-content p-40">
			<?php saniga_elementor_icon_render($settings,['class'=>'text-50 lh-50 mb-15 text-'.$widget->get_setting('heading_color','secondary'), 'default_icon' => [ 'value' => 'medical medical-medical-history', 'library' => 'cms-medical'] ]); ?>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
	            echo esc_html($widget->get_setting('heading_text','Opening Hours'));
	        ?></div>
	        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
	            echo wpautop($widget->get_setting('description_text','')); 
	        ?></div>
    		<div class="map-image pt-15 empty-none cms-radius-4 overflow-hidden"><a href="<?php echo esc_url($settings['map_link']);?>" target="_blank"><?php saniga_elementor_image_render($settings, ['id' => 'map_image']);?></a></div>
		</div>
	</div>
</div>