<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */



//  code for webp rights in wordpress

function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );


// code for de-register style

add_action('wp_enqueue_scripts', 'dequeue_set_styles', PHP_INT_MAX );
function dequeue_set_styles() {
	if( is_front_page() ){
		 wp_dequeue_style('premium-pro');	
	}
}


// code for preload font issues

function font_preloading_preload_key_requests() { ?>
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff2" crossorigin="anonymous">
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2" crossorigin="anonymous">
	<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/uploads/2020/11/DMSans-Regular.woff2" crossorigin="anonymous">
<link rel="preload" as="font" type="font/woff2" href="https://epicperiodontics.com/wp-content/uploads/2020/11/DMSans-Medium.woff2" crossorigin="anonymous">
<?php }
add_action( 'wp_head', 'font_preloading_preload_key_requests' );



// PRELOAD FILTER


add_filter( 'style_loader_tag',  'preload_filter', 10, 2 );
function preload_filter( $html, $handle ){
    if (strcmp($handle, 'footer-css') == 0) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' ", $html);
    }
	if (strcmp($handle, 'custom-elementor') == 0) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' ", $html);
    }	
	if (strcmp($handle, 'mainstyle') == 0) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' ", $html);
    }
	 
    return $html;
}
