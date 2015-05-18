<?php

namespace Craftpeak\WPST\Cleanup;


/**
 * Turn off things that can screw things up.
 */

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}
if ( ! defined( 'DISALLOW_FILE_MODS' ) ) {
	define( 'DISALLOW_FILE_MODS', true );
}


/**
 * Clean Up WP HEAD
 */
function head_cleanup() {
	// remove feed links
	remove_action('wp_head', 'feed_links_extra', 3);
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

	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

} /* end head cleanup */
add_action( 'init', __NAMESPACE__ . '\\head_cleanup' );


/**
 * Remove the Admin Toolbar Links
 */
function remove_admin_bar_links() {

    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    // $wp_admin_bar->remove_menu('wpseo-menu');       // Remove the Yoast SEO menu
  
}
add_action( 'wp_before_admin_bar_render', __NAMESPACE__ . '\\remove_admin_bar_links' );


/**
 * remove WP version from RSS
 */
function rss_version() { return ''; }
add_filter( 'the_generator', __NAMESPACE__ . '\\rss_version' );


/** 
 * cleanup customizer
 */
function theme_customizer_clean( $wp_customize ) {

	// Removes the theme switcher from the customizer
	// because we don't want them switching away from our awesome theme!
	$wp_customize->remove_section( 'themes' );

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');
  // $wp_customize->remove_control('blogdescription');
  
}
add_action( 'customize_register', __NAMESPACE__ . '\\theme_customizer_clean' );


/**
 * Disables WordPress Dashboard Widgets
 */
function disable_default_dashboard_widgets() {  

    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');   // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');       // WordPress blog
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');    // Other WordPress News

}  
add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\\disable_default_dashboard_widgets' );


/** 
 * remove menus from dashboard
 * http://codex.wordpress.org/Function_Reference/remove_menu_page
 * 
 * uncomment below to remove menu pages
 */
// function remove_menus() {
	
 	// remove_menu_page( 'edit-comments.php' );
 	// remove_submenu_page( 'themes.php', 'widgets.php' );
// }
// add_action( 'admin_menu', __NAMESPACE__ . '\\remove_menus' );