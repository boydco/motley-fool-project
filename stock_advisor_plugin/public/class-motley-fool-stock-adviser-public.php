<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link 		 
 * @since 		1.0.0
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package 	Motley_Fool_Stock_Advisor
 * @subpackage 	Motley_Fool_Stock_Advisor/public
 *  
 */
class Motley_Fool_Stock_Advisor_Public {

	/**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options    The plugin options.
	 */
	private $options;

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
	 * @param 		string 			$Motley_Fool_Stock_Advisor 		The name of the plugin.
	 * @param 		string 			$version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->set_options();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 		1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/motley-fool-stock-adviser-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 		1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/motley-fool-stock-adviser-public.js', array( 'jquery' ), $this->version, true );

	}

	/**
	 * Processes shortcode howtoapply
	 *
	 * @param   array	$atts		The attributes from the shortcode
	 *
	 * @uses	get_option
	 * @uses	get_layout
	 *
	 * @return	mixed	$output		Output of the buffer
	 */
	public function how_to_apply() {

		if ( empty( $this->options['howtoapply'] ) ) { return; }

		ob_start();

		include motley_fool_stock_adviser_get_template( 'motley-fool-stock-adviser-how-to-apply' );

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // how_to_apply()



	/**
	 * Processes shortcode mfsa-stock-recommendation-archive
	 *
	 * @param   array	$atts		The attributes from the shortcode
	 *
	 * @uses	get_option
	 * @uses	get_layout
	 *
	 * @return	mixed	$output		Output of the buffer
	 */
	public function list_stock_recommendations( $atts = array() ) {

		ob_start();

		$defaults['loop-template'] 	= $this->plugin_name . '-loop';
		$defaults['order'] 			= 'date';
		$defaults['quantity'] 		= 100;
		$args						= shortcode_atts( $defaults, $atts, 'mfsa-stock-recs' );
		$shared 					= new Motley_Fool_Stock_Advisor_Shared( $this->plugin_name, $this->version );
		$items 						= $shared->get_stock_recommendations( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			include motley_fool_stock_adviser_get_template( $args['loop-template'] );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}




	public function list_stock_rec_articles ($atts = array() ) {
		
		ob_start();

		$defaults['loop-template'] 	= $this->plugin_name . '-loop';
		$defaults['order'] 			= 'date';
		$defaults['quantity'] 		= 100;
		$args						= shortcode_atts( $defaults, $atts, 'mfsa-stock-recs' );
		$shared 					= new Motley_Fool_Stock_Advisor_Shared( $this->plugin_name, $this->version );
		$items 						= $shared->get_stock_rec_articles_by_ticker( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			include motley_fool_stock_adviser_get_template( $args['loop-template'] );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}



	/**
	 * Processes shortcode mfsa
	 *
	 * @param   array	$atts		The attributes from the shortcode
	 *
	 * @uses	get_option
	 * @uses	get_layout
	 *
	 * @return	mixed	$output		Output of the buffer
	 */
	public function list_openings( $atts = array() ) {

		ob_start();

		$defaults['loop-template'] 	= $this->plugin_name . '-loop';
		$defaults['order'] 			= 'date';
		$defaults['quantity'] 		= 100;
		$args						= shortcode_atts( $defaults, $atts, 'mfsa' );
		$shared 					= new Motley_Fool_Stock_Advisor_Shared( $this->plugin_name, $this->version );
		$items 						= $shared->get_openings( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			include motley_fool_stock_adviser_get_template( $args['loop-template'] );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // list_openings()

	/**
	 * Registers all shortcodes at once
	 *
	 * @return [type] [description]
	 */
	public function register_shortcodes() {

		add_shortcode( 'mfsa', array( $this, 'list_openings' ) );
		add_shortcode( 'mfsa-stock-recs', array( $this, 'list_stock_recommendations' ) );
		add_shortcode( 'mfsa-howtoapply', array( $this, 'how_to_apply' ) );

	} // register_shortcodes()

	/**
	 * Adds a default single view template for a job opening
	 *
	 * @param 	string 		$template 		The name of the template
	 * @return 	mixed 						The single template
	 */
	public function single_cpt_template( $template ) {

		global $post;

		$return = $template;

	    if ( $post->post_type == 'job' ) {

			$return = motley_fool_stock_adviser_get_template( 'single-job' );

		} elseif ( $post->post_type == 'company' ) {

			$return = motley_fool_stock_adviser_get_template( 'single-company' );

		} elseif ( $post->post_type == 'stock_recommendation' ) {

			$return = motley_fool_stock_adviser_get_template( 'single-stock-rec' );

		} elseif ( $post->post_type == 'news_article' ) {

			$return = motley_fool_stock_adviser_get_template( 'single-news-article' );

		}

		return $return;

	} // single_cpt_template()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

} // class
