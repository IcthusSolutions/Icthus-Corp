<?php
/*
	Template Name: Home Page
 */

get_header('home'); ?>

	<section class="offer">
		<div class="container">
			<div class="row">
				<header>
					<h2>
					<?php the_field('offer_heading'); ?>
					</h2>
				</header>

				<div class="col-sm-12">

					<?php
						if( get_field('offer_list') ): ?>

						<ul class="list">

							<?php while( has_sub_field('offer_list') ): ?>

							<li class="list-item">
								<div class="<?php the_sub_field('offer_class'); ?>">	
									<p><?php the_sub_field('offer_text'); ?></p>
								</div>
							</li>

							<?php endwhile; ?>

						</ul>

						<?php endif;

					?>

				</div>

			</div>
		</div>
	</section>

	<section class="slider" data-type="background" data-speed="3">
	    <div class="container">
	    	<div class="row">
				<header>
					<h2>
						<?php the_field('our_work_heading'); ?>
					</h2>
				</header>
				
				<?php if( get_field('our_work') ): ?>

		        <div class="flexslider">

		        	<ul class="slides">
          

		        	<?php while( has_sub_field('our_work') ): ?>

			        	<li>
	                		<div class="col-sm-5 col-md-7">

								<?php 

									$portimage = get_sub_field('portfolio_image');
									$size = 'full';

									if( $portimage ) {

										echo wp_get_attachment_image( $portimage, $size );

									}

								?>
								
	                		</div>
	                		<div class="col-sm-6 col-md-4">
	                			<div class="flex-caption">
	                				<h3><?php the_sub_field('portfolio_title'); ?></h3>
									<?php the_sub_field('portfolio_content'); ?>
									<p class="alignright"><a href="<?php the_sub_field('portfolio_url'); ?>" class="btn btn-primary"><i class="fa fa-caret-right"></i>Read more</a></p>
	                			</div>
	                		</div>
	                	</li>

	                <?php endwhile; ?>
					
					</ul>

		        </div>

		    <?php endif; ?>

	        </div>
	    </div><!--end of container-->

	  </section>

	  <section class="testimonials">
	  	<div class="container">
	  		<div class="row">
	  			<header>
	  				<h2><?php the_field('testimonial_heading'); ?></h2>
	  			</header>

	  			<?php 
					$args = array(
						'posts_per_page' => 3,
						'orderby' => 'ID',
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
	  	</div>
	  </section>

	  <section class="blog" data-type="background" data-speed="7">
		<div class="container">
			<div class="row">
				<header>
					<h2><?php printf( esc_html__( 'From the blog', 'icthus-corp' ) ); ?></h2>
				</header>

				<div class="col-sm-12 blog-feed">
					
					<?php $loop = new WP_Query( array( 'orderby' => 'post_id', 'order' => 'DESC', 'posts_per_page' => 4, 'post__not_in' => get_option('sticky_posts') ) ); ?>

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="blog-item">

						<?php
						if (has_post_thumbnail()) {
							echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'icthus-corp') . get_the_title() . '" rel="bookmark">';
							echo the_post_thumbnail('blog-home');
							echo '</a>';
						}
						?>

						<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						<?php the_excerpt(); ?>

					</div>

					<?php endwhile; wp_reset_query(); ?>

				</div>
				
			</div>
		</div>
	  </section>

<?php

get_footer();
