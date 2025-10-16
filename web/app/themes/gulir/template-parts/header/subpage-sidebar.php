<?php
/**
 * Template to display the mobile navigation, either AMP or fallback.
 *
 * @package Gulir
 */

if ( gulir_is_amp() ) : ?>
	<amp-sidebar id="subpage-sidebar" layout="nodisplay" side="left" class="subpage-sidebar">
		<button class="subpage-toggle" on='tap:subpage-sidebar.toggle'>
			<?php echo wp_kses( gulir_get_icon_svg( 'close', 20 ), gulir_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'gulir' ); ?>
		</button>
<?php else : ?>
	<aside id="subpage-sidebar-fallback" class="subpage-sidebar">
		<button class="subpage-toggle">
			<?php echo wp_kses( gulir_get_icon_svg( 'close', 20 ), gulir_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'gulir' ); ?>
		</button>
<?php endif; ?>

		<?php
		gulir_tertiary_menu();

		gulir_primary_menu();

		gulir_secondary_menu();

		gulir_social_menu_header();

		if ( is_active_sidebar( 'header-1' ) ) {
			dynamic_sidebar( 'header-1' );
		}
		?>

<?php if ( gulir_is_amp() ) : ?>
	</amp-sidebar>
<?php else : ?>
	</aside>
<?php endif; ?>
