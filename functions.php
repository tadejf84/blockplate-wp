<?php
/**
 * Theme functions and definitions
 *
 * @package BlockplateWP
 */

namespace BlockplateWP;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Theme function includes.
$theme_functions_includes = [
	'/setup.php',                           
	'/enqueue.php',                         
	'/enqueue-blocks.php'
];

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$theme_functions_includes[] = '/woocommerce.php';
}

foreach ( $theme_functions_includes as $file ) {
	require_once get_theme_file_path( 'inc' . $file );
}