<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
$nav_menu_args = Helper::nav_menu_args();
$cartclass     = RDTheme::$options['carticon'] ? RDTheme::$options['carticon'] : 'offscreen';

?>

<div class="rt-header-menu mean-container" id="meanmenu">
    <div class="mean-bar">
		<?php echo Helper::site_logo( RDTheme::$options['logo_type'], RDTheme::$options['logo_text'], RDTheme::$options['logo'] ); ?>
        <div class="header-icon-area clearfix sdfasdf">

			<?php if ( RDTheme::$options['wishlist_icon'] && defined( 'RTSB_VERSION' ) ) {
				get_template_part( 'template-parts/header/icon', 'wishlist-2' );
			} elseif ( RDTheme::$options['wishlist_icon'] && defined( 'YITH_WCWL' ) ) {
				get_template_part( 'template-parts/header/icon', 'wishlist' );
			} ?>

			<?php if ( RDTheme::$options['cart_icon'] && class_exists( 'WooCommerce' ) ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'cart' ); ?>
			<?php } ?>

			<?php if ( RDTheme::$options['account_icon'] && class_exists( 'WooCommerce' ) ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'account' ); ?>
			<?php } ?>

			<?php if ( RDTheme::$options['search_icon'] && class_exists( 'WooCommerce' ) ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'search' ); ?>
			<?php } ?>

        </div>

        <span class="sidebarBtn ">
            <span class="fa fa-bars">
            </span>
        </span>

    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
			<?php wp_nav_menu( $nav_menu_args ); ?>
        </div>
    </div>

</div>
