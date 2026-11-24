<?php
/**
 * Divi: order every Blog Module on the site by last modified date.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere" (or child theme functions.php).
 * Note: applies to all Blog Modules, not just one.
 * Docs: https://help.elegantthemes.com/en/articles/4532770-how-to-change-the-default-sorting-order-of-posts-in-the-blog-module
 * By Path Digital Services — https://pathdigitalservices.com
 */
add_filter( 'et_builder_blog_query', function( $query, $args ) {
    $query->query_vars['orderby'] = 'modified';
    $query->query_vars['order']   = 'desc';
    return new WP_Query( $query->query_vars );
}, 10, 2 );
