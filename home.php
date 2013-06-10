<?php

add_action( 'genesis_meta', 'photoelectric_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function photoelectric_home_genesis_meta() {

	if ( is_active_sidebar( 'home-banner' ) || is_active_sidebar( 'product-carousel' ) || is_active_sidebar( 'home-middle-left' ) || is_active_sidebar( 'home-middle-center' ) || is_active_sidebar( 'home-middle-right' ) || is_active_sidebar( 'home-bottom-left' ) || is_active_sidebar( 'home-bottom-center' ) || is_active_sidebar( 'home-bottom-right' ) ) {
	
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'photoelectric_home_loop_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	}
}

/**
 * Display widget content for homepage sections.
 *
 */
function photoelectric_home_loop_helper() {

		if ( is_active_sidebar( 'home-banner' ) ) {
		
			echo '<div class="home-top"><div class="wrap">';
		
				echo '<div class="home-banner">';
				dynamic_sidebar( 'home-banner' );
				echo '</div><!-- end .home-banner -->';

			echo '</div></div><!-- end .home-top -->';	
		
		}

		if ( is_active_sidebar( 'product-carousel' ) ) {
		
			echo '<br class="clear" /><div class="carousel"><div class="wrap">';
		
				echo '<div class="product-carousel">';
				dynamic_sidebar( 'product-carousel' );
				echo '</div><!-- end .product-carousel -->';

			echo '</div></div><!-- end .carousel -->';	
		
		}

		
		if ( is_active_sidebar( 'home-middle-left' ) || is_active_sidebar( 'home-middle-center' ) || is_active_sidebar( 'home-middle-right' ) ) {
		
			echo '<div class="home-middle"><div class="wrap">';
		
				echo '<div class="home-middle-left one-third first">';
				dynamic_sidebar( 'home-middle-left' );
				echo '</div><!-- end .home-middle-left -->';

				echo '<div class="home-middle-center one-third">';
				dynamic_sidebar( 'home-middle-center' );
				echo '</div><!-- end .home-middle-center -->';

				echo '<div class="home-middle-right one-third">';
				dynamic_sidebar( 'home-middle-right' );
				echo '</div><!-- end .home-middle-right -->';

			echo '</div></div><!-- end .home-middle --><br class="clear" />';	
		
		}
		
		if ( is_active_sidebar( 'home-bottom-left' ) || is_active_sidebar( 'home-bottom-center') || is_active_sidebar( 'home-bottom-right' ) ) {
		
			echo '<div class="home-bottom"><div class="wrap">';
		
				echo '<div class="home-bottom-left one-third first">';
				dynamic_sidebar( 'home-bottom-left' );
				echo '</div><!-- end .home-bottom-left -->';

				echo '<div class="home-bottom-center one-third">';
				dynamic_sidebar( 'home-bottom-center' );
				echo '</div><!-- end .home-bottom-center -->';

				echo '<div class="home-bottom-right one-third">';
				dynamic_sidebar( 'home-bottom-right' );
				echo '</div><!-- end .home-bottom-right -->';

			echo '</div></div><!-- end .home-bottom -->';	
		
		}
		
}

genesis();