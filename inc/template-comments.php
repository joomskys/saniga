<?php
/**
 * Move comment field to bottom
 */
function saniga_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'saniga_comment_field_to_bottom' );

/**
 * Custom Comment List
 */
function saniga_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( ['comment', empty( $args['has_children'] ) ? '' : 'parent' ]) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner row gutters-15 gutters-lg-30 gutters-grid">
		        <?php if ($args['avatar_size'] != 0) : ?>
		        	<div class="comment-avatar col-auto empty-none"><?php
		        		echo get_avatar($comment, saniga_configs('comment')['avatar-size']); 
		        	?></div>
		        <?php endif; ?>
		        <div class="comment-content col">
		        	<div class="row gutters-10">
	        			<div class="cms-heading comment-title text-18 font-600 col-auto"><?php printf( '%s', get_comment_author_link() ); ?></div>
	        			<div class="comment-date empty-none col-auto text-secondary text-12"><?php echo get_comment_date().' - '.get_comment_time(); ?></div>
	        		</div>
		        	<div class="comment-meta">
		            	<div class="comment-rating empty-none"><?php
		            		/**
						 * The woocommerce_review_before_comment_meta hook.
						 *
						 * @hooked woocommerce_review_display_rating - 10
						 */
		            		if(is_singular('product')){
								do_action( 'woocommerce_review_before_comment_meta', $comment );
							}
						?></div>
						<div class="empty-none"><?php
							/**
							 * The woocommerce_review_meta hook.
							 *
							 * @hooked woocommerce_review_display_meta - 10
							 */
							if(is_singular('product')){
								do_action( 'woocommerce_review_meta', $comment );
							}
						?></div>
		            </div>
		            <div class="before-comment-text empty-none"><?php
		            	if(is_singular('product')){ do_action( 'woocommerce_review_before_comment_text', $comment ); }
		            ?></div>
		            <div class="comment-text empty-none"><?php 
		            	comment_text(); 
		            	/**
						 * The woocommerce_review_comment_text hook
						 *
						 * @hooked woocommerce_review_display_comment_text - 10
						 */
		            	if(is_singular('product')){
							do_action( 'woocommerce_review_comment_text', $comment );
						}
		            ?></div>
		            <div class="after-comment-text empty-none"><?php 
		            	if(is_singular('product')){ do_action( 'woocommerce_review_after_comment_text', $comment ); }
		            ?></div>
		            <div class="comment-reply"><?php
		            	$reply_icon = is_rtl() ? 'cmsi-arrow-left' : 'cmsi-arrow-right';
		            	comment_reply_link( array_merge( $args, array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text' => '<span class="'.$reply_icon.' pr-5 text-12"></span>'.esc_html__('Reply', 'saniga')
						) ) ); 
					?></div>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

/**
 * Comment form fields
**/
if(!function_exists('saniga_comment_form_args')){
	function saniga_comment_form_args($args = []){
		$args = wp_parse_args($args, []);
		$commenter = [
			'comment_author' => '',
			'comment_author_email' => ''
		];
		$icon = is_rtl() ? 'cmsi-arrow-left' : 'cmsi-arrow-right';
		$cms_comment_fields = array(
			'id_form'              => 'commentform',
			'title_reply'          => esc_attr__( 'Leave A Reply', 'saniga'),
			'title_reply_to'       => esc_attr__( 'Leave A Reply To ', 'saniga') . '%s',
 			'cancel_reply_link'    => esc_attr__( 'Cancel Reply', 'saniga'),
			'id_submit'            => 'submit',
			'class_submit'         => 'btn-primary btn-hover-accent btn-lg',
			'label_submit'         => esc_attr__( 'Submit Comment', 'saniga'),
			'submit_button'		   => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span class="cms-btn-content"><span class="cms-btn-icon"><span class="text-15 '.$icon.'"></span></span><span class="cms-btn-text">%4$s</span></span></button>',	
			'comment_notes_before' => '',
            'comment_field' 	   =>  '',
    	);

    	$cms_fields = [];
    	$cms_fields['open'] = '';
    	if(!is_user_logged_in()){
			$cms_fields['open'] .= saniga_comment_rating_fields([
				'echo' => false,
				'class' => 'mb-20'
			]);
			$cms_fields['open'] .= saniga_woocommerce_comment_rating_fields([
				'echo' => false,
				'class' => 'mb-20'
			]);
		}
		//open
    	$cms_fields['open'] .= '<div class="cms-comment-form-fields-wrap row gutters-40 gutters-grid">';
		// author
		$cms_fields['author'] = '<div class="comment-form-field comment-form-author col-lg-4 col-md-4 col-sm-12">'.
                	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                	'" size="30" placeholder="'.esc_attr__('Author', 'saniga').'"/></div>';
        // email 
        $cms_fields['email'] = '<div class="comment-form-field comment-form-email col-lg-4 col-md-4 col-sm-12">'.
                	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                	'" size="30" placeholder="'.esc_attr__('Email', 'saniga').'"/></div>';
        // website
        $cms_fields['website'] = '<div class="comment-form-field comment-form-website col-lg-4 col-md-4 col-sm-12">'.
                	'<input id="website" name="website" type="text" value="" size="30" placeholder="'.esc_attr__('Website', 'saniga').'"/></div>';
        //Close 
        $cms_fields['close'] = '</div>';

		$fields =  apply_filters( 'comment_form_default_fields', $cms_fields);
		$cms_comment_fields['fields'] = $fields;

		// Comment Field Message
		//$cms_comment_fields['comment_field'] = '';
		if(is_user_logged_in()){
			$cms_comment_fields['comment_field'] .= saniga_comment_rating_fields([
				'echo' => false,
				'class' => 'mt-20'
			]);
			$cms_comment_fields['comment_field'] .= saniga_woocommerce_comment_rating_fields([
				'echo' => false,
				'class' => 'mt-20'
			]);
		}
		$cms_comment_fields['comment_field'] .= '<div class="cms-comment-form-fields-wrap cms-comment-form-fields-message row"><div class="comment-form-field comment-form-comment col-12"><textarea id="comment-msg" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Comment', 'saniga').'" aria-required="true">' .'</textarea></div></div>';

    	return $cms_comment_fields;
	}
}