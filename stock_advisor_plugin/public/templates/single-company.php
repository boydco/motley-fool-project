<?php
/**
 * The template for displaying all single company posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Motley_Fool_Stock_Advisor
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * Get a custom header-employee.php file, if it exists.
 * Otherwise, get default header.
 */
get_header(  );

if ( have_posts() ) :

	/**
	 * motley-fool-stock-adviser-single-before-loop hook
	 *
	 * @hooked 		job_single_content_wrap_start 		10
	 */
	do_action( 'motley-fool-stock-adviser-single-before-loop' );

	while ( have_posts() ) : the_post();

		include motley_fool_stock_adviser_get_template( 'single-content' );
		

	endwhile;



	/**
	 * motley-fool-stock-adviser-single-after-loop hook
	 *
	 * @hooked 		job_single_content_wrap_end 		90
	 */
	do_action( 'motley-fool-stock-adviser-single-after-loop' );

	

endif;



?>

<?php


get_footer( );