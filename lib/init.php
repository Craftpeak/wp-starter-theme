<?php

namespace Craftpeak\WPST\Init;

use Craftpeak\WPST\Assets;

/**
 * Theme setup
 */
function theme_setup() {
	/**
	 * Make theme available for translation
	 */
	load_theme_textdomain( 'cpwpst', get_template_directory() . '/lang' );

	/**
	 * Enable plugins to manage the document title
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Register wp_nav_menu() menus
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus([
		'primary_navigation' => __( 'Primary Navigation', 'cpwpst' )
	]);

	/**
	 * Add post thumbnails
	 * @link http://codex.wordpress.org/Post_Thumbnails
	 * @link http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	 * @link http://codex.wordpress.org/Function_Reference/add_image_size
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add HTML5 markup for captions
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 */
	add_theme_support( 'html5', ['caption', 'comment-form', 'comment-list'] );

	/**
	 * Tell the TinyMCE editor to use a custom stylesheet
	 */
	add_editor_style( Assets\asset_path( 'styles/editor-style.css' ) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_setup' );

/**
 * Register sidebars
 */
function widgets_init() {
	register_sidebar([
		'name'          => __( 'Primary', 'cpwpst' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);

	register_sidebar([
		'name'          => __( 'Footer', 'cpwpst' ),
		'id'            => 'sidebar-footer',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
}
add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );
