<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_post_metaboxes');
function juanjimeneztj_post_metaboxes(){
	$prefix = '_kad_';
	$juanjimeneztj_standard_post = new_cmb2_box( array(
		'id'         	=> 'standard_post_metabox',
		'title'      	=> __("Standard Post Options", 'juanjimeneztj'),
		'object_types'  => array('post'),
		'priority'   	=> 'high',
	) );
	$juanjimeneztj_standard_post->add_field( array(
		'name'    => __("Post Summary", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'post_summery',
		'type'    => 'select',
		'options' => array(
			'default' 		=> __('Standard Post Default', 'juanjimeneztj' ),
			'text' 			=> __('Text', 'juanjimeneztj' ),
			'img_portrait' 	=> __('Portrait Image', 'juanjimeneztj'),
			'img_landscape' => __('Landscape Image', 'juanjimeneztj'),
			),
	) );
	// IMAGE POST //
	$juanjimeneztj_image_post = new_cmb2_box( array(
		'id'         	=> 'image_post_metabox',
		'title'      	=> __("Image Post Options", 'juanjimeneztj'),
		'object_types'  => array( 'post' ),
		'priority'   	=> 'high',
		) );
	
	$juanjimeneztj_image_post->add_field( array(
		'name'    => __("Head Content", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'image_blog_head',
		'type'    => 'select',
		'options' => array(
			'default' 	=> __("Image Post Default", 'juanjimeneztj' ),
			'image' 	=> __("Image", 'juanjimeneztj' ),
			'none' 		=> __("None", 'juanjimeneztj' ),
			),
	) );
	$juanjimeneztj_image_post->add_field( array(
		'name' => __("Max Image Height", 'juanjimeneztj' ),
		'desc' => __("Note: just input number, example: 350", 'juanjimeneztj' ),
		'id'   => $prefix . 'image_posthead_height',
		'type' => 'text_small',
	) );
	$juanjimeneztj_image_post->add_field( array(
		'name' => __("Max Image Width", 'juanjimeneztj' ),
		'desc' => __("Note: just input number, example: 650", 'juanjimeneztj' ),
		'id'   => $prefix . 'image_posthead_width',
		'type' => 'text_small',
	) );

	$juanjimeneztj_image_post->add_field( array(
		'name'    => __("Post Summary", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'image_post_summery',
		'type'    => 'select',
		'options' => array(
			'default' 		=> __('Image Post Default', 'juanjimeneztj' ),
			'text' 			=> __('Text', 'juanjimeneztj' ),
			'img_portrait' 	=> __('Portrait Image', 'juanjimeneztj'),
			'img_landscape' => __('Landscape Image', 'juanjimeneztj'),
		),
	) );
	
	// NORMAL 
	$juanjimeneztj_post = new_cmb2_box( array(
		'id'         	=> 'post_metabox',
		'title'      	=> __("Post Options", 'juanjimeneztj'),
		'object_types'  => array( 'post'),
		'priority'   	=> 'high',
	));
	$juanjimeneztj_post->add_field( array(
		'name' 		=> __('Author Info', 'juanjimeneztj'),
		'desc' 		=> __('Display an author info box?', 'juanjimeneztj'),
		'id'   		=> $prefix . 'blog_author',
		'type'    	=> 'select',
		'options' 	=> array(
			'default' 	=> __('Default', 'juanjimeneztj'),
			'no' 		=> __('No', 'juanjimeneztj'),
			'yes' 		=> __('Yes', 'juanjimeneztj'),
			),
	) );
	$juanjimeneztj_post->add_field( array(
		'name' 		=> __('Posts Carousel', 'juanjimeneztj'),
		'desc' 		=> __('Display a carousel with similar or recent posts?', 'juanjimeneztj'),
		'id'   		=> $prefix . 'blog_carousel_similar',
		'type'    	=> 'select',
		'options' 	=> array(
			'default' 	=> __('Default', 'juanjimeneztj'),
			'no' 		=> __('No', 'juanjimeneztj'),
			'recent' 	=> __('Yes - Display Recent Posts', 'juanjimeneztj'),
			'similar' 	=> __('Yes - Display Similar Posts', 'juanjimeneztj'),
			),
		
	) );

}