<?php
function elegance_widgets_init() {
	// Header Widget
	// Location: right after the navigation
	register_sidebar(array(
		'name'					=> 'Header',
		'id' 						=> 'header-sidebar',
		'description'   => __( 'Located at the top of pages.'),
		'before_widget' => '<div class="widget-header %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Slider Widget
	// Location: at the right side of the slider
	register_sidebar(array(
		'name'					=> 'Slider Area',
		'id' 						=> 'slider-sidebar',
		'description'   => __( 'Located at the right side of the slider.'),
		'before_widget' => '<div class="widget-slider %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// First Content Widget Area
	// Location: at the top of the content
	register_sidebar(array(
		'name'					=> 'First Content Widget Area',
		'id' 						=> 'content-widget-area-1',
		'description'   => __( 'Located at the top of the content.'),
		'before_widget' => '<div class="widget-content %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Second Content Widget Area
	// Location: at the top of the content
	register_sidebar(array(
		'name'					=> 'Second Content Widget Area',
		'id' 						=> 'content-widget-area-2',
		'description'   => __( 'Located at the top of the content.'),
		'before_widget' => '<div class="widget-content %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id' 						=> 'main-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'First Footer Widget Area',
		'id' 						=> 'footer-sidebar-1',
		'description'   => __( 'Located at the bottom of pages.'),
		'before_widget' => '<div class="widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
		// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Second Footer Widget Area',
		'id' 						=> 'footer-sidebar-2',
		'description'   => __( 'Located at the bottom of pages.'),
		'before_widget' => '<div class="widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
		// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Third Footer Widget Area',
		'id' 						=> 'footer-sidebar-3',
		'description'   => __( 'Located at the bottom of pages.'),
		'before_widget' => '<div class="widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' );
?>