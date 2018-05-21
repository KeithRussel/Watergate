<?php
/**
 * Template Name: Meet & Celebrate Page
 *
 * @description Template for displaying a About page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/celebrate
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

<section class="inner-page">
	<div class="overlay">
		<div class="container">
			<div class="page-post">
			<br/>
			<br/>
			<br/>
				<div class="row">
					<div class="col-12 col-md-3" data-aos="fade-right">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
					<div class="col-12 col-md-9" data-aos="fade-left">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
					</article><!-- #post-<?php the_ID(); ?> -->
					</div>
				</div>
				<?php if( have_rows('caterer') ): ?>
					<div class="row caterer-list">
						<?php while ( have_rows('caterer') ) : the_row(); ?>
							<?php 
								// Getting Page Object
								$pageobj = get_sub_field('page_link');
								if( $pageobj ): 
									$post = $pageobj;
									setup_postdata( $post );
							?>
										<div class="col-12 col-md-4">
											<div class="caterer-cont" data-aos="fade-up">
												<?php
													// Getting Featured Image
													$ftimg = get_sub_field('image');
													if(!empty($ftimg)):
														$ftimg = $ftimg['sizes']['cater'];
													else:
														$ftimg = get_field('default_image');
														$ftimg = $ftimg['sizes']['cater'];
													endif;

													$logo = get_sub_field('logo');
													$logo = $logo['url'];
												?>
													<a href="<?php  the_permalink(); ?>" class="page-logo-overlay" style="background-image: url('<?php echo $logo; ?>');">														
														
													</a>
													<img alt="<?php the_title(); ?>" src="<?php echo $ftimg; ?>" />
											</div>
										</div>
							<?php 
									wp_reset_postdata(); 
								endif; 
							?>
						<?php endwhile; ?>					
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();