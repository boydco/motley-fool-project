

<?php

$terms = get_the_terms( $post->ID, 'stock_ticker');
$post_stock_ticker = $terms[0];


$args = array(
    'post_type' => 'news_article',
    'tax_query' => array(
        array(
            'taxonomy' => 'stock_ticker',
            'field'    => 'slug',
            'terms'    => $post_stock_ticker,
        ),
    ),
);
$news_articles = new WP_Query( $args );
?>


    <?php
        if ($news_articles->have_posts()) {
            echo '<h3>Other Coverage</h3>';
            echo '<div class="content-page-subpage-container">';
        }

        echo '<ul>';

        while ( $news_articles->have_posts() ) : $news_articles->the_post(); 
        
        echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';

        endwhile;

        echo '</ul>';

        if ($news_articles->have_posts()) {
            echo '</div>';
        }


    

        wp_reset_postdata(); 

    ?>