<?php

//
// Custom Visual Composer Scripts for a Theme Integration
//

vc_disable_frontend();

vc_remove_element('vc_raw_js');
//vc_remove_element('vc_wp_tagcloud');
//vc_remove_element('vc_wp_custommenu');
//vc_remove_element('vc_wp_pages');
//vc_remove_element('vc_wp_links');
//vc_remove_element('vc_posts_grid');
//vc_remove_element('vc_wp_search');
//vc_remove_element('vc_wp_meta');
//vc_remove_element('vc_wp_recentcomments');
//vc_remove_element('vc_wp_posts');
//vc_remove_element('vc_wp_text');
//vc_remove_element('vc_wp_categories');
//vc_remove_element('vc_wp_archives');
//vc_remove_element('vc_wp_rss');
//vc_remove_element('vc_wp_calendar');
vc_remove_element('vc_gmaps');
vc_remove_element('vc_posts_slider');
//vc_remove_element('vc_carousel');
//vc_remove_element('vc_posts_grid');

//vc_remove_element('vc_flickr');
//vc_remove_element('vc_pinterest');
//vc_remove_element('vc_button');
//vc_remove_element('vc_button2'); // do
vc_remove_element('vc_cta_button');
vc_remove_element('vc_cta_button2');
vc_remove_element('contact-form-7');



// VC Row

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => __("Row ID", "js_composer"),
    "param_name" => "el_id",
    "value" => "",
    "description" => __("Row's unique ID.", "js_composer")
));

// v. 4.9
vc_remove_param("vc_row","gap");
vc_remove_param("vc_row","equal_height");
vc_remove_param("vc_row","columns_placement");

vc_remove_param("vc_row","full_width");
vc_remove_param("vc_row","parallax");
vc_remove_param("vc_row","parallax_image");

// Since v. 1.5
vc_remove_param("vc_row","full_height");
vc_remove_param("vc_row","content_placement");
vc_remove_param("vc_row","video_bg");
vc_remove_param("vc_row","video_bg_url");
vc_remove_param("vc_row","video_bg_parallax");


vc_add_param("vc_row", array(
    'type' => 'dropdown',
    'heading' => __( 'Default section padding', 'js_composer' ),
    'param_name' => 'th_section_padding',
    'value' => array(
        __('Default','js_composer') => 'default',
        __('No, thanks','js_composer') => 'stretch_content',
    ),
    'description' => __( 'If is set to default, section will have padding-top and padding-bottom 70px.', 'js_composer' )
));

vc_add_param("vc_row", array(
        'type' => 'dropdown',
        'heading' => __( 'Row stretch', 'js_composer' ),
        'param_name' => 'th_full_width',
        'value' => array(
            __('Default','js_composer') => 'default',
            __('Stretch content','js_composer') => 'stretch_content',
            __('Stretch row and content','js_composer') => 'stretch_row_content',
            __('Content without spaces','js_composer') => 'content_no_spaces',
        ),
        'description' => __( 'Select stretching options for row and content. Stretched row overlay sidebar and may not work if parent container has overflow: hidden css property.', 'js_composer' )
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Section Background",
    "param_name" => "bg_section_color",
    "value" => array(
        "White" => "white",
        "Grey" => "grey",
        "Black" => "black",
        "Parallax" => "parallax",
    ),
    "description" => __("Choose the section background color or enable the parallax effect.", "js_composer"),
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => __("Parallax overlay opacity", "js_composer"),
    "param_name" => "parallax_opacity",
    "value" => "0.8",
	'dependency' => array(
                'element' => 'bg_section_color',
                'value' => 'parallax',
            ),
    "description" => __("Choose overlay opacity for parallax section.", "js_composer"),
));

vc_add_param("vc_row", array(
        'type' => 'colorpicker',
        'heading' => __( 'Custom overlay color', 'js_composer' ),
        'param_name' => 'overlay_color',
		"value" => "#111",
		'dependency' => array(
                'element' => 'bg_section_color',
                'value' => 'parallax',
            ),
        'description' => __( 'Choose your custom overlay color.', 'js_composer' ),
  ));

   

// Special Heading

