  <?php 
    /**
    * Search Form
    */
    $juanjimeneztj = juanjimeneztj_get_options();
    if(!empty($juanjimeneztj['search_placeholder_text'])) {
        $searchtext = $juanjimeneztj['search_placeholder_text'];
    } else {
        $searchtext = __('Search &hellip;', 'juanjimeneztj');
    } ?>

   <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text"><?php _e('Search for:', 'juanjimeneztj'); ?></span>
                <input type="search" class="search-field" placeholder="<?php echo esc_attr($searchtext); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
            </label>
            <button type="submit" class="search-submit search-icon"><i class="kt-icon-search"></i></button>
    </form>