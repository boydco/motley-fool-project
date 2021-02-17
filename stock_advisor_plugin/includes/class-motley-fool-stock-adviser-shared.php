<?php

/**
 * The public & admin-facing shared functionality of the plugin.
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/includes
 */


 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) { exit; }

class Motley_Fool_Stock_Advisor_Shared {

	/**
	 * The ID of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$plugin_name 		The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$version 			The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		string 			$Motley_Fool_Stock_Advisor 		The name of this plugin.
	 * @param 		string 			$version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Flushes widget cache
	 *
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		int 		$post_id 		The post ID
	 * @return 		void
	 */
	public function flush_widget_cache( $post_id ) {

		if ( wp_is_post_revision( $post_id ) ) { return; }

		$post = get_post( $post_id );

		if ( 'job' == $post->post_type ) {

			wp_cache_delete( $this->plugin_name, 'widget' );

		}

	} // flush_widget_cache()


	/**
	 * Returns a post object of stock recommendation posts
	 *
	 * @param 	array 		$params 			An array of optional parameters
	 * 							types 			An array of portfolio item type slugs
	 * 							quantity		Number of posts to return
	 * @param 	string 		$cache 				String to create a new cache of posts
	 *
	 * @return 	object 		A post object
	 */
	public function get_stock_recommendations( $params, $cache = '' ) {

		$return 	= '';
		$cache_name = $this->plugin_name . '_stock_recommendations';

		if ( ! empty( $cache ) ) {

			$cache_name .= '_' . $cache;

		}

		$return = wp_cache_get( $cache_name, $this->plugin_name . '_stock_recommendations' );

		if ( false === $return ) {

			$args 	= $this->set_stock_rec_args( $params );
			$query 	= new WP_Query( $args );

			if ( is_wp_error( $query ) ) {

				$options 	= get_option( $this->plugin_name . '-options' );
				$return 	= $options['message-no-openings'];

			} else {

				wp_cache_set( $cache_name, $query->posts, $this->plugin_name . '_stock_recommendations', 5 * MINUTE_IN_SECONDS );

				$return = $query->posts;

			}
		}

		return $return;

	} // get_stock_recommendations()


	public function get_stock_rec_articles_by_ticker($params, $cache = ''  ) {


		$return 	= '';
		$cache_name = $this->plugin_name . '_stock_rec_articles';

		if ( ! empty( $cache ) ) {

			$cache_name .= '_' . $cache;

		}

		$return = wp_cache_get( $cache_name, $this->plugin_name . '_stock_rec_articles' );

		if ( false === $return ) {

			$args 	= $this->set_single_company_recs_args( $params );
			$query 	= new WP_Query( $args );

			if ( is_wp_error( $query ) ) {

				$options 	= get_option( $this->plugin_name . '-options' );
				$return 	= $options['message-no-openings'];

			} else {

				wp_cache_set( $cache_name, $query->posts, $this->plugin_name . '_stock_rec_articles', 5 * MINUTE_IN_SECONDS );

				$return = $query->posts;

			}
		}

		return $return;


	}

	/**
	 * Returns a post object of portfolio posts
	 *
	 * @param 	array 		$params 			An array of optional parameters
	 * 							types 			An array of portfolio item type slugs
	 * 							quantity		Number of posts to return
	 * @param 	string 		$cache 				String to create a new cache of posts
	 *
	 * @return 	object 		A post object
	 */
	public function get_openings( $params, $cache = '' ) {

		$return 	= '';
		$cache_name = $this->plugin_name . '_job_posts';

		if ( ! empty( $cache ) ) {

			$cache_name .= '_' . $cache;

		}

		$return = wp_cache_get( $cache_name, $this->plugin_name . '_job_posts' );

		if ( false === $return ) {

			$args 	= $this->set_args( $params );
			$query 	= new WP_Query( $args );

			if ( is_wp_error( $query ) ) {

				$options 	= get_option( $this->plugin_name . '-options' );
				$return 	= $options['message-no-openings'];

			} else {

				wp_cache_set( $cache_name, $query->posts, $this->plugin_name . '_job_posts', 5 * MINUTE_IN_SECONDS );

				$return = $query->posts;

			}
		}

		return $return;

	} // get_openings()


