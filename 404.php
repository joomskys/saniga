<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Medisch
 */
$heading = saniga_get_opt('heading_404_page','');
$subheading = saniga_get_opt('subheading_404_page', '');
$content_404_page = saniga_get_opt( 'content_404_page', esc_html__('The webpage you are looking for is not here!', 'saniga'));
$btn_text_404_page = saniga_get_opt( 'btn_text_404_page', esc_html__('Back To Home', 'saniga') );
$icon = is_rtl() ? 'right' : 'left';
get_header();
?>
    <div class="container cms-content-container">
        <div id="cms-content-area" class="cms-content-area text-center">
            <div class="cms-heading text-100 lh-100 text-md-200 lh-md-200 text-accent"><?php echo esc_html__('404','saniga') ?></div>
            <div class="cms-heading text-xl-75 text-lg-45 text-25 empty-none"><?php echo esc_html($heading); ?></div>
            <div class="cms-heading text-xl-45 text-lg-30 text-20 empty-none"><?php echo esc_html($subheading); ?></div>
            <div class="cms-heading text-18 text-md-30 m-b20"><?php 
                printf('%s', $content_404_page);
            ?></div>
            <div class="mt-20">
                <a class="btn btn-xl btn-accent" href="<?php echo esc_url(home_url('/')); ?>">
                    <span class="cms-btn-content">
                        <span class="cms-btn-icon"><i class="cmsi-arrow-circle-<?php echo esc_attr($icon);?>"></i></span>
                        <span class="cms-btn-text"><?php 
                            printf('%s', $btn_text_404_page);
                        ?></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
<?php
get_footer();
