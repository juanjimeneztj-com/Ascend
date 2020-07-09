<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'juanjimeneztj_archive_title_container', 'juanjimeneztj_archive_title', 20 );
function juanjimeneztj_archive_title() {
	if(juanjimeneztj_display_pagetitle()){
		get_template_part('/templates/archive', 'header'); 
	} else {
		if( juanjimeneztj_display_archive_breadcrumbs()) { 
			echo '<div class="kt_bc_nomargin">';
				juanjimeneztj_breadcrumbs(); 
			echo '</div>';
		}
	}
}
