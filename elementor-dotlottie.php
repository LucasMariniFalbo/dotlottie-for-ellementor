<?php
/**
 * Plugin Name: dotLottie for Elementor
 * Description: Allows you to use the new ultra light .lottie extension on a brand new dotLottie widget in Elementor.
 * Plugin URI:  https://brasa-digital.com/apps/dotlottie-elementor
 * Version:     1.1.5
 * Author:      Brasa Digital
 * Author URI:  https://brasa-digital.com
 * Text Domain: elementor-dotlottie
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class DotLottie_Elementor_Extension {

	
	const VERSION = '1.15.0';
	const MINIMUM_ELEMENTOR_VERSION = '3.10.0';
	const MINIMUM_PHP_VERSION = '7.2';

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );
		add_filter( 'mime_types', [ $this, 'lottie_mime'] );

	}

	public function i18n() {

		load_plugin_textdomain( 'elementor-dotlottie' );

	}

	
	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	public function init() {
	
		$this->i18n();

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		
		// Register Widget Styles
        //add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        
        // Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

    }
    
   
    public function widget_styles() {

		// wp_enqueue_style( 'widget', plugins_url( 'css/widget.css', __FILE__ ) );
	
    }
    
    public function widget_scripts() {

		wp_enqueue_script( 'dotlottie', 'https://unpkg.com/@dotlottie/player-component@1.0.0/dist/dotlottie-player.js', array() );
	}

	public function lottie_mime($existing_mimes) {

		$existing_mimes['lottie'] = 'application/lottie'; 
		return $existing_mimes;

	}

	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/dotlottie.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \DotLottie_Widget() );

	}

	
	public function init_controls() {

		// Include Control files
		// require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		// \Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}
	

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-dotlottie' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-dotlottie' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-dotlottie' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-dotlottie' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-dotlottie' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-dotlottie' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-dotlottie' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-dotlottie' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-dotlottie' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}

DotLottie_Elementor_Extension::instance();