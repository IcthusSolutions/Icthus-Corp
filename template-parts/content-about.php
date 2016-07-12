<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icthus_Corp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		

		<div class="col-sm-3">
			<?php
				if (has_post_thumbnail()) {
					echo the_post_thumbnail();
				}
			?>
		</div>
		<div class="entry-content col-sm-9">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'icthus-corp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
	
		

</article><!-- #post-## -->
