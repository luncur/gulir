<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'gulir_register_options_taxonomy' ) ) {
	function gulir_register_options_taxonomy() {

		$fields = [
			[
				'id'       => 'section_start_tax_header',
				'type'     => 'section',
				'class'    => 'ruby-section-start',
				'title'    => esc_html__( 'Taxonomy Header', 'gulir' ),
				'subtitle' => esc_html__( 'Please ensure that you construct the header template or add an H1 taxonomy somewhere if you choose to disable the header to avoid SEO issues.', 'gulir' ),
				'indent'   => true,
			],
			[
				'id'       => 'tax_header',
				'title'    => esc_html__( 'Taxonomy Header', 'gulir' ),
				'subtitle' => esc_html__( 'Disable or select a style for the taxonomy header.', 'gulir' ),
				'type'     => 'select',
				'options'  => gulir_config_archive_header( true ),
				'default'  => '0',
			],
			[
				'id'     => 'section_end_tax_header',
				'type'   => 'section',
				'class'  => 'ruby-section-end',
				'indent' => false,
			],
			[
				'id'     => 'section_start_tax_posts_per_page',
				'type'   => 'section',
				'class'  => 'ruby-section-start',
				'title'  => esc_html__( 'Posts per Page', 'gulir' ),
				'indent' => true,
			],
			[
				'id'          => 'tax_posts_per_page',
				'title'       => esc_html__( 'Posts per Page', 'gulir' ),
				'subtitle'    => esc_html__( 'Input posts per page for the taxonomy.', 'gulir' ),
				'description' => esc_html__( 'The posts per page of the archive will apply if it is empty.', 'gulir' ),
				'type'        => 'text',
				'class'       => 'small',
				'validate'    => 'numeric',
			],
			[
				'id'     => 'section_end_tax_posts_per_page',
				'type'   => 'section',
				'class'  => 'ruby-section-end',
				'indent' => false,
			],
			[
				'id'     => 'section_start_tax_template_global',
				'type'   => 'section',
				'class'  => 'ruby-section-start',
				'title'  => esc_html__( 'Global Listing Template', 'gulir' ),
				'notice' => [
					esc_html__( 'The AJAX methods in the builder pagination settings of the global query block are not available. Numeric pagination will be used as a fallback option for the taxonomy pages.', 'gulir' ),
					esc_html__( 'Create a blog listing layout with Ruby Template via Elementor page builder and assign the template shortcode here to create your own layout.', 'gulir' ),
					esc_html__( 'Ensure "Use WP Global Query" under "Template Builder - Global Query > Query Mode" has been set in a block of your template to help the system understand that it is the main query.', 'gulir' ),
				],
				'indent' => true,
			],
			[
				'id'          => 'tax_template_global',
				'title'       => esc_html__( 'Use Ruby Template for the Post Listing', 'gulir' ),
				'subtitle'    => esc_html__( 'Input a "Ruby Template" shortcode to display as the main blog posts for the taxonomy. e.g: [Ruby_E_Template id="1"]', 'gulir' ),
				'type'        => 'textarea',
				'placeholder' => '[Ruby_E_Template id="1"]',
				'class'       => 'ruby-template-input',
				'rows'        => 1,
			],
			[
				'id'     => 'section_end_tax_template_global',
				'type'   => 'section',
				'class'  => 'ruby-section-end',
				'indent' => false,
			],
		];

		$custom_taxonomy = apply_filters( 'ruby_taxonomies_config', [] );

		if ( ! empty( $custom_taxonomy ) && is_array( $custom_taxonomy ) ) {

			foreach ( $custom_taxonomy as $key => $taxonomy ) {
				$label = ! empty( $taxonomy['label'] ) ? $taxonomy['label'] : $key;

				$fields[] = [
					'id'     => 'section_start_custom_taxonomy_' . $key,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Taxonomy: ', 'gulir' ) . $label,
					'notice' => [
						esc_html__( 'These settings apply specifically to this taxonomy as global configurations and will override any global settings configured above.', 'gulir' ),
						esc_html__( 'You can configure settings for individual term slugs of this taxonomy on the edit term page.', 'gulir' ),
					],
					'indent' => true,
				];
				$fields[] = [
					'id'       => $key . '_tax_header',
					'title'    => $label . ' - ' . esc_html__( 'Taxonomy Header', 'gulir' ),
					'subtitle' => esc_html__( 'Disable or select a style for this taxonomy header.', 'gulir' ),
					'type'     => 'select',
					'options'  => gulir_config_archive_header( true ),
					'default'  => '0',
				];
				$fields[] = [
					'id'       => $key . '_tax_posts_per_page',
					'title'    => $label . ' - ' . esc_html__( 'Posts per Page', 'gulir' ),
					'subtitle' => esc_html__( 'Input posts per page for this taxonomy.', 'gulir' ),
					'type'     => 'text',
					'class'    => 'small',
					'validate' => 'numeric',
				];
				$fields[] = [
					'id'          => $key . '_tax_template_global',
					'title'       => $label . ' - ' . esc_html__( 'Use Ruby Template for the Post Listing', 'gulir' ),
					'subtitle'    => esc_html__( 'Input a "Ruby Template" shortcode to display as the main blog posts for this taxonomy. e.g: [Ruby_E_Template id="1"]', 'gulir' ),
					'type'        => 'textarea',
					'class'       => 'ruby-template-input',
					'placeholder' => '[Ruby_E_Template id="1"]',
					'rows'        => 1,
				];
				$fields[] = [
					'id'     => 'section_start_end_taxonomy_' . $key,
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				];
			}
		}

		return [
			'id'     => 'gulir_config_section_tax',
			'title'  => esc_html__( 'Taxonomy', 'gulir' ),
			'icon'   => 'el el-briefcase',
			'desc'   => esc_html__( 'The settings below allow you to create custom templates for all custom taxonomies created with third-party plugins such as Custom Post Type UI and Advanced Custom Fields (ACF). If no custom templates are set, the predefined blog layout settings from the archive panel will apply to the taxonomy page.', 'gulir' ),
			'fields' => $fields,
		];
	}
}
