<?php
/**
 * Newskit Theme back compat functionality
 *
 * Prevents Newskit Theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Newskit
 */

/**
 * Prevent switching to Newskit Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Newskit Theme 1.0.0
 */
function newskit_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'newskit_upgrade_notice' );
}
add_action( 'after_switch_theme', 'newskit_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Newskit Theme on WordPress versions prior to 4.7.
 *
 * @since Newskit Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function newskit_upgrade_notice() {
	/* translators: %s: WordPress version used by current site. */
	$message = sprintf( __( 'Newskit Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'newskit' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Newskit Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function newskit_customize() {
	wp_die(
		sprintf(
			__( 'Newskit Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'newskit' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'newskit_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Newskit Theme 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function newskit_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Newskit Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'newskit' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'newskit_preview' );
