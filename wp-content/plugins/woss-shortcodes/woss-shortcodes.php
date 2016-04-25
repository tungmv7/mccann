<?php
/*
Plugin Name: Rook Shortcodes
Plugin URI: http://themeforest.net/user/WossThemes
Description: Shortcodes for WossThemes - ROOK Version
Version: 1.0.12
Author: WossThemes
Author URI: http://themeforest.net/user/WossThemes
*/

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for ROOK
/*-----------------------------------------------------------------------------------*/

require_once ('includes/woss-widgets.php');

//
// Portfolio Post Type
//

add_action('init', 'th_portfolio_register');

function th_portfolio_register() {
    $args = array(
        'label' => __('Portfolio', 'larx'),
        'menu_icon' => 'dashicons-id',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','editor','thumbnail')
    );

    register_post_type( 'portfolio' , $args );

    register_taxonomy(
        "project-type",
        array("portfolio"),
        array(
            "hierarchical" => true,
            "context" => "normal",
            'show_ui' => true,
            "label" => "Portfolio Categories",
            "singular_label" => "Portfolio Category",
            "rewrite" => true
        )
    );
}

//
// New Columns
//

add_filter( 'manage_edit-portfolio_columns', 'th_portfolio_columns_settings' ) ;

function th_portfolio_columns_settings( $columns ) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title', 'larx'),
        'category' => __( 'Category', 'larx'),
        'date' => __('Date', 'larx'),
        'thumbnail' => ''
    );

    return $columns;
}

add_action( 'manage_portfolio_posts_custom_column', 'th_portfolio_columns_content', 10, 2 );

function th_portfolio_columns_content( $column, $post_id ) {
    global $post;

    switch( $column ) {

        /* If displaying the 'duration' column. */
        case 'category' :

            $taxonomy = "project-type";
            $post_type = get_post_type($post_id);
            $terms = get_the_terms($post_id, $taxonomy);

            if ( !empty($terms) ) {
                foreach ( $terms as $term )
                    $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
                echo join( ', ', $post_terms );
            }
            else echo '<i>No categories.</i>';

            break;

        /* If displaying the 'genre' column. */
        case 'thumbnail' :

            the_post_thumbnail('thumbnail', array('class' => 'column-img'));

            break;

        /* Just break out of the switch statement for everything else. */
        default :
            break;
    }
}
/**************************************/




function isAssoc($arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}

function th_create_dropdown($name,$elements,$current_value,$folds = NULL) {

    $folds_class = $selected = '';
    if($folds) $folds_class = ' portfolios';
    echo '<select id="nnn" name="'.$name.'" class="select'.$folds_class.'">';

    if(isAssoc($elements)) {

        foreach($elements as $title => $key) {

            if($key == $current_value) $selected = 'selected';

            echo '<option value="'.$key.'"'.$selected.'>'.$title.'</option>';

            $selected = '';
        }

    } else {

        foreach($elements as $key) {

            if($key == $current_value) $selected = 'selected';

            echo '<option value="'.$key.'"'.$selected.'>'.$key.'</option>';

            $selected = '';
        }

    }

    echo '</select>';

}

/*********************************************/

//Add Custom Fields

add_action("admin_init", "th_portfolio_extra_settings1");

function th_portfolio_extra_settings1(){
    add_meta_box("portfolio_extra_settings1", "Portfolio Description", "th_portfolio_extra_settings_config1", "portfolio", "normal", "high");
}

function th_portfolio_extra_settings_config1(){
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    $custom = get_post_custom($post->ID);
    $project_desc = '';
    if(isset($custom["project_desc"][0])) $project_desc = $custom["project_desc"][0];
    $project_client = '';
    if(isset($custom["project_client"][0])) $project_client = $custom["project_client"][0];
    $project_website = '';
    if(isset($custom["project_website"][0])) $project_website = $custom["project_website"][0];

    ?>

    <div class="metabox-options form-table fullwidth-metabox">

        <div class="metabox-option">
            <h6><?php esc_html_e('Project date', 'larx') ?>:</h6>
            <input type="text" name="project_desc" value="<?php echo esc_attr($project_desc); ?>">
            <p class="description"><?php echo esc_html_e('If is not single page you can add here some additional description of your project. By default is a date.', 'larx') ?></p>
        </div>

        <div class="metabox-option project_client">
            <h6><?php esc_html_e('Client', 'larx') ?>:</h6>
            <input type="text" name="project_client" value="<?php echo esc_attr($project_client); ?>">
            <p class="description"><?php echo esc_html_e('Add here company or name of your client. (Only if single page is enabled)', 'larx') ?></p>
        </div>

        <div class="metabox-option project_website">
            <h6><?php esc_html_e('Website', 'larx') ?>:</h6>
            <input type="text" name="project_website" value="<?php echo esc_attr($project_website); ?>">
            <p class="description"><?php echo esc_html_e('Add here company website or link to project. (Only if single page is enabled)', 'larx') ?></p>
        </div>

    </div>

<?php
}

add_action("admin_init", "th_portfolio_extra_settings");

function th_portfolio_extra_settings(){
    add_meta_box("portfolio_extra_settings", "Portfolio Post Settings", "th_portfolio_extra_settings_config", "portfolio", "normal", "high");
}

