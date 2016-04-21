<?php
//
// Your code goes below!
//
function woss_rook_child_theme() {
    wp_enqueue_style( 'rook-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'rook-style', get_stylesheet_uri(), array( 'rook-parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'woss_rook_child_theme' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
register_sidebar(array(
    'name'=> 'eCommerce',
    'id' => 'ecommerce',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="offscreen">',
    'after_title' => '</h2>',
));
function print_custom_css() {
    echo '
    <style>
        .woocommerce form .form-row input.input-text {
            height: 2.8em;
            padding: 0 .5em;
        }
         .woocommerce form .form-row textarea.input-text{
            height: 5.5em;
            padding: .5em;
        }
        .woocommerce-info {
            display: none;
        }
    </style>
    ';
}
add_action( 'wp_head', 'print_custom_css' );
