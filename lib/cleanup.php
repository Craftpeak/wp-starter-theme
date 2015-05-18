<?php

namespace Craftpeak\WPST\Cleanup;

/**
 * Clean Up WP HEAD
 */
function head_cleanup() {

	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', __NAMESPACE__ . '\\remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', __NAMESPACE__ . '\\remove_wp_ver_css_js', 9999 );

} /* end head cleanup */
add_action( 'init', __NAMESPACE__ . '\\head_cleanup' );


/* 
 * Remove Query Strings From CSS & Javascript
 */ 
function remove_wp_ver_css_js( $src ) {

	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
	
}

// remove WP version from RSS
function rss_version() { return ''; }
add_filter( 'the_generator', __NAMESPACE__ . '\\rss_version' );