<?php
/*
	Template Name: About
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

				get_template_part( 'template-parts/content', 'about' );

				

			endwhile; // End of the loop.
			?>

			<div class="row">
				<div class="col-sm-12">
					<h2>My Skills</h2>

					<?php
						if( get_field('skills_list') ): ?>

						<ul class="skills">

							<?php while( has_sub_field('skills_list') ): ?>

							<li>
								<?php the_sub_field('skill_title'); ?>
								<?php
								$skillicon = get_sub_field('skill_icon');
									$size = 'full';

									if( $skillicon ) {

										echo wp_get_attachment_image( $skillicon, $size );

									}
								?>
							</li>

							<?php endwhile; ?>

						</ul>

						<?php endif;

					?>

		        </div>
			</div>

			<section class="testimonials">

		  		<div class="row">
		  			<header>
		  				<h2><?php printf( esc_html__( 'What others are saying about me', 'icthus-corp' ) ); ?></h2>
		  			</header>

		  			<?php 
						$args = array(
							'posts_per_page' => 1,
							'orderby' => 'rand',
							'post_type' => 'testimonials'
						);
													
						$query = new WP_Query( $args );
						// The Loop
						$text = 'Read more';
						if ( $query->have_posts() ) {
							
							while ( $query->have_posts() ) {
								$query->the_post();
								$more = 0;
								echo '<div class="testimonial">';
									echo '<div class="col-xs-2 col-xs-offset-1">';
									the_post_thumbnail();
									echo '</div>';
									echo '<div class="col-xs-8">';
										echo '<h3>' . get_the_title() . '<br>' . get_the_subtitle() . '</h3>';
										the_excerpt('');
									echo '</div>';
								echo '</div>';
							}
							
						}

						/* Restore original Post Data */
						wp_reset_postdata();
					?>
					
		  		</div>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php

get_footer();
