<?php
/**
 * Divi (or any theme that prints dates with get_the_date()): show a post's
 * last modified date wherever its published date would appear.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere" (or child theme functions.php).
 * Untouched posts keep their original date, because WordPress only changes the
 * modified date when you save a real edit.
 * Tip: add an "Originally published [date]" line at the top of refreshed posts.
 * Docs: https://developer.wordpress.org/reference/hooks/get_the_date/
 * By Path Digital Services — https://pathdigitalservices.com
 */
add_filter( 'get_the_date', function( $the_date, $format, $post ) {
    if ( 'post' === get_post_type( $post ) && ! is_admin() ) {
        return get_the_modified_date( $format, $post );
    }
    return $the_date;
}, 10, 3 );
