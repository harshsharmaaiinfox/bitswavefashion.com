<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/product-slider/view.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\Metro_Core;
$query = $data['query'];

if ( !empty( $data['cat'] ) ) {
	$shop_permalink = get_category_link( $data['cat'] );
}
else {
	$shop_permalink = get_permalink( wc_get_page_id( 'shop' ) );
}	
$block_data = array(
	'layout'         => $data['style'],
	'cat_display'    => $data['cat_display'] ? true : false,
	'rating_display' => $data['rating_display'] ? true : false,
	'v_swatch'       => $data['vswatch_display'],
	'quickview'      => $data['quickview'],
	'wishlist'       => $data['wishlist'],	
	'thumb_size'     => $data['thumb'],	
	'gallery'        => true,
);
$title = $data['title'] ? '<h2 class="title">'.$data['title'].'</h2>' : '';

?>

<section class="arrivals-wrap1">
	<div class="container">
		<div class="section-title"> 
			<?php echo wp_kses_post($title);?>
			<span class="tlp-line"></span>
		</div>

		<?php if ( $query->have_posts() ) :?>
			<div class="rc-carousel owl-carousel nav-control-layout3 nav-control-layout4" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
				<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						$id = get_the_ID();
						$product = wc_get_product( $id );
						wc_get_template( "custom/product-block/blocks.php" , compact( 'product', 'block_data' ) );
					}
				?>
			</div>
		<?php else:?>
			<div><?php esc_html_e( 'No products available', 'metro-core' ); ?></div>
		<?php endif;?>

	</div>
</section>
