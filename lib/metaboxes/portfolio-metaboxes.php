<?php 
add_filter( 'cmb2_admin_init', 'juanjimeneztj_portfolio_template_metaboxes');
function juanjimeneztj_portfolio_template_metaboxes(){
	$prefix = '_kad_';
	$juanjimeneztj_portfolio_page = new_cmb2_box( array(
		'id'         	=> 'portfolio_page_metabox',
		'title'      	=> __("Portfolio Options", 'juanjimeneztj'),
		'object_types'  => array('page'),
		'show_on'      	=> array( 'key' => 'page-template', 'value' => 'template-portfolio-grid.php' ),
		'priority'   	=> 'high',
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Portfolio Style", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_style',
		'type'    => 'select',
		'default' => 'portfolio-grid',
		'options' => array(
			'pgrid' 			=> __("Normal Grid", 'juanjimeneztj' ),
			'pgrid-no-margin' 	=> __("Grid without margin between items", 'juanjimeneztj' ),
			'poststyle' 		=> __("Post style", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Image Ratio", 'juanjimeneztj' ),
		'desc'    => __("This doens't apply when using mosaic or tiles style.", 'juanjimeneztj' ),
		'id'      => $prefix . 'portfolio_ratio',
		'type'    => 'select',
		'default' => 'square',
		'options' => array(
			'square' 		=> __("Square", 'juanjimeneztj' ),
			'portrait' 		=> __("Portrait", 'juanjimeneztj' ),
			'landscape' 	=> __("Landscape", 'juanjimeneztj' ),
			'widelandscape' => __("Wide Landscape", 'juanjimeneztj' ),
			'softcrop' 		=> __("Inherit from uploaded image", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Columns", 'juanjimeneztj' ),
		'desc'    => __("This doens't apply when using mosaic or tiles style.", 'juanjimeneztj' ),
		'id'      => $prefix . 'portfolio_columns',
		'type'    => 'select',
		'default' => '3',
		'options' => array(
			'2' 	=> __("Two Columns", 'juanjimeneztj' ),
			'3' 	=> __("Three Columns", 'juanjimeneztj' ),
			'4' 	=> __("Four Columns", 'juanjimeneztj' ),
			'5' 	=> __("Five Columns", 'juanjimeneztj' ),
			'6' 	=> __("Six Columns", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name' 		=> __('Portfolio Type', 'juanjimeneztj'),
		'desc' 		=> '',
		'id'   		=> $prefix . 'portfolio_type',
		'type' 		=> 'kt_select_type',
		'taxonomy' 	=> 'portfolio-type',
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Items per Page", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_items',
		'type'    => 'select',
		'default' => '-1',
		'options' => array(
			'-1' 	=> __("All", 'juanjimeneztj' ),
			'2' 	=> __("2", 'juanjimeneztj' ),
			'3' 	=> __("3", 'juanjimeneztj' ),
			'4' 	=> __("4", 'juanjimeneztj' ),
			'5' 	=> __("5", 'juanjimeneztj' ),
			'6' 	=> __("6", 'juanjimeneztj' ),
			'7' 	=> __("7", 'juanjimeneztj' ),
			'8' 	=> __("8", 'juanjimeneztj' ),
			'9' 	=> __("9", 'juanjimeneztj' ),
			'10' 	=> __("10", 'juanjimeneztj' ),
			'11' 	=> __("11", 'juanjimeneztj' ),
			'12' 	=> __("12", 'juanjimeneztj' ),
			'13' 	=> __("13", 'juanjimeneztj' ),
			'14' 	=> __("14", 'juanjimeneztj' ),
			'15' 	=> __("15", 'juanjimeneztj' ),
			'16' 	=> __("16", 'juanjimeneztj' ),
			'17' 	=> __("17", 'juanjimeneztj' ),
			'18' 	=> __("18", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Order by", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_orderby',
		'type'    => 'select',
		'default' => 'menu_order',
		'options' => array(
			'menu_order' 	=> __("Menu Order", 'juanjimeneztj' ),
			'date' 			=> __("Date", 'juanjimeneztj' ),
			'title' 		=> __("Title", 'juanjimeneztj' ),
			'rand' 			=> __("Random", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Show Type?", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_types',
		'type'    => 'select',
		'default' => 'true',
		'options' => array(
			'true' 	=> __("Yes, enabled", 'juanjimeneztj' ),
			'false' => __("No, disabled", 'juanjimeneztj' ),
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Show Excerpt?", 'juanjimeneztj' ),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_excerpt',
		'type'    => 'select',
		'default' => 'false',
		'options' => array(
			'false' => __("No, disabled", 'juanjimeneztj' ),
			'true' 	=> __("Yes, enabled", 'juanjimeneztj' )
		),
	) );
	$juanjimeneztj_portfolio_page->add_field( array(
		'name'    => __("Add lightbox link?", 'juanjimeneztj' ),
		'desc'    => __("This adds a lightbox icon to post.", 'juanjimeneztj' ),
		'id'      => $prefix . 'portfolio_lightbox',
		'type'    => 'select',
		'default' => 'true',
		'options' => array(
			'true' 	=> __("Yes, enabled", 'juanjimeneztj' ),
			'false' => __("No, disabled", 'juanjimeneztj' ),
		),
	) );
}