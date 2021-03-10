<?php

class ETC_CmsLanguageSwitcher_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_language_switcher';
    protected $title = 'CMS Languae Switcher';
    protected $icon = 'eicon-posts-carousel';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Items Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"label":"Layout 1","image":"http:\/\/localhost\/Saniga\/wp-content\/themes\/saniga\/elementor\/templates\/widgets\/cms_language_switcher\/layout-image\/1.png"},"prefix_class":"cms-ls-layout-"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}