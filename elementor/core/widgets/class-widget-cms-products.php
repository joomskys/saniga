<?php

class ETC_CmsProducts_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_products';
    protected $title = 'CMS Products';
    protected $icon = 'eicon-products';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/saniga\/wp-content\/themes\/saniga\/elementor\/templates\/widgets\/cms_products\/layout-images\/1.png"}},"prefix_class":"cms-products-layout-"}]},{"name":"content_section","label":"Content Settings","tab":"content","controls":[{"name":"limit","label":"Products to show","type":"number","default":8},{"name":"columns","label":"Number of Columns","type":"slider","range":{"":{"min":2,"max":6,"step":1}},"size_units":[""],"default":{"unit":"","size":4}},{"name":"order","label":"Order","type":"select","options":{"":"Default","ASC":"ASC","DESC":"DESC"}},{"name":"orderby","label":"Orderby","type":"select","options":{"":"Default","date":"Date","id":"ID","menu_order":"Menu Order","popularity":"Popularity","rand":"Random","rating":"Rating","title":"Title"}},{"name":"featured","label":"Only Featured?","type":"switcher"},{"name":"on_sale","label":"On Sale","type":"switcher"},{"name":"best_selling","label":"Best Selling","type":"switcher"},{"name":"top_rated","label":"Top Rated","type":"switcher"},{"name":"paginate","label":"Paginate","type":"switcher"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}