<?php
/*
Plugin Name: Showcase Payment Options (icons)
License: GPLv2 https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Description: Show your webshops payment options (icons) via shortcode.
Version: 1.4.0
Author: KNEET
Author URI: https://kneet.be/
*/

if (!defined('ABSPATH')) {
    exit;
}

function spopm_plugin_menu() {
    add_menu_page(
        'Payment Icons Settings',
        'Payment Icons',
        'manage_options',
        'spopm-payment-icons-plugin',
        'spopm_plugin_settings_page',
        'dashicons-money-alt'
    );
}
add_action('admin_menu', 'spopm_plugin_menu');

function spopm_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h2>Payment Icons Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields('spopm-payment-icons-plugin');
            do_settings_sections('spopm-payment-icons-plugin');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function spopm_plugin_settings_init() {
    register_setting('spopm-payment-icons-plugin', 'spopm_plugin_settings');

    add_settings_section(
        'spopm_plugin_main_section',
        'General Settings',
        'spopm_plugin_section_cb',
        'spopm-payment-icons-plugin'
    );

    add_settings_section(
        'spopm_plugin_icon_size_section',
        'Icon Size Settings',
        'spopm_plugin_icon_size_section_cb',
        'spopm-payment-icons-plugin'
    );

    add_settings_field(
        'icon_size',
        'Icon size',
        'spopm_plugin_field_icon_size_cb',
        'spopm-payment-icons-plugin',
        'spopm_plugin_icon_size_section',
        [
            'label_for' => 'icon_size',
            'type' => 'number',
            'name' => 'icon_size',
            'value' => '65',
            'min' => '10',
            'max' => '512',
            'description' => 'Set the size of the payment icons in pixels.',
        ]
    );

    add_settings_field(
        'icon_spacing',
        'Icon spacing',
        'spopm_plugin_field_icon_size_cb',
        'spopm-payment-icons-plugin',
        'spopm_plugin_icon_size_section',
        [
            'label_for' => 'icon_spacing',
            'type' => 'number',
            'name' => 'icon_spacing',
            'value' => '5',
            'min' => '0',
            'max' => '25',
            'description' => 'Set the horizontal space between the icons in pixels.',
        ]
    );
	
	add_settings_field(
        'icon_order',
        'Icon order',
        'spopm_plugin_field_icon_order_cb',
        'spopm-payment-icons-plugin',
        'spopm_plugin_icon_size_section',
        [
            'label_for' => 'icon_order',
            'type' => 'text',
            'name' => 'icon_order',
            'value' => '',
            'description' => 'Specify the order of the icons separated by commas (e.g., paypal,alipay,american_express). Use the values next to key for each payment method. Leave empty for default (alphabetical) order.',
        ]
    );

    add_settings_section(
        'spopm_plugin_section_column1',
        'Rectangle icons',
        'spopm_plugin_section_column1_cb',
        'spopm-payment-icons-plugin'
    );

    add_settings_section(
        'spopm_plugin_section_column2',
        'Square icons',
        'spopm_plugin_section_column2_cb',
        'spopm-payment-icons-plugin'
    );

$payment_methods_column1 = [
    'afterpay' => 'Afterpay',
    'alipay' => 'AliPay',
    'alma' => 'Alma',
    'american_express' => 'American Express',
    'apple_pay' => 'Apple Pay',
    'bancontact' => 'Bancontact',
    'benefit' => 'Benefit',
    'belfius' => 'Belfius',
    'blik' => 'blik',
    'bitcoin' => 'Bitcoin',
    'cartes_bancaires' => 'Cartes Bancaires',
    'cash_app' => 'Cash App',
    'clearpay' => 'Clearpay',
    'discover' => 'Discover',
    'elo' => 'Elo',
    'eps' => 'EPS',
    'giftcard' => 'Giftcard',
    'giropay' => 'Giropay',
    'google_pay' => 'Google Pay',
    'grabpay' => 'Grabpay',
    'ideal' => 'iDEAL',
    'ing' => 'ING',
    'klarna' => 'Klarna',
    'kbc' => 'KBC',
    'knet' => 'Knet',
    'maestro' => 'Maestro',
    'mastercard' => 'Mastercard',
    'mbway' => 'MBway',
    'mercado_pago' => 'Mercado Pago',
    'mobilepay' => 'MobilePay',
    'multibanco' => 'Multibanco',
    'oxxo' => 'Oxxo',
    'paypal' => 'PayPal',
    'paylib' => 'Paylib',
    'pix' => 'Pix',
    'prezelewy24' => 'Prezelewy24',
    'sepa' => 'SEPA',
    'skrill' => 'Skrill',
    'sofort' => 'Sofort',
    'stripe' => 'Stripe',
    'square' => 'Square',
    'unionpay' => 'UnionPay',
    'visa' => 'Visa',
    'wechat_pay' => 'WeChat Pay',
];



    $payment_methods_column2 = [
    'afterpay2' => 'Afterpay',
    'alipay2' => 'Alma',
    'alma2' => 'Alma',
    'amazon_pay2' => 'Amazon Pay',
    'american_express2' => 'American Express',
    'apple_pay2' => 'Apple Pay',
    'bacs2' => 'BACS',
    'bancomat_pay' => 'Bancomat Pay',
    'bancontact2' => 'Bancontact',
    'belfius2' => 'Belfius',
    'billie2' => 'Billie',
    'blik2' => 'blik',
    'cartes_bancaires2' => 'Cartes Bancaires',
    'eps2' => 'EPS',
    'giropay2' => 'Giropay',
    'google_pay2' => 'Google Pay',
    'ideal_in_3_2' => 'iDEAL in 3',
    'kbc2' => 'KBC',
    'klarna2' => 'Klarna (K)',
    'klarna2_1' => 'Klarna (Klarna)',
    'maestro2' => 'Maestro',
    'mastercard2' => 'Mastercard',
    'mercado_pago2' => 'Mercado Pago',
    'paypal2' => 'PayPal',
    'paysafecard2' => 'Paysafecard',
    'payu2' => 'PayU',
    'postepay2' => 'PostePay',
    'przelewy24' => 'Prezelewy24',
    'riverty2' => 'Riverty',
    'sepa2' => 'SEPA (blue)',
    'sepa3' => 'SEPA (white)',
    'stripe2' => 'Stripe',
    'square2' => 'Square',
    'twint2' => 'Twint',
    'visa2' => 'Visa',
];

foreach ($payment_methods_column1 as $id => $label) {
        add_settings_field(
            "{$id}_enabled",
            $label,
            'spopm_plugin_field_cb',
            'spopm-payment-icons-plugin',
            'spopm_plugin_section_column1',
            [
                'label_for' => "{$id}_enabled",
                'type' => 'checkbox',
                'name' => "{$id}_enabled",
                'value' => '1',
                'description' => "{$label} - key: {$id}",
            ]
        );
    }

    foreach ($payment_methods_column2 as $id => $label) {
        add_settings_field(
            "{$id}_enabled",
            $label,
            'spopm_plugin_field_cb',
            'spopm-payment-icons-plugin',
            'spopm_plugin_section_column2',
            [
                'label_for' => "{$id}_enabled",
                'type' => 'checkbox',
                'name' => "{$id}_enabled",
                'value' => '1',
                'description' => "{$label} - key: {$id}",
            ]
        );
    }
}
add_action('admin_init', 'spopm_plugin_settings_init');

