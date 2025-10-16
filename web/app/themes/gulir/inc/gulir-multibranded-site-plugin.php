<?php
/**
 * Adds support to the Gulir Multi-branded site plugin
 *
 * @package Gulir
 */

/**
 * Register the colors users will be able to customize per brand using the Multi-branded site plugin.
 */
add_filter(
	'gulir_multibranded_site_theme_colors',
	function() {
		return [
			[
				'theme_mod_name' => 'primary_color_hex',
				'label'          => __( 'Primary Color', 'gulir' ),
				'default'        => 'default' !== get_theme_mod( 'theme_colors' ) ? get_theme_mod( 'primary_color_hex', gulir_get_primary_color() ) : gulir_get_primary_color(),
			],
			[
				'theme_mod_name' => 'secondary_color_hex',
				'label'          => __( 'Secondary Color', 'gulir' ),
				'default'        => 'default' !== get_theme_mod( 'theme_colors' ) ? get_theme_mod( 'secondary_color_hex', gulir_get_secondary_color() ) : gulir_get_secondary_color(),
			],
			[
				'theme_mod_name' => 'ads_color_hex',
				'label'          => __( 'Background color to the ads', 'gulir' ),
				'default'        => get_theme_mod( 'ads_color_hex', '#ffffff' ),
			],
			[
				'theme_mod_name' => 'header_color_hex',
				'label'          => __( 'Header background (Requires the Solid background option to be enabled)', 'gulir' ),
				'default'        => get_theme_mod( 'header_color_hex', '#666666' ),
			],
			[
				'theme_mod_name' => 'header_primary_menu_color_hex',
				'label'          => __( 'Background color to the primary menu (Requires the Solid background option to be enabled)', 'gulir' ),
				'default'        => get_theme_mod( 'header_primary_menu_color_hex', '' ),
			],
			[
				'theme_mod_name' => 'footer_color_hex',
				'label'          => __( 'Footer background color', 'gulir' ),
				'default'        => get_theme_mod( 'footer_color_hex', '#666666' ),
			],
		];
	}
);

/**
 * Custom ads color will only be applied if the ads_color theme_mod is set to 'custom', so we need to filter it if they are being set by the Gulir Multi-branded site plugin.
 */
add_filter(
	'theme_mod_ads_color',
	function( $value ) {
		if ( ( defined( 'WP_CLI' ) && WP_CLI ) || is_admin() || ! class_exists( 'Gulir_Multibranded_Site\Customizations\Theme_Colors' ) ) {
			return $value;
		}
		if ( Gulir_Multibranded_Site\Customizations\Theme_Colors::current_brand_has_custom_colors( [ 'ads_color_hex' ] ) ) {
			return 'custom';
		}
		return $value;
	}
);

/**
 * Custom colors will only be applied if the theme_colors theme_mod is set to 'custom', so we need to filter it if they are being set by the Gulir Multi-branded site plugin.
 */
add_filter(
	'theme_mod_theme_colors',
	function( $value ) {
		if ( ( defined( 'WP_CLI' ) && WP_CLI ) || is_admin() || ! class_exists( 'Gulir_Multibranded_Site\Customizations\Theme_Colors' ) ) {
			return $value;
		}
		if ( Gulir_Multibranded_Site\Customizations\Theme_Colors::current_brand_has_custom_colors( [ 'primary_color_hex', 'secondary_color_hex' ] ) ) {
			return 'custom';
		}
		return $value;
	}
);

/**
 * Custom colors will only be applied if the theme_colors theme_mod is set to 'custom', so we need to filter it if they are being set by the Gulir Multi-branded site plugin.
 */
add_filter(
	'theme_mod_header_color',
	function( $value ) {
		if ( ( defined( 'WP_CLI' ) && WP_CLI ) || is_admin() || ! class_exists( 'Gulir_Multibranded_Site\Customizations\Theme_Colors' ) ) {
			return $value;
		}
		if ( Gulir_Multibranded_Site\Customizations\Theme_Colors::current_brand_has_custom_colors( [ 'header_color_hex', 'header_primary_menu_color_hex', 'header_primary_menu_color_hex' ] ) ) {
			return 'custom';
		}
		return $value;
	}
);

/**
 * Custom colors will only be applied if the theme_colors theme_mod is set to 'custom', so we need to filter it if they are being set by the Gulir Multi-branded site plugin.
 */
add_filter(
	'theme_mod_footer_color',
	function( $value ) {
		if ( ( defined( 'WP_CLI' ) && WP_CLI ) || is_admin() || ! class_exists( 'Gulir_Multibranded_Site\Customizations\Theme_Colors' ) ) {
			return $value;
		}
		if ( Gulir_Multibranded_Site\Customizations\Theme_Colors::current_brand_has_custom_colors( [ 'footer_color_hex' ] ) ) {
			return 'custom';
		}
		return $value;
	}
);

/**
 * Certain customizer options make multibranded site excessively complicated, so they're removed when the plugin is active.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gulir_multibranded_remove_customizer_options( $wp_customize ) {
	// Remove the footer-specific logo controls from Site Identity.
	$wp_customize->remove_control( 'gulir_footer_logo' );
	$wp_customize->remove_control( 'footer_logo_size' );

	// Remove the alternative logo control from Header Settings > Subpage Header.
	$wp_customize->remove_control( 'gulir_alternative_logo' );
}
add_action( "customize_register", "gulir_multibranded_remove_customizer_options" );

/**
 * Filter the footer logo to return nothing when plugin is active.
 */
function gulir_multibranded_unset_footer_logo( $gulir_footer_logo ) {
	return '';
}
add_filter( 'theme_mod_gulir_footer_logo', 'gulir_multibranded_unset_footer_logo' );

/**
 * Filter the Subpage Header alternative logo to return nothing when plugin is active.
 */
function gulir_multibranded_unset_alternative( $gulir_alternative_logo ) {
	return '';
}
add_filter( 'theme_mod_gulir_alternative_logo', 'gulir_multibranded_unset_alternative' );
