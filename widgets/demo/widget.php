<?php
namespace Elementor;

class Demo_Widget extends Widget_Base {


	public function get_name() {
		return 'demo';
	}

	public function get_title() {
		return __( 'Demo', 'dom' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Content', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'demo',
			array(
				'label'       => __( 'demo', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'demo', 'dom' ),
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
	echo 'demo';
	}
}
