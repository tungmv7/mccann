<?php

/*
 * Theme Dynamic Stylesheet
 */
 
header("Content-type: text/css;");

$current_url = dirname(__FILE__);
$wp_content_pos = strpos($current_url, 'wp-content');
$wp_content = substr($current_url, 0, $wp_content_pos);

require_once($wp_content . 'wp-load.php');


$opt_typography_body=th_theme_data('opt-typography-body');
$opt_background=th_theme_data('opt-background');

/*Custom theme color*/
$th_select_stylesheet=th_theme_data('th_select_stylesheet');
if($th_select_stylesheet == 'custom'){
	$th_custom_color=th_theme_data('th_custom_color');
	$th_custom_hover_color=th_theme_data('th_custom_hover_color');
	$th_custom_nav_color=th_theme_data('th_custom_nav_color');
}
?>
body{
	font-family:<?php echo $opt_typography_body['font-family']; ?>;
	font-style:<?php echo $opt_typography_body['font-style']; ?>;
	font-size:<?php echo $opt_typography_body['font-size']; ?>;
	color:<?php echo $opt_typography_body['color']; ?>;
	line-height:<?php echo $opt_typography_body['line-height']; ?>;
	
	background-color:<?php echo $opt_background['background-color']; ?>;
	background-repeat:<?php echo $opt_background['background-repeat']; ?>;
	background-size:<?php echo $opt_background['background-size']; ?>;
	background-attachment:<?php echo $opt_background['background-attachment']; ?>;
	background-position:<?php echo $opt_background['background-position']; ?>;
	background-image:<?php echo $opt_background['background-image']; ?>;
	
}
.cbp-l-caption-buttonLeft, .cbp-l-caption-buttonRight, .cbp-l-grid-masonry-projects-title, .cbp-l-grid-masonry-projects-desc, 
.cbp-l-loadMore-button .cbp-l-loadMore-button-link, .cbp-l-filters-buttonCenter .cbp-filter-item, #portfolio-filters-container .cbp-filter-item, 
#portfolio-grid-container .cbp-l-caption-title, #portfolio-grid-container .cbp-l-caption-desc, .cbp-l-grid-slider-testimonials-body, 
.cbp-l-grid-slider-testimonials-footer, .changer-inner span{
	font-family:<?php echo $opt_typography_body['font-family']; ?>;	
}

<?php
/*Custom theme color*/
if($th_select_stylesheet == 'custom'){ ?>
	a, .navbar-nav li.active a, .nav>li>a:hover, .cbp-l-grid-masonry-projects-title, .nav-tabs-services>li.active>a, .nav-tabs-services>li.active>a:hover, .nav-tabs-services>li.active>a:focus, 
	.tabpanel-title h3, .team-social a, .team-content .team-details h5, .blog-article article p.blog-article-btn, .features-icon span, .info-content .col-sm-3 h1, .footer-social a:hover, 
	.second-footer .col-sm-3 a:hover, .slider-typed span, .header-navbar .header-menu-content ul li p strong, .list-unstyled strong, .header-navbar .header-menu-content ul li a:hover, 
	.local-scroll i.scroll-down-icon, .blog-title a:hover, .blog-category ul li a:hover, .pagination>li>a:hover, .blog-cat-list li a:hover, .blog-tags a:hover, .blog-recent-post-item .media-body a:hover, 
	.tag-widget a:hover, .bar a:hover, h1.numscroller, .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a:hover, .dropdown-menu li a:hover{
		color: <?php echo $th_custom_color; ?>;
	}
	.navbar-nav li.current a{color: <?php echo $th_custom_color; ?>;}
	.rk-separator, .cbp-l-loadMore-button .cbp-l-loadMore-button-link, .blog-pagination .pagination>.active>a, #clients-slider .owl-controls .owl-page span, #service-slider .owl-controls .owl-page span{
		background-color: <?php echo $th_custom_color; ?>;
	}
	.cbp-l-loadMore-button .cbp-l-loadMore-button-link:hover {
		background-color: <?php echo $th_custom_hover_color; ?>;
	}
	.cbp-l-filters-buttonCenter .cbp-filter-item.cbp-filter-item-active, .cbp-l-filters-buttonCenter .cbp-filter-item:hover{
		color: <?php echo $th_custom_color; ?>;
		border-bottom: 2px solid <?php echo $th_custom_color; ?>;
	}
	#portfolio-filters-container .cbp-filter-item.cbp-filter-item-active { 
		border-color: <?php echo $th_custom_color; ?>;
	}
	.footer-second-social a:hover, a:hover, a:focus, .share-widget a:hover{
		color: <?php echo $th_custom_hover_color; ?>;
	}

	/* Buttons */
	.btn-pink{
		background-color: <?php echo $th_custom_color; ?>;
	}
	.btn-pink:hover{
		background-color: <?php echo $th_custom_hover_color; ?>;
	}
	.btn-pink-border {
		border: 2px solid <?php echo $th_custom_color; ?>;
	}
	.btn-pink-border:hover {
		background-color: <?php echo $th_custom_hover_color; ?>;
	}
	
	.navbar-nav li a{
		color: <?php echo $th_custom_nav_color; ?>;
	}
<?php
}

/*Custom CSS from theme options page*/
echo wp_kses_post(th_theme_data('opt-ace-editor-css'));
