<?php
/**
 * The template part for displaying large featured images on posts.
 *
 * @package Newskit
 */

$header_sticky = get_theme_mod( 'header_sticky', false );

if ( 'behind' === newskit_featured_image_position() ) :
?>

	<div class="featured-image-behind">
		<?php newskit_post_thumbnail( 'newskit-featured-image-large' ); ?>
		<div class="wrapper">
			<header class="entry-header">
				<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
			</header>
		</div><!-- .wrapper -->
	</div><!-- .featured-image-behind -->

	<?php newskit_post_thumbnail_caption(); ?>

<?php elseif ( 'beside' === newskit_featured_image_position() ) : ?>

	<div class="featured-image-beside">
		<div class="wrapper">
			<header class="entry-header">
				<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
			</header>
		</div><!-- .wrapper -->

		<?php newskit_post_thumbnail( 'newskit-featured-image-large' ); ?>

		<?php newskit_post_thumbnail_caption(); ?>
	</div><!-- .featured-image-behind -->

<?php elseif ( 'above' === newskit_featured_image_position() ) : ?>

	<div class="featured-image-above">
		<?php newskit_post_thumbnail( 'newskit-featured-image-large' ); ?>

		<header class="entry-header">
			<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
		</header>
	</div><!-- featured-image-above -->

<?php else : ?>

	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>

	<?php
	newskit_post_thumbnail();
endif;

