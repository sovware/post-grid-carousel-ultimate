<?php
if (!function_exists('pgcu_get_paged_num')) {
    /**
     * Get current page number for the pagination.
     *
     * @since    1.0.0
     *
     * @return    int    $paged    The current page number for the pagination.
     */
    function pgcu_get_paged_num()
    {

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
