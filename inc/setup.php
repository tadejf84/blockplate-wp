<?php
/**
 * Setup theme
 *
 * @package BlockplateWP
 */

namespace BlockplateWP;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Setup theme
 * 
 * @since	1.0.0
 */
function theme_setup() {
	/**
	* Loads the theme’s translated strings.
	*/
	load_theme_textdomain( 'blockplate' );

	/**
	 * Remove support for the core block pattern library.
	 *
	 */
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );

/**
 * Registers pattern categories.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_pattern_categories() {
	register_block_pattern_category(
		'theme-patterns',
		array(
			'label'       => __( 'Theme Patterns', 'blockplate' ),
			'description' => __( 'A collection of theme patterns.', 'blockplate' ),
		)
	);
}

add_action( 'init', __NAMESPACE__ . '\register_pattern_categories');
