<?php

namespace Rtwpvsp\Controllers;

use Rtwpvsp\Traits\SingletonTrait;

/**
 * Metaboxes class.
 */
class FilterHooks {
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
		add_filter('rtwpvs_variation_attribute_default_type' , [ $this, 'attribute_default_button_type'] );
		add_filter('rtwpvs_product_attribute_is_default_to_image' , [ $this, 'attribute_default_button_type'] );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );

	}
	static function body_class( $classes ) {
		if( rtwpvs()->get_option( 'shape_style_checkmark' ) ){
			$classes[] = 'rtwpvs-shape-checkmark';
		}
		return array_unique( $classes );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function attribute_default_button_type( $type ) {
		if ( rtwpvs()->get_option('default_to_image') ) { 
			$type = 'image';
		}
		
		if( ! $type && ( is_shop() || is_product_taxonomy() ) ){
			$type = 'button';
		}

		return $type;
	}

}