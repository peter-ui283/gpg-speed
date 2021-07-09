<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


function gpg_adding_scripts() {
 
wp_register_script('utm_forms', get_template_directory_uri() . '_child/utm_form-1.0.4-gpg.js', array('jquery'),'1.1', true);
 
wp_enqueue_script('utm_forms');
}
  
add_action( 'wp_enqueue_scripts', 'gpg_adding_scripts' );  


function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

// after code start here

function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );






add_action('wp_enqueue_scripts', 'dequeue_set_styles', PHP_INT_MAX );
function dequeue_set_styles() {
	if( is_front_page() ){
		 wp_dequeue_style('element-pack-site');
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('premium-pro');
		wp_dequeue_style('generate-font-icons');
		wp_dequeue_style('font-awesome-v4-shims');
		wp_dequeue_style('jet-menu-public');
		wp_dequeue_style('elementor-animations');
		wp_dequeue_style('font-awesome-4-shim');		
	}
}

add_action( 'elementor/frontend/after_register_styles',function() {
	foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
		wp_deregister_style( 'elementor-icons-fa-' . $style );
	}
}, 20 );

// add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 ); 
// function remove_default_stylesheet() { 
// 	wp_deregister_style( 'elementor-icons' ); 
// }


function font_preloading_preload_key_requests() { ?>
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff2" crossorigin="anonymous">
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2" crossorigin="anonymous">
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/uploads/2020/11/DMSans-Regular.woff2" crossorigin="anonymous">
<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/uploads/2020/11/DMSans-Medium.woff2" crossorigin="anonymous">
<?php }
add_action('wp_head', 'font_preloading_preload_key_requests');



