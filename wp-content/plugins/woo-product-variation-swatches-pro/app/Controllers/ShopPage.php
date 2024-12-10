<?php


namespace Rtwpvsp\Controllers;

use Rtwpvsp\Helpers\Functions;

class ShopPage {

	function __construct() {
		add_action( 'init', [ __CLASS__, 'shop_page_init' ] );
	}

	static function shop_page_init() {

		if ( ! rtwpvs()->get_option( 'archive_swatches' ) ) {
			return;
		}

		$swatches_position = rtwpvs()->get_option( 'archive_swatches_position' );
		switch ( $swatches_position ) {

			case 'after_title_and_price':
				add_action( 'woocommerce_after_shop_loop_item_title', [
					__CLASS__,
					'archive_variation_swatches',
				], 35 );
				break;

			case 'before_title_and_price':
				add_action( 'woocommerce_before_shop_loop_item_title', [
					__CLASS__,
					'archive_variation_swatches',
				], 35 );
				break;

			case 'after_select_option_button':
				add_action( 'woocommerce_after_shop_loop_item', [ __CLASS__, 'archive_variation_swatches', ], 35 );
				break;

			default:
				add_action( 'woocommerce_after_shop_loop_item_title', [
					__CLASS__,
					'archive_variation_swatches',
				], 35 );

		}

		// Some theme doesn't use "woocommerce_after_shop_loop_item" hook. They can use this for variation template
		// If you need changing position use this on woocommerce/content-product.php like:
		// do_action('rtwpvs_show_archive_variation');
		add_action( 'rtwpvs_show_archive_variation', [ __CLASS__, 'archive_variation_swatches' ] );
	}

	static function archive_variation_swatches() {
		global $product;

		$product_type            = $product->get_type();
		$product_id              = $product->get_id();
		$enable_archive_swatches = rtwpvs()->get_option( 'archive_swatches' );

		$ajax_archive_variation = rtwpvs()->get_option( 'enable_ajax_archive_variation' );

		if ( ( $product_type == 'variable' ) && $enable_archive_swatches ) {
			$attributes = $product->get_variation_attributes();
			if ( ( ! empty( $attributes ) ) && ( sizeof( $attributes ) > 0 ) ) {

				if ( $ajax_archive_variation ) {
					$available_variations = false;
				} else {
					$available_variations = apply_filters( 'rtwpvs_archive_available_variations', Functions::add_price_html_slash_for_variations( $product->get_available_variations() ), $product->get_available_variations() );
				}

				$default_attributes = $product->get_default_attributes();

				$meta_data = get_post_meta( $product_id, '_rtwpvs', true );

				wc_get_template(
					'rtwpvs-archive-variation.php',
					compact(
						'attributes',
						'available_variations',
						'default_attributes',
						'product',
						'product_id',
						'meta_data'
					),
					'',
					trailingslashit( rtwpvs()->get_template_path() )
				);

			}
		}

	}

}
