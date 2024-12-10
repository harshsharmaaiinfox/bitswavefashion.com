<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
use RadiusTheme\SB\Modules\WishList\WishlistFns;

$mobile_visible = RDTheme::$options['wishlist_icon_mobile'] ? 'show-mobile' : 'hide-mobile';
?>
<div class="icon-area-content wishlist-icon-area <?php echo esc_attr( $mobile_visible )?>">
    <?php if ( shortcode_exists( 'rtsb_wishlist_counter' ) ) {
          echo do_shortcode('[rtsb_wishlist_counter]');
      } ?>
</div>