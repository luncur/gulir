<?php
/**
 * Gulir Theme back compat functionality
 *
 * Prevents Gulir Theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Gulir
 */

/**
 * Prevent switching to Gulir Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Gulir Theme 1.0.0
 */
function gulir_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'gulir_upgrade_notice' );
}
add_action( 'after_switch_theme', 'gulir_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Gulir Theme on WordPress versions prior to 4.7.
 *
 * @since Gulir Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function gulir_upgrade_notice() {
	/* translators: %s: WordPress version used by current site. */
	$message = sprintf( __( 'Gulir Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'gulir' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Gulir Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function gulir_customize() {
	wp_die(
		sprintf(
			__( 'Gulir Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'gulir' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'gulir_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Gulir Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function gulir_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Gulir Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'gulir' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'gulir_preview' );
