<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Soapee
 */

/*
 * If the current post is protected by a password and 
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
$comments_number = absint( get_comments_number() );
$post_comments_form_on = saniga_get_opt( 'post_comments_form_on', true );
if($post_comments_form_on) : ?>
    <div id="comments" class="comments-area">
        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">
                <h3 class="comments-title"><?php
                    printf(
                        /* translators: 1: Number of comments, 2: Post title. */
                        _nx(
                            '%1$s Comment',
                            '%1$s Comments',
                            $comments_number,
                            'comments title',
                            'saniga'
                        ),
                        number_format_i18n( $comments_number )
                    );
                ?></h3>
                <ol class="commentlist">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'saniga_comment_list'
                        ) );
                    ?>
                </ol>
                <nav class="navigation comments-pagination mt-40 empty-none"><?php 
                    //the_comments_navigation(); 
                    paginate_comments_links([
                        'prev_text' => saniga_pagination_prev_text(),
                        'next_text' => saniga_pagination_next_text()
                    ]); 
                ?></nav>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'saniga' ); ?></p>
            <?php
            endif;

        endif; // Check for have_comments().
        comment_form(saniga_comment_form_args());
    ?>
    </div>
<?php endif;