<?php 
$juanjimeneztj = juanjimeneztj_get_options();
if(isset($juanjimeneztj['site_layout'])) {
    $site_layout = $juanjimeneztj['site_layout'];
} else {
    $site_layout = 'left';
}

?>
<aside id="kad-vertical-menu" class="asideclass kad-vertical-menu kt-header-position-<?php echo esc_attr($site_layout); ?>">
    <div class="kad-vertical-menu-inner">
        <div class="kad-scrollable-area">
            <div class="kad-fixed-vertical-background-area"></div>
            <div class="kad-relative-vertical-content">
                <?php 
                /* 
		        * Hooked juanjimeneztj_the_custom_logo 10
		        * Hooked juanjimeneztj_header_vertical_extras 20
		        */
                do_action('juanjimeneztj_start_vertical_header'); 
    
                /* 
		        * Hooked juanjimeneztj_primary_vertical_menu 20
		        */
                do_action('juanjimeneztj_menu_vertical_header'); 

                /* 
		        * Hooked juanjimeneztj_header_vertical_extras 20
		        */
                do_action('juanjimeneztj_end_vertical_header'); ?>
            </div>
        </div>
    </div> <!-- close v header innner -->
</aside>
 <?php 
/* 
    * Hooked juanjimeneztj_secondary_menu 20
    */
do_action('juanjimeneztj_after_vertical_header'); 
?>