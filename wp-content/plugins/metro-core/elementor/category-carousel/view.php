<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/product-slider/view.php
 *
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\Metro_Core;
$title = $data['title'] ? '<h2 class="title">' . $data['title'] . '</h2>' : '';
$out   = '';

foreach ( $data['items'] as $item ) {
	$term = get_term( $item['cat'] );
	if ( ! is_object( $term ) ) {
		continue;
	}
	$thumb     = wp_get_attachment_image( get_term_meta( $item['cat'], 'thumbnail_id', true ), 'full' );
	$term_name = $term->name;
	$num       = sprintf( _n( '%s Product', '%s Products', get_term( $item['cat'] )->count, 'metro' ), get_term( $item['cat'] )->count );
	$out       .= '
		<div class="categories-box1">
			<div class="item-img">
				' . $thumb . '
			</div>
			<div class="item-content">
				<h3 class="item-title"><a href="' . get_term_link( (int) $item['cat'], 'product_cat' ) . '">' . $term_name . '</a></h3>
				<div class="item-subtitle">' . $num . '</div>
			</div>
		</div>	
	';
}

?>

<section class="arrivals-wrap1">
    <div class="container">
        <div class="section-title">
			<?php echo wp_kses_post( $title ); ?>
            <span class="tlp-line"></span>
        </div>
        <div class="rc-carousel owl-carousel nav-control-layout3 nav-control-layout4" data-carousel-options="<?php echo esc_attr( $data['owl_data'] ); ?>">
			<?php echo wp_kses_post( $out ); ?>
        </div>
    </div>
</section>
