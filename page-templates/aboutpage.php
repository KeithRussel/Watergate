<?php
/**
 * Template Name: About Page
 *
 * @description Template for displaying a About page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/aboutpage
 * @version		1.0.0
 * @author		Keith Russel
 */

get_header();
the_post();
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

<section id="about" class="inner-page">
	<div class="overlay">
		<div class="container">

			<?php

			// check if the repeater field has rows of data
			if( have_rows('repeater') ): 
				// loop through the rows of data
    		while ( have_rows('repeater') ) : the_row();
    		// vars
			$defImage = 'http://placehold.it/460x358';

			$fr_image = get_sub_field('image');
			// $fr_image = $fr_image['sizes']['defpageImg'];	

			$title = get_sub_field('title');
			$tag = get_sub_field('dp_fr_tagline');
			$par = get_sub_field('description');

    		?>
    		<?php if(get_sub_field('row') == 'left' ): ?>
			<div class="row row-1">
				<div class="col-md-5">
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>">
				</div>
				<div class="col-md-7">
					<h2><?php echo $title; ?></h2>
					<span><?php echo $tag; ?></span>
					<?php echo $par; ?>
				</div>
			</div>
			<?php elseif(get_sub_field('row') == 'right' ): ?>
			<div class="row row-2">
				<div class="col-md-7">
					<h2><?php echo $title; ?></h2>
					<?php echo $par; ?>
					<span><?php echo $tag; ?></span>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $fr_image ? $fr_image : $defImage; ?>">
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

<?php
get_footer();