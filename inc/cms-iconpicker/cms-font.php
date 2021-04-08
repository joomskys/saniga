<?php
add_action( 'admin_enqueue_scripts', function(){
      wp_enqueue_style( 'font-saniga', get_template_directory_uri() . '/assets/fonts/font-saniga/flaticon.css', array(), '1.0.0'  );
} );
// add icon to cms icon picker 
if(!function_exists('saniga_iconpicker')){
    add_filter("redux_cms_iconpicker_field/get_icons", 'saniga_iconpicker');
    function saniga_iconpicker($icons){
        unset($icons['New in 4.6']);
        unset($icons['Web Application Icons']);
        unset($icons['Medical Icons']);
        unset($icons['Text Editor Icons']);
        unset($icons['Spinner Icons']);
        unset($icons['File Type Icons']);
        unset($icons['Directional Icons']);
        unset($icons['Video Player Icons']);
        unset($icons['Form Control Icons']);
        unset($icons['Transportation Icons']);
        unset($icons['Chart Icons']);
        unset($icons['Brand Icons']);
        unset($icons['Hand Icons']);
        unset($icons['Payment Icons']);
        unset($icons['Currency Icons']);
        unset($icons['Accessibility Icons']);
        unset($icons['Gender Icons']);
        $icons['CMS Saniga'] = [
            array("flaticon-001-house"           =>  "house"),
            array("flaticon-002-shield"          =>  "shield"),
            array("flaticon-003-glass"           =>  "glass"),
            array("flaticon-004-cleaning"        =>  "cleaning"),
            array("flaticon-005-hand"            =>  "hand"),
            array("flaticon-006-dryer"           =>  "dryer"),
            array("flaticon-007-sanitary-towel"  =>  "sanitary-towel"),
            array("flaticon-008-hand"            =>  "hand"),
            array("flaticon-009-sanitizer"       =>  "sanitizer"),
            array("flaticon-010-spray"           =>  "spray"),
            array("flaticon-011-toilet"          =>  "toilet"),
            array("flaticon-012-tap"             =>  "tap"),
            array("flaticon-013-bleach"          =>  "bleach"),
            array("flaticon-014-reject"          =>  "reject"),
            array("flaticon-015-brush"           =>  "brush"),
            array("flaticon-016-tissues"         =>  "tissues"),
            array("flaticon-017-soap"            =>  "soap"),
            array("flaticon-018-pot"             =>  "pot"),
            array("flaticon-019-thermometer"     =>  "thermometer"),
            array("flaticon-020-character"       =>  "character"),
            array("flaticon-021-tap"             =>  "tap"),
            array("flaticon-022-bottle"          =>  "bottle"),
            array("flaticon-023-pipette"         =>  "pipette"),
            array("flaticon-024-foot"            =>  "foot"),
            array("flaticon-025-products"        =>  "products"),
            array("flaticon-026-bucket"          =>  "bucket"),
            array("flaticon-027-washing-machine" =>  "washing-machine"),
            array("flaticon-028-gloves"          =>  "gloves"),
            array("flaticon-029-pool"            =>  "pool"),
            array("flaticon-030-facemask"        =>  "facemask"),
            array("flaticon-031-toilet"          =>  "toilet"),
            array("flaticon-032-sink"            =>  "sink"),
            array("flaticon-033-bath"            =>  "bath"),
            array("flaticon-034-roll"            =>  "roll"),
            array("flaticon-035-soap"            =>  "soap"),
            array("flaticon-036-cream"           =>  "cream"),
            array("flaticon-037-towel"           =>  "towel"),
            array("flaticon-038-chopping-board"  =>  "chopping-board"),
            array("flaticon-039-toilet-brush"    =>  "toilet-brush"),
            array("flaticon-040-dispenser"       =>  "dispenser")
        ];
        return $icons;
    }
}