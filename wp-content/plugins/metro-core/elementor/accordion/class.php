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

class Accordion extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Accordion', 'metro-core' );
		$this->rt_base = 'rt-accordion';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label'   => __( 'Title', 'metro-core' ),
                'label_block' => true,
				'default' => 'Lorem Ipsum dolor amet',
            ]
        );

		$repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::WYSIWYG,
                'label'   => __( 'Content', 'metro-core' ),
                'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip',
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'metro-core' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Add as many items as you want', 'metro-core' ),
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