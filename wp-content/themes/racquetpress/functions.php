<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'RacquetPress', 'racquetpress' ) );
define( 'CHILD_THEME_URL', ' http://github.com/marybaum/' );
define( 'CHILD_THEME_VERSION', '0.1.3' );


//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//Center the header logo and menus////////////////////////////////////

//* Remove the default header
remove_action( 'genesis_header', 'genesis_do_header' );


//* Add Primary Nav in custom header
add_action( 'genesis_header', 'genesis_do_nav' );

//* Add Site Title in custom header
add_action( 'genesis_header', 'rp_do_header' );

function rp_do_header() {

	do_action( 'genesis_site_title' );

	remove_action( 'genesis_site_description' , 'rp_site_description');

return;

}

//* Add Secondary Nav in custom header
add_action( 'genesis_header', 'genesis_do_subnav' );


//* Remove Primary and Secondary Nav from below header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

// End centered header logo, navs ///////////////////////////////////////////////

add_theme_support( 'genesis-connect-woocommerce' );

//* Reposition the breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs' );

/** Custom breadcrumbs arguments*/
add_filter( 'genesis_breadcrumb_args', 'rp_breadcrumb_args' );
	function rp_breadcrumb_args( $args ) {
	$args['sep']           = ' &raquo; ';
	$args['list_sep']        = ', '; // Genesis 1.5 and later
	$args['display']         = true;
	$args['labels']['prefix']    = '';
	$args['labels']['author']    = __( ' ','gyf' );
	$args['labels']['category']   = __( ' ','gyf' ); // Genesis 1.6 and later
	$args['labels']['tag']      = __( ' ','gyf' );
	$args['labels']['date']     = __( ' ','gyf' );
	$args['labels']['search']    = __( 'Search for ','gyf' );
	$args['labels']['tax']      = __( ' ','gyf' );
	$args['labels']['post_type']   = __( ' ','gyf' );
	$args['labels']['404']      = __( '404','gyf' ); // Genesis 1.5 and later
	return $args;
	}
//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Force full-width-content layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Load all the scripts
add_action( 'wp_enqueue_scripts', 'rp_enqueue_scripts' );

