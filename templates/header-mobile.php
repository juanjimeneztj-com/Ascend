<?php 
$juanjimeneztj = juanjimeneztj_get_options();

  	if(isset($juanjimeneztj['mobile_header_sticky']) && 1 == $juanjimeneztj['mobile_header_sticky']) {
    	$sticky = '1'; 
  	} else {
    	$sticky = '0';
  	}
?>
<div id="kad-mobile-banner" class="banner mobile-headerclass" data-mobile-header-sticky="<?php echo esc_attr($sticky);?>">
<?php 
        do_action('juanjimeneztj_mobile_header_top');
	?>
  <div class="container mobile-header-container kad-mobile-header-height">
        <?php 
        /* 
        * Hooked juanjimeneztj_mobile_left 20
        */
        do_action('juanjimeneztj_mobile_header_left');

        /* 
        * Hooked juanjimeneztj_mobile_center 20
        */
        do_action('juanjimeneztj_mobile_header_center');

        /* 
        * Hooked juanjimeneztj_mobile_right 20
        */
        do_action('juanjimeneztj_mobile_header_right'); 

        ?>
    </div> <!-- Close Container -->
</div>