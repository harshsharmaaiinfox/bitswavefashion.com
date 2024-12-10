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
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_AdBox extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Ad Box', 'metro-core' );
		$this->rt_base = 'rt-ad-box';
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
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img',
				'label'   => __( 'Image', 'metro-core' ),
				'selectors' => array(
					'{{WRAPPER}} .side-bannar' => 'background-image: url({{URL}});',
				)				
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
                'label_block'=> true,
				'label'   => __( 'Title', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'percent',
                'label_block'=> true,
				'label'   => __( 'Percent text', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offer',
                'label_block'=> true,
				'label'   => __( 'Offer text', 'metro-core' ),
			),						
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'btntext',
                'label_block'=> true,
				'label'   => __( 'Button Text', 'metro-core' ),
			),
			array(
				'type'  => Controls_Manager::TEXT,
				'id'    => 'btnurl',
                'label_block'=> true,
				'label' => __( 'Button Link', 'metro-core' ),
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