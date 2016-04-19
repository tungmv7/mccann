<?php
/** @var $this WPBakeryShortCode_VC_Tab */
$output = $title = $tab_id = '';
//extract(shortcode_atts($this->predefined_atts, $atts));

extract( shortcode_atts( array(
	'title' => '',
	'tab_id' => '',
	'style' => '',
), $atts ) );

if (isset($GLOBALS['th_tab_style']) && $GLOBALS['th_tab_style'] == 'stylish' ) {
   $style = 'stylish';
}elseif (isset($GLOBALS['th_tab_style']) && $GLOBALS['th_tab_style'] == 'main' ) {
   $style = 'main';
}

if($style == 'stylish') {

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );

	$output .= "\n\t\t\t" . '<div role="tabpanel" class="tab-pane fade in '.$css_class.'" id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'">';
	$output .= "\n\t\t\t\t" . '<div class="col-sm-8 text-center col-sm-offset-2">';
	
	$output .= '<div class="tabpanel-title">
					<h3>'.$title.'</h3>
				</div>';
	
	$output .= ($content=='' || $content==' ') ? __("Empty tab. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
	
	$output .= "\n\t\t\t\t" . '</div>';
	$output .= "\n\t\t\t" . '</div>' . $this->endBlockComment('.wpb_tab');
	
	
}elseif($style == 'main') {

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );

	$output .= "\n\t\t\t" . '<div role="tabpanel" class="tab-pane fade in '.$css_class.'" id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'">';
	
	
	$output .= ($content=='' || $content==' ') ? __("Empty tab. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
	
	$output .= "\n\t\t\t" . '</div>' . $this->endBlockComment('.wpb_tab');
	
	
}else{
	
	wp_enqueue_script('jquery_ui_tabs_rotate');

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );

	$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class.'">';
	$output .= ($content=='' || $content==' ') ? __("Empty tab. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
	$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_tab');
}


echo $output;