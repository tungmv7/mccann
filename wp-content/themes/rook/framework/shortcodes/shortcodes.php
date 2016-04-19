<?php

define('TH_SHORTCODES', dirname( __FILE__ ));

// Add TinyMCE Button

add_action('init', 'woss_add_tinymce_button');

function woss_add_tinymce_button() {
    //if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php') || strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')) {
    add_filter('mce_external_plugins', 'woss_add_tinymce_plugin');
    add_filter('mce_buttons', 'woss_register_tinymce_button');
    //}
}

function woss_register_tinymce_button($buttons) {
    array_push($buttons, 'separator', "woss_shortcodes_button");
    //array_push($buttons, "woss_visual_button");
    return $buttons;
}

function woss_add_tinymce_plugin($plugin_array) {
    $plugin_array['woss_shortcodes_button'] = get_template_directory_uri() . '/framework/shortcodes/tinymce/tinymce-quick-shortcodes.js';
    //$plugin_array['woss_visual_button'] = get_template_directory_uri() . '/framework/shortcodes/tinymce/tinymce-visual-shortcodes.js';
    return $plugin_array;
}