function th_portfolio_extra_settings_config(){
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    $custom = get_post_custom($post->ID);
    $link_type = $name = $url = $portf_thumbnail = '';

    if (isset($custom["url"][0])) {
        $url = sanitize_text_field($custom["url"][0]);
    }
    if (isset($custom["name"][0])) {
        $name = sanitize_text_field($custom["name"][0]);
    }

    if(isset($custom["link_type"][0])) $link_type = $custom["link_type"][0];
    if(isset($custom["name"][0])) $name;
    if(isset($custom["url"][0])) $url;
    if(isset($custom["portf_thumbnail"][0])) $portf_thumbnail = $custom["portf_thumbnail"][0];

    ?>

    <div class="metabox-options form-table fullwidth-metabox">

        <div class="metabox-option">
            <h6><?php _e('Thumbnail Link Type', 'larx') ?>:</h6>

            <?php

            $link_type_arr = array('Default - Is opening in a Lightbox' => 'default', 'Video Link - Is opening a Video in a Lightbox' => 'direct', 'External Link - Opens a Custom Link' => 'external', 'Single Page - Opens a progect page' => 'single_page');

            th_create_dropdown('link_type',$link_type_arr,$link_type, true);

            ?>

            <p class="description"><?php echo esc_html_e('Choose what thumbnail does.', 'larx') ?></p>
        </div>

        <div class="metabox-option video-link">
            <h6><?php esc_html_e('Video link', 'larx') ?>:</h6>
            <input type="text" name="name" value="<?php echo esc_attr($name); ?>">
            <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a video from third-party websites(Vimeo, YouTube) in an URL. Ex: http://www.youtube.com/watch?v=y6Sxv-sUYtM', 'larx') ?></p>
        </div>


        <div class="metabox-option ext-link">
            <h6><?php esc_html_e('External link', 'larx') ?>:</h6>
            <input type="text" name="url" value="<?php echo esc_url($url); ?>">
            <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a custom link.', 'larx') ?></p>
        </div>

        <div class="metabox-option">
            <h6><?php esc_html_e('Thumbnail Type', 'larx') ?>:</h6>
            <span>
				<input id="portf_thumbnail_1" type="radio" class="img-radio portfolio-small" name="portf_thumbnail" checked="checked" value="portfolio-small" <?php checked( $portf_thumbnail, 'portfolio-small' ); ?> >
				<div class="radio-label"><?php echo esc_html_e('Small Thumbnail', 'larx') ?></div>
				<img src="<?php echo get_template_directory_uri() ?>/framework/theme-options/assets/images/portfolio-small.png" id="small" class="of-radio-img" onclick="document.getElementById(&quot;portf_thumbnail_1&quot;).checked = true;" title="Small Thumbnail">
            </span>

            <span>
				<input id="portf_thumbnail_2" type="radio" class="img-radio half-vertical" name="portf_thumbnail" value="half-vertical" <?php checked( $portf_thumbnail, 'half-vertical' ); ?> >
                <div class="radio-label">Half Vertical</div>
				<img src="<?php echo get_template_directory_uri() ?>/framework/theme-options/assets/images/half-vertical.png" id="vertical" class="of-radio-img" onclick="document.getElementById(&quot;portf_thumbnail_2&quot;).checked = true;" title="Half Vertical">
                <div class="meta-desc-field"><p class="description"><?php echo esc_html_e('Working with the Portfolio Grid layout option.', 'larx') ?></p></div>
            </span>

        </div>

    </div>

<?php

}

// Save Custom Fields

add_action('save_post', 'th_save_portfolio_post_settings');

function th_save_portfolio_post_settings(){
    global $post;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return $post_id;
    }else{
        if (isset($_POST["project_desc"])) {
            $project_desc = sanitize_text_field($_POST["project_desc"]);
        }
        if (isset($_POST["project_client"])) {
            $project_client = sanitize_text_field($_POST["project_client"]);
        }
        if (isset($_POST["project_website"])) {
            $project_website = sanitize_text_field($_POST["project_website"]);
        }

        if(isset($_POST["name"])) update_post_meta($post->ID, "name", $_POST["name"]);
        if(isset($_POST["url"])) update_post_meta($post->ID, "url", $_POST["url"]);
        if(isset($_POST["portf_thumbnail"])) update_post_meta($post->ID, "portf_thumbnail", $_POST["portf_thumbnail"]);
        if(isset($_POST["link_type"])) update_post_meta($post->ID, "link_type", $_POST["link_type"]);
        if(isset($_POST["gallery_images"])) update_post_meta($post->ID, "gallery_images", $_POST["gallery_images"]);
        if(isset($_POST["project_desc"])) update_post_meta($post->ID, "project_desc", $project_desc);
        if(isset($_POST["project_client"])) update_post_meta($post->ID, "project_client", $project_client);
        if(isset($_POST["project_website"])) update_post_meta($post->ID, "project_website", $project_website);
    }

}

//
// Testimonials Post Type
//

add_action('init', 'th_testimonial_register');
function th_testimonial_register() {
    $args = array(
        'label' => __('Testimonials', 'larx'),
		'menu_icon' => 'dashicons-megaphone',
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','thumbnail')
    );

    register_post_type( 'testimonials' , $args );
}


// Blog grid

