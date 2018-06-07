<?php

if ( ! function_exists( 'kvell_edge_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function kvell_edge_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'kvell' );

        return $search_type_options;
    }

    add_filter( 'kvell_edge_search_type_global_option', 'kvell_edge_set_search_slide_from_hb_global_option' );
}