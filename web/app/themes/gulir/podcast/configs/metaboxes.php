<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'gulir_podcast_single_metaboxes' ) ) {
	function gulir_podcast_single_metaboxes() {

		$configs = [
			'id'         => 'gulir_post_options',
			'title'      => esc_html__( 'Episode Settings', 'gulir' ),
			'context'    => 'normal',
			'post_types' => [ 'podcast' ],
			'tabs'       => [
				[
					'id'     => 'section-file',
					'title'  => esc_html__( 'Episode Data', 'gulir' ),
					'icon'   => 'dashicons-media-audio',
					'desc'   => esc_html__( 'Upload audio episode files as MP3 or M4A, or paste the file URL.', 'gulir' ),
					'fields' => [
						[
							'id'   => 'audio_hosted',
							'name' => esc_html__( 'Self-Hosted File', 'gulir' ),
							'desc' => esc_html__( 'Upload your audio file, support: mp3, ogg, wma, m4a, wav files.', 'gulir' ),
							'type' => 'file',
						],
						[
							'id'   => 'audio_url',
							'name' => esc_html__( 'Audio URL', 'gulir' ),
							'desc' => esc_html__( 'Input your audio URL, support: SoundCloud, MixCloud.', 'gulir' ),
							'type' => 'text',
						],
						[
							'id'   => 'audio_embed',
							'name' => esc_html__( 'Iframe Embed Code', 'gulir' ),
							'desc' => esc_html__( 'Input iframe embed code if WordPress cannot support your audio URL.', 'gulir' ),
							'type' => 'textarea',
						],
						[
							'id'      => 'audio_autoplay',
							'name'    => esc_html__( 'Autoplay Audio', 'gulir' ),
							'desc'    => esc_html__( 'Enable or disable autoplay audio for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'1'       => esc_html__( 'Enable', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'section-tagline',
					'title'  => esc_html__( 'Tagline & Highlights', 'gulir' ),
					'icon'   => 'dashicons-edit-large',
					'fields' => [
						[
							'id'          => 'tagline',
							'name'        => esc_html__( 'Tagline', 'gulir' ),
							'desc'        => esc_html__( 'Input a tagline for this episode.', 'gulir' ),
							'info'        => esc_html__( 'It will display under the episode title.', 'gulir' ),
							'placeholder' => esc_attr__( 'Enter your tagline here...', 'gulir' ),
							'single'      => true,
							'rows'        => 2,
							'type'        => 'textarea',
							'default'     => '',
						],
						[
							'id'      => 'tagline_tag',
							'name'    => esc_html__( 'Tagline HTML Tag', 'gulir' ),
							'desc'    => esc_html__( 'Select a HTML tag for this tagline.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'0'    => esc_html__( '- Default -', 'gulir' ),
								'h2'   => esc_html__( 'H2', 'gulir' ),
								'h3'   => esc_html__( 'H3', 'gulir' ),
								'h4'   => esc_html__( 'H4', 'gulir' ),
								'h5'   => esc_html__( 'H5', 'gulir' ),
								'h6'   => esc_html__( 'H6', 'gulir' ),
								'p'    => esc_html__( 'p', 'gulir' ),
								'span' => esc_html__( 'span', 'gulir' ),
							],
							'default' => '0',
						],
						[
							'id'     => 'highlights',
							'name'   => esc_html__( 'Podcast Highlights', 'gulir' ),
							'desc'   => esc_html__( 'Show a highlights section at the top for the post content.', 'gulir' ),
							'info'   => esc_html__( 'Navigate to "Theme Options > Single Post > Tagline & highlights" to edit the heading.', 'gulir' ),
							'type'   => 'group',
							'button' => esc_html__( '+Add Highlight', 'gulir' ),
							'fields' => [
								[
									'id'      => 'point',
									'name'    => esc_html__( 'Highlight Point', 'gulir' ),
									'default' => '',
								],
							],
						],
					],
				],
				[
					'id'     => 'section-meta',
					'title'  => esc_html__( 'Episode Meta', 'gulir' ),
					'icon'   => 'dashicons-database',
					'fields' => [
						[
							'id'          => 'post_index',
							'name'        => esc_html__( 'Episode Index', 'gulir' ),
							'desc'        => esc_html__( 'The index of this episode file.', 'gulir' ),
							'placeholder' => 'Episode 1',
							'type'        => 'text',
						],
						[
							'id'          => 'duration',
							'name'        => esc_html__( 'Duration', 'gulir' ),
							'desc'        => esc_html__( 'Duration of this episode file. This setting will also apply to SEO markup data.', 'gulir' ),
							'info'        => esc_html__( 'Ensure the date format is HH:MM:SS', 'gulir' ),
							'placeholder' => '01:10:30',
							'type'        => 'text',
						],
						[
							'id'      => 'featured_caption',
							'name'    => esc_html__( 'Caption Text', 'gulir' ),
							'desc'    => esc_html__( 'Input caption text for the featured image.', 'gulir' ),
							'type'    => 'textarea',
							'default' => '',
						],
						[
							'id'      => 'featured_attribution',
							'name'    => esc_html__( 'Attribution', 'gulir' ),
							'desc'    => esc_html__( 'Input an attribution for the featured image.', 'gulir' ),
							'type'    => 'text',
							'default' => '',
						],
					],
				],
				[
					'id'     => 'section-socials',
					'title'  => esc_html__( 'Social Podcast Links', 'gulir' ),
					'icon'   => 'dashicons-admin-links',
					'fields' => [
						[
							'id'          => 'listen_on_apple',
							'name'        => esc_html__( 'Listen on Apple Podcast', 'gulir' ),
							'desc'        => esc_html__( 'Add an Apple podcast link for this episode.', 'gulir' ),
							'placeholder' => 'https://podcasts.apple.com...',
							'type'        => 'textarea',
						],
						[
							'id'          => 'listen_on_spotify',
							'name'        => esc_html__( 'Listen on Spotify', 'gulir' ),
							'desc'        => esc_html__( 'Add a Spotify link for this episode.', 'gulir' ),
							'placeholder' => 'https://open.spotify.com/...',
							'type'        => 'textarea',
						],
						[
							'id'          => 'listen_on_soundcloud',
							'name'        => esc_html__( 'Listen on Soundcloud', 'gulir' ),
							'desc'        => esc_html__( 'Add a Soundcloud link for this episode.', 'gulir' ),
							'placeholder' => 'https://soundcloud.com/...',
							'type'        => 'textarea',
						],
						[
							'id'          => 'listen_on_google',
							'name'        => esc_html__( 'Listen on Google Podcast', 'gulir' ),
							'desc'        => esc_html__( 'Add a google podcast link for this episode.', 'gulir' ),
							'placeholder' => 'https://podcasts.google.com/...',
							'type'        => 'textarea',
						],
						[
							'id'     => 'listen_on',
							'name'   => esc_html__( 'More Social Podcasts', 'gulir' ),
							'desc'   => esc_html__( 'Add this episode links on other social media podcasts.', 'gulir' ),
							'type'   => 'group',
							'button' => '+ Add Link',
							'fields' => [
								[
									'name'        => esc_html__( 'Social Name', 'gulir' ),
									'id'          => 'label',
									'placeholder' => 'Spotify',
									'default'     => '',
								],
								[
									'name'        => esc_html__( 'Icon Classname', 'gulir' ),
									'placeholder' => 'rbi-spotify',
									'id'          => 'icon',
									'default'     => '',
								],
								[
									'name'        => esc_html__( 'Episode URL', 'gulir' ),
									'placeholder' => 'https://open.spotify.com/episode...',
									'id'          => 'url',
									'default'     => '',
								],
							],
						],
					],
				],
				[
					'id'     => 'section-layout',
					'title'  => esc_html__( 'Layout', 'gulir' ),
					'desc'   => esc_html__( 'The setting below will take priority over other settings in "Theme Options > Ruby Podcast > Episode".', 'gulir' ),
					'icon'   => 'dashicons-menu',
					'fields' => [
						[
							'id'      => 'layout',
							'name'    => esc_html__( 'Episode Layout', 'gulir' ),
							'desc'    => esc_html__( 'Select a layout for this episode.', 'gulir' ),
							'info'    => esc_html__( 'This setting will override on the Theme Option setting.', 'gulir' ),
							'type'    => 'image_select',
							'class'   => 'big',
							'options' => [
								'default' => [
									'img'   => gulir_get_asset_image( 'default.png' ),
									'title' => esc_html__( '- Default -', 'gulir' ),
								],
								'1'       => [
									'img'   => gulir_get_asset_image( 'single-6.png' ),
									'title' => esc_html__( 'Layout 1', 'gulir' ),
								],
								'2'       => [
									'img'   => gulir_get_asset_image( 'single-7.png' ),
									'title' => esc_html__( 'Layout 2', 'gulir' ),
								],
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'section-sidebar',
					'title'  => esc_html__( 'Sidebar Area', 'gulir' ),
					'desc'   => esc_html__( 'The settings below will take priority over other settings in "Theme Options > Ruby Podcast > Episode".', 'gulir' ),
					'icon'   => 'dashicons-align-pull-right',
					'fields' => [
						[
							'id'      => 'sidebar_position',
							'name'    => esc_html__( 'Sidebar Position', 'gulir' ),
							'desc'    => esc_html__( 'Select a position for this episode sidebar.', 'gulir' ),
							'class'   => 'sidebar-select',
							'type'    => 'image_select',
							'options' => gulir_config_sidebar_position( true, true ),
							'default' => 'default',
						],
						[
							'id'      => 'sidebar_name',
							'name'    => esc_html__( 'Assign a Sidebar', 'gulir' ),
							'desc'    => esc_html__( 'Assign a custom sidebar for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => gulir_config_sidebar_name(),
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'section-widget',
					'title'  => esc_html__( 'Widgets & Ads', 'gulir' ),
					'desc'   => esc_html__( 'Manage ad sections and top/bottom content widgets for this episode.', 'gulir' ),
					'icon'   => 'dashicons-editor-insertmore',
					'fields' => [
						[
							'id'      => 'disable_top_ad',
							'name'    => esc_html__( 'Top Site Advert', 'gulir' ),
							'desc'    => esc_html__( 'Enable or disable the top ad site for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'disable_header_ad',
							'name'    => esc_html__( 'Header Advertising Widget Section', 'gulir' ),
							'desc'    => esc_html__( 'Enable or disable all widgets in the header advertising widget section (Appearance > Widgets) for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'alert_bar',
							'name'    => esc_html__( 'Header Alert Bar', 'gulir' ),
							'desc'    => esc_html__( 'Enable or disable the alert bar below the header.', 'gulir' ),
							'info'    => esc_html__( 'This setting will apply only to pre-defined header layouts.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'1'       => esc_html__( 'Enable', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'entry_top',
							'name'    => esc_html__( 'Top Content -  Widgets Area', 'gulir' ),
							'desc'    => esc_html__( 'Show widgets at the top of the post content.', 'gulir' ),
							'info'    => esc_html__( 'Navigate to "Appearance > Widgets > Single Content - Top Area" to add your widgets.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'1'  => esc_html__( 'Enable', 'gulir' ),
								'-1' => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => '1',
						],
						[
							'id'      => 'entry_bottom',
							'name'    => esc_html__( 'Bottom Content - Widgets Area', 'gulir' ),
							'desc'    => esc_html__( 'Show widgets at the bottom of the post content.', 'gulir' ),
							'info'    => esc_html__( 'Navigate to "Appearance > Widgets > Single Content - Bottom Area" to add your widgets.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'1'  => esc_html__( 'Enable', 'gulir' ),
								'-1' => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => '1',
						],
						[
							'id'      => 'entry_ad_1',
							'name'    => esc_html__( 'Inline Ad 1', 'gulir' ),
							'desc'    => esc_html__( 'Choose to disable inline content ad 1 for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'entry_ad_2',
							'name'    => esc_html__( 'Inline Ad 2', 'gulir' ),
							'desc'    => esc_html__( 'Choose to disable inline content ad 2 for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'entry_ad_3',
							'name'    => esc_html__( 'Inline Ad 3', 'gulir' ),
							'desc'    => esc_html__( 'Choose to disable inline content ad 3 for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'auto_ads',
							'name'    => esc_html__( 'Auto Ads', 'gulir' ),
							'desc'    => esc_html__( 'Choose to disable auto Ads for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'section-toc',
					'title'  => esc_html__( 'Table of Content', 'gulir' ),
					'desc'   => esc_html__( 'The settings below will take priority over other settings in "Theme Options > Table of Content".', 'gulir' ),
					'icon'   => 'dashicons-editor-ol',
					'fields' => [
						[
							'id'      => 'table_contents_post',
							'name'    => esc_html__( 'Table of Contents', 'gulir' ),
							'desc'    => esc_html__( 'Enable or disable the table content for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'1'       => esc_html__( 'Enable', 'gulir' ),
								'-1'      => esc_html__( 'Disable', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'      => 'table_contents_layout',
							'name'    => esc_html__( 'Layout', 'gulir' ),
							'desc'    => esc_html__( 'Select a layout for the table of contents of this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'default' => esc_html__( '- Default -', 'gulir' ),
								'1'       => esc_html__( 'Full Width (2 Columns)', 'gulir' ),
								'2'       => esc_html__( 'Half Width', 'gulir' ),
								'3'       => esc_html__( 'Full Width (1 Column)', 'gulir' ),
							],
							'default' => 'default',
						],
						[
							'id'          => 'table_contents_position',
							'type'        => 'text',
							'name'        => esc_html__( 'Display Position', 'gulir' ),
							'desc'        => esc_html__( 'Input a position (after x paragraphs) to display the table of contents box.', 'gulir' ),
							'info'        => esc_html__( 'Leave it blank as the default, Set "-1" to display at the top.', 'gulir' ),
							'placeholder' => '3',
							'default'     => '',
						],
					],
				],
				[
					'id'     => 'section-via',
					'title'  => esc_html__( 'Sources/Via', 'gulir' ),
					'icon'   => 'dashicons-paperclip',
					'fields' => [
						[
							'id'     => 'source_data',
							'name'   => esc_html__( 'Post Sources', 'gulir' ),
							'desc'   => esc_html__( 'Add sources for this episode.', 'gulir' ),
							'info'   => esc_html__( 'It will display below the post tags.', 'gulir' ),
							'type'   => 'group',
							'class'  => 'small-item',
							'button' => esc_html__( '+Add Post Source', 'gulir' ),
							'fields' => [
								[
									'name'    => esc_html__( 'Source Name', 'gulir' ),
									'id'      => 'name',
									'default' => '',
								],
								[
									'name'    => esc_html__( 'Source URL', 'gulir' ),
									'id'      => 'url',
									'default' => '',
								],

							],
						],
						[
							'id'     => 'via_data',
							'name'   => esc_html__( 'Post Via', 'gulir' ),
							'desc'   => esc_html__( 'Add via or credit for this episode.', 'gulir' ),
							'info'   => esc_html__( 'It will display below the post tags.', 'gulir' ),
							'type'   => 'group',
							'class'  => 'small-item',
							'button' => esc_html__( '+Add Post Via', 'gulir' ),
							'fields' => [
								[
									'name'    => esc_html__( 'Via Name', 'gulir' ),
									'id'      => 'name',
									'default' => '',
								],
								[
									'name'    => esc_html__( 'Via URL', 'gulir' ),
									'id'      => 'url',
									'default' => '',
								],

							],
						],
					],
				],
				[
					'id'     => 'section-header',
					'title'  => 'Site Header',
					'icon'   => 'dashicons-heading',
					'fields' => [
						[
							'id'      => 'header_style',
							'name'    => esc_html__( 'Header Layout', 'gulir' ),
							'desc'    => esc_html__( 'Select a site header for this episode.', 'gulir' ),
							'type'    => 'select',
							'options' => gulir_config_header_style( true ),
							'default' => 'default',
						],
						[
							'id'          => 'header_template',
							'name'        => esc_html__( 'or Use Ruby Template for Site Header', 'gulir' ),
							'desc'        => esc_html__( 'Input a Ruby Template shortcode for displaying as the website header for this episode.', 'gulir' ),
							'info'        => esc_html__( 'This setting will override all "Header Layout" settings. Leave it blank to disable.', 'gulir' ),
							'placeholder' => '[Ruby_E_Template id="1"]',
							'input_class' => 'ruby-template-input',
							'rows'        => 1,
							'type'        => 'textarea',
							'default'     => '',
						],
						[
							'id'      => 'nav_style',
							'type'    => 'select',
							'name'    => esc_html__( 'Navigation Bar Style', 'gulir' ),
							'desc'    => esc_html__( 'Select navigation bar style for the site header of this episode.', 'gulir' ),
							'info'    => esc_html__( 'This setting will apply only to pre-defined headers: 1, 2, 3 and 5.', 'gulir' ),
							'options' => [
								'default'  => esc_html__( '- Default -', 'gulir' ),
								'shadow'   => esc_html__( 'Shadow', 'gulir' ),
								'border'   => esc_html__( 'Bottom Border', 'gulir' ),
								'd-border' => esc_html__( 'Dark Bottom Border', 'gulir' ),
								'none'     => esc_html__( 'None', 'gulir' ),
							],
							'default' => 'default',
						],
					],
				],
				[
					'id'     => 'section-rss',
					'title'  => 'Podcast RSS',
					'icon'   => 'dashicons-rss',
					'desc'   => esc_html__( 'To enable Podcast RSS, make sure to use self-hosted audio files as they are the only supported format.', 'gulir' ),
					'fields' => [
						[
							'id'      => 'episode_type',
							'name'    => esc_html__( 'Episode Type', 'gulir' ),
							'desc'    => esc_html__( 'Select a type for this episode.', 'gulir' ),
							'info'    => esc_html__( 'This info will display in podcast RSS.', 'gulir' ),
							'type'    => 'select',
							'options' => [
								'full'    => esc_html__( '- Full -', 'gulir' ),
								'trailer' => esc_html__( 'Trailer', 'gulir' ),
							],
							'default' => 'full',
						],
					],
				],
			],
		];

		return apply_filters( 'rb_single_metaboxes', $configs );
	}
}