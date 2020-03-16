<?php
namespace Elementor;

class FluidMeter_Widget extends Widget_Base {


	public function get_name() {
		return 'FluidMeter';
	}

	public function get_title() {
		return __( 'Fluid Meter', 'dom' );
	}

	public function get_icon() {
		return 'eicon-animation';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section_fluid_meter',
			array(
				'label' => __( 'Fluid Meter', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'dom' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'HTML5', 'dom' ),
			)
		);

		$this->add_control(
			'percentage',
			array(
				'label' => __( 'Fill Percentage', 'dom' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			)
		);

		$this->add_control(
			'content_size',
			array(
				'label' => __( 'Fluid Meter Width', 'dom' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 250,
				'max'   => 650,
				'step'  => 5,
			)
		);
		$this->add_control(
			'border_width',
			array(
				'label' => __( 'Border Width', 'dom' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 2,
				'max'   => 26,
				'step'  => 2,
			)
		);
		$this->add_control(
			'_fluid_meter_value',
			array(
				'label'     => __( 'Value', 'dom' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'font_size',
			array(
				'label' => __( 'Font Size(px)', 'dom' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 16,
				'max'   => 100,
				'step'  => 5,
			)
		);
		$this->add_control(
			'font_family',
			array(
				'label' => __( 'Font Family', 'dom' ),
				'type'  => Controls_Manager::FONT,
			)
		);

		$this->add_control(
			'title_heading',
			array(
				'label'     => __( 'Title', 'dom' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => __( 'Padding', 'dom' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .fluid-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'header_tag',
			array(
				'label'   => __( 'H tag', 'dom' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'h1' => array(
						'label' => __( 'H1', 'dom' ),
						'icon'  => 'eicon-editor-h1',
					),
					'h2' => array(
						'label' => __( 'H2', 'dom' ),
						'icon'  => 'eicon-editor-h2',
					),
					'h3' => array(
						'label' => __( 'H3', 'dom' ),
						'icon'  => 'eicon-editor-h3',
					),
					'h4' => array(
						'label' => __( 'H4', 'dom' ),
						'icon'  => 'eicon-editor-h4',
					),
					'h5' => array(
						'label' => __( 'H5', 'dom' ),
						'icon'  => 'eicon-editor-h5',
					),
					'h6' => array(
						'label' => __( 'H6', 'dom' ),
						'icon'  => 'eicon-editor-h6',
					),
				),
				'default' => 'h2',
				'toggle'  => false,
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
					'{{WRAPPER}} .fluid-title' => 'color:{{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'dom' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fluid-title',
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'title_shadow',
				'label'    => __( 'Shadow', 'dom' ),
				'selector' => '{{WRAPPER}} .fluid-title',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_content_color',
			array(
				'label' => __( 'Fluid Meter', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'content_text_color',
			array(
				'label' => __( 'Text Color', 'dom' ),
				'type'  => Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'content_background',
			array(
				'label' => __( 'Background Color', 'dom' ),
				'type'  => Controls_Manager::COLOR,
			)
		);

		$this->add_control(
			'content_border_color',
			array(
				'label' => __( 'Border Color', 'dom' ),
				'type'  => Controls_Manager::COLOR,
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_style_section_layer_color',
			array(
				'label' => __( 'Fluid Layer', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'layer_foreground',
			array(
				'label' => __( 'Foreground Color', 'dom' ),
				'type'  => Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'layer_background',
			array(
				'label' => __( 'Background Color', 'dom' ),
				'type'  => Controls_Manager::COLOR,
			)
		);
		$this->end_controls_section();
		// $this->start_controls_section(
		// '_style_section_optional',
		// [
		// 'label' => __('Settings', 'dom'),
		// 'tab' => Controls_Manager::TAB_STYLE,
		// ]
		// );
		// $this->add_control(
		// 'show_percentage',
		// [
		// 'label' => __( 'Show Percentage', 'dom' ),
		// 'type' => \Elementor\Controls_Manager::SWITCHER,
		// 'label_on' => __( 'Show', 'fluid-meter' ),
		// 'label_off' => __( 'Hide', 'fluid-meter' ),
		// 'return_value' => 'yes',
		// 'default' => 'yes',
		// ]
		// );
		// $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_render_attribute( 'title', 'class', 'fluid-title' );
				// fluid meter title
		$header_tag   = tag_escape( $settings['header_tag'] );
		$title        = esc_html( $settings['title'] );
		$render_title = $this->get_render_attribute_string( 'title' );

				// fluid meter content
		$percentage           = $settings['percentage'];
		$content_border_width = $settings['border_width'];
		$content_size         = $settings['content_size'];
		$layer_foreground     = $settings['layer_foreground'];
		$layer_background     = $settings['layer_background'];
		$content_background   = $settings['content_background'];
		$content_border_color = $settings['content_border_color'];
		$font_size            = $settings['font_size'];
		$font_family          = $settings['font_family'];
		$content_text_color   = $settings['content_text_color'];
		?>
		<div class="fluid_meter_wrap">
		<div class="fluid-meter text-center" data-content_text_color="<?php print( $content_text_color ); ?>" data-font_family="<?php print_r( $font_family ); ?>" data-font_size="<?php print_r( $font_size ); ?>" data-content_size="<?php print_r( $content_size ); ?>" data-content_border_color="<?php print( $content_border_color ); ?>" data-content_border_width="<?php print_r( $content_border_width ); ?>" data-content_background="<?php print $content_background; ?>" data-percentage="<?php print_r( $percentage ); ?>" data-layer_background="<?php echo $layer_background; ?>" data-layer_foreground="<?php echo $layer_foreground; ?>"></div>
		<div class="fluid_meter_text">
			<?php
			if ( ! empty( $title ) ) :
				printf( '<%1$s %2$s>%3$s</%1$s>', $header_tag, $render_title, $title );
			endif;
			?>
		</div>
		</div>
		<?php
	}
}
