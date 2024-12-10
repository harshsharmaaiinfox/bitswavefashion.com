<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/info-box/view-1.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;
$img = wp_get_attachment_image( $data['img']['id'], 'full' );
$img = $data['link'] ? '<a href="'.esc_url($data['link']).'">'.$img.'</a>' : $img;
$title = $data['title'] ? '<h3 class="item-title">'.$data['title'].'</h3>' : '';
?>

<div class="new-product-box1">
	<div class="item-img sal-animate" data-sal="zoom-in" data-sal-duration="800">
		<?php echo wp_kses_post($img);?>
	</div>
	<div class="item-content">
		<div class="item-heading">
			<?php echo wp_kses_post($title);?>
		</div>
	</div>
</div>
