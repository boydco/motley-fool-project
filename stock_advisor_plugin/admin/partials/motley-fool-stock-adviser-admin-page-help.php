<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link        
 * @since      1.0.0
 *
 * @package    Motley Fool Stock Adviser
 * @subpackage Motley Fool Stock Adviser/admin/partials
 */

?><h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<h2><?php esc_html_e( 'Shortcode', 'motley-fool-stock-adviser' ); ?></h2>
<p><?php esc_html_e( 'The simplest version of the shortcode is:', 'motley-fool-stock-adviser' ); ?></p>
<pre><code>[mfsa]</code></pre>
<p><?php esc_html_e( 'Enter that in the Editor on any page or post to display all the job opening posts.', 'motley-fool-stock-adviser' ); ?></p>
<p><?php esc_html_e( 'This is an example with all the default attributes used:', 'motley-fool-stock-adviser' ); ?></p>
<pre><code>[mfsa order="rand" quantity="10" location="Decatur"]</code></pre>

<h3><?php esc_html_e( 'Shortcode Attributes', 'motley-fool-stock-adviser' ); ?></h3>
<p><?php esc_html_e( 'There are currently three attributes that can be added to the shortcode to filter job opening posts:', 'motley-fool-stock-adviser' ); ?></p>
<ol>
	<li><?php esc_html_e( 'order', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'quantity', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'location', 'motley-fool-stock-adviser' ); ?></li>
</ol>
<h4><?php esc_html_e( 'order', 'motley-fool-stock-adviser' ); ?></h4>
<p><?php printf( wp_kses( __( 'Changes the display order of the job opening posts. Default value is "date", but can use any of <a href="%1$s">the "orderby" parameters for WP_Query</a>.', 'motley-fool-stock-adviser' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters' ) ); ?></p>
<p><?php esc_html_e( 'Examples of the order attribute:', 'motley-fool-stock-adviser' ); ?></p>
<ul>
	<li><?php esc_html_e( 'order="title" (order by post title)', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'order="name" (order by post slug)', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'order="rand" (random order)', 'motley-fool-stock-adviser' ); ?></li>
</ul>

<h4><?php esc_html_e( 'quantity', 'motley-fool-stock-adviser' ); ?></h4>
<p><?php esc_html_e( 'Determines how many job opening posts are displayed. The default value is 100. Must be a positive value. To display all, use a high number.', 'motley-fool-stock-adviser' ); ?></p>
<p><?php esc_html_e( 'Examples of the quantity attribute:', 'motley-fool-stock-adviser' ); ?></p>
<ul>
	<li><?php esc_html_e( 'quantity="3" (only show 3 openings)', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'quantity="125" (only show 125 openings)', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'quantity="999" (large number to display to all openings)', 'motley-fool-stock-adviser' ); ?></li>
</ul>

<h4><?php esc_html_e( 'location', 'motley-fool-stock-adviser' ); ?></h4>
<p><?php esc_html_e( 'Filters job openings based on the value of the job location metabox field. The value should be the ', 'motley-fool-stock-adviser' ); ?></p>
<p><?php esc_html_e( 'Examples of the location attribute:', 'motley-fool-stock-adviser' ); ?></p>
<ul>
	<li><?php esc_html_e( 'location="St Louis"', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'location="Decatur"', 'motley-fool-stock-adviser' ); ?></li>
	<li><?php esc_html_e( 'location="Chicago"', 'motley-fool-stock-adviser' ); ?></li>
</ul>

<h4><?php esc_html_e( 'WP_Query', 'motley-fool-stock-adviser' ); ?></h4>
<p><?php printf( wp_kses( __( 'The shortcode will also accept any of <a href="%1$s">the parameters for WP_Query</a>.', 'motley-fool-stock-adviser' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://codex.wordpress.org/Class_Reference/WP_Query' ) ); ?></p>