<?php
/**
 * Template Name: Shop Page
 *
 * @description Template for displaying a Shop page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/shoppage
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

<section id="shops">
	<div class="container">
		
		<div class="row">
			<div class="col-md-9 col-sm-12 shop-info">
				<h2><?php the_field('page_name'); ?></h2>
				<?php the_field('page_description'); ?>
			</div>
			<?php if( have_rows('main_shop') ): ?>
				<?php while( have_rows('main_shop') ): the_row();

				// vars
				$defaultImg = 'http://via.placeholder.com/1300x620';
				$image = get_sub_field('image');
				$content = get_sub_field('content');
				$link = get_sub_field('link');
			?>
				<div class="col-md-5 col-sm-12">
					<img class="w-100" src="<?php echo $image ? $image['url'] : $defaultImg; ?>" alt="<?php echo $image['alt'] ?>" />
				</div>
				<div class="col-md-7 col-sm-12 shop-desc">
					<?php echo $content; ?>
				</div>
				<?php endwhile; 
			endif; ?>
		</div>
	</div>
</section>




<?php get_footer(); ?>