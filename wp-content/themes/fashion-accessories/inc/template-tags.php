<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fashion Accessories
 * @subpackage fashion_accessories
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fashion_accessories_categorized_blog() {
	$fashion_accessories_category_count = get_transient( 'fashion_accessories_categories' );

	if ( false === $fashion_accessories_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$fashion_accessories_category_count = fashion_accessories_count( $categories );

		set_transient( 'fashion_accessories_categories', $fashion_accessories_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $fashion_accessories_category_count > 1;
}

if ( ! function_exists( 'the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since fashion_accessories
 */
function the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in fashion_accessories_categorized_blog.
 */
function fashion_accessories_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fashion_accessories_categories' );
}
add_action( 'edit_category', 'fashion_accessories_category_transient_flusher' );
add_action( 'save_post',     'fashion_accessories_category_transient_flusher' );