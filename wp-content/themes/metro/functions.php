<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1300;
}

class Metro_Main {

	public $theme = 'metro';
	public $action = 'metro_theme_init';

	public function __construct() {

		add_action( 'after_setup_theme', [ $this, 'load_textdomain' ] );
		add_action( 'admin_notices', [ $this, 'plugin_update_notices' ] );
		$this->includes();
	}

	public function load_textdomain() {

		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}

	public function pre_insert_post( $post, \WP_REST_Request $request ) {

		$body = $request->get_body();
		if ( $body ) {
			$body = json_decode( $body );
			if ( isset( $body->menu_order ) ) {
				$post->menu_order = $body->menu_order;
			}
		}

		return $post;
	}

	public function includes() {
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/traits/init.php';
		require_once get_template_directory() . '/inc/helper.php';
		require_once get_template_directory() . '/inc/includes.php';
		require_once get_template_directory() . '/inc/lc-helper.php';
		require_once get_template_directory() . '/inc/lc-utility.php';
		do_action( $this->action );
	}

	public function plugin_update_notices() {

		$plugins = [];

		if ( defined( 'METRO_CORE' ) ) {
			if ( version_compare( METRO_CORE, '1.2', '<' ) ) {
				$plugins[] = 'Metro Core';
			}
		}

		foreach ( $plugins as $plugin ) {
			$notice = '<div class="error"><p>' . sprintf( __( "Please update plugin <b><i>%s</b></i> to the latest version otherwise some functionalities will not work properly. You can update it from <a href='%s'>here</a>", 'metro' ), $plugin, menu_page_url( 'classima-install-plugins', false ) ) . '</p></div>';
			echo wp_kses_post( $notice );
		}
	}
}


// Ensure WooCommerce is active before running these customizations
if (class_exists('WooCommerce')) {

    // Enqueue JavaScript for restricting special characters, numbers, and limiting input lengths
    add_action('wp_footer', 'restrict_special_characters_and_limit_input');
    function restrict_special_characters_and_limit_input() {
        if (is_checkout()) { // Only load the script on the WooCommerce checkout page
            ?>
            <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Restrict special characters in name fields (First Name and Last Name)
                const nameFields = ['#billing_first_name', '#billing_last_name'];
                nameFields.forEach(function (selector) {
                    const field = document.querySelector(selector);
                    if (field) {
                        field.addEventListener('input', function () {
                            const value = this.value;
                            // Allow only letters and spaces
                            const sanitizedValue = value.replace(/[^a-zA-Z\s]/g, '');
                            if (value !== sanitizedValue) {
                                this.value = sanitizedValue;
                            }
                        });
                    }
                });

                // Restrict special characters in Street Address fields
                const addressFields = ['#billing_address_1', '#billing_address_2'];
                addressFields.forEach(function (selector) {
                    const field = document.querySelector(selector);
                    if (field) {
                        field.addEventListener('input', function () {
                            const value = this.value;
                            // Allow only letters, numbers, and spaces
                            const sanitizedValue = value.replace(/[^a-zA-Z0-9\s]/g, '');
                            if (value !== sanitizedValue) {
                                this.value = sanitizedValue;
                            }
                        });
                    }
                });

                // Restrict special characters in Town/City field
                const townCityField = document.querySelector('#billing_city');
                if (townCityField) {
                    townCityField.addEventListener('input', function () {
                        const value = this.value;
                        // Allow only letters and spaces
                        const sanitizedValue = value.replace(/[^a-zA-Z\s]/g, '');
                        if (value !== sanitizedValue) {
                            this.value = sanitizedValue;
                        }
                    });
                }

                // Restrict length for Pincode (6 characters max)
                const pincodeField = document.querySelector('#billing_postcode');
                if (pincodeField) {
                    pincodeField.addEventListener('input', function () {
                        const value = this.value;
                        // Allow only numeric values and limit to 6 characters
                        const sanitizedValue = value.replace(/[^0-9]/g, '').slice(0, 6);
                        if (value !== sanitizedValue) {
                            this.value = sanitizedValue;
                        }
                    });
                }

                // Restrict length for Phone Number (10 characters max)
                const phoneField = document.querySelector('#billing_phone');
                if (phoneField) {
                    phoneField.addEventListener('input', function () {
                        const value = this.value;
                        // Allow only numeric values and limit to 10 characters
                        const sanitizedValue = value.replace(/[^0-9]/g, '').slice(0, 10);
                        if (value !== sanitizedValue) {
                            this.value = sanitizedValue;
                        }
                    });
                }
            });
            </script>
            <?php
        }
    }

    // Server-side validation for Name, Address, Town/City, Pincode, and Phone Number fields
    add_action('woocommerce_checkout_process', 'validate_checkout_fields');
    function validate_checkout_fields() {
        // Validate First Name
        if (isset($_POST['billing_first_name']) && preg_match('/[^a-zA-Z\s]/', $_POST['billing_first_name'])) {
            wc_add_notice(__('First Name cannot contain special characters or numbers.', 'woocommerce'), 'error');
        }

        // Validate Last Name
        if (isset($_POST['billing_last_name']) && preg_match('/[^a-zA-Z\s]/', $_POST['billing_last_name'])) {
            wc_add_notice(__('Last Name cannot contain special characters or numbers.', 'woocommerce'), 'error');
        }

        // Validate Street Address 1
        if (isset($_POST['billing_address_1']) && preg_match('/[^a-zA-Z0-9\s]/', $_POST['billing_address_1'])) {
            wc_add_notice(__('Street Address 1 cannot contain special characters.', 'woocommerce'), 'error');
        }

        // Validate Street Address 2
        if (isset($_POST['billing_address_2']) && preg_match('/[^a-zA-Z0-9\s]/', $_POST['billing_address_2'])) {
            wc_add_notice(__('Street Address 2 cannot contain special characters.', 'woocommerce'), 'error');
        }

        // Validate Town/City
        if (isset($_POST['billing_city']) && preg_match('/[^a-zA-Z\s]/', $_POST['billing_city'])) {
            wc_add_notice(__('Town/City cannot contain special characters.', 'woocommerce'), 'error');
        }

        // Validate Pincode
        if (isset($_POST['billing_postcode']) && (!is_numeric($_POST['billing_postcode']) || strlen($_POST['billing_postcode']) !== 6)) {
            wc_add_notice(__('Pincode must be exactly 6 numeric characters.', 'woocommerce'), 'error');
        }

        // Validate Phone Number
        if (isset($_POST['billing_phone']) && (!is_numeric($_POST['billing_phone']) || strlen($_POST['billing_phone']) !== 10)) {
            wc_add_notice(__('Phone Number must be exactly 10 numeric characters.', 'woocommerce'), 'error');
        }
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_checkout_script');

function enqueue_custom_checkout_script() {
    if (is_checkout()) {
        wp_enqueue_script('custom-checkout', get_template_directory_uri() . '/js/custom-checkout.js', array('jquery'), '1.0', true);
    }
}



new Metro_Main;