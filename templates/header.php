<?php 

// Depreciated will be removed soon.

$juanjimeneztj = juanjimeneztj_get_options();
if(isset($juanjimeneztj['site_layout'])) {
    $site_layout = $juanjimeneztj['site_layout'];
} else {
    $site_layout = 'above';
}
if($site_layout == 'left' || $site_layout == 'right') {
	get_template_part('templates/header-vertical');
} else {
	get_template_part('templates/header-above');
}
get_template_part('templates/header-mobile');
?>