<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/accordion/view.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;
$out = '';
foreach( $data['items'] as $logo ){
	$out .='
		<div class="col-xxl-5">
			<div class="brand-box1 brand-box2">
				<div class="brand-img">
					'.wp_get_attachment_image($logo['image']['id'] ,'full').'
				</div>
			</div>
		</div>	
	';
}

?>

<section class="brand-wrap-layout2">
	<div class="container">
		<div class="row">
			<?php echo wp_kses_post($out);?>
		</div>
	</div>
</section>