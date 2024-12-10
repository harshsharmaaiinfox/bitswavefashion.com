<?php
/**
 * Plugin Name: Recopay WooCommerce Gateway
 * Description: Custom payment gateway to process UPI QR code payments via Recopay.
 * Version: 1.0
 * Author: Your Name
 */

if(!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
    return;



add_action('plugins_loaded', 'recopay_init_gateway_class');

function recopay_init_gateway_class() {
    if ( class_exists( 'WC_Payment_Gateway' ) ) {
        require_once plugin_dir_path(__FILE__) . 'inc/wc_gateway_recopay.php';
    }
    
}

add_filter('woocommerce_payment_gateways', 'add_recopay_gateway_class');
function add_recopay_gateway_class($methods) {
    $methods[] = 'WC_Gateway_Recopay';
    return $methods;
}

require_once plugin_dir_path(__FILE__) . 'inc/functions.php';
