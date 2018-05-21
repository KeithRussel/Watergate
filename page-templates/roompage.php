<?php
/**
 * Template Name: Room Page
 *
 * @description Template for displaying a Room page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package		watergate
 * @subpackage	page-templates/roompage
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

<section id="room-page">
	<div class="overlay">
		<div class="container" style="padding: 45px 0;">
			
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
								<ol class="carousel-indicators list-inline">
								  	<?php if( have_rows('room_slider') ): ?>
								  	<?php
									$count = 0; 
									while( have_rows('room_slider') ): the_row(); 

									// vars
									$imageIndicator = get_sub_field('rs_slider');
									$imageIndicator = $imageIndicator['sizes']['room-slider'];

									?>
								    <li data-target="#carouselRoomIndicators" data-slide-to="<?php echo $count; ?>" class="<?php if ($count == 0) { echo ' active'; } ?>">
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
					<?php the_content(); ?>
				<?php endwhile;
				endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h1 style="font-weight: 600;">Reserve a Room</h1>
				</div>
				<section id="reserve" class="" style="background-color: #f6fcfc;-webkit-box-flex: 0;-ms-flex: 0 0 100%;flex: 0 0 100%;max-width: 100%;">
					<form>
						<div class="container">
							<div class="row booking">
								<div class="col-md-3 col-6">
									<span>arrival:</span>
									<h4>Arrival Date</h4>
								</div>
								<div class="col-md-3 col-6">
									<span>departure:</span>
									<h4>Departure Date</h4>
								</div>
								<div class="col-md-6 col-lg-3 col-12">
									<div class="row">
										<div class="col-6 form-group">
											<label for="exampleFormControlSelect1">adults:</label>
											<select class="form-control" id="exampleFormControlSelect1">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											</select>
										</div>
										<div class="col-6 form-group">
											<label for="exampleFormControlSelect1">children:</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-12">
									<button type="button" class="btn btn-block btn-1">Check Availability</button>
								</div>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();