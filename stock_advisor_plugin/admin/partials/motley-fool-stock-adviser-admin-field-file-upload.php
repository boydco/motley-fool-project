<?php

/**
 * Provides the markup for an upload field
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
	data-id="url-file"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	type="<?php echo esc_attr( $atts['type'] ); ?>"
	value="<?php echo esc_attr( $atts['value'] ); ?>" />
<a href="#" class="" id="upload-file"><?php esc_html_e( $atts['label-upload'], 'motley-fool-stock-adviser' ); ?></a>
<a href="#" class="hide" id="remove-file"><?php esc_html_e( $atts['label-remove'], 'motley-fool-stock-adviser' ); ?></a>