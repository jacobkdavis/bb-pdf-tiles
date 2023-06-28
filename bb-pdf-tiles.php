<?php
/**
 * Plugin Name: BB PDF Tiles
 * Plugin URI: https://thegraphichive.com
 * Description: Custom pdf tiles
 * Version: 1.0
 * Author: Jacob Davis
 * Author URI: https://thegraphichive.com
 * Text Domain: bb-pdf-tiles
 */
define( 'TBPT_CUSTOM_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'TBPT_CUSTOM_MODULE_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom module
 */
function fl_load_module_bb_pdf_tiles() {
	if ( class_exists( 'FLBuilder' ) ) {

		// Require custom 'pdf-field' field type
		require_once 'includes/pdf-field.php';

		// include module code
		require_once 'pdf-tiles/pdf-tiles.php';
	
	}
}
add_action( 'init', 'fl_load_module_bb_pdf_tiles' );

