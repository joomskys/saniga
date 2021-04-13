<?php

class ETC_CmsNewsletter_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_newsletter';
    protected $title = 'CMS Newsletter';
    protected $icon = 'eicon-mail';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/saniga\/wp-content\/themes\/saniga\/elementor\/templates\/widgets\/cms_newsletter\/layout-images\/1.png"}},"prefix_class":"cms-newsletter-layout-"}]},{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"stamp","label":"Stamp","type":"media","default":{"url":"http:\/\/localhost\/saniga\/wp-content\/themes\/saniga\/assets\/images\/footer-layout\/stamp.png"},"label_block":true},{"name":"title","label":"Title","type":"textarea","placeholder":"Sign up for industry alerts, news and insights from Saniga.","label_block":true},{"name":"name_text","label":"Name Text","type":"text","placeholder":"Enter placeholder text","label_block":true,"condition":{"layout":["1"]}},{"name":"email_text","label":"Email Text","type":"text","placeholder":"Enter placeholder text","label_block":true,"condition":{"layout":["1"]}},{"name":"button_text","label":"Button Text","type":"text","placeholder":"Enter button text","label_block":true,"condition":{"layout":["1"]}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}