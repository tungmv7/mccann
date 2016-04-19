<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_thcmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'testimonials',
		'title'         => __( 'Testimonial', 'cmb2' ),
		'object_types'  => array( 'testimonials', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Name:', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'testimonial_name',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

    $cmb_demo->add_field( array(
        'name' => __( 'Position:', 'cmb2' ),
        //'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'testimonial_job',
        'type' => 'text_medium',
        // 'repeatable' => true,
    ) );

	$cmb_demo->add_field( array(
		'name' => __( 'Website URL', 'cmb2' ),
		'description' => __( '(optional)', 'cmb2' ),
		'id'   => $prefix . 'testimonial_url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );


	$cmb_demo->add_field( array(
		'name' => __( 'Testimonial:', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'testimonial_code',
		'type' => 'textarea',
	) );

}


/* Portfolio*/

add_action( 'cmb2_init', 'th_portfolio_page_metaboxes' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function th_portfolio_page_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    /**
     * Metabox to be displayed on a single page ID
     */
    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'project_description',
        'title'        => __( 'Single Project Page Settup', 'cmb2' ),
        'object_types' => array( 'portfolio', ), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Gallery Images', 'cmb2' ),
        'desc' => __( 'Upload images for the project gallery. They will appear only on single project page.', 'cmb2' ),
        'id'   => $prefix . 'project_gallery_images',
        'type' => 'file_list',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

	$cmb_about_page->add_field( array(
		'name'             => __( 'Images grid layout', 'cmb2' ),
		'desc'             => __( 'Select number of columns for displayed images', 'cmb2' ),
		'id'               => $prefix . 'project_img_layout',
		'type'             => 'select',
		'show_option_none' => false,
		'default'			 => '6',
		'options'          => array(
			'12' => __( 'One column', 'cmb2' ),
			'6'   => __( 'Two columns', 'cmb2' ),
			'4'     => __( 'Three columns', 'cmb2' ),
			'3'     => __( 'Four columns', 'cmb2' ),
		),
	) );
	
    $cmb_about_page->add_field( array(
        'name' => __( 'Wrap images in a slider', 'cmb2' ),
        'desc' => __( 'If is checked, Gallery Images will be displayed in slder.', 'cmb2' ),
        'id'   => $prefix . 'project_is_slider',
        'type' => 'checkbox',
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Thumbnail in gallery', 'cmb2' ),
        'desc' => __( 'If is checked, the project thumbnail will be include in Gallery Images.', 'cmb2' ),
        'id'   => $prefix . 'project_is_thumb_include',
        'type' => 'checkbox',
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Project subtitle', 'cmb2' ),
        'desc' => __( 'Project subtitle text, will be displayed under the title.', 'cmb2' ),
        'id'   => $prefix . 'project_subtitle',
        'type' => 'text',
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Background image', 'cmb2' ),
        'desc' => __( 'Upload your custom header background parallax image.', 'cmb2' ),
        'id'   => $prefix . 'project_alter_bg',
        'type' => 'file',
    ) );
	$cmb_about_page->add_field( array(
        'name' => __( 'Image overlay', 'cmb2' ),
        'desc' => __( 'If is checked, will be added overlay for header background image.', 'cmb2' ),
        'id'   => $prefix . 'project_overlay',
        'type' => 'checkbox',
    ) );

}


/* Portfolio Additional Fields*/

add_action( 'cmb2_init', 'th_portfolio_additional_fields' );
function th_portfolio_additional_fields() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'aditional_project_description',
        'title'        => __( 'Aditional Project Description', 'cmb2' ),
        'object_types' => array( 'portfolio', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $group_field_id = $cmb_about_page->add_field( array(
        //'name' => __( 'Gallery Images', 'cmb2' ),
        //'desc' => __( 'Upload images for the project gallery. They will appear only on single project page.', 'cmb2' ),
        'id'   => $prefix . 'projects-custom-fields',
        'type' => 'group',
        'options'     => array(
            'group_title'   => __( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => __( 'Add Another Entry', 'cmb2' ),
            'remove_button' => __( 'Remove Entry', 'cmb2' ),
            'sortable'      => true, // beta
        ),
    ) );

    $cmb_about_page->add_group_field( $group_field_id, array(
        'name'       => __( 'Entry Title', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        //'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_about_page->add_group_field( $group_field_id, array(
        'name'        => __( 'Description', 'cmb2' ),
        'description' => __( 'Write a short description for this entry', 'cmb2' ),
        'id'          => 'description',
        'type'        => 'textarea_small',
    ) );

}

/* Video post format*/

add_action( 'cmb2_init', 'th_video_post_additional_fields' );
function th_video_post_additional_fields() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'video_post_description',
        'title'        => __( 'Video post format settings', 'cmb2' ),
        'object_types' => array( 'post', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Video URL:', 'cmb2' ),
        'desc' => __( '<a href=\'https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F\'>(List of supported formats)</a>', 'cmb2' ),
        'id'   => $prefix . 'video_post_format',
        'type' => 'oembed',
    ) );
}

/* Audio post format*/

add_action( 'cmb2_init', 'th_audio_post_additional_fields' );
function th_audio_post_additional_fields() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'audio_post_description',
        'title'        => __( 'Audio post format settings', 'cmb2' ),
        'object_types' => array( 'post', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => __( 'Audio URL:', 'cmb2' ),
        'desc' => __( '<a href=\'https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F\'>(List of supported formats)</a>', 'cmb2' ),
        'id'   => $prefix . 'audio_post_format',
        'type' => 'oembed',
    ) );
}

/* Gallery post format*/

add_action( 'cmb2_init', 'th_audio_gallery_additional_fields' );
function th_audio_gallery_additional_fields() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'gallery_post_descrition',
        'title'        => __( 'Gallery post format settings', 'cmb2' ),
        'object_types' => array( 'post', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Gallery Images:',
        'desc' => 'Upload images for the gallery. They will be grouped into a slider.',
        'id'   => $prefix . 'gallery_post_format',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );
}

