<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gulir
 */

get_header();
?>

	<section id="primary" class="content-area <?php echo esc_attr( gulir_get_category_tag_classes( get_the_ID() ) ); ?>">
		<main id="main" class="site-main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				// Template part for large featured images.
				if ( in_array( gulir_featured_image_position(), array( 'large', 'behind', 'beside', 'above' ) ) ) :
					get_template_part( 'template-parts/post/large-featured-image' );
				else :
				?>
					<header class="entry-header">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</header>

				<?php endif; ?>

				<div class="main-content">

					<?php
					if ( is_active_sidebar( 'article-1' ) ) {
						dynamic_sidebar( 'article-1' );
					}

					// Place smaller featured images inside of 'content' area.
					if ( 'small' === gulir_featured_image_position() ) :
						gulir_post_thumbnail( 'gulir-featured-image-small');
					endif;

					get_template_part( 'template-parts/content/content-single', 'single' );

					gulir_previous_next();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						gulir_comments_template();
					}

					?>
				</div><!-- .main-content -->

			<?php
				endwhile;
				get_sidebar();
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
