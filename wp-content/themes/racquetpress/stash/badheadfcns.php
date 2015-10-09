<?php
/**
 * MBFoundation child theme for the Genesis framework.
 *
 *
 * @package Templates
 * @author  StudioPress. Changes by Mary Baum.
 * @license GPL-2.0+
 * @link    http://marginhancers.com
 *
 * This file outputs a centered logo and two menu areas - one on either side. If you want a standard Genesis header with the logo on the left and main navigation on the right, hide this file in the stash folder.
 */


//We just want to change the markup of the widget areas.

remove_action( 'genesis_header', 'genesis_do_header' );

add_action( 'genesis_header', 'mbf_do_header' );

function mbf_do_header() {

	global $wp_registered_sidebars;

	//Check to make sure our widget areas are active and ready for us. We really should use both, or this header's gonna look stupid.

		if ( ( isset( $wp_registered_sidebars['headernav-left'] ) && is_active_sidebar( 'headernav-left' ) ) || ( isset( $wp_registered_sidebars['headernav-right'] ) && is_active_sidebar( 'headernav-right' ) ) ) {

	//The left-hand menu area. On the Menus page of the admin, add the links for this side to your primary menu.

		genesis_markup( array(
			'html5'   => '<aside class="headernav-left">',
			'xhtml'   => '<div class="widget-area header-widget-area">',
			'context' => 'header-widget-area',
		) );

			do_action( 'genesis_do_nav' );
			dynamic_sidebar( 'headernav-left' );

		genesis_markup( array(
			'html5' => '</aside>',
			'xhtml' => '</div>',
		) );



	// Now the right side of the menu. Use the secondary menu for these links.

	genesis_markup( array(
			'html5'   => '<aside class="headernav-right">',
			'xhtml'   => '<div class="widget-area header-widget-area">',
			'context' => 'header-widget-area',
		) );

			do_action( 'genesis_do_subnav' );

			dynamic_sidebar( 'headernav-right' );

		genesis_markup( array(
			'html5' => '</aside>',
			'xhtml' => '</div>',
		) );
	}

// Or, if you want a clean header with just the logo in the center, don't put anything in the menu areas. I imagine you could also just put widgets in those menu areas if you want.


}


