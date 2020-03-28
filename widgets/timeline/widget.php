<?php
namespace Elementor;

class Timeline_Widget extends Widget_Base {


	public function get_name() {
		return 'Timeline';
	}

	public function get_title() {
		return __( 'Timeline', 'dom' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Timeline', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'year',
			array(
				'label'       => __( 'Year', 'dom' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => __( '2020', 'dom' ),
				'placeholder' => __( 'Type year', 'dom' ),
			)
		);
		$repeater->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Web Development', 'dom' ),
				'placeholder' => __( 'Type your title here', 'dom' ),
			)
		);
		$repeater->add_control(
			'icon',
			array(
				'label'   => __( 'Icon', 'plugin-domain' ),
				'type'    => Controls_Manager::ICON,
				'default' => 'fa fa-graduation-cap',
			)
		);
		$repeater->add_control(
			'description',
			array(
				'label'       => __( 'Description', 'plugin-domain' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit.tenetur tempore, cupiditate possimus animi molestias modi voluptas autem ex aspernatur omnis labore, earum voluptatum. Assumenda!', 'plugin-domain' ),
				'placeholder' => __( 'Type your Description here', 'plugin-domain' ),
			)
		);
		$this->add_control(
			'timeline_list',
			array(
				'label'       => __( 'Timeline', 'dom' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
                    array(
                        'year'        => __('2020', 'dom'),
                        'title'       => __( 'Web Development', 'dom' ),
						'description' => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit.tenetur tempore, cupiditate possimus animi molestias modi voluptas autem ex aspernatur omnis labore, earum voluptatum. Assumenda!', 'dom' ),
						'icon'        => __( 'fa fa-graduation-cap', 'dom' ),
					),
					array(
                        'year'        => __('2019', 'dom'),
                        'title'       => __( 'Web Design', 'dom' ),
						'description' => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit.tenetur tempore, cupiditate possimus animi molestias modi voluptas autem ex aspernatur omnis labore, earum voluptatum. Assumenda!', 'dom' ),
						'icon'        => __( 'fa fa-graduation-cap', 'dom' ),
					),
					array(
                        'year'        => __('2018', 'dom'),
						'title'       => __( 'Digital Marketing', 'dom' ),
						'description' => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit.tenetur tempore, cupiditate possimus animi molestias modi voluptas autem ex aspernatur omnis labore, earum voluptatum. Assumenda!', 'dom' ),
						'icon'        => __( 'fa fa-graduation-cap', 'dom' ),
					),
				),
				'title_field' => '{{{ title }}}',
			)
		);
        $this->end_controls_section();
        $this->start_controls_section(
                   '_style_content',
                   [
                       'label' => __( 'Content', 'dom' ),
                       'tab'   => Controls_Manager::TAB_STYLE,
                   ]
        );
        $this->add_control(
                   'content_background',
                   [
                       'label'     => __('Background', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .timeline-content' => 'background: {{VALUE}}',
                       ],
                   ]
        );
        $this->add_responsive_control(
                   'Padding',
                   [
                       'label'         => __( 'Padding Bottom', 'dom' ),
                       'type'          => Controls_Manager::SLIDER,
                       'size_units'    => [ 'px', '%' ],
                       'range'         => [
                           'px'        => [
                               'min'   => 0,
                               'max'   => 100,
                               'step'  => 1,
                           ],
                           '%'         => [
                               'min'   => 0,
                               'max'   => 100,
                           ],
                       ],
                       'default'       => [
                           'unit'      => '%',
                           'size'      => 2,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .timeline-content' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                       ],
                   ]
        );

        $this->add_responsive_control(
                   'content_margin',
                   [
                       'label'         => __( 'Margin Bottom', 'dom' ),
                       'type'          => Controls_Manager::SLIDER,
                       'size_units'    => [ 'px', '%' ],
                       'range'         => [
                           'px'        => [
                               'min'   => 0,
                               'max'   => 100,
                               'step'  => 1,
                           ],
                           '%'         => [
                               'min'   => 0,
                               'max'   => 100,
                           ],
                       ],
                       'default'       => [
                           'unit'      => '%',
                           'size'      => 0,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .timeline-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                       ],
                   ]
        );
        $this->add_group_control(
                   Group_Control_Box_Shadow::get_type(),
                   [
                       'name'      => 'timeline_shadow',
                       'label'     => __( 'Shadow', 'dom' ),
                       'selector'  => '{{WRAPPER}} .main-timeline .timeline-content',
                   ]
        );
        $this->add_control(
                   'bar_heading',
                   [
                       'label'     => __( 'Bar & Border', 'dom' ),
                       'type'      => Controls_Manager::HEADING,
                       'separator' => 'before',
                   ]
        );
        $this->add_control(
                   'bar_color',
                   [
                       'label'     => __('Bar Color', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'scheme'    => [
                           'type'  => Scheme_Color::get_type(),
                           'value' => Scheme_Color::COLOR_3,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline:before' => 'background: {{VALUE}}',
                       ],
                   ]
        );
        $this->add_control(
			'border_color',
			array(
				'label'     => __( 'Border Color', 'dom' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .main-timeline .timeline-year' => 'background: {{VALUE}}',
					'{{WRAPPER}} .main-timeline .timeline:before' => 'background: {{VALUE}}',
				),
			)
        );
        
        $this->end_controls_section();
		$this->start_controls_section(
			'_style_section_title',
			array(
				'label' => __( 'Title', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'dom' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .main-timeline .title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'title_background',
				'label'    => __( 'Background', 'dom' ),
				'types'    => array( 'classic', 'gradient' ),
                'selector' => '{{WRAPPER}} .main-timeline .title',
                // 'separator'=> 'after',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'dom' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .main-timeline .title',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'title_shadow',
				'label'    => __( 'Shadow', 'dom' ),
				'selector' => '{{WRAPPER}} .main-timeline .title',
			)
		);
        $this->end_controls_section();
        $this->start_controls_section(
                   '_style_icon',
                   [
                       'label' => __( 'Icon', 'dom' ),
                       'tab'   => Controls_Manager::TAB_STYLE,
                   ]
        );
        $this->add_control(
                   'icon_color',
                   [
                       'label'     => __('Color', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .timeline-icon' => 'color: {{VALUE}}',
                       ],
                   ]
        );
        $this->add_responsive_control(
                   'icon_size',
                   [
                       'label'         => __( 'Icon Size', 'dom' ),
                       'type'          => Controls_Manager::SLIDER,
                       'size_units'    => [ 'px' ],
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .timeline-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                       ],
                   ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                   '_style_description',
                   [
                       'label' => __( 'Description', 'dom' ),
                       'tab'   => Controls_Manager::TAB_STYLE,
                   ]
        );
        $this->add_control(
                   'description_color',
                   [
                       'label'     => __('Color', 'dom' ),
                       'type'      => Controls_Manager::COLOR,
                       'scheme'    => [
                           'type'  => Scheme_Color::get_type(),
                           'value' => Scheme_Color::COLOR_1,
                       ],
                       'selectors' => [
                           '{{WRAPPER}} .main-timeline .description' => 'color: {{VALUE}}',
                       ],
                   ]
        );
        $this->add_group_control(
                   Group_Control_Typography::get_type(),
                   [
                       'name'      => 'description_typography',
                       'label'     => __( 'Typography', 'dom' ),
                       'scheme'    => Scheme_Typography::TYPOGRAPHY_3,
                       'selector'  => '{{WRAPPER}} .main-timeline .description',
                   ]
        );
        
        $this->end_controls_section();
		$this->start_controls_section(
			'_style_year',
			array(
				'label' => __( 'Year', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'year_color',
			array(
				'label'     => __( 'Color', 'dom' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} .main-timeline .timeline-year' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'year_border',
				'label'    => __( 'Border Color', 'dom' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .main-timeline .timeline-year:before',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		// Elementor Code Output
		$settings = $this->get_settings_for_display();
		$timeline = $settings['timeline_list'];
		$output   = '<div class="main-timeline">';
		foreach ( $timeline as $list ) {
			$icons   = Icons_Manager::render_icon( $list['icon'], array( 'aria-hidden' => 'true' ) );
			$output .= '<div class="timeline">';
			$output .= '<a class="timeline-content" href="#">';
			$output .= '<div class="timeline-year"><span>' . $list['year'] . '</span></div>';
			$output .= '<h3 class="title">' . $list['title'] . '</h3>';
			$output .= '<div class="timeline-icon">';
			$output .= '<i class="' . $list['icon'] . '" aria-hidden="true"></i></div>';
			$output .= '<p class="description">' . $list['description'] . '</p></a>';
			$output .= '</div>';
		}
		$output .= '</div>';
		echo $output;

	}
}
