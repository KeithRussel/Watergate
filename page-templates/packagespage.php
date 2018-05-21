<?php
/**
 * Template Name: Packages Page
 *
 * @description Template for displaying a About page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/packagepage
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

<section id="packages">
	<div class="container">
		
		<div class="col-lg-12">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if( have_rows('packages') ): ?>
		<?php while( have_rows('packages') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$image = $image['sizes']['defpageImg'];
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>
		<div class="row pack-content">
			<div class="col-lg-5">
				<img class="w-100" src="<?php echo $image; ?>" />
			</div>
			<div class="col-lg-7">
				<p><?php echo $content; ?></p>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();