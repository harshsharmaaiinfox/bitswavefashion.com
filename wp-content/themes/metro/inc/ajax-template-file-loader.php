<?php
/**
 *
 * @author RadiusTheme
 * @since 1.6
 * @version 1.0.1
 *
 */

// Security check
defined( 'ABSPATH' ) || die();

final class RtAjaxTemplateFileLoader {

	public function __construct() {
		// Hook Initialization
		add_action( 'wp_ajax_nopriv_load_template', [ $this, 'load_template' ] );
		add_action( 'wp_ajax_load_template', [ $this, 'load_template' ] );
	}

	public function load_template() {
		wc_get_template_part( 'ajax/' . sanitize_text_field( $_GET['template'] ), sanitize_text_field( $_GET['part'] ) );
		wp_die();
	}

}

new RtAjaxTemplateFileLoader();