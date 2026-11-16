<?php
/**
 * Blocksy (or any theme): order the blog index and category archives by last modified date.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere" (or child theme functions.php).
 * Pair with Blocksy Customizer → Post Meta → show "Updated Date", hide "Published Date"
 * (Blog Posts → Card Elements, and Single Post → Post Title).
 * Docs: https://developer.wordpress.org/reference/hooks/pre_get_posts/
 * By Path Digital Services — https://pathdigitalservices.com
 */
add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_category() ) ) {
        $query->set( 'orderby', 'modified' );
        $query->set( 'order', 'DESC' );
    }
} );
