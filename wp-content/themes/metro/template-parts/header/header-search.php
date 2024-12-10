<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;

$category_dropdown = array();
$terms = get_terms( array( 'taxonomy' => 'product_cat', 'parent' => 0 ) );
foreach ( $terms as $term) {
	$attachment_id = get_term_meta( $term->term_id, 'metro_icon', true );
	$icon = Helper::get_attachment_image( $attachment_id );

	$category_dropdown[$term->slug] = array(
		'name' => $term->name,
		'icon' => $icon,
	);
}

$search      = isset( $_GET['s'] ) ? $_GET['s'] : '';
$product_cat = isset( $_GET['product_cat'] ) ? $_GET['product_cat'] : '';

$all_label = $label = esc_html__( 'All Categories', 'metro' );
if ( isset( $_GET['product_cat'] ) ) {
	$pcat = $_GET['product_cat'];
	if ( isset( $category_dropdown[$pcat] ) ) {
		$label = $category_dropdown[$pcat]['name'];
	}
}?> 

<div class="product-search">
	<form method="get" action="<?php echo esc_url(get_bloginfo('url'));?>">
		<div class="input-group">
			<label class="sr-only" for="hdd-label">Search</label>
			<input type="text" autocomplete="off" name="s" class="product-search-input product-autocomplete-js form-control" placeholder="<?php esc_attr_e( 'Search Products Here', 'metro' );?>" value="<?php echo esc_attr( $search );?>" id="hdd-label">
			<input type="hidden" name="post_type" value="product">
			<span class="product-autoaomplete-spinner fa fa-spinner fa-spin"></span>
			<div class="btn-group category-search-dropdown-js">
				<div class="dropdown">
					<input type="hidden" name="product_cat" value="<?php echo esc_attr( $product_cat );?>">
					<button type="button" class="btn rtin-btn-cat dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo esc_html( $label );?></button>
					<div class="dropdown-menu" role="menu">
						<ul>
							<li data-slug=""><?php echo esc_html( $all_label );?></li>
							<?php
							foreach ( $category_dropdown as $slug => $cat ) {
								printf( '<li data-slug="%s">%s<span>%s</span></li>', $slug, $cat['icon'], $cat['name'] );
							}
							?>
						</ul>
					</div>
				</div>
				<button type="submit" class="btn rtin-btn-search"><span class="flaticon-search"></span></button>
			</div>
		</div>		
	</form>
	<div class="result"></div>
</div>