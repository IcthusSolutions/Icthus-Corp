<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icthus_Corp
 */

get_header('portfolio'); ?>

<div class="container">
    <div class="row" id="primary">
    	<main id="content" class="col-sm-12" role="main">

    		<?php if ( function_exists('the_breadcrumb') ) {
					the_breadcrumb();
				} ?>

		<?php
		if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();


				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'portfolio' );

			endwhile;

			icthus_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->
</div>

<?php
get_footer();
