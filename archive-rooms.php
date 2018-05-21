<?php
get_header();
?>

<div class="entry-header">
<?php
 	$banner_image = get_field('rooms_page_banner','option');
    $banner_image = $banner_image['sizes']['banner'];
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php echo get_the_archive_title(); ?>"></div>
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Room banner"></div>
<?php } ?>	
</div><!-- .entry-header -->

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
</div>

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

<div id="room-archive">
	<div class="container">
<h1>Our Rooms</h1>
<?php $the_query = new WP_Query( 'page_id=465' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

                       <?php the_content(); ?>
<p>&nbsp;</p>


     <?php endwhile;?>
		<?php

		// set up our archive arguments
		$archive_rooms = array(
		  	'order'			=> 'ASC',
		   	'post_type'		=> 'rooms',    // get only posts
		   	'posts_per_page'	=> -1   // this will display all posts on one page
		);
		// new instance of WP_Quert
		$archive_query = new WP_Query( $archive_rooms );
		?>
		<?php if(have_posts()) : ?>
		<?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop
		$ftImg = get_the_post_thumbnail_url( get_the_ID(), 'defpageImg'); ?>
		<div class="room-content">
			<div class="row">
				<div class="col-lg-5 col-sm-12">
					<img src="<?php if($ftImg) { echo $ftImg; } else { echo 'http://via.placeholder.com/345x245'; } ?>">
				</div>
				<div class="col-lg-7 col-sm-12">
					<h2><?php printf( '%1$s', get_the_title() ); ?></h2>
					<p><?php printf( '%1$s', the_excerpt() ); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn btn-1">View More</a>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>


<?php
get_footer();