function spopm_plugin_section_cb() {
    echo '<p>Select the payment methods you want to display. Use the shortcode <code>[spopm_PM]</code> to display them on your site.</p>';
    echo '<div style="background-color: #f7f7f7; padding: 10px; border-left: 4px solid #0073aa; margin: 20px 0; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
        <p><strong>Note:</strong> Please remember to clear your cache when making changes to ensure that the latest icons are displayed correctly.</p>
    </div>';
}

function spopm_plugin_section_column1_cb() {
    echo '<p>Select the payment methods you want to display. Use the values next to "key:" for each payment method inside the "icon order" field if you want to change the order. If you leave this empty the icons will show up in alphabetical order.</p>';
}

function spopm_plugin_section_column2_cb() {
    echo '<p>Select the payment methods you want to display. Use the values next to "key:" for each payment method inside the "icon order" field if you want to change the order. If you leave this empty the icons will show up in alphabetical order.</p>';
}

function spopm_plugin_icon_size_section_cb() {
    echo '<p>Adjust the display size of the payment icons and the space between them.</p>';
}


function spopm_plugin_field_icon_size_cb($args) {
    $options = get_option('spopm_plugin_settings');
    $value = isset($options[$args['name']]) ? $options[$args['name']] : $args['value'];
    ?>
    <input type="<?php echo esc_attr($args['type']); ?>" id="<?php echo esc_attr($args['label_for']); ?>" name="spopm_plugin_settings[<?php echo esc_attr($args['name']); ?>]" value="<?php echo esc_attr($value); ?>" min="<?php echo esc_attr($args['min']); ?>" max="<?php echo esc_attr($args['max']); ?>" class="spopm-icon-size-input">
    <label for="<?php echo esc_attr($args['label_for']); ?>"><?php echo esc_html($args['description']); ?></label>
    <?php
}