vc_map( array(
    "name" => __("Special Heading", "js_composer"),
    "base" => "special_heading",
    "class" => "font-awesome",
    "icon" => "fa-header",
    "description" => "Centered heading text",
    "category" => 'Content',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", 'js_composer'),
            "param_name" => "title",
            "description" => __("Main heading text.", 'js_composer'),
			//'value' => __( 'This is a Special Heading', 'js_composer' ),
        ),
        array(
            "type" => "dropdown",
            "class" => "hidden-label",
            "heading" => __("Title Font", "js_composer"),
            "param_name" => "font",
            "value" => array(
                'Default' => 'default',
                'Without underline' => 'without_underline'
            ),
            "description" => __("Will work only if underline option is not checked.", "js_composer"),
            'dependency' => array(
                'element' => 'th_is_underline',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Text align', 'js_composer' ),
            'param_name' => 'th_text_align',
            'value' => array(
                __( 'Align center', 'js_composer' ) => 'text-center',
                __( 'Align left', 'js_composer' ) => 'text-left',
                __( 'Align right', 'js_composer' ) => "text-right",
                __( 'Justify', 'js_composer' ) => 'text-justify'
            ),
            'description' => __( 'Select text align.', 'js_composer' )
        )

    )
));

// Logos Carousel

vc_map( array(
    "name" => __("Logos Images", "js_composer"),
    "base" => "logos_images",
    "icon" => "fa-css3",
    "class" => "font-awesome",
    "category" => array("Carousels"),
    "description" => "Clients logos",
    "params" => array(
        array(
            'type' => 'attach_images',
            'heading' => __( 'Images', 'js_composer' ),
            'param_name' => 'images',
            'value' => '',
            'description' => __( 'Please select images from media library.', 'js_composer' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'On click', 'js_composer' ),
            'param_name' => 'onclick',
            'value' => array(
                __( 'Do nothing', 'js_composer' ) => 'link_no',
                __( 'Open custom link', 'js_composer' ) => 'custom_link'
            ),
            'description' => __( 'Define action for onclick event if needed.', 'js_composer' )
        ),
        array(
            'type' => 'exploded_textarea',
            'heading' => __( 'Custom links', 'js_composer' ),
            'param_name' => 'custom_links',
            'description' => __( 'Enter links for each logo here. Divide links with linebreaks (Enter) . ', 'js_composer' ),
            'dependency' => array(
                'element' => 'onclick',
                'value' => array( 'custom_link' )
            )
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Target", "js_composer"),
            "param_name" => "target",
            "value" => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank"),
            'dependency' => array(
                'element' => 'onclick',
                'value' => array( 'custom_link' )
            )
        ),
    )
));

// Team member

vc_map( array(
    "name" => __("Team Member", "js_composer"),
    "base" => "team_member",
    "class" => "font-awesome",
    "icon" => "fa-user",
    "category" => 'Content',
    "description" => "Add out team Member",
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Member Name", "js_composer"),
            "param_name" => "name",
            "value" => "John Doe",
            "description" => __("Member Name", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Job", "js_composer"),
            "param_name" => "position",
            "value" => "",
            "description" => __("Member Position.", "js_composer")
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => "Avatar",
            "param_name" => "src",
            "value" => "",
            "description" => __("Photo or avatar of member.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description", "js_composer"),
            "param_name" => "description",
            "value" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "description" => __("Short description about member.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Custom Field", "js_composer"),
            "param_name" => "custom_field",
            "value" => "CUSTOM FIELD",
            "description" => __("Short custom field about member. Will be displayed on caption.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Custom Description", "js_composer"),
            "param_name" => "custom_description",
            "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.",
            "description" => __("Custom description about member. Will be displayed on caption.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Facebook Url", "js_composer"),
            "param_name" => "facebook",
            "value" => "",
            "description" => __("Facebook Url to contact.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Twitter Url", "js_composer"),
            "param_name" => "twitter",
            "value" => "",
            "description" => __("Twitter Url to contact.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Linkedin", "js_composer"),
            "param_name" => "linkedin",
            "value" => "",
            "description" => __("Linkedin Url to contact.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Bahance", "js_composer"),
            "param_name" => "behance",
            "value" => "",
            "description" => __("Bahance Url to contact.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Email address", "js_composer"),
            "param_name" => "envelope",
            "value" => "",
            "description" => __("\"mailto: email@example.com\"  link that activates the default mail client on the computer for sending an e-mail. ", "js_composer")
        )
    )
));

// Google Map

