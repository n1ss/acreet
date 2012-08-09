<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 230, 214, true ); // Normal post thumbnails
		add_image_size( 'post-thumbnail-xl', 692, 300, true ); // Portfolio Extra Large Thumbnail
		add_image_size( 'slider-post-thumbnail', 990, 424, true ); // Slider Thumbnail
		add_image_size( 'small-post-thumbnail', 130, 121, true ); // Small Thumbnail
		add_image_size( 'testi-thumbnail', 120, 120, true ); // Testimonial Thumbnail
		add_image_size( 'extra-thumbnail', 150, 174, true ); // Extra Thumbnail
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;


/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slider'), 
				'singular_label' => __('Slide', 'theme1336'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'slide-view',
					'with_front' => FALSE,
				),
				'query_var' => "slide", // This goes to the WP_Query schema
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_slider');



/* Testimonial */
function my_post_type_testi() {
	register_post_type( 'testi',
                array( 
				'label' => __('Testimonial'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'testimonial-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_testi');


/* Our Features */
function my_post_type_features() {
	register_post_type( 'features',
                array( 
				'label' => __('Our features'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'features-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'custom-fields',
						'excerpt')
					) 
				);
}

add_action('init', 'my_post_type_features');



/* Guide to success */
function my_post_type_guide() {
	register_post_type( 'guide',
                array( 
				'label' => __('Guide to success'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'guide-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'excerpt')
					) 
				);
}

add_action('init', 'my_post_type_guide');


/* Babysitters */
function my_post_type_babysitters() {
	register_post_type( 'babysitters',
                array( 
				'label' => __('Babysitters'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'babysitters-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'comments',
						'custom-fields',
						'excerpt')
					) 
				);
}

add_action('init', 'my_post_type_babysitters');


/* FAQs */
function phi_post_type_faq() {
	register_post_type('faq', 
				array(
				'label' => __('FAQs posts'),
				'singular_label' => __('FAQ'),
				'public' => false,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "faq"), // Permalinks
				'query_var' => "faq", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'excerpt'/*,'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
	register_taxonomy("faq_category", 
				array("faq"), 
				array("hierarchical" => true, 
						"label" => "FAQ Categories", 
						"singular_label" => "FAQ Category",
						"rewrite" => true,
						"show_ui" => true,
						"public" => false));			
}
add_action('init', 'phi_post_type_faq');


?>