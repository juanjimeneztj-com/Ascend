<?php 
$juanjimeneztj = juanjimeneztj_get_options();

if(isset($juanjimeneztj['postlinks_in_cat']) && $juanjimeneztj['postlinks_in_cat'] == "cat"){
	$cat_setting = true;
} else {
	$cat_setting = false;
}
?>
<div class="post-footer-section">
	<div class="kad-post-navigation clearfix">
	        <div class="alignleft kad-previous-link">
	        <?php previous_post_link('%link', '<span class="kt_postlink_meta kt_color_gray">'.__('Previous Post', 'juanjimeneztj').'</span><span class="kt_postlink_title">%title</span>', $in_same_term = $cat_setting); ?> 
	        </div>
	        <div class="alignright kad-next-link">
	        <?php next_post_link('%link', '<span class="kt_postlink_meta kt_color_gray">'.__('Next Post', 'juanjimeneztj').'</span><span class="kt_postlink_title">%title</span>', $in_same_term = $cat_setting); ?> 
	        </div>
	 </div> <!-- end navigation -->
 </div>