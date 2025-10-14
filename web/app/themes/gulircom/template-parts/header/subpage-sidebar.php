<?php
/**
 * Template to display the mobile navigation, either AMP or fallback.
 *
 * @package Newskit
 */

if ( newskit_is_amp() ) : ?>
	<amp-sidebar id="subpage-sidebar" layout="nodisplay" side="left" class="subpage-sidebar">
		<button class="subpage-toggle" on='tap:subpage-sidebar.toggle'>
			<?php echo wp_kses( newskit_get_icon_svg( 'close', 20 ), newskit_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'newskit' ); ?>
		</button>
<?php else : ?>
	<aside id="subpage-sidebar-fallback" class="subpage-sidebar">
		<button class="subpage-toggle">
			<?php echo wp_kses( newskit_get_icon_svg( 'close', 20 ), newskit_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'newskit' ); ?>
		</button>
<?php endif; ?>

		<?php
		newskit_tertiary_menu();

		newskit_primary_menu();

		newskit_secondary_menu();

		newskit_social_menu_header();

		if ( is_active_sidebar( 'header-1' ) ) {
			dynamic_sidebar( 'header-1' );
		}
		?>

<?php if ( newskit_is_amp() ) : ?>
	</amp-sidebar>
<?php else : ?>
	</aside>
<?php endif; ?>
