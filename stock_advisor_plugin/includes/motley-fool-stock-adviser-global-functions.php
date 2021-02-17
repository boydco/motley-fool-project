<?php
/**
 * Globally-accessible functions
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package		Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/includes
 */

/**
 * Returns the result of the get_max global function
 */
function motley_fool_stock_adviser_get_max( $array ) {

	return Motley_Fool_Stock_Advisor_Globals::get_max( $array );

}

/**
 * Returns the result of the get_svg global function
 */
function motley_fool_stock_adviser_get_svg( $svg ) {

	return Motley_Fool_Stock_Advisor_Globals::get_svg( $svg );

}

/**
 * Returns the result of the get_template global function
 */
function motley_fool_stock_adviser_get_template( $name ) {

	return Motley_Fool_Stock_Advisor_Globals::get_template( $name );

}

/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function mfsa_custom_taxonomies_terms_links() {
    // Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
    // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            $out[] = '<ul class="breadcrumb-stock-ticker-list">';
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li class="breadcrumb-stock-ticker-item"><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}


/**
 * Return Stock Ticker For Widget
 *
 * @see get_object_taxonomies()
 */
function mfsa_get_stock_ticker() {
    // Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
    // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            foreach ( $terms as $term ) {
                $out[] = sprintf( 
                  $term->name 
                );
            }
    
        }
    }
    return $out[0];
}



class Motley_Fool_Stock_Advisor_Globals {

	/**
	 * Returns the count of the largest arrays
	 *
	 * @param 		array 		$array 		An array of arrays to count
	 * @return 		int 					The count of the largest array
	 */
 	public static function get_max( $array ) {

 		if ( empty( $array ) ) { return '$array is empty!'; }

 		$count = array();

		foreach ( $array as $name => $field ) {

			$count[$name] = count( $field );

		} //

		$count = max( $count );

		return $count;

 	} // get_max()

 	/**
 	 * Returns the requested SVG.
 	 *
 	 * @param 		string 		$svg 		The name of an SVG
 	 * @return 		mixed 					The SVG code
 	 */
 	public static function get_svg( $svg ) {

 		$return = '';

		switch ( $svg ) {

			case 'drag': $return = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="drag" height="20px" width="20px"><path d="M19.7 10.5l-2.8 2.8c-.1.1-.3.2-.5.2-.4 0-.7-.3-.7-.7v-1.4h-4.3v4.3h1.4c.4 0 .7.3.7.7 0 .2-.1.4-.2.5l-2.8 2.8c-.1.1-.3.2-.5.2s-.4-.1-.5-.2l-2.8-2.8c-.1-.1-.2-.3-.2-.5 0-.4.3-.7.7-.7h1.4v-4.3H4.3v1.4c0 .4-.3.7-.7.7-.2 0-.4-.1-.5-.2L.3 10.5c-.1-.1-.2-.3-.2-.5s.1-.4.2-.5l2.8-2.8c.1-.1.3-.2.5-.2.4 0 .7.3.7.7v1.4h4.3V4.3H7.2c-.4 0-.7-.3-.7-.7 0-.2.1-.4.2-.5L9.5.3c.1-.1.3-.2.5-.2s.4.1.5.2l2.8 2.8c.1.1.2.3.2.5 0 .4-.3.7-.7.7h-1.4v4.3h4.3V7.2c0-.4.3-.7.7-.7.2 0 .4.1.5.2l2.8 2.8c.1.1.2.3.2.5s0 .4-.2.5z"/></svg>'; break;

		} // switch

		return $return;

	 } // get_svg()
	 

	

 	/**
	 * Returns the path to a template file
	 *
	 * Looks for the file in these directories, in this order:
	 * 		Current theme
	 * 		Parent theme
	 * 		Current theme templates folder
	 * 		Parent theme templates folder
	 * 		This plugin
	 *
	 * To use a custom list template in a theme, copy the
	 * file from public/templates into a templates folder in your
	 * theme. Customize as needed, but keep the file name as-is. The
	 * plugin will automatically use your custom template file instead
	 * of the ones included in the plugin.
	 *
	 * @param 	string 		$name 			The name of a template file
	 * @return 	string 						The path to the template
	 */
 	public static function get_template( $name ) {

 		$template = '';

		$locations[] = "{$name}.php";
		$locations[] = "/templates/{$name}.php";

		/**
		 * Filter the locations to search for a template file
		 *
		 * @param 	array 		$locations 			File names and/or paths to check
		 */
		apply_filters( 'motley-fool-stock-adviser-template-paths', $locations );

		$template = locate_template( $locations, TRUE );

		if ( empty( $template ) ) {

			$template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/templates/' . $name . '.php';

		}

		return $template;

 	} // get_template()

} // class
