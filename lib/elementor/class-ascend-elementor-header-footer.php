<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
} 
/**
 * HFE juanjimeneztj theme compatibility.
 */
class juanjimeneztj_Elementor_Header_Footer {
	/**
	* @var null
	*/
	private static $instance = null;
	/**
	* Instance Control
	*/
	public static function get_instance() {
		if ( is_null(  self::$instance ) ) {
			self::$instance = new self();
			add_action( 'after_setup_theme', array( self::$instance, 'init' ), 30 );
		}
		return self::$instance;
	}
	/**
	 * Check for use. Then
	 * Run all the Actions / Filters.
	 */
	public function init() {
		add_theme_support( 'header-footer-elementor' );
		if ( function_exists( 'hfe_header_enabled' ) ) {
			if ( hfe_header_enabled() ) {
				add_action( 'template_redirect', array( $this, 'juanjimeneztj_remove_header' ), 10 );
				add_action( 'juanjimeneztj_header', 'hfe_render_header' );
			}
		}
		if ( function_exists( 'hfe_footer_enabled' ) ) {
			if ( hfe_footer_enabled() ) {
				add_action( 'template_redirect', array( $this, 'juanjimeneztj_remove_footer' ), 10 );
				add_action( 'juanjimeneztj_footer', 'hfe_render_footer' );
			}
		}
	}
	/**
	 * Disable header from the theme.
	 */
	public function juanjimeneztj_remove_header() {
		remove_action( 'juanjimeneztj_header', 'juanjimeneztj_header_markup' );
	}
	/**
	 * Disable footer from the theme.
	 */
	public function juanjimeneztj_remove_footer() {
		remove_action( 'juanjimeneztj_footer', 'juanjimeneztj_footer_markup' );
	}
}
juanjimeneztj_Elementor_Header_Footer::get_instance();