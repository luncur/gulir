<?php
/**
 * Newskit Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newskit
 */

/**
 * Newskit Theme only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Default for the "time ago" date format. Dates older than this cutoff will be displayed as a full date.
const NP_DEFAULT_POST_TIME_AGO_CUT_OFF_DAYS = 14;

if ( ! function_exists( 'newskit_is_amp' ) ) {
	/**
	 * Determine whether it is an AMP response.
	 *
	 * @return bool Whether AMP.
	 */
	function newskit_is_amp() {
		return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
	}
}

if ( ! function_exists( 'newskit_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newskit_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Newskit Theme, use a find and replace
		 * to change 'newskit' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newskit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		add_image_size( 'newskit-featured-image', 1200, 9999 );
		add_image_size( 'newskit-featured-image-large', 2000, 9999 );
		add_image_size( 'newskit-featured-image-small', 780, 9999 );
		add_image_size( 'newskit-archive-image', 800, 600, true );
		add_image_size( 'newskit-archive-image-large', 1200, 900, true );
		add_image_size( 'newskit-footer-logo', 400, 9999 );

		if ( ! get_theme_mod( 'archive_enable_cropping', true ) ) {
			add_image_size( 'newskit-archive-image', 800, 9999, false );
			add_image_size( 'newskit-archive-image-large', 1200, 9999, false );
		}

		/**
		 * Enable feature support for specific post types.
		 */
		add_post_type_support( 'page', 'excerpt' ); // Custom excerpts for pages, normally restricted to posts.

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu'   => __( 'Primary Menu', 'newskit' ),
				'secondary-menu' => __( 'Secondary Menu', 'newskit' ),
				'tertiary-menu'  => __( 'Tertiary Menu', 'newskit' ),
				'highlight-menu' => __( 'Topic Highlight Menu', 'newskit' ),
				'social-menu'         => __( 'Social Links Menu', 'newskit' ),
				'mobile-menu'         => __( 'Mobile Menu', 'newskit' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'script',
				'search-form',
				'style',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array( 'site-title' ),
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'newskit' ),
					'shortName' => __( 'S', 'newskit' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'newskit' ),
					'shortName' => __( 'M', 'newskit' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'newskit' ),
					'shortName' => __( 'L', 'newskit' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'newskit' ),
					'shortName' => __( 'XL', 'newskit' ),
					'size'      => 44,
					'slug'      => 'huge',
				),
			)
		);

		$primary_color   = newskit_get_primary_color();
		$secondary_color = newskit_get_secondary_color();

		if ( 'default' !== get_theme_mod( 'theme_colors' ) ) {
			$primary_color   = get_theme_mod( 'primary_color_hex', $primary_color );
			$secondary_color = get_theme_mod( 'secondary_color_hex', $secondary_color );
		}

		$primary_color_variation   = newskit_adjust_brightness( $primary_color, -40 );
		$secondary_color_variation = newskit_adjust_brightness( $secondary_color, -40 );

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'newskit' ),
					'slug'  => 'primary',
					'color' => $primary_color,
				),
				array(
					'name'  => __( 'Primary Variation', 'newskit' ),
					'slug'  => 'primary-variation',
					'color' => $primary_color_variation,
				),
				array(
					'name'  => __( 'Secondary', 'newskit' ),
					'slug'  => 'secondary',
					'color' => $secondary_color,
				),
				array(
					'name'  => __( 'Secondary Variation', 'newskit' ),
					'slug'  => 'secondary-variation',
					'color' => $secondary_color_variation,
				),
				array(
					'name'  => __( 'Dark Gray', 'newskit' ),
					'slug'  => 'dark-gray',
					'color' => '#111111', // color__text-main
				),
				array(
					'name'  => __( 'Medium Gray', 'newskit' ),
					'slug'  => 'medium-gray',
					'color' => '#767676', // color__text-light
				),
				array(
					'name'  => __( 'Light Gray', 'newskit' ),
					'slug'  => 'light-gray',
					'color' => '#EEEEEE', // color__background-pre
				),
				array(
					'name'  => __( 'White', 'newskit' ),
					'slug'  => 'white',
					'color' => '#FFFFFF',
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => __( 'Primary to primary variation', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, ' . esc_attr( newskit_hex_to_rgb( $primary_color ) ) . ' 0%, ' . esc_attr( newskit_hex_to_rgb( $primary_color_variation ) ) . ' 100% )',
					'slug'     => 'grad-1',
				),
				array(
					'name'     => __( 'Secondary to secondary variation', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, ' . esc_attr( newskit_hex_to_rgb( $secondary_color ) ) . ' 0%, ' . esc_attr( newskit_hex_to_rgb( $secondary_color_variation ) ) . ' 100% )',
					'slug'     => 'grad-2',
				),
				array(
					'name'     => __( 'Black to medium gray', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, rgb( 17, 17, 17 ) 0%, rgb( 85, 85, 85 ) 100% )',
					'slug'     => 'grad-3',
				),
				array(
					'name'     => __( 'Dark gray to medium gray', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, rgb( 68, 68, 68 ) 0%, rgb( 136, 136, 136 ) 100% )',
					'slug'     => 'grad-4',
				),
				array(
					'name'     => __( 'Medium gray to light gray', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, rgb( 119, 119, 119 ) 0%, rgb( 221, 221, 221 ) 100% )',
					'slug'     => 'grad-5',
				),
				array(
					'name'     => __( 'Light gray to white', 'newskit' ),
					'gradient' => 'linear-gradient( 135deg, rgb( 221, 221, 221 ) 0%, rgb( 255, 255, 255 ) 100% )',
					'slug'     => 'grad-6',
				),
			)
		);

		// Add block custom spacing support.
		add_theme_support( 'custom-spacing' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Make our theme AMP/PWA Native
		add_theme_support(
			'amp',
			[
				'service_worker' => [
					'cdn_script_caching'   => true,
					'google_fonts_caching' => true,
				],
			]
		);

		// Add custom theme support - post subtitle
		add_theme_support( 'post-subtitle' );
	}
