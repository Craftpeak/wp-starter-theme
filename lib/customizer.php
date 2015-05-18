<?php

namespace Craftpeak\WPST\Customizer;

use Craftpeak\WPST\Assets;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
}
add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customize_preview_js() {
	wp_enqueue_script( 'customizer', Assets\asset_path( 'scripts/customizer.js' ), array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', __NAMESPACE__ . '\\customize_preview_js' );