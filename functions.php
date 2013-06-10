<?php

/**
 * Custom amendments for the theme.
 *
 * @category   Photoelectric
 * @package    Functions
 * @subpackage Functions
 * @author     Dave Kuhar
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://mediacellar.com/
 * @since      1.1.0
 */

/*******************************************************************************/
//DO NOT EDIT! EDITING THIS SECTION CAN HAVE SERIOUS RAMIFICATIONS!.

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

/**
 * 01 Initialize Sandbox
 * @since 1.1.0
 *
 * Builds various Genesis constants off style.css.
 * Includes various necessary files.
 * Future proofs theme by preventing updates.
 */
require_once( get_stylesheet_directory() . '/lib/init.php');

add_action( 'genesis_setup', 'gs_theme_setup', 15 );
/**
 * 03 Theme Setup
 * @since 1.1.0
 *
 * This setup function attaches all of the site-wide functions 
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 */
function gs_theme_setup() {
	// Add stuff here.
}

/**
 * 04 Register Extra Sidebars (widget areas)
 * Edit the $sidebars array to create the initial desired sidebars.
 * This is to be used with genesis_widget_area() on the front end.
 *
 * @uses genesis_register_sidebar() Genesis helper function to register WP sidebars.
 */
function gs_register_sidebars() {
	$sidebars = array(
		// Add more here...
		array(
			'id'			=> 'home-top',
			'name'			=> __( 'Home Top', CHILD_DOMAIN ),
			'description'	=> __( 'This is the top homepage section.', CHILD_DOMAIN ),
		),
	);
	
	foreach ( $sidebars as $sidebar )
		genesis_register_sidebar( $sidebar );
}

/** 
 * 05 Load Genesis
 *
 * This is technically not needed. However, to make functions.php snippet useful, it is necessary.
 */
require_once( get_template_directory() . '/lib/init.php' );

/** All Done! Loaded! Happy editing! */
/*******************************************************************************/

/** Add odd/even post class */
function xmit_oddeven_post_class ( $classes ) {
	global $current_class;
	$classes[] = $current_class;
	$current_class = ($current_class == 'odd') ? 'even' : 'odd';
	return $classes;
}
add_filter ( 'post_class' , 'xmit_oddeven_post_class' );
global $current_class;
$current_class = 'odd';



/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'inner',
	'footer-widgets',
	'footer'
) );

/** Unregister secondary sidebar */
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );


/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'home-banner',
	'name'			=> __( 'Home Banner', 'photoelectric'),
	'description'	=> __( 'Full-width banner area on home page.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'product-carousel',
	'name'			=> __( 'Product Carousel', 'photoelectric'),
	'description'	=> __( 'Full-width area for product feature.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-left',
	'name'			=> __( 'Home Middle Left', 'photoelectric'),
	'description'	=> __( 'Home Middle Left.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-center',
	'name'			=> __( 'Home Middle Center', 'photoelectric'),
	'description'	=> __( 'Home Middle Center.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-right',
	'name'			=> __( 'Home Middle Right', 'photoelectric'),
	'description'	=> __( 'Home Middle Right.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-left',
	'name'			=> __( 'Home Bottom Left', 'photoelectric'),
	'description'	=> __( 'Home Bottom Left.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-center',
	'name'			=> __( 'Home Bottom Center', 'photoelectric'),
	'description'	=> __( 'Home Bottom Center.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-right',
	'name'			=> __( 'Home Bottom Right', 'photoelectric'),
	'description'	=> __( 'Home Bottom Right.', 'photoelectric'),
) );
genesis_register_sidebar( array(
	'id'			=> 'logo-holder',
	'name'			=> __( 'Logo', 'apparition'),
	'description'	=> __( 'Holds NEOFPA logo above nav', 'apparition'),
) );

// put neofpa logo holder div above header
function ts_do_logo_div() {
	echo '<div id="logoholder">';
	echo '<div class="wrap">';
	dynamic_sidebar( 'logo-holder' );
	echo '</div></div><!-- end .logoholder -->';
}
add_action( 'genesis_before', 'ts_do_logo_div' );

/** Add support for 1-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 1 );

// add woocommerce support
add_theme_support( 'genesis-connect-woocommerce' );

// change number of related product columns
add_filter ( 'woocommerce_product_thumbnails_columns', 'zz_thumb_cols' );
function zz_thumb_cols() {
return 16; //Change the 8 to reflect how many columns you need
}