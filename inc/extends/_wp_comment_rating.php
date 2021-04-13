<?php
//Create the rating interface.
if(!function_exists('saniga_comment_rating_fields')){
	//add_action( 'comment_form_logged_in_after', 'saniga_comment_rating_fields' );
	//add_action( 'comment_form_after_fields', 'saniga_comment_rating_fields' );
	function saniga_comment_rating_fields ($echo = true) {
		$show_rating = saniga_get_opt('post_comments_rating_on','0');
		$rating = '';
		if('1' === $show_rating && is_singular('post')){
			$rating .= '<div class="cms-comment-form-rating cms-comment-form-fields-wrap row">';
				$rating .= '<div  class="comment-form-field col-auto">'. esc_html__('Your Rating','saniga').'<span class="required">*</span></div>';
				$rating .= '<div class="comment-form-field comments-rating col">';
					$rating .= '<span class="rating-container stars">';
						for ( $i = 5; $i >= 1; $i-- ) :
							$rating .= '<input type="radio" id="rating-'.$i.'" class="star-'.$i.'" name="rating" value="'.$i.'" />
										<label for="rating-'.$i.'"><span class="d-none">'.$i.'</span></label>';
						endfor;
						$rating .= '<input type="radio" id="rating-0" class="star-cb-clear star-0" name="rating" value="0" /><label for="rating-0"><span class="d-none">0</span></label>';
					$rating .= '</span>
				</div>
			</div>';
		}
		if($echo){
			printf('%s', $rating);
		} else {
			return $rating;
		}
	}
}
if(!function_exists('saniga_woocommerce_comment_rating_fields')){
	function saniga_woocommerce_comment_rating_fields($args =[]){
		$args = wp_parse_args($args, [
			'echo' => true,
			'class' => ''
		]);
		$rating = '';
		if(!function_exists('wc_review_ratings_enabled')) return;
		if (wc_review_ratings_enabled() && is_singular('product') ) {
			$rating .= '<div class="cms-comment-form-rating cms-comment-form-fields-wrap row align-items-center '.esc_attr($args['class']).'">';
				$rating .= '<div class="comment-form-field col-auto cms-heading font-700">' . esc_html__( 'Your rating', 'saniga' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</div>';
				$rating .= '<div class="comment-form-field comments-rating col">';
					$rating .= '<select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'saniga' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'saniga' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'saniga' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'saniga' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'saniga' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'saniga' ) . '</option>
					</select>';
				$rating .= '</div>';
			$rating .= '</div>';
		}
		if($args['echo']){
			printf('%s', $rating);
		} else {
			return $rating;
		}
	}
}
// add rating to after comment form fields
if(!function_exists('saniga_comment_rating_default_fields')){
	//add_filter('comment_form_default_fields', 'saniga_comment_rating_default_fields' );
	function saniga_comment_rating_default_fields ($fields) {
		$fields_rating = [];
		ob_start();
			saniga_comment_rating_fields();
			saniga_woocommerce_comment_rating_fields();
		$fields_rating['rating'] = ob_get_clean();
		$fields = array_merge($fields_rating, $fields);
		return $fields;
	}
}

//Save the new meta added by theme  submitted by the user.
if(!function_exists('saniga_comment_rating_save_comment_meta')){
	add_action( 'comment_post', 'saniga_comment_rating_save_comment_meta' );
	function saniga_comment_rating_save_comment_meta( $comment_id ) {
		// rating
		if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
		$rating = intval( $_POST['rating'] );
		// address
		if ( ( isset( $_POST['address'] ) ) && ( '' !== $_POST['address'] ) )
		$address = $_POST['address'];
		add_comment_meta( $comment_id, 'rating', $rating );
		add_comment_meta( $comment_id, 'address', $address );
	}
}
// Make the rating required.
if(!function_exists('saniga_comment_rating_require_rating')){
	add_filter( 'preprocess_comment', 'saniga_comment_rating_require_rating' );
	function saniga_comment_rating_require_rating( $commentdata ) {
		$show_rating = saniga_get_opt('post_comments_rating_on','0');
		if('1' !== $show_rating) return $commentdata;

		if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
		wp_die( esc_html__( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.','saniga' ) );
		return $commentdata;
	}
}

//Display the rating on a submitted comment.
if(!function_exists('saniga_comment_rating_display_rating')){
	//add_filter( 'comment_text', 'saniga_comment_rating_display_rating');
	function saniga_comment_rating_display_rating( $comment_text ){
		if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
			$stars = '<div class="stars">';
			for ( $i = 1; $i <= $rating; $i++ ) {
				$stars .= '<span class="rating-icon cms-rating-icon-filled"></span>';
			}
			$stars .= '</div>';
			$comment_text = $comment_text . $stars;
			return $comment_text;
		} else {
			return $comment_text;
		}
	}
}

//Get the average rating of a post.
if(!function_exists('saniga_comment_rating_get_average_ratings')){
	function saniga_comment_rating_get_average_ratings( $id ) {
		$comments = get_approved_comments( $id );
		if ( $comments ) {
			$i = 0;
			$total = 0;
			foreach( $comments as $comment ){
				$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
				if( isset( $rate ) && '' !== $rate ) {
					$i++;
					$total += $rate;
				}
			}

			if ( 0 === $i ) {
				return false;
			} else {
				return round( $total / $i, 1 );
			}
		} else {
			return false;
		}
	}
}
// Display the star average rating only
if(!function_exists('saniga_comment_rating_display_average')){
	function saniga_comment_rating_display_average() {

		global $post;

		if ( false === saniga_comment_rating_get_average_ratings( $post->ID ) ) {
			return false;
		}
		
		$stars   = '';
		$average = saniga_comment_rating_get_average_ratings( $post->ID );

		for ( $i = 1; $i <= $average + 1; $i++ ) {
			
			$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

			if ( 0 === $width ) {
				continue;
			}
			$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="rating-icon cms-rating-icon-filled"></span>';

			if ( $i - $average > 0 ) {
				$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="cms-rating-icon cms-rating-icon-empty"></span>';
			}
		}
		$custom_content  = '<div class="cms-average-rating cms-average-rating-star">' . $stars .'</div>';
		return $custom_content;
	}
}

//Display the average rating above the content.
if(!function_exists('saniga_comment_rating_display_average_rating')){
	//add_filter( 'the_content', 'saniga_comment_rating_display_average_rating' );
	function saniga_comment_rating_display_average_rating( $content ) {

		global $post;

		if ( false === saniga_comment_rating_get_average_ratings( $post->ID ) ) {
			return $content;
		}
		
		$stars   = '';
		$average = saniga_comment_rating_get_average_ratings( $post->ID );

		for ( $i = 1; $i <= $average + 1; $i++ ) {
			
			$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

			if ( 0 === $width ) {
				continue;
			}

			$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="rating-icon cms-rating-icon-filled"></span>';

			if ( $i - $average > 0 ) {
				$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="rating-icon cms-rating-icon-empty"></span>';
			}
		}
		
		$custom_content  = '<div class="average-rating">This post\'s average rating is: ' . $average .' ' . $stars .'</div>';
		$custom_content .= $content;
		return $custom_content;
	}
}
if(!function_exists('saniga_comment_rating_display_feedback')){
	function saniga_comment_rating_display_feedback($args=[]){
		$args = wp_parse_args($args,[
			'id'        => get_the_ID(),
			'mode'      => 'good', //bad
			'good_text' => esc_html__('positive feedback', 'saniga'),
			'bad_text'  => esc_html__('negative feedback', 'saniga'),
			'good_icon' => 'icofont-simple-smile',
			'bad_icon'  => 'icofont-sad'
		]);
		$comments = get_approved_comments( $args['id'] );
		if ( $comments ) {
			$i = 0;
			$total = 0;
			$good_rate = $bad_rate = 0;
			foreach( $comments as $comment ){
				$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
				if( isset( $rate ) && '' !== $rate ) {
					$i++;
					$total += $rate;
				}
				if(isset($rate) && $rate > 3){
					$good_rate ++;
				}
				if(isset($rate) && $rate <= 3){
					$bad_rate ++;
				}
			}

			if ( 0 === $i ) {
				return false;
			} else {
				//return  $total .' good:'.$good_rate.' bad:'.$bad_rate ;
				if($args['mode'] == 'good'){
					return '<span class="cms-rating-good text-accent text-17 '.$args['good_icon'].'"></span> <span class="cms-rating-percent text-accent font-700">'.number_format_i18n( $good_rate*100 / $i, 2 ).'%</span> '.$args['good_text'];
				} else {
					return '<span class="cms-rating-bad text-accent text-17 '.$args['bad_icon'].'"></span> <span class="cms-rating-percent text-accent font-700">'.number_format_i18n( $bad_rate*100 / $i, 2 ).'%</span> '.$args['bad_text'];
				}
			}
		} else {
			return false;
		}
	}
}

//Display the address on a submitted comment.
if(!function_exists('saniga_comment_display_address')){
	//add_filter( 'comment_text', 'saniga_comment_rating_display_rating');
	function saniga_comment_display_address(){
		$address =  get_comment_meta( get_comment_ID(), 'address', true ) ;
		if(empty($address)) return;
		?>
			<div class="cms-comment-address"><?php echo esc_html($address); ?></div>
		<?php
	}
}