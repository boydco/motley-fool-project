<?php

/**
 * Provides the markup for any text field
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

?><input
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
	type="<?php echo esc_attr( $atts['type'] ); ?>"
	value="<?php echo esc_attr( $atts['value'] ); ?>" /><?php

if ( ! empty( $atts['description'] ) ) {

	?><span class="description"><?php esc_html_e( $atts['description'], 'motley-fool-stock-adviser' ); ?></span><?php

}