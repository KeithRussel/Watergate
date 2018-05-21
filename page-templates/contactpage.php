<?php
/**
 * Template Name: Contact Page
 *
 * @description Template for displaying a Contact page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/contactpage
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

<section id="contact" class="inner-page">
	<div class="overlay">
		<div class="container">		
			<div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12">
					<h1>Contact Us</h1>
					<article>
						<?php the_content(); ?>
					</article>
					<?php echo do_shortcode('[contact-form-7 id="205" title="Contact form 1"]'); ?>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 mr-auto details">
					<?php echo do_shortcode('[wpgmza id="1"]'); ?>
					<p>&nbsp;</p>
					<p>Address: <span><?php the_field('mf_address', 'option'); ?></span></p>
					<p>Contact No: <span class="d-flex"><?php the_field('mf_contact', 'option'); ?></span></p>
					<div class="social">
					<p class="mb-3">Follow Us</p>
					<ul class="d-flex">
						<li>
							<a target="_blank" href="<?php the_field('mf_facebook', 'option'); ?>"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a target="_blank" href="<?php the_field('mf_twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a target="_blank" href="<?php the_field('mf_youtube', 'option'); ?>"><i class="fa fa-youtube-play"></i></a>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>




<?php
get_footer();