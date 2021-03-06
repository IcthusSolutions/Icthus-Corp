<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icthus_Corp
 */

get_header('blog'); ?>

<div class="container">
    <div class="row" id="primary">
    	<main id="content" class="col-sm-9" role="main">

		<?php
		if ( have_posts() ) :


			/* Start the Loop */
			while ( have_posts() ) : the_post();

				if ( function_exists('the_breadcrumb') ) {
					the_breadcrumb();
				}

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			icthus_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->
</div>

<?php
get_footer();
