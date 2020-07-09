<?php
/**
 * Initial setup functions
 *
 * @package juanjimeneztj Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Initial setup
 */
function juanjimeneztj_setup() {
	global $pagenow;
	$juanjimeneztj = juanjimeneztj_get_options();
	if ( isset( $juanjimeneztj['above_header_style'] ) && 'center' === $juanjimeneztj['above_header_style'] && isset( $juanjimeneztj['site_layout'] ) && 'above' === $juanjimeneztj['site_layout'] ) {
		register_nav_menus(array(
			'left_navigation'      => __( 'Left Navigation', 'juanjimeneztj' ),
			'right_navigation'     => __( 'Right Navigation', 'juanjimeneztj' ),
			'secondary_navigation' => __( 'Secondary Navigation', 'juanjimeneztj' ),
			'mobile_navigation'    => __( 'Mobile Navigation', 'juanjimeneztj' ),
			'topbar_navigation'    => __( 'Topbar Navigation', 'juanjimeneztj' ),
			'footer_navigation'    => __( 'Footer Navigation', 'juanjimeneztj' ),
		));
	} else {
		register_nav_menus(array(
			'primary_navigation'   => __( 'Primary Navigation', 'juanjimeneztj' ),
			'secondary_navigation' => __( 'Secondary Navigation', 'juanjimeneztj' ),
			'mobile_navigation'    => __( 'Mobile Navigation', 'juanjimeneztj' ),
			'topbar_navigation'    => __( 'Topbar Navigation', 'juanjimeneztj' ),
			'footer_navigation'    => __( 'Footer Navigation', 'juanjimeneztj' ),
		));
	}

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'quote' ) );
	add_theme_support( 'automatic-feed-links' );
	add_editor_style( '/assets/css/kt-editor-style.css' );
	add_post_type_support( 'attachment', 'page-attributes' );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'custom-logo', array(
		'flex-width'  => true,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-background' );
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	define( 'juanjimeneztj_VERSION', '1.3.7' );
	// Square.
	add_image_size( 'juanjimeneztj-600x600', 600, 600, true );
	// portrait.
	add_image_size( 'juanjimeneztj-540x620', 540, 620, true );
	// landscape.
	add_image_size( 'juanjimeneztj-720x480', 720, 480, true );
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Primary Color', 'juanjimeneztj' ),
			'slug'  => 'juanjimeneztj-primary',
			'color' => ( isset( $juanjimeneztj['primary_color'] ) && ! empty( $juanjimeneztj['primary_color'] ) ? $juanjimeneztj['primary_color'] : '#16A085' ),
		),
		array(
			'name'  => esc_html__( 'Lighter Primary Color', 'juanjimeneztj' ),
			'slug'  => 'juanjimeneztj-primary-light',
			'color' => ( isset( $juanjimeneztj['primary_color'] ) && ! empty( $juanjimeneztj['primary_color'] ) ? juanjimeneztj_adjust_brightness( $juanjimeneztj['primary_color'], 20 ) : juanjimeneztj_adjust_brightness( '#16A085', 20 ) ),
		),
		array(
			'name'  => esc_html__( 'Very light gray', 'juanjimeneztj' ),
			'slug'  => 'very-light-gray',
			'color' => '#eee',
		),
		array(
			'name'  => esc_html__( 'White', 'juanjimeneztj' ),
			'slug'  => 'white',
			'color' => '#fff',
		),
		array(
			'name'  => esc_html__( 'Very dark gray', 'juanjimeneztj' ),
			'slug'  => 'very-dark-gray',
			'color' => '#444',
		),
		array(
			'name'  => esc_html__( 'Black', 'juanjimeneztj' ),
			'slug'  => 'black',
			'color' => '#000',
		),
	) );
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'juanjimeneztj_setup' );


/**
 * Page titles
 */
function juanjimeneztj_title() {
	if ( is_home() ) {
		if ( get_option( 'page_for_posts', true ) ) {
			$title = get_the_title( get_option( 'page_for_posts', true ) );
		} else {
			$title = __( 'Latest Posts', 'juanjimeneztj' );
		}
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} elseif ( is_search() ) {
		/* translators: %s: search term */
		$title = sprintf( __( 'Search Results for %s', 'juanjimeneztj' ), get_search_query() );
	} elseif ( is_404() ) {
		$title = __('Not Found', 'juanjimeneztj');
	} else {
		$title = get_the_title();
  	}
	return apply_filters( 'juanjimeneztj_title', $title );
}
add_filter( 'get_the_archive_title', 'juanjimeneztj_filter_archive_title' );
function juanjimeneztj_filter_archive_title( $title ){
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		/* translators: %s: author name */
		$title = sprintf( __( 'Author: %s', 'juanjimeneztj' ), get_the_author() );
	} elseif ( is_day() ) {
		/* translators: %s: day */
		$title = sprintf( __( 'Day: %s', 'juanjimeneztj' ), get_the_date() );
	} elseif ( is_month() ) {
		/* translators: %s: month */
		$title = sprintf( __( 'Month: %s', 'juanjimeneztj' ), get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		/* translators: %s: year */
		$title = sprintf( __( 'Year: %s', 'juanjimeneztj' ), get_the_date( 'Y' ) );
	} elseif ( is_tax( array( 'product_cat', 'product_tag' ) ) ) {
		$title = single_term_title( '', false );
	} elseif ( $term ) {
		$title = $term->name;
	} elseif ( function_exists( 'is_bbpress' ) ) {
		if ( is_bbpress() ) {
			$title = bbp_title();
		}
	} elseif ( function_exists( 'tribe_is_month') ) {
		if( tribe_is_month() ) {
			$title = tribe_get_event_label_plural();
		}
	}
	return $title;
}
