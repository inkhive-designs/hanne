<?php
//Function to Trim Excerpt Length & more..
function hanne_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'hanne_excerpt_length', 999 );

function hanne_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'hanne_excerpt_more' );