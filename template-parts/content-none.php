<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package my-simone
 */

?>


<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
    <div class="index-box">
	<header>
		<h2 class="entry-title">
                    <?php 
                    if ( is_404() ) { _e( 'Page not available', 'icthus-corp' ); }
                    else if ( is_search() ) { printf( __( 'Nothing found for <em>', 'icthus-corp') . get_search_query() . '</em>' ); }
                    else { _e( 'Nothing Found', 'icthus-corp' );}
                    ?>
                </h2>
	</header>

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'icthus-corp' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                        
        <?php elseif ( is_404() ) : ?>
                        
            <p><?php _e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'icthus-corp' ); ?></p>
            <?php get_search_form(); ?>
                        
		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'icthus-corp' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'icthus-corp' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
    </div><!-- .index-box -->
    
    <?php
    if ( is_404() || is_search() ) {
        
        ?>
    <header><h2 class="page-title">Most recent posts:</h2></header>
    <?php
        // Get the 6 latest posts
        $args = array(
            'posts_per_page' => 6
        );

        $latest_posts_query = new WP_Query( $args );

        // The Loop
        if ( $latest_posts_query->have_posts() ) {
                while ( $latest_posts_query->have_posts() ) {

                    $latest_posts_query->the_post();
                    // Get the standard index page content
                    get_template_part( 'template-parts/content', get_post_format() );

                }
        }
        /* Restore original Post Data */
        wp_reset_postdata();

    }
    ?>
    
</section><!-- .no-results -->
