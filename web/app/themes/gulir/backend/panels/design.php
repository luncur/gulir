<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'gulir_register_options_design' ) ) {
	function gulir_register_options_design() {

		return [
			'id'    => 'gulir_config_section_design',
			'title' => esc_html__( 'Theme Design', 'gulir' ),
			'icon'  => 'el el-idea',
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_category' ) ) {
	function gulir_register_options_design_category() {

		return [
			'id'         => 'gulir_config_section_design_category',
			'title'      => esc_html__( 'Entry Category', 'gulir' ),
			'desc'       => esc_html__( 'The category label display in the post listing.', 'gulir' ),
			'icon'       => 'el el-folder-open',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'category_color_notice',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit color for individual categories, navigate to "Admin Dashboard > Posts > Categories > Edit".', 'gulir' ),
				],
				[
					'id'       => 'section_start_entry_category_limit',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Limit Number of Category Icons', 'gulir' ),
					'subtitle' => esc_html__( 'The settings below apply to all post listings on your website. You can configure settings for individual posts under "Single Post > Entry Category".', 'gulir' ),
					'indent'   => true,
				],
				[
					'id'          => 'max_categories',
					'title'       => esc_html__( 'Max Category Icons if choose Category', 'gulir' ),
					'subtitle'    => esc_html__( 'Enter a value to limit the number of entry categories or taxonomies shown on all post listing layouts.', 'gulir' ),
					'description' => esc_html__( 'This is useful when you have multiple categories per post and have not set a primary category in the post settings. Leave it blank to display all categories.', 'gulir' ),
					'type'        => 'text',
					'class'       => 'small',
					'placeholder' => '1',
				],
				[
					'id'          => 'max_post_tags',
					'title'       => esc_html__( 'Max Category Icons if Choose Post Tags', 'gulir' ),
					'subtitle'    => esc_html__( 'In case you replace the category with post tags for the category icon, set the value to limit the number of tags.', 'gulir' ),
					'description' => esc_html__( 'This is useful when you have multiple tags per post and have not set a primary tag in the post settings. Leave it blank to display all tags.', 'gulir' ),
					'type'        => 'text',
					'class'       => 'small',
					'placeholder' => '1',
					'default'     => '1',
				],
				[
					'id'     => 'section_end_entry_category_limit',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_entry_category_color',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Global Category Colors', 'gulir' ),
					'subtitle' => esc_html__( 'These settings apply to all category icons. To customize a specific category, go to the Category Edit page.', 'gulir' ),
					'indent'   => true,
				],
				[
					'id'          => 'category_highlight_color',
					'title'       => esc_html__( 'Highlight Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a highlight color for the entry category to display in the post listing.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'category_color',
					'title'       => esc_html__( 'Accent Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select an accent (text) color for the entry category to display in the post listing. Leave blank to set it as the default.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'category_dark_highlight_color',
					'title'       => esc_html__( 'Dark Mode - Highlight Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a highlight color for the entry category to display in the post listing in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'category_dark_color',
					'title'       => esc_html__( 'Dark Mode - Accent Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select an accent (text) color for the entry category to display in the post listing in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'     => 'section_end_entry_category_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_meta' ) ) {
	/**
	 * @return array
	 * post entry meta
	 */
	function gulir_register_options_design_meta() {

		return [
			'id'         => 'gulir_config_section_meta_style',
			'title'      => esc_html__( 'Entry Meta', 'gulir' ),
			'desc'       => esc_html__( 'These are small elements that display in the post listing e.g: author name, date, total views, total comments...', 'gulir' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_view_meta',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The view meta requests the "Post Views Counter" plugin to function.', 'gulir' ),
				],
				[
					'id'     => 'section_start_meta_divider',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'meta_divider',
					'title'    => esc_html__( 'Divider Style', 'gulir' ),
					'subtitle' => esc_html__( 'Select a divider style between entry metas.', 'gulir' ),
					'type'     => 'select',
					'options'  => [
						'default'     => esc_html__( 'Vertical Line', 'gulir' ),
						'line'        => esc_html__( 'Solid Line', 'gulir' ),
						'gray-line'   => esc_html__( 'Gray Solid Line', 'gulir' ),
						'dot'         => esc_html__( 'Dot', 'gulir' ),
						'gray-dot'    => esc_html__( 'Gray Dot', 'gulir' ),
						'none'        => esc_html__( 'White Spacing', 'gulir' ),
						'wrap'        => esc_html__( 'Line Wrap', 'gulir' ),
						'gray-dslash' => esc_html__( 'Gray Double Slash', 'gulir' ),
						'dslash'      => esc_html__( 'Double Slash', 'gulir' ),
					],
					'default'  => 'default',
				],
				[
					'id'          => 'meta_tax_style',
					'title'       => esc_html__( 'Taxonomy Meta Style', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a style for taxonomy terms such as categories or tags displayed in the entry meta bar.', 'gulir' ),
					'description' => esc_html__( 'This setting applies to term for categories, tags, and custom taxonomies displayed in the post entry meta bar. Highlight and accent colors set in individual term will be applied when choose the background style.', 'gulir' ),
					'type'        => 'select',
					'options'     => [
						'1' => esc_html__( 'Text Only', 'gulir' ),
						'2' => esc_html__( 'Background', 'gulir' ),
						'3' => esc_html__( 'Outline', 'gulir' ),
					],
					'default'     => '1',
				],
				[
					'id'     => 'section_end_meta_divider',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_entry_meta_limit',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Tag & Taxonomy', 'gulir' ),
					'indent' => true,
				],
				[
					'id'          => 'max_entry_meta',
					'title'       => esc_html__( 'Max Tags/Taxonomy Links', 'gulir' ),
					'subtitle'    => esc_html__( 'Input a value to limit the number of taxonomy links displayed in the entry meta bar.', 'gulir' ),
					'description' => esc_html__( 'This feature is useful when you have multiple tags, taxonomies per post. Enhancing the clarity of your blog layout.', 'gulir' ),
					'type'        => 'text',
					'class'       => 'small',
				],
				[
					'id'          => 'meta_tag_important',
					'title'       => esc_html__( 'Bold Style for Post Tag Meta', 'gulir' ),
					'subtitle'    => esc_html__( 'Highlight post tag meta with bold font settings.', 'gulir' ),
					'description' => esc_html__( 'The "Typography > Entry Meta > Important Meta Font" settings will apply to this meta.', 'gulir' ),
					'type'        => 'switch',
					'default'     => true,
				],
				[
					'id'       => 'meta_tag_label',
					'title'    => esc_html__( 'Tags Label', 'gulir' ),
					'subtitle' => esc_html__( 'Toggle the display of the "Tags:" label before the post tags.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_entry_meta_limit',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_eterm_color',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Important Term Colors', 'gulir' ),
					'subtitle' => esc_html__( 'To set individual category, tag, or taxonomy name colors, go to Edit Category/Tag/Taxonomy > Term Color > Term Name Text (for Entry Meta Bar).', 'gulir' ),
					'indent'   => true,
				],
				[
					'id'          => 'eterm_color',
					'title'       => esc_html__( 'Term Name Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color for important term names such as categories, tags, or taxonomies.', 'gulir' ),
					'description' => esc_html__( 'Leave blank to use the default color from the "Typography > Entry Meta > Important Meta Color" settings.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_eterm_color',
					'title'       => esc_html__( 'Dark Mode - Term Name Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color for important term names such as categories, tags, or taxonomies in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_eterm_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_meta_icons',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Icons', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'meta_author_label',
					'title'    => esc_html__( '"By" Author Label', 'gulir' ),
					'subtitle' => esc_html__( 'Show the "By" text before the post author meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_date_icon',
					'title'    => esc_html__( 'Published Date Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the icon before the post date meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_updated_icon',
					'title'    => esc_html__( 'Updated Date Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the clock icon before the post updated meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_comment_icon',
					'title'    => esc_html__( 'Comment Meta Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the icon before the post comment meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_view_icon',
					'title'    => esc_html__( 'Post View Meta Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the icon before the post view meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'          => 'meta_view_pretty_number',
					'title'       => esc_html__( 'Post Views in Readable Format', 'gulir' ),
					'subtitle'    => esc_html__( 'Enable to display post views using "M" for million and "k" for thousand formats for better readability.', 'gulir' ),
					'description' => esc_html__( 'If you are using the "Format Number" option for post views, it is recommended to disable this setting.', 'gulir' ),
					'type'        => 'switch',
					'default'     => true,
				],
				[
					'id'       => 'meta_read_icon',
					'title'    => esc_html__( 'Reading Time Meta Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the icon before the reading time meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_category_icon',
					'title'    => esc_html__( 'Category Meta Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show the icon before the post category meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_meta_icons',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_reading_speed',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Reading Speed', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'read_speed',
					'title'    => esc_html__( 'Words per Minute', 'gulir' ),
					'subtitle' => esc_html__( 'Input number of words per minute to calculate the reading time. Default is 130', 'gulir' ),
					'type'     => 'text',
					'class'    => 'small',
					'default'  => 130,
				],
				[
					'id'     => 'section_end_reading_speed',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_human_time',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Human Time', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'human_time',
					'title'    => esc_html__( 'Display Human Time (Ago)', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable the human time format ("ago") for the data post entry meta.', 'gulir' ),
					'type'     => 'switch',
					'default'  => '0',
				],
				[
					'id'     => 'section_end_human_time',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_edit_link',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Edit Post Link', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'edit_post_link',
					'title'    => esc_html__( 'Edit Link', 'gulir' ),
					'subtitle' => esc_html__( 'Display the edit post link for the logged users on the featured image.', 'gulir' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_edit_link',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_meta_custom' ) ) {
	/**
	 * @return array
	 * post entry meta
	 */
	function gulir_register_options_design_meta_custom() {

		return [
			'id'         => 'gulir_config_section_meta_custom',
			'title'      => esc_html__( 'Custom Meta', 'gulir' ),
			'desc'       => esc_html__( 'Create a new meta to display in the blog post listing.', 'gulir' ),
			'icon'       => 'el el-asterisk',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'meta_custom_text',
					'title'    => esc_html__( 'Meta Label', 'gulir' ),
					'subtitle' => esc_html__( 'Input the label for this meta.', 'gulir' ),
					'type'     => 'text',
					'default'  => '',
				],
				[
					'id'          => 'meta_custom_icon',
					'title'       => esc_html__( 'Meta Icon ClassName', 'gulir' ),
					'subtitle'    => esc_html__( 'Input your custom CSS icon classname to display at the beginning of the meta.', 'gulir' ),
					'description' => esc_html__( 'If you use font Awesome. ensure that the setting in "Theme Design > Font Awesome" is enabled.', 'gulir' ),
					'type'        => 'text',
					'placeholder' => 'rbi-time',
				],
				[
					'id'          => 'meta_custom_important',
					'type'        => 'switch',
					'title'       => esc_html__( 'Bold Style for This Meta', 'gulir' ),
					'subtitle'    => esc_html__( 'Highlight this meta with bold font settings.', 'gulir' ),
					'description' => esc_html__( 'The "Typography > Entry Meta > Important Meta Font" settings will apply to this meta.', 'gulir' ),
					'default'     => false,
				],
				[
					'id'       => 'meta_custom_pos',
					'type'     => 'select',
					'title'    => esc_html__( 'Label Position', 'gulir' ),
					'subtitle' => esc_html__( 'Select a position for the custom meta label.', 'gulir' ),
					'options'  => [
						'begin' => esc_html__( 'Prefix', 'gulir' ),
						'end'   => esc_html__( 'Suffix', 'gulir' ),
					],
					'default'  => 'end',
				],
				[
					'id'       => 'meta_custom_fallback',
					'type'     => 'select',
					'title'    => esc_html__( 'Fallback Meta', 'gulir' ),
					'subtitle' => esc_html__( 'Select a fallback meta if this meta value does not exist', 'gulir' ),
					'options'  => [
						'author'   => esc_html__( 'author (Author)', 'gulir' ),
						'date'     => esc_html__( 'date (Publish Date)', 'gulir' ),
						'category' => esc_html__( 'category (Categories)', 'gulir' ),
						'tag'      => esc_html__( 'tag (Tags)', 'gulir' ),
						'view'     => esc_html__( 'view (Post Views)', 'gulir' ),
						'comment'  => esc_html__( 'comment (Comments)', 'gulir' ),
						'update'   => esc_html__( 'update  (Last Updated)', 'gulir' ),
						'read'     => esc_html__( 'read (Reading Time)', 'gulir' ),
						'0'        => esc_html__( 'None', 'gulir' ),
					],
					'default'  => 'update',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_featured' ) ) {
	/**
	 * @return array
	 * featured image
	 */
	function gulir_register_options_design_featured() {

		return [
			'id'         => 'gulir_config_section_featured_image',
			'title'      => esc_html__( 'Featured Image', 'gulir' ),
			'icon'       => 'el el-picture',
			'desc'       => esc_html__( 'Manage post featured images in your site.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_lazy_load',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'gulir' ),
					'notice' => [
						esc_html__( 'Run regenerate thumbnail if you add/remove crop sizes. Please read documentation for further information.', 'gulir' ),
						esc_html__( 'Assigning correct size for layouts is important for the look and give the best performance of your site..', 'gulir' ),
					],
					'indent' => true,
				],
				[
					'id'       => 'crop_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Crop Position', 'gulir' ),
					'subtitle' => esc_html__( 'Select position to crop the featured image.', 'gulir' ),
					'desc'     => esc_html__( 'Recommended select the top position if you have people images.', 'gulir' ),
					'options'  => [
						'top'    => esc_html__( 'From The Top', 'gulir' ),
						'center' => esc_html__( 'From The Center', 'gulir' ),
					],
					'default'  => 'top',
				],
				[
					'id'         => 'featured_crop_sizes',
					'type'       => 'multi_text',
					'class'      => 'medium-text',
					'show_empty' => false,
					'title'      => esc_html__( 'Define Custom Crop Sizes', 'gulir' ),
					'label'      => esc_html__( 'Add a Crop Size', 'gulir' ),
					'subtitle'   => esc_html__( 'This option will help you optimize the site speed or increase image quality on your site.', 'gulir' ),
					'desc'       => esc_html__( 'Input a custom crop size: width x height. e.g. 300x200', 'gulir' ),
					'add_text'   => esc_html__( 'Create a New Crop Size', 'gulir' ),
					'default'    => [],
				],
				[
					'id'          => 'default_ratio',
					'type'        => 'text',
					'title'       => esc_html__( 'Default Featured Ratio', 'gulir' ),
					'subtitle'    => esc_html__( 'Enter a custom ratio as a percentage in the format (height/width * 100) to fit your images. Default is 60', 'gulir' ),
					'desc'        => esc_html__( 'This setting will apply to the whole website, and it can be overridden by the custom ratio values in the block settings.', 'gulir' ),
					'class'       => 'small',
					'placeholder' => '60',
				],
				[
					'id'       => 'edit_link',
					'type'     => 'switch',
					'title'    => esc_html__( 'Edit Post Link', 'gulir' ),
					'subtitle' => esc_html__( 'Show the edit post link in the featured image for logged users.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_lazy_load',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_feat_size',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Theme Crop Sizes', 'gulir' ),
					'notice' => [
						esc_html__( 'WordPress will crop uploaded images to ensure your site use the best image size for the blog layouts.', 'gulir' ),
						esc_html__( 'Below is the list of image sizes. Enable or disable any size you would like.', 'gulir' ),
					],
					'indent' => true,
				],
				[
					'id'       => 'gulir_crop_g1',
					'type'     => 'switch',
					'title'    => esc_html__( 'G1- 330x220', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable this image crop size.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'       => 'gulir_crop_g2',
					'type'     => 'switch',
					'title'    => esc_html__( 'G2 - 420x280', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable this image crop size.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'       => 'gulir_crop_g3',
					'type'     => 'switch',
					'title'    => esc_html__( 'G3 - 615x410', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable this image crop size.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'       => 'gulir_crop_o1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Original Ratio - 860x0', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable this image crop size.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'       => 'gulir_crop_o2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Original Ratio - 1536x0', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable this image crop size.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_feat_size',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_slider' ) ) {
	function gulir_register_options_design_slider() {

		return [
			'id'         => 'gulir_config_section_slider',
			'title'      => esc_html__( 'Slider Animation', 'gulir' ),
			'desc'       => esc_html__( 'Select settings for post sliders on your site.', 'gulir' ),
			'icon'       => 'el el-resize-horizontal',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'slider_play',
					'type'     => 'switch',
					'title'    => esc_html__( 'Auto Play Next Slides', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable autoplay for the sliders.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'       => 'slider_speed',
					'type'     => 'text',
					'class'    => 'small',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Auto Play Speed', 'gulir' ),
					'subtitle' => esc_html__( 'Input a custom time value to next a slide in milliseconds (default is 5000).', 'gulir' ),
					'required' => [ 'slider_play', '=', '1' ],
					'default'  => '',
				],
				[
					'id'       => 'slider_effect',
					'type'     => 'select',
					'title'    => esc_html__( 'Slide Effect', 'gulir' ),
					'subtitle' => esc_html__( 'Select a effect for the sliders. This setting will be not available for the carousel mode.', 'gulir' ),
					'options'  => [
						'0' => esc_html__( 'Slide', 'gulir' ),
						'1' => esc_html__( 'Fade', 'gulir' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'slider_fmode',
					'type'     => 'switch',
					'title'    => esc_html__( 'Carousel Free Scroll', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable free mode when scrolling on the carousels.', 'gulir' ),
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_format' ) ) {
	function gulir_register_options_design_format() {

		return [
			'id'         => 'gulir_config_section_post_format',
			'title'      => esc_html__( 'Post Format Icons', 'gulir' ),
			'desc'       => esc_html__( 'Select settings for your post entry meta.', 'gulir' ),
			'icon'       => 'el el-record',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'post_icon_video',
					'title'    => esc_html__( 'Video Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable icon for the video post format.', 'gulir' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'post_icon_gallery',
					'title'    => esc_html__( 'Gallery Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable icon for the gallery post format.', 'gulir' ),
					'type'     => 'switch',
					'default'  => '0',
				],
				[
					'id'       => 'post_icon_audio',
					'title'    => esc_html__( 'Audio Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable icon for the audio post format.', 'gulir' ),
					'type'     => 'switch',
					'default'  => '0',
				],
				[
					'id'          => 'icon_video_color',
					'title'       => esc_html__( 'Video Icon Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color value for the video icon. This setting will not apply to bottom right layout', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],

				[
					'id'          => 'icon_gallery_color',
					'title'       => esc_html__( 'Gallery Icon Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color value for the gallery icon. This setting will not apply to bottom right layout', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'icon_audio_color',
					'title'       => esc_html__( 'Audio Icon Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color value for the audio icon. This setting will not apply to bottom right layout.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_readmore' ) ) {
	/**
	 * @return array
	 * read more settings
	 */
	function gulir_register_options_design_readmore() {

		return [
			'id'         => 'gulir_config_section_readmore',
			'title'      => esc_html__( 'Read More Button', 'gulir' ),
			'desc'       => esc_html__( 'Customize the read more button in your site.', 'gulir' ),
			'icon'       => 'el el-arrow-right',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_read_more',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'You can enable/disable the button via "Standard Block Design" panes or Elementor block settings.', 'gulir' ),
				],
				[
					'id'    => 'info_read_more_typo',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Typography > Read More Button" to edit fonts for the button.', 'gulir' ),
				],
				[
					'id'          => 'readmore_label',
					'type'        => 'text',
					'title'       => esc_html__( 'Read More Label', 'gulir' ),
					'subtitle'    => esc_html__( 'Input the read more label to display on your site.', 'gulir' ),
					'placeholder' => esc_html__( 'Read More', 'gulir' ),
				],
				[
					'id'       => 'readmore_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Button Style', 'gulir' ),
					'subtitle' => esc_html__( 'Select a style for the read more button.', 'gulir' ),
					'options'  => [
						'0'      => esc_html__( '- Default -', 'gulir' ),
						'simple' => esc_html__( 'Text Only', 'gulir' ),
						'bg'     => esc_html__( 'Background', 'gulir' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'readmore_icon',
					'title'    => esc_html__( 'Read More Icon', 'gulir' ),
					'subtitle' => esc_html__( 'Show a icon after the read more label.', 'gulir' ),
					'type'     => 'switch',
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_hover' ) ) {
	function gulir_register_options_design_hover() {

		return [
			'id'         => 'gulir_config_section_design_hover',
			'title'      => esc_html__( 'Hover Effects', 'gulir' ),
			'icon'       => 'el el-hand-up',
			'desc'       => esc_html__( 'Select hover effect settings for your site.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_title_hover_effect',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Title', 'gulir' ),
					'notice' => [
						esc_html__( 'The color settings will be applied based on the chosen effect. Please note that some settings may not be applicable in certain effect styles.', 'gulir' ),
						esc_html__( 'To set the color for the title (when not hovered), go to Typography > H Tags, and select the color in the typography settings.', 'gulir' ),
					],
					'indent' => true,
				],
				[
					'id'       => 'hover_effect',
					'title'    => esc_html__( 'Title Hover Effect', 'gulir' ),
					'subtitle' => esc_html__( 'The settings below will apply to the post title.', 'gulir' ),
					'type'     => 'select',
					'options'  => [
						'1' => esc_html__( 'Default (Color & Underline)', 'gulir' ),
						'2' => esc_html__( 'Style 2 (Global Color)', 'gulir' ),
						'3' => esc_html__( 'Style 3 (Dark Border)', 'gulir' ),
						'4' => esc_html__( 'Style 4 (Big Border)', 'gulir' ),
						'5' => esc_html__( 'Style 5 (Text Background)', 'gulir' ),
						'6' => esc_html__( 'Style 6 (Underline)', 'gulir' ),
						'7' => esc_html__( 'Style 7 (Solid Color Underline)', 'gulir' ),
						'8' => esc_html__( 'Style 8 (Opacity)', 'gulir' ),
					],
					'default'  => '1',
				],
				[
					'id'          => 'title_hover_effect_color',
					'title'       => esc_html__( 'Hover Effect Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Choose a color for hover effects applied to titles.', 'gulir' ),
					'description' => esc_html__( 'Leave blank to use the default color based on global colors settings.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'title_hover_text_color',
					'title'       => esc_html__( 'Hover Text Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a text color for titles when hovered.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'dark_title_hover_effect_color',
					'title'       => esc_html__( 'Dark Mode - Hover Effect Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color for the effect when hovering in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'dark_title_hover_text_color',
					'title'       => esc_html__( 'Dark Mode - Hover Text Color', 'gulir' ),
					'subtitle'    => esc_html__( 'Select a color for the title when hovering in dark mode.', 'gulir' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'     => 'section_end_title_hover_effect',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_element_hover_effect',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Buttons & Elements', 'gulir' ),
					'notice' => [
						esc_html__( 'To ensure design consistency, the button hover effect will also apply to the borders and shadows of other elements on the website.', 'gulir' ),
						esc_html__( 'To manage the colors of the button, navigate to Global Colors > Button.', 'gulir' ),
					],
					'indent' => true,
				],
				[
					'id'       => 'btn_hover_effect',
					'type'     => 'select',
					'title'    => esc_html__( 'Button Hover Effect', 'gulir' ),
					'subtitle' => esc_html__( 'This setting will apply to the button.', 'gulir' ),
					'options'  => [
						'1' => esc_html__( 'Default (Blurry Shadow)', 'gulir' ),
						'2' => esc_html__( 'Style 2 (Solid Shadow)', 'gulir' ),
						'3' => esc_html__( 'Style 3 (Background)', 'gulir' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'btn_hover_ani',
					'type'     => 'select',
					'title'    => esc_html__( 'Button Hover Animation', 'gulir' ),
					'subtitle' => esc_html__( 'Select an animation effect to apply when hovering over the button.', 'gulir' ),
					'options'  => [
						'1' => esc_html__( 'None', 'gulir' ),
						'2' => esc_html__( 'Scale', 'gulir' ),
						'3' => esc_html__( 'Shrink', 'gulir' ),
					],
					'default'  => '1',
				],
				[
					'id'     => 'section_end_element_hover_effect',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_svg' ) ) {
	/**
	 * @return array
	 * font icons settings
	 */
	function gulir_register_options_design_svg() {

		return [
			'id'         => 'gulir_config_section_svg_supported',
			'title'      => esc_html__( 'SVG Upload', 'gulir' ),
			'icon'       => 'el el-upload',
			'desc'       => esc_html__( 'Please ensure that you are using trusted svg sources to avoid XML vulnerabilities.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'svg_supported',
					'title'    => esc_html__( 'SVG Supported', 'gulir' ),
					'subtitle' => esc_html__( 'Support upload file type SVG for your site.', 'gulir' ),
					'type'     => 'switch',
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_gif' ) ) {
	function gulir_register_options_design_gif() {

		return [
			'id'         => 'gulir_config_section_gif_supported',
			'title'      => esc_html__( 'Featured GIF', 'gulir' ),
			'icon'       => 'el el-photo',
			'desc'       => esc_html__( 'Prevent WordPress convert gif to a static image when uploading.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'gif_supported',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Supported', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable GIF supported for your site.', 'gulir' ),
					'default'  => '1',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_border' ) ) {
	/**
	 * @return array
	 * font icons settings
	 */
	function gulir_register_options_design_border() {

		return [
			'id'         => 'gulir_config_section_design_border',
			'title'      => esc_html__( 'Round Corner', 'gulir' ),
			'icon'       => 'el el-record',
			'desc'       => esc_html__( 'The small border style in featured images and other element whole the website.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'design_border',
					'title'    => esc_html__( 'Rounded Corners', 'gulir' ),
					'subtitle' => esc_html__( 'Choose a corner style for the entire website.', 'gulir' ),
					'type'     => 'select',
					'options'  => [
						'0'    => esc_html__( 'Default', 'gulir' ),
						'none' => esc_html__( 'No Border', 'gulir' ),
					],
					'default'  => '0',
				],
				[
					'id'          => 'custom_border',
					'class'       => 'small',
					'type'        => 'text',
					'title'       => esc_html__( 'Or Enter Custom Border Radius', 'gulir' ),
					'subtitle'    => esc_html__( 'Enter a custom border radius (in px) for your site.', 'gulir' ),
					'description' => esc_html__( 'Recommended value: 1 to 20. This setting will override the selection above. Leave blank to use the default.', 'gulir' ),
					'placeholder' => '10',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_icons' ) ) {
	/**
	 * @return array
	 * font icons settings
	 */
	function gulir_register_options_design_icons() {

		return [
			'id'         => 'gulir_config_section_font_icons',
			'title'      => esc_html__( 'Font Awesome', 'gulir' ),
			'icon'       => 'el el-fontsize',
			'desc'       => esc_html__( 'Load FontAwesome library. The setting will help you can add FontAwesome icons anywhere in the site.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'fontawesome_info',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'This feature may affect to your site speed.', 'gulir' ),
				],
				[
					'id'    => 'add_fontawesome_info',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'You can use the i tag to add a icon, e.g. <i class="fa-solid fa-house"></i>', 'gulir' ),
				],
				[
					'id'    => 'fontawesome_url_info',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => html_entity_decode( esc_html__( 'To find icons, you can refer to <a href="//fontawesome.com/search?o=r&m=free" target="_blank" rel="nofollow">the Official website</a>', 'gulir' ) ),
				],
				[
					'id'       => 'font_awesome',
					'title'    => esc_html__( 'Font Awesome', 'gulir' ),
					'subtitle' => esc_html__( 'Enable or disable Font Awesome supported.', 'gulir' ),
					'type'     => 'switch',
					'default'  => '0',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_placeholder' ) ) {
	function gulir_register_options_design_placeholder() {

		return [
			'id'         => 'gulir_config_section_search_placeholder',
			'title'      => esc_html__( 'Search', 'gulir' ),
			'icon'       => 'el el-search',
			'desc'       => esc_html__( 'These settings below will apply to all search forms.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'search_placeholder',
					'type'        => 'textarea',
					'rows'        => 2,
					'title'       => esc_html__( 'Placeholder Text', 'gulir' ),
					'subtitle'    => esc_html__( 'Enter a placeholder text for the search forms.', 'gulir' ),
					'description' => esc_html__( 'This setting will apply to most search forms on the website. Leave blank to use the default placeholder.', 'gulir' ),
					'placeholder' => esc_html__( 'Search Headlines, News...', 'gulir' ),
				],
				[
					'id'          => 'header_search_custom_icon',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Custom Search SVG', 'gulir' ),
					'subtitle'    => esc_html__( 'Override default search icon with a SVG icon.', 'gulir' ),
					'description' => esc_html__( 'Enable the option in "Theme Design > SVG Upload > SVG Supported" if you cannot upload .SVG files.', 'gulir' ),
				],
				[
					'id'          => 'header_search_custom_icon_size',
					'title'       => esc_html__( 'Icon Size', 'gulir' ),
					'subtitle'    => esc_html__( 'Input a custom size (in px) for the search icon.', 'gulir' ),
					'placeholder' => '20',
					'type'        => 'text',
					'class'       => 'small',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_loader' ) ) {
	function gulir_register_options_design_loader() {

		return [
			'id'         => 'gulir_config_section_loader',
			'title'      => esc_html__( 'Loader Style', 'gulir' ),
			'desc'       => esc_html__( 'Customize the ajax loader icon.', 'gulir' ),
			'icon'       => 'el el-repeat',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'loader_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Loader Style', 'gulir' ),
					'subtitle' => esc_html__( 'Select a style for the ajax loader icon.', 'gulir' ),
					'options'  => [
						'1' => esc_html__( '- Default -', 'gulir' ),
						'2' => esc_html__( 'Thin Border', 'gulir' ),
						'3' => esc_html__( 'Rectangle', 'gulir' ),
						'4' => esc_html__( 'Dots', 'gulir' ),
					],
					'default'  => '1',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_back_top' ) ) {
	function gulir_register_options_design_back_top() {

		return [
			'id'         => 'gulir_config_section_back_top',
			'title'      => esc_html__( 'Back to Top', 'gulir' ),
			'icon'       => 'el el-arrow-up',
			'desc'       => esc_html__( 'Customize the back to top button.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'back_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top', 'gulir' ),
					'subtitle' => esc_html__( 'Show the back to top button at the bottom right.', 'gulir' ),
					'default'  => true,
				],
				[
					'id'          => 'mobile_back_top',
					'type'        => 'switch',
					'title'       => esc_html__( 'Mobile Back to Top', 'gulir' ),
					'subtitle'    => esc_html__( 'Show the back to top button on mobile devices.', 'gulir' ),
					'description' => esc_html__( 'This setting will apply only if the back top setting is enabled.', 'gulir' ),
					'default'     => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_tooltips' ) ) {
	function gulir_register_options_design_tooltips() {

		return [
			'id'         => 'gulir_config_section_tooltips',
			'title'      => esc_html__( 'Tooltips', 'gulir' ),
			'icon'       => 'el el-question-sign',
			'desc'       => esc_html__( 'Manage tooltips for the share on socials.', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'site_tooltips',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tooltips', 'gulir' ),
					'subtitle' => esc_html__( 'Show tooltips when you mouse over elements.', 'gulir' ),
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_container' ) ) {
	function gulir_register_options_design_container() {

		return [
			'id'         => 'gulir_config_section_container',
			'title'      => esc_html__( 'Container Width', 'gulir' ),
			'icon'       => 'el el-resize-horizontal',
			'desc'       => esc_html__( 'Customize the container width, default value is 1280px include left and right edge (20px*2).', 'gulir' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'container_width_info',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The recommended value is between 1040 and 1540, incorrect values may lead to website layout issues.', 'gulir' ),
				],
				[
					'id'    => 'container_width_e_info',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'This setup globally affects the website, impacting predefined templates, except for Elementor pages and Ruby templates. Each of them has its own container settings for customizing width in specific sections or containers.', 'gulir' ),
				],
				[
					'id'          => 'container_width',
					'title'       => esc_html__( 'Container Width', 'gulir' ),
					'subtitle'    => esc_html__( 'Input a container width value (in px) for your website. Note that 40px edge padding is included.', 'gulir' ),
					'description' => esc_html__( 'Use with caution; leave blank to use the default value.', 'gulir' ),
					'placeholder' => '1280',
					'type'        => 'text',
					'class'       => 'small',
				],
				[
					'id'          => 'container_width_single',
					'title'       => esc_html__( 'Container Width for Single Post', 'gulir' ),
					'subtitle'    => esc_html__( 'It is useful if you want narrower content width in single posts while keeping a wider layout on other pages such as the homepage.', 'gulir' ),
					'description' => esc_html__( 'This setting applies only to predefined single posts, inside the header and footer.', 'gulir' ),
					'placeholder' => '1280',
					'type'        => 'text',
					'class'       => 'small',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_input' ) ) {
	function gulir_register_options_design_input() {

		return [
			'id'         => 'gulir_config_section_input',
			'title'      => esc_html__( 'Input Style', 'gulir' ),
			'desc'       => esc_html__( 'Customize the appearance of input fields.', 'gulir' ),
			'icon'       => 'el el-check-empty',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'input_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Input Style', 'gulir' ),
					'subtitle' => esc_html__( 'Choose the style for the input form.', 'gulir' ),
					'options'  => [
						'0'    => esc_html__( 'Gray Background', 'gulir' ),
						'gray' => esc_html__( 'Gray Border', 'gulir' ),
						'bold' => esc_html__( 'Dark Border', 'gulir' ),
					],
					'default'  => '0',
				],
			],
		];
	}
}

if ( ! function_exists( 'gulir_register_options_design_live_blog' ) ) {
	function gulir_register_options_design_live_blog() {

		return [
			'title'      => esc_html__( 'Live Blogging', 'gulir' ),
			'id'         => 'gulir_config_section_live_blog',
			'desc'       => esc_html__( 'Customize the live blogging posts.', 'gulir' ),
			'icon'       => 'el el-comment-alt',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_live_blog_Color',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To customize the live blog colors, navigate to "Global Colors > Live Blogging" panel.', 'gulir' ),
				],
				[
					'id'     => 'section_start_live_blog_listing',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Post Listing', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'live_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Live Label', 'gulir' ),
					'subtitle' => esc_html__( 'Define the label for the live blogging to be displayed before the post title in the listing.', 'gulir' ),
					'default'  => gulir_html__( 'Live: ', 'gulir' ),
				],
				[
					'id'       => 'live_blog_meta',
					'title'    => esc_html__( 'Meta Style', 'gulir' ),
					'subtitle' => esc_html__( 'Select a style to showcase live blogging meta before the post title in the listing.', 'gulir' ),
					'type'     => 'select',
					'options'  => [
						'dot'   => esc_html__( 'Dot', 'gulir' ),
						'label' => esc_html__( 'Text Only', 'gulir' ),
						'all'   => esc_html__( 'Dot & Text', 'gulir' ),
					],
					'default'  => 'dot',
				],
				[
					'id'     => 'section_end_live_blog_listing',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_live_blog_single',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Single Post', 'gulir' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_live_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Live Updates Label', 'gulir' ),
					'subtitle' => esc_html__( 'Define the label for Live Updates to appear at the top of the single post page (replaceable with a category icon).', 'gulir' ),
					'default'  => gulir_html__( 'Live Updates', 'gulir' ),
				],
				[
					'id'          => 'live_blog_interval',
					'type'        => 'text',
					'title'       => esc_html__( 'Refresh Interval (s)', 'gulir' ),
					'subtitle'    => esc_html__( 'Input the refresh interval in seconds for live blogging posts, minimum value is 30 seconds.', 'gulir' ),
					'description' => esc_html__( 'This setting allows visitors to avoid page reloading. A lower value will use more server resources.', 'gulir' ),
					'class'       => 'small',
					'default'     => '600',
				],
				[
					'id'     => 'section_end_live_blog_single',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
			],
		];
	}
}
