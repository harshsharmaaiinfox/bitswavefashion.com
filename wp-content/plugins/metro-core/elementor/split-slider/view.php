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
$img = $content = '';
foreach ( $data['items'] as $item ){

	$img .= '<div class="slick-slide">'.wp_get_attachment_image($item['img']['id'],'full').'</div>';
	$title = $item['title'] ? '<h2 class="item-title">'.$item['title'].'</h2>' : '';
	$pretitle = $item['pre'] ? '<div class="item-subtitle">'.$item['pre'].'</div>' : '';
	$desc = $item['description'] ? '<p class="description">'.$item['description'].'</p>' : '';
	$button = $item['button'] ? '<div class="item-btn"><a href="'.esc_url($item['button_url']).'">'.$item['button'].'</a></div>' : '';

	$content .= '
		<div class="slick-slide">
			'.$pretitle.'
			'.$title.'
			'.$desc.'
			'.$button.'
		</div>
	';	
}
?>

<section class="slider-layout3">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-6">
				<div class="slider-text-content">
					<div class="slick-slider slick-slide-text s-<?php echo esc_attr($id) ;?>" data-slick='{"arrows": false,"asNavFor": ".l-<?php echo esc_attr($id) ;?>", "slidesToShow": 1, "slidesToScroll": 1, "vertical": true, "autoplay": true, "autoplaySpeed": 3000, "speed": 500}'>
						<?php echo wp_kses_post($content);?>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6">
				<div class="slider-large-img">
					<div class="slick-slider slick-large l-<?php echo esc_attr($id) ;?>" data-slick='{"arrows": true, "dots": false, "fade": true, "slidesToShow": 1, "autoplay": true, "autoplaySpeed": 3000, "speed": 500, "slidesToScroll": 1, "asNavFor": ".s-<?php echo esc_attr($id) ;?>"}'>
						<?php echo wp_kses_post($img);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
