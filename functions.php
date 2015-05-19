<?php
/**
 * CPWPST includes
 *
 * The $cpwpst_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */

$cpwpst_includes = [
	'lib/utils.php',                 // Utility functions
	'lib/init.php',                  // Initial theme setup and constants
	'lib/wrapper.php',               // Theme wrapper class
	'lib/conditional-tag-check.php', // ConditionalTagCheck class
	'lib/config.php',                // Configuration
	'lib/assets.php',                // Scripts and stylesheets
	'lib/titles.php',                // Page titles
	'lib/extras.php',                // Extra functions
	'lib/customizer.php',            // Customizer functions
	'lib/custom.php',                // Custom functions
];

foreach ( $cpwpst_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'cpwpst' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset($file, $filepath);
