<?php
/**
 * The template for displaying all single job posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Motley_Fool_Stock_Advisor
 */

$meta = get_post_custom( $post->ID );

/**
 * motley-fool-stock-adviser-before-single hook
 */
do_action( 'motley-fool-stock-adviser-before-single', $meta );

?><main class="site-main 
<?php if ( is_singular( array( 'stock_recommendation', 'company' ) ) ) { echo 'content-sidebar'; } ?>
"><?php



	if(is_singular('stock_recommendation')) {
		include( plugin_dir_path( __FILE__ ) . 'partials/mfsa-stock-rec-widget.php' );
	}

	if(is_singular('company')) {
		include( plugin_dir_path( __FILE__ ) . 'partials/mfsa-company-widget.php' );
	}

	

	?>
	<div class="content-container">
	<?php
	/**
	 * motley-fool-stock-adviser-before-single-content hook
	 */
	do_action( 'motley-fool-stock-adviser-before-single-content', $meta );

		/**
		 * motley-fool-stock-adviser-single-content hook
		 */
		do_action( 'motley-fool-stock-adviser-single-content', $meta );

	/**
	 * motley-fool-stock-adviser-after-single-content hook
	 */
	do_action( 'motley-fool-stock-adviser-after-single-content', $meta );


	
	

?>
	</div>

</main><!-- --><?php

/**
 * motley-fool-stock-adviser-after-single hook
 */
do_action( 'motley-fool-stock-adviser-after-single', $meta );

// get_sidebar();