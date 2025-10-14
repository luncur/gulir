<?php
/**
 * Newskit Newsletters Compatibility File
 *
 * @package Newskit
 */

/**
 * Enqueue Block Editor styles.
 */
function newskit_newsletters_enqueue_editor_styles() {
	add_editor_style( 'styles/newskit-newsletters-editor.css' );
}
add_action( 'newskit_newsletters_enqueue_block_editor_assets', 'newskit_newsletters_enqueue_editor_styles' );

/**
 * Custom MJML components attributes.
 *
 * @param array $attributes MJML component attributes.
 *
 * @return array MJML component attributes.
 */
function newskit_newsletters_mjml_component_attributes( $attributes ) {
	if ( isset( $attributes['css-class'] ) && 'image-caption' === $attributes['css-class'] ) {
		$attributes['align']   = 'left';
		$attributes['padding'] = '0';
	}
	return $attributes;
}
add_filter( 'newskit_newsletters_mjml_component_attributes', 'newskit_newsletters_mjml_component_attributes' );
