<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_sidebar_metaboxes');
function juanjimeneztj_sidebar_metaboxes(){
	$prefix = '_kad_';
	$juanjimeneztj_sidebar = new_cmb2_box( array(
		'id'         	=> 'sidebar_post_metabox',
		'title'      	=> __("Sidebar Options", 'juanjimeneztj'),
		'object_types' 	=> juanjimeneztj_all_custom_posts(),
		'priority'   	=> 'low',
		'context'      	=> 'side',
	) );
	$juanjimeneztj_sidebar->add_field( array(
		'name' 		=> __('Display Sidebar?', 'juanjimeneztj'),
		'id'   		=> $prefix . 'post_sidebar',
		'type'    	=> 'select',
		'options' 	=> array(
			'default' 	=> __('Default', 'juanjimeneztj'),
			'yes' 		=> __('Yes', 'juanjimeneztj'),
			'no'		 => __('No', 'juanjimeneztj'),
			),
	) );
	$juanjimeneztj_sidebar->add_field( array(
		'name'    => __('Choose Sidebar', 'juanjimeneztj'),
		'desc'    => '',
		'id'      => $prefix . 'sidebar_choice',
		'type'    => 'select',
		'options' => juanjimeneztj_cmb_sidebar_options(),
	) );
}