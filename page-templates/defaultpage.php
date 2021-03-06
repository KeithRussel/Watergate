<?php
/**
 * Template Name: Default Custom Page
 *
 * @description Template for displaying a Default custom page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/defaultpage
 * @version		1.0.0
 * @author		Keith Russel
 */

get_header();
?>

<header class="entry-header">
<?php 
	$bannerImage1 = get_field('amenities_banner', 'option');
	$bannerImage2 = get_field('shops_banner', 'option');
	$bannerImage3 = get_field('services_banner', 'option');
	$defBan = 'http://via.placeholder.com/1300x620';
	$bannerImage1 = $bannerImage1['sizes']['banner'];
	$bannerImage2 = $bannerImage2['sizes']['banner'];
	$bannerImage3 = $bannerImage3['sizes']['banner'];
if ( is_page( 21 )) { ?>
	<div class="main_banner" style="background-image: url(<?php if( !empty($bannerImage1)){ echo $bannerImage1; } else { echo $defBan; } ?>);" alt="Amenities Banner"></div>
<?php } else if( is_page(23)) { ?>
	<div class="main_banner" style="background-image: url(<?php if( !empty($bannerImage2)){ echo $bannerImage2; } else { echo $defBan; } ?>);" alt="Shops Banner"></div>
<?php } else if( is_page(181)) { ?>
	<div class="main_banner" style="background-image: url(<?php if( !empty($bannerImage3)){ echo $bannerImage3; } else { echo $defBan; } ?>);" alt="Services Banner">
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Banner"></div>
<?php } ?>		
</header><!-- .entry-header -->

<section id="default">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-9 col-sm-12 top-info">
				<h2><?php the_field('page_name'); ?></h2>
				<?php the_field('page_description'); ?>
			</div>
			<?php

			// check if the repeater field has rows of data
			if( have_rows('main_page_row') ): 
				// loop through the rows of data
    		while ( have_rows('main_page_row') ) : the_row();
    		// vars
			$defImage = 'http://placehold.it/460x358';

			$fr_image = get_sub_field('dp_fr_image');
			$fr_image = $fr_image['sizes']['defpageImg'];	

			$title = get_sub_field('dp_fr_title');
			$tag = get_sub_field('dp_fr_tagline');
			$par = get_sub_field('dp_fr_desc');

    		?>
    		<?php if(get_sub_field('page_row') == 'left' ): ?>
			<div class="first-content align-items-center">
				<div class="col-md-5 col-sm-12 image">
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>">
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
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>">
				</div>
				<div class="col-md-6 col-sm-12 ml-auto text order-md-first">
					<h2><?php echo $title; ?></h2>
					<span><?php echo $tag; ?></span>
					<?php echo $par; ?>
				</div>
			</div>
			<?php else: ?>
			<p>ERRRRRR</p>
			<?php endif; ?>
			<?php endwhile;
			else : echo 'no content rows found';
			endif; ?>
		</div>
	</div>
</section>


<?php get_footer();