vc_map( array(
    "name" => __("Google Map", "js_composer"),
    "base" => "gmap",
    "icon"      => "icon-wpb-map-pin",
    "category" => 'Content',
    "description" => "Map block",
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Location Latitude", "js_composer"),
            "param_name" => "lat",
            "value" => '40.712784',
            "description" => __("Please insert the map address latitude if you have problems displaying it. Helpful site: <a target='_blank' href='http://www.latlong.net/'>http://www.latlong.net/</a>", "js_composer")
        ),
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Location Longitude", "js_composer"),
            "param_name" => "long",
            "value" => '-74.005941',
            "description" => __("Please insert the map address longitude value.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Map Zoom", "js_composer"),
            "param_name" => "zoom",
            "value" => '15',
            "description" => __("Choose the map zoom. Default value: 15", "js_composer")
        ),
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Map Height", "js_composer"),
            "param_name" => "height",
            "value" => '600',
            "description" => __("Height of the map element in pixels.", "js_composer")
        ),
    )
));

// Blog Post Grid

$order_by_arr = array(__('None', "js_composer")=>'none', __('ID', "js_composer")=>'ID', __('Author', "js_composer")=>'author', __('Title', "js_composer")=>'title', __('Name', "js_composer")=>'name', __('Type', "js_composer")=>'type', __('Date', "js_composer")=>'date', __('Modified', "js_composer")=>'modified', __('Parent', "js_composer")=>'parent', __('Rand', "js_composer")=>'rand', __('Comment Count', "js_composer")=>'comment_count');
$blog_cats = get_terms('category', array('hide_empty' => false));
$cats_array = array();
foreach($blog_cats as $blog_cat) {
    $cats_array[$blog_cat->name] = $blog_cat->slug;
}

vc_map( array(
    "name" => __("Blog Grid", "js_composer"),
    "icon" => "fa-pencil",
    "base" => "blog-grid",
    "description" => "Grid layout for blog posts",
    "class" => "font-awesome",
    "category" => __("Content", "js_composer"),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Number of Blog Posts to Display. Use '-1' to include all your items.", "js_composer"),
            "param_name" => "number",
            "value" => 6,
            "description" => __("Set how many blog items would you like to include in the grid.", "js_composer")
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Select Categories", "js_composer"),
            "param_name" => "categories",
            "value" => $cats_array,
            "description" => __("Please select from which categories to display blog posts(mandatory).", "js_composer")
        ),

        array(
            "type"       => "textfield",
            "holder"     => "div",
            "class"      => "",
            "heading"    => __("Number text", "js_composer"),
            "param_name" => "number_text",
            "value"      => 30,
            "description"=> __("Number text you want to display from each post.", "js_composer"),
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            'value'=>array(
                __('Asc', "js_composer")=>'asc',
                __('Desc', "js_composer")=>'desc'
            ),
            'edit_field_class'=>'vc_col-sm-6'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Order By", "js_composer"),
            "param_name" => 'orderby',
            'value'=> $order_by_arr,
            'edit_field_class'=>'vc_col-sm-6'
        ),
    )
));

//Testimonials Carousel

vc_map( array(
    "name" => __("Testimonials Carousel", "js_composer"),
    "base" => "testimonials",
    "icon" => "fa-comments",
    "class" => "font-awesome",
    "category" => array("Carousels"),
    "description" => "Clients testimonials",
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Number of posts to show", "js_composer"),
            "param_name" => "posts_nr",
            "value" => "7"
        )
    )
));

// Icon Box

