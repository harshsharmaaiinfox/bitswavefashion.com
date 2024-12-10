<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\Metro;

class TGM_Config {

	public $prefix;
	public $path;

	public function __construct() {
		$this->prefix = Constants::$theme_prefix;
		$this->path   = Constants::$theme_plugins_dir;

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	public function register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'     => 'Metro Core',
				'slug'     => 'metro-core',
				'source'   => 'metro-core.zip',
				'required' => true,
				'version'  => '1.7.11'
			],
			[
				'name'     => 'RT Framework',
				'slug'     => 'rt-framework',
				'source'   => 'rt-framework.zip',
				'required' => true,
				'version'  => '2.11'
			],
			[
				'name'     => 'RT Demo Importer',
				'slug'     => 'rt-demo-importer',
				'source'   => 'rt-demo-importer.zip',
				'required' => false,
				'version'  => '5.0.0'
			],
			[
				'name'     => 'LayerSlider WP',
				'slug'     => 'LayerSlider',
				'source'   => 'LayerSlider.zip',
				'required' => false,
				'version'  => '7.11.1'

			],
			[
				'name'     => 'Variation Swatches for WooCommerce Pro',
				'slug'     => 'woo-product-variation-swatches-pro',
				'source'   => 'woo-product-variation-swatches-pro.zip',
				'required' => false,
				'version'  => '2.2.5'
			],
			[
				'name'     => 'Variation Images Gallery for WooCommerce Pro',
				'slug'     => 'woo-product-variation-gallery-pro',
				'source'   => 'woo-product-variation-gallery-pro.zip',
				'required' => false,
				'version'  => '2.3.9'
			],
			[
				'name'         => 'WP SEO Structured Data Schema Pro',
				'slug'         => 'wp-seo-structured-data-schema-pro',
				'source'       => 'wp-seo-structured-data-schema-pro.zip',
				'required'     => false,
				'external_url' => 'https://wpsemplugins.com/',
				'version'      => '1.4.9'
			],
			// Repository
			[
				'name'     => 'Redux Framework',
				'slug'     => 'redux-framework',
				'required' => true,
			],
			[
				'name'     => 'Elementor Page Builder',
				'slug'     => 'elementor',
				'required' => true,
			],
			[
				'name'     => 'ShopBuilder – Elementor WooCommerce Builder Addons',
				'slug'     => 'shopbuilder',
				'required' => false,
			],
			[
				'name'     => 'Variation Images Gallery for WooCommerce',
				'slug'     => 'woo-product-variation-gallery',
				'required' => false,
			],
			[
				'name'     => 'Variation Swatches for WooCommerce',
				'slug'     => 'woo-product-variation-swatches',
				'required' => false,
			],
			[
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7',
				'required' => false,
			],
//			[
//				'name'     => 'Contact Form 7 Extension For Mailchimp',
//				'slug'     => 'contact-form-7-mailchimp-extension',
//				'required' => false,
//			],
			[
				'name'     => 'Smash Balloon Instagram Feed',
				'slug'     => 'instagram-feed',
				'required' => false,
			],
			[
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce',
				'required' => false,
			],
			/*[
				'name'     => 'YITH WooCommerce Quick View',
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false,
			],
			[
				'name'     => 'YITH WooCommerce Wishlist',
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			],*/
			[
				'name'     => 'HubSpot – CRM, Email Marketing, Live Chat, Forms & Analytics',
				'slug'     => 'leadin',
				'required' => false,
			],
		];

		$config = [
			'id'           => $this->prefix,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prefix . '-install-plugins', // Menu slug.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		];

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;
