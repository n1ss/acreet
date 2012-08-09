<?php
/**
 *
 * HTML Shortcodes
 *
 */

// Frames

function frame_shortcode($atts, $content = null) {

	$content = remove_invalid_tags($content, array('p'));

    $output = '<div class="frame clearfix">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame', 'frame_shortcode');

function frame_left_shortcode($atts, $content = null) {

	$content = remove_invalid_tags($content, array('p'));

    $output = '<div class="frame alignleft">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame_left', 'frame_left_shortcode');

function frame_right_shortcode($atts, $content = null) {

	$content = remove_invalid_tags($content, array('p'));

    $output = '<div class="frame alignright">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame_right', 'frame_right_shortcode');


// Button

function button_shortcode($atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => 'http://www.google.com',
            'text' => 'Button Text',
		  'custom_class' => ''
    ), $atts));
    
    $output =  '<a href="'.$link.'" title="'.$text.'" class="button '.$custom_class.'">';
	$output .= '<span class="left"><span class="right">'.$text.'</span></span>';
	$output .= '</a><!-- .button (end) -->';

    return $output;

}

add_shortcode('button', 'button_shortcode');


// Dropcaps

function dropcap_shortcode($atts, $content = null) {

    $output = '<span class="dropcap">';
    $output .= do_shortcode($content);
    $output .= '</span><!-- .dropcap (end) -->';

    return $output;

}

add_shortcode('dropcap', 'dropcap_shortcode');


// Horizontal Rule

function hr_shortcode($atts, $content = null) {
    
    $output = remove_invalid_tags($output, array('p'));		
    $output = '<div class="hr"><!-- --></div>';

    return $output;

}

add_shortcode('hr', 'hr_shortcode');


// Blockquote

function blockquote_shortcode($atts, $content = null) {

    $output = '<blockquote>';
    $output .= do_shortcode($content);
    $output .= '</blockquote><!-- blockquote (end) -->';

    return $output;

}

add_shortcode('blockquote', 'blockquote_shortcode');


// Clear
function shortcode_clear() {
	return '<div class="clear"></div>';
}

add_shortcode('clear', 'shortcode_clear');


// Box

function shortcode_box($atts, $content) {

	extract(shortcode_atts(
        array(
            'style' => ''
    ), $atts));
	
    //remove wrong nested p tags
    $content = remove_invalid_tags($content, array('p'));	
    $output = '<div class="box '.$style.'"><div class="bg"><div class="inner">';
    $output .= do_shortcode($content);
    $output .= '</div></div></div><!-- .box (end) -->';

    return $output;

}

add_shortcode('box', 'shortcode_box');

?>