vc_map( array(
    'name' => __( 'Icon Box', 'js_composer' ),
    'base' => 'icon_box',
    'icon' => 'icon-wpb-vc_icon',
    'category' => __( 'Content', 'js_composer' ),
    'description' => __( 'Text with an icon', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => __( 'Type', 'js_composer' ),
            'param_name' => 'th_icon_type',
            'value' => array(
                __( 'Style 1', 'js_composer' ) => 'style1',
                __( 'Style 2', 'js_composer' ) => 'style2',
                __( 'Style 3', 'js_composer' ) => 'style3',
                __( 'Contacts Style', 'js_composer' ) => 'style_contact'
            ),
            'description' => __( 'Select style of icon box element.', 'js_composer' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon library', 'js_composer' ),
            'value' => array(
                __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                __( 'Typicons', 'js_composer' ) => 'typicons',
                __( 'Entypo', 'js_composer' ) => 'entypo',
                __( 'Linecons', 'js_composer' ) => 'linecons',
                __( 'Elagant', 'js_composer' ) => 'elegant',
            ),
            'admin_label' => true,
            'param_name' => 'type',
            'description' => __( 'Select icon library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-adjust', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_openiconic',
            'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_typicons',
            'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_entypo',
            'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_linecons',
            'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_elegant',
            'value' => 'vc_th icon-laptop', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'elegant',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'elegant',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            "type" => "textfield",
            "class" => "hidden-label",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title_name",
            "holder" => "h4",
            //"dependency" => Array('element' => "iconic", 'value' => 'radios'),
            "value" => '',
            'description' => __( 'Features title.', 'js_composer' ),
        ),
        array(
            "type" => "textarea",
            "class" => "hidden-label",
            "heading" => __("Text Content", "js_composer"),
            "param_name" => "text",
            "holder" => "span",
            "value" => 'Hey! I am simple text feel free to change me',
            'description' => __( 'Features description.', 'js_composer' ),
        ),

    ),
    'js_view' => 'VcIconElementView_Backend',
) );

// Button

$target_arr = array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank");
$button_type_arr = array(__("Black", "js_composer") => "btn-black", __("Pink", "js_composer") => "btn-pink");
$button_style_arr = array(__("Default", "js_composer") => "default", __("Transparent Background", "js_composer") => "-border");
$button_size_arr = array(__("Regular", "js_composer") => "", __("x1Large", "js_composer") => "x1", __("x2Large", "js_composer") => "x2", __("x3Large", "js_composer") => "x3", __("Wide", "js_composer") => "wide");
vc_map( array(
    "name" => __("Theme Buttons", "js_composer"),
    "base" => "button",
    "class" => "no-padding",
    "icon" => "icon-wpb-ui-button",
    "category" => 'Content',
    "description" => "Simple buttons",
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Button Type", "js_composer"),
            "param_name" => "type",
            "value" =>  $button_type_arr,
            "description" => __("Button type.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Style", "js_composer"),
            "param_name" => "style",
            "value" =>  $button_style_arr,
            "description" => __("Button style.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Size", "js_composer"),
            "param_name" => "size",
            "value" =>  $button_size_arr,
            "description" => __("Button size.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Text on the button", "js_composer"),
            "holder" => "button",
            "class" => "button",
            "param_name" => "label",
            "value" => __("Text on the button", "js_composer"),
            "description" => __("Text on the button.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL (Link)", "js_composer"),
            "param_name" => "url",
            "description" => __("Button link.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "js_composer"),
            "param_name" => "target",
            "value" => $target_arr,
            "dependency" => Array('element' => "url", 'not_empty' => true)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button alignment", "js_composer"),
            "param_name" => "align",
            "value" =>  array(__("Centered", "js_composer") => "center", __("Left", "js_composer") => "left", __("Right", "js_composer") => "right"),
            "description" => __("Select button alignment.", "js_composer")
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', "js_composer" ),
            'param_name' => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
        ),
    )
));

// Lead Text

vc_map( array(
    'name' => __( 'Lead text', 'js_composer' ),
    'base' => 'lead_text',
    'icon' => 'icon-wpb-layer-shape-text',
    'category' => __( 'Content', 'js_composer' ),
    'description' => __( 'A block of lead text with WYSIWYG editor', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => __( 'Text', 'js_composer' ),
            'param_name' => 'content',
            'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
        ),
    )
) );

// Call to action

vc_map( array(
    'name' => __( 'Call to Action', 'js_composer' ),
    'base' => 'cta',
    'icon' => 'icon-wpb-call-to-action',
    'category' => array( __( 'Content', 'js_composer' ) ),
    'description' => __( 'Catch visitors attention with CTA block', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __( 'Heading first line', 'js_composer' ),
            'admin_label' => true,
            //'holder' => 'h2',
            'param_name' => 'h2',
            'value' => __( 'Hey! I am first heading line feel free to change me', 'js_composer' ),
            'description' => __( 'Text for the first heading line.', 'js_composer' )
        ),
        array(
            'type' => 'textarea',
            'admin_label' => true,
            'heading' => __( 'Text', 'js_composer' ),
            'param_name' => 'call_text',
            'value' => __( 'Ferdion of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis.', 'js_composer' ),
            'description' => __( 'Enter your content.', 'js_composer' )
        ),
        array(
            'type' => 'vc_link',
            'heading' => __( 'URL (Link)', 'js_composer' ),
            'param_name' => 'link',
            'description' => __( 'Button link.', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Text on the button', 'js_composer' ),
            //'holder' => 'button',
            //'class' => 'wpb_button',
            'param_name' => 'title',
            'value' => __( 'Text on the button', 'js_composer' ),
            'description' => __( 'Text on the button.', 'js_composer' )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Type", "js_composer"),
            "param_name" => "type",
            "value" =>  $button_type_arr,
            "description" => __("Button align.", "js_composer")
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
        )
    )
) );