	/**
	 * Sets the Stock Recommendation args array for a WP_Query call
	 *
	 * @param 	array 		$params 		Array of shortcode parameters
	 * @return 	array 						An array of parameters for WP_Query
	 */
	private function set_stock_rec_args( $params ) {

		if ( empty( $params ) ) { return; }

		$args = array();

		$args['no_found_rows']			= true;
		$args['orderby'] 				= $params['order'];
		$args['posts_per_page'] 		= 10;
		$args['post_status'] 			= 'publish';
		$args['post_type'] 				= 'stock_recommendation';
		$args['update_post_term_cache'] = false;

		unset( $params['order'] );
		unset( $params['quantity'] );
		unset( $params['listview'] );
		unset( $params['singleview'] );

		if ( empty( $params ) ) { return $args; }

		if ( ! empty( $params['location'] ) ) {

			// $args['meta_query'][]['key'] 		= 'job-location';
			// $args['meta_query'][]['value'] 		= $params['location'];

			// if ( is_array( $params['location'] ) ) {

			// 	$args['meta_query'][]['compare'] = 'IN';

			// }

			// unset( $params['location'] );

		}

		$args = wp_parse_args( $params, $args );

		return $args;

	} // set_args()


	/**
	 * Sets the Stock Recommendation args array for a WP_Query call
	 *
	 * @param 	array 		$params 		Array of shortcode parameters
	 * @return 	array 						An array of parameters for WP_Query
	 */
	private function set_single_company_recs_args( $params ) {

		$stock_ticker_terms = get_terms('stock_ticker');

		if ( empty( $params ) ) { return; }

		$args = array();

		$args['no_found_rows']			= true;
		$args['orderby'] 				= $params['order'];
		$args['posts_per_page'] 		= 10;
		$args['post_status'] 			= 'publish';
		$args['post_type'] 				= 'stock_recommendation';
		$args['update_post_term_cache'] = false;
		$args['tax_query'][]['taxonomy'] 	= 'stock_ticker';
		$args['tax_query'][]['terms'] 	= $stock_ticker_terms;

		// if ( is_array( $params['location'] ) ) {

		// 	$args['meta_query'][]['compare'] = 'IN';

		// }

		unset( $params['location'] );

		unset( $params['order'] );
		unset( $params['quantity'] );
		unset( $params['listview'] );
		unset( $params['singleview'] );

		if ( empty( $params ) ) { return $args; }

		// if ( ! empty( $params['location'] ) ) {

		

		// }

		$args = wp_parse_args( $params, $args );

		return $args;

	} // set_args()

	/**
	 * Sets the args array for a WP_Query call
	 *
	 * @param 	array 		$params 		Array of shortcode parameters
	 * @return 	array 						An array of parameters for WP_Query
	 */
	private function set_args( $params ) {

		if ( empty( $params ) ) { return; }

		$args = array();

		$args['no_found_rows']			= true;
		$args['orderby'] 				= $params['order'];
		$args['posts_per_page'] 		= absint( $params['quantity'] );
		$args['post_status'] 			= 'publish';
		$args['post_type'] 				= 'job';
		$args['update_post_term_cache'] = false;

		unset( $params['order'] );
		unset( $params['quantity'] );
		unset( $params['listview'] );
		unset( $params['singleview'] );

		if ( empty( $params ) ) { return $args; }

		if ( ! empty( $params['location'] ) ) {

			$args['meta_query'][]['key'] 		= 'job-location';
			$args['meta_query'][]['value'] 		= $params['location'];

			if ( is_array( $params['location'] ) ) {

				$args['meta_query'][]['compare'] = 'IN';

			}

			unset( $params['location'] );

		}

		$args = wp_parse_args( $params, $args );

		return $args;

	} // set_args()

	/**
	 * Registers widgets with WordPress
	 *
	 * @since 		1.0.0
	 * @access 		public
	 */
	public function widgets_init() {

		register_widget( 'Motley_Fool_Stock_Advisor_Widget' );

	} // widgets_init()

} // class