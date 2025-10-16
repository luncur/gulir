<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gulir
 */

// Get sponsors for this taxonomy archive.
if ( function_exists( 'gulir_get_all_sponsors' ) ) {
	$all_sponsors         = gulir_get_all_sponsors(
		get_the_id(),
		null,
		'post',
		[
			'maxwidth'  => 150,
			'maxheight' => 100,
		]
	);
	$native_sponsors      = gulir_get_native_sponsors( $all_sponsors );
	$underwriter_sponsors = gulir_get_underwriter_sponsors( $all_sponsors );
}
?>

<?php if ( gulir_is_sticky_animated_header() ) : ?>
	<?php // If the header is sticky, add a position observer. ?>
	<amp-position-observer target="" on="enter:headerFadeIn.start; exit:headerFadeOut.start;" layout="nodisplay"></amp-position-observer>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

		<?php
		if ( ! empty( $underwriter_sponsors ) ) :
			gulir_sponsored_underwriters_info( $underwriter_sponsors );
		endif;

		if ( ! empty( $native_sponsors ) ) :
			gulir_sponsor_footer_bio( $native_sponsors );
		endif;
		?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gulir' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gulir' ),
				'after'  => '</div>',
			)
		);

		if ( is_active_sidebar( 'article-2' ) && is_single() ) {
			dynamic_sidebar( 'article-2' );
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gulir_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	$show_author = ! empty( $native_sponsors ) ? gulir_display_sponsors_and_authors( $native_sponsors ) : true;
	if ( $show_author && ! is_singular( 'attachment' ) ) :
		get_template_part( 'template-parts/post/author', 'bio' );
	endif;
	?>

</article><!-- #post-${ID} -->
