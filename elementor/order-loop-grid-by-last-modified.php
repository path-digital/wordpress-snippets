<?php
/**
 * Elementor Pro: order one Loop Grid (or Posts widget) by last modified date.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere" (or child theme functions.php).
 * Setup: select the widget → Content → Query → Query ID → type my-blog-grid
 * (or your own ID; it must match the hook name below exactly). Only that widget changes.
 * Display: no code needed. Set the card's date dynamic tag Type to "Post Modified".
 * Docs: https://developers.elementor.com/docs/hooks/custom-query-filter/
 * By Path Digital Services — https://pathdigitalservices.com
 */
add_action( 'elementor/query/my-blog-grid', function( $query ) {
    $query->set( 'orderby', 'modified' );
    $query->set( 'order', 'DESC' );
} );
