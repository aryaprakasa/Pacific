<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pacific
 */

if ( ! function_exists( 'pacific_posted_on' ) ) :
function pacific_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'pacific' ),
		$time_string 
	);

	echo '<span class="posted-on small-margin-bottom-small fat small"><strong>Date: </strong>' . $posted_on . '</span>'; 

}
endif;

if ( ! function_exists( 'pacific_entry_footer' ) ) :
	
	
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function pacific_categories_and_tags() {
		
	// Hide category and tag text for pages.
	if ( get_post_type() == 'post' ) {
		
		$categories_list = get_the_category_list( esc_html__( ', ', 'pacific' ) );
		if ( $categories_list && pacific_categorized_blog() ) {
			printf( '<span class="cat-links small-margin-right-small"><strong>' . __( 'Categories', 'pacific' ) . '</strong>' . '%1$s</span>', $categories_list ); 
		}

		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'pacific' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links small-margin-right-small"><strong>' . __( 'Tags', 'pacific' ) . '</strong>', $tags_list ); 
		}
	}


	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'pacific' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			esc_html__( 'Edit %s', 'pacific' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>',
		'',
		'button small black'
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pacific_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pacific_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pacific_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pacific_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pacific_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in pacific_categorized_blog.
 */
function pacific_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'pacific_categories' );
}
add_action( 'edit_category', 'pacific_category_transient_flusher' );
add_action( 'save_post',     'pacific_category_transient_flusher' );
