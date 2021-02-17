<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the archive loop.
 *
 * @link        
 * @since      1.0.0
 *
 * @package    Motley_Fool_Stock_Advisor
 * @subpackage Motley_Fool_Stock_Advisor/public/partials
 */

/**
 * motley-fool-stock-adviser-before-loop hook
 *
 * @hooked 		list_wrap_start 		10
 */
do_action( 'motley-fool-stock-adviser-before-loop' );

foreach ( $items as $item ) {

	$meta = get_post_custom( $item->ID );

	/**
	 * motley-fool-stock-adviser-before-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		content_wrap_start 		10
	 */
	do_action( 'motley-fool-stock-adviser-before-loop-content', $item, $meta );

		/**
		 * motley-fool-stock-adviser-loop-content hook
		 *
		 * @param 		object  	$item 		The post object
		 *
		 * @hooked 		content_job_title 		10
		 * @hooked 		content_job_location 	15
		 */
		do_action( 'motley-fool-stock-adviser-loop-content', $item, $meta );

	/**
	 * motley-fool-stock-adviser-after-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		content_link_end 		10
	 * @hooked 		content_wrap_end 		90
	 */
	do_action( 'motley-fool-stock-adviser-after-loop-content', $item, $meta );

} // foreach

/**
 * motley-fool-stock-adviser-after-loop hook
 *
 * @hooked 		list_wrap_end 			10
 */
do_action( 'motley-fool-stock-adviser-after-loop' );
