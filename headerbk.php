<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Watergate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header fixed-top">

<div class="whiteCurve"></div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse nav-lg-wrap w-100 order-1 order-md-0 dual-collapse2">
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'menu-1',
                'depth'             => 1,
                'container'         => 'div',
                'menu_class'        => 'wg-nav navbar-nav mr-auto',
                'menu_id'			=> 'main-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>
    </div>
    <div class="mx-auto order-0 logo-brand">
    	<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
        <a class="navbar-brand mx-auto" href="<?php bloginfo('url'); ?>"><img src="<?php echo $image[0]; ?>" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <?php
            wp_nav_menu( array(
                'menu'              => 'right',
                'theme_location'    => 'menu-right',
                'depth'             => 1,
                'container'         => 'div',
                'menu_class'        => 'wg-nav navbar-nav mr-auto',
                'menu_id'			=> 'main-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>
    </div>
</nav>



	</header><!-- #masthead -->

	<div id="content" class="site-content">

