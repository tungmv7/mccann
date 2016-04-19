<?php
//
// ROOK Theme Functions
//
// Author: Woss Themes
// URL: http://themeforest.net/user/WossThemes
// Design: Woss Themes
//
//

if (!function_exists('woss_theme_setup')) :

		/**
		 *Sets up theme defaults and registers support for various WordPress features.
		 */
	function woss_theme_setup() {
		
		/**
		 * Enable support for Title Tag
		 */
		add_theme_support( 'title-tag' );
		
		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menu('main-menu', __('Main Navigation', 'rook'));
		
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 */
		load_theme_textdomain( 'woss_rook', get_template_directory() . '/languages' );
		
		/**
		 * Enable support for Post Formats
		 */
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'audio', 'video' ) );
		
		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 */
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Selective refresh for widgets in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		/**
		 * Using this feature you can set the maximum allowed width for any content in the theme.
		 */
		if ( ! isset( $content_width ) ) {
			$content_width = 1170;
		}
	}
endif;
add_action( 'after_setup_theme', 'woss_theme_setup' );

require get_template_directory() .'/framework/theme-options/importer/init.php';
/*-----------------------------------------------------------------------------------*/
/*	Functions and Definitions
/*-----------------------------------------------------------------------------------*/

define('TH1_JS', get_template_directory_uri()  . '/assets/js/');
define('TH1_CSS', get_template_directory_uri()  . '/assets/css/');
define('TH1_PLUGINS', get_template_directory_uri()  . '/assets/plugins/');
define('TH1_WIDGETS', get_template_directory_uri()  . '/framework/widgets/');

/*-----------------------------------------------------------------------------------*/
/*	Start Setup Theme
/*-----------------------------------------------------------------------------------*/
if ( file_exists( dirname( __FILE__ ) . '/framework/theme-options/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/theme-options/config.php' );
}

require_once('framework/plugins/plugins-config.php'); 			                            // Plugins Manager
require_once('framework/functions/scripts-load.php'); 			                            // Load Scripts
require_once('framework/functions/css-load.php'); 			                                // Load CSS
require_once('framework/functions/additional-functions.php'); 			                    // Additional theme functions

//require_once('framework/testimonials/testimonials-functions.php');                        // Testimonial Post Type
//require_once('framework/portfolio/portfolio-functions.php');                              // Portfolio Post Type
require_once('framework/shortcodes/shortcodes.php'); 			                            // Shortcodes
require_once dirname( __FILE__ ) . '/framework/plugins/metaboxes/metaboxes-functions.php';  // Metaboxes
//require_once('framework/widgets/widgets.php'); 			                            	// Plugins Manager

/*-----------------------------------------------------------------------------------*/
/*	Register Custom Navigation Walker
/*-----------------------------------------------------------------------------------*/

require_once('framework/plugins/wp_bootstrap_navwalker.php');

/*-----------------------------------------------------------------------------------*/
/*	Register theme widget areas
/*-----------------------------------------------------------------------------------*/

if ( !function_exists('th_register_sidebar') ){
	function th_register_sidebar() {
		register_sidebar(array(
			'name' => 'Blog-Sidebar',
			'id' => 'blog_sidebar',
			'before_widget' => '<div id="%1$s" class="bar %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="blog_sidebar">',
			'after_title' => '</div>',
		));

		register_sidebar(array(
			'name' => 'Page-Sidebar',
			'id' => 'page_sidebar',
			'before_widget' => '<div id="%1$s" class="bar %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="page_sidebar">',
			'after_title' => '</div>',
		));

        // Footer widgets

        register_sidebar(array(
            'name' => 'Footer 1-st Widget Area',
            'id' => 'footer_1st_col',
            'before_widget' => '<div id="%1$s" class="bar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-second-title"><h3>',
            'after_title' => '</h3></div>',
        ));
        register_sidebar(array(
            'name' => 'Footer 2-nd Widget Area',
            'id' => 'footer_2nd_col',
            'before_widget' => '<div id="%1$s" class="bar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-second-title"><h3>',
            'after_title' => '</h3></div>',
        ));
        register_sidebar(array(
            'name' => 'Footer 3-rd Widget Area',
            'id' => 'footer_3rd_col',
            'before_widget' => '<div id="%1$s" class="bar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-second-title"><h3>',
            'after_title' => '</h3></div>',
        ));
        register_sidebar(array(
            'name' => 'Footer 4-th Widget Area',
            'id' => 'footer_4th_col',
            'before_widget' => '<div id="%1$s" class="bar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="footer-second-title"><h3>',
            'after_title' => '</h3></div>',
        ));
	}
}
add_action( 'widgets_init', 'th_register_sidebar' );

/*-----------------------------------------------------------------------------------*/
/*	Extend VC
/*-----------------------------------------------------------------------------------*/

if(class_exists('Vc_Manager')) {

    function th_extend_composer() {
        require_once locate_template('/wpbakery/vc-extend.php');
    }

    add_action('init', 'th_extend_composer', 20);
}

