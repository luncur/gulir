<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

global $post;

$gulir_next_url    = '';
$gulir_current_url = get_permalink();
$gulir_post_id     = get_the_ID();
$gulir_next_button = gulir_get_option( 'ajax_next_button' );

if ( ! empty( gulir_get_option( 'ajax_next_cat' ) ) ) {
	$gulir_post_prev = get_previous_post( true );
} else {
	$gulir_post_prev = get_previous_post();
}
if ( ! empty( $gulir_post_prev ) ) {
	$gulir_next_url = get_permalink( $gulir_post_prev );
}
wp_reset_postdata();

$gulir_classes = 'single-post-outer';
if ( ! empty( $gulir_next_button ) ) {
	$gulir_classes .= ' has-continue-reading';
}
if ( have_posts() ) :
	while ( have_posts() ) {
		the_post(); ?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="robots" content="noindex, nofollow" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel="profile" href="https://gmpg.org/xfn/11" />
			<link rel="canonical" href="<?php echo esc_url( $gulir_current_url ); ?>" />
		</head>
		<body>
		<div class="<?php echo strip_tags( $gulir_classes ); ?>" data-postid="<?php echo esc_attr( $gulir_post_id ); ?>" data-postlink="<?php echo esc_url( get_permalink() ); ?>" data-nextposturl="<?php echo esc_url( $gulir_next_url ); ?>">
			<?php gulir_render_single_post(); ?>
			<?php if ( ! empty( $gulir_next_button ) ) : ?>
				<div class="continue-reading">
					<a href="<?php echo esc_url( $gulir_current_url ); ?>" class="continue-reading-btn is-btn"><?php gulir_html_e( 'Continue Reading', 'gulir' ); ?></a>
				</div>
			<?php else :
				/** add read history */
				if ( gulir_get_option( 'reading_history' ) && class_exists( 'Gulir_Personalize_Helper' ) ) {
					Gulir_Personalize_Helper::get_instance()->save_history( $gulir_post_id );
				}
			endif; ?>
		</div>
		</body>
		</html>
		<?php
	}
endif;

die();
