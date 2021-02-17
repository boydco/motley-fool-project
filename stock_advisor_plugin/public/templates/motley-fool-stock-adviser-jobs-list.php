<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/public/partials
 */

do_action( 'motley-fool-stock-adviser-jobs-list-before' );

foreach ( $items->posts as $item ) {

	include motley_fool_stock_adviser_get_template( $args['view-single'] );

} // foreach

do_action( 'motley-fool-stock-adviser-jobs-list-after' );