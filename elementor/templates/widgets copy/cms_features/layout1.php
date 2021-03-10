<?php
	saniga_cms_features_list_render($widget, $settings, 1, [
		'heading_text'         => 'Speciality',
        'heading_icon'         => [],
        'feature_lists'        => [
        	['feature_text' => 'Cardiology']
        ],
        'feature_icon_color' => '435ba1',
        'bg' => $widget->get_setting('odd_bg','e6f8fb')
	]);
	saniga_cms_features_list_render($widget, $settings, 2, [
		'heading_text'         => 'Degrees',
        'heading_icon'         => [],
        'feature_lists'        => [
        	['feature_text' => 'M.D. of Medicine']
        ],
        'feature_icon_color' => '435ba1',
        'bg' => $widget->get_setting('even_bg','ffffff')
	]);
	saniga_cms_features_list_render($widget, $settings, 3, [
		'heading_text'         => 'Areas of Expertise	',
        'heading_icon'         => [],
        'feature_lists'        => [
        	['feature_text' => 'Cardiac Imaging – Non-invasive.'],
        	['feature_text' => 'Cardiac Rehabilitation and Exercise.'],
        	['feature_text' => 'Hypertrophic Cardiomyopathy.'],
        	['feature_text' => 'Inherited Heart Diseases.'],
        ],
        'feature_icon'         => [
			'value'   => 'cmsi-check',
			'library' => 'cmsi'
        ],
        'feature_icon_color' => '435ba1',
        'bg' => $widget->get_setting('odd_bg','e6f8fb')
	]);
	saniga_cms_features_list_render($widget, $settings, 4, [
		'heading_text'         => 'University',
        'heading_icon'         => [],
        'feature_lists'        => [
        	['feature_text' => '2307 Beverley Rd Brooklyn, New York 11226 United States.']
        ],
        'feature_icon_color' => '435ba1',
        'bg'					 => $widget->get_setting('even_bg','ffffff')
	]);
	saniga_cms_features_list_render($widget, $settings, 5, [
		'heading_text'         => 'Office',
        'heading_icon'         => [],
        'feature_lists'        => [
        	['feature_text' => 'Harvard University']
        ],
        'feature_icon_color' => '435ba1',
        'bg' => $widget->get_setting('odd_bg','e6f8fb')
	]);
	//saniga_cms_features_list_render($widget, $settings, 6, []);
	//saniga_cms_features_list_render($widget, $settings, 7, []);
	//saniga_cms_features_list_render($widget, $settings, 8, []);
	//saniga_cms_features_list_render($widget, $settings, 9, []);
	//saniga_cms_features_list_render($widget, $settings, 10, []);