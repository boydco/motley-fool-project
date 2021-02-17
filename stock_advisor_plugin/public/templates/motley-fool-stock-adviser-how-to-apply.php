<?php

/**
 * Provide a public-facing view for the How to Apply plugin option
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/public/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?><div class="how-to-apply">
	<h2><?php esc_html_e( 'How to Apply', 'motley-fool-stock-adviser' ); ?></h2><?php

	echo $this->options['howtoapply'];

?></div>