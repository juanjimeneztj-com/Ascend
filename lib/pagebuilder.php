<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Extend - Site Origin Panels 
 */
add_filter('siteorigin_panels_full_width_container', 'juanjimeneztj_fullwidth_container_id');
function juanjimeneztj_fullwidth_container_id($tag) {
	if($tag == 'body') {
		$tag = '#inner-wrap';
	}
	return $tag;
}

