<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stock_advisor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 style="margin: 2em 0; text-align: center;">Motley Fool Stock Advisor Recommendations</h1>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php

			$args = array(  
				'post_type' => 'stock_recommendation',
				'post_status' => 'publish',
				'posts_per_page' => -1, 
				// 'orderby' => 'title', 
				'order' => 'DESC',
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


		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stock_advisor' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'stock_advisor' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
