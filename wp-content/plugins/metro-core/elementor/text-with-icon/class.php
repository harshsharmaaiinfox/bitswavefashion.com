<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/text-with-icon/class.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Text_With_Icon extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Icon Text', 'metro-core' );
		$this->rt_base = 'rt-text-with-icon';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => __( 'Style', 'metro-core' ),
				'options' => array(
					'1' => __( 'Style 1', 'metro-core' ),
					'2' => __( 'Style 2', 'metro-core' ),
					'3' => __( 'Style 3', 'metro-core' ),
					'4' => __( 'Style 4', 'metro-core' ),
					'5' => __( 'Style 5', 'metro-core' ),
					'6' => __( 'Style 6', 'metro-core' ),
					'7' => __( 'Style 7', 'metro-core' ),
					'8' => __( 'Style 8', 'metro-core' ),
				),
				'default' => '1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'bgtype',
				'label'   => __( 'Background Type', 'metro-core' ),
				'options' => array(
					'light' => __( 'Light Background', 'metro-core' ),
					'dark'  => __( 'Dark Background', 'metro-core' ),
				),
				'default'   => 'light',
				'condition' => array( 'style' => array( '5' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => __( 'Icon Type', 'metro-core' ),
				'options' => array(
					'icon'  => __( 'Icon', 'metro-core' ),
					'image' => __( 'Custom Image', 'metro-core' ),
				),
				'default' => 'icon',
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => __( 'Icon', 'metro-core' ),
				'default' => 'fa fa-dollar',
				'condition'   => array( 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => __( 'Image', 'metro-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'description' => __( 'Recommended image size is 56x56 px.<br/>You can upload SVG format as well, to get SVG images click here: <a target="_blank" href="https://www.flaticon.com/">flaticon.com</a>', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => __( 'Title', 'metro-core' ),
				'default' => 'Lorem Ipsum', 
				'label_block' => true,
			), 
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'metro-core' ),
				'default' => 'Lorem Ipsum Dolor Amet',
				'label_block' => true,
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => __( 'Link (Optional)', 'metro-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
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
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .rtin-title' => 'color: {{VALUE}}'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color_hover',
				'label'   => __( 'Hover color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .rtin-title:hover' => 'color: {{VALUE}}'),
			),			
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'   => 'title_margin',
				'label'   => __( 'Margin', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rtin-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				)
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .rtin-title',
			),

			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_sub',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Sub title', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .rtin-subtitle' => 'color: {{VALUE}}'),
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'sub_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .rtin-subtitle',
			),
			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Icon', 'metro-core' ),
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