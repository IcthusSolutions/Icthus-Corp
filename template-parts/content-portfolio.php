<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Icthus_Corp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		
	<?php if ( is_single() ) { ?>
		
		<header class="entry-header">
			<?php
				
					the_title( '<h1 class="entry-title">', '</h1>' );
				

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php icthus_corp_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

	<?php } else { ?>

		<header class="col-sm-6 col-sm-offset-6 entry-header">
			<?php
				
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php icthus_corp_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

	<?php } ?>

	</div>
	


		<?php
			if ( is_single() ) { ?>

			<?php

			// check if the flexible content field has rows of data
			if( have_rows('portfolio_content') ):

			     // loop through the rows of data
			    while ( have_rows('portfolio_content') ) : the_row();

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

			?>
				
			<?php } else { ?>

			
			<div class="row">

				<div class="col-sm-6">
					
					<?php
						if (has_post_thumbnail()) {
							echo the_post_thumbnail();
						}
					?>

				</div>
			
				<div class="col-sm-6 entry-content">
					<?php
						the_excerpt( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'icthus-corp' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'icthus-corp' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

			</div>
			
				
			<?php } ?>
	

	
</article><!-- #post-## -->
