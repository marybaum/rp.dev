<?php
/***
 *
 * This is the front page for gyfoundation.
 * @author MHB
 * @package  Customizations
 * @subpackage Home
 *
 */

//Add widget support for homepage. If no widgets active, display the default loop.

add_action( 'genesis_meta', 'gyfoundation_home_genesis_meta' );

function gyfoundation_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-bottom-left' ) || is_active_sidebar( 'home-bottom-middle' ) || is_active_sidebar( 'home-bottom-right' ) ) {

		//* Add home body class
		add_filter( 'body_class', 'gyfoundation_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home widgets
		add_action( 'genesis_loop', 'gyfoundation_home_widgets' );

	}
}

//add function for the home body class
function gyfoundation_body_class( $classes ) {

		$classes[] = 'gyfoundation-home';
		return $classes;

}

//markup for home widgets
function gyfoundation_home_widgets() {

	echo '<div class="row">';

	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area"><div class="small-12 columns">',
		'after'  => '</div></div>',
	) );

echo '</div>';


	echo '<div class="row">';

genesis_widget_area( 'home-bottom-left', array(
		'before' => '<div class="home-bottom-left widget-area">
										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'home-bottom-middle', array(
		'before' => '<div class="home-bottom-middle widget-area">
										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'home-bottom-right', array(
		'before' => '<div class="home-bottom-right widget-area">

										<div class="large-4 columns">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

}

genesis();

