<?php
if(!function_exists('saniga_custom_section_presets')){
    add_filter('etc-custom-section/custom-presets', 'saniga_custom_section_presets');
    function saniga_custom_section_presets(){
        return [
            1 => [
                [
                    'preset' => [50]
                ]
            ],
            2 => [
                [
                    'preset' => [50, 100]
                ],
                
            ],
            3 => [
                [
                    'preset' => [ 50, 50, 100 ],
                ],
            ],
            4 => [
                [
                    'preset' => [ 50, 50, 50, 50 ],
                ],
                [
                    'preset' => [ 100, 33, 33, 33 ],
                ],
            ],
            5 => [
                [
                    'preset' => [ 100, 50, 50, 50, 50 ],
                ],
                [
                    'preset' => [ 100, 25, 25, 25, 25 ],
                ]
            ],
            6 => [
                [
                    'preset' => [33, 33, 33, 33, 33, 33],
                ],
                [
                    'preset' => [100, 20, 20, 20, 20, 20],
                ],
            ]
        ];
    }
}