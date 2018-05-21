<?php get_header(); ?>

	<div id="carouselControl1" class="carousel slide" data-ride="carousel" data-interval="7000">
		<?php if( have_rows('main_slider') ): ?>
		<div class="carousel-inner">
			<?php
			$count = 0; 
			while( have_rows('main_slider') ): the_row(); 

			// vars
			$image = get_sub_field('carousel');
			$caption = get_sub_field('caption');
			$subdesc = get_sub_field('desc');

			?>
			<div class="carousel-item full-banner <?php if ($count == 0) { echo ' active'; } ?>" style="background-image: url('<?php echo $image['url']; ?>'); background-size: cover; ">
			<!-- <img class="d-block w-100" src="images/slider1.jpg" alt="First slide"> -->
				<div class="carousel-caption d-none d-md-block">
					<h3><?php echo $caption; ?></h3>
				    <p><?php echo $subdesc; ?></p>
				</div>
			</div>
			<?php $count++; ?>
			<?php endwhile; ?>

		</div>
		<?php endif; ?>

		<a class="carousel-control-prev" href="#carouselControl1" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselControl1" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>  

	<!-- BOOKING -->
	<section id="book" class="d-flex justify-content-center" style="background-color: #f6fcfc;">
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

	<!-- WHAT TO EXPECT -->
	<section id="welcome">
		<div class="container">
			<div class="row">
			    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
				<?php $image = get_field('welcome_img');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
			    </div>
			    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 detail">
			    	<h1 class="title"><?php the_field('welcome_sub_title'); ?> <br><span class="sub"><?php the_field('welcome_title'); ?></span></h1>
			    	<?php the_field('welcome_description'); ?>
				    <div class="row sub-detail">
				    <?php // check if the repeater field has rows of data
					if( have_rows('four_pointers') ):
						// loop through the rows of data
   						while ( have_rows('four_pointers') ) : the_row(); ?>
				        <div class="col-md-12 col-lg-12 col-sm-12">
				          <h4 class="primary-color"><?php the_sub_field('pointer_title'); ?></h4>
				          <p><?php the_sub_field('pointer_desc'); ?></p>
				        </div>
				    <?php endwhile;
				    endif; ?>
				    </div>
				</div>
			</div>
		</div>
	</section>

  <?php
    	$custom_query =  new WP_Query( array( 'post_type' => array('testimonials'), 'posts_per_page' => 6, 'orderby' => 'date', 'order' => 'DESC' ) );
        if ( $custom_query->have_posts() ) :
    ?>
		<section id="testimonials">
			<h1 class="text-center">The Watergate Experience</h1>
				<div class="testimonials">
					<div class="container">
						<div class="row">
							<div class="col-12">
					    		<div id="testi-control" class="carousel slide" data-ride="carousel" data-interval="8000">
								  <div class="carousel-inner">
								  	<?php $c=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>
									    <div class="carousel-item <?php if($c==0): ?> active <?php endif; ?>" >
									    	<?php
									    		$web_logo = get_field('review_site_logo');
									    		$web_logo = $web_logo['sizes']['medium'];
									    		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'testimonial-image' );
									    		$images = $image['0'];
									    	?>
									    	<article class="text-center">
									    		<?php the_content(); ?>
									    	</article>
									    	<h6 class="text-center"><?php the_title(); ?></h6>
									    	<img class="author-image mx-auto d-block" src="<?php echo $images; ?>" />
									    </div>
									<?php $c++; endwhile; ?>
								  </div>

								  <a class="carousel-control-prev" href="#testi-control" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#testi-control" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>
					    	</div>
					    </div>
					</div>
				</div>
		</section>
	<?php wp_reset_query(); endif; ?>

	<section id="suites">
		<div class="inner-suites">
			<h1 class="text-center"><?php the_field('rs_title'); ?></h1>
			<div class="container">
				<div class="row">
				<?php // check if the repeater field has rows of data
				if( have_rows('rs_cards') ):
				// loop through the rows of data
				while ( have_rows('rs_cards') ) : the_row(); 
				// vars
				$image = get_sub_field('card_image');
				$title = get_sub_field('card_title');
				$tagline = get_sub_field('tagline');
				$description = get_sub_field('card_desc');
				$link = get_sub_field('link');
				$price = get_sub_field('card_price');
				$day = get_sub_field('card_day');
				?>
				<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
					<div class="card" style="width: 100%;">
						<img class="card-img-top" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						<div class="card-body suite-body">
							<a href="<?php echo $link; ?>">
								<h5 class="card-title primary-color"><?php echo $title; ?></h5>
							</a>
							<span class="tagline"><?php echo $tagline; ?></span>
							<p class="card-text"><?php echo $description; ?></p>
							<!-- <div class="pricing d-flex justify-content-center">
							    <div class="diamond">
							    	<div class="diamond-inner">
							        	<p class="price">P<!?php echo $price; ?></p>
							        	<p class="night">Per <!?php echo $day; ?></p>
							    	</div>
							    </div>
							</div> -->
						</div>
					</div>
				</div>
				<?php endwhile;
				endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section id="services">
		<div class="container">
		    <div id="servicesIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
			<div class="carousel-inner">
			<?php if( have_rows('services_slider') ):
			$count = 0; 
			while( have_rows('services_slider') ): the_row(); 

			// vars
			$image = get_sub_field('service_image');
			$side_title = get_sub_field('side_title');
			$title = get_sub_field('service_title');
			$sub_desc = get_sub_field('service_subdesc');
			$serv_desc = get_sub_field('service_desc');
			$button = get_sub_field('service_btn');

			?>
			<div class="carousel-item <?php if ($count == 0) { echo ' active'; } ?>">
				<div id="serviceId" class="serv-wrap d-flex">
					<div class="col-lg-1 col-md-1 col-sm-2 vertical-text">
						<p><?php echo $side_title; ?></p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-10 mr-auto">
						<img class="d-block w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<div class="col-lg-7 col-md-6 col-sm-12 mr-lg-auto ml-md-auto d-flex align-items-center p-0">
						<div class="serv-right">
							<h1><?php echo $title; ?></h1>
							<p class="secondary-color"><?php echo $sub_desc; ?></p>
							<p><?php echo $serv_desc; ?></p>
							<!-- <a href="<!?php echo get_page_link(181); ?>" class="btn btn-1"><!?php echo $button; ?></a> -->
						</div>
					</div>
				</div>
			</div>
			<?php $count++; endwhile;
			endif; ?>
			</div>
				<div class="serv-arrows">
					<a class="carousel-control-prev" href="#servicesIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#servicesIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
		    </div>
		</div>
	</section>

	<section id="events">
		<div class="event-overlay">
			<h1 class="text-center">News &amp; Events</h1>
			<div class="container">
				<div class="content-events">
					<div class="row clearfix">
						<!--?php
						// vars
							if( $display_event = get_field('display_event') ):
						?-->
						<!--Post Column-->
						<?php

						// VARS
						$currdates = date('Ymd');
						$default = 'http://via.placeholder.com/350x235';
						

						// The Query
						$custom_query =  new WP_Query( array(
                            'post_type' => array('post'),
                            'category__in' => 6,
                            'meta_key' => 'start_date',
                            // 'meta_query' => array(
                            //     array(
                            //         'key' => 'end_date'
                            //     ),
                            //     array(
                            //         'key' => 'end_date',
                            //         'value' => $currdates,
                            //         'compare' => '>='
                            //     )
                            // ),
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'posts_per_page' => 3
                        )
                    );

						if ( $custom_query->have_posts() ) :
							// The Loop
							while ( $custom_query->have_posts() ) : $custom_query->the_post();
								// $postImg = get_the_post_thumbnail_url(get_the_ID(), 'full');
								$content = get_the_excerpt(); 
								?>
						<div class="column col-lg-4 col-md-12 col-sm-12 col-xs-12 up-event">
							<?php
								$event_img = get_the_post_thumbnail_url(get_the_ID(), 'news-image');
								// $bannerImage = $bannerImage['sizes']['medium'];
								$permalink = get_post_permalink( );
								$currdates = date('Ymd');


								// DATE PICKER SETUP
								$start_d = get_field('start_date');
								$start = new DateTime($start_d);
								$start_date = $start->format('dmY');
								$start_month = '<p>' . $start->format('M') . '</p>';
								$start_date = '<p class="event-date">' . $start->format('d') . '</p>';

								$end_d = get_field('end_date');
								$end = new DateTime($end_d);
								$end_date = $end->format('dmY');
								$end_month = '<p>' . $end->format('M') . '</p>';
								$end_date = '<p class="event-date">' . $end->format('d') . '</p>';

								$time = $start->format('H:i A') . ' - ' . $end->format('H:i A') . ' ' . $start->format('D');

								if($start_date !== $end_date){
								    $end_day = ' - ' . $end->format('D');
								}else{
								    $end_day = "";
								}

								if ($start_month !== $end_month){
								    $month = $end_month;
								}else{
								    $month = "";
								}
							?>
							<!--Post Style One-->
						  	<div class="post-style-one unique-box top-image">
						    	<div class="inner-box">
						        	<div class="clearfix">
						                <div class="inner-column unique-left">
						                	<a href="<?php echo $permalink; ?>">
							                    <!--Image Box-->
							                    <figure class="image-box">
							                        <img src="<?php echo $event_img; ?>">
							                    </figure>
						                	</a>
						                </div>
						                
						                <div class="inner-column unique-right">
						                    <!--Content Box-->
						                    <div class="content-box">
						                        <div class="title"><?php the_title(); ?></div>
						                        
						                        <div class="text"><?php the_excerpt(); ?></div>
						                        <a href="<?php echo $permalink; ?>" class="btn-1">Learn More</a>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>

					</div>
					<?php	
				/* Restore original Post Data 
				 * NB: Because we are using new WP_Query we aren't stomping on the 
				 * original $wp_query and it does not need to be reset with 
				 * wp_reset_query(). We just need to set the post data back up with
				 * wp_reset_postdata().
				 */
				endwhile; 
				wp_reset_postdata();
			endif; ?>
				</div>
			</div>
		</div>
	</section>

	

	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg pop-video" id="vidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1d212954;">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" style="color: #fff; text-transform: uppercase; font-size: 12px;">CLOSE</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<?php the_field('pop_video', 'option'); ?>
	      </div>
	    </div>
	  </div>
	</div>
	</div>
	<script type="text/javascript">
	    $(window).on('load',function(){
	        $('#vidModal').modal('show');
	    });
	</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=342448152889482&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <?php get_footer();