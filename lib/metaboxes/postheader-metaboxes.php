<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_postheader_metaboxes');
function juanjimeneztj_postheader_metaboxes(){
	$prefix = '_kad_';

	$juanjimeneztj_postheader = new_cmb2_box( array(
		'id'         	=> 'post_header_metabox',
		'title'      	=> __("Post Title and Subtitle", 'juanjimeneztj'),
		'object_types'  => array( 'product', 'post', 'portfolio', 'tribe_events', 'recipe'),
		'priority'   	=> 'default',
	) );
	
	$juanjimeneztj_postheader->add_field( array(
		'name'    => __("Hide Page Title Area", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_hide',
		'type'    => 'select',
		'options' => array(
			'default' 	=> __("Default", 'juanjimeneztj' ),
			'show' 		=> __("Show", 'juanjimeneztj' ),
			'hide' 		=> __("Hide", 'juanjimeneztj' ),
		),
	) );

}