function spopm_plugin_field_cb($args) {
    $options = get_option('spopm_plugin_settings');
    ?>
    <input type="<?php echo esc_attr($args['type']); ?>" id="<?php echo esc_attr($args['label_for']); ?>" name="spopm_plugin_settings[<?php echo esc_attr($args['name']); ?>]" value="<?php echo esc_attr($args['value']); ?>" <?php checked(isset($options[$args['name']]), $args['value']); ?>>
    <label for="<?php echo esc_attr($args['label_for']); ?>"><?php echo esc_html($args['description']); ?></label>
    <?php
}

function spopm_plugin_field_icon_order_cb($args) {
    $options = get_option('spopm_plugin_settings');
    $value = isset($options[$args['name']]) ? $options[$args['name']] : $args['value'];
    ?>
    <input type="<?php echo esc_attr($args['type']); ?>" id="<?php echo esc_attr($args['label_for']); ?>" name="spopm_plugin_settings[<?php echo esc_attr($args['name']); ?>]" value="<?php echo esc_attr($value); ?>" class="spopm-icon-order-input" style="width: 600px;">
    <p class="description"><?php echo esc_html($args['description']); ?></p>
    <?php
}


function spopm_plugin_enqueue_scripts() {
    wp_enqueue_script(
        'spopm-payment-icons-plugin-js',
        plugin_dir_url(__FILE__) . 'js/spopm-payment-icons-plugin.js',
        [],
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'spopm_plugin_enqueue_scripts');

function spopm_plugin_shortcode() {
    $options = get_option('spopm_plugin_settings');
    $icon_size = isset($options['icon_size']) ? $options['icon_size'] : 65;
    $icon_spacing = isset($options['icon_spacing']) ? $options['icon_spacing'] : 5;
    $icon_order = isset($options['icon_order']) && !empty($options['icon_order']) ? explode(',', $options['icon_order']) : [];
    $output = '<div class="payment-icons">';

    if (!empty($icon_order)) {
        // Als er een aangepaste volgorde is, gebruik deze om de iconen te tonen
        foreach ($icon_order as $icon_name) {
            $icon_name_trimmed = str_replace('-', '_', trim($icon_name));
            $icon_key = $icon_name_trimmed . '_enabled';
            if (isset($options[$icon_key]) && $options[$icon_key]) {
                $output .= '<img src="' . plugin_dir_url(__FILE__) . 'icons/' . $icon_name_trimmed . '.png" alt="' . ucfirst($icon_name_trimmed) . '" style="width: ' . esc_attr($icon_size) . 'px; height: ' . esc_attr($icon_size) . 'px; margin-right: ' . esc_attr($icon_spacing) . 'px;">';
            }
        }
    } else {
        // Geen aangepaste volgorde gespecificeerd, toon alle geactiveerde iconen
        foreach ($options as $key => $value) {
            if (!empty($value) && strpos($key, '_enabled') !== false) {
                $icon_name = str_replace('_enabled', '', $key);
                $output .= '<img src="' . plugin_dir_url(__FILE__) . 'icons/' . $icon_name . '.png" alt="' . ucfirst($icon_name) . '" style="width: ' . esc_attr($icon_size) . 'px; height: ' . esc_attr($icon_size) . 'px; margin-right: ' . esc_attr($icon_spacing) . 'px;">';
            }
        }
    }

    $output .= '</div>';
    return $output;
}


add_shortcode('spopm_PM', 'spopm_plugin_shortcode');

function spopm_plugin_admin_styles($hook) {
    if ('toplevel_page_spopm-payment-icons-plugin' !== $hook) {
        return;
    }
    wp_enqueue_style(
        'spopm-payment-icons-plugin-admin',
        plugin_dir_url(__FILE__) . 'css/admin-style.css',
        [],
        '1.0.1'
    );
}
add_action('admin_enqueue_scripts', 'spopm_plugin_admin_styles');
