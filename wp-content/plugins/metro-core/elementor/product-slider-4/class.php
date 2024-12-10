<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/accordion/class.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
if ( ! defined( 'ABSPATH' ) ) exit;

class Product_Slider_4 extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Product slider 4', 'metro-core' );
		$this->rt_base = 'rt-product-slider-4';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'pre',
            [
                'type' => Controls_Manager::TEXT,
                'label'   => __( 'Pre title', 'metro-core' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label'   => __( 'Title', 'metro-core' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label'   => __( 'Description', 'metro-core' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'button',
            [
                'type' => Controls_Manager::TEXT,
                'label'   => __( 'Button label', 'metro-core' ),
                'label_block' => true,
            ]
        );		

		$repeater->add_control(
            'button_url',
            [
                'type' => Controls_Manager::TEXT,
                'label'   => __( 'Button url', 'metro-core' ),
                'label_block' => true,
            ]
        );	

		$repeater->add_control(
            'img',
            [
                'type' => Controls_Manager::MEDIA,
				'label'   => __( 'Image', 'metro-core' ),
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
            ]
        );

		$fields = array(

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'Content', 'metro-core' ),
			),

			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'fields'  => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'view';

		return $this->rt_template( $template, $data );
	}
}