function th_blog_grid($atts, $content = null) {
    extract(shortcode_atts(array(
        "number" => "3",
        "categories" => "",
        "number_text" => "30",
        "order" => "",
        "orderby" => ""

    ), $atts));

    if(!function_exists('th_excerpt_content'))
    {
        function th_excerpt_content($number_text){
            $excerpt = explode(' ', get_the_excerpt(), $number_text);
            if(count($excerpt)>= $number_text){
                array_pop($excerpt);
                $excerpt = implode(" ",$excerpt).'...';
            }else{
                $excerpt=implode(" ", $excerpt);
            }
            $excerpt =preg_replace('`[[^]]*]`','',$excerpt);
            return $excerpt;
        }
    }

    $output = '';
    $blog_array_cats = get_terms('category', array('hide_empty' => false));
    if(empty($categories)) {
        foreach($blog_array_cats as $blog__array_cat) {
            $categories .= $blog__array_cat->slug .', ';
        }
    }

    $args = array(
        'orderby'=> $orderby,
        'order' => $order,
        'post_type' => 'post',
        'category_name' => $categories,
        'posts_per_page' => $number
    );

    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {

        while ($my_query->have_posts()) : $my_query->the_post();
            $time = get_the_time(get_option('date_format'));
            $id = get_the_ID();

            $th_cat=get_the_category();
            if(!empty($th_cat)) {
                foreach ($th_cat as $key => $value) {
                  $cat_name = $value->name;
                }
            }

            $output .= '<!-- Blog Item -->
                        <div class="col-sm-12 col-md-4 blog-article">
                            <a href="'. get_permalink($id).'">
                                <article>
                                    <header>
                                        <div class="blog-header">
                                            <span class="blog-article-cat">'.$cat_name.' / <span class="blog-article-date">'.$time.'</span></span>
                                            <h2>'.get_the_title().'</h2>
                                        </div>
                                        <p>'.th_excerpt_content(30).'</p>
                                    </header>
                                    <p class="blog-article-btn">'.esc_attr_x('Read More', 'read more','rook').'</p>
                                </article>
                            </a>
                        </div>';

        endwhile;
    }
    wp_reset_postdata();
    return $output;
}

remove_shortcode('blog-grid');
add_shortcode("blog-grid", "th_blog_grid");

// Button

function th_button($atts, $content = null) {
    extract(shortcode_atts(array(
        "type" => 'btn-black',
        "style" => 'default',
        "size" => '',
        "label" => 'Text on the button',
        "url" => '',
        "target" => '_self',
        "align" => 'center',
        "el_class" => '',
    ), $atts));

    switch ( $type ) {
        case 'btn-black':
            $btn_class_type = 'btn-black';
            break;

        case 'btn-pink':
            $btn_class_type = 'btn-pink';
            break;
    }

    if($style == '-border'){
        $btn_class_type .= '-border';
    }

    switch ( $size ) {
        case 'x1':
            $btn_class_type .= ' btn-x1';
            break;

        case 'x2':
            $btn_class_type .= ' btn-x2';
            break;

        case 'x3':
            $btn_class_type .= ' btn-x3';
            break;

        case 'wide':
            $btn_class_type .= ' btn-x2 btn-lg';
            break;
    }


    $output = '';
    $output .= '<!-- Button -->';
    $output .= '<div class="text-'.$align.'">';
    $output .= '<a class="btn '.esc_attr($btn_class_type).' '.$el_class.'" href="'.esc_url($url).'" target="'.esc_attr($target).'" role="button">'.$label.'</a>';
    $output .= '</div>';

    return $output;
}

remove_shortcode('button');
add_shortcode('button', 'th_button');

// CTA

function call_to_action($atts, $content=null) {
	extract(shortcode_atts(array(
		"h2" => 'Hey! I am first heading line feel free to change me',
		"call_text" => 'Ferdion of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis.',
		"link" => '',
		"title" => 'Text on the button',
		"type" => 'btn-black',
		"el_class" => '',
	), $atts));

	$a_href = $a_title = $a_target = '';
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link );
	$use_link = false;
	if ( strlen( $link['url'] ) > 0 ) {
		$use_link = true;
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
	}
	
	
    switch ( $type ) {
        case 'btn-black':
            $btn_class_type = 'btn-black';
            break;

        case 'btn-pink':
            $btn_class_type = 'btn-pink';
            break;

    }


    $output = '';
    $output .= '<!-- Description -->
                <div class="col-sm-8">
                    <h3>'.$h2.'</h3>
                    <p>'.$call_text.'</p>
                </div>
                <!-- Button -->
                <div class="col-sm-4 text-center">
                    <a class="btn '.esc_attr($btn_class_type).'" href="'.esc_url($a_href).'" title="'.$a_title.'" target="'.$a_target.'" role="button">'.$title.'</a>
                </div>';

    return $output;

}

remove_shortcode('cta');
add_shortcode('cta', 'call_to_action');

// CTA 2