// Call to action 2

vc_map( array(
    'name' => __( 'Call to Action 2', 'js_composer' ),
    'base' => 'cta2',
    'icon' => 'icon-wpb-call-to-action',
    'category' => array( __( 'Content', 'js_composer' ) ),
    'description' => __( 'Catch visitors attention with CTA block', 'js_composer' ),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => __("Type", "js_composer"),
            "param_name" => "cta2_type",
            'value'=>array(
                __('Style 1', "js_composer")=>'style1',
                __('Style 2', "js_composer")=>'style2',
                __('Style 3', "js_composer")=>'style3',
                __('Style 4', "js_composer")=>'style4',
            ),
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => "Image",
            "param_name" => "src",
            "value" => "",
            "description" => __("Image for your Call to Action.", "js_composer"),
            'dependency' => array(
                'element' => 'cta2_type',
                'value' => array( 'style1','style2','style3' ),
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Heading first line', 'js_composer' ),
            'admin_label' => true,
            //'holder' => 'h2',
            'param_name' => 'h2',
            'value' => __( 'Hey! I am first heading line feel free to change me', 'js_composer' ),
            'description' => __( 'Text for the first heading line.', 'js_composer' )
        ),
        array(
            'type' => 'textarea',
            'admin_label' => true,
            'heading' => __( 'Text', 'js_composer' ),
            'param_name' => 'call_text',
            'value' => __( 'Ferdion of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis.', 'js_composer' ),
            'description' => __( 'Enter your content.', 'js_composer' )
        ),
        array(
            'type' => 'vc_link',
            'heading' => __( 'URL (Link)', 'js_composer' ),
            'param_name' => 'link',
            'description' => __( 'Button link.', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Text on the button', 'js_composer' ),
            //'holder' => 'button',
            //'class' => 'wpb_button',
            'param_name' => 'title',
            'value' => __( 'Text on the button', 'js_composer' ),
            'description' => __( 'Text on the button.', 'js_composer' )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Type", "js_composer"),
            "param_name" => "type",
            "value" =>  $button_type_arr,
            "description" => __("Button align.", "js_composer")
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
        )
    )
) );

// Counter

vc_map( array(
    "name" => __("Counter", "js_composer"),
    "base" => "counter",
    "class" => "font-awesome",
    "icon" => "fa-clock-o",
    "category" => 'Content',
    "description" => "Countdown numbers",
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Counter Title", 'js_composer'),
            "param_name" => "title",
            "description" => __("Your Counter title.", 'js_composer'),
            "value" => "Projects",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number value", 'js_composer'),
            "param_name" => "number",
            "description" => __("Value of the counter number.", 'js_composer'),
            "value" => "1000",
            "admin_label" => true
        )
    )
));

// Contact Form

if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {

    //vc_remove_element('contact-form-7');

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->post_title ] = $cform->ID;
			}
		} else {
			$contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
		}

    vc_map( array(
        "base" => "th_contact_form7",
        "name" => __("Contact Form 7", "js_composer"),
        "icon" => "icon-wpb-contactform7",
        "category" => __('Content', 'js_composer'),
        "description" => __('Place Contact Form7', 'js_composer'),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Form type", "js_composer"),
                "param_name" => "form_type",
                'value'=>array(
                    __('Default form', "js_composer")=>'default',
                    __('Sign up form', "js_composer")=>'signup',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Form title', 'js_composer' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => __( 'What text use as form title. Leave blank if no title is needed.', 'js_composer' )
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Form subtitle', 'js_composer' ),
                'param_name' => 'subtitle',
                'admin_label' => true,
                'description' => __( 'What text use as form subtitle.', 'js_composer' ),
                'dependency' => array(
                    'element' => 'form_type',
                    'value' => array( 'signup' )
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => __( 'Select contact form', 'js_composer' ),
                'param_name' => 'id',
                'value' => $contact_forms,
                'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' )
            )
        )
    ));
}

