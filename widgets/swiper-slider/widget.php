<?php
namespace Elementor;

class SwiperSlider_Widget extends Widget_Base {


	public function get_name() {
		return 'swiperSlider';
	}

	public function get_title() {
		return __( 'Swiper Slider', 'dom' );
	}

	public function get_icon() {
		return 'eicon-slider-3d';
	}

	public function get_categories() {
		return array( 'talib' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Slider List', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repater = new Repeater();
		$repater->add_control(
			'image',
			array(
				'label'   => __( 'Choose Image', 'dom' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repater->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'    => 'thumbnail',
				'exclude' => array( 'custom' ),
				'include' => array(),
				'default' => 'large',
			)
		);
		$repater->add_control(
			'swiper_slider_title',
			array(
				'label'   => __( 'Slider title', 'dom' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'dom' ),
			)
		);
		$repater->add_control(
			'swiper_slider_desc',
			array(
				'label'   => __( 'Slider Description', 'dom' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Description', 'dom' ),
			)
		);
		$this->add_control(
			'slider_list',
			array(
				'label'       => __( 'Slider List', 'dom' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repater->get_controls(),
				'default'     => array(
					array(
						'swiper_slider_title' => __( 'Title', 'dom' ),
						'swiper_slider_desc'  => __( 'Swiper Slider desc', 'dom' ),
					),
					array(
						'swiper_slider_title' => __( 'Title', 'dom' ),
						'swiper_slider_desc'  => __( 'Swiper Slider desc', 'dom' ),
					),
				),
				'title_field' => '{{{swiper_slider_title}}}',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'_content_section_swiper_effect',
			array(
				'label' => __( 'Slider Effect', 'dom' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'swiper_effect',
			array(
				'label'   => __( 'Slider Effect', 'dom' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'cube'      => __( 'Cube', 'dom' ),
					'fade'      => __( 'Fade', 'dom' ),
					'flip'      => __( 'Flip', 'dom' ),
					'coverflow' => __( 'Coverflow', 'dom' ),
				),
				'default' => 'coverflow',
				'dynamic' => array( 'active' => true ),
			)
		);
		 $this->end_controls_section();
		$this->start_controls_section(
			'_section_style_layout',
			array(
				'label' => __( 'Layout', 'dom' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'layout_width',
			array(
				'label'      => __( 'Width', 'dom' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'vw' ),
				'range'      => array(
					'px' => array(
						'min' => 100,
						'max' => 700,
					),
					'%'  => array(
						'min' => 20,
						'max' => 100,
					),
					'vw' => array(
						'min' => 20,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => '%',
					'size' => 100,
				),
				'selectors'  => array(
					'{{WRAPPER}} .swiper-container' => 'width:{{SIZE}}{{UNIT}}',
				),
			)
		);
		$this->add_control(
			'layout_height',
			array(
				'label'      => __( 'Height', 'dom' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'vh' ),
				'range'      => array(
					'px' => array(
						'min' => 100,
						'max' => 700,
					),
					'%'  => array(
						'min' => 20,
						'max' => 100,
					),
					'vh' => array(
						'min' => 20,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'vh',
					'size' => 50,
				),
				'selectors'  => array(
					'{{WRAPPER}} .swiper-container' => 'height:{{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->add_control(
			'show_nav',
			array(
				'label'        => __( 'Nav', 'dom' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'swiper-slider' ),
				'label_off'    => __( 'Hide', 'swiper-slider' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'show_pagination',
			array(
				'label'        => __( 'Pagination', 'dom' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'swiper-slider' ),
				'label_off'    => __( 'Hide', 'swiper-slider' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
				   'slider_autoplay',
				   [
					   'label'         => __( 'Autoplay', 'dom' ),
					   'type'          => Controls_Manager::SWITCHER,
					   'label_on'      => __( 'Yes', 'swiper_slider' ),
					   'label_off'     => __( 'No', 'swiper_slider' ),
					   'return_value'  => 'yes',
					   'default'       => 'yes',
				   ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings        = $this->get_settings_for_display();
		$show_nav        = $settings['show_nav'];
		$show_pagination = $settings['show_pagination'];
		$swiper_effect   = $settings['swiper_effect'];
		$slider_autoplay = $settings['slider_autoplay'];
		?>
<section class="swiper-container loading"  data-slider_autoplay="<?php echo $slider_autoplay; ?>"  data-swiper_effect="<?php echo $swiper_effect; ?>">
  <div class="swiper-wrapper">
		<?php
		if ( $settings['slider_list'] ) {
			foreach ( $settings['slider_list'] as $item ) {
				?>
	<div class="swiper-slide"  style="background-image:url(<?php echo $item['image']['url']; ?>">
		  <img src="<?php echo $item['image']['url']; ?>" class="entity-img" />
		  <div class="content">
			<p class="title" data-swiper-parallax="-90%" data-swiper-parallax-scale=".7"><?php echo $item['swiper_slider_title']; ?></p>
			<span class="caption" data-swiper-parallax="-20%"><?php echo $item['swiper_slider_desc']; ?></span>
			
		  </div>
	</div>
				<?php
			}
		}
		?>

  </div>
  <!-- If we need pagination -->
		<?php
		if ( $show_pagination == true ) {
			?>
	  <div class="swiper-pagination"></div>
			<?php
		}
		if ( $show_nav == true ) {
			?>
	  <div class="swiper-button-prev swiper-button-white"></div>
	  <div class="swiper-button-next swiper-button-white"></div>
			<?php
		}
		?>
  <!-- If we need navigation buttons -->
	</section>
		<?php
	}
}
