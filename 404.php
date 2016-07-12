<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package my-simone
 */

get_header('404'); ?>

<div class="container">
	
	<div class="row" id="primary">
		<main id="content" class="col-sm-10 col-sm-offset-1" role="main">

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>


<?php get_footer(); ?>