<?php

require_once RTWPVSP_PATH . 'vendor/autoload.php';
 
use Rtwpvsp\Traits\SingletonTrait;
   
use Rtwpvsp\Controllers\Admin\AdminController;
use Rtwpvsp\Controllers\ShopPage;
use Rtwpvsp\Controllers\Licensing;
use Rtwpvsp\Controllers\FilterHooks;
use Rtwpvsp\Controllers\ActionHooks;

/**
 * Class Rtwpvsp
 */
final class Rtwpvsp {

    use SingletonTrait;  

    /**
     * Review Schema Constructor.
     */
    public function __construct() { 
        $this->define_constants();   

        $this->init_hooks(); 
    } 

    private function init_hooks() {
 
        add_action('plugins_loaded', [$this, 'on_plugins_loaded'], -1);
 
        add_action('init', [$this, 'init'], 1); 
    }

    public function init() {
        do_action('rtwpvsp_before_init');

        $this->load_plugin_textdomain();
        // Load your all dependency hooks
        FilterHooks::getInstance();
        ActionHooks::getInstance();
        new AdminController();  
        new ShopPage(); 
        Licensing::init(); 

        do_action('rtwpvsp_init');
    }

    public function on_plugins_loaded() {
        do_action('rtwpvsp_loaded');
    }

    /**
     * Load Localisation files
     */
    public function load_plugin_textdomain() {
         
        $locale = determine_locale();
        $locale = apply_filters('rtwpvsp_plugin_locale', $locale);
        unload_textdomain('woo-product-variation-swatches-pro');
        load_textdomain('woo-product-variation-swatches-pro', WP_LANG_DIR . '/woo-product-variation-swatches-pro/woo-product-variation-swatches-pro-' . $locale . '.mo');
        load_plugin_textdomain('woo-product-variation-swatches-pro', false, plugin_basename(dirname(RTWPVSP_PLUGIN_FILE)) . '/languages');
    } 
 
    private function define_constants() {

        $this->define('RTWPVSP_URL', plugins_url('', RTWPVSP_PLUGIN_FILE));
        $this->define('RTWPVSP_SLUG', basename(dirname(RTWPVSP_PLUGIN_FILE)));
        $this->define('RTWPVSP_TEMPLATE_DEBUG_MODE', false);
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    public function define($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    /**
     * Get the plugin path.
     *
     * @return string
     */
    public function plugin_path() {
        return untrailingslashit(plugin_dir_path(RTWPVSP_PLUGIN_FILE));
    }

    /**
     * @return mixed
     */
    public function version() {
        return RTWPVSP_VERSION;
    }  

    /**
     * Get the template path.
     *
     * @return string
     */
    public function get_template_path() {
        return apply_filters('rtwpvsp_template_path', 'woo-product-variation-swatches-pro/');
    } 

    /**
     * @param $file
     *
     * @return string
     */
    public function get_assets_uri($file) {
        $file = ltrim($file, '/');

        return trailingslashit(RTWPVSP_URL . '/assets') . $file;
    } 
     
}

/**
 * @return bool|SingletonTrait|Rtwpvsp
 */
function rtwpvsp() { 
    return Rtwpvsp::getInstance();
} 
rtwpvsp(); // Run Rtwpvsp Plugin   

// use at least version 2.0.0 
if ( is_admin() && version_compare(RTWPVS_VERSION, '2.0.0', '<') ) { 

    add_action( 'admin_notices', function() {  
        $class = 'notice notice-error'; 
        $text = esc_html__('Variation Swatches for WooCommerce', 'woo-product-variation-swatches-pro');
        $link = esc_url(
            add_query_arg(
                array(
                    'tab' => 'plugin-information',
                    'plugin' => 'woo-product-variation-swatches',
                    'TB_iframe' => 'true',
                    'width' => '640',
                    'height' => '500',
                ), admin_url('plugin-install.php')
            )
        );
        $link_pro = 'https://www.radiustheme.com/downloads/woocommerce-variation-swatches';

        printf('<div class="%1$s"><p><a target="_blank" href="%3$s"><strong>Variation Swatches for WooCommerce Pro</strong></a> is not working, You need to install and activate <a class="thickbox open-plugin-details-modal" href="%2$s"><strong>%4$s</strong></a> free version <strong>minimum 2.0.0</strong> to get the pro features.</p></div>', $class, $link, $link_pro, $text);
        
    } );
}   