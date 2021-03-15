<?php
	// button can add image url like: button_label="http://localhost/Saniga/wp-content/themes/saniga/assets/images/logo/logo.png" 
	$title = $widget->get_setting('title', esc_html__('Sign up for industry alerts, news and insights from Saniga.','saniga') );
	// Stamp
?>
<div class="relative">
	<div class="cms-newsletter-stamp absolute">
		<?php
			if(!empty($settings['stamp']['id'])){
				saniga_elementor_image_render($settings, [
					'id'          => 'stamp',
					'custom_size' => 'full'
				]);
			} else {
				echo '<img src="'.$settings['stamp']['url'].'" alt="saniga" />';
			}
		?>
	</div>
	<div class="cms-newsletter relative">
		<div class="row justify-content-between gutters-grid gutters-30">
			<div class="cms-newsletter-title col-auto">
				<div class="cms-heading text-18 lh-28 font-700"><?php 
				 etc_print_html($title);
				?></div>
			</div>
			<div class="cms-newsletter-form col-auto"><?php 
				echo do_shortcode('
					[newsletter_form button_label="'.$widget->get_setting('email_text',esc_html__('Subscribe','saniga')).'"]
						[newsletter_field name="first_name" label="" placeholder="'.$widget->get_setting('name_text',esc_html__('Your Name','saniga')).'"]
						[newsletter_field name="email" label="" placeholder="'.$widget->get_setting('email_text',esc_html__('Your Email Address','saniga')).'"]
					[/newsletter_form]
				');
			?></div>
		</div>
	</div>
</div>

