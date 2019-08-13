<?php
/**
 * Load Filters.
 *
 * @package HB Charity
 */

if( !function_exists( 'hb_charity_search_form' ) ) :
	/**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
	function hb_charity_search_form() {
		$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			    	<div class="input-group stylish-input-group">
			    		<label class="screen-reader-text" for="s">' . __( 'Search for:', 'hb-charity' ) . '</label>
			    		<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" />
			    		<span class="input-group-addon">
			    			<button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'hb-charity' ).'">
			    				<span class="glyphicon glyphicon-search"></span>
			    			</button>
			    		</span>
			    	</div>
			    </form>';

		return $form;
	}
endif;
add_filter( 'get_search_form', 'hb_charity_search_form', 20 );

if( !function_exists( 'hb_charity_comment_form' ) ) :
	/**
     * Comment area of the theme.
     *
     * @since 1.0.0
     */
	function hb_charity_comment_form( $args ) {
	$args['class_form'] = __('comment-form', 'hb-charity');
	$args['title_reply'] = __('Leave a comment.','hb-charity');
	$args['title_reply_before'] = '<h5 class="reply-title">';
	$args['title_reply_after'] = '</h5>';
	$args['comment_notes_before'] = '<p>'. __( 'Your email address will not be published. Required fields are marked *.','hb-charity' ).'</p>';
	$args['comment_field'] = '<p><label for="comment">Comment</label>
							  <textarea id="comment" name="comment" rows="6" class="form-control" placeholder="'.''.'" aria-required="true"></textarea></p>';
	$args['class_submit'] = __('submit-btn', 'hb-charity'); // since WP 4.1
	$args['label_submit'] = __('Post A Comment', 'hb-charity');

	return $args;
}
endif;
add_filter( 'comment_form_defaults', 'hb_charity_comment_form' );


/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'hb_charity_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function hb_charity_excerpt_more( $more ) {
		return '';
	}
endif;
add_filter( 'excerpt_more', 'hb_charity_excerpt_more' );

if( !function_exists( 'hb_charity_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function hb_charity_excerpt_length( $length ) {
		$excerpt_length = get_theme_mod( 'charity_excerpt_length', 40 );
		if( !empty( $excerpt_length ) ) :
			return absint( $excerpt_length );
		else :
			return 40;
		endif;
	}
endif;
add_filter( 'excerpt_length', 'hb_charity_excerpt_length' );

if ( ! function_exists( 'hb_charity_exclude_category' ) ) :
	/*
	 * Exclude Categories From Blog Page
	 */
	function hb_charity_exclude_category( $query ) {
		if (
			! $query->is_main_query() &&
			! is_front_page() &&
			! is_admin()
		) {
			return;
		}

		$exclude_cat = get_theme_mod( 'charity_category_exclude', '' );
		if ( empty( $exclude_cat ) ) {
			return;
		}

		$exclude_cat = explode( ',', preg_replace( "/\s*,\s*/", ",", $exclude_cat ) );

		if ( ! empty( $exclude_cat ) ) {
			$query->set( 'category__not_in', $exclude_cat );
		}
	}
endif;
add_action( 'pre_get_posts', 'hb_charity_exclude_category' );