function call_to_action2($atts, $content=null) {
	extract(shortcode_atts(array(
        "cta2_type" => 'style1',
        "src" => '',
		"h2" => 'Hey! I am first heading line feel free to change me',
		"call_text" => 'Ferdion of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis.',
		"link" => '',
		"title" => 'Text on the button',
		"type" => 'btn-black',
		"el_class" => '',
	), $atts));


	$a_href = $a_title = $a_target = '';
	
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link );
	$use_link = false;
	if ( strlen( $link['url'] ) > 0 ) {
		$use_link = true;
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
	}

    switch ( $type ) {
        case 'btn-black':
            $btn_class_type = 'btn-black';
            break;

        case 'btn-pink':
            $btn_class_type = 'btn-pink';
            break;

    }


    $output = '';

    if($cta2_type == 'style1'){
		
		if($src !== ''){
			$image = wp_get_attachment_image_src($src, array(530, 393));
				$image = '<img src="'.$image[0].'" alt="'.$h2.'" class="img-responsive">';
		}else {
			$image = '<img src="'.get_template_directory_uri().'/assets/img/screen.png" alt="placeholder" class="img-responsive">';
		}
	
        $output .= '<div class="call-to-action">
                        <!-- Left Column -->
                        <div data-sr="enter left ease-in 50px" class="col-sm-6 rk-cta-content">
                            <article>
                                <h2>'.$h2.'</h2>
                                <p>'.$call_text.'</p>
                                <a class="btn '.esc_attr($type).'" href="'.esc_url($a_href).'" title="'.$a_title.'" target="'.$a_target.'" role="button">'.$title.'</a>
                            </article>
                        </div>

                        <!-- Right Column -->
                        <div data-sr="enter right ease-in 50px" class="col-sm-6">
                            <figure>'.$image.'</figure>
                        </div>
                    </div>';
    }

    if($cta2_type == 'style2'){
		
		if($src !== ''){
			$image = wp_get_attachment_image_src($src, array(530, 393));
				$image = '<img src="'.$image[0].'" alt="'.$h2.'" class="img-responsive">';
		}else {
			$image = '<img src="'.get_template_directory_uri().'/assets/img/iphone.png" width="198" height="350" alt="placeholder">';
		}
		
        $output .= '<div class="features-parts">
                        <!-- Left Column -->
                        <div data-sr="enter top over 0.5s and move 140px" class="col-sm-4 text-center">
                            <!-- Image -->
                            '.$image.'
                        </div>

                        <!-- Right Column -->
                        <div data-sr="enter left over 0.5s and move 140px" class="col-sm-8">
                            <!-- Title -->
                            <div class="features-parts-title">
                                <h3>'.$h2.'</h3>
                            </div>
                            <!-- Description -->
                            <div class="features-parts-content">
                                <p>'.$call_text.'</p>
                            </div>
                            <!-- Button -->
                            <a class="btn '.$type.'" href="'.esc_url($a_href).'" title="'.$a_title.'" target="'.$a_target.'" role="button">'.$title.'</a>
                        </div>
                    </div>';
    }

    if($cta2_type == 'style3'){
		
		if($src !== ''){
			$image = wp_get_attachment_image_src($src, array(530, 393));
				$image = '<img src="'.$image[0].'" alt="'.$h2.'" class="img-responsive">';
		}else {
			$image = '<img src="'.get_template_directory_uri().'/assets/img/screen2.png" alt="placeholder">';
		}
		
        $output .= '<div class="features-parts-second">
                        <!-- Left Column -->
                        <div data-sr="enter top over 1s and move 100px" class="col-sm-5">
                            <!-- Title -->
                            <div class="features-parts-title">
                                <h3>'.$h2.'</h3>
                            </div>
                            <!-- Description -->
                            <div class="features-parts-content">
                                <p>'.$call_text.'</p>
                            </div>
                            <!-- Button -->
                            <a class="btn '.$type.'" href="'.esc_url($a_href).'" title="'.$a_title.'" target="'.$a_target.'" role="button">'.$title.'</a>
                        </div>

                        <!-- Right Column -->
                        <div data-sr="enter bottom over 1s and move 65px" class="col-sm-7 text-center">
                            <!-- Image -->
                            <div class="features-img">
                                '.$image.'
                            </div>
                        </div>
                    </div>';
    }

    if($cta2_type == 'style4'){
        $output .= '<div class="col-no-p">
                        <div class="video-content">
                            <header>
                                <div class="col-sm-8 col-sm-offset-2 text-center">
                                    <!-- Title -->
                                    <h3>'.$h2.'</h3>
                                    <article>
                                        <!-- Description -->
                                        <p>'.$call_text.'</p>
                                    </article>
                                    <!-- Button -->
                                    <a class="btn '.$type.'" href="'.esc_url($a_href).'" title="'.$a_title.'" target="'.$a_target.'" role="button">'.$title.'</a>
                                </div>
                            </header>
                        </div>
                    </div>';
    }


    return $output;

}

remove_shortcode('cta2');
add_shortcode('cta2', 'call_to_action2');

// Contact form

function th_contact_form7($attrs,$content=false){
    extract(shortcode_atts(array(
        'form_type'=>'default',
        'title'=>'',
        'subtitle'=>'',
        "id" => '',
    ),$attrs));
function_exists('wpcf7') && wpcf7();

	$output = '';
	
    if($form_type == 'default'){

        $output = '<!-- Contact Form -->
                <div class="contact-form">
                    <div class="form-content col-sm-8 col-sm-offset-2">
                        <h2>'.$title.'</h2>
                    </div>';
        $output .= do_shortcode('[contact-form-7 id="'.$id.'"]');
        $output .= '</div>';

    }elseif($form_type == 'signup'){

        $output = '<div data-sr="enter right over 1s and move 100px" class="col-sm-8 col-sm-offset-2 subscribe-content text-center">
                        <header>
                            <h2>'.$title.'</h2>
                            <p>'.$subtitle.'</p>
                        </header>';
        $output .= do_shortcode('[contact-form-7 id="'.$id.'" html_class="form-inline"]');
        $output .= '</div>';

    }

    return $output;
}

remove_shortcode('th_contact_form7');
add_shortcode('th_contact_form7', 'th_contact_form7');

// Counter

function th_counter($atts, $content = null) {
    extract(shortcode_atts(array(
        "title" => 'Projects',
        "number" => '1000'
    ), $atts));

    $output = '<div class="info-content"><h1 class="numscroller numscroller-big-bottom" data-slno="1" data-min="0" data-max="'.$number.'" data-delay="11" data-increment="9">0</h1><p class="info-counter">'.$title.'</p></div>';

    return $output;
}

remove_shortcode('counter');
add_shortcode('counter', 'th_counter');

// Google Map

