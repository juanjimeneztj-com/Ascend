<?php 
/* 
* Tempate page content
*/
do_action('juanjimeneztj_page_content_before'); 
	while (have_posts()) : the_post(); 
		the_content(); 
		wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>')); 
	endwhile; 
do_action('juanjimeneztj_page_content_after'); 