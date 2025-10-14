<?php
/**
 * Displays the search form for the header.
 *
 * @package Gulir
 */
?>

<div class="header-search-contain">
	<button id="search-toggle" on="tap:AMP.setState( { searchVisible: !searchVisible } ), search-form-2.focus" aria-controls="search-menu" [aria-expanded]="searchVisible ? 'true' : 'false'" aria-expanded="false">
		<span class="screen-reader-text" [text]="searchVisible ? '<?php esc_html_e( 'Close Search', 'gulir' ); ?>' : '<?php esc_html_e( 'Open Search', 'gulir' ); ?>'">
			<?php esc_html_e( 'Open Search', 'gulir' ); ?>
		</span>
		<span class="search-icon"><?php echo wp_kses( gulir_get_icon_svg( 'search', 28 ), gulir_sanitize_svgs() ); ?></span>
		<span class="close-icon"><?php echo wp_kses( gulir_get_icon_svg( 'close', 28 ), gulir_sanitize_svgs() ); ?></span>
	</button>
	<div id="header-search" [aria-expanded]="searchVisible ? 'true' : 'false'" aria-expanded="false">
		<?php get_search_form(); ?>
	</div><!-- #header-search -->
</div><!-- .header-search-contain -->
