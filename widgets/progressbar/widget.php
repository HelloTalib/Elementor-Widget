<?php
namespace Elementor;

class Progressbar_Widget extends Widget_Base {


	public function get_name() {
		return 'progressbar';
	}

	public function get_title() {
		return __( 'Progressbar', 'bd-webninja' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Progressbar', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'bd-webninja' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('HTML5', 'bd-webninja'),
				'placeholder' => __( 'html5', 'bd-webninja' ),
			)
		);
		$repeater->add_control(
			'progressbar',
			array(
				'label'   => __( 'Progress Value', 'bd-webninja' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 85,
			)
		);
		$this->add_control(
			'progress_list',
			array(
				'label'       => __( 'Progressbar List', 'bd-webninja' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'Title'          => __( 'html5', 'bd-webninja' ),
						'Progress Value' => 85,
					),
				),
				'title_field' => '{{{ title }}}',
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
				'label'     => __( 'Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .progress-title' => 'color:{{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progress-title',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'title_shadow',
				'label'    => __( 'Shadow', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .progress-title',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_bar',
			array(
				'label' => __( 'Bar', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'bar_color',
			array(
				'label'     => __( 'Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .progress' => 'background: {{VALUE}};',

				),
			)
		);
		$this->add_control(
			'bar_color_border',
			array(
				'label'     => __( 'Border Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .progress .progress-bar:before' => 'border-top: 10px double {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_value',
			array(
				'label' => __( 'Title', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'value_color',
			array(
				'label'     => __( 'Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .progress-value' => 'color:{{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'value_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .progress-value',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'value_shadow',
				'label'    => __( 'Shadow', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .progress-value',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['progress_list'] ) {
			foreach ( $settings['progress_list'] as $key => $progressbar ) {
				?>
					<div class="col-sm-12">
					<h3 class="progress-title"><?php echo $progressbar['title']; ?></h3>
					<div class="progress">
						<div class="progress-bar" style="width:<?php echo $progressbar['progressbar']; ?>%;">
							<div class="progress-value">
							<?php  echo $progressbar['progressbar']; ?>%
							</div>
						</div>
					</div>
					</div>
				<?php
			}
		}
	}
}
