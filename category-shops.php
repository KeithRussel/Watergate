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
<?php if(is_category('shops')) : ?>
	<h1>Shops</h1>
	<h4>Category</h4>
<?php endif; ?>	
</div>

<section id="category-page">
	<div class="overlay">
		<div class="container">
			<div class="d-flex justify-content-center mb-4">
				<?php //BUTTONS FOR CATEGORY
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'order'   => 'ASC'
				) );
				 
				foreach( $categories as $category ) {
				    $category_link = sprintf( 
				        '<a href="%1$s" alt="%2$s" class="btn btn-archive">%3$s</a>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
				        esc_html( $category->name )
				    );
				     
				    echo sprintf( esc_html__('%s'), $category_link ) ;
				}  ?>
			</div>
			<div class="row">
			<?php
			$default = 'http://via.placeholder.com/350x235';

			
			while( have_posts() ) :	the_post();
				$postImg = get_the_post_thumbnail_url(get_the_ID(), 'full');
			 ?>
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
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>