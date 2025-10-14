<?php
/**
 * Displays the footer widget area
 *
 * @package Gulir
 */

if ( is_active_sidebar( 'footer-2' ) ) : ?>
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Below Footer', 'gulir' ); ?>">
		<div class="wrapper">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- .wrapper -->
	</aside><!-- .widget-area -->
<?php endif; ?>
