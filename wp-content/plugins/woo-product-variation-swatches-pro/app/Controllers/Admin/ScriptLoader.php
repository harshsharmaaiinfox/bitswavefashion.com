<?php

namespace Rtwpvsp\Controllers\Admin; 

use Rtwpvsp\Helpers\Functions;

class ScriptLoader {

	private $suffix;
	private $version;
	private $ajaxurl;
	private static $wp_localize_scripts = [];

	function __construct() {

		$this->suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';    
		$this->version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : rtwpvsp()->version();

		$this->ajaxurl = admin_url( 'admin-ajax.php' ); 

		add_action( 'wp_enqueue_scripts', array( $this, 'register_script' ), 99 ); 

        // fixed shop redirecting issues
        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5);
        add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20);
        add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 8);
        add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 12);
	}  

	function register_script_both_end() { 
 
	}

	function register_script() {
		$this->register_script_both_end();   

		if (apply_filters('rtwpvs_disable_enqueue_scripts', false)) {
            return;
        }
        if ( rtwpvs()->is_wc_active() ) {
            if (rtwpvs()->get_option('load_scripts')) {
                if (is_product() || is_shop() || is_product_taxonomy()) {
                    $this->load_scripts();
                }
                return;
            }
        }

        $this->load_scripts();
		
	}  

	private function load_scripts() {  

        $this->add_inline_style();
    }

	public function add_inline_style() {
        if ( apply_filters('rtwpvs_disable_inline_style', false) ) {
            return;
        }  
		 
        $archive_width = rtwpvs()->get_option('archive_swatches_width');
        $archive_height = rtwpvs()->get_option('archive_swatches_height');
        $archive_font_size = rtwpvs()->get_option('archive_swatches_font_size'); 

        // Attribute item style
        $border_color = rtwpvs()->get_option('border_color', 'rgba(0, 0, 0, 0.3)');
        $border_size = absint(rtwpvs()->get_option('border_size', 1));
        $text_color = rtwpvs()->get_option('text_color', '#000000');
        $background_color = rtwpvs()->get_option('background_color', '#FFFFFF');

        // Attribute item hover
        $hover_border_color = rtwpvs()->get_option('hover_border_color', '#000000');
        $hover_border_size = absint(rtwpvs()->get_option('hover_border_size', 3));
        $hover_text_color = rtwpvs()->get_option('hover_text_color', '#000000');
        $hover_background_color = rtwpvs()->get_option('hover_background_color', '#FFFFFF');

        // Attribute item selected
        $selected_border_color = rtwpvs()->get_option('selected_border_color', '#000000');
        $selected_border_size = absint(rtwpvs()->get_option('selected_border_size', 2));
        $selected_text_color = rtwpvs()->get_option('selected_text_color', '#000000');
        $selected_background_color = rtwpvs()->get_option('selected_background_color', '#FFFFFF');

        ob_start();
        ?>
        <style type="text/css">
            /* Attribute style */
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.rtwpvs-radio-term) {
                box-shadow: 0 0 0 <?php echo $border_size?>px <?php echo $border_color?> !important;
            }
            .rtwpvs-shape-checkmark .rtwpvs-term.selected span.rtwpvs-term-span:before {
                background-color: <?php echo $hover_border_color; ?> !important;
            }
            <?php if( rtwpvs()->get_option('single_swatches_display_limit') ){ 
                $limit = rtwpvs()->get_option('single_swatches_display_limit') ;
                ?>
                .rtwpvs.rtwpvs-squared .rtwpvs-terms-wrapper .rtwpvs-term {
                    transition: 0.3s all;
                    opacity: 1;
                }
                .rtwpvs.rtwpvs-squared .rtwpvs-terms-wrapper.has-more-variation .rtwpvs-term:nth-child(<?php echo absint( $limit ); ?>) ~ .rtwpvs-term {
                    opacity: 0;
                    position: absolute;
                    z-index: -999;
                }
            <?php } ?>
            /*
            
            */

            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-button-term span,
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-radio-term label,
            .rtwpvs .rtwpvs-terms-wrapper .reset_variations a {
                color: <?php echo $text_color?> !important;
            }

            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.radio-variable-item, .rtwpvs-radio-term) {
                background-color: <?php echo $background_color?> !important;
            }

            /*  Attribute Hover style  */
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.rtwpvs-radio-term):hover{
                box-shadow: 0 0 0 <?php echo $hover_border_size?>px <?php echo $hover_border_color?> !important;
            } 
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-button-term:hover span,
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-button-term.selected:hover span,
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-radio-term:hover label,
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-radio-term.selected:hover label {
                color: <?php echo $hover_text_color?> !important;
            } 
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.rtwpvs-radio-term):hover{
                background-color: <?php echo $hover_background_color?> !important;
            }  
            
            /*  Attribute selected style  */
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-button-term.selected span,
            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-radio-term.selected label {
                color: <?php echo $selected_text_color?> !important;
            }

            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.rtwpvs-radio-term).selected {
                background-color: <?php echo $selected_background_color?> !important;
            }

            .rtwpvs .rtwpvs-terms-wrapper .rtwpvs-term:not(.rtwpvs-radio-term).selected {
                box-shadow: 0 0 0 <?php echo $selected_border_size?>px <?php echo $selected_border_color?> !important;
            } 

            <?php if($archive_width || $archive_height) : ?>
            .rtwpvs-archive-variation-wrapper .rtwpvs-term:not(.rtwpvs-radio-term) {
            <?php if($archive_width) {?> width: <?php echo $archive_width ?>px;
            <?php }?><?php if($archive_height) {?> height: <?php echo $archive_height ?>px;
            <?php }?>
            }

            <?php endif; ?> 

            <?php if($archive_font_size): ?>
            .rtwpvs-archive-variation-wrapper .rtwpvs-button-term span {
                font-size: <?php echo $archive_font_size ?>px;
            } 
            <?php endif; ?>  

            <?php if($tooltip_image_width = rtwpvs()->get_option( 'tooltip_image_width', 150 )): ?>
            .rtwpvs.rtwpvs-tooltip .rtwpvs-terms-wrapper span.image-tooltip-wrapper {
                width: <?php echo $tooltip_image_width; ?>px;
            }

            <?php endif; ?>

        </style>
        <?php
        $css = ob_get_clean();
        $css = str_ireplace(array('<style type="text/css">', '</style>'), '', $css);

        $css = apply_filters('rtwpvs_inline_style', $css);
        wp_add_inline_style('rtwpvs', $css);
    }
}
