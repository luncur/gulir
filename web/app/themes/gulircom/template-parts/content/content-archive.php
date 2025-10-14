<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gulir
 */

// Get sponsors for this post.
if ( function_exists( 'gulir_get_all_sponsors' ) ) {
	$all_sponsors                    = gulir_get_all_sponsors( get_the_id(), null, 'post' );
	$native_sponsors                 = gulir_get_native_sponsors( $all_sponsors );
	$underwriter_sponsors            = gulir_get_underwriter_sponsors( $all_sponsors );
	$display_sponsors_and_categories = gulir_display_sponsors_and_categories( $native_sponsors );
	$display_sponsors_and_authors    = gulir_display_sponsors_and_authors( $native_sponsors );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php gulir_post_thumbnail( 'gulir-archive-image' ); ?>

	<div class="entry-container">
		<?php
		if ( 'page' !== get_post_type() ) {
			if ( ! empty( $native_sponsors ) ) {
				// Get label for native post sponsors.
				gulir_sponsor_label( $native_sponsors );
				if ( $display_sponsors_and_categories ) {
					gulir_categories();
				}
			} else {
				gulir_categories();
			}
		}
		?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php if ( is_archive() && get_theme_mod( 'archive_show_subtitle', false ) && ! empty( gulir_post_subtitle() ) ) : ?>
				<div class="gulir-post-subtitle">
					<?php echo gulir_post_subtitle(); ?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( 'page' !== get_post_type() ) : ?>
			<?php if ( ! empty( $native_sponsors ) ) : ?>
				<div class="entry-meta entry-sponsor">
					<?php
					if ( $display_sponsors_and_authors ) :
						gulir_posted_by();
					endif;
					?>
					<?php gulir_sponsor_logo_list( $native_sponsors ); ?>
					<span>
						<?php gulir_sponsor_byline( $native_sponsors ); ?>
					</span>
					<?php gulir_posted_on(); ?>
					<?php do_action( 'gulir_theme_entry_meta' ); ?>
				</div>
			<?php else : ?>
				<div class="entry-meta">
					<?php
						gulir_posted_by();
						gulir_posted_on();
						do_action( 'gulir_theme_entry_meta' );
					?>
				</div><!-- .meta-info -->
			<?php endif; ?>
		<?php endif; ?>
	</div><!-- .entry-container -->
</article><!-- #post-${ID} -->
