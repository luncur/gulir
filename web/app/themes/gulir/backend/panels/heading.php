<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'gulir_register_options_heading' ) ) {
	function gulir_register_options_heading() {

		return [
			'id'     => 'gulir_config_section_heading',
			'title'  => esc_html__( 'Heading Design', 'gulir' ),
			'icon'   => 'el el-minus',
			'desc'   => esc_html__( 'The global heading settings for blocks, widgets, archives.', 'gulir' ),
			'fields' => [
				[
					'id'    => 'heading_layout_notice',
					'type'  => 'info',
					'style' => 'info',
					'desc' => esc_html__( 'You can also customize the color and layout of the individual headings in the live editor.', 'gulir' ),
				],
				[
					'id'    => 'heading_typo_notice',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit typography, navigate to "Typography > Block Heading".', 'gulir' ),
				],
				[
					'id'     => 'section_start_global_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global Heading', 'gulir' ),
					'indent' => true,
				],
				[
					'id'          => 'heading_layout',
					'title'       => esc_html__( 'Global Heading Layout', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a default heading layout for the archives and Elementor blocks for your site.', 'gulir' ),
					'description' => esc_html__( 'Navigate to "Typography Settings > Block Heading" to set the font values.', 'gulir' ),
					'type'        => 'select',
					'options'     => gulir_config_heading_layout(),
					'default'     => '1',
				],
				[
					'id'          => 'heading_color',
					'title'       => esc_html__( 'Primary Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a primary color for the heading.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'heading_sub_color',
					'title'       => esc_html__( 'Accent Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a accent color for the heading.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_heading_color',
					'title'       => esc_html__( 'Dark Mode - Primary Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a primary color for the heading in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_heading_sub_color',
					'title'       => esc_html__( 'Dark Mode - Accent Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a accent color for the heading in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_global_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_widget_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar Widget Heading', 'gulir' ),
					'indent' => true,
				],
				[
					'id'          => 'widget_heading_layout',
					'title'       => esc_html__( 'Widget Heading Layout', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a heading layout for the sidebar widgets.', 'gulir' ),
					'description' => esc_html__( 'Default layout is based on the "Global Heading Layout" setting.', 'gulir' ),
					'type'        => 'select',
					'options'     => gulir_config_heading_layout( true ),
					'default'     => '0',
				],
				[
					'id'       => 'footer_widget_heading_layout',
					'title'    => esc_html__( 'Footer Widget Heading Layout', 'gulir' ),
					'subtitle' => esc_html__( 'Select a heading layout for the footer column widgets.', 'gulir' ),
					'type'     => 'select',
					'options'  => gulir_config_heading_layout( true ),
					'default'  => '10',
				],
				[
					'id'          => 'widget_heading_tag',
					'title'       => esc_html__( 'Widget Heading HTML Tag', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a title HTML tag for the sidebar widget heading.', 'gulir' ),
					'description' => esc_html__( 'The default tag is H4.', 'gulir' ),
					'type'        => 'select',
					'options'     => gulir_config_heading_tag(),
					'default'     => '0',
				],
				[
					'id'     => 'section_end_widget_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_heading_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Heading Color', 'gulir' ),
					'indent' => true,
				],
				[
					'id'          => 'heading_color',
					'title'       => esc_html__( 'Primary Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a primary color for the heading.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'heading_sub_color',
					'title'       => esc_html__( 'Accent Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a accent color for the heading.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],

				[
					'id'          => 'dark_heading_color',
					'title'       => esc_html__( 'Dark Mode - Primary Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a primary color for the heading in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_heading_sub_color',
					'title'       => esc_html__( 'Dark Mode - Accent Heading Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a accent color for the heading in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_heading_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}
