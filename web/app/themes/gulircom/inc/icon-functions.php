<?php
/**
 * SVG icons related functions
 *
 * @package Gulir
 */

/**
 * Gets the SVG code for a given icon.
 */
function gulir_get_icon_svg( $icon, $size = 24, $title = '' ) {
	return Gulir_SVG_Icons::get_svg( 'ui', $icon, $size, $title );
}

/**
 * Gets the SVG code for a given social icon.
 */
function gulir_get_social_icon_svg( $icon, $size = 24, $title = '' ) {
	return Gulir_SVG_Icons::get_svg( 'social', $icon, $size, $title );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function gulir_get_social_link_svg( $uri, $size = 24, $title = '' ) {
	$svg = Gulir_SVG_Icons::get_social_link_svg( $uri, $uri, $title );

	$svg = apply_filters( 'gulir_get_social_link_svg', $svg, $uri, $size, $title );

	return wp_kses( $svg, gulir_sanitize_svgs() );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function gulir_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = gulir_get_social_link_svg( $item->url, 26 );
		if ( empty( $svg ) ) {
			$svg = gulir_get_icon_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'gulir_nav_menu_social_icons', 10, 4 );
