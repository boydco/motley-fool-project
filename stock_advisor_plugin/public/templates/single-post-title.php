<?php
/**
 * The view for the post title used on the single post
 */

?><header class="entry-header"><?php

	the_title( '<h1 class="post-title">', '</h1>' );

	if (is_singular('company')) {

		// Display Stock Ticker Taxonomy Links
		echo  mfsa_custom_taxonomies_terms_links();

		// Display Single Company Content with API Data
		include( plugin_dir_path( __FILE__ ) . 'partials/mfsa-single-company-content.php' );

	}

?></header>