<?php

namespace Rtwpvsp\Helpers;
  
class Functions {  
    public static function check_license() {
        return apply_filters('rtwpvs_check_license', true);
    }
     /***
	 * @param $variations
	 *
	 * @return mixed
	 */
	public static function add_price_html_slash_for_variations( $variations ) {
		if ( ! is_array( $variations ) ) {
			return $variations;
		}
		
		foreach ( $variations as $key => $variation ) {
		
			$availability_html = str_replace('"', "'", $variation['availability_html'] );
			$price_html = str_replace('"', "'", $variation['price_html'] );
			
			$variations[$key]['availability_html'] = ! empty( $variation['availability_html'] ) ? $availability_html : '';
			$variations[$key]['price_html'] = ! empty( $variation['price_html'] ) ? $price_html : '';
			
		}
		return $variations;
	}
    
}
