<?php
namespace Elementor;

class Counter_Widget extends Widget_Base {


	public function get_name() {
		return 'counter';
	}

	public function get_title() {
		return __( 'Counter', 'bd-webninja' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Content', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'bd-webninja' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Web Development',
				'placeholder' => __( 'Web Development', 'bd-webninja' ),
			)
		);

		$this->add_control(
			'counter_value',
			array(
				'label'   => __( 'Counter Value', 'bd-webninja' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 999,
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_content',
			array(
				'label' => __( 'Content', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'_content_backgorund_heading',
			array(
				'label'     => __( 'Content', 'bd-webninja' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'content_background',
				'label'    => __( 'Background', 'bd-webninja' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .counter',

			)
		);
		$this->add_control(
			'_Shape_backgorund_heading',
			array(
				'label'     => __( 'Shape Color', 'bd-webninja' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'shape_background',
				'label'    => __( 'Background', 'bd-webninja' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .counter:before',
				'separator' => 'after'
			)
		);
		$this->add_responsive_control(
			'content_margin',
			array(
				'label'      => __( 'Margin', 'bd-webninja' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( '%', 'px' ),
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => -30,
						'max' => 120,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .counter' => 'padding:{{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}}{{BOTTOM}}{{UNIT}}{{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->add_responsive_control(
			'content_radius',
			array(
				'label'      => __( 'Border Radius', 'bd-webninja' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( '%', 'px' ),
				'range'      => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 50,
						'max' => 700,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .counter' => 'border-radius:{{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}}{{BOTTOM}}{{UNIT}}{{LEFT}}{{UNIT}}',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_title',
			array(
				'label' => __( 'Title', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Text Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color:{{VALUE}}',
				),
			)
		);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'title_background',
					'label'    => __( 'Background', 'bd-webninja' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .counter h3',
				)
			);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'title_border',
				'label'    => __( 'Border', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .counter h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'title_shadow',
				'label'    => __( 'Text Shadow', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .title',
			)
		);
		$this->end_controls_section();
			$this->start_controls_section(
				'_style_section_counter',
				array(
					'label' => __( 'Counter', 'bd-webninja' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
		$this->add_control(
			'counter_color',
			array(
				'label'     => __( 'Text Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .counter-value' => 'color:{{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'counter_background',
				'label'    => __( 'Background', 'bd-webninja' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .counter .counter-content',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'counter_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .counter-value',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'counter_shadow',
				'label'    => __( 'Text Shadow', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .counter-value',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'counter_value', 'none' );
		$this->add_render_attribute( 'title', 'class', 'title' );
		$this->add_render_attribute( 'counter_value', 'class', 'counter-value' );
		$counter  = '<div class="counter">';
		$counter .= ' <h3 ' . $this->get_render_attribute_string( 'title' ) . '>' . $settings['title'] . '</h3>';
		$counter .= ' <div class="counter-content">';
		$counter .= '<span ' . $this->get_render_attribute_string( 'counter_value' ) . '>' . $settings['counter_value'] . '</span>';
		$counter .= '</div>';
		$counter .= '</div>';
		echo $counter;
	}
}
