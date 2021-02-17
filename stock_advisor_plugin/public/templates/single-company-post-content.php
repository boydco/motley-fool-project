<?php
/**
 * The view for the post content used on the single post
 */

?><div class="content-company" itemtype="description">

    <?php

    the_content();
    
    include( plugin_dir_path( __FILE__ ) . 'partials/mfsa-stock-rec-articles.php' );

	include( plugin_dir_path( __FILE__ ) . 'partials/mfsa-news-articles.php' );

?></div>

