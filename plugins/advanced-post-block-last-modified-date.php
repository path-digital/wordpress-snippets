<?php
/**
 * Advanced Post Block (free, tested on v2.5.3): show the last modified date on post cards.
 * The block loads its cards through the "apbPosts" AJAX request and formats the date with
 * get_the_date(), so this filter only runs during that request. Nothing else on the site changes.
 * Pair with the block's own Order By → Last Modified setting.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere" (or child theme functions.php).
 * Re-check after plugin updates.
 * Docs: https://developer.wordpress.org/reference/hooks/get_the_date/
 * By Path Digital Services — https://pathdigitalservices.com
 */
add_filter( 'get_the_date', function ( $the_date, $format, $post ) {
    if ( wp_doing_ajax() && isset( $_POST['action'] ) && 'apbPosts' === $_POST['action'] ) {
        $modified = get_the_modified_date( $format, $post );
        if ( $modified ) {
            return $modified;
        }
    }
    return $the_date;
}, 10, 3 );
