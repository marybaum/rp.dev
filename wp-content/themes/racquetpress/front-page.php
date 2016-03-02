<?php
/***
 *
 * This is the front page for gyfoundation.
 * @author MHB
 * @package  Customizations
 * @subpackage Home
 *
 *
*/

add_action( 'genesis_meta', 'rphome_genesis_meta' );

//Add widget support for homepage. If no widgets active, display the default loop.


function rphome_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'homegrid-1' ) || is_active_sidebar( 'homegrid-2' ) || is_active_sidebar( 'homegrid-3' ) ) {

		//* Add home body class
		add_filter( 'body_class', 'rphome_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home widgets
	 add_action( 'genesis_loop', 'rphome_markup' );

	}
}

function rphome_body_class( $classes ) {

		$classes[] = 'rp-home';
		return $classes;

}


function rphome_markup() {

	echo '<div class="row">';

	echo '<div class="small-12 medium-10 medium-centered columns">';

genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',

	) );

	echo '</div></div>';

echo '<div class="homegrid row small-12 medium-10 large-9 medium-centered large-centered columns">';

genesis_widget_area( 'homegrid-1', array(
		'before' => '<div class="homegrid-1 widget-area">
						<div class="medium-6 large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'homegrid-2', array(
		'before' => '<div class="homegrid-2 widget-area">
						<div class="medium-6 large-4 columns">',
		'after'  => '</div></div>',
	) );


genesis_widget_area( 'homegrid-3', array(
		'before' => '<div class="homegrid-3 widget-area">
						<div class="medium-6 large-4 columns">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

}

genesis();