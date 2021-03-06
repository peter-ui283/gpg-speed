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




// new work start from here
