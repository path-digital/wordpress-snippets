<?php
/**
 * Divi: show the last modified date in the Post Title module's byline (single posts).
 * Divi builds that byline with its own function, et_pb_postinfo_meta(), so the get_the_date
 * filter doesn't reach it. This replaces that function with a copy that prints the modified date.
 * Where: Code Snippets plugin → PHP → "Run snippet everywhere". Code Snippets loads before the
 * theme, so this version is used in place of Divi's.
 * Pair with divi/show-last-modified-date.php and divi/order-blog-module-by-last-modified.php.
 * Re-check after major Divi updates.
 * By Path Digital Services — https://pathdigitalservices.com
 */
if ( ! function_exists( 'et_pb_postinfo_meta' ) ) :
function et_pb_postinfo_meta( $postinfo, $date_format, $comment_zero, $comment_one, $comment_more ) {
    $postinfo_meta = '';

    if ( in_array( 'author', $postinfo ) )
        $postinfo_meta .= ' ' . esc_html__( 'by', 'et_builder' ) . ' <span class="author vcard">' . et_pb_get_the_author_posts_link() . '</span>';

    if ( in_array( 'date', $postinfo ) ) {
        if ( in_array( 'author', $postinfo ) ) $postinfo_meta .= ' | ';
        $postinfo_meta .= '<span class="published">' . esc_html( get_the_modified_date( wp_unslash( $date_format ) ) ) . '</span>';
    }

    if ( in_array( 'categories', $postinfo ) ) {
        $categories_list = get_the_category_list( ', ' );
        if ( '' !== $categories_list ) {
            if ( in_array( 'author', $postinfo ) || in_array( 'date', $postinfo ) ) $postinfo_meta .= ' | ';
            $postinfo_meta .= $categories_list;
        }
    }

    if ( in_array( 'comments', $postinfo ) ) {
        if ( in_array( 'author', $postinfo ) || in_array( 'date', $postinfo ) || in_array( 'categories', $postinfo ) ) $postinfo_meta .= ' | ';
        $postinfo_meta .= et_pb_get_comments_popup_link( $comment_zero, $comment_one, $comment_more );
    }

    return $postinfo_meta;
}
endif;
