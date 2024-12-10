<?php

namespace Rtwpvsp\Controllers\Admin; 

class AdminFilter {  

    function __construct() {     
        //action hook
        add_action('woocommerce_product_data_tabs', array($this, 'product_swatches_tab'), 99, 1);
        add_action('woocommerce_product_data_panels', array($this, 'product_swatches_tab_content'));  

        //filter hook
        add_filter('rtwpvs_settings_fields', array(&$this, 'license_tab') ); 
        add_filter('rtwpvs_get_taxonomy_meta_color', array(&$this, 'get_taxonomy_meta_color') );
        add_filter('rtwpvs_custom_tooltip', array(&$this, 'custom_tooltip') );
    }   

    public function product_swatches_tab($original_tabs) {
        $new_tab['rtwpvs-tab'] = array(
            'label'  => __('Product Swatches', 'woo-product-variation-swatches'),
            'target' => 'rtwpvs_tab_options',
            'class'  => array('show_if_variable'),
        );

        $insert_at_position = 6; // This can be changed
        $tabs = array_slice($original_tabs, 0, $insert_at_position, true); // First part of original tabs
        $tabs = array_merge($tabs, $new_tab); // Add new
        $tabs = array_merge($tabs, array_slice($original_tabs, $insert_at_position, null, true)); // Glue the second part of original

        return $tabs;
    }

    public function product_swatches_tab_content() { 
        require_once rtwpvs()->locate_views('product-switches-tab-content'); 
    }

    function license_tab( $default ) {  
        $new = array(  
            'license'         => array(
                'id'     => 'license',
                'title'  => esc_html__('License', 'woo-product-variation-swatches'),
                'desc'   => esc_html__('Add your licence code here', 'woo-product-variation-swatches'),
                'active' => apply_filters('rtwpvs_tools_setting_active', false),
                'fields' => apply_filters('rtwpvs_tools_setting_fields', array(
                    array(
                        'id'    => 'license_key',
                        'type'  => 'text',
                        'title' => esc_html__('Licence key', 'woo-product-variation-swatches'),
                        'desc'  => esc_html__("Enter your licence key here", "woo-product-variation-swatches")
                    )
                ))
            ),
        );  
 
        $extended = array_merge(array_slice($default, 0, 5), $new, array_slice($default, 5)); 
        return apply_filters('rtwpvsp_settings_fields', $extended);  
    }

    function get_taxonomy_meta_color( $default ) {  
        $new = array( 
            array(
                'label'         => esc_html__('Dual Color', 'woo-product-variation-swatches'),
                'trigger_label' => esc_html__('Enable', 'woo-product-variation-swatches'),
                'id'            => 'is_dual_color',
                'type'          => 'checkbox'
            ),
            array(
                'label'      => esc_html__('Secondary Color', 'woo-product-variation-swatches'),
                'desc'       => esc_html__('Add term secondary color', 'woo-product-variation-swatches'),
                'id'         => 'secondary_color',
                'type'       => 'color',
                'dependency' => array(
                    array('#is_dual_color' => array('type' => 'equal', 'value' => 'yes'))
                )
            )
        );  
 
        $extended = array_merge(array_slice($default, 0, 1), $new, array_slice($default, 1)); 
        return apply_filters('rtwpvsp_get_taxonomy_meta_color', $extended);  
    }

    function custom_tooltip( $default ) {  
        $extended = array(
            array(
                'label'   => esc_html__('Show Tooltip', 'woo-product-variation-swatches'),
                'desc'    => esc_html__('Individually show hide tooltip.', 'woo-product-variation-swatches'),
                'id'      => 'rtwpvs_attribute_tooltip',
                'type'    => 'select',
                'options' => apply_filters( 'rtwpvs_tooltip_option', array(
                    'text'  => esc_html__("Text", "woo-product-variation-swatches"), 
                    'image' => esc_html__("Image", "woo-product-variation-swatches"),
                    'no'    => esc_html__("No", "woo-product-variation-swatches")
                ) )
            ),
            array(
                'label' => esc_html__('Tooltip Text', 'woo-product-variation-swatches'),
                'desc'  => esc_html__('By default tooltip text will be the term name.', 'woo-product-variation-swatches'),
                'id'    => 'rtwpvs_attribute_tooltip_text',
                'type'  => 'text',
                'class' => 'rtwpvs-hidden',
            ),
            array(
                'label' => esc_html__('Tooltip Image', 'woo-product-variation-swatches'),
                'desc'  => esc_html__('Choose an image for tooltip.', 'woo-product-variation-swatches'),
                'id'    => 'rtwpvs_attribute_tooltip_image',
                'type'  => 'image',
                'class' => 'rtwpvs-hidden'
            )
        );
        return apply_filters('rtwpvsp_custom_tooltip', $extended);  
    }

} 