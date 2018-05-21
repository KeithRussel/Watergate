<?php
/**
 * Watergate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Watergate
 */


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function watergate_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'watergate_content_width', 640 );
}
add_action( 'after_setup_theme', 'watergate_content_width', 0 );


function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/watergatelogo.png);
		height:65px;
		width:100%;
		/*background-size: 320px 65px;*/
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

// Theme setup and custom theme supports.
require get_template_directory() . '/inc/setup.php';

//Regsiter Widgets for this theme.
require get_template_directory() . '/inc/widgets.php';

//Functions for assets css and js.
require get_template_directory() . '/assets/enqueue.php';

//Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//Custom post types for this theme.
require get_template_directory() . '/inc/custom-post-types.php';

//Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

//Customizer additions.
require get_template_directory() . '/inc/customizer.php';

//Extras Functions.
require get_template_directory() . '/inc/extras.php';

// Load custom WordPress nav walker.
 require get_template_directory() . '/inc/vendor/bootstrap-wp-navwalker.php';

 //Acf Functions
 require get_template_directory() . '/inc/acf-functions.php';

//Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

