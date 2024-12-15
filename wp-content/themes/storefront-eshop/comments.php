<?php
/**
 * The template for displaying comments
 * @package Storefront Eshop
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
				$storefront_eshop_comment_count = get_comments_number();
				if ( '1' === $storefront_eshop_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'storefront-eshop' ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				} else {
					printf( // phpcs:ignore Standard.Category.SniffName.ErrorCode
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $storefront_eshop_comment_count, 'comments title', 'storefront-eshop' ) ),
						number_format_i18n( $storefront_eshop_comment_count ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'storefront-eshop' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>
</div>