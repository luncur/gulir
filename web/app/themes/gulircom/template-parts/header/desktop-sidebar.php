<?php
/**
 * Template to display a menu 'sidebar' on desktop.
 *
 * @package Gulir
 */

$slideout_sidebar_side = get_theme_mod( 'slideout_sidebar_side', 'left' );

if ( gulir_is_amp() ) : ?>
	<amp-sidebar id="desktop-sidebar" layout="nodisplay" side="<?php echo esc_attr( $slideout_sidebar_side ); ?>" class="desktop-sidebar">
		<button class="desktop-menu-toggle" on='tap:desktop-sidebar.toggle'>
			<?php echo wp_kses( gulir_get_icon_svg( 'close', 20 ), gulir_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'gulir' ); ?>
		</button>
<?php else : ?>
	<aside id="desktop-sidebar-fallback" class="desktop-sidebar dir-<?php echo esc_attr( $slideout_sidebar_side ); ?>">
		<button class="desktop-menu-toggle">
			<?php echo wp_kses( gulir_get_icon_svg( 'close', 20 ), gulir_sanitize_svgs() ); ?>
			<?php esc_html_e( 'Close', 'gulir' ); ?>
		</button>
<?php
endif;

dynamic_sidebar( 'header-1' );

if ( gulir_is_amp() ) :
?>
	</amp-sidebar>
<?php else : ?>
	</aside>
<?php endif; ?>
