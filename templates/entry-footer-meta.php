<?php 
$juanjimeneztj = juanjimeneztj_get_options();
echo '<meta itemscope itemprop="mainEntityOfPage" content="'.esc_url( get_the_permalink() ).'" itemType="https://schema.org/WebPage" itemid="'.esc_url( get_the_permalink() ).'">';
echo '<meta itemprop="dateModified" content="'.esc_attr( get_the_modified_date('c') ).'">';
echo '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
	if ( isset( $juanjimeneztj['juanjimeneztj_logo']['url'] ) && !empty( $juanjimeneztj['juanjimeneztj_logo']['url'] ) ) {  
		echo '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
		echo '<meta itemprop="url" content="'.esc_attr( $juanjimeneztj['juanjimeneztj_logo']['url'] ).'">';
		echo '<meta itemprop="width" content="'.esc_attr( $juanjimeneztj['juanjimeneztj_logo']['width'] ).'">';
		echo '<meta itemprop="height" content="'.esc_attr( $juanjimeneztj['juanjimeneztj_logo']['height'] ).'">';
		echo '</div>';
	}
	echo '<meta itemprop="name" content="'.esc_attr( get_bloginfo('name') ).'">';
echo '</div>';