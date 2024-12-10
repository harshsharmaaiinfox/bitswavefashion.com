<?php
/**
 * This file can be overridden by copying it to yourtheme/elementor-custom/countdown-2/class.php
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Countdown extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Countdown', 'metro-core' );
		$this->rt_base = 'rt-countdown';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'jquery-countdown' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::DATE_TIME,
				'id'      => 'date',
				'label'   => __( 'Date-Time', 'metro-core' ),
				'description' => __( 'Enter a future date-time', 'metro-core' ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'p_url',
				'label'       => __( 'Choose Product URL', 'metro-core' ),
				'description' => __( 'If you enter the link from here the full box will be linked.', 'metro-core' ),
				'options'     => [ 'url', 'is_external', 'nofollow' ],
				'default'     => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		if ( ! empty( $data['p_url']['url'] ) ) {
			$this->add_link_attributes( 'p_url', $data['p_url'] );
		}
		$data['product_url_attribute'] = $this->get_render_attribute_string( 'p_url' );
		$this->rt_load_scripts();

		$template = 'view';

		return $this->rt_template( $template, $data );
	}
}