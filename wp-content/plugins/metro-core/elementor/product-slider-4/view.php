<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/accordion/view.php
 *
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

$id = $this->get_id();
$content = '';
foreach ($data['items'] as $item) {
    $img = '<div class="item-img">'.wp_get_attachment_image($item['img']['id'], 'full').'</div>';
    $title = $item['title'] ? '<h2 class="item-title">'.$item['title'].'</h2>' : '';
    $pretitle = $item['pre'] ? '<div class="item-subtitle">'.$item['pre'].'</div>' : '';
    $button = $item['button'] ? '<div class="slider-btn"><a href="'.esc_url($item['button_url']).'">'.$item['button'].'</a></div>' : '';

    $content .= '
		<div class="single-item">
			<div class="container p-0">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="slick-slide">
							'.$pretitle.'
							'.$title.'
							'.$item['description'].'
							'.$button.'
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="slider-medium-img">
							'.$img.'
						</div>
					</div>
				</div>
			</div>
		</div>
	';
}
?>

<section class="slider-layout4">
    <?php echo wp_kses_post($content);?>
</section>
