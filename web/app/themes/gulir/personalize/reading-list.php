<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'gulir_render_reading_list_template' ) ) {
	function gulir_render_reading_list_template() {

		gulir_my_personalize();
		gulir_my_recommended();
	}
}

if ( ! function_exists( 'gulir_my_personalize' ) ) {
	function gulir_my_personalize() {

		echo '<div class="my-personalized">';
		gulir_my_saved();
		gulir_my_categories();
		gulir_my_writers();
		echo '</div>';
	}
}

if ( ! function_exists( 'gulir_my_saved' ) ) {
	function gulir_my_saved() {

		$display_mode           = gulir_get_option( 'reading_list_display_mode' );
		$image_description      = gulir_get_option( 'saved_image' );
		$image_description_dark = gulir_get_option( 'saved_image_dark' );
		$pattern                = gulir_get_option( 'saved_pattern' );

		$heading_classes = 'bookmark-section-header';
		if ( ! empty( $pattern ) && '-1' !== (string) $pattern ) {
			$heading_classes .= ' is-pattern pattern-' . $pattern;
		} else {
			$heading_classes .= ' solid-bg';
		} ?>
		<div class="saved-section">
			<div class="<?php echo strip_tags( $heading_classes ); ?>">
				<div class="rb-container edge-padding">
					<?php if ( ! empty( $image_description['url'] ) ) : ?>
						<div class="bookmark-section-header-image">
							<?php if ( ! empty( $image_description_dark['url'] ) ) : ?>
								<img loading="lazy" decoding="async" data-mode="default" src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
								<img loading="lazy" decoding="async" data-mode="dark" src="<?php echo esc_url( $image_description_dark['url'] ); ?>" alt="<?php echo strip_tags( $image_description_dark['alt'] ); ?>" height="<?php echo strip_tags( $image_description_dark['height'] ); ?>" width="<?php echo strip_tags( $image_description_dark['width'] ); ?>">
							<?php else : ?>
								<img loading="lazy" decoding="async" src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="bookmark-section-header-inner">
						<h2 class="bookmark-section-title"><?php gulir_render_inline_html( gulir_get_option( 'saved_heading' ) ); ?></h2>
						<?php if ( gulir_get_option( 'saved_description' ) ) : ?>
							<p class="bookmark-section-decs is-meta"><?php gulir_render_inline_html( gulir_get_option( 'saved_description' ) ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if ( empty( $display_mode ) ) : ?>
				<div id="my-saved" class="my-saved">
					<div class=" rb-container edge-padding"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
				</div>
			<?php else : echo gulir_my_saved_listing(); endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'gulir_my_categories' ) ) {
	function gulir_my_categories() {

		if ( ! gulir_get_option( 'interest_category' ) ) {
			return false;
		}

		$display_mode    = gulir_get_option( 'reading_list_display_mode' );
		$heading_classes = 'bookmark-section-header';
		$pattern         = gulir_get_option( 'interest_pattern' );
		if ( ! empty( $pattern ) && ( '-1' !== (string) $pattern ) ) {
			$heading_classes .= ' is-pattern pattern-' . $pattern;
		} else {
			$heading_classes .= ' solid-bg';
		}
		$image_description      = gulir_get_option( 'interest_image' );
		$image_description_dark = gulir_get_option( 'interest_image_dark' );
		?>
		<div class="interest-section">
			<div class="<?php echo strip_tags( $heading_classes ); ?>">
				<div class="rb-container edge-padding">
					<?php if ( ! empty( $image_description['url'] ) ) : ?>
						<div class="bookmark-section-header-image">
							<?php if ( ! empty( $image_description_dark['url'] ) ) : ?>
								<img loading="lazy" decoding="async" data-mode="default" src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
								<img loading="lazy" decoding="async" data-mode="dark" src="<?php echo esc_url( $image_description_dark['url'] ); ?>" alt="<?php echo strip_tags( $image_description_dark['alt'] ); ?>" height="<?php echo strip_tags( $image_description_dark['height'] ); ?>" width="<?php echo strip_tags( $image_description_dark['width'] ); ?>">
							<?php else : ?>
								<img loading="lazy" decoding="async" src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="bookmark-section-header-inner">
						<h2 class="bookmark-section-title"><?php gulir_render_inline_html( gulir_get_option( 'interest_heading' ) ); ?></h2>
						<?php if ( gulir_get_option( 'saved_description' ) ) : ?>
							<p class="bookmark-section-decs is-meta"><?php gulir_render_inline_html( gulir_get_option( 'interest_description' ) ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="interest-content rb-container edge-padding">
				<?php if ( empty( $display_mode ) ) : ?>
					<div id="my-categories">
						<div class="interest-loader"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
						<div class="interest-loader"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
					</div>
				<?php else : echo gulir_my_categories_listing(); endif; ?>
			</div>
		</div>
	<?php }
}

if ( ! function_exists( 'gulir_my_writers' ) ) {
	function gulir_my_writers() {

		if ( ! gulir_get_option( 'interest_author' ) ) {
			return false;
		}

		$display_mode    = gulir_get_option( 'reading_list_display_mode' );
		$heading_classes = 'bookmark-section-header';
		$pattern         = gulir_get_option( 'interest_pattern' );
		if ( ! empty( $pattern ) && ( '-1' !== (string) $pattern ) ) {
			$heading_classes .= ' is-pattern pattern-' . $pattern;
		} else {
			$heading_classes .= ' solid-bg';
		}
		$image_description      = gulir_get_option( 'interest_author_image' );
		$image_description_dark = gulir_get_option( 'interest_author_image_dark' );
		?>
		<div class="interest-section">
			<div class="<?php echo strip_tags( $heading_classes ); ?>">
				<div class="rb-container edge-padding">
					<?php if ( ! empty( $image_description['url'] ) ) : ?>
						<div class="bookmark-section-header-image">
							<?php if ( ! empty( $image_description_dark['url'] ) ) : ?>
								<img data-mode="default" src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
								<img data-mode="dark" src="<?php echo esc_url( $image_description_dark['url'] ); ?>" alt="<?php echo strip_tags( $image_description_dark['alt'] ); ?>" height="<?php echo strip_tags( $image_description_dark['height'] ); ?>" width="<?php echo strip_tags( $image_description_dark['width'] ); ?>">
							<?php else : ?>
								<img src="<?php echo esc_url( $image_description['url'] ); ?>" alt="<?php echo strip_tags( $image_description['alt'] ); ?>" height="<?php echo strip_tags( $image_description['height'] ); ?>" width="<?php echo strip_tags( $image_description['width'] ); ?>">
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="bookmark-section-header-inner">
						<h2 class="bookmark-section-title"><?php gulir_render_inline_html( gulir_get_option( 'interest_author_heading' ) ); ?></h2>
						<?php if ( gulir_get_option( 'saved_description' ) ) : ?>
							<p class="bookmark-section-decs is-meta"><?php gulir_render_inline_html( gulir_get_option( 'interest_author_description' ) ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="interest-content rb-container edge-padding">
				<?php if ( empty( $display_mode ) ) : ?>
					<div id="my-writers">
						<div class="interest-loader"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
						<div class="interest-loader"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
					</div>
				<?php else : echo gulir_my_writers_listing(); endif; ?>
			</div>
		</div>
	<?php }
}

if ( ! function_exists( 'gulir_my_recommended' ) ) {
	function gulir_my_recommended() {

		if ( ! gulir_get_option( 'recommended_interested' ) ) {
			return;
		}

		$display_mode = gulir_get_option( 'reading_list_display_mode' );
		if ( empty( $display_mode ) ) : ?>
			<div id="my-recommended" class="my-recommended">
				<div class="rb-container edge-padding"><?php gulir_render_svg( 'loading', '', 'animation' ); ?></div>
			</div>
		<?php else : echo gulir_my_recommended_listing();
		endif;
	}
}

if ( ! function_exists( 'gulir_my_saved_listing' ) ) {
	function gulir_my_saved_listing() {

		if ( ! is_user_logged_in() && ! empty( gulir_get_option( 'bookmark_enable_when' ) ) ) {
			ob_start();
			echo '<div class="rb-container edge-padding">';
			gulir_saved_restrict_info();
			echo '</div>';

			return ob_get_clean();
		}

		$_query = Gulir_Personalize::get_instance()->saved_posts_query();

		ob_start();
		if ( ! empty( $_query ) && $_query->have_posts() ) {
			if ( ! empty( $template ) ) {
				$GLOBALS['ruby_template_query'] = $_query;
				echo do_shortcode( $template );
			} else {
				$settings = gulir_get_archive_page_settings( 'saved_', [
						'uuid'    => 'uid_saved',
						'classes' => 'my-saved',
				] );
				/** disable pagination and bookmark */
				$settings['pagination'] = false;
				$settings['bookmark']   = '1';

				gulir_the_blog( $settings, $_query );
			}
		} else {
			gulir_saved_empty();
		}

		return ob_get_clean();
	}
}

if ( ! function_exists( 'gulir_my_categories_listing' ) ) {
	function gulir_my_categories_listing() {

		if ( ! is_user_logged_in() && 'logged' === gulir_get_option( 'bookmark_enable_when' ) ) {
			return false;
		}

		$data = Gulir_Personalize::get_instance()->get_my_categories();
		if ( empty( $data ) || ! count( $data ) ) {
			return false;
		}

		$settings = [
				'uuid'           => 'my-categories',
				'classes'        => 'block-categories block-categories-1',
				'url'            => gulir_get_option( 'interest_url' ),
				'allowed_tax'    => [ 'category' ],
				'selected_ids'   => [],
				'follow'         => true,
				'title_tag'      => 'h4',
				'count_posts'    => true,
				'columns'        => 5,
				'columns_tablet' => 3,
				'columns_mobile' => 1,
				'column_gap'     => 10,
		];
		ob_start();
		gulir_block_open_tag( $settings ); ?>
		<div class="block-inner">
			<?php
			foreach ( $data as $index => $id ) {
				$settings['cid'] = $id;
				gulir_category_item_1( $settings );
			}
			gulir_render_follow_redirect( $settings ); ?>
		</div>
		<?php
		gulir_block_close_tag();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'gulir_my_writers_listing' ) ) {
	function gulir_my_writers_listing() {

		if ( ! is_user_logged_in() && 'logged' === gulir_get_option( 'bookmark_enable_when' ) ) {
			return false;
		}

		$data = Gulir_Personalize::get_instance()->get_my_writers();

		if ( empty( $data ) || ! count( $data ) ) {
			return false;
		}

		$settings = [
				'classes'            => 'block-authors is-box-shadow',
				'uuid'               => 'my-writers',
				'url'                => gulir_get_option( 'interest_url' ),
				'follow'             => true,
				'title_tag'          => 'h4',
				'count_posts'        => true,
				'description_length' => 20,
				'columns'            => 2,
				'columns_tablet'     => 1,
				'columns_mobile'     => 1,
				'column_gap'         => 20,

		];

		ob_start();
		gulir_block_open_tag( $settings ); ?>
		<div class="block-inner">
			<?php foreach ( $data as $index => $id ) {
				$settings['author'] = $id;
				if ( ! get_user_by( 'id', $settings['author'] ) ) {
					unset( $data[ $index ] );
					continue;
				}
				gulir_author_card_1( $settings );
			}
			gulir_render_follow_redirect( $settings );
			?>
		</div>
		<?php gulir_block_close_tag();

		return ob_get_clean();
	}
}


if ( ! function_exists( 'gulir_my_recommended_listing' ) ) {
	function gulir_my_recommended_listing() {

		if ( ! is_user_logged_in() && 'logged' === gulir_get_option( 'bookmark_enable_when' ) ) {
			return false;
		}

		$template = gulir_get_option( 'recommended_template' );
		$settings = [
				'uuid' => 'uid_recommended',
		];
		$_query   = Gulir_Personalize::get_instance()->recommended_query( $settings );

		if ( empty( $_query ) || ! $_query->have_posts() ) {
			return false;
		}

		ob_start();
		if ( ! empty( $template ) ) : ?>
			<div class="rec-builder-section"><?php
				$GLOBALS['ruby_template_query'] = $_query;
				echo do_shortcode( $template );
				?></div>
		<?php else :
			$settings = gulir_get_archive_page_settings( 'recommended_', $settings ); ?>
			<div class="rec-section light-scheme"><?php gulir_the_blog( $settings, $_query ) ?></div>
		<?php endif;

		return ob_get_clean();
	}
}
