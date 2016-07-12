<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Icthus_Corp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function icthus_corp_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'icthus_corp_body_classes' );


// Breadcrumbs
/*
 * Modded WordPress breadcrumb function, posted by Stuart on http://cazue.com.
 * http://cazue.com/articles/wordpress-creating-breadcrumbs-without-a-plugin-2013
 * This modified example also includes Dan Miller's fix for allowing parent/children pages with Boostrap 3's breadcrumb structure.
 * Instead of using text for the "Home" link, it now uses the icon "glyphicon-home" from Bootstrap.
 */
function the_breadcrumb() {

	    $home      = '<span class="fa fa-home"></span>';
	    $before    = '<li class="active">'; // tag before the current crumb
	    $after     = '</li>'; // tag after the current crumb
	    if (!is_home() && !is_front_page() || is_paged()) {
	        echo '<ul class="breadcrumb">';
	        global $post;
	        $homeLink = home_url();
	            echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ';
	            if (is_category()) {
	                global $wp_query;
	                $cat_obj   = $wp_query->get_queried_object();
	                $thisCat   = $cat_obj->term_id;
	                $thisCat   = get_category($thisCat);
	                $parentCat = get_category($thisCat->parent);
	                if ($thisCat->parent != 0) {
	                    echo get_category_parents($parentCat, true);
	                }
	                echo $before . __('Archive by category', 'icthus-corp') . ' "' . single_cat_title('', false) . '"' . $after;
	            } elseif (is_day()) {
	                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
	                    'Y'
	                ) . '</a></li> ';
	                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
	                    'F'
	                ) . '</a></li> ';
	                echo $before . get_the_time('d') . $after;
	            } elseif (is_month()) {
	                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
	                    'Y'
	                ) . '</a></li> ';
	                echo $before . get_the_time('F') . $after;
	            } elseif (is_year()) {
	                echo $before . get_the_time('Y') . $after;
	            } elseif (is_single() && !is_attachment()) {
	                if (get_post_type() != 'post') {
	                    $post_type = get_post_type_object(get_post_type());
	                    $slug      = $post_type->rewrite;
	                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
	                    echo $before . get_the_title() . $after;
	                } else {
	                    $cat = get_the_category();
	                    $cat = $cat[0];
	                    echo '<li>'.get_category_parents($cat, true).'</li>';
	                    echo $before . get_the_title() . $after;
	                }
	            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
	                $post_type = get_post_type_object(get_post_type());
	                echo $before . $post_type->labels->singular_name . $after;
	            } elseif (is_attachment()) {
	                $parent = get_post($post->post_parent);
	                $cat    = get_the_category($parent->ID);
	                $cat    = $cat[0];
	                echo get_category_parents($cat, true);
	                echo '<li><a href="' . get_permalink(
	                    $parent
	                ) . '">' . $parent->post_title . '</a></li> ';
	                echo $before . get_the_title() . $after;
	            } elseif (is_page() && !$post->post_parent) {
	                echo $before . get_the_title() . $after;
	            } elseif (is_page() && $post->post_parent) {
	                $parent_id   = $post->post_parent;
	                $breadcrumbs = array();
	                while ($parent_id) {
	                    $page          = get_page($parent_id);
	                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
	                        $page->ID
	                    ) . '</a></li>';
	                    $parent_id     = $page->post_parent;
	                }
	                $breadcrumbs = array_reverse($breadcrumbs);
	                foreach ($breadcrumbs as $crumb) {
	                    echo $crumb;
	                }
	                echo $before . get_the_title() . $after;
	            } elseif (is_search()) {
	                echo $before . __('Search results for', 'icthus-corp') . ' "'. get_search_query() . '"' . $after;
	            } elseif (is_tag()) {
	                echo $before . __('Posts tagged', 'icthus-corp') . ' "' . single_tag_title('', false) . '"' . $after;
	            } elseif (is_author()) {
	                global $author;
	                $userdata = get_userdata($author);
	                echo $before . __('Articles posted by', 'icthus-corp') . ' ' . $userdata->display_name . $after;
	            } elseif (is_404()) {
	                echo $before . __('Error 404', 'icthus-corp') . $after;
	            }

	        echo '</ul>';
	    }
	}
