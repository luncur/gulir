<?php
/**
 * Gulir Newsletters Compatibility File
 *
 * @package Gulir
 */

/**
 * Enqueue Block Editor styles.
 */
function gulir_newsletters_enqueue_editor_styles() {
	add_editor_style( 'styles/gulir-newsletters-editor.css' );
}
add_action( 'gulir_newsletters_enqueue_block_editor_assets', 'gulir_newsletters_enqueue_editor_styles' );

/**
 * Custom MJML components attributes.
 *
 * @param array $attributes MJML component attributes.
 *
 * @return array MJML component attributes.
 */
function gulir_newsletters_mjml_component_attributes( $attributes ) {
	if ( isset( $attributes['css-class'] ) && 'image-caption' === $attributes['css-class'] ) {
		$attributes['align']   = 'left';
		$attributes['padding'] = '0';
	}
	return $attributes;
}
add_filter( 'gulir_newsletters_mjml_component_attributes', 'gulir_newsletters_mjml_component_attributes' );