endif;
add_action( 'after_setup_theme', 'newskit_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newskit_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'newskit' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title accent-header"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Slide-out Sidebar', 'newskit' ),
			'id'            => 'header-1',
			'description'   => esc_html__( 'Add widgets here to appear in an off-screen sidebar when it is enabled under the Customizer Header Settings.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="below-content widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Above Header', 'newskit' ),
			'id'            => 'header-2',
			'description'   => esc_html__( 'Add widgets here to appear above the site header.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="below-content widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Below Header', 'newskit' ),
			'id'            => 'header-3',
			'description'   => esc_html__( 'Add widgets here to appear below the site header.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="below-content widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Above Footer', 'newskit' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here to appear above the site footer.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="above-footer widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'newskit' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Above Copyright', 'newskit' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here to appear below the footer, above the copyright information.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Article above content', 'newskit' ),
			'id'            => 'article-1',
			'description'   => __( 'Add widgets here to appear above article content.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="above-content widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Article below content', 'newskit' ),
			'id'            => 'article-2',
			'description'   => __( 'Add widgets here to appear below article content.', 'newskit' ),
			'before_widget' => '<section id="%1$s" class="below-content widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'newskit_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function newskit_content_width() {
	$content_width = 780;

	// Check if front page or using One-Column Wide template
	if ( ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) || is_page_template( 'single-wide.php' ) ) {
		$content_width = 1200;
	}
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'newskit_content_width', $content_width );
}
add_action( 'template_redirect', 'newskit_content_width', 0 );

/**
 * Return the list of custom fonts in use.
 */
function newskit_get_used_custom_fonts(): array {
	return array_filter( [ get_theme_mod( 'font_header', '' ), get_theme_mod( 'font_body', '' ) ] );
}

/**
 * Enqueue scripts and styles.
 */
