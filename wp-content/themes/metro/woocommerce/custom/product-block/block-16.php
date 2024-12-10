<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
$id  = $product->get_id();
$cat = $block_data['cat_display'] ? WC_Functions::get_top_category_name() : false;

?>

<div class="product-box3 style-1 rt-product-block-16">
    <div class="item-img"> 
			<?php
				if ( $block_data['gallery'] ) {
					echo WC_Functions::get_product_thumbnail_gallery( $product, $block_data['thumb_size'] );
				}
				else {
					echo WC_Functions::get_product_thumbnail_link( $product, $block_data['thumb_size'] );
				}
			?>
        <?php woocommerce_show_product_loop_sale_flash();?>
        <div class="cart-btn">
            <?php WC_Functions::print_add_to_cart_icon(); ?>
        </div>
    </div>
    <div class="item-content">
		<?php if ( WC_Functions::is_product_archive() || wp_doing_ajax() ) do_action( 'woocommerce_before_shop_loop_item_title' );?>
		<h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		<?php if ( WC_Functions::is_product_archive() || wp_doing_ajax() ) do_action( 'woocommerce_after_shop_loop_item_title' );?>
        <div class="item-price">
            <?php echo $product->get_price_html();?>
        </div>
		<?php
			if ( $block_data['rating_display'] ) {
				wc_get_template( 'loop/rating.php' );
			}
		?>
        <div class="rtsb-qc-ps">
		    <?php do_action( 'rtsb/modules/quick_checkout/frontend/display' ); ?>
		    <?php do_action( 'rtsb/modules/product_size_chart/frontend/display' ); ?>
        </div>
    </div>
</div>
