<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Icthus_Corp
 */

get_header('search'); ?>

<div class="container">
    <div class="row" id="primary">
    	<main id="content" class="col-sm-9" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header>
				<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'icthus-corp' ), '<em>' . get_search_query() . '</em>' ); ?></h2>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			icthus_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>

	</section><!-- #primary -->
</div>

<?php
get_footer();
