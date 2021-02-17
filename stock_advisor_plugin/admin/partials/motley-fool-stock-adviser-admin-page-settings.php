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

?><h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
<form method="post" action="options.php"><?php

settings_fields( $this->plugin_name . '-options' );

do_settings_sections( $this->plugin_name );

submit_button( 'Save Settings' );

?></form>