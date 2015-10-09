<?php
/***
 *
 * This is the front page for mbfoundation.
 * @author MHB
 * @package  Customizations
 * @subpackage Home
 *
 *
*/

//Add widget support for homepage. If no widgets active, display the default loop.

add_action( 'genesis_meta', 'mbfoundation_home_genesis_meta' );

function mbfoundation_home_genesis_meta() {

	if ( is_active_sidebar( 'home-bottom-left' ) || is_active_sidebar( 'home-bottom-middle' ) || is_active_sidebar( 'home-bottom-right' ) ) {

		//* Add home body class
		add_filter( 'body_class', 'mbfoundation_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home layout
		add_action( 'genesis_loop', 'mbfoundation_home_markup' );

	}
}

//add function for the home body class
function mbfoundation_body_class( $classes ) {

		$classes[] = 'mbfoundation-home';
		return $classes;

}

//markup for home widgets
function mbfoundation_home_markup() {

	echo '<div class="row">';

add_action('genesis_before_loop', 'mbfhome_before_loop');

function mbfhome_before_loop()	{
	echo '<div class="row small-12 medium-12 large-8 large-centered columns">';
}

function mbfhome_do_loop() {
	$args = (array(

	'posts_per_page' => 1,
	'cat'						 => 2,

	));
}

add_action('genesis_after_loop', 'mbfhome_after_loop');

function mbfhome_after_loop (){
	echo "</div></div>";
}


	echo '</div>';

//* Localize backstretch script

add_action( 'genesis_before_entry', 'mbfhome_set_background_image' );
function mbfhome_set_background_image() {

	$image = array( 'src' => has_post_thumbnail() ? genesis_get_image( array( 'format' => 'url' ) ) : '' );

	wp_localize_script( 'mbf-backstretch-set', 'BackStretchImg', $image );

}

//* Hook entry background area
add_action( 'genesis_before_entry', 'mbfhome_entry_background' );
function mbfhome_entry_background() {

if ( is_singular( array( 'post', 'page' ) ) || ( is_active_sidebar( 'home-top' )) && has_post_thumbnail() ) {

		echo '<div class="entry-background">' . '<h2>' . genesis_do_post_title() .  '</h2>' . '</div>';

	}

}


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

