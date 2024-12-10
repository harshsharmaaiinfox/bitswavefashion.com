<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/countdown-2/view.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;
?>

<div data-time="<?php echo esc_attr( $data['date'] ); ?>" class="countdown-layout1 rt-el-product-countdown-wrap">
    <?php if ( ! empty( $data['p_url']['url'] ) ) { ?>
        <a class="product-link" <?php echo $data['product_url_attribute']; ?>> </a>
	<?php } ?>
	<div class="countdown"></div>
</div>
