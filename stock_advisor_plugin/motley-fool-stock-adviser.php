<?php

/**
 *
 * @author 				Colin Boyd
 * @link 				https://colinboyd.me
 * @since 				1.0.0
 * @package 			Motley_Fool_Stock_Advisor
 *
 * @wordpress-plugin
 * Plugin Name: 		Motley Fool Stock Advisor
 * Plugin URI: 			http://fool.com
 * Description: 		Motley Fool Stock Advisor Plugin for Stock Recommendations
 * Version: 			1.0.0
 * Author: 				Colin Boyd
 * Author URI: 			https://colinboyd.me
 * License: 			GPL-2.0+
 * License URI: 		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: 		motley-fool-stock-adviser
 * Domain Path: 		/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Used for referring to the plugin file or basename
if ( ! defined( 'MOTLEY_FOOL_STOCK_ADVISER_FILE' ) ) {
	define( 'MOTLEY_FOOL_STOCK_ADVISER_FILE', plugin_basename( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-motley-fool-stock-adviser-activator.php
 */
function activate_Motley_Fool_Stock_Adviser() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-motley-fool-stock-adviser-activator.php';
	Motley_Fool_Stock_Advisor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-motley-fool-stock-adviser-deactivator.php
 */
function deactivate_Motley_Fool_Stock_Adviser() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-motley-fool-stock-adviser-deactivator.php';
	Motley_Fool_Stock_Advisor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Motley_Fool_Stock_Adviser' );
register_deactivation_hook( __FILE__, 'deactivate_Motley_Fool_Stock_Adviser' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-motley-fool-stock-adviser.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 		1.0.0
 */
function run_Motley_Fool_Stock_Adviser() {

	$plugin = new Motley_Fool_Stock_Advisor();
	$plugin->run();

}
run_Motley_Fool_Stock_Adviser();
