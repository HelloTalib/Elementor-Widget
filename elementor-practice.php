<?php
/*
* Plugin Name: Elementor widget
* Plugin URI: https://talib.netlify.com
* Description: Elementor Extension widget Series
* Version: 1.0.0
* Author: TALIB
* Author URI: https://talib.netlify.com.com
* License: GPLv2 or later
* Text Domain: elementor-widget
* Domain Path: /languages/
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	die( __( 'Direct Access is not allowed', 'elementor-widget' ) );
}

final class Init_Elementor_Extension {


	const VERSION                   = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION       = '7.0';

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {
		 add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-widget' ),
			'<strong>' . esc_html__( 'Talib Elementor AddOn', 'elementor-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-widget' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-widget' ),
			'<strong>' . esc_html__( 'Talib Elementor AddOn', 'elementor-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-widget' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-widget' ),
			'<strong>' . esc_html__( 'Talib Elementor AddOn', 'elementor-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-widget' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	public function init() {
		load_plugin_textdomain( 'elementor-widget', false, plugin_dir_path( __FILE__ ) . '/languages' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
		// Register Widget
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init_widgets' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_new_category' ) );
		add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'widget_assets_enqueue' ) );
	}
		// Register Categories
	public function register_new_category( $elements_manager ) {
		$elements_manager->add_category(
			'talib',
			array(
				'title' => __( 'Talib', 'elementor-widget' ),
				'icon'  => 'fa fa-facebook',
			)
		);
	}

		// enqueue assets
	public function widget_assets_enqueue() {
		wp_enqueue_style( 'fontawesome-css', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0', null );
		wp_enqueue_style( 'swiper-slider-css', plugin_dir_url( __FILE__ ) . '/assets/css/swiper.min.css', null, '4.5.3', null );
		wp_enqueue_style( 'widget-css', plugin_dir_url( __FILE__ ) . '/assets/css/style.css', null, time(), null );
		wp_enqueue_script( 'swiper-slider-js', plugin_dir_url( __FILE__ ) . '/assets/js/swiper.min.js', null, '4.5.3', true );
		wp_enqueue_script( 'typed-js', plugin_dir_url( __FILE__ ) . '/assets/js/typed.min.js', null, 'v2.0.1', true );
		wp_enqueue_script( 'fluid-meter-js', plugin_dir_url( __FILE__ ) . '/assets/js/fluid-meter.js', null, null, true );
		wp_enqueue_script( 'widget-js', plugin_dir_url( __FILE__ ) . '/assets/js/main.js', array( 'jquery' ), time(), true );
	}

		// Widget init
	public function init_widgets() {
		// Team Widget
		require_once __DIR__ . '/widgets/our-team/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new Team_Widget() );
		// Counter Widget
		require_once __DIR__ . '/widgets/counter/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new Counter_Widget() );
		// progressbar Widget
		require_once __DIR__ . '/widgets/progressbar/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new Progressbar_Widget() );
		// animation_text Widget
		require_once __DIR__ . '/widgets/animation-text/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new AnimationText_Widget() );
		// fluid_mater Widget
		require_once __DIR__ . '/widgets/fluid-meter/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new FluidMeter_Widget() );
		// swiper slider Widget
		require_once __DIR__ . '/widgets/swiper-slider/widget.php';
		Plugin::instance()->widgets_manager->register_widget_type( new SwiperSlider_Widget() );

	}
}
Init_Elementor_Extension::instance();