// VC Tabs

vc_remove_param("vc_tabs","el_class");

vc_add_param("vc_tabs", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Tabs Style",
    "param_name" => "style",
    "value" => array(
        "Default Tabs" => "default",
        "Stylish Tabs" => "stylish",
        "Main Tabs" => "main"
    ),
    "description" => "Tab's style.",
));
$attributes =  array(
    array(
    'type' => 'dropdown',
    'heading' => __( 'Icon library', 'js_composer' ),
    'value' => array(
        __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
        __( 'Open Iconic', 'js_composer' ) => 'openiconic',
        __( 'Typicons', 'js_composer' ) => 'typicons',
        __( 'Entypo', 'js_composer' ) => 'entypo',
        __( 'Linecons', 'js_composer' ) => 'linecons',
        __( 'Elagant', 'js_composer' ) => 'elegant',
    ),
    'admin_label' => true,
    'param_name' => 'type',
    'description' => __( 'Select icon library.', 'js_composer' ),
),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_fontawesome',
        'value' => 'fa fa-adjust', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_openiconic',
        'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'openiconic',
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_typicons',
        'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'typicons',
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_entypo',
        'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'entypo',
        ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_linecons',
        'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'linecons',
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon_elegant',
        'value' => 'vc_th icon-laptop', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'elegant',
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'type',
            'value' => 'elegant',
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
    )
    );

vc_add_params( 'vc_tab', $attributes );

// Portfolio Grid

$order_by_arr = array(__('None', "js_composer")=>'none', __('ID', "js_composer")=>'ID', __('Author', "js_composer")=>'author', __('Title', "js_composer")=>'title', __('Name', "js_composer")=>'name', __('Type', "js_composer")=>'type', __('Date', "js_composer")=>'date', __('Modified', "js_composer")=>'modified', __('Parent', "js_composer")=>'parent', __('Rand', "js_composer")=>'rand', __('Comment Count', "js_composer")=>'comment_count');
vc_map( array(
    "name"      => __("Portfolio Grid", "js_composer"),
    "base"      => "portfolio_grid",
    "class"     => "font-awesome",
    "icon" => "fa-check",
    "category"  => 'Content',
    "description" => "Grid layout for portfolio",
    "params"    => array(
        array(
            "type"      => "textfield",
            "holder"    => "div",
            "class"     => "",
            "heading"   => __("Keyword for All Projects Filter", "js_composer"),
            "param_name"=> "all_filter",
            "value"     => "All",
            "description" => __("Replace the default 'All' keyword for the initial filter with another one.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Projects filter style", "js_composer"),
            "param_name" => "filter_style",
            'value'=>array(
                __('Main style', "js_composer")=>'main',
                __('Aligned left style', "js_composer")=>'left_style',
                 __('Without filter', "js_composer")=>'without'
            ),
        ),
        array(
            "type"      => "textfield",
            "holder"    => "div",
            "class"     => "",
            "heading"   => __("Items per page", "js_composer"),
            "param_name"=> "posts_per_page",
            "value"     => "12",
            "description" => __("Set how many portfolio items would you like to include in the grid.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Order", "js_composer"),
            "param_name" => "order",
            'value'=>array(
                __('Desc', "js_composer")=>'desc',
				__('Asc', "js_composer")=>'asc',
            ),
            'edit_field_class'=>'vc_col-sm-6'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => __("Order By", "js_composer"),
            "param_name" => 'orderby',
            'value'=> $order_by_arr,
            'edit_field_class'=>'vc_col-sm-6'
        ),

    )
));

// Slider

