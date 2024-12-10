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

class Split_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Split slider', 'metro-core' );
		$this->rt_base = 'rt-split-slider';
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
				'id'      => 'sec_content',
				'label'   => __( 'Content', 'metro-core' ),
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'subtle',
				'label'   => __( 'Emphasis', 'metro-core' ),
				'label_block' => true, 
				'selectors' => array(
					'{{WRAPPER}} .slider-layout3 .slider-text-content:before' => 'content: "{{VALUE}}";',
				)				
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
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'General', 'metro-core' ),
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'id'   => 'slider_height',
				'mode' => 'responsive',
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 1000,
					),
				),
				'size_units' => array( 'px','%' ),
				'label'   => __( 'Height', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .slider-layout3 .slick-slide img' => 'height:{{SIZE}}{{UNIT}};object-fit:cover;',
				)
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Emphasis', 'metro-core' ),
			),

			array(
				'type' => Controls_Manager::SLIDER,
				'id'   => 'emphasis_top',
				'mode' => 'responsive',
				'range' => array(
					'px' => array(
						'min' => -500,
						'max' => 500,
					),
				),
				'size_units' => array( 'px','%' ),
				'label'   => __( 'Top Spacing', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .slider-text-content:before' => 'top: {{SIZE}}{{UNIT}};',
				)
			),

			array(
				'type' => Controls_Manager::SLIDER,
				'id'   => 'emphasis_left',
				'mode' => 'responsive',
				'range' => array(
					'px' => array(
						'min' => -500,
						'max' => 500,
					),
				),
				'size_units' => array( 'px','%' ),
				'label'   => __( 'Left Spacing', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .slider-text-content:before' => 'left: {{SIZE}}{{UNIT}};',
				)
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'emphasis_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .slider-text-content:before',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'emphasis_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .slider-text-content:before' => 'color: {{VALUE}}'),
			),

			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_pretitle',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Pre title', 'metro-core' ),
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'pretitle_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .item-subtitle',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'pretitle_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .item-subtitle' => 'color: {{VALUE}}'),
			),

			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Title', 'metro-core' ),
			),

			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'   => 'title_margin',
				'label'   => __( 'Margin', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				)
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .item-title',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .item-title' => 'color: {{VALUE}}'),
			),	

			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_description',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Description', 'metro-core' ),
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'desc_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .slider-layout3 .description',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'desc_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .slider-layout3 .description' => 'color: {{VALUE}}'),
			),

			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Button', 'metro-core' ),
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'btn_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .item-btn a',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_color',
				'label'   => __( 'Theme color', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .slider-layout3 .item-btn a' => 'color: {{VALUE}};border-color:{{VALUE}};',
					'{{WRAPPER}} .slider-layout3 .item-btn a:hover' => 'background: {{VALUE}};color:#fff;border-color:{{VALUE}};',
				),
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