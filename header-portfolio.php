<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Icthus_Corp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'icthus-corp' ); ?></a>

	<header class="site-header">
    	<div class="container">
    		<div class="row">
        		<div class="col-sm-4">
				<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
					</a>
				<?php endif; // End header image check. ?>

				</div>
				<div class="col-sm-8">

					<nav id="site-navigation" class="main-navigation clear" role="navigation">
						<h1 class="menu-toggle"><a href="#"><?php _e( 'Menu' ); ?></a></h1>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

					</nav><!-- #site-navigation -->

				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<section class="hero" data-type="background" data-speed="5">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					
					<h1 class="entry-title"><?php esc_html_e( 'Portfolio', 'icthus-corp' ); ?></h1>
					
				</div>
			</div>
		</div>

	</section>
