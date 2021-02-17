<?php

/**
 * Provides the markup for any textarea field
 *
 * @link        
 * @since      1.0.0
 *
 * @package    Motley_Fool_Stock_Advisor
 * @subpackage Motley_Fool_Stock_Advisor/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {

	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'motley-fool-stock-adviser' ); ?>: </label><?php

}

?><textarea
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	cols="<?php echo esc_attr( $atts['cols'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	rows="<?php echo esc_attr( $atts['rows'] ); ?>"><?php

	echo esc_textarea( $atts['value'] );

?></textarea>
<span class="description"><?php esc_html_e( $atts['description'], 'motley-fool-stock-adviser' ); ?></span>