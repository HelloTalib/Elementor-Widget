<?php
namespace Elementor;

class Animation_Button_Widget extends Widget_Base {


	public function get_name() {
		return 'Animation_Button';
	}

	public function get_title() {
		return __( 'Animation Button', 'dom' );
	}

	public function get_icon() {
		return 'eicon-nerd';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		// Add Control Here
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Title', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'button_style',
			array(
				'label'   => __( 'Button Style', 'dom' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => array(
					'style-1' => __( 'Style 1', 'dom' ),
					'style-2' => __( 'Style 2', 'dom' ),
					'style-3' => __( 'Style 3', 'dom' ),
					'style-4' => __( 'Style 4', 'dom' ),
				),
			)
		);
		$this->add_control(
			'button_text',
			array(
				'label'       => __( 'Button Text', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Click Me', 'dom' ),
				'placeholder' => __( 'type Button text', 'dom' ),
			)
		);

		$this->add_control(
			'button_before_text',
			array(
				'label'       => __( 'Button Hover Text', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'yeah', 'dom' ),
				'placeholder' => __( 'type Button text', 'dom' ),
				'condition'   => array(
					'button_style' => array( 'style-1' ),
				),
			)
		);

		$this->add_control(
			'button_after_text',
			array(
				'label'       => __( 'Button Hover Text', 'dom' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'yeah', 'dom' ),
				'placeholder' => __( 'type Button text', 'dom' ),
				'condition'   => array(
					'button_style' => array( 'style-2' ),
				),
			)
		);
		$this->add_control(
			'button_url',
			array(
				'label'         => __( 'Button', 'dom' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://example.com', 'dom' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'dynamic'       => array(
					'active' => true,
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'content_section_style',
			array(
				'label' => __( 'Button Style', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'button_width',
			array(
				'label'      => __( 'Width', 'dom' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => 50,
						'max'  => 700,
						'step' => 7,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => '%',
					'size' => 50,
				),
				'selectors'  => array(
					'{{WRAPPER}} div[class^="style"] a' => 'width: {{SIZE}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);
		$this->add_control(
			'aligment',
			array(
				'label'    => __( 'Aligment', 'dom' ),
				'type'     => Controls_Manager::CHOOSE,
				'default'  => 'center',
				'options'  => array(
					'flex-start'   => array(
						'label' => __( 'Left', 'dom' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'label' => __( 'Center', 'dom' ),
						'icon'  => 'eicon-h-align-center',
					),

					'flex-end'  => array(

						'label' => __( 'Right', 'dom' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .wrap' => 'display:flex',
					'{{WRAPPER}} .wrap' => 'justify-content:{{VALUE}}',
					'{{WRAPPER}} .wrap' => 'align-items:{{VALUE}}',
				),
			)
		);
		$this->add_control(
			'button_tab_heading',
			array(
				'label'      => __( 'Button Tab', 'dom' ),
				'show_label' => false,
				'type'       => Controls_Manager::HEADING,
				'separator'  => 'before',
			)
		);
		$this->start_controls_tabs(
			'button_tab'
		);
		$this->start_controls_tab(
			'normal',
			array(
				'label' => __( 'Normal', 'dom' ),
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Text Color', 'plugin-domain' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} div[class^="style"] a ' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'button_border',
				'label'    => __( 'Border', 'dom' ),
				'selector' => '{{WRAPPER}} div[class^="style"] a',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'label'    => __( 'Typography', 'dom' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} div[class^="style"] a',
			)
		);
		$this->end_controls_tab();
			$this->start_controls_tab(
				'hover',
				array(
					'label' => __( 'Hover', 'dom' ),
				)
			);
		$this->add_control(
			'button_hover_text_color',
			array(
				'label'     => __( 'Hover Text Color', 'dom' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} .style-1>a:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .style-2>a:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .style-4>a:hover'  => 'color: {{VALUE}}',
				),
				'condition' => array(
					'button_style' => array( 'style-2', 'style-1', 'style-4' ),
				),
			)
		);
		$this->add_control(
			'button_hover_background',
			array(
				'label'     => __( 'Hover Background Color', 'dom' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .style-1>a:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .style-2>a:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .style-4>a:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .style-4>a:after'  => 'background: {{VALUE}}',
				),
				'condition' => array(
					'button_style' => array( 'style-2', 'style-1', 'style-4' ),
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'button_hover_border',
				'label'    => __( 'Hover Border', 'dom' ),
				'selector' => '{{WRAPPER}} div[class^="style"] a:hover',
			)
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {
		// Elementor Code Output
		$settings           = $this->get_settings_for_display();
		$button_style       = $settings['button_style'];
		$button_text        = $settings['button_text'];
		$button_url         = $settings['button_url']['url'];
		$button_before_text = $settings['button_before_text'];
		$button_after_text  = $settings['button_after_text'];
		?>
		<div class="wrap">
			<?php
			if ( $button_style == 'style-1' ) {
				echo '<div class="style-1"> <a  href="' . $button_url . '" data-before="' . $button_before_text . '">' . $button_text . '</a></div>';
			} elseif ( $button_style == 'style-2' ) {
				echo '<div class="style-2"> <a  href="' . $button_url . '" data-after="' . $button_after_text . '">' . $button_text . '</a></div>';
			} elseif ( $button_style == 'style-3' ) {
				echo '<div class="style-3"> <a  href="' . $button_url . '">' . $button_text . '</a></div>';
			} elseif ( $button_style == 'style-4' ) {
				echo '<div class="style-4"> <a  href="' . $button_url . '">' . $button_text . '</a></div>';
			}
			?>
	</div>
		<?php
	}
}