/*-----------------------------------------------------------------------------------*/
/*	Add Icons to Visual Composer
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_base_register_admin_css', 'vc_th_admin_scripts' );

function vc_th_admin_scripts() {
    wp_enqueue_style('elegant', TH1_PLUGINS . 'elegant/style.css');
}

add_filter( 'vc_iconpicker-type-elegant', 'vc_iconpicker_type_elegant' );
function vc_iconpicker_type_elegant( $icons ) {
    $linecons_icons = array(
        array( "vc_th icon-mobile" => __( "Mobile", "js_composer" ) ),
        array( "vc_th icon-laptop" => __( "Laptop", "js_composer" ) ),
        array( "vc_th icon-desktop" => __( "Desktop", "js_composer" ) ),
        array( "vc_th icon-tablet" => __( "Tablet", "js_composer" ) ),
        array( "vc_th icon-phone" => __( "Phone", "js_composer" ) ),
        array( "vc_th icon-document" => __( "Document", "js_composer" ) ),
        array( "vc_th icon-documents" => __( "Documents", "js_composer" ) ),
        array( "vc_th icon-search" => __( "Search", "js_composer" ) ),
        array( "vc_th icon-clipboard" => __( "Clipboard", "js_composer" ) ),
        array( "vc_th icon-newspaper" => __( "Newspaper", "js_composer" ) ),
        array( "vc_th icon-notebook" => __( "Notebook", "js_composer" ) ),
        array( "vc_th icon-book-open" => __( "Book-open", "js_composer" ) ),
        array( "vc_th icon-browser" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-calendar" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-presentation" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-picture" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-pictures" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-video" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-camera" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-printer" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-toolbox" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-briefcase" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-wallet" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-gift" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-bargraph" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-grid" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-expand" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-focus" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-edit" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-adjustments" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-ribbon" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-hourglass" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-lock" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-megaphone" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-shield" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-trophy" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-flag" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-map" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-puzzle" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-basket" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-envelope" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-streetsign" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-telescope" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-gears" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-key" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-paperclip" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-attachment" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-pricetags" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-lightbulb" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-layers" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-pencil" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-tools" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-tools-2" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-scissors" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-paintbrush" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-magnifying-glass" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-circle-compass" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-linegraph" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-mic" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-strategy" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-beaker" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-caution" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-recycle" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-anchor" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-profile-male" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-profile-female" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-bike" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-wine" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-hotairballoon" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-globe" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-genius" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-map-pin" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-dial" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-chat" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-heart" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-cloud" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-upload" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-download " => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-target " => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-hazardous" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-piechart" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-speedometer" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-global" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-compass" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-lifesaver" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-clock" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-aperture" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-quote" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-scope" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-alarmclock" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-refresh" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-happy" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-sad" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-facebook" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-twitter" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-googleplus" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-rss" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-tumblr" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-linkedin" => __( "Lock", "js_composer" ) ),
        array( "vc_th icon-dribbble" => __( "Lock", "js_composer" ) ),
    );

    return array_merge( $icons, $linecons_icons );
}

/*-----------------------------------------------------------------------------------*/
/*	Enqueue icon element font
/*-----------------------------------------------------------------------------------*/

function th_vc_icon_element_fonts_enqueue( $font ) {
    switch ( $font ) {
        case 'fontawesome':
            wp_enqueue_style( 'font-awesome' );
            break;
        case 'openiconic':
            wp_enqueue_style( 'vc_openiconic' );
            break;
        case 'typicons':
            wp_enqueue_style( 'vc_typicons' );
            break;
        case 'entypo':
            wp_enqueue_style( 'vc_entypo' );
            break;
        case 'linecons':
            wp_enqueue_style( 'vc_linecons' );
            break;
        case 'elegant':
            wp_enqueue_style( 'elegant' );
            break;
        default:
            do_action( 'vc_enqueue_font_icon_element', $font ); // hook to custom do enqueue style
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Filter to replace default css class names for vc_row shortcode and vc_column
/*-----------------------------------------------------------------------------------*/

add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
//    if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
//        $class_string = str_replace( 'vc_row-fluid', 'my_row-fluid', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
//    }
    if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
        $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'col-sm-$1', $class_string ); // This will replace "vc_col-sm-%" with "my_col-sm-%"
    }
    return $class_string; // Important: you should always return modified or original $class_string
}

/*-----------------------------------------------------------------------------------*/
/*	Image cropping functions
/*-----------------------------------------------------------------------------------*/

 function th_thumb($w,$h = null){
    require_once dirname(__FILE__).'/framework/plugins/aq_resizer.php';
    global $post;
    $imgurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
    return aq_resize($imgurl[0],$w,$h,true);
} 

/*-----------------------------------------------------------------------------------*/
/*	Submit button for comment on single blog page
/*-----------------------------------------------------------------------------------*/

add_action('comment_form', 'bootstrap3_comment_button' );
function bootstrap3_comment_button() {
    $comment_button = '<button class="rk-mtop30 btn btn-pink btn-1x" type="submit">' . __( 'Send comment', 'rook' ) . '</button>';
	
	echo wp_kses( $comment_button, array( 
			'button'=>array(
				'class'=>array(),
				'type'=>array()
		)));
}

/*-----------------------------------------------------------------------------------*/
/*	Search only in posts (exclude from search )
/*-----------------------------------------------------------------------------------*/

function fb_search_filter($query) {
	if ( !$query->is_admin && $query->is_search) {
	$query->set('post_type', array() ); // id of page or post
	}
	return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );

/*-----------------------------------------------------------------------------------*/
/*	Composer Init
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'woss_vcSetAsTheme' );
function woss_vcSetAsTheme() {
	vc_set_as_theme();
}
