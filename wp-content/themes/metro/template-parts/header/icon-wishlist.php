<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
if(!function_exists('YITH_WCWL')) return;
$mobile_visible = RDTheme::$options['wishlist_icon_mobile'] ? 'show-mobile' : 'hide-mobile';
?>
<div class="icon-area-content wishlist-icon-area <?php echo esc_attr( $mobile_visible )?>">
	<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() );?>">
        <span class="fa fa-heart-o" aria-hidden="true"></span><span class="wishlist-icon-num"><?php echo yith_wcwl_count_all_products();?></span>
    </a>
</div>