vc_map( array(
    "name"      => __("Slider", "js_composer"),
    "base"      => "th_custom_slider",
    "class"     => "font-awesome",
    "icon" => "fa-check",
    "category"  => 'Content',
    "description" => "Slider with different layouts",
    "params"    => array(
        array(
            'type' => 'dropdown',
            'heading' => __( 'Select style for your slider', 'js_composer' ),
            'param_name' => 'th_slider_style',
            'value' => array(
                __('Default','js_composer') => 'default',
                //__('With lines','js_composer') => 'lines',
                __('Small images','js_composer') => 'small',
                //__('Icon box','js_composer') => 'icon_box',
            ),
            'description' => __( 'Select the type of slider.', 'js_composer' )
        ),
        array(
            'type' => 'attach_images',
            'heading' => __( 'Images', 'js_composer' ),
            'param_name' => 'images',
            'value' => '',
            'description' => __( 'Please select images from media library.', 'js_composer' ),
            'dependency' => array(
                'element' => 'th_slider_style',
                'value' => array( 'default','small' )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'On click', 'js_composer' ),
            'param_name' => 'onclick',
            'value' => array(
                __( 'Do nothing', 'js_composer' ) => 'link_no',
                __( 'Open custom link', 'js_composer' ) => 'custom_link'
            ),
            'description' => __( 'Define action for onclick event if needed.', 'js_composer' ),
            'dependency' => array(
                'element' => 'th_slider_style',
                'value' => array( 'default','small' )
            ),
        ),
        array(
            'type' => 'exploded_textarea',
            'heading' => __( 'Custom links', 'js_composer' ),
            'param_name' => 'custom_links',
            'description' => __( 'Enter links for each logo here. Divide links with linebreaks (Enter) . ', 'js_composer' ),
            'dependency' => array(
                'element' => 'onclick',
                'value' => array( 'custom_link' ),
                'dependency' => array(
                    'element' => 'th_slider_style',
                    'value' => array( 'default','small' )
                ),
            )
        ),
    )
));



vc_map( array(
    "name" => __("Icon box carousel", "js_composer"),
    "base" => "icon_box_carousel",
    "as_parent" => array('only' => 'icon_box_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
) );
vc_map( array(
    "name" => __("Icon box item", "js_composer"),
    "base" => "icon_box_item",
    "content_element" => true,
    "as_child" => array('only' => 'icon_box_carousel'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon library', 'js_composer' ),
            'value' => array(
                __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                __( 'Typicons', 'js_composer' ) => 'typicons',
                __( 'Entypo', 'js_composer' ) => 'entypo',
                __( 'Linecons', 'js_composer' ) => 'linecons',
                __( 'Elagant', 'js_composer' ) => 'elegant',
            ),
            'admin_label' => true,
            'param_name' => 'type',
            'description' => __( 'Select icon library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-adjust', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_openiconic',
            'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_typicons',
            'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_entypo',
            'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_linecons',
            'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_elegant',
            'value' => 'vc_th icon-laptop', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'elegant',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'elegant',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            "type" => "textfield",
            //"class" => "hidden-label",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title_text",
            //"holder" => "h4",
            "value" => 'Features Title',
            'description' => __( 'Features title.', 'js_composer' ),
        ),
        array(
            "type" => "textarea",
            //"class" => "hidden-label",
            "heading" => __("Text Content", "js_composer"),
            "param_name" => "text",
            //"holder" => "span",
            //"value" => '',
            'description' => __( 'Features description.', 'js_composer' ),
        ),

    ),
        'js_view' => 'VcIconElementView_Backend',
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_icon_box_carousel extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_icon_box_item extends WPBakeryShortCode {
    }
}

// Pricing table

vc_map( array(
    "name" => __("Pricing Box", "js_composer"),
    "base" => "pricing_box",
    "class" => "font-awesome",
    "icon" => "fa-usd",
    "category" => 'Content',
    "description" => "Product box with prices",
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Box Title", 'js_composer'),
            "param_name" => "title",
            "description" => __("Your Pricing Box title", 'js_composer'),
            "value" => "",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price", 'js_composer'),
            "param_name" => "price",
            "description" => __("Pricing Box price", 'js_composer'),
            "value" => "$99",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Period", 'js_composer'),
            "param_name" => "period",
            "description" => __("Pricing Box period", 'js_composer'),
            "value" => "per project"
        ),
        array(
            "type" => "exploded_textarea",
            "heading" => __("Features", "js_composer"),
            "param_name" => "features",
            "description" => __('Enter features here. Divide each feature with linebreaks (Enter).', 'js_composer')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Label", 'js_composer'),
            "param_name" => "button_label",
            "description" => __("Text visible on the box button", 'js_composer'),
            "value" => "Buy Now"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button URL", 'js_composer'),
            "param_name" => "button_url",
            "description" => __("Button URL, start with http://", 'js_composer'),
            "value" => "",
            'dependency' => Array('element' => "button_label", 'not_empty' => true)
        ),
    )
));