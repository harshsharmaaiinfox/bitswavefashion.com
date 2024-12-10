<?php

use radiustheme\Metro\WC_Functions;

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
global $product;
$thumb_size = 'rdtheme-size3';
?>
<div class="rt-product-list rt-product-list-1">

    <div class="rtin-thumb-wrapper">
        <a href="<?php echo esc_attr( $product->get_permalink() ); ?>" class="rtin-thumb">
			<?php echo WC_Functions::get_product_thumbnail( $product, $thumb_size ); ?>
        </a>
		<?php woocommerce_show_product_loop_sale_flash(); ?>
    </div>

    <div class="rtin-content">

        <div class="rtin-cat"><?php echo wc_get_product_category_list( get_the_ID() ); ?></div>
		<?php do_action( 'rtsb/modules/flash_sale_countdown/frontend/display' ); ?>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


        <div class="rtin-price-meta">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
                <div class="rtin-price price"><?php echo wp_kses_post( $price_html ); ?></div>
			<?php endif; ?>

			<?php wc_get_template( 'loop/rating.php' ); ?>
        </div>
        <div class="rtin-excerpt"><?php echo wp_trim_words( get_the_content(), 22 ) ?></div>

        <div class="rtin-buttons">
			<?php
			WC_Functions::print_add_to_cart_icon();
			WC_Functions::print_add_to_wishlist_icon();
			?>
            <div class="rtsb-qc-ps">
				<?php do_action( 'rtsb/modules/quick_checkout/frontend/display' ); ?>
				<?php do_action( 'rtsb/modules/product_size_chart/frontend/display' ); ?>
            </div>
			<?php
			WC_Functions::print_quickview_icon();
			WC_Functions::print_compare_icon();
			?>
        </div>

    </div>

</div>