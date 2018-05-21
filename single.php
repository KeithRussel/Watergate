<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Watergate
 */

get_header();
?>
	<div class="entry-header">
		<?php 
		 	$banner = get_field('page_banner');
			  if(!empty($banner)){
			    $banner_image = $banner['sizes']['banner'];
			  }else{                
			    $banner_image = get_field('news_page_banner','option');
			    $banner_image = $banner_image['sizes']['banner'];
			  }
		if ( !empty( $banner_image )) { ?>
			<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php the_title(); ?>"></div>
		<?php } else { ?>
			<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Post banner"></div>
		<?php } ?>	
	</div><!-- .entry-header -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main singleContent">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
