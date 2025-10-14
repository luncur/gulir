<?php
/**
 * Template for displaying search forms.
 *
 * @package Gulir
 */

$unique_id = gulir_search_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'gulir' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'gulir' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
		<?php echo wp_kses( gulir_get_icon_svg( 'search', 28 ), gulir_sanitize_svgs() ); ?>
		<span class="screen-reader-text">
			<?php echo esc_html_x( 'Search', 'submit button', 'gulir' ); ?>
		</span>
	</button>
</form>
