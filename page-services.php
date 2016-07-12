<?php
/*
	Template Name: Services
 */

get_header(); ?>
<div class="container">
	
	<div class="row" id="primary">
		<main id="content" class="col-sm-10 col-sm-offset-1" role="main">

		<?php if ( function_exists('the_breadcrumb') ) {
					the_breadcrumb();
				}
		?>

			<?php
			while ( have_posts() ) : the_post();
			

				get_template_part( 'template-parts/content', 'services' );

				

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
