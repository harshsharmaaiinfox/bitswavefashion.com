<?php

if (class_exists('WC_Payment_Gateway')) {

    class WC_Gateway_Recopay extends WC_Payment_Gateway {

        public $mid;
        protected $default_status;

        public function __construct() {
            $this->id = 'recopay';
            $this->icon = ''; // URL to the icon that will be displayed on checkout page near your gateway name
            $this->has_fields = true;
            $this->method_title = 'Recopay UPI Gateway';
            $this->method_description = 'Custom UPI-based payment gateway for WooCommerce';

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user settings
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->mid = $this->get_option('mid');
            $this->default_status = apply_filters( 'recopay_process_payment_order_status', 'pending' );

            // Save settings
            add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts' ) );
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'generate_qr_code' ), 4, 1 );
        }

        public function init_form_fields(){
            $this->form_fields = array(
                'enabled' => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Enable Recopay Gateway',
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'no'
                ),
                'title' => array(
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'Title for the payment method displayed to the customer during checkout.',
                    'default'     => 'UPI QR Payment',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'Description displayed during checkout.',
                    'default'     => 'Pay securely using UPI QR code',
                ),
                'mid' => array(
                    'title'       => 'Merchant ID (MID)',
                    'type'        => 'text',
                    'description' => 'Enter your unique Merchant ID provided by Recopay.',
                    'default'     => '',
                    'desc_tip'    => true,
                ),
            );
        }
        
        /**
         * Custom CSS and JS
         */
        public function payment_scripts() {

            if ( 'no' === $this->enabled ) {
                return;
            }

            wp_register_style(
                'recopay-popup-style',
                plugin_dir_url(__DIR__) . 'css/recopay-popup.css',
                array(),
                date('ymdhis') // Add WP version for cache busting
            );
            
            wp_register_script(
                'recopay-popup',
                plugin_dir_url(__DIR__) . 'js/recopay-popup.js',
                array('jquery'),
                date('ymdhis'), // Add WP version for cache busting
                true
            );

            $order_id = get_query_var( 'order-pay' );

            if ( ! $order_id ) {
                return;
            }

            $order = wc_get_order( $order_id );

            if ( ! is_a( $order, 'WC_Order' ) ) {
                return;
            }

            $total = apply_filters( 'recopay_order_total_amount', $order->get_total(), $order );

            wp_localize_script( 'recopay-popup', 'recopay_vars',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'order_id'          => $order->get_id(),
                    'order_amount'      => $total,
                    'order_key'         => $order->get_order_key(),
                    'order_number'      => htmlentities( $order->get_order_number() ),
                    'confirm_message'   => 'Please ensure that the amount has been deducted from your account before clicking "Confirm". We will manually verify your transaction once submitted.',
                    'callback_url'      => add_query_arg( array( 'wc-api' => 'recopay-payment' ), trailingslashit( get_home_url() ) ),
                    'payment_url'       => $order->get_checkout_payment_url(),
                    'cancel_url'        => apply_filters( 'recopay_payment_cancel_url', wc_get_checkout_url(), $this->get_return_url( $order ), $order ),
                    'btn_timer'         => apply_filters( 'recopay_enable_button_timer', true ),
                    'btn_show_interval' => apply_filters( 'recopay_button_show_interval', 30000 ),
                    'is_mobile'         => ( wp_is_mobile() ) ? 'yes' : 'no',
                    'nonce'             => wp_create_nonce( 'recopay' ),

                )
            );
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            
            if($order){
                $order->add_order_note('QR code generated. Awaiting payment.');
                $order->update_status( $this->default_status );
        
                return [
                    'result' => 'success',
                    'redirect' => $order->get_checkout_payment_url( true ),
                ];

            } else {
                wc_add_notice('Payment failed. Please try again.', 'error');
                return ['result' => 'failure'];
            }
        }

        public function generate_qr_code( $order_id ) {

            $order = wc_get_order( $order_id );
            if($order) {

                wp_enqueue_style( 'recopay-popup-style' );
                wp_enqueue_script( 'recopay-popup' );
        
                $hide_mobile_qr = ( wp_is_mobile() && $this->qrcode_mobile === 'no' );

                if ( 'yes' === $this->enabled && $order->needs_payment() === true && $order->has_status( $this->default_status ) ) { ?>
                    <section class="recopay-section">
                        <div class="recopay-info">
                            <h6 class="recopay-waiting-text"><?php esc_html_e( 'Please wait and don\'t press back or refresh this page while we are processing your payment.', 'upi-qr-code-payment-for-woocommerce' ); ?></h6>
                            <?php do_action( 'recopay_after_before_title', $order ); ?>
                            <div class="recopay-buttons">
                                <button id="recopay-confirm-payment" class="btn button"><?php echo esc_html( apply_filters( 'recopay_payment_button_text', 'Pay Now' ) ); ?></button>
                                <?php if ( apply_filters( 'recopay_show_cancel_button', true ) ) { ?>
                                    <button id="recopay-cancel-payment" class="btn button"><?php esc_html_e( 'Cancel', 'upi-qr-code-payment-for-woocommerce' ); ?></button>
                                <?php } ?>
                            </div>
                            <?php do_action( 'recopay_after_payment_buttons', $order ); ?>
                            <div id="recopay-payment-success-container" style="display: none;"></div>
                        </div>
                        <?php
                        echo get_qr_link($order);
                        echo payment_wait_modal_func();
                        ?>
                        
                    </section>
                    <?php
                }
            }
        }
            
    }
}