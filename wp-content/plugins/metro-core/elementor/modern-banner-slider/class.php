<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/text-with-button/class.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Modern_Banner_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Modern Banner Slider', 'metro-core' );
		$this->rt_base = 'rt-modern-banner-slider';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label'   => __( 'Title Text', 'metro-core' ),
                'label_block' => true,
				'default' => 'WoMen’s',
            ]
        );

		$repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label'   => __( 'Title Text', 'metro-core' ),
                'label_block' => true,
				'default' => 'Collection 2020',
            ]
        );

		$repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label'   => __( 'Content', 'metro-core' ),
                'label_block' => true,
				'default' => 'Stylist modern Wireless Keyboard With Stunning Desig Ultra Slim Stunning Design & Ultra Slim Design.',
            ]
        );

		$repeater->add_control(
            'price_label',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => __( 'Price Label', 'metro-core' ),
				'default' => 'Only',
				'condition'   => array( 'style' => array( '2' ) ),
            ]
        );

		$repeater->add_control(
            'symbol',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => __( 'Price symbol', 'metro-core' ),
				'default' => '$',
            ]
        );

		$repeater->add_control(
            'price',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => __( 'Price', 'metro-core' ),
				'default' => '$299',
            ]
        );

		$repeater->add_control(
            'linktext',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => __( 'Link Text', 'metro-core' ),
				'default' => 'Lorem Ipsum',
            ]
        );

		$repeater->add_control(
            'bgimg',
            [
                'type' => Controls_Manager::MEDIA,
				'label'   => __( 'Slider Image', 'metro-core' ),
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
            ]
        );

		$repeater->add_control(
            'slidernav',
            [
                'type' => Controls_Manager::MEDIA,
				'label'   => __( 'Slider Nav Image', 'metro-core' ),
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
            ]
        );
		
		$fields1 = array(
			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'metro-core' ),
			),
			array(
				'type'        => Controls_Manager::SELECT2,
				'id'          => 'style',
				'label'       => __( 'Product Style', 'metro-core' ),
				'options'     => array(
					'1' => __( 'Style 1', 'metro-core' ),
					'2' => __( 'Style 2', 'metro-core' ),				
				),
				'default' => '1',
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'mode' => 'responsive',
				'id'   => 'height',
				'size_units' => array( 'px' ),
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 1000,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => 500,
				),
				'label'   => __( 'Height', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .slider-layout2' => 'height: {{SIZE}}{{UNIT}};',
				)
			),
			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Slider images', 'metro-core' ),
				'fields'  => $repeater->get_controls(),
			),

		);

		$social = new \Elementor\Repeater();

		$social->add_control(
            'share_url',
            [
                'type' => Controls_Manager::URL,
				'label'   => __( 'Link', 'metro-core' ),
				'placeholder' => 'https://your-link.com',
            ]
        );

		$social->add_control(
            'share_icon',
            [
                'type' => Controls_Manager::ICONS,
				'label'   => __( 'Icon', 'metro-core' ),
            ]
        );

		$fields2 = array(
			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'shares',
				'label'   => __( 'Add as many Icons as you want', 'metro-core' ),
				'condition'   => array( 'style' => array( '1' ) ),
				'fields'  => $social->get_controls(),
			),

			array(
				'mode' => 'section_end',
			),

		);

		$fields3 = array(

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_option',
				'label'   => __( 'Slider Option', 'metro-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => __( 'Navigation Arrow', 'metro-core' ),
				'label_on'    => __( 'On', 'metro-core' ),
				'label_off'   => __( 'Off', 'metro-core' ),
				'default'     => 'yes',
				'description' => __( 'Enable or disable navigation arrow. Default: On', 'metro-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_paginginfo',
				'label'       => __( 'Paginginfo Navigation', 'metro-core' ),
				'label_on'    => __( 'On', 'metro-core' ),
				'label_off'   => __( 'Off', 'metro-core' ),
				'default'     => '',
				'description' => __( 'Enable or disable navigation paginginfo. Default: Off', 'metro-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => __( 'Autoplay', 'metro-core' ),
				'label_on'    => __( 'On', 'metro-core' ),
				'label_off'   => __( 'Off', 'metro-core' ),
				'default'     => 'yes',
				'description' => __( 'Enable or disable autoplay. Default: On', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => __( 'Autoplay Slide Speed', 'metro-core' ),
				'default' => 3000,
				'description' => __( 'Slide speed in milliseconds. Default: 200', 'metro-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'mode' => 'section_end',
			),

		);

		$fields = array_merge( $fields1, $fields2, $fields3 );

		return $fields;
	}

	private function rt_load_scripts(){
		wp_enqueue_style(  'slick' );
		wp_enqueue_style(  'slick-theme' );
		wp_enqueue_script( 'slick' );			
		
	}
	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();
		if ( $data['style'] == '1' ) { 
			$template = 'view-1';		
		}else {
			$template = 'view-2';
		}		

		return $this->rt_template( $template, $data );
	}
}