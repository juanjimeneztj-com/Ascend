<?php
/**
 * Custom functions
 *
 * @package juanjimeneztj Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Hex to RGB
 *
 * @param string $hex string hex code.
 */
function juanjimeneztj_hex2rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return $rgb;
}

/**
 * Hex adjust brightness
 *
 * @param string $hex string hex code.
 * @param int    $steps adjustment steps.
 */
function juanjimeneztj_adjust_brightness( $hex, $steps ) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter.
	$steps = max( -255, min( 255, $steps ) );

	// Normalize into a six character long hex string.
	$hex = str_replace( '#', '', $hex );
	if ( strlen( $hex ) == 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Split into three parts: R, G and B.
	$color_parts = str_split( $hex, 2 );
	$return      = '#';

	foreach ( $color_parts as $color ) {
		$color   = hexdec( $color ); // Convert to decimal.
		$color   = max( 0, min( 255, $color + $steps ) ); // Adjust color.
		$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code.
	}

	return $return;
}

/**
 * Schema type
 */
function juanjimeneztj_html_tag_schema() {
	$schema = 'http://schema.org/';

	if ( is_singular( 'post' ) ) {
		$type = 'WebPage';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}

	echo apply_filters( 'juanjimeneztj_html_schema', 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"' );
}

