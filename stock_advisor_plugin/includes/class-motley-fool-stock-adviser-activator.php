<?php

/**
 * Fired during plugin activation
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since 		1.0.0
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/includes
 *  
 */
class Motley_Fool_Stock_Advisor_Activator {

	/**
	 * Declare custom post types, taxonomies, and plugin settings
	 * Flushes rewrite rules afterwards
	 *
	 * @since 		1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-motley-fool-stock-adviser-admin.php';

		Motley_Fool_Stock_Advisor_Admin::new_cpt_news_article();
		Motley_Fool_Stock_Advisor_Admin::new_cpt_stock_recommendation();
		Motley_Fool_Stock_Advisor_Admin::new_cpt_company();
		Motley_Fool_Stock_Advisor_Admin::new_taxonomy_stock_ticker();

		flush_rewrite_rules();

		$opts 		= array();
		$options 	= Motley_Fool_Stock_Advisor_Admin::get_options_list();

		foreach ( $options as $option ) {

			$opts[ $option[0] ] = $option[2];

		}

		update_option( 'motley-fool-stock-adviser-options', $opts );

		Motley_Fool_Stock_Advisor_Admin::add_admin_notices();

	} // activate()
} // class
