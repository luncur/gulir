<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'gulir_get_podcast_grid_flex_1' ) ) {
	/**
	 * @param array $settings
	 * @param null  $_query
	 *
	 * @return false|string
	 */
	function gulir_get_podcast_grid_flex_1( $settings = [], $_query = null ) {

		$settings = wp_parse_args( $settings, [
			'uuid' => '',
			'name' => 'podcast_grid_flex_1',
		] );

		$settings = gulir_detect_dynamic_query( $settings );

		if ( empty( $settings['pagination'] ) ) {
			$settings['no_found_rows'] = true;
		}

		$settings['classes'] = 'block-grid block-podcast-grid-flex-1';

		if ( empty( $settings['columns'] ) ) {
			$settings['columns'] = 3;
		}
		if ( empty( $settings['column_gap'] ) ) {
			$settings['column_gap'] = 20;
		}

		if ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) {

			unset( $settings['pagination'] );

			if ( empty( $settings['columns_tablet'] ) ) {
				$settings['columns_tablet'] = 2;
			}
			if ( empty( $settings['columns_mobile'] ) ) {
				$settings['columns_mobile'] = 1;
			}
			if ( empty( $settings['carousel_gap'] ) ) {
				$settings['carousel_gap'] = 20;
			}
			if ( empty( $settings['carousel_gap_tablet'] ) ) {
				$settings['carousel_gap_tablet'] = 15;
			}
			if ( empty( $settings['carousel_gap_mobile'] ) ) {
				$settings['carousel_gap_mobile'] = 10;
			}
		}

		if ( ! empty( $settings['box_style'] ) ) {
			if ( ! empty( $settings['block_structure'] ) ) {

				$structure = explode( ',', preg_replace( '/\s+/', '', $settings['block_structure'] ) );
				if ( 'thumbnail' === $structure[0] ) {
					$settings['classes'] .= ' first-featured';
				} elseif ( 'thumbnail' === $structure[ count( $structure ) - 1 ] ) {
					$settings['classes'] .= ' last-featured';
				} else {
					$settings['classes'] .= ' featured-wo-round';
				}
			} else {
				$settings['classes'] .= ' first-featured';
			}
		}

		if ( ! $_query ) {
			$_query = gulir_query( $settings );
		}

		$settings = gulir_get_design_builder_block( $settings );

		ob_start();
		gulir_block_open_tag( $settings, $_query );
		if ( ! $_query->have_posts() ) {
			gulir_error_posts( $_query );
		} else {
			gulir_block_inner_open_tag( $settings );
			gulir_loop_podcast_grid_flex_1( $settings, $_query );
			gulir_block_inner_close_tag( $settings );
			gulir_render_pagination( $settings, $_query );
			wp_reset_postdata();
		}
		gulir_block_close_tag();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'gulir_loop_podcast_grid_flex_1' ) ) {
	/**
	 * @param  $settings
	 * @param  $_query
	 */
	function gulir_loop_podcast_grid_flex_1( $settings, $_query ) {

		$loop_index = 1;
		if ( empty( $settings['block_structure'] ) ) {
			$settings['block_structure'] = [ 'thumbnail', 'title', 'meta' ];
		} else {
			$settings['block_structure'] = explode( ',', preg_replace( '/\s+/', '', (string) $settings['block_structure'] ) );
		}
		if ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) : ?>
			<div class="post-carousel swiper-container pre-load" <?php gulir_carousel_attrs( $settings ); ?>>
				<div class="swiper-wrapper">
					<?php while ( $_query->have_posts() ) :
						$_query->the_post();
						if ( ! empty( $settings['eager_images'] ) ) {
							$settings['feat_lazyload'] = ( $loop_index <= $settings['eager_images'] ) ? 'none' : '1';
							$loop_index ++;
						}
						gulir_podcast_grid_flex_1( $settings );
					endwhile;
					?>
				</div>
				<?php gulir_carousel_footer( $settings ); ?>
			</div>
		<?php else :
			while ( $_query->have_posts() ) :
				$_query->the_post();
				if ( ! empty( $settings['eager_images'] ) ) {
					$settings['feat_lazyload'] = ( $loop_index <= $settings['eager_images'] ) ? 'none' : '1';
					$loop_index ++;
				}
				gulir_podcast_grid_flex_1( $settings );
			endwhile;
		endif;
	}
}