<div class="cms-breadcrumb-wrapper <?php echo saniga_elementor_align_class($settings);?>">
	<?php
		$divider = wp_parse_args($settings['breadcrumb_separator'],[
			'value'   => 'cmsi-angle-right',
			'library' => 'cmsi'
		]);
		if(empty($divider['value'])) $divider['value'] = 'cmsi-angle-right';
		saniga_breadcrumb([
            'show_breadcrumb' => '1',
            'class'           => 'text-14 pt-15 justify-content-'.$widget->get_setting('text-align', 'center'),
            'link_class'      => 'text-'.$widget->get_setting('breadcrumb_link_color','white'),
            'text_class'      => 'text-'.$widget->get_setting('breadcrumb_color','white'),
            'divider'         => '<span class="breadcrumb-divider flip-rtl '.$divider['value'].' text-'.$widget->get_setting('breadcrumb_color','white').'"></span>'
        ]);
	?>
</div>