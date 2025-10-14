<?php
/**
 * The Events Calendar Compatibility File
 *
 * @link https://theeventscalendar.com/
 *
 * @package Gulir
 */

/**
 * Add a Customizer option to display the sidebar in the default Events template.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gulir_tec_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'gulir_tec_options',
		array(
			'title' => esc_html__( 'Gulir Options', 'gulir' ),
			'panel' => 'tribe_customizer',
		)
	);

	$wp_customize->add_setting(
		'gulir_tec_sidebar_single',
		array(
			'default'           => false,
			'sanitize_callback' => 'gulir_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'gulir_tec_sidebar_single',
		array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Show sidebar on single events', 'gulir' ),
			'section' => 'gulir_tec_options',
		)
	);
}
add_action( 'customize_register', 'gulir_tec_customize_register' );

/**
 * Show sidebar on this page
 */
function gulir_tec_show_sidebar() {
	$show_sidebar = false;
	if ( function_exists( 'tribe_is_event' ) && tribe_is_event() && is_single() && true === get_theme_mod( 'gulir_tec_sidebar_single', false ) ) {
		$show_sidebar = true;
	}

	return $show_sidebar;
}

/**
 * Add CSS Class when sidebar is enabled.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gulir_tec_body_classes( $classes ) {
	if ( gulir_tec_show_sidebar() ) :
		$classes[] = 'tec-sidebar';
	endif;
	return $classes;
}
add_filter( 'body_class', 'gulir_tec_body_classes' );
