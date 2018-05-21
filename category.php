<?php get_header(); ?>
<?php 
 	$banner = get_field('page_banner', '25');
	  if(!empty($banner)){
	    $banner_image = $banner['sizes']['banner'];
	  }else{                
	    $banner_image = get_field('news_page_banner','option');
	    $banner_image = $banner_image['sizes']['banner'];
	  }
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php echo single_post_title('', FALSE); ?>"></div>
<?php } else { ?>
	<div class="main_banner" style="background-image: url(http://via.placeholder.com/1300x620);" alt="Default Post banner"></div>
<?php } ?>	
</div><!-- .entry-header -->
<div class="cat-title">
	<!-- <h1><?php single_cat_title(); ?></h1>
	<h4>Category</h4> -->
</div>

<section id="category-page">
	<div class="overlay">

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
							
							<p class="card-text"><?php the_new_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn">Read more<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div><?php wp_pagenavi(); ?>
		</div>
	</div>
</section>



<?php get_footer(); ?>