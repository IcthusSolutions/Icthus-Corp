<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Icthus_Corp
 */

get_header(); ?>

<div class="container">
    <div class="row" id="primary">
    	<main id="content" class="col-sm-10 col-sm-offset-1" role="main">

		<?php
		while ( have_posts() ) : the_post();

		if ( function_exists('the_breadcrumb') ) {
					the_breadcrumb();
		}

			get_template_part( 'template-parts/content', 'testimonial' );

			icthus_pagination();

			
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php

get_footer();
