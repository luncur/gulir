<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		gulir_podcast_render_single();
	endwhile;
endif;
get_footer();