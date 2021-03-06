<?php
/**
 * Template Name: Amenities Page
 *
 * @description Template for displaying a Amenities custom page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/amenitiespage
 * @version		1.0.0
 * @author		Keith Russel
 */

get_header();

?>

<div class="entry-header">
<?php 
 	$banner = get_field('page_banner');
	  if(!empty($banner)){
	    $banner_image = $banner['sizes']['banner'];
	  }else{                
	    $banner_image = get_field('page_banner','option');
	    $banner_image = $banner_image['sizes']['banner'];
	  }
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php the_title(); ?>"></div>
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Page banner"></div>
<?php } ?>	
</div><!-- .entry-header -->

<section id="breadcrumbs">
	<div class="container">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
	</div>
</section>

<section id="default">
	<div class="container">
		
		<div class="row no-gutters">
			<div class="col-md-9 col-sm-12 top-info">
			<?php
			// TO SHOW THE PAGE CONTENTS
			while ( have_posts() ) : the_post(); ?>
				<!-- <h2>?php the_title(); ?</h2> -->
				<?php the_content(); ?>
			<?php endwhile; //resetting the page loop
			wp_reset_query(); //resetting the page query
			?>
			</div>
			<?php

			// check if the repeater field has rows of data
			if( have_rows('main_page_row') ): 
				// loop through the rows of data
    		while ( have_rows('main_page_row') ) : the_row();
    		// vars
			// $defImage = get_field('default_image', 'option');
			$defImage = get_field('default_image', 'option');
			$defImage = $defImage['sizes']['defgalleryFt'];

			$fr_image = get_sub_field('dp_fr_image');
			$fr_image = $fr_image['sizes']['defpageImg'];	

			$title = get_sub_field('dp_fr_title');
			$tag = get_sub_field('dp_fr_tagline');
			$par = get_sub_field('dp_fr_desc');

    		?>
    		<?php if(get_sub_field('page_row') == 'left' ): ?>
			<div class="first-content align-items-center">
				<div class="col-md-5 col-sm-12 image">
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>" class="defaultFt">
				</div>
				<div class="col-md-6 col-sm-12 mr-auto text">
					<h2><?php echo $title; ?></h2>
					<span><?php echo $tag; ?></span>
					<?php echo $par; ?>
				</div>
			</div>
			<?php elseif(get_sub_field('page_row') == 'right' ): ?>
			<div class="second-content align-items-center">
				<div class="col-md-5 col-sm-12 image order-md-last">
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>" class="defaultFt">
				</div>
				<div class="col-md-6 col-sm-12 ml-auto text order-md-first">
					<h2><?php echo $title; ?></h2>
					<span><?php echo $tag; ?></span>
					<?php echo $par; ?>
				</div>
			</div>

			<?php endif; ?>
			
			<?php endwhile;
			else : echo 'no content rows found';
			endif; ?>
		</div>
	</div>
</section>


<?php get_footer();