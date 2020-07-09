<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_blog_page_metaboxes');
function juanjimeneztj_blog_page_metaboxes(){
	$prefix = '_kad_';
	$juanjimeneztj_blog_page = new_cmb2_box( array(
		'id'         	=> 'blog_template_metabox',
		'title'      	=> __('Blog Options', 'juanjimeneztj'),
		'object_types'  => array('page'),
		'show_on' 		=> array('key' => 'blog-page'),
		'priority'   	=> 'high',
	) );
	$juanjimeneztj_blog_page->add_field( array(
		'name' => __('Blog Category', 'juanjimeneztj'),
		'desc' 	=> __('Select all blog posts or a specific category to show', 'juanjimeneztj'),
		'id'   	=> $prefix . 'blog_cat',
		'type' => 'kt_select_category',
	) );
	$juanjimeneztj_blog_page->add_field( array(
		'name'    => __('Order Items By', 'juanjimeneztj'),
		'desc'    => '',
		'id'      => $prefix . 'blog_order',
		'type'    => 'select',
		'default' => '',
		'options' => array(
			'date' 			=> __('Date', 'juanjimeneztj' ),
			'menu_order' 	=> __('Menu Order', 'juanjimeneztj' ),
			'title' 		=> __('Title', 'juanjimeneztj' ),
			'rand' 			=> __('Random', 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_blog_page->add_field( array(
		'name'    => __('How Many Posts Per Page', 'juanjimeneztj'),
		'desc'    => '',
		'id'      => $prefix . 'blog_items',
		'type'    => 'select',
		'default' => '10',
		'options' => array(
			'all' 	=> __('All', 'juanjimeneztj' ),
			'2' 	=> __('2', 'juanjimeneztj' ),
			'3' 	=> __('3', 'juanjimeneztj' ),
			'4' 	=> __('4', 'juanjimeneztj' ),
			'5' 	=> __('5', 'juanjimeneztj' ),
			'6' 	=> __('6', 'juanjimeneztj' ),
			'7' 	=> __('7', 'juanjimeneztj' ),
			'8' 	=> __('8', 'juanjimeneztj' ),
			'9' 	=> __('9', 'juanjimeneztj' ),
			'10' 	=> __('10', 'juanjimeneztj' ),
			'11' 	=> __('11', 'juanjimeneztj' ),
			'12' 	=> __('12', 'juanjimeneztj' ),
			'13' 	=> __('13', 'juanjimeneztj' ),
			'14' 	=> __('14', 'juanjimeneztj' ),
			'15' 	=> __('15', 'juanjimeneztj' ),
			'16' 	=> __('16', 'juanjimeneztj' ),
			'17' 	=> __('17', 'juanjimeneztj' ),
			'18' 	=> __('18', 'juanjimeneztj' ),
			'19' 	=> __('19', 'juanjimeneztj' ),
			'20' 	=> __('20', 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_blog_page->add_field( array(
		'name'    => __('Post output style', 'juanjimeneztj'),
		'desc'    => '',
		'id'      => $prefix . 'blog_type',
		'type'    => 'select',
		'default' => 'normal',
		'options' => array(
			'normal' 		=> __('Standard', 'juanjimeneztj' ),
			'below_title' 	=> __('Standard with image below title', 'juanjimeneztj' ),
			'full' 			=> __('Full Post', 'juanjimeneztj' ),
			'grid' 			=> __('Grid', 'juanjimeneztj' ),
			'grid_standard' => __('Grid with first post as standard', 'juanjimeneztj' ),
			'photo' 		=> __('Photo', 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_blog_page->add_field( array(
		'name'    => __('If grid or photo layout choose columns:', 'juanjimeneztj'),
		'desc'    => '',
		'id'      => $prefix . 'blog_columns',
		'type'    => 'select',
		'options' => array(
			'4' 	=> __('Four Columns', 'juanjimeneztj' ),
			'3' 	=> __('Three Columns', 'juanjimeneztj' ),
			'2' 	=> __('Two Columns', 'juanjimeneztj' ),
		),
	) );
}