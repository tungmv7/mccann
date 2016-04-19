<?php
//
// Your code goes below!
//
function woss_rook_child_theme() {
    wp_enqueue_style( 'rook-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'rook-style', get_stylesheet_uri(), array( 'rook-parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'woss_rook_child_theme' );