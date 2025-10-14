<?php
/**
 * Displays header site branding
 *
 * @package Newskit
 */
?>
<div class="site-branding">

	<?php newskit_the_custom_logo(); ?>

	<div class="site-identity">
		<?php
		newskit_the_site_title();

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description">
					<?php echo $description; /* WPCS: xss ok. */ ?>
				</p>
		<?php endif; ?>
	</div><!-- .site-identity -->

</div><!-- .site-branding -->
