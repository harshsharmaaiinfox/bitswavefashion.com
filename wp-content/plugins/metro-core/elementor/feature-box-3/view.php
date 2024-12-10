<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/accordion/view.php
 *
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;
$id      = $this->get_id();
$img     = '<div class="item-img">' . wp_get_attachment_image( $data['img']['id'], 'full' ) . '</div>';
$title   = $data['title'] ? '<h3><a href="' . esc_url( $data['btnurl'] ) . '">' . $data['title'] . '</a></h3>' : '';
$btntext = $data['btntext'] ? '<h4 class="item-subtitle"><a href="' . esc_url( $data['btnurl'] ) . '">' . $data['btntext'] . '</a></h4>' : '';
?>

<div class="feature-box3 rt-el-product-countdown-wrap">
	<?php if ( ! empty( $data['p_url']['url'] ) ) { ?>
        <a class="product-link" <?php echo $data['product_url_attribute']; ?>> </a>
	<?php } ?>
    <div class="media">
        <div class="item-title">
			<?php echo wp_kses_post( $title . $btntext ); ?>
        </div>
        <div class="media-body">
            <div class="feature-img">
				<?php echo wp_kses_post( $img ); ?>
            </div>
        </div>
    </div>
</div>
