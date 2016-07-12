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


	<div class="entry-content">
		<?php

		echo '<div class="content-block center row">';
			echo '<div class="col-sm-8 col-sm-offset-2">';
				echo '<p class="lead">';
						the_field('services_intro');
				echo '</p>';
			echo '</div>';
		echo '</div>';

		// check if the flexible content field has rows of data
		if( have_rows('services_content') ):

		     // loop through the rows of data
		    while ( have_rows('services_content') ) : the_row();

		        if( get_row_layout() == 'image_left_content' ):

		        	echo '<div class="content-block row">';
		        		echo '<div class="col-sm-6">';
		        			$leftimage = get_sub_field('left_image');
		        			$size = 'full';

								if( $leftimage ) {

									echo wp_get_attachment_image( $leftimage, $size );

								}
		        		echo '</div>';
		        		echo '<div class="col-sm-6">';
		        			the_sub_field('left_content');
		        		echo '</div>';
		        	echo '</div>';

		        	

		        elseif( get_row_layout() == 'image_right_content' ): 

		        	echo '<div class="content-block row">';

		        		echo '<div class="col-sm-6 right">';
		        			$rightimage = get_sub_field('right_image');
		        			$size = 'full';

								if( $rightimage ) {

									echo wp_get_attachment_image( $rightimage, $size );

								}
		        		echo '</div>';

		        		echo '<div class="col-sm-6">';
		        			the_sub_field('right_content');
		        		echo '</div>';
		        		
		        	echo '</div>';

		        endif;

		    endwhile;

		else :

		    // no layouts found

		endif;

		echo '<div class="content-block center row">';
			echo '<div class="col-sm-8 col-sm-offset-2">';
				
						the_field('services_outro');
				
			echo '</div>';
		echo '</div>';

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'icthus-corp' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
