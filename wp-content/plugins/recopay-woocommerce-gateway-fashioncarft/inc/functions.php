<?php

if(!function_exists('get_qr_link')){

    function get_qr_link($order) {
 
        $gateway = new WC_Gateway_Recopay();
        $mid = $gateway->mid;
        $amount = $order->get_total();
        $currency = $order->get_currency();
        $currency_symbol = get_woocommerce_currency_symbol($currency);
        $order_id = $order->get_id();

        $url = "https://recopays.com/prod/sb/qr/v1/api/upi/initiate-dynamic-qr";
        $data = [
            "MID" => $mid,
            "amount" => $amount
        ];

        // Use wp_remote_post instead of cURL
        $response = wp_remote_post($url, [
            'method'      => 'POST',
            'body'        => json_encode($data),
            'headers'     => ['Content-Type' => 'application/json'],
            'timeout'     => 45,
            'data_format' => 'body',
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error('Error connecting to the payment gateway.');
            return;
        }

        $response_body = wp_remote_retrieve_body($response);
        $response_data = json_decode($response_body, true);

        if ($response_data && isset($response_data['status']) && $response_data['status'] === 'Success') {
            //$qrLink = $response_data['qr_Link'];
            $qrUPI = $response_data['qr_upi'];
            $refid = $response_data['refid'];
            $upiPhonePe = str_replace("upi://pay?", "phonepe://pay?", $qrUPI);
            $upiGooglePay = str_replace("upi://pay?", "tez://pay?", $qrUPI);
            $upiPayTm = str_replace("upi://pay?", "paytm://pay?", $qrUPI);
            update_post_meta($order_id,'refid',$refid);
            ?>
           
            <div class="recopay-overlay" id="recopay-overlay"></div>
            <div class="recopay-popup">
            <!-- <h2>Your Payment QR Code</h2>
            <div class="qrCodepayment">
                <img src="data:image/png;base64,<?php //echo $qrLink;?>" alt="QR Code" />
            </div> -->
            <h3><?php _e('Select your payment method','recopay');?></h3>

            <div id="recopay-form">
                <div class="amount-pay"><?php echo esc_html($currency_symbol); ?><?php echo esc_html($amount);?></div>
                <div class="recopaypayment-btn-container">
                    <div class="recopay-payment-btn" data-type="gpay">
                        <input type="radio" name="upi_method" value="<?php echo esc_attr($upiGooglePay);?>" class="upiMethod">
                        <div class="app-logo">
                            <img src="<?php echo plugin_dir_url(__DIR__).'icon/googlepay.svg'; ?>" alt="google-pay-app-logo" class="logo">
                        </div>
                        <div class="app-title"><?php esc_html_e( 'Google Pay', 'recopay' ); ?></div>
                    </div>
                    <div class="recopay-payment-btn" data-type="phonepe">
                        <input type="radio" name="upi_method" value="<?php echo esc_attr($upiPhonePe);?>" class="upiMethod">
                        <div class="app-logo">
                            <img src="<?php echo plugin_dir_url(__DIR__).'icon/phonepe.svg'; ?>" alt="phonepe-app-logo" class="logo">
                        </div>
                        <div class="app-title"><?php esc_html_e( 'PhonePe', 'recopay' ); ?></div>
                    </div>
                    <div class="recopay-payment-btn" data-type="paytm">
                        <input type="radio" name="upi_method" value="<?php echo esc_attr($upiPayTm);?>" class="upiMethod">
                        <div class="app-logo">
                            <img src="<?php echo plugin_dir_url(__DIR__).'icon/paytm.svg'; ?>" alt="paytm-app-logo" class="logo">
                        </div>
                        <div class="app-title"><?php esc_html_e( 'Paytm', 'recopay' ); ?></div>
                    </div>
                </div>
                <div class="payBtn">
                    <a href="javascript:void(0)" class="submit-upi">Pay</a>
                </div>

            </div>
            <button class="close-popup">Close</button>
            </div>
            <?php
        }
           
    }
}

if(!function_exists('payment_wait_modal_func')){
    function payment_wait_modal_func(){

        ?>
        <div id="paymentWaitModal" class="payment_modal">
            <div class="modal-content">
                <p class="processing-pay">Processing Payment...</p>
                <p>Please wait while we process your payment.</p>
                <div class="spinner"></div> <!-- Spinner for loading indicator -->
                <p>If this takes too long, please check your payment method or contact support.</p>
                <p style="font-weight: bold; color: red;">Do not refresh the page or press the back button!</p>
            </div>
        </div>
        <?php
        
    }
}


if(!function_exists('send_webhook_request')){

    function send_webhook_request($refid) {

        $url = 'https://zpwebhook.com/v1/Webhook/GetPaymentStatus';
        $body = json_encode(array(
            'refid' => $refid
        ));
        $args = array(
            'method'    => 'POST',
            'body'      => $body,
            'headers'   => array(
                'Content-Type' => 'application/json'
            ),
        );
        $response = wp_remote_post($url, $args);
        if (is_wp_error($response)) {
            return $response->get_error_message();
        } else {

            $response_body = wp_remote_retrieve_body($response);
            return json_decode($response_body, true);
        }
    }

}


// Function to handle the AJAX request
if(!function_exists('get_payment_status')){
    function get_payment_status() {

        check_ajax_referer('recopay', 'nonce');
        $order_key = $_POST['order_key'];

        $order_id = wc_get_order_id_by_order_key($order_key);
        $order = wc_get_order($order_id);

        $refid = get_post_meta($order_id,'refid',true);

        $response = send_webhook_request($refid);

        if (isset($response['txnstatus']) && $response['txnstatus'] == 1) {

            $order->update_status('completed', 'Order completed via Recopay payment gateway.');
            $redirect_url = $order->get_checkout_order_received_url();

            $data = array(
                'success' => true,
                'data' => 'Payment successful',
                'redirect_url' => $redirect_url
            );
        } else {

            $order->update_status('on-hold', 'Payment failed, order on hold.');
            $failure_url = wc_get_cart_url();

            $data = array(
                'success' => false,
                'data' => 'Payment failed',
                'redirect_url' => $failure_url
            );
        }

        wp_send_json($data);
    }
}
add_action('wp_ajax_r_payment_status', 'get_payment_status');
add_action('wp_ajax_nopriv_r_payment_status', 'get_payment_status');

// woocommerce checkout payment override function
function woocommerce_checkout_payment() {
        wp_enqueue_style( 'recopay-popup-style' );
		if ( WC()->cart->needs_payment() ) {
			$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
			WC()->payment_gateways()->set_current_gateway( $available_gateways );
		} else {
			$available_gateways = array();
		}
        $checkout = WC()->checkout();
        $available_gateways = $available_gateways;
        $order_button_text  = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );
        require_once plugin_dir_path(__FILE__) . 'checkout/payment.php';
}
