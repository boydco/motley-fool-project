<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stock_advisor
 */

   
$args = array(  
	'post_type' => 'company',
	'post_status' => 'publish',
	'posts_per_page' => -1, 
	// 'orderby' => 'title', 
	// 'order' => 'ASC',
);

$loop = new WP_Query( $args ); 
	
while ( $loop->have_posts() ) : $loop->the_post(); 
	$featured_img = wp_get_attachment_image_src( $post->ID );
	?>
	<h1><a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a></h1>
	<?php
	if ( $feature_img ) {
	?>
	   <img src='print $featured_img["url"]' width='print $featured_img["width"]' height='print $featured_img["height"]' />
   <?php	}
	the_excerpt(); 
endwhile;

wp_reset_postdata(); 

