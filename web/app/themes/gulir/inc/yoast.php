<?php
/**
 * Gulir Theme: Yoast customizations.
 *
 * @package Gulir
 */

add_action( 'after_setup_theme', 'gulir_theme_yoast_init', 20 );

/**
 * Add support for the Bluesky contact method while Yoast doesn't.
 *
 * @return void
 */
function gulir_theme_yoast_init() {

	if ( class_exists( 'Yoast\WP\SEO\User_Meta\Framework\Additional_Contactmethods\Facebook' ) ) {
		require_once get_template_directory() . '/inc/yoast-bluesky-contact-method.php';
		add_filter(
			'wpseo_additional_contactmethods',
			function( $contact_methods ) {

				// Bail if the Bluesky contact method is already registered.
				foreach ( $contact_methods as $contact_method ) {
					if ( 'bluesky' === $contact_method->get_key() ) {
						return $contact_methods;
					}
				}
				$contact_methods[] = new Gulir_Theme_Bluesky();
				return $contact_methods;
			}
		);
	}
}
