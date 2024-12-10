<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/info-box/class.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Banner_Box extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Banner Box', 'metro-core' );
		$this->rt_base = 'rt-banner-box';
		parent::__construct( $data, $args );
	}
	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'Content', 'metro-core' ),
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'pretitle',
				'label'   => __( 'Pre title', 'metro-core' ),
				'label_block' => true,
				'selectors' => array(
					'{{WRAPPER}} .new-product-box1 .item-heading:after' => 'content: "{{VALUE}}";',
				)				
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => __( 'Title', 'metro-core' ),
				'label_block' => true,
			),

			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img',
				'label'   => __( 'Image', 'metro-core' ),
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'link',
				'label'   => __( 'Link', 'metro-core' ),
				'label_block' => true,
			),

			array(
				'mode' => 'section_end',
			),

			// Style Tab
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_emphasis',
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
					'{{WRAPPER}} .new-product-box1 .item-heading:after' => 'top: {{SIZE}}{{UNIT}};',
				)
			),

			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'emphasis_typo',
				'label'    => __( 'Typography', 'metro-core' ),
				'selector' => '{{WRAPPER}} .new-product-box1 .item-heading:after',
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'emphasis_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .new-product-box1 .item-heading:after' => 'color: {{VALUE}}'),
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
				'id'      => 'sec_divider',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Divider', 'metro-core' ),
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'divide_color',
				'label'   => __( 'Color', 'metro-core' ),
				'selectors' => array('{{WRAPPER}} .new-product-box1 .item-content .item-heading:before' => 'background-color: {{VALUE}}'),
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