function rp_enqueue_scripts() {

	// Foundation JS
	wp_enqueue_script( 'rp-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), '1', true );

	//Foundation Init JS
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation/js/foundation.js', array( 'jquery' ), '1', true );

	// type
	wp_register_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css' );

	wp_enqueue_style( 'foundation' );
	wp_enqueue_style( 'dashicons' );

	// jQuery goodness

	//  wp_enqueue_script( 'header-fade', get_template_directory_uri() . '/js/header-fade.js', array( 'jquery' ), '1.0.0', true );

		wp_enqueue_script( 'rp-effects', get_template_directory_uri() . '/js/effects.js', array( 'jquery' ), '1.0.0' );

		// Backstretch.

		if ( is_singular( 'post' ) && has_post_thumbnail() ) {

	 	wp_enqueue_script( 'rp-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0', true );

		wp_enqueue_script( 'rp-backstretch-set', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch-set.js' , array( 'jquery', 'rp-backstretch' ), '1.0.0', true );

	} }

	//* Localize Backstretch script

	add_action( 'genesis_after_entry', 'rp_set_background_image' );
	function rp_set_background_image() {

	$image = array( 'src' => has_post_thumbnail() ? genesis_get_image( array( 'format' => 'url' ) ) : '' );

	wp_localize_script( 'rp-backstretch-set', 'BackStretchImg', $image );

}


	// Modify the Genesis content limit read more link

	add_filter( 'get_the_content_more_link', 'rp_read_more_link' );
	function rp_read_more_link() {
		return '... <a class="more-link" href="' . get_permalink() . '">More.</a>';
	}

	// Customize search form input box text

	add_filter( 'genesis_search_text', 'rp_search_text' );
	function rp_search_text( $text ) {
	return esc_attr( 'Search.' );
}


	// Add body class for single Posts and static Pages with Featured images...

	add_filter( 'body_class', 'rp_featured_img_body_class' );
	function rp_featured_img_body_class( $classes ) {

	if (  is_singular( array ('post' , 'page' ) ) && has_post_thumbnail() )  {
		$classes[] = 'has-featured-image';
	}
	return $classes;
}

	//...and without them.

	add_filter( 'body_class' , 'rp_nopic' );

	function rp_nopic( $classes ) {
	if (  is_singular( array ('post' , 'page' ) ) && !has_post_thumbnail() )  {
		$classes[] = 'no-pic';
	}
		return $classes;
}

	// hook entry bgd to loop

	add_action( 'genesis_after_header', 'rp_entry_bgd' );
	function rp_entry_bgd() {
	if ( (	is_singular( 'post' ) ) && has_post_thumbnail() ) {
		echo '<div class="entry-background">' . '<h1>' . genesis_do_post_title() .  '</h1>' . '</div>';
	}
}

	//lose the background image on archive pages

	if( is_page( 'archive' ) ) {

	remove_action( 'genesis_after_header' , 'rp_entry_bgd' );

	add_action( 'genesis_after_header', 'genesis_do_loop' );
}

/**
 * Show Featured Image above Post Titles
 *
 * Scope: Posts page (index)
 *
 * @author Sridhar Katakam
 * @link   http://sridharkatakam.com/display-featured-images-post-titles-posts-page-genesis/
 */
	add_action( 'genesis_before_entry', 'rp_postimg_above_title' );

	function rp_postimg_above_title() {

	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

	add_action( 'genesis_entry_header', 'rp_postimg', 9 );
}

	function rp_postimg() {
	echo '<a href="' . get_permalink() . '">' . genesis_get_image( array( 'size' => 'square' ) ). '</a>';
}

/*
 * Output gravatar before content on single Posts having Featured image
	add_action( 'genesis_before_content', 'rp_gravatar' );
	function rp_gravatar() {

	if ( is_singular( 'post' ) && has_post_thumbnail() ) {
		echo '<div class="entry-avatar">';
			// Get current entry's author ID
			global $post;
			$author_id = $post->post_author;

			echo get_avatar( get_the_author_meta( 'user_email', $author_id ), 240 );
		echo '</div>';
	} }
 *
 */

 //* Modify the speak your mind title in comments
add_filter( 'comment_form_defaults', 'sp_comment_form_defaults' );
function sp_comment_form_defaults( $defaults ) {

	$defaults['title_reply'] = __( 'Speak.' );
	return $defaults;

}

// Add support for image sizes

add_image_size( 'giant', 1500, 600, false );
add_image_size( 'medium', 750, 0, false );
add_image_size( 'square' , 600, 600, true );
add_image_size( 'small' , 300, 300, TRUE );

//* Register widgeted areas

genesis_register_sidebar( array(
 'id'     => 'home-top',
 'name'    => __( 'home-top', 'gyfoundation' ),
 'description' => __( 'This is the top section of the homepage.', 'gyfoundation' ),
 //'before_title'=> __( '<h2><a>', 'gyfoundation'),
 //'after_title' => __( '</a></h2>', 'gyfoundation'),
 ) );
genesis_register_sidebar( array(
 'id'     => 'home-bottom-left',
 'name'    => __( 'Home - bottom-left', 'gyfoundation' ),
 'description' => __( 'This is the bottom-left section of the homepage.', 'gyfoundation' ),
 'before_title'=> __( '<h4>', 'gyfoundation'),
 'after_title' => __( '</h4>', 'gyfoundation'),
) );
genesis_register_sidebar( array(
 'id'     => 'home-bottom-middle',
 'name'    => __( 'Home - bottom-middle', 'gyfoundation' ),
 'description' => __( 'This is the bottom-middle section of the homepage.', 'gyfoundation' ),
 'before_title'=> __( '<h4>', 'gyfoundation'),
 'after_title' => __( '</h4>', 'gyfoundation'),
) );
genesis_register_sidebar( array(
 'id'     => 'home-bottom-right',
 'name'    => __( 'Home - bottom-right', 'gyfoundation' ),
 'description' => __( 'This is the bottom-right section of the homepage.', 'gyfoundation' ),
 'before_title'=> __( '<h4>', 'gyfoundation'),
 'after_title' => __( '</h4>', 'gyfoundation'),
) );
genesis_register_sidebar( array(
 'id'     => 'optin-after-entry',
 'name'    => __( 'Opt-in After Entry', 'gyfoundation' ),
 'description' => __( 'This is the opt-in form after a single entry.', 'gyfoundation' ),
 'before_title'=> __( '<h4>', 'gyfoundation'),
 'after_title' => __( '</h4>', 'gyfoundation'),
) );