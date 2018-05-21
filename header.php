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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php if(is_front_page()){ ?>
         <?php
          $cover_image = get_field('open_graph_image','option');
          $cover_image = $cover_image['sizes']['og-image'];
        ?>
        <meta content="<?php the_field('open_graph_description','option'); ?>" name="description">
        <meta content="<?php the_field('open_graph_description','option'); ?>" property="og:description">
        <meta content="<?php echo $cover_image; ?>" property="og:image">
        <meta content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" property="og:title">
        <meta content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" property="og:site_name">
        <meta content="<?php bloginfo('url'); ?>" property="og:url">
        <meta content="website" property="og:type">

    <?php }elseif(is_page() || is_single()){ ?>
        <?php
          if(is_single()):
            if(has_post_thumbnail()){
              $cover_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'og-image' );
              $cover_image = $cover_image['0'];
            }else{
              $cover_image = get_field('open_graph_image','option');
              $cover_image = $cover_image['sizes']['og-image'];
            }
          else:
              $banner = get_field('banner');
              if(!empty($banner)){
                $cover_image = $banner['sizes']['og-image'];
              }else{                
                $cover_image = get_field('open_graph_image','option');
                $cover_image = $cover_image['sizes']['og-image'];
              }
          endif;
        ?>
        <meta content="<?php echo get_the_excerpt(get_the_ID()); ?>" name="description">
        <meta content="<?php echo get_the_excerpt(get_the_ID()); ?>" property="og:description">
        <meta content="<?php echo $cover_image; ?>" property="og:image">
        <meta content="<?php the_title(); ?>" property="og:title">
        <meta content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" property="og:site_name">
        <meta content="<?php the_permalink(); ?>" property="og:url">
        <meta content="website" property="og:type">
    <?php }else{ ?>
		<?php
          $cover_image = get_field('open_graph_image','option');
          $cover_image = $cover_image['sizes']['og-image'];
        ?>
        <meta content="<?php the_field('open_graph_description','option'); ?>" name="description">
        <meta content="<?php the_field('open_graph_description','option'); ?>" property="og:description">
        <meta content="<?php echo $cover_image; ?>" property="og:image">
        <meta content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" property="og:title">
        <meta content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" property="og:site_name">
        <meta content="<?php bloginfo('url'); ?>" property="og:url">
        <meta content="website" property="og:type">
	<?php } ?>
    
	<?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/aos.css" type="text/css" media="all">
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/aos.js" type="text/javascript" defer=""></script>
</head>
<?php the_field('header_custom_code','option'); ?>
<body <?php body_class(); ?>>
	<!-- Simply Loader by bryanabueva -->
	<?php
	  $preload = get_field('enable_preloader','option');
	  if($preload): 
	?>
	  <style type="text/css">body{overflow: hidden} .preloader {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background-image: url("<?php the_field('preloader_image', 'option'); ?>"); background-color:<?php the_field('preloader_bgcolor', 'option'); ?>;background-position: 50% 50%; background-repeat: no-repeat ;background-size: 200px;}</style>
	  <div class="preloader"></div>
	  <script type="text/javascript">
	      jQuery(window).load(function() {$('body').delay(500).css('overflow','auto');$('.preloader').delay(1500).fadeOut('slow');});
	  </script>
	<?php endif; ?>
	<!-- End Simply Loader by bryanabueva -->
<div id="page" class="site">

	<header id="masthead" class="site-header fixed-top">

<div class="whiteCurve"></div>
<nav class="navbar navbar-expand-xl navbar-dark main-nav">
	<div class="container">
	    <div class="navbar-collapse collapse nav-lg-wrap w-100 order-1 order-md-0 dual-collapse2">
	        <?php
	            wp_nav_menu( array(
	                'menu'              => 'primary',
	                'theme_location'    => 'menu-1',
	                'depth'             => 2,
	                'container'         => 'div',
	                'menu_class'        => 'wg-nav navbar-nav',
	                'container_class'   => 'mr-auto',
	                'menu_id'			=> 'main-nav',
	                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
	                'walker'            => new WP_Bootstrap_Navwalker())
	            );
	        ?>
	    </div>
	    <div class="ml-auto order-0 logo-brand">
	    	<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$mobileImage = wp_get_attachment_image_src('https://watergate.weareph.com/wp-content/uploads/2018/04/mobilelogo.png') ?>
	        <a class="navbar-brand mx-auto" href="<?php bloginfo('url'); ?>"><img id="logoimage" src="<?php echo $image[0]; ?>" /></a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
	            <span class="navbar-toggler-icon"></span>
	        </button>
	    </div>
	    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 m-0">
	        <?php
	            wp_nav_menu( array(
	                'menu'              => 'right',
	                'theme_location'    => 'menu-right',
	                'depth'             => 2,
	                'container'         => 'div',
	                'menu_class'        => 'wg-nav navbar-nav',
	                'container_class'   => 'ml-auto',
	                'menu_id'			=> 'main-nav',
	                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
	                'walker'            => new WP_Bootstrap_Navwalker())
	            );
	        ?>
	    </div>
	</div>
</nav>



	</header><!-- #masthead -->

	<div id="content" class="site-content">

