<?php get_header(); ?>
<header class="entry-header">
	<?php 
		$bannerImage = get_field('post_banner', $post->ID);
		$bannerImage = $bannerImage['sizes']['banner'];
	if ( !empty( $bannerImage )) { ?>
		<div class="main_banner" style="background-image: url(<?php echo $bannerImage; ?>);" alt="Main post banner"></div>
	<?php } else {
		echo '<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default post banner"></div>';
	} ?>

</header><!-- .entry-header -->
<div class="cat-title">
<?php if(is_category('events')) : ?>
	<h1>Events</h1>
	<h4>Category</h4>
<?php elseif(is_category('uncategorized')): ?>
	<h1>Uncategorized</h1>
	<h4>Category</h4>
<?php endif; ?>	
</div>

<section id="category-page">
	<div class="overlay">
		<div class="container">
			<div class="d-flex justify-content-center mb-4">
				<a class="btn btn-archive">News</a>
				<a class="btn btn-archive">Shops</a>
				<a class="btn btn-archive">Maintenance</a>
				<a class="btn btn-archive">Primary</a>
			</div>
			<?php if(is_category('events')) : ?>
			<div class="row">
			<?php
			// VARS
			$default = 'http://via.placeholder.com/350x235';
			

			// The Query
			$args = [
				'post_type'			=> ['events'], // Events
				'posts_per_page'	=> 6,
				'supports'			=> 'excerpt'
			];

			$content = get_the_excerpt();
			$query1 = new WP_Query( $args );

			if ( $query1->have_posts() ) :
				// The Loop
				while ( $query1->have_posts() ) :
					$postImg = get_the_post_thumbnail_url(get_the_ID(), 'full');
					$query1->the_post(); ?>
				<div class="col-md-4">
					<div class="card category-watergate">
					<?php if($postImg) { ?>
						<img class="card-img-top" src="<?php echo $postImg; ?>" alt="Card image cap">
					<?php } else { ?>
						<img class="card-img-top" src="<?php echo $default; ?>">
					<?php } ?>
						<div class="card-body">
							<h5 class="card-title"><?php the_title(); ?></h5>
							<span>Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
							<p class="card-text"><?php the_new_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn">Read more<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
			<?php else: ?>
			<p>This is some generic text to describe all other category pages, I could be left blank</p>
			<?php endif; ?>
		</div>
	</div>
</section>



<?php get_footer(); ?>