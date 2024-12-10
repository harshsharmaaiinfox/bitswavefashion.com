<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/accordion/view.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Metro_Core;

$title = $data['title'] ? '<div class="item-shape">'.$data['title'].'</div>' : '';
$percent = $data['percent'] ? '<div class="item-parcent">'.$data['percent'].'</div>' : '';
$offer = $data['offer'] ? '<div class="item-offer">'.$data['offer'].'</div>' : '';
$btntext = $data['btntext'] ? '<a class="item-btn" href="'.esc_url($data['btnurl']).'">'.$data['btntext'].'</a>' : '';
?>

<div class="side-bannar">
    <div class="side-banner-content">
        <?php echo wp_kses_post($title);?>
        <div class="item-discount">
            <?php echo wp_kses_post($percent.$offer);?>
        </div>
    </div>
    <div class="side-bannar-btn">
        <?php echo wp_kses_post($btntext);?>
    </div>
</div>