function th_gmap($atts, $content = null) {
    extract(shortcode_atts(array(
        "height" => '600',
        "zoom" 	=> '15',
        "lat" 	=> '40.712784',
        "long" 	=> '-74.005941',
    ), $atts));

    wp_enqueue_script('gmap', '', '', '', true);

    if(!$lat || !$long) {
        return 'Error: no location lat and/or long data found';
    }

    $coordinates = $lat.','.$long;

    ob_start();
    ?>
    <script type="text/javascript">

        jQuery(document).ready(function() {

            'use strict';

            function initialize() {
                var myLatlng = new google.maps.LatLng(<?php echo $coordinates; ?>);
                var mapOptions = {
                    zoom: <?php echo $zoom; ?>,
                    center: myLatlng
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                // Disabled Map Scroll in Contact Page
                map.setOptions({'scrollwheel': false});

                // Black and White style for Google Map
                var styles = [
                    {
                        stylers: [
                            { saturation: -100 }
                        ]
                    },{
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [
                            { lightness: -8 },
                            { visibility: "simplified" }
                        ]
                    },{
                        featureType: "road",
                        elementType: "labels",
                    }
                ];
                map.setOptions({styles: styles});

                // Google Map Maker
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        });

    </script>

    <!-- Google Map -->
    <div class="col-no-p">
        <div id="map-canvas" style="height:<?php echo str_replace('px','',$height); ?>px;"></div>
    </div>
    <!-- End Google Map -->

    <?php

    $content = ob_get_contents();
    ob_end_clean();

    return $content;

}
remove_shortcode('gmap');
add_shortcode('gmap', 'th_gmap');

// Icon Box Shortcode

function th_icon_box($atts, $content = null) {
    extract(shortcode_atts(array(
        'th_icon_type' => 'style1',
        'type' => 'fontawesome',
        'icon_fontawesome' => 'fa fa-adjust',
        'icon_openiconic' => '',
        'icon_typicons' => '',
        'icon_entypoicons' => '',
        'icon_linecons' => '',
        'icon_entypo' => '',
        'icon_elegant' => 'vc_th icon-laptop',
        'title_name' => 'Features Title',
        'text' => '',
    ), $atts));

    // Enqueue needed icon font.
    th_vc_icon_element_fonts_enqueue( $type );

    if($th_icon_type == 'style1'){
        $return = ' <!-- Features Item -->
                <div data-sr="enter bottom over 1s and move 65px" class="">
                    <div class="features-item text-center">
                        <div class="features-icon">
                            <span class="'.esc_attr( ${"icon_" . $type} ).'"></span>
                        </div>
                        <h3 class="features-title">'.$title_name.'</h3>
                        <div class="features-descr">'.$text.'</div>
                    </div>
                </div>';
    }

    if($th_icon_type == 'style2'){
        $return = ' <!-- Features Item -->
                <div data-sr="enter bottom over 1s and move 65px" class="">
                    <div class="features-item elements-features-item text-center">
                        <div class="features-icon">
                            <span class="'.esc_attr( ${"icon_" . $type} ).'"></span>
                        </div>
                        <h3 class="features-title">'.$title_name.'</h3>
                        <div class="features-descr">'.$text.'</div>
                    </div>
                </div>';
    }

    if($th_icon_type == 'style3'){
        $return = '<div data-sr="enter bottom over 1s and move 65px" class="">
                        <div class="elements-features-left-icon">
                            <div class="features-item">
                                <div class="col-sm-2">
                                    <div class="features-icon">
                                        <span class="'.esc_attr( ${"icon_" . $type} ).'"></span>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <h3 class="features-title">'.$title_name.'</h3>
                                    <div class="features-descr">'.$text.'</div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }

    if($th_icon_type == 'style_contact'){
        $output_after = '<div class="contact-address">';

        $output = '<div class="text-center">
                        <p><span class="'.esc_attr( ${"icon_" . $type} ).'"></span></p>
                        <span><b>'.$title_name.'</b></span>
                        <address>
                            <small>'.$text.'</small>
                        </address>
                    </div>';

        $output_before = '</div>';

        $return = $output_after;
        $return .= $output;
        $return .= $output_before;
    }


        return $return;
}

remove_shortcode('icon_box');
add_shortcode('icon_box', 'th_icon_box');

// Icon Box carousel Shortcode

function th_icon_box_carousel($atts, $content = null) {
    extract(shortcode_atts(array(
        'type' => 'fontawesome',
        'icon_fontawesome' => 'fa fa-adjust',
        'icon_openiconic' => '',
        'icon_typicons' => '',
        'icon_entypoicons' => '',
        'icon_linecons' => '',
        'icon_entypo' => '',
        'icon_elegant' => '',
        "title" => '',
        "text" => '',
    ), $atts));


    $output='';
    $output .= '<div id="service-slider" class="owl-carousel text-center owl-theme">';
    $output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
    $output .= '</div>';

        return $output;
}

remove_shortcode('icon_box_carousel');
add_shortcode('icon_box_carousel', 'th_icon_box_carousel');

// Icon Box carousel Shortcode

function th_icon_box_carousel_item($atts, $content = null) {
    extract(shortcode_atts(array(
        'type' => 'fontawesome',
        'icon_fontawesome' => 'fa fa-adjust',
        'icon_openiconic' => '',
        'icon_typicons' => '',
        'icon_entypoicons' => '',
        'icon_linecons' => '',
        'icon_entypo' => '',
        'icon_elegant' => 'vc_th icon-laptop',
        "title_text" => 'Features Title',
        "text" => '',
        "el_class" => '',

    ), $atts));

    // Enqueue needed icon font.
    th_vc_icon_element_fonts_enqueue( $type );

        $return = ' <!-- Features Item -->
                <div data-sr="enter bottom over 1s and move 65px" class="item">
                    <div class="features-item text-center">
                        <div class="features-icon">
                            <span class="'.esc_attr( ${"icon_" . $type} ).'"></span>
                        </div>
                        <h3 class="features-title">'.$title_text.'</h3>
                        <div class="features-descr">'.$text.'</div>
                    </div>
                </div>';

        return $return;
}

remove_shortcode('icon_box_item');
add_shortcode('icon_box_item', 'th_icon_box_carousel_item');

// Lead Text

function th_lead_text($attrs,$content=false){
    extract(shortcode_atts(array(
        "el_class" => '',
    ),$attrs));

    $output = '';
    $output .= '<div class="about-content text-center '.$el_class.'">
                    <!-- Description -->
                    '.wpb_js_remove_wpautop( $content , true ).'
                </div>';


    return $output;
}

remove_shortcode('lead_text');
add_shortcode('lead_text', 'th_lead_text');

// Logo Images

function th_logos($atts, $content = null) {
    extract(shortcode_atts(array(
        "images" => '',
        "onclick" => '',
        "custom_links" => '',
		"target" => '_self'
    ), $atts));


    ob_start();

    ?>

    <!-- Client Items -->
    <div class="container rk-clients-content">

	<?php

	if($onclick == 'custom_link') {
        $custom_links = explode(',',$custom_links);
    }

	$images = explode( ',', $images );
	$i = - 1;

	foreach ( $images as $attach_id ) {
        $i ++;
        $link_href = '';
        if($onclick == 'custom_link') {
            $link_href = ' href="'.$custom_links[$i].'"';
        }
        $img = wp_get_attachment_image_src($attach_id, 'full');

        $output = '';
        $output .= '<!-- Item -->
                    <div data-sr="enter bottom over 1s and move 65px" class="col-md-3 col-sm-4">
                        <a'.$link_href.' class="thumbnail" target="'.$target.'">
                            <img src="'.$img[0].'"  alt>
                        </a>
                    </div>';

        echo $output;
    }


	echo '</div><!-- /.container --> ';

	$content = ob_get_contents();
	ob_end_clean();

	return $content;

}
remove_shortcode('logos_images');
add_shortcode('logos_images', 'th_logos');

//Portfolio Grid

function th_portfolio_grid($attrs,$content=false){
    extract(shortcode_atts(array(
        'all_filter'=> 'all',
        'filter_style'=> 'main',
        'posts_per_page'=>12,
        'order'=> 'desc',
        'orderby'=> 'none',
    ),$attrs));


    $html = '';
    $html .='<!-- Portfolio Filters -->';

    if($filter_style == 'main'){
        $html.='<div data-sr="enter bottom over 1.3s and move 65px" id="filters-container" class="cbp-l-filters-buttonCenter">';
    }elseif($filter_style == 'left_style'){
        $html.='<div data-sr="enter bottom over 1.3s and move 65px" id="portfolio-filters-container" class="cbp-l-filters-alignRight">';
    }elseif($filter_style == 'without'){
        //$html.='<div data-sr="enter bottom over 1.3s and move 65px" id="filters-container" class="cbp-l-filters-buttonCenter">';
    }

    if($filter_style !== 'without') {
        $html .= "<div data-filter=\"*\" class=\"cbp-filter-item-active cbp-filter-item\">" . __($all_filter, 'rook') . "
        <div class=\"cbp-filter-counter\"></div>
        </div>";

        $args = array(
            'hierarchical' => false,
            'parent' => 0,
            'taxonomy' => 'project-type'
        );
        $categories = get_categories($args);

        if (!empty($categories)) {
            foreach ($categories as $key => $value) {
                $html .= "<div data-filter='.{$value->slug}' class=\"cbp-filter-item\">{$value->name}
                <div class=\"cbp-filter-counter\"></div>
                </div>";
            }
        }

        $html .= '</div><!--End #filters-container-->';
    }


    if($filter_style == 'main'){
        $html.='<div id="grid-container" class="cbp-l-grid-masonry-projects">';
    }elseif($filter_style == 'left_style'){
        $html.='<div id="portfolio-grid-container" class="cbp-l-grid-masonry">';
    }elseif($filter_style == 'without'){
        $html.='<div id="portfolio2-grid-container" class="cbp-l-grid-masonry">';
    }
    //$posts_per_page=3;
    //Loop portfoliio
    $args=array(
        'post_type'=>'portfolio',
        'posts_per_page'=>$posts_per_page,
        'order'=> $order,
        'orderby'=> $orderby,
    );
    query_posts($args);
    while(have_posts())
    {
        the_post();
        $terms=wp_get_post_terms(get_the_ID(),'project-type');
        $term_string='';
        if(!empty($terms))
        {
            foreach($terms as $key=>$value)
            {
                $term_string.=' '.$value->slug;
            }
        }

		$portf_thumbnail = '';
        $portf_thumbnail .= get_post_meta(get_the_id(),'portf_thumbnail',true);

		$th_w=''; $th_h='';
        switch ($portf_thumbnail) {
            case 'portfolio-small':
				$th_w='450'; $th_h='430';
                //$item_class = 'cbp-l-grid-masonry-height1';
                break;
            case 'half-vertical':
                $th_w='450'; $th_h='700';
                //$item_class = 'cbp-l-grid-masonry-height2';
                break;
        }


        global $post;
        $post_type = get_post_meta($post->ID, 'link_type', true);

		$title=get_the_title();
        $th_is_lightbox = 'cbp-lightbox';
        $thumb = '<img src="'.th_thumb($th_w, $th_h).'" alt="'.$title.'">';
		$project_desc=get_post_meta(get_the_ID(),'project_desc',true);
        $video=get_post_meta(get_the_ID(),'name',true);
        $url=get_post_meta(get_the_ID(),'url',true);
        $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        if($post_type == 'direct' && !empty($video) )
        {
            $full=$video;
        }
        if( $post_type == 'external' && !empty($url) )
        {
            $full=$url;
            $th_is_lightbox = '';
        }
        if( $post_type == 'single_page')
        {
            $full= get_the_permalink();
            $th_is_lightbox = '';
        }

        $permalink=get_the_permalink();
		$hover_image=th_theme_data('hover_image');
		if ($hover_image and isset($hover_image['url']) and $hover_image['url'] !== '') {
			$hover_image_caption = '<img src="'.$hover_image['url'].'"  alt>';
		} else{
			$hover_image_caption = '<span class="icon-scope"></span>';
		}

        $html.="<div class=\"cbp-item {$term_string}\">
                    <div class=\"cbp-caption\">
                        <div class=\"cbp-caption-defaultWrap\">
                            {$thumb}
                        </div>
                        <a href=\"{$full}\" class=\"{$th_is_lightbox}\" data-title=\"{$title}<br>{$project_desc}\">
                            <div class=\"cbp-caption-activeWrap\">
                                <div class=\"cbp-l-caption-alignCenter\">
                                    <div class=\"cbp-l-caption-body\">
										{$hover_image_caption}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>";
        if($filter_style !== 'without') {
            $html .= "<div class=\"rk-portfolio-desc\">
                        <a href=\"{$full}\" class=\"cbp-l-grid-masonry-projects-title\">{$title}</a>
                        <div class=\"cbp-l-grid-masonry-projects-desc\">{$project_desc}</div>
                    </div>";
        }
        $html.="</div>";
    }
    $html.="</div><!--End #grid-container-->";

    wp_reset_query();
    return $html;
}

remove_shortcode('portfolio_grid');
add_shortcode('portfolio_grid', 'th_portfolio_grid');

// Slider

function th_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        "th_slider_style" => '',
        "images" => '',
        "onclick" => '',
        "custom_links" => '',
        'type' => 'fontawesome',
        'icon_fontawesome' => 'fa fa-adjust',
        'icon_openiconic' => '',
        'icon_typicons' => '',
        'icon_entypoicons' => '',
        'icon_linecons' => '',
        'icon_entypo' => '',
        'icon_elegant' => '',
        "title" => '',
        "text" => '',
    ), $atts));


    if($th_slider_style == 'default'){

        ob_start();

        ?>

        <div id="fullwidth-slider" class="owl-carousel owl-theme">

            <?php

            if($onclick == 'custom_link') {
                $custom_links = explode(',',$custom_links);
            }

            $images = explode( ',', $images );
            $i = - 1;

            foreach ( $images as $attach_id ) {
                $i ++;
                $link_href = '';
                if($onclick == 'custom_link') {
                    $link_href = ' href="'.$custom_links[$i].'"';
                }
                $img = wp_get_attachment_image_src($attach_id, 'full');

                $output = '';
                $output .= '<!-- Item -->
                            <div data-sr="enter bottom over 1s and move 65px" class="item">
                                <a'.$link_href.'>
                                    <img src="'.$img[0].'"  alt>
                                </a>
                            </div>';

                echo $output;
            }

	    echo '</div><!-- /.container --> ';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;

    }

    if($th_slider_style == 'small'){

        ob_start();

        ?>

        <div id="clients-slider" class="owl-carousel text-center owl-theme">

            <?php

            if($onclick == 'custom_link') {
                $custom_links = explode(',',$custom_links);
            }

            $images = explode( ',', $images );
            $i = - 1;

            foreach ( $images as $attach_id ) {
                $i ++;
                $link_href = '';
                if($onclick == 'custom_link') {
                    $link_href = ' href="'.$custom_links[$i].'"';
                }
                $img = wp_get_attachment_image_src($attach_id, 'full');

                $output = '';
                $output .= '<!-- Item -->
                            <div data-sr="enter bottom over 1s and move 65px" class="item">
                                <a'.$link_href.'>
                                    <img src="'.$img[0].'"  alt>
                                </a>
                            </div>';

                echo $output;
            }

	    echo '</div><!-- /.container --> ';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;

    }

    if($th_slider_style == 'icon_box'){

        th_vc_icon_element_fonts_enqueue( $type );

        ?>

        <div id="service-slider" class="owl-carousel text-center owl-theme">

            <?php

            $return = '<div class="item">
                            <div class="features-item text-center">
                                <div class="features-icon">
                                    <span class="'.esc_attr( ${"icon_" . $type} ).'"></span>
                                </div>
                                <h3 class="features-title">'.$title.'</h3>
                                <div class="features-descr">'.$text.'</div>
                            </div>
                        </div>';

	    echo '</div><!-- /.container --> ';

        return $return;

    }


}
remove_shortcode('th_custom_slider');
add_shortcode('th_custom_slider', 'th_slider');

