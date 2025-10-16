<?php
/**
 * The template for displaying Current Discussion on posts
 *
 * @package Gulir
 */

/* Get data from current discussion on post. */
$discussion    = gulir_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %1(X comments)$s */
	$meta_label = apply_filters( 'gulir_number_comments', sprintf( _n(
		'%d Comment',
		'%d Comments',
		$discussion->responses, 'gulir'
	), $discussion->responses ) );

} else {
	$meta_label = esc_html( apply_filters( 'gulir_no_comments', __( 'No comments', 'gulir' ) ) );
}
?>

<div class="discussion-meta">
	<p class="discussion-meta-info">
		<?php echo gulir_get_icon_svg( 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
