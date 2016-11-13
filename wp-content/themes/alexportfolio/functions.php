<?php
	
	/* ------ ENQUEUE STYLESHEETS AND SCRIPTS ------ */
	function alexportfolio_scripts_styles_setup() {
		global $wp_styles;

		// CSS Queues
		wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '4.6.3');
		wp_enqueue_style('main_css', get_template_directory_uri() . '/stylesheets/styles.css', array(), '1.0.0');

		// JS Queues
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');  
		wp_enqueue_script('jquery');

		wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/javascripts/bootstrap.min.js', 'jquery', '3.3.6', true);
		wp_enqueue_script('matchHeight_js', get_template_directory_uri() . '/javascripts/jquery.matchHeight.js', 'jquery', '1.0.0', true);
		wp_enqueue_script('main_js', get_template_directory_uri() . '/javascripts/main.js', 'jquery', '1.0.0', true);
	}
	add_action('wp_enqueue_scripts', 'alexportfolio_scripts_styles_setup');


	/* ------ MENUS ------*/
	function alexportfolio_register_menus() {
		register_nav_menus(
			array(
				'main_menu'	=>	__('Main Menu')
			)
		);
	}
	add_action('init', 'alexportfolio_register_menus');

	/* ------ Add Featured Image support in Post Pages ------ */
	function alexportfolio_post_thumbnails() {
		add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme', 'alexportfolio_post_thumbnails');

	/* ------ Thumbnail Upscale ------ */
	function alexportfolio_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
	    if ( !$crop ) return null; // let the wordpress default function handle this
	 
	    $aspect_ratio = $orig_w / $orig_h;
	    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
	 
	    $crop_w = round($new_w / $size_ratio);
	    $crop_h = round($new_h / $size_ratio);
	 
	    $s_x = floor( ($orig_w - $crop_w) / 2 );
	    $s_y = floor( ($orig_h - $crop_h) / 2 );
	 
	    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
	add_filter( 'image_resize_dimensions', 'alexportfolio_thumbnail_upscale', 10, 6 );

	/* ------ Custom Image Sizes ------ */
	function hnfcanada_custom_image_sizes() {
		// add_image_size('medium-large', 800, 800);
		// add_image_size('hero-image', 1665, 909);
	}
	add_action('after_setup_theme', 'hnfcanada_custom_image_sizes');

	/* ------ Page Slug Body Class ------ */
	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

	/* ------ Set excerpt length ------ */
	function custom_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	/* ------ TINYMCE ADVANCE ------ */
	function my_mce_before_init_insert_formats($init_array) {
		$style_formats = array(
			array(
				'title'		=>	'Primary Button',
				'block' => 'a', 
				'classes'	=>	'btn-primary',
				'wrapper' => true,
			),
		);
		$init_array['style_formats'] = json_encode( $style_formats) ;
		return $init_array;
	}

	// Attach callback to 'tiny_mce_before_init'
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

?>