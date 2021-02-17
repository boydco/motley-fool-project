
<?php

$terms = get_the_terms( $post->ID, 'stock_ticker');
$post_stock_ticker = $terms[0];


$args = array(
    'post_type' => 'stock_recommendation',
    'tax_query' => array(
        array(
            'taxonomy' => 'stock_ticker',
            'field'    => 'slug',
            'terms'    => $post_stock_ticker,
        ),
    ),
);
$stock_rec_articles = new WP_Query( $args );

?>


<?php
if ($stock_rec_articles->have_posts()) {
    echo '<h3>Recommendations</h3>';
    echo '<div class="content-page-subpage-container">';
}

echo '<ul>';

    while ( $stock_rec_articles->have_posts() ) : $stock_rec_articles->the_post(); 
   
        echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';

    endwhile;

echo '</ul>';
   

if ($stock_rec_articles->have_posts()) {
    echo '</div>';
}

wp_reset_postdata(); 

?>
