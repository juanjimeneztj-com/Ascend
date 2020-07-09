<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_pagesetting_metaboxes');
function juanjimeneztj_pagesetting_metaboxes(){
	$prefix = '_kad_';

	$juanjimeneztj_pagesettings = new_cmb2_box( array(
		'id'         	=> 'pagesetting_metabox',
		'title'      	=> __("Page Settings", 'juanjimeneztj'),
		'object_types'  => array('page'),
		'priority'   	=> 'low',
		'context'      	=> 'side',
	) );
	
	$juanjimeneztj_pagesettings->add_field( array(
		'name'    => __("Page Title Area", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_hide',
		'type'    => 'select',
		'options' => array(
			'default' 	=> __("Default", 'juanjimeneztj' ),
			'show' 		=> __("Show", 'juanjimeneztj' ),
			'hide' 		=> __("Hide", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_pagesettings->add_field( array(
		'name'    => __("Page Content Width", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'page_content_width',
		'type'    => 'select',
		'options' => array(
			'default' 	=> __("Default", 'juanjimeneztj' ),
			'contained' => __("Contained", 'juanjimeneztj' ),
			'full' 		=> __("Fullwidth", 'juanjimeneztj' ),
		),
	) );


}