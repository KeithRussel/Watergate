<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Watergate
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
	    $banner_image = get_field('careers_page_banner','option');
	    $banner_image = $banner_image['sizes']['banner'];
	  }
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php the_title(); ?>"></div>
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default post banner"></div>
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
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			
			<div class="single-post">
				<div class="row">
					<div class="col-md-12 col-sm-12 single-content">
						<h1><?php the_title(); ?></h1>
						<?php 
						//variables
						$date = get_the_date();
						?>
						<span>Posted on <?php echo $date; ?></span>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						
					</div>
					<div class="col-md-6">
						<?php echo do_shortcode('[contact-form-7 id="441" title="Careers Form"]'); ?>
					</div>
				</div>
				<footer class="entry-footer">
					<?php watergate_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</article>
<?php
get_footer();