<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

				get_template_part( 'template-parts/content', 'page' );

				
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
