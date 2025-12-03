<?php
/**
 * Enqueue scripts and styles.
 *
 * @package BlockplateWP
 */

namespace BlockplateWP;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue global/page/template specific theme assets.
 * 
 * @since	1.0.0
 * 
 * @return 	void
 */
function enqueue_theme_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Stylesheets.
	$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/theme.css' );
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/css/theme.css', [], $css_version );

	// Scripts.
	$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/scripts.js' );
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/scripts.js', [], $js_version, true );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_theme_assets' );

/**
 * Enqueue the `editor.css` file in the Block Editor.
 *
 * @since	1.0.0
 * 
 * @return 	void
 */
function add_editor_styles() {
	add_editor_style( '/assets/css/theme.css' );
}
// add_action( 'after_setup_theme', __NAMESPACE__ . '\add_editor_styles' );
