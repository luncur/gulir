<?php
/**
 * Displays the footer widget area
 *
 * @package Gulir
 */

if ( is_active_sidebar( 'footer-1' ) ) : ?>

	<aside class="widget-area footer-widgets" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'gulir' ); ?>">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'footer-1' ) ) {
				dynamic_sidebar( 'footer-1' );
			}
			?>
		</div><!-- .wrapper -->
	</aside><!-- .widget-area -->

<?php endif; ?>
