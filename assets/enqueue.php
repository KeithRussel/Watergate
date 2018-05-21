<?php

/**
 * Enqueue scripts and styles.
 */
function watergate_scripts() {
	// wp_enqueue_style( 'watergate-style', get_stylesheet_uri() );

	wp_enqueue_style( 'watergate-customstyle', get_template_directory_uri() . '/assets/css/custom.css' );

	wp_enqueue_style( 'watergate-extrastyle', get_template_directory_uri() . '/assets/css/extra.css' );

	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/assets/css/responsive.css' );

	wp_enqueue_style( 'default-bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );

	wp_enqueue_script( 'watergate-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'watergate-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	// wp_enqueue_script( 'jquery' );

	// wp_enqueue_script( 'jquery-ui-core' );

	// wp_enqueue_script( 'jquery-ui-datepicker' );

	if (is_front_page() || is_singular('rooms') || is_post_type_archive('rooms') ) {
		wp_enqueue_script( 'staah', '//secure.staah.com/cal/js/jquery-1.9.1.js', array(), '20151215', false );

		wp_enqueue_script( 'staah-ui', '//secure.staah.com/cal/js/jquery-ui.js', array(), '20151215', false );
	}

	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );

	// wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.js', array(), '20151215', true );

	wp_enqueue_script( 'touch-slider', '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js', array(), '20151215', false );

	wp_enqueue_script( 'customize-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );

	wp_enqueue_script( 'matchHeight-js', get_template_directory_uri() . '/assets/js/jquery.matchHeight.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'watergate_scripts' );



?>