<?php
if(is_singular('post')){
    $ptitle_layout =  saniga_configs('single_post')['title_layout'];
} else {
    $ptitle_layout   = saniga_get_opts( 'ptitle_layout', saniga_configs('ptitle')['layout'] );
}
$icon_dir             = is_rtl() ? 'left' : 'right';
$breadcrumb_separator = '<span class="breadcrumb-divider cmsi-chevron-'.$icon_dir.'"></span>';
$breadcrumb_class     = 'cms-pagetitle-breadcrumb';
// show page title
switch ($ptitle_layout) {
    case '1':
            saniga_page_title(['class' => 'text-center text-lg-50 text-xl-75 font-700']);
            saniga_breadcrumb([
                'class'   => 'text-14 justify-content-center '.$breadcrumb_class, 
                'divider' => $breadcrumb_separator
            ]);
        break;
    case '2':
            saniga_breadcrumb([
                'class'   => 'justify-content-center pb-17 '.$breadcrumb_class, 
                'divider' => $breadcrumb_separator
            ]);
            saniga_page_title(['class' => 'text-xl-45 lh-1/3']);
        break;
    case '3':
        printf('%s', '<div class="row justify-content-between align-items-center">');
            saniga_page_title([
                'before' => '<div class="col-lg-6">',
                'after'  => '</div>'
            ]);
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6 text-lg-end">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
        printf('%s', '</div>');
        break;
    case '4':
        printf('%s', '<div class="row justify-content-between align-items-center">');
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
            saniga_page_title([
                'before' => '<div class="col-lg-6 text-lg-end">',
                'after'  => '</div>'
            ]);
        printf('%s', '</div>');
        break;
    case '5':
        printf('%s', '<div class="row justify-content-start">');
            saniga_page_title([
                'before' => '<div class="col-lg-6">',
                'after'  => '</div>'
            ]);
            printf('%s','<div class="col-12"></div>');
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
        printf('%s', '</div>');
        break;
     case '6':
        printf('%s', '<div class="row justify-content-end text-end">');
            saniga_page_title([
                'before' => '<div class="col-lg-6">',
                'after'  => '</div>'
            ]);
            printf('%s','<div class="col-12"></div>');
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
        printf('%s', '</div>');
        break;
    case '7':
        printf('%s', '<div class="row justify-content-start">');
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
            printf('%s','<div class="col-12"></div>');
            saniga_page_title([
                'before' => '<div class="col-lg-6">',
                'after'  => '</div>'
            ]);
        printf('%s', '</div>');
        break;
    case '8':
        printf('%s', '<div class="row justify-content-end">');
            saniga_breadcrumb([
                'before'  => '<div class="col-lg-6">',
                'after'   => '</div>',
                'divider' => $breadcrumb_separator,
                'class'   => $breadcrumb_class
            ]);
            printf('%s','<div class="col-12"></div>');
            saniga_page_title([
                'before' => '<div class="col-lg-6">',
                'after'  => '</div>'
            ]);
        printf('%s', '</div>');
        break;
    case '9':
        saniga_page_title([
            'before' => '<div class="text-center p-tb-lg-145">',
            'after'  => '</div>'
        ]);
        break;
    case '10':
        saniga_breadcrumb(['divider' => $breadcrumb_separator, 'class' => $breadcrumb_class.' text-14 justify-content-center']);
        break;
    case '11' :
        saniga_page_title(['class' => 'text-center text-xl-45']);
        saniga_breadcrumb([
            'class'   => 'justify-content-center '.$breadcrumb_class, 
            'divider' => $breadcrumb_separator
        ]);
    case '12' :
        saniga_page_title(['class' => 'text-center text-xl-75']);
        saniga_breadcrumb([
            'class'   => 'justify-content-center '.$breadcrumb_class, 
            'divider' => $breadcrumb_separator
        ]);
    break;
}