function newskit_scripts() {
	wp_enqueue_style( 'newskit-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'newskit-style', 'rtl', 'replace' );

	/**
	 * Filters whether to enqueue print styles.
	 *
	 * @param bool $should_enqueue_print_styles Whether to enqueue print styles.
	 */
	if ( apply_filters( 'newskit_theme_enqueue_print_styles', true ) ) {
		wp_enqueue_style( 'newskit-print-style', get_template_directory_uri() . '/styles/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	}

	// Load custom fonts, if any.
	if ( get_theme_mod( 'custom_font_import_code', '' ) ) {
		wp_enqueue_style( 'newskit-font-import', newskit_custom_typography_link( 'custom_font_import_code' ), array(), null );
	}

	if ( get_theme_mod( 'custom_font_import_code_alternate', '' ) ) {
		wp_enqueue_style( 'newskit-font-alternative-import', newskit_custom_typography_link( 'custom_font_import_code_alternate' ), array(), null );
	}

	/**
	 * Filters whether to enqueue JS.
	 *
	 * @param bool $should_enqueue_js Whether to enqueue JS.
	 */
	if ( ! apply_filters( 'newskit_theme_enqueue_js', true ) ) {
		return;
	}

	$newskit_l10n = array(
		'open_search'         => esc_html__( 'Open Search', 'newskit' ),
		'close_search'        => esc_html__( 'Close Search', 'newskit' ),
		'expand_comments'     => esc_html__( 'Expand Comments', 'newskit' ),
		'collapse_comments'   => esc_html__( 'Collapse Comments', 'newskit' ),
		'show_order_details'  => esc_html__( 'Show details', 'newskit' ),
		'hide_order_details'  => esc_html__( 'Hide details', 'newskit' ),
		'open_dropdown_menu'  => esc_html__( 'Open dropdown menu', 'newskit' ),
		'close_dropdown_menu' => esc_html__( 'Close dropdown menu', 'newskit' ),
		'is_amp'              => newskit_is_amp(),
	);

	if ( ! newskit_is_amp() ) {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'newskit-amp-fallback', get_theme_file_uri( '/js/dist/amp-fallback.js' ), array(), wp_get_theme()->get( 'Version' ), true );
		wp_localize_script( 'newskit-amp-fallback', 'newskitScreenReaderText', $newskit_l10n );
	}

	wp_enqueue_script( 'newskit-menu-accessibility', get_theme_file_uri( '/js/dist/menu-accessibility.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script( 'newskit-menu-accessibility', 'newskitScreenReaderText', $newskit_l10n );

	if ( newskit_is_sticky_animated_header() ) {
		wp_enqueue_script( 'amp-animation', 'https://cdn.ampproject.org/v0/amp-animation-0.1.js', array(), '0.1', true );
		wp_enqueue_script( 'amp-position-observer', 'https://cdn.ampproject.org/v0/amp-position-observer-0.1.js', array(), '0.1', true );
	}

	wp_enqueue_script( 'newskit-font-loading', get_theme_file_uri( '/js/dist/font-loading.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script(
		'newskit-font-loading',
		'newskitFontLoading',
		[
			'fonts' => newskit_get_used_custom_fonts(),
		]
	);

	if ( get_theme_mod( 'post_time_ago' ) ) {
		wp_register_script( 'newskit-relative-time', get_theme_file_uri( '/js/dist/relative-time.js' ), [], wp_get_theme()->get( 'Version' ), true );

		$cutoff_in_days = get_theme_mod( 'post_time_ago_cut_off', NP_DEFAULT_POST_TIME_AGO_CUT_OFF_DAYS );
		if ( get_theme_mod( 'post_updated_date' ) ) {
			// Switch cut off to 24 hours if we are also displaying the updated date.
			$cutoff_in_days = 1;
		}
		wp_localize_script(
			'newskit-relative-time',
			'newskit_relative_time',
			[
				'language_tag' => str_replace( '_', '-', get_locale() ), // The language tag in the format of 'en-US' for example.
				'cutoff'       => $cutoff_in_days,
			]
		);
		wp_enqueue_script( 'newskit-relative-time' );
	}
}
add_action( 'wp_enqueue_scripts', 'newskit_scripts' );

/**
 * Add AMP-related attributes to the script tags.
 *
 * @param string $tag Enqueued script tag.
 * @param string $handle Handle of enqueued of script.
 *
 * @return string Modified $tag.
 */
function newskit_add_amp_attributes( $tag, $handle ) {

	if ( newskit_is_sticky_animated_header() ) {
		$scripts_to_defer = array( 'amp-animation', 'amp-position-observer' );
		foreach ( $scripts_to_defer as $defer_script ) {
			if ( $defer_script === $handle ) {
				return str_replace( ' src', ' async custom-element="true" src', $tag );
			}
		}
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'newskit_add_amp_attributes', 10, 3 );

/**
 * Add AMP animation for when:
 * - A site has a sticky header, and a simplified subpage header
 * - When viewing a page or post with a featured image behind or beside.
 */
function newskit_sticky_header_amp_animation() {
	if ( newskit_is_sticky_animated_header() ) {
		$sticky_header_fade_out = array(
			'duration'   => '500ms',
			'fill'       => 'both',
			'iterations' => '1',
			'animations' => array(
				array(
					'selector'  => '#masthead .sticky-bg',
					'keyframes' => array(
						'opacity' => 0,
					),
				),
			),
		);

		$sticky_header_fade_in = array(
			'duration'   => '500ms',
			'fill'       => 'both',
			'iterations' => '1',
			'animations' => array(
				array(
					'selector'  => '#masthead .sticky-bg',
					'keyframes' => array(
						'opacity' => 0.7,
					),
				),
			),
		);

		echo '<amp-animation id="headerFadeOut" layout="nodisplay"><script type="application/json">' . wp_json_encode( $sticky_header_fade_out ) . '</script></amp-animation>';
		echo '<amp-animation id="headerFadeIn" layout="nodisplay"><script type="application/json">' . wp_json_encode( $sticky_header_fade_in ) . '</script></amp-animation>';
	}
}
add_action( 'wp_body_open', 'newskit_sticky_header_amp_animation' );

/**
 * Enqueue scripts for:
 * - Featured Image position option
 * - Article Subtitle
 */
function newskit_enqueue_scripts() {
	$languages_path = get_parent_theme_file_path( '/languages' );
	$theme_version  = wp_get_theme()->get( 'Version' );
	$post_type      = get_post_type();
	$current_screen = get_current_screen();

	// Add check to see if currently on the widgets screen; none of these files are needed there, but are loaded as of WP 5.8.
	// See: https://github.com/WordPress/gutenberg/issues/28538.
	if ( 'widgets' === $current_screen->id ) {
		return;
	}

	// Featured Image options.
	wp_register_script(
		'newskit-extend-featured-image-script',
		get_theme_file_uri( '/js/dist/extend-featured-image-editor.js' ),
		array( 'wp-blocks', 'wp-components' ),
		$theme_version
	);
	wp_set_script_translations( 'newskit-extend-featured-image-script', 'newskit', $languages_path );
	wp_localize_script(
		'newskit-extend-featured-image-script',
		'newskit_theme_featured_image_post_types',
		newskit_get_featured_image_post_types()
	);
	wp_enqueue_script( 'newskit-extend-featured-image-script' );

	// Article subtitle.
	if ( 'post' === $post_type ) {
		wp_enqueue_script( 'newskit-post-subtitle', get_theme_file_uri( '/js/dist/post-subtitle.js' ), array(), $theme_version, true );
		wp_set_script_translations( 'newskit-post-subtitle', 'newskit', $languages_path );

		wp_enqueue_script( 'newskit-post-summary', get_theme_file_uri( '/js/dist/post-summary.js' ), array(), $theme_version, true );
		wp_set_script_translations( 'newskit-post-summary', 'newskit', $languages_path );

	}

	// Post meta options.
	wp_register_script(
		'newskit-post-meta-toggles',
		get_theme_file_uri( '/js/dist/post-meta-toggles.js' ),
		array(),
		$theme_version,
		true
	);
	wp_set_script_translations( 'newskit-post-meta-toggles', 'newskit', $languages_path );
	wp_localize_script(
		'newskit-post-meta-toggles',
		'newskit_post_meta_post_types',
		newskit_get_post_toggle_post_types()
	);
	wp_enqueue_script( 'newskit-post-meta-toggles' );

	// Remove FSE-related Gutenberg blocks.
	$allowed_fse_blocks = newskit_fse_blocks_to_remove();
	wp_register_script( 'newskit-hide-fse-blocks', get_theme_file_uri( '/js/dist/editor-remove-blocks.js' ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), $theme_version, true );
	wp_localize_script( 'newskit-hide-fse-blocks', 'updateAllowedBlocks', $allowed_fse_blocks );
	wp_enqueue_script( 'newskit-hide-fse-blocks' );
}
add_action( 'enqueue_block_editor_assets', 'newskit_enqueue_scripts' );


/**
 * Check for additional allowed blocks
 *
 * Add this flag to the wp-config.php to allow more blocks, formatted in a array --
 * for example: `define( 'NEWSPACK_FSE_BLOCKS_ALLOWED', ['core/avatar', 'core/loginout'] );`
 *
 * @return array List of allowed FSE blocks.
 */
function newskit_is_fse_blocks_allowed() {
	if ( defined( 'NEWSPACK_FSE_BLOCKS_ALLOWED' ) ) {
		return NEWSPACK_FSE_BLOCKS_ALLOWED;
	}
}

/**
 * Put together list of FSE blocks to remove
 *
 * @return array FSE blocks to remove from editor.
 */
function newskit_fse_blocks_to_remove() {

	// List of all FSE blocks to remove from the editor.
	$fse_blocks = array(
		'core/loginout',
		'core/comments',
		'core/post-comments-form',
		'core/comments-query-loop',
		'core/query',
		// 'core/post-title', Temporarily allow this block. Ref. https://github.com/woocommerce/woocommerce/pull/52209
		'core/post-featured-image',
		'core/post-excerpt',
		'core/post-content',
		'core/post-terms',
		'core/post-date',
		'core/post-author',
		'core/post-author-name',
		'core/post-navigation-link',
		'core/read-more',
		'core/avatar',
		'core/post-author-biography',
		'core/query-title',
		'core/term-description',
	);

	// Get site-specific allowed FSE blocks.
	if ( is_array( newskit_is_fse_blocks_allowed() ) ) {
		$get_allowed_blocks = array_map( 'esc_html', newskit_is_fse_blocks_allowed() );

		// Remove the allowed FSE blocks from the list of blocks to remove.
		if ( $get_allowed_blocks ) {
			$fse_blocks = array_diff( $fse_blocks, $get_allowed_blocks );
		}
	}

	// Turn FSE blocks array into a string.
	$fse_blocks = implode( ',', $fse_blocks );

	// Format FSE block list so it can be passed to the JavaScript file as a translation.
	$blocks_to_remove = array(
		'removeblocks' => $fse_blocks,
	);

	// Return the list of blocks to remove.
	return $blocks_to_remove;
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function newskit_skip_link_focus_fix() {
	// Bail if this is an AMP page, because AMP already handles this bug.
	if ( newskit_is_amp() ) {
		return;
	}

	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'newskit_skip_link_focus_fix' );

/**
 * Checks whether the amp animation files need to be loaded for the sticky header.
 */
function newskit_is_sticky_animated_header() {
	$header_sticky          = get_theme_mod( 'header_sticky', false );
	$header_sub_simplified  = get_theme_mod( 'header_sub_simplified', false );
	$feat_img_behind_beside = in_array( newskit_featured_image_position(), array( 'behind', 'beside' ) );

	if ( $header_sticky && $header_sub_simplified && $feat_img_behind_beside && newskit_is_amp() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Enqueue supplemental block editor styles.
 */
function newskit_editor_customizer_styles() {

	wp_enqueue_style( 'newskit-editor-customizer-styles', get_theme_file_uri( '/styles/style-editor-customizer.css' ), false, '1.1', 'all' );

	// Check for color or font customizations.
	$theme_customizations = '';
	if ( 'custom' === get_theme_mod( 'theme_colors' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		$theme_customizations .= newskit_custom_colors_css();
	}

	if ( get_theme_mod( 'font_body', '' ) || get_theme_mod( 'font_header', '' ) || get_theme_mod( 'accent_allcaps', true ) ) {
		$theme_customizations .= newskit_custom_typography_css();
	}

	// If there are any, add those styles inline.
	if ( $theme_customizations ) {
		wp_add_inline_style( 'newskit-editor-customizer-styles', $theme_customizations );
	}

	// If custom fonts are assigned, enqueue them as well.
	if ( get_theme_mod( 'custom_font_import_code', '' ) ) {
		wp_enqueue_style( 'newskit-font-import', newskit_custom_typography_link( 'custom_font_import_code' ), array(), null );
	}
	if ( get_theme_mod( 'custom_font_import_code_alternate', '' ) ) {
		wp_enqueue_style( 'newskit-font-alternative-import', newskit_custom_typography_link( 'custom_font_import_code_alternate' ), array(), null );
	}

}
add_action( 'enqueue_block_editor_assets', 'newskit_editor_customizer_styles' );

/**
 * Determine if current editor page is the static front page.
 */
function newskit_is_static_front_page() {
	global $post;
	$page_on_front = intval( get_option( 'page_on_front' ) );
	return isset( $post->ID ) && intval( $post->ID ) === $page_on_front;
}

/**
 * Check for specific templates.
 */
function newskit_check_current_template() {
	global $post;

	$template_file = ( $post && $post->ID ) ? get_post_meta( $post->ID, '_wp_page_template', true ) : '';

	return $template_file;
}

/**
 * Add body class on editor pages if editing the static front page.
 */
function newskit_filter_admin_body_class( $classes ) {

	if ( newskit_is_static_front_page() ) {
		$classes .= ' newskit-static-front-page';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes .= ' no-sidebar';
	}

	if (
		'single-feature.php' === newskit_check_current_template()
		|| 'no-header-footer.php' === newskit_check_current_template()
	) {
		$classes .= ' newskit-single-column-template';
	} elseif ( 'single-wide.php' === newskit_check_current_template() ) {
		$classes .= ' newskit-single-wide-template';
	} else {
		$classes .= ' newskit-default-template';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'newskit_filter_admin_body_class', 10, 1 );


/**
 * Enqueue CSS styles for the editor that use the <body> tag.
 */
function newskit_enqueue_editor_override_assets( $classes ) {
	wp_enqueue_style( 'newskit-editor-overrides', get_theme_file_uri( '/styles/style-editor-overrides.css' ), false, '1.1', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'newskit_enqueue_editor_override_assets' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function newskit_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'newskit_front_page_template' );

/**
 * Override Jetpack Image Accelerator (Photon) downsizing of avatars. If an image has a square aspect ratio and the width is between 1-120px, assume it is an avatar and block downsizing.
 * https://developer.jetpack.com/hooks/jetpack_photon_override_image_downsize/
 *
 * @param boolean $default The default value, generally false.
 * @param array   $args Array of image details.
 *
 * @return boolean Should Photon be stopped from downsizing.
 */
function newskit_override_avatar_downsizing( $default, $args ) {
	if ( is_array( $args['size'] ) && 2 === count( $args['size'] ) ) {
		list( $width, $height ) = $args['size'];
		if ( $width === $height && $width <= 120 & $width > 0 ) {
			return true;
		}
	}
	return $default;
}
add_filter( 'jetpack_photon_override_image_downsize', 'newskit_override_avatar_downsizing', 10, 2 );

/**
 * Register meta fields:
 * - Featured Image position option
 * - Article Subtitle
 */
function newskit_register_meta() {
	$featured_image_post_types = newskit_get_featured_image_post_types();

	foreach ( $featured_image_post_types as $post_type ) {
		register_post_meta(
			$post_type,
			'newskit_featured_image_position',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);
	}

	register_post_meta(
		'post',
		'newskit_post_subtitle',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	register_post_meta(
		'post',
		'newskit_article_summary_title',
		array(
			'default'      => esc_html__( 'Overview:', 'newskit' ),
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	register_post_meta(
		'post',
		'newskit_article_summary',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
		)
	);

	$updated_date_post_types = newskit_get_updated_date_supported_post_types();

	foreach ( $updated_date_post_types as $post_type ) {
		register_post_meta(
			$post_type,
			'newskit_hide_updated_date',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'boolean',
			)
		);

		register_post_meta(
			$post_type,
			'newskit_show_updated_date',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'boolean',
			)
		);
	}

	register_post_meta(
		'page',
		'newskit_hide_page_title',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'boolean',
		)
	);

	register_post_meta(
		'page',
		'newskit_show_share_buttons',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'boolean',
			'default'      => false,
		)
	);
}
add_action( 'init', 'newskit_register_meta' );


/**
 * Migrate theme settings when switching within the family of Newskit themes.
 *
 * @since Newskit Theme 1.0.0
 */
function newskit_migrate_settings( $old_name, $old_theme = false ) {
	$theme           = wp_get_theme();
	$old_stylesheet  = is_a( $old_theme, 'WP_Theme' ) ? $old_theme->get_stylesheet() : null;
	$new_stylesheet  = $theme->get_stylesheet();
	$newskit_prefix = 'newskit-';

	if ( 0 === strrpos( $old_stylesheet, $newskit_prefix ) && 0 === strrpos( $new_stylesheet, $newskit_prefix ) ) {
		$mods = get_option( 'theme_mods_' . $old_stylesheet, null );
		if ( $mods ) {
			update_option( 'theme_mods_' . $new_stylesheet, $mods );
		}
	}
}
add_action( 'after_switch_theme', 'newskit_migrate_settings', 10, 2 );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function newskit_colors_css_wrap() {

	// Only bother if we haven't customized the color.
	if ( ( ! is_customize_preview() && ( 'default' === get_theme_mod( 'theme_colors', 'default' ) && newskit_get_mobile_cta_color() === get_theme_mod( 'header_cta_hex', newskit_get_mobile_cta_color() ) && 'default' === get_theme_mod( 'ads_color', 'default' ) ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
	?>

	<style type="text/css" id="custom-theme-colors">
		<?php echo newskit_custom_colors_css(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</style>
	<?php
}
add_action( 'wp_head', 'newskit_colors_css_wrap' );

/**
 * Get theme colors' values.
 *
 * @return string[] Array of colors.
 */
function newskit_get_colors() {
	$colors              = [];
	$colors['primary']   = newskit_get_primary_color();
	$colors['secondary'] = newskit_get_secondary_color();
	$colors['cta']       = get_theme_mod( 'header_cta_hex', newskit_get_mobile_cta_color() );

	if ( true === get_theme_mod( 'header_solid_background', false ) ) {
		$colors['header'] = $colors['primary'];
	}

	if ( 'default' !== get_theme_mod( 'theme_colors', 'default' ) ) {
		$colors['primary']   = get_theme_mod( 'primary_color_hex', $colors['primary'] );
		$colors['secondary'] = get_theme_mod( 'secondary_color_hex', $colors['secondary'] );

		if ( 'default' !== get_theme_mod( 'header_color', 'default' ) ) {
			$colors['header']       = get_theme_mod( 'header_color_hex', '#666666' );
			$colors['primary_menu'] = get_theme_mod( 'header_primary_menu_color_hex', '' );
		} else {
			$colors['header'] = $colors['primary'];
		}

		if ( 'default' !== get_theme_mod( 'footer_color', 'default' ) ) {
			$colors['footer'] = get_theme_mod( 'footer_color_hex', '' );
		}
	}

	// Set color contrasts.
	foreach ( $colors as $color_key => $color_value ) {
		$colors[ $color_key . '_contrast' ] = newskit_get_color_contrast( $color_value );
	}

	return $colors;
}

/**
 * Add CSS variables to theme's colors.
 */
function newskit_colors_css_variables() {
	$colors = newskit_get_colors();
	?>
	<style type="text/css" id="newskit-colors-variables">
		:root {
			<?php foreach ( $colors as $color_key => $color_value ) : ?>
				--newskit-<?php echo esc_attr( str_replace( '_', '-', $color_key ) ); ?>-color: <?php echo esc_attr( $color_value ); ?>;
			<?php endforeach; ?>
		}
	</style>
	<?php
}
add_action( 'wp_head', 'newskit_colors_css_variables' );

/**
 * Display custom font CSS in customizer and on frontend.
 */
function newskit_typography_css_wrap() {

	if ( is_admin() || ( ! get_theme_mod( 'font_body', '' ) && ! get_theme_mod( 'font_header', '' ) && ! get_theme_mod( 'accent_allcaps', true ) ) ) {
		return;
	}
	?>

	<style type="text/css" id="custom-theme-fonts">
		<?php echo newskit_custom_typography_css(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</style>

	<?php
}
add_action( 'wp_head', 'newskit_typography_css_wrap' );

/**
 * Returns an array of 'acceptable' SVG tags to use with wp_kses().
 */
function newskit_sanitize_svgs() {
	$svg_args = array(
		'svg'      => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true,
		),
		'g'        => array(
			'fill'      => true,
			'fill-rule' => true,
		),
		'title'    => array(
			'title' => true,
		),
		'path'     => array(
			'd'    => true,
			'fill' => true,
		),
		'defs'     => true,
		'clipPath' => true,
		'polygon'  => array(
			'points' => true,
		),
	);

	return $svg_args;
}

/**
 * Truncates text to a specific character length, without breaking a character.
 */
function newskit_truncate_text( $content, $length, $after = '...' ) {
	// If content is already shorter than the truncate length, return it.
	if ( strlen( $content ) <= $length ) {
		return $content;
	}

	// Find the first space after the desired length:
	$breakpoint = strpos( $content, ' ', $length );

	// Make sure $breakpoint isn't returning false, and is less than length of content:
	if ( false !== $breakpoint && $breakpoint < strlen( $content ) - 1 ) {
		$content = substr( $content, 0, $breakpoint ) . $after;
	}
	return $content;
}

 /**
  * Returns an array of 'acceptable' avatar tags, to use with wp_kses().
  */
function newskit_sanitize_avatars() {
	$avatar_args = array(
		'img'      => array(
			'class'  => true,
			'src'    => true,
			'alt'    => true,
			'width'  => true,
			'height' => true,
			'data-*' => true,
			'srcset' => true,
		),
		'noscript' => array(),
	);

	return $avatar_args;
}

/**
 * Get post types that support featured image settings.
 *
 * @return array Array of post type slugs.
 */
function newskit_get_featured_image_post_types() {
	return apply_filters( 'newskit_theme_featured_image_post_types', array( 'post', 'page' ) );
}

/**
 * Get post types that support the hiding date and page title settings.
 *
 * @return array Array of post type slugs.
 */
function newskit_get_post_toggle_post_types() {
	$hide_date_post_types = [];
	$show_date_post_types = [];
	if ( true === get_theme_mod( 'post_updated_date', false ) ) {
		$hide_date_post_types = newskit_get_updated_date_supported_post_types();
	} else {
		$show_date_post_types = newskit_get_updated_date_supported_post_types();
	}

	return array(
		'hide_date'          => $hide_date_post_types,
		'show_date'          => $show_date_post_types,
		'hide_title'         => [ 'page' ],
		'show_share_buttons' => function_exists( 'sharing_display' ) ? [ 'page' ] : [],
	);
}

/**
 * Co-authors in RSS and other feeds
 * /wp-includes/feed-rss2.php uses the_author(), so we selectively filter the_author value
 */
function newskit_coauthors_in_rss( $the_author ) {
	if ( ! is_feed() || ! function_exists( 'coauthors' ) ) {
		return $the_author;
	} else {
		return coauthors( null, null, null, null, false );
	}
}
add_filter( 'the_author', 'newskit_coauthors_in_rss' );

/**
 * Should a particular Ad deployment use responsive placement.
 *
 * @param boolean $responsive Default value of whether to use responsive placement.
 * @param string  $placement ID of the ad placement.
 * @param string  $context Optional second string describing the ad placement. For Widget placements, the ID of the Widget.
 * @return boolean Whether to use responsive placement.
 */
function newskit_theme_newskit_ads_maybe_use_responsive_placement( $responsive, $placement, $context ) {
	// Apply Responsive placement to widgets using Super Cool Ad Inserter.
	if ( 'newskit_ads_widget' === $placement && strpos( $context, 'scaip' ) === 0 ) {
		return true;
	}
	return $responsive;
}
add_filter( 'newskit_ads_maybe_use_responsive_placement', 'newskit_theme_newskit_ads_maybe_use_responsive_placement', 10, 3 );

/**
 * Add a extra span and class to the_archive_title, for easier styling.
 */
function newskit_update_the_archive_title( $title ) {
	// Split the title into parts so we can wrap them with spans:
	$title_parts  = explode( '<span class="page-description">', $title, 2 );
	$title_format = get_theme_mod( 'archive_title_format', 'default' );

	// Glue it back together again.
	if ( ! empty( $title_parts[1] ) ) {
		$title = wp_kses(
			$title_parts[1],
			array(
				'span' => array(
					'class' => array(),
				),
			)
		);
		if ( 'default' === $title_format ) {
			$title = '<span class="page-subtitle">' . esc_html( $title_parts[0] ) . '</span><span class="page-description">' . $title;
		} else {
			$title = '<span class="page-description">' . $title;
		}
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'newskit_update_the_archive_title', 11, 1 );

/**
 * When new post is created, maybe set the post template.
 *
 * @param integer $post_ID The post ID.
 * @param WP_Post $post Post object.
 * @param boolean $update Whether this is an existing post being updated or not.
 */
function newskit_maybe_set_default_post_template( $post_ID, $post, $update ) {
	if ( ! $update ) {
		if ( 'post' === $post->post_type ) {
			$post_template_default = get_theme_mod( 'post_template_default' );
			if ( 'default' !== $post_template_default ) {
				update_post_meta( $post_ID, '_wp_page_template', $post_template_default );
			}
		} elseif ( 'page' === $post->post_type ) {
			$page_template_default = get_theme_mod( 'page_template_default' );
			if ( 'default' !== $page_template_default ) {
				update_post_meta( $post_ID, '_wp_page_template', $page_template_default );
			}
		}
	}
}
add_action( 'wp_insert_post', 'newskit_maybe_set_default_post_template', 10, 3 );

/**
 * Dequeue Media Element styles if AMP is enabled.
 */
function newskit_dequeue_mediaelement() {
	if ( newskit_is_amp() ) {
		wp_deregister_script( 'wp-mediaelement' );
		wp_deregister_style( 'wp-mediaelement' );
	}
}
add_action( 'wp_enqueue_scripts', 'newskit_dequeue_mediaelement', 20 );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-newskit-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-newskit-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom typography functions.
 */
require get_template_directory() . '/inc/typography.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Logo Resizer.
 */
require get_template_directory() . '/inc/logo-resizer.php';

/**
 * Custom Login Screen.
 */
require get_template_directory() . '/inc/login-screen.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Trust Indicators compatibility file.
 */
if ( class_exists( 'Trust_Indicators' ) ) {
	require get_template_directory() . '/inc/trust-indicators.php';
}

/**
 * Load Sponsored Content compatibility file.
 */
if ( function_exists( '\Newskit_Sponsors\get_sponsors_for_post' ) ) {
	require get_template_directory() . '/inc/newskit-sponsors.php';
}

/**
 * Load Newsletters compatibility file.
 */
if ( class_exists( '\Newskit_Newsletters' ) ) {
	require get_template_directory() . '/inc/newskit-newsletters.php';
}

/**
 * Load Web Stories compatibility file.
 */
require get_template_directory() . '/inc/web-stories.php';

/**
 * Load The Events Calendar compatibility file.
 */
if ( class_exists( 'Tribe__Events__Main' ) ) {
	require get_template_directory() . '/inc/the-events-calendar.php';
}

/**
 * Multi-branded plugin support
 */
if ( class_exists( 'Newskit_Multibranded_Site\Customizations\Theme_Colors' ) ) {
	require get_template_directory() . '/inc/newskit-multibranded-site-plugin.php';
}

/**
 * Woo Templates cache handling
 */
require get_template_directory() . '/woocommerce/templates.php';

/**
 * Yoast customizations
 */
if ( class_exists( 'WPSEO_Options' ) ) {
	require get_template_directory() . '/inc/yoast.php';
}
