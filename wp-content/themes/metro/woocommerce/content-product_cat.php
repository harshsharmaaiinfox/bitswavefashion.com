<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.7.0
 */

use radiustheme\Metro\WC_Functions;
use radiustheme\Metro\RDTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
$wc_product_columns_update 		= RDTheme::$options['wc_product_columns_update'];

$wc_desktops_product_columns 	= RDTheme::$options['wc_desktops_product_columns'];
$wc_mobile_product_columns 		= RDTheme::$options['wc_mobile_product_columns'];
$wc_tab_product_columns 		= RDTheme::$options['wc_tab_product_columns'];

if($wc_product_columns_update){

$product_col_class  = ( RDTheme::$layout == 'full-width' ) ? "col-xl-{$wc_desktops_product_columns} col-lg-{$wc_desktops_product_columns} col-md-{$wc_tab_product_columns} col-sm-{$wc_tab_product_columns} col-{$wc_mobile_product_columns}" : "col-xl-{$wc_desktops_product_columns} col-lg-{$wc_desktops_product_columns} col-md-{$wc_tab_product_columns} col-sm-{$wc_tab_product_columns} col-{$wc_mobile_product_columns}";

}else{

$product_col_class  = ( RDTheme::$layout == 'full-width' ) ? "col-xl-3 col-lg-3 col-md-{$wc_tab_product_columns} col-sm-{$wc_tab_product_columns} col-{$wc_mobile_product_columns}" : "col-xl-4 col-lg-4 col-md-{$wc_tab_product_columns} col-sm-{$wc_tab_product_columns} col-{$wc_mobile_product_columns}";
} 

$product_class      = '';
global $metro_shortcode_called;

?>
<div <?php wc_product_cat_class( $product_col_class, $category ); ?>>
	
	<div class="product-cat-block">

		<?php
		/**
		 * woocommerce_before_subcategory hook.
		 *
		 * @hooked woocommerce_template_loop_category_link_open - 10
		 */
		do_action( 'woocommerce_before_subcategory', $category );

		/**
		 * woocommerce_before_subcategory_title hook.
		 *
		 * @hooked woocommerce_subcategory_thumbnail - 10
		 */
		do_action( 'woocommerce_before_subcategory_title', $category );

		/**
		 * woocommerce_shop_loop_subcategory_title hook.
		 *
		 * @hooked woocommerce_template_loop_category_title - 10
		 */
		do_action( 'woocommerce_shop_loop_subcategory_title', $category );

		/**
		 * woocommerce_after_subcategory_title hook.
		 */
		do_action( 'woocommerce_after_subcategory_title', $category );

		/**
		 * woocommerce_after_subcategory hook.
		 *
		 * @hooked woocommerce_template_loop_category_link_close - 10
		 */
		do_action( 'woocommerce_after_subcategory', $category ); ?>
		
	</div>

</div>
