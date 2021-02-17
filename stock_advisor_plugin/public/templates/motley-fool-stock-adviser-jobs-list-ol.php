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

?><ol class="wrap-jobs"><?php

foreach ( $items->posts as $item ) {

	do_action( 'motley-fool-stock-adviser-jobs-list-before' );

	?><li class="single-job"><?php

	include motley_fool_stock_adviser_get_template( $args['view-single'] );

	?></li><?php

	do_action( 'motley-fool-stock-adviser-jobs-list-after' );

} // foreach

?></ol><?php
