<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?><?php  if(th_theme_data('enable_rtl_layout') == true) { echo esc_attr('dir="rtl"'); } ?> > <!--<![endif]-->
<head>
    <?php
		// If before WP4.4 - show old wp_title() function
		if ( ! function_exists( '_wp_render_title_tag' ) ) :
			function woss_render_title() {
		?>
				<title><?php wp_title('-', true, 'right'); ?></title>
		<?php
			}
			add_action( 'wp_head', 'woss_render_title' );
		endif;
	?>

    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
		// If WP4.3+ and no site_icon is set - show custom
		if ( function_exists( 'has_site_icon' ) && !has_site_icon() ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=th_theme_data('favicon'); echo esc_url($favicon['url']); ?>" type="image/x-icon">	
		<?php }
		// If before WP4.3 - show custom
		if ( ! function_exists( 'wp_site_icon' ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=th_theme_data('favicon'); echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } ?>
    
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head() ?>
</head>


<body <?php body_class() ?> id="page-top">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<?php if(th_theme_data('preloader') == 1):
$custom_spinner=th_theme_data('custom_spinner');
$dimensions=th_theme_data('loader-dimensions'); ?>
    <!--Start Preloader-->
    <div id="preloader">
        <div class="preloader-container">
			<?php if ($custom_spinner and isset($custom_spinner['url']) and $custom_spinner['url'] !== '') { ?>
				<div class="spinner" style="height:<?php echo absint($dimensions['height']); ?>px; width:<?php echo absint($dimensions['width']); ?>px; background:url('<?php echo esc_url($custom_spinner['url']); ?>') no-repeat;"></div>
				<?php
				} else { ?>
					<div class="spinner"></div>
				<?php }?>
        </div>
    </div>
    <!--End Preloader-->
<?php endif;?>
<!-- Header -->
<div id="header-section">
    <?php get_template_part( 'menu', 'index' ); ?>
</div>
<!-- End Header -->