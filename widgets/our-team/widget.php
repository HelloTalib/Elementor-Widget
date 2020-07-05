<?php
namespace Elementor;

class Team_Widget extends Widget_Base {


	public function get_name() {
		return 'team';
	}

	public function get_title() {
		return __( 'Team', 'bd-webninja' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'_section_content',
			array(
				'label' => __( 'Name & Post', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'name',
			array(
				'label'       => __( 'Name', 'bd-webninja' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Member Name', 'bd-webninja' ),
				'default'     => __( 'TALIB', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'post',
			array(
				'label'       => __( 'Post', 'bd-webninja' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Member post', 'bd-webninja' ),
				'default'     => __( 'Web Learner', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'header_tag',
			array(
				'label'   => __( 'H tag for Name', 'bd-webninja' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'h1' => array(
						'label' => __( 'H1', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h1',
					),
					'h2' => array(
						'label' => __( 'H2', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h2',
					),
					'h3' => array(
						'label' => __( 'H3', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h3',
					),
					'h4' => array(
						'label' => __( 'H4', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h4',
					),
					'h5' => array(
						'label' => __( 'H5', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h5',
					),
					'h6' => array(
						'label' => __( 'H6', 'bd-webninja' ),
						'icon'  => 'eicon-editor-h6',
					),
				),
				'default' => 'h2',
				'toggle'  => false,
			)
		);
		$this->add_control(
			'align',
			array(
				'label'     => __( 'Alignment', 'bd-webninja' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'label' => __( 'Left', ' bd-webninja' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'label' => __( 'Center', ' bd-webninja' ),
						'icon'  => 'eicon-h-align-center',
					),
					'right'  => array(
						'label' => __( 'Right', ' bd-webninja' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => false,
				'selectors' => array(
					'{{WRAPPER}} .team-content' => 'text-align:{{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
				$this->start_controls_section(
					'_section_image',
					array(
						'label' => __( 'Image', 'bd-webninja' ),
						'tab'   => Controls_Manager::TAB_CONTENT,
					)
				);

		$this->add_control(
			'image',
			array(
				'label'   => __( 'Choose Image', 'elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'    => 'thumbnail',
				// 'exclude' => [ 'custom' ],
				'include' => array(),
				'default' => 'medium',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_social',
			array(
				'label' => __( 'Social Links', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			array(
				'label'       => __( 'Website', 'bd-webninja' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'facebook', 'bd-webninja' ),
			)
		);

		$repeater->add_control(
			'icon',
			array(
				'label' => __( 'Icon', 'bd-webninja' ),
				'type'  => Controls_Manager::ICON,
			)
		);

		$repeater->add_control(
			'url',
			array(
				'label'       => __( 'URL', 'bd-webninja' ),
				'type'        => Controls_Manager::URL,
				'label_block' => false,
				'placeholder' => __( 'https://example.com', 'bd-webninja' ),
			)
		);

		$this->add_control(
			'social_links',
			array(
				'label'       => __( 'Profile List', 'bd-webninja' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{title }}}',
			)
		);

		$this->end_controls_section();
		$this->end_controls_section();
		$this->start_controls_section(
			'style_content_section',
			array(
				'label' => __( 'Content', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs( 'tabs_content' );
		$this->start_controls_tab(
			'normal_tab',
			array(
				'label' => __( 'Normal', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'background_color',
			array(
				'label'     => __( 'Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .our-team'         => 'background:{{VALUE}}',
					'{{WRAPPER}} .our-team .social' => 'background:{{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'hover_tab',
			array(
				'label' => __( 'Hover', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'background_hover',
			array(
				'title'     => __( 'Hover Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .our-team:hover'   => 'background:{{VALUE}}',
					'{{WRAPPER}} .our-team .social' => 'background:{{VALUE}}',
				),

			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		$this->start_controls_section(
			'style_image',
			array(
				'label' => __( 'Name & Post', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'_heading_name',
			array(

				'label'     => __( 'Name', 'bd-webninja' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'name_spacing',
			array(
				'label'      => __( 'Bottom Spacing', 'bd-webninja' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .team-content > .name' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),

			)
		);
		$this->add_control(
			'name_color',
			array(
				'label'     => __( 'Text Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .name' => 'color:{{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .name',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .name',
			)
		);
		$this->add_control(
			'_heading_post',
			array(

				'label'     => __( 'Post', 'bd-webninja' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'post_spacing',
			array(
				'label'      => __( 'Bottom Spacing', 'bd-webninja' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .team-content > .post' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),

			)
		);
		$this->add_control(
			'post_color',
			array(
				'label'     => __( 'Text Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .post' => 'color:{{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'post_typography',
				'label'    => __( 'Typography', 'bd-webninja' ),
				'selector' => '{{WRAPPER}} .post',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			)
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'post_text_shadow',
				'selector' => '{{WRAPPER}} .post',
			)
		);
		$this->add_responsive_control(
			'content_padding',
			array(
				'label'      => __( 'Content Padding', 'bd-webninja' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_image_section',
			array(
				'label' => __( 'Image', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'image_spacing',
			array(
				'label'      => __( 'Bottom Spacing', 'bd-webninja' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .pic' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				),
			)
		);

		$this->add_responsive_control(
			'image_padding',
			array(
				'label'      => __( 'Padding', 'bd-webninja' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .pic img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'image_border',
				'selector' => '{{WRAPPER}} .pic img',
			)
		);

		$this->add_responsive_control(
			'image_border_radius',
			array(
				'label'      => __( 'Border Radius', 'bd-webninja' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .pic img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'image_box_shadow',
				'exclude'  => array(
					'box_shadow_position',
				),
				'selector' => '{{WRAPPER}} .pic img',
			)
		);

		$this->add_control(
			'image_bg_color',
			array(
				'label'     => __( 'Background Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pic img' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'style_social_section',
			array(
				'label' => __( 'Social Icons', 'bd-webninja' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs( 'tabs_button' );
		$this->start_controls_tab(
			'button_normal',
			array(
				'label' => __( 'Normal', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => __( 'Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .our-team .social li a' => 'color:{{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_hover',
			array(
				'label' => __( 'Hover', 'bd-webninja' ),
			)
		);
		$this->add_control(
			'button_color_hover',
			array(
				'title'     => __( 'Hover Color', 'bd-webninja' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .our-team .social li a:hover' => 'color:{{VALUE}}',
				),

			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'name', 'none' );
		$this->add_inline_editing_attributes( 'post', 'none' );
		$this->add_render_attribute( 'name', 'class', 'name' );
		$this->add_render_attribute( 'post', 'class', 'post' );
		$image = Group_Control_Image_Size::get_attachment_image_html( $settings, 'medium', 'image' );

		$header_tag  = tag_escape( $settings['header_tag'] );
		$name        = esc_html( $settings['name'] );
		$render_name = $this->get_render_attribute_string( 'name' );
		$post        = esc_html( $settings['post'] );
		$render_post = $this->get_render_attribute_string( 'post' );
		?>
			<div class="our-team">
				<div class="pic">
				<?php echo $image; ?>
					<ul class="social">
					<?php
					if ( $settings['social_links'] ) {
						foreach ( $settings['social_links'] as $links => $value ) {
							echo '<li><a href="' . $value['url']['url'] . '"><i class="' . $value['icon'] . '" aria-hidden="true"></i></a></li>';
						}
					}
					?>
					</ul>
				</div>
				<div class="team-content">
				<?php
				if ( ! empty( $name ) ) :
					printf( '<%1$s %2$s>%3$s</%1$s>', $header_tag, $render_name, $name );
			endif;

				if ( ! empty( $post ) ) :
					printf( '<span %1$s>%2$s</span>', $render_post, $post );
			endif;
				?>
				</div>
			</div>
		<?php

	}
}
