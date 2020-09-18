<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Troubleshooting
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function troubleshooting_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'troubleshooting_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function troubleshooting_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'troubleshooting_pingback_header' );

function troubleshooting_add_cover() {
    echo '<div class="crocoblock-site-cover"></div>';
}
add_action( 'wp_footer', 'troubleshooting_add_cover' );

add_filter( 'croco-site-menu/rest/url', function() {
    return 'https://crocoblock.com/wp-json/';
} );

function troubleshooting_google_fonts() {
    if (!is_admin()) {
        wp_register_style('google', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null, 'all');
        wp_enqueue_style('google');
    }
}
add_action('wp_enqueue_scripts', 'troubleshooting_google_fonts');