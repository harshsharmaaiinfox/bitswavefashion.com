<?php

namespace Rtwpvsp\Controllers;

use Rtwpvsp\Traits\SingletonTrait;

/**
 * Metaboxes class.
 */
class ActionHooks {
	/**
	 * Singleton Function.
	 */
	use SingletonTrait;

	/**
	 * Initial Function.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_ajax_rtwpvs_load_product_variation', [ $this, 'load_product_variation' ] );
		add_action( 'wp_ajax_nopriv_rtwpvs_load_product_variation', [ $this, 'load_product_variation' ] );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function load_product_variation() {
		if ( ! wp_verify_nonce( $_POST['rtwpvs_nonce'], 'rtwpvs_nonce' ) ) {
			wp_send_json_error( esc_html__( 'Something Went Wrong', 'woo-product-variation-swatches-pro' ) );
		}
		$product_id = ! empty( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
		$product    = wc_get_product( $product_id );

		$available_variations = $product->get_available_variations();

		wp_send_json_success( $available_variations );
	}

}
