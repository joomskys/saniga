<?php
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-'.$widget->get_setting('row-align_mobile','start'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-md-'.$widget->get_setting('row-align_tablet','start'));
	$widget->add_render_attribute( 'qc-lists', 'class', 'text-lg-'.$widget->get_setting('row-align','end'));
	$backtotop_icon = saniga_get_opt('backtotop_icon', 'cmsi-long-arrow-up');
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner">
		<div class="row gutters-50">
			<div class="col">
				<div <?php etc_print_html($widget->get_render_attribute_string( 'qc-lists' )); ?>>
					<div class="cms-heading text-16 font-700 mb-35 text-secondary"><?php 
						etc_print_html($widget->get_setting('heading_text', 'Quick Contact')); 
					?></div>
					<div class="cms-desc text-14 pb-15 text-<?php echo esc_attr($widget->get_setting('description_color', 'white'));?>"><?php 
						etc_print_html($widget->get_setting('description_text', 'If you have any questions or need help, feel free to contact with our team.')); 
						?></div>
					<div class="cms-heading text-accent text-24 text-xl-37 font-400"><?php 
						etc_print_html($widget->get_setting('phone_number', '+02 01061245741')); 
					?></div>
					<div class="cms-email text-white font-700 pt-15">
						<a href="mailto:<?php echo esc_attr($widget->get_setting('email_text', 'info@cmssuperheroes.com'));?>">
							<?php etc_print_html($widget->get_setting('email_text', 'info@cmssuperheroes.com')); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="cms-qc-scroll col-auto">
				<a href="#" class="cms-scroll cms-qc-scroll-top text-center"><span class="cms-scroll-top-arrow cms-scroll-top-icon circle mb-10 cms-transition"><span class="<?php echo esc_attr($backtotop_icon);?>"></span></span><span class="cms-scroll-top-text font-700 text-14 lh-19"><?php etc_print_html($widget->get_setting('scroll_text', 'Scroll To Top'));?></span></a>
			</div>
		</div>
	</div>
</div>