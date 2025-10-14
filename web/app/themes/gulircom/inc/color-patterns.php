<?php
/**
 * Gulir Theme: Color Patterns
 *
 * @package Gulir
 */

/**
 * Generate the CSS for the current primary color.
 */
function gulir_custom_colors_css() {
	$colors = gulir_get_colors();
	$theme_css = '';
	$editor_css = '';

	// Front-end colors that require the theme_colors to be set to 'custom':
	if ( 'default' !== get_theme_mod( 'theme_colors', 'default' ) ) {

		$css_variables =  '
				--gulir-color-primary: ' . esc_attr( $colors['primary'] ) . ';
				--gulir-color-primary-variation: ' . esc_attr( gulir_adjust_brightness( $colors['primary'], -30 ) ) . ';
				--gulir-color-secondary: ' . esc_attr( $colors['secondary'] ) . ' !important;
				--gulir-color-secondary-variation: ' . esc_attr( gulir_adjust_brightness( $colors['secondary'], -40 ) ) . ';

				--gulir-color-primary-darken-5: ' . esc_attr( gulir_adjust_brightness( $colors['primary'], -5 ) ) . ';
				--gulir-color-primary-darken-10: ' . esc_attr( gulir_adjust_brightness( $colors['primary'], -10 ) ) . ';

				--gulir-color-primary-against-white: ' . esc_attr( gulir_color_with_contrast( $colors['primary'] ) ) . ';
				--gulir-color-secondary-against-white: ' . esc_attr( gulir_color_with_contrast( $colors['secondary'] ) ) . ';

				--gulir-color-primary-variation-against-white: ' . esc_attr( gulir_color_with_contrast( gulir_adjust_brightness( $colors['primary'], -30 ) ) ) . ';
				--gulir-color-secondary-variation-against-white: ' . esc_attr( gulir_color_with_contrast( gulir_adjust_brightness( $colors['secondary'], -40 ) ) ) . ';

				--gulir-color-against-primary: ' . esc_attr( $colors['primary_contrast'] ) . ';
				--gulir-color-against-secondary: ' . esc_attr( $colors['secondary_contrast'] ) . ';
		';

		$theme_css = '
			:root { ' . $css_variables . ' }
		';

		$editor_css = '
			:root .editor-styles-wrapper { ' . $css_variables . ' }
		';

		$theme_css .= '
			input[type="checkbox"]::before {
				background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' width=\'24\' height=\'24\'%3E%3Cpath d=\'M16.7 7.1l-6.3 8.5-3.3-2.5-.9 1.2 4.5 3.4L17.9 8z\' fill=\'' . esc_attr( $colors['secondary_contrast'] ) . '\'%3E%3C/path%3E%3C/svg%3E");
			}
		';

		if ( true === get_theme_mod( 'header_solid_background', false ) ) {
			$theme_css .= '
				.mobile-sidebar {
					background: ' . esc_attr( $colors['header'] ) . ';
				}

				.mobile-sidebar,
				.mobile-sidebar button:hover,
				.mobile-sidebar a,
				.mobile-sidebar a:visited,
				.mobile-sidebar .nav1 .sub-menu > li > a,
				.mobile-sidebar .nav1 ul.main-menu > li > a,
				.mobile-sidebar .nav3 a {
					color: ' . esc_attr( $colors['header_contrast'] ) . ';
				}
			';

			if ( isset( $colors['primary_menu'] ) && '' !== $colors['primary_menu'] ) {
				$theme_css .= '
					.h-sb .bottom-header-contain {
						background: ' . esc_attr( $colors['primary_menu'] ) . ';
					}

					.h-sb .bottom-header-contain .nav1 .main-menu > li,
					.h-sb .bottom-header-contain .nav1 .main-menu > li > a,
					.h-sb .bottom-header-contain #search-toggle {
						color: ' . esc_attr( $colors['primary_menu_contrast'] ) . ';
					}
				';
			}
		}

		if ( isset( $colors['footer'] ) && '' !== $colors['footer'] ) {
			$theme_css .= '
				.site-footer {
					background: ' . esc_attr( $colors['footer'] ) . ';
				}

				.site-footer,
				.site-footer a,
				.site-footer a:hover,
				.site-footer .widget-title,
				.site-footer .widgettitle,
				.site-info {
					color: ' . esc_attr( $colors['footer_contrast'] ) . ';
				}

				.site-footer a:hover,
				.site-footer .widget a:hover {
					opacity: 0.7;
				}

				.site-info .widget-area .wrapper,
				.site-info .site-info-contain:first-child {
					border-top-color: ' . esc_attr( gulir_adjust_brightness( $colors['footer'], -20 ) ) . ';
				}
			';
		}

		if ( ! is_child_theme() ) {
			$theme_css .= '
				.mobile-sidebar .nav3 a {
					background: transparent;
				}

				.mobile-sidebar .accent-header,
				.mobile-sidebar .article-section-title {
					border-color: ' . gulir_adjust_brightness( $colors['header'], -20 ) . ';
					color: ' . esc_attr( $colors['header_contrast'] ) . ';
				}
			';

			if ( true === get_theme_mod( 'header_solid_background', false ) ) {
				$theme_css .= '
					.mobile-sidebar .nav3 .menu-highlight a {
						background: ' . esc_attr( gulir_adjust_brightness( $colors['header'], -20 ) ) . ';
						color: ' . esc_attr( $colors['header_contrast'] ) . ';
					}
					.h-sb .site-header .nav3 a {
						background-color: ' . gulir_adjust_brightness( $colors['header'], -17 ) . ';
						color: ' . esc_attr( $colors['header_contrast'] ) . ';
					}
				';
			}

			if ( isset( $colors['footer'] ) && '' !== $colors['footer'] ) {
				$theme_css .= '
					.site-footer .footer-branding .wrapper,
					.site-footer .footer-widgets:first-child .wrapper {
						border-top: 0;
					}

					.site-footer .accent-header,
					.site-footer .article-section-title {
						border-color: ' . gulir_adjust_brightness( $colors['footer'], -20 ) . ';
					}

					.site-footer .accent-header,
					.site-footer .article-section-title {
						color: ' . esc_attr( $colors['footer_contrast'] ) . ';
					}
				';
			}

			if ( true === get_theme_mod( 'header_solid_background', false ) ) {
				$theme_css .= '
					/* Header solid background */
					.h-sb .middle-header-contain {
						background-color: ' . esc_attr( $colors['header'] ) . ';
					}
					.h-sb .top-header-contain {
						background-color: ' . esc_attr( gulir_adjust_brightness( $colors['header'], -10 ) ) . ';
						border-bottom-color: ' . esc_attr( gulir_adjust_brightness( $colors['header'], -15 ) ) . ';
					}
					.h-sb .site-header,
					.h-sb .site-title,
					.h-sb .site-title a:link,
					.h-sb .site-title a:visited,
					.h-sb .site-description,
					/* Header solid background; short height */
					.h-sb.h-sh .site-header .nav1 .main-menu > li,
					.h-sb.h-sh .site-header .nav1 ul.main-menu > li > a,
					.h-sb.h-sh .site-header .nav1 ul.main-menu > li > a:hover,
					.h-sb .top-header-contain,
					.h-sb .middle-header-contain {
						color: ' . esc_attr( $colors['header_contrast'] ) . ';
					}
				';
			}
		}
	}

	// Front-end colors that don't require the theme_colors to be set to 'custom':
	if ( gulir_get_mobile_cta_color() !== $colors['cta'] ) {
		$theme_css .= '
			.button.mb-cta,
			.button.mb-cta:not(:hover):visited,
			.tribe_community_edit .button.mb-cta {
				background-color: ' . esc_attr( $colors['cta'] ) . ';
				color: ' . esc_attr( $colors['cta_contrast'] ) . ';
			}
		';
	}

	// Set ads background color
	if ( 'default' !== get_theme_mod( 'ads_color', 'default' ) ) {
		$theme_css .= '
			.site .entry .entry-content .scaip .gulir_global_ad,
			.site .entry .entry-content .scaip .widget_gulir-ads-widget,
			.gulir_global_ad,
			.gulir_global_ad.global_above_header,
			.widget_gulir-ads-widget,
			div[class*="gulir-ads-blocks-ad-unit"] {
				background-color: ' . esc_attr( get_theme_mod( 'ads_color_hex', '#ffffff' ) ) . ';
			}
		';
	}

	$editor_css .= '
		/* This is editor CSS */

		/* Do not overwrite solid color pullquote or cover links */
		/*
		.block-editor-block-list__layout .block-editor-block-list__block a.more-link,
		.block-editor-block-list__layout .block-editor-block-list__block .has-text-color a,
		.block-editor-block-list__layout .block-editor-block-list__block .has-text-color a:hover,
		.block-editor-block-list__layout .block-editor-block-list__block .wp-block-pullquote.is-style-solid-color a,
		.block-editor-block-list__layout .block-editor-block-list__block .wp-block-cover a,
		.block-editor-block-list__layout .block-editor-block-list__block .wp-block-gulir-blocks-homepage-articles .entry-title a,
		.block-editor-block-list__layout .block-editor-block-list__block .wp-block-gulir-blocks-homepage-articles .entry-title a:hover,
		.block-editor-block-list__layout .block-editor-block-list__block .wp-block-cover .article-section-title {
			color: inherit;
		}
	*/
	';

	if ( 'default' !== get_theme_mod( 'ads_color', 'default' ) ) {
		$editor_css .= '
			.wp-block-gulir-ads-blocks-ad-unit > div {
				background-color: ' . esc_attr( get_theme_mod( 'ads_color_hex', '#ffffff' ) ) . ';
				padding: 8px;
			}
		';
	}

	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$theme_css = $editor_css;
	}

	return $theme_css;
}
