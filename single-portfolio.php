<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Icthus_Corp
 */

get_header('portfolio-single'); ?>

<div class="container">
    <div class="row" id="primary">
    	<main id="content" class="col-sm-10 col-sm-offset-1" role="main">

		<?php
		while ( have_posts() ) : the_post();

			if ( function_exists('the_breadcrumb') ) {
					the_breadcrumb();
				}

			get_template_part( 'template-parts/content', 'portfolio' );

			

			

		
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>


						
<?php if( get_field('screens') ): ?>

<section class="slider" data-type="background" data-speed="3">
	<div class="container">
		<div class="row">
			<header>
				<h2><?php printf( esc_html__( 'Custom Admin Screens', 'icthus-corp' ) ); ?></h2>
			</header>
			<div class="col-sm-12">

		        <div class="screens">

		        	<ul class="slides">
          

		        	<?php while( has_sub_field('screens') ): ?>

			        	<li>
	                		<div class="screen">

								<?php 

								$scrimage = get_sub_field('screen_image');

								if( !empty($scrimage) ): ?>

								<img src="<?php echo $scrimage['url']; ?>" alt="<?php echo $scrimage['alt']; ?>">

								<?php endif; ?>
								
	                		
	                		
	                			<div class="caption">
	                				<h3><?php the_sub_field('screen_title'); ?></h3>
									<p><?php the_sub_field('screen_content'); ?></p>
									<p class="alignright"><a href="#" data-image-id="" data-toggle="modal" data-title="<?php the_sub_field('screen_title'); ?>" data-image="<?php echo $scrimage['url']; ?>" data-target="#screen-gallery" class="show btn btn-primary"><i class="fa fa-caret-right"></i>View screen</a></p>
	                			</div>

	                		</div>
	                		
	                	</li>

	                <?php endwhile; ?>
					
					</ul>

		        </div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="screen-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-lg">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		                <h4 class="modal-title" id="image-gallery-title"></h4>
		            </div>
		            <div class="modal-body row">
		            	<div class="col-xs-12">
		            		<img id="image-gallery-image" src="">
		            	</div>
		            	
		            </div>
		            <div class="modal-footer">

		                <div class="col-xs-2">
		                    <button type="button" class="btn btn-default" id="show-previous-image">Previous</button>
		                </div>

		                

		                <div class="col-xs-2 col-xs-offset-7">
		                    <button type="button" id="show-next-image" class="btn btn-primary">Next</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
</section>

<?php endif; ?>



<section class="testimonials">

	<div class="container">
		<div class="row">
  			<header>
  				<h2><?php printf( esc_html__( 'What they said about Icthus', 'icthus-corp' ) ); ?></h2>
  			</header>

  			<?php 

			$posts = get_field('choose_testimonial');

			if( $posts ): ?>
			    
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
			        <div class="testimonial">
			        	<div class="col-xs-2 col-xs-offset-1">
			        		<?php the_post_thumbnail(); ?>
			        	</div>
			        	<div class="col-xs-8">
			        		<h3><?php the_title(); ?></h3>
			        		<?php the_content(); ?>
			            </div>
			        </div>
			    <?php endforeach; ?>
			    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>

					
		  </div>
	</div>
		  		
</section>

<?php
endwhile; // End of the loop.
get_footer();