/* Link post format*/

add_action( 'cmb2_init', 'th_link_gallery_additional_fields' );
function th_link_gallery_additional_fields() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'link_post_description',
        'title'        => __( 'Link post format settings', 'cmb2' ),
        'object_types' => array( 'post', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Link:',
        'desc' => 'Add a link for the "Link Post Format". The title of the post will link to the URL you`ve set.',
        'id'   => $prefix . 'link_post_format',
        'type' => 'text',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name'             => 'Target of the link',
        'desc'             => 'Set the target of the link.',
        'id'               => $prefix . 'link_post_target',
        'type'             => 'radio_inline',
        'options'          => array(
            'blank' => __( '_blank: New window or tab', 'cmb2' ),
            'self' => __( '_self: Same window or tab', 'cmb2' ),
        ),
        'default' => 'blank',
    ) );
}

/* Link post format*/

add_action( 'cmb2_init', 'th_post_fileds' );
function th_post_fileds() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'post_fileds',
        'title'        => __( 'Post settings', 'cmb2' ),
        'object_types' => array( 'post', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Alternate page title:',
        'desc' => 'Set alternate page title. Will be displayed in header section',
        'id'   => $prefix . 'post_alternate_title',
        'type' => 'text',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Post subtitle:',
        'desc' => 'Add a description of the post. Will appear under the title.',
        'id'   => $prefix . 'post_subtitle',
        'type' => 'text',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Background image:',
        'desc' => 'Upload your custom header background image.',
        'id'   => $prefix . 'post_alternate_background',
        'type' => 'file',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Sidebar Position:',
        'desc' => 'Choose layout for this page.',
        'id'   => $prefix . 'page_sidebar_layout',
        'type' => 'select',
        'options' => array(
            'default' => __( 'Default set in Theme Options', 'cmb' ),
            'fullwidth' => __( 'Fullwidth', 'cmb' ),
            'sidebar_left'   => __( 'Sidebar Left', 'cmb' ),
            'sidebar_right'     => __( 'Sidebar Right', 'cmb' ),
        ),
    ) );
}

/* Page fields*/

add_action( 'cmb2_init', 'th_page_fileds' );
function th_page_fileds() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_thcmb_';

    $cmb_about_page = new_cmb2_box( array(
        'id'           => $prefix . 'page_fileds',
        'title'        => __( 'Page settings', 'cmb2' ),
        'object_types' => array( 'page', ), // Post type
        //'context'      => 'normal',
        //'priority'     => 'default',
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Alternate page title:',
        'desc' => 'Set alternate page title. Will be displayed in header section. (Only for Default Template)',
        'id'   => $prefix . 'page_alternate_title',
        'type' => 'text',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Page subtitle:',
        'desc' => 'Add a description of the page. Will appear under the title.',
        'id'   => $prefix . 'page_subtitle',
        'type' => 'text',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Background image:',
        'desc' => 'Upload your custom header background image.',
        'id'   => $prefix . 'page_alternate_background',
        'type' => 'file',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Main menu style:',
        'desc' => 'Choose a style for your menu.',
        'id'   => $prefix . 'menu_style',
        'type' => 'select',
        'options' => array(
            'default' => __( 'Default set in Theme Options', 'cmb2' ),
            'main' => __( 'Main Navbar', 'cmb2' ),
            'black'   => __( 'Black Navbar', 'cmb2' ),
            'white'     => __( 'White Navbar', 'cmb2' ),
        ),
    ) );

    $cmb_about_page->add_field( array(
        'name' => 'Sidebar Position:',
        'desc' => 'Choose layout for this page.',
        'id'   => $prefix . 'page_sidebar_layout',
        'type' => 'select',
        'options' => array(
            'default' => __( 'Default set in Theme Options', 'cmb2' ),
            'fullwidth' => __( 'Fullwidth', 'cmb2' ),
            'sidebar_left'   => __( 'Sidebar Left', 'cmb2' ),
            'sidebar_right'     => __( 'Sidebar Right', 'cmb2' ),
        ),
    ) );

}





add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ),
		'object_types'     => array( 'user' ), // Tells CMB to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}
