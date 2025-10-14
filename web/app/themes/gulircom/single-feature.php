<?php
/**
 * Template Name: One column
 * Template Post Type: post, page, newskit_lst_event, newskit_lst_generic, newskit_lst_mktplce, newskit_lst_place
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newskit
 */

get_header();
?>

	<section id="primary" class="content-area <?php echo esc_attr( newskit_get_category_tag_classes( get_the_ID() ) ); ?>">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				// Template part for large featured images.
				if ( in_array( newskit_featured_image_position(), array( 'large', 'behind', 'beside', 'above' ) ) ) :
					get_template_part( 'template-parts/post/large-featured-image' );
				else :
				?>
					<header class="entry-header">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</header>
				<?php endif; ?>

				<div class="main-content">

					<?php
					if ( is_active_sidebar( 'article-1' ) && is_single() ) {
						dynamic_sidebar( 'article-1' );
					}

					// Place smaller featured images inside of 'content' area.
					if ( 'small' === newskit_featured_image_position() ) {
						newskit_post_thumbnail( 'newskit-featured-image-small');
					}

					if ( is_page() ) {
						get_template_part( 'template-parts/content/content', 'page' );
					} else {
						get_template_part( 'template-parts/content/content', 'single' );
					}

					newskit_previous_next();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						newskit_comments_template();
					}
					?>
				</div>

			<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