// Special Heading

function th_heading($atts, $content=null) {
    extract(shortcode_atts(array(
        "title" 				=> '',
        "font"					=> 'default',
        "th_text_align"			=> 'text-center'
    ), $atts));


    $output = '';
	
	if($font == 'default'){
		
		$output .= '<!-- Head Title -->';
		$output .= '<div class="rk-head-title">';
		$output .= '<h1>'.$title.'</h1>';
		$output .= '<!-- Title Devider --> ';
		$output .= '<div class="rk-separator"></div>';
		$output .= '</div>';
		
	}elseif($font == 'without_underline'){
		$output .= '<div class="small-slider">';
		$output .= '<article>';
		$output .= '<h2 class="'.$th_text_align.'">'.$title.'</h2>';
		$output .= '</article>';
		$output .= '</div>';
		
	}


    return $output;
}
add_shortcode('special_heading', 'th_heading');

// Team Member

function th_team_member($atts, $content=false)
{
    extract(shortcode_atts(array(
        "name" => 'John Doe',
        "description" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        "position" => '',
        "src" => '',
        "custom_field" => 'CUSTOM FIELD',
        "custom_description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.',
        "facebook" => '',
        "twitter" => '',
        "behance" => '',
        "linkedin" => '',
        "envelope" => '',
    ), $atts));

    $icon_arr = array('facebook', 'twitter', 'behance', 'linkedin', 'envelope');
    $envelope ='';
	$socials ='';

    foreach ($icon_arr as $icon_name) {
        if (isset($atts[$icon_name])) {
            if($atts[$icon_name] == 'envelope'){
                $socials .= '<a href="'.$atts[$icon_name].'"><i class="fa fa-'.$icon_name.' fa-lg"></i></a>';
            }else{
                $socials .= '<a href="'.$envelope.$atts[$icon_name].'"><i class="fa fa-'.$icon_name.' fa-lg"></i></a>';
            }
        }
    }

    $image = wp_get_attachment_image_src($src, array(650, 500));
    if(isset($image[0]) and $image[0]){
        $image = '<img src="'.$image[0].'" alt="'.$name.'"/>';
    } else {
        $image = '<img src="http://placehold.it/360x360" width="360" height="360" alt="placeholder360x360">';
    }


    return '<!-- Team Content -->
            <div class="team-content">
                <!-- Team Item (name, information about, image, social icons) -->                
                <div class="team-inner">
                    <!-- Image -->
                    '.$image.'
                </div>
                <div class="team-details text-center">
                    <!-- Info -->
                    <h3>'.$name.'</h3>
                    <h5>'.$position.'</h5>
                    <p>'.$description.'</p>
                </div>
            </div> <!-- /.row -->';

}

