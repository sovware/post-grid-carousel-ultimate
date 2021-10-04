<?php
if ( ! function_exists('pgcu_get_paged_num') ) {
    /**
     * Get current page number for the pagination.
     *
     * @since    1.0.0
     *
     * @return    int    $paged    The current page number for the pagination.
     */
    function pgcu_get_paged_num() {

        global $paged;

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } else if (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        return absint($paged);

    }

}

if ( ! function_exists('pgcu_load_dependencies') ) {
    function pgcu_load_dependencies( $files = 'all', $directory = PGCU_INC_DIR, $ext = '.php' )
    {
        if ( ! file_exists( $directory ) ) return; // vail if the directory does not exist

        switch( $files ) {
            case is_array( $files ) && 'all' !== strtolower( $files[0] ):
                // include one or more file looping through the $files array
                load_some_file( $files, $directory );
                break;
            case ! is_array( $files ) && 'all' !== $files:
                //load a single file here
                ( file_exists( $directory . $files . $ext ) ) ? require_once $directory . $files . $ext : null;
                break;
            case 'all' == $files || 'all' == strtolower( $files[0] ):
                // load all php file here
                load_all_files( $directory );
                break;
        }

        return false;

    }
}

if ( ! function_exists('load_all_files') ) {
    function load_all_files( $dir = '', $ext = '.php' )
    {
        if ( ! file_exists( $dir ) ) return;
        foreach ( scandir( $dir ) as $file ) {
            // require once all the files with the given ext. eg. .php
            if ( preg_match( "/{$ext}$/i", $file ) ) {
                require_once( $dir . $file );
            }
        }
    }
}
 
if( ! function_exists('pgcu_pagination') ) {
    /**
     * Prints pagination for custom post
     * @param object|WP_Query $custom_post_query
     * @param int $paged
     *
     * @return string
     */
    function pgcu_pagination( $custom_post_query, $paged = 1 )
    {
        $navigation = '';
        $largeNumber = 999999999; // we need a large number here
        $links = paginate_links( array(
            'base' => str_replace( $largeNumber, '%#%', esc_url( get_pagenum_link( $largeNumber ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $paged ),
            'total' => $custom_post_query->max_num_pages,
            'prev_text' => apply_filters('pgcu_pagination_prev_text', '<img src="' .  PGCU_URL . 'assets/img/arrow-left.svg" alt="" class="wpcu-svg">'),
            'next_text' => apply_filters('pgcu_pagination_next_text', '<img src="' .  PGCU_URL . 'assets/img/arrow-right.svg" alt="" class="wpcu-svg">'),
        ) );
        if( $links ) {
            $navigation = _navigation_markup($links, 'pagination', ' ');
        }
        return apply_filters('pgcu_pagination', $navigation, $links, $custom_post_query, $paged);
    }
}
