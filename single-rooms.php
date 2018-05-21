<?php
get_header();
?>

<div class="entry-header" style="position: relative;">
<?php 
 	$banner = get_field('page_banner');
	  if(!empty($banner)){
	    $banner_image = $banner['sizes']['banner'];
	  }else{                
	    $banner_image = get_field('rooms_page_banner','option');
	    $banner_image = $banner_image['sizes']['banner'];
	  }
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php the_title(); ?>" style="position: relative;"></div>
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Room banner" style="position: relative;"></div>
<?php } ?>	
</div><!-- .entry-header --><!-- .entry-header -->

<section id="room-page">
	<div class="overlay">
		<div class="container">

			<!-- BOOKING -->
			<section id="book-room" class="d-flex justify-content-center">
				<div class="staah">
					<div class="more">
						<h2 class="text-uppercase"><?php the_field('icons_title', 'option'); ?></h2>
						<div class="row">
						<?php

						// check if the repeater field has rows of data
						if( have_rows('booking_icon', 'option') ):
						 	// loop through the rows of data
						    while ( have_rows('booking_icon', 'option') ) : the_row(); 
						    // vars
							$icon = get_sub_field('booking_icon_image', 'option');
							$text = get_sub_field('booking_icon_text', 'option');

						    ?>
							<div class="col-md-3 inner-more mb-2">
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
								<span><?php echo $text; ?></span>
							</div>
							<?php endwhile; ?>
						<?php endif; ?>
						</div>
					</div>
					<div class="staah-style">

					<script type="text/javascript" language="javascript" src="https://secure.staah.com/common-cgi/properties/widget/staahbookingcbgrp_mlsearch.php?id=6947&amp;checkintxt=Arrival&amp;showcheckout=yes&amp;checkouttext=Departure&amp;curdate=yes&amp;promocode=yes&amp;promotxt=Promocode&amp;promocode=yes&amp;dateformat=dd M yy&amp;buttontext=Book Online&amp;nonights=1&amp;unk=101"></script>

					</div>
				</div>
			</section>
			
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
			
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div id="carouselRoomIndicators" class="carousel slide" data-ride="carousel">
							<?php if( have_rows('room_slider') ): ?>
								<div class="carousel-inner">
								<?php
								$count = 0; 
								while( have_rows('room_slider') ): the_row(); 

								// vars
								$image = get_sub_field('rs_slider');
								$image = $image['sizes']['room-slider'];

								?>
									<div class="carousel-item <?php if ($count == 0) { echo ' active'; } ?>">
										<img class="d-block w-100" src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>">
									</div>
								<?php $count++; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
								<a class="carousel-control-prev" href="#carouselRoomIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselRoomIndicators" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								</a>
								<ol class="carousel-indicators list-inline row">
								  	<?php if( have_rows('room_slider') ): ?>
								  	<?php
									$count = 0; 
									while( have_rows('room_slider') ): the_row(); 

									// vars
									$imageIndicator = get_sub_field('rs_slider');
									$imageIndicator = $imageIndicator['sizes']['room-slider'];

									?>
								    <li data-target="#carouselRoomIndicators" data-slide-to="<?php echo $count; ?>" class="<?php if ($count == 0) { echo ' active'; } ?> mb-2 col-4">
								    	<img src="<?php echo $imageIndicator; ?>" class="img-fluid">
								    </li>
								    <?php $count++; ?>
									<?php endwhile; ?>
									<?php endif; ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
				<?php if( have_posts() ) :
				while( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile;
				endif; ?>
				</div>
			</div>
			
		</div>
	</div>
</section>

<?php
get_footer();