remove_shortcode('team_member');
add_shortcode('team_member', 'th_team_member');

//		Testimonials Carousel

function th_testimonials($atts, $content = null) {
    extract(shortcode_atts(array(
        "posts_nr" => '',
    ), $atts));


    ob_start();

    ?>

    <div data-sr="enter bottom over 1s and move 110px wait 0.3s" class="cbp-l-slider-testimonials-wrap">
        <div class="cbp-panel" style="max-width:980px">
            <!-- Testimonial Items -->
            <div id="grid-slider-testimonials" class="cbp-l-grid-slider-testimonials cbp-slider-edge">

    <?php

    wp_reset_postdata();

        $args = array(
            'posts_per_page' => $posts_nr,
            'post_type' => 'testimonials'
        );


    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $testimonial_name = get_post_meta( get_the_ID(), '_thcmb_testimonial_name', true );
        $testimonial_job = get_post_meta( get_the_ID(), '_thcmb_testimonial_job', true );
        $testimonial_url = get_post_meta( get_the_ID(), '_thcmb_testimonial_url', true );
        $testimonial_code = get_post_meta( get_the_ID(), '_thcmb_testimonial_code', true );
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

        $output ='';
        $output .= '<div class="cbp-item">
                        <div class="cbp-l-grid-slider-testimonials-body">';

                            if( $thumbnail_url != ''){
                                $output .= '<img src="'.esc_url($thumbnail_url).'" alt="'.esc_attr($testimonial_name).'" class="img-circle">';
                            }

        $output .= $testimonial_code;
        $output .=     '</div>';

        $output .= '<div class="cbp-l-grid-slider-testimonials-footer">';

        if (!empty($testimonial_url)) {
            $output .= '<a href="'.esc_url($testimonial_url).'">'.$testimonial_name.', '.$testimonial_job.'</a>';
        }else {
            $output .= $testimonial_name.', '.$testimonial_job;
        }

        $output .= '</div>
                </div>';

        echo $output;

    endwhile; endif; wp_reset_postdata();

    echo '</div></div></div>';

    $content = ob_get_contents();
    ob_end_clean();

    return $content;

}
remove_shortcode('testimonials');
add_shortcode('testimonials', 'th_testimonials');


// Pricing table

function th_pricing_box($atts, $content) {
	extract(shortcode_atts(array(
		"title" => '',
		"features" => '',
		"button_label" => '',
		"period" => '',
		"price" => '',
		"button_url" => ''
	), $atts));


	$features_arr = explode(',',$features);	
		

	$output = '<div class="thumbnail price-table text-center">
                    <div class="caption">
                        <h3>'.$title.'</h3>
                        <br>
                        <h1>'.$price.'</h1>
                        <small>'.$period.'</small>
                        <div class="rk-mtop30"></div> ';

    foreach($features_arr as $single_feature) {
        $output .= '<p>'.$single_feature.'</p>';
    }

    if(!$button_url) $button_url = '#';

    $output .= '<div class="rk-mtop30"></div>
						<a class="btn btn-pink btn-x1 " href="'.$button_url.'" role="button">'.$button_label.'</a>
                    </div>
                </div>';

	return $output;
	
}

remove_shortcode('pricing_box');
add_shortcode('pricing_box', 'th_pricing_box'); 
?>