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
			'label' => __( 'Content', 'dom' ),
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
			'name'    => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
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
			'type'    => Controls_Manager::TEXT,
			'default' => __( 'Description', 'dom' ),
		)
	);
	$this->add_control(
		'slider_list',
		array(
			'label'       => __( 'Slider List', 'dom' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repater->get_controls(),
			'default'     => array(
				array(
					'swiper_slider_title' => __( 'Swiper Slider title', 'dom' ),
					'swiper_slider_desc'  => __( 'Swiper Slider desc', 'dom' ),
				),
			),
			'title_field' => '{{{swiper_slider_title}}}',
		)
	);

	$this->end_controls_section();

}

protected function render() {
	$settings = $this->get_settings_for_display();
	?>
<section class="swiper-container loading">
  <div class="swiper-wrapper">
	<?php
	if ( $settings['slider_list'] ) {
		foreach ( $settings['slider_list'] as $item ) {
			?>
	<div class="swiper-slide" style="background-image:url(<?php echo $item['image']['url'];?>">
	  	<img src="<?php echo $item['image']['url'];?>" class="entity-img" />
	  	<div class="content">
			<p class="title" data-swiper-parallax="-30%" data-swiper-parallax-scale=".7"><?php echo $item['swiper_slider_title'];?></p>
			<span class="caption" data-swiper-parallax="-20%"><?php echo $item['swiper_slider_desc'];?></span>
	  	</div>
	</div>
	<?php
	}
}
?>

  </div>
  
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev swiper-button-white"></div>
  <div class="swiper-button-next swiper-button-white"></div>
</section>
		<?php
		}
}
