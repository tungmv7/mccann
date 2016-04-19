<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $th_full_width = $th_width = $row_content_before = $row_content_after = $parallax_opacity = $overlay_color = '';
extract( shortcode_atts( array(
    'el_class' => '',
    'bg_image' => '',
    'bg_color' => '',
    'bg_image_repeat' => '',
    'font_color' => '',
    'padding' => '',
    'margin_bottom' => '',
    'th_section_padding' => 'default',
    'th_full_width' => false,
    'css' => '',
    'el_id' => '',
    'bg_section_color' => 'white',
	'parallax_opacity' => '',
	'overlay_color' => '',
), $atts ) );


if(!$el_id) $el_id = rand(1,9999);

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row1 ' . ( $this->settings( 'base' ) === 'vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = $this->buildStyle( $bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom );

//Adding container class before main section class
if($th_section_padding == 'default'){
    $th_width = ' section-padding';
}
if($th_full_width == 'stretch_content'){
    $row_content_before .= '<div class="container">';
    $row_content_after .= '</div><!-- /.container -->';
}
if($th_full_width == 'stretch_row_content'){
    $row_content_before .= '<div class="container"><div class="row">';
    $row_content_after .= '</div><!-- /.row --></div><!-- /.container -->';
}

//Background Section
$bg_section_color_class = '';
$parallax_overlay ='';
if($bg_section_color =='grey'){
    $bg_section_color_class = ' section-bg-color';
}
if($bg_section_color =='black'){
    $bg_section_color_class = ' features-parts-cta';
}
if($bg_section_color =='parallax'){
    $bg_section_color_class = ' parallax';
    $parallax_overlay .= 'data-bg-color="'.$overlay_color.'" data-overlay-opacity="'.$parallax_opacity.'"';
}

// Row output
$output .= '<section id="'.$el_id.'" class="'.esc_attr( $css_class.$th_width.$bg_section_color_class ).''.$style.'" '.$parallax_overlay.'>';
$output .= $row_content_before;
$output .= wpb_js_remove_wpautop( $content );
$output .= $row_content_after;
$output .= '</section>'.$this->endBlockComment('row');

echo $output;