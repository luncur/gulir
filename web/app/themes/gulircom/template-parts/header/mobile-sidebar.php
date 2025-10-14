<?php
/**
 * Template to display the mobile navigation, either AMP or fallback.
 *
 * @package Newskit
 */

if ( newskit_is_amp() ) : ?>
	<amp-sidebar id="mobile-sidebar" layout="nodisplay" side="right" class="mobile-sidebar">
		<button class="mobile-menu-toggle" on='tap:mobile-sidebar.toggle'>
			<?php echo wp_kses( newskit_get_icon_svg( 'close', 20 ), newskit_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'newskit' ); ?>
		</button>
<?php else : ?>
	<aside id="mobile-sidebar-fallback" class="mobile-sidebar">
		<button class="mobile-menu-toggle">
			<?php echo wp_kses( newskit_get_icon_svg( 'close', 20 ), newskit_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'newskit' ); ?>
		</button>
<?php endif; ?>

		<?php
		newskit_tertiary_menu();

		get_search_form();

		newskit_primary_menu();

		newskit_secondary_menu();

		newskit_social_menu_header();

		if ( true === get_theme_mod( 'slideout_widget_mobile', false ) && is_active_sidebar( 'header-1' ) ) {
			dynamic_sidebar( 'header-1' );
		}
		?>

<?php if ( newskit_is_amp() ) : ?>
	</amp-sidebar>
<?php else : ?>
	</aside>
<?php endif; ?>
