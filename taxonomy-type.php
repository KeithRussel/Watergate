<?php get_header(); ?>
<header class="entry-header">
<?php 
	$bannerImage = get_field('gallery_banner', 'option');
	$bannerImage = $bannerImage['sizes']['banner'];
if ( !empty( $bannerImage )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $bannerImage; ?>);" alt="Main post banner"></div>
<?php } else {
	echo '<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default post banner"></div>';
} ?>	
</header><!-- .entry-header -->

<section id="gallery">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Gallery</h1>
			</div>
		</div>
		<div class="row">
			<?php
			// set up our archive arguments
			$archive_args = array(
				'orderby'		=> 'date',
			  	'order'			=> 'DESC',
			   	'post_type' => 'galleries',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'images',
			            'field' => 'slug',
			            'terms' => 'images',
			        )
			    ),
			   	'paged' => get_query_var( 'paged' )
			);
			// new instance of WP_Quert
			$archive_query = new WP_Query( $archive_args );
			?>
			<?php if(have_posts()) : ?>
			<?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>
			<div class="col-md-4 col-sm-12">
				<article>
					<div class="gallery-content">
						<a href="<?php the_permalink(); ?>"><h5><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 22, '..');  ?></h5></a>
						<?php $featuredImage = get_the_post_thumbnail(null, 'defgalleryFt');
							$defaultImage = get_field('default_image', 'option');
							$defaultImage = $defaultImage['sizes']['defgalleryFt']; ?>
						<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail()) : ?>
							<?php echo $featuredImage; ?>
						<?php else: ?>
							<img class="w-100 defaultFt" src="<?php echo $defaultImage; ?>" alt="default gallery">
						<?php endif; ?>   
						</a>
						<!--span class="post-meta"><!?php echo get_the_date( 'F d, Y' ); ?></span-->
					</div>
				</article>
			</div>
			<?php endwhile; ?><?php wp_reset_postdata(); ?>
		<?php endif; ?>
		</div><?php wp_pagenavi(); ?>
	</div>
</section>



<?php get_footer(); ?>