<?php
namespace Elementor;

class Animated_heading_Widget extends Widget_Base {


	public function get_name() {
		return 'Animated_heading';
	}

	public function get_title() {
		return __( 'Animated heading', 'dom' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'_content_section',
			array(
				'label' => __( 'Animated Heading', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Default title', 'dom' ),
				'placeholder' => __( 'Type your title here', 'dom' ),
			)
		);
		$this->add_control(
			'heading_align',
			array(
				'label'   => __( 'Alignment', 'dom' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'left'   => array(
						'title' => __( 'Left', 'dom' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'dom' ),
						'icon'  => 'eicon-h-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'dom' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'default' => 'center',
				'toggle'  => false,
			)
		);
		$this->add_control(
			'animation_type',
			array(
				'label'   => __( 'Animation type', 'dom' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'reveal',
				'options' => array(
					'normal' => __( 'Normal', 'dom' ),
					'reveal' => __( 'Reveal', 'dom' ),
				),
			)
        );
        $this->add_control(
                   'animation_direction',
                   [
                       'label'      => __( 'Animation Direction', 'dom' ),
                       'type'       => Controls_Manager::SELECT,
                       'options'    => [
                           'top' => __( 'Top', 'dom' ),
                           'right' => __( 'Right', 'dom' ),
                           'buttom' => __( 'Buttom', 'dom' ),
                           'left'  => __( 'Left', 'dom' ),
                       ],
                       'default'    => 'left',
                   ]
        );
        $this->add_control(
               'animation_duration',
               [
                   'label'         => __( 'Duration(s)', 'dom' ),
                   'description'   => __( 'Transition Duration', 'dom' ),
                   'type'          => Controls_Manager::NUMBER,
                   'min'           => 0.1,
                   'max'           => 10,
                   'step'          => 0.1,
                   'default'       => 0.5,
                   'dynamic'       => ['active' => true],
                   'selectors' => [
                       '{{WRAPPER}} .elb-skb-filler' => '-webkit-transition-duration:{{VALUE}}s; transition-duration:{{VALUE}}s'
                   ]
               ]
        );
        $this->add_control(
                   'animation_timing',
                   [
                       'label'      => __( 'Animation Timing', 'dom' ),
                       'type'       => Controls_Manager::SELECT,
                       'options'    => [
                           'ease'  => __( 'Ease', 'dom' ),
                           'ease-in-out' => __( 'Ease In Out', 'dom' ),
                           'ease-in' => __( 'Ease In', 'dom' ),
                           'ease-out' => __( 'Ease Out', 'dom' ),
                           'cubic-bezier(.15,.48,1,.43)' => __( 'Cubic Bezier 1', 'dom' ),
                           'cubic-bezier(.14,-.03,1,.43)' => __( 'Cubic Bezier 2', 'dom' ),                       ],
                       'default'    => 'ease-out',
                       'dynamic' => ['active' => true],
                       'selectors' => [
                           '{{WRAPPER}} .elb-skb-filler' => '-webkit-transition-delay:{{VALUE}}s; transition-delay:{{VALUE}}s;'
                       ]
                   ]
        );
        $this->start_controls_section(
                   '_style_section',
                   [
                       'label' => __( 'Styling', 'dom' ),
                       'tab'   => Controls_Manager::TAB_STYLE,
                   ]
        );
        $this->add_group_control(
                   Group_Control_Typography::get_type(),
                   [
                       'name'      => 'heading_font',
                       'label'     => __( 'Typography', 'dom' ),
                       'scheme'    => Scheme_Typography::TYPOGRAPHY_2,
                       'selector'  => '{{WRAPPER}} .elb-animh_heading',
                   ]
        );
        $this->add_control(
                   'heading_color',
                   [
                       'label'     => __('Heading Color', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'scheme'    => [
                           'type'  => Scheme_Color::get_type(),
                           'value' => Scheme_Color::COLOR_2,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .elb-animh-heading' => 'color: {{VALUE}}',
                       ],
                   ]
        );
        $this->add_responsive_control(
                   'heading_padding',
                   [
                       'label'                 => __( 'Padding', 'dom' ),
                       'type'                  => Controls_Manager::DIMENSIONS,
                       'size_units'            => [ 'px', '%', 'em' ],
                       'selectors'             => [
                           '{{WRAPPER}} .elb-animh-heading'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       ],
                   ]
        );
        $this->add_control(
                   'heading_background',
                   [
                       'label'     => __('Backgorund Color', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'scheme'    => [
                           'type'  => Scheme_Color::get_type(),
                           'value' => Scheme_Color::COLOR_2,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .elb-animh-scheme' => 'background: {{VALUE}}',
                       ],
                   ]
        );
        
        $this->end_controls_section();    
		$this->end_controls_section();
	}

	protected function render() {
		// Elementor Code Output
		$settings = $this->get_settings_for_display();
		echo 'animated heading';
	}
}
