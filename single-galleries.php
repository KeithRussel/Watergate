<?php 
get_header();
the_post();
?>

<div class="entry-header">
<?php 
 	$banner = get_field('page_banner');
	  if(!empty($banner)){
	    $banner_image = $banner['sizes']['banner'];
	  }else{                
	    $banner_image = get_field('gallery_page_banner','option');
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
<section id="single-gallery">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<main class="gallery-single-content" id="main">
					
					<h2 class="default-pageTitle"><?php the_title(); ?></h2>
					
		        	<?php if(get_field('select') == 'image' ): ?>
	        		<?php 
					$images = get_field('gallery');
					$caption = get_field('caption');

					if( $images ): ?>

					<div class="row">
				        <?php foreach( $images as $image ): ?>
				            <div class="col-md-3 col-sm-12 mb-2 gallMatch">
				            	
				                <a href="<?php echo $image['url']; ?>" rel="lightbox" class="gallery">
				                	<img class="w-100" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </a>
				                <p><?php echo $image['caption']; ?></p>
				                <!-- <p><!?php echo $image['caption']; ?></p> -->
				            </div>
						<?php endforeach; ?>
					</div>										
					<?php endif; ?>
		            <?php elseif(get_field('select') == 'video' ): ?>
		            <div class="row">
			            <div class="col-md-8 video-responsive">
			            	<div><?php the_field('featured_video'); ?></div>
			            </div>
			   		</div> 
			   		<?php else: ?>

			   		<p>No Image and Video found.</p>   
		
					<?php endif; ?>
				</main>
			</div>
		</div>
	</div>	
</section>

<?php get_footer(); ?>