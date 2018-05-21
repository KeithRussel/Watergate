<?php get_header(); ?>
<div class="entry-header">
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

<section id="news">
	<div class="overlay">
	<div class="container">

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
			// VARS
			$default = 'http://via.placeholder.com/350x235';
			

			// The Query
			$args = [
				'post_type'			=>  post, //News and Events
				// 'posts_per_page'	=> 6,
				'paged' => get_query_var( 'paged' ),
				'supports'			=> 'excerpt'
			];
			

			$content = get_the_excerpt();
			$query1 = new WP_Query( $args );

			if ( $query1->have_posts() ) :
				
				// The Loop
				while ( $query1->have_posts() ) :
					
					
					$query1->the_post(); $postImg = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
			<div class="col-md-4">
				<div class="card archive-watergate">
				<?php if($postImg) { ?>
				<a href="<?php echo the_permalink(); ?>">
					<img class="card-img-top" src="<?php echo $postImg;?>" alt="Card image cap">
				</a>
				<?php } else { ?>
				<a href="<?php echo the_permalink(); ?>">
					<img class="card-img-top" src="<?php echo $default; ?>">
				</a>
				<?php } ?>
					<div class="card-body">
						<h5 class="card-title"><?php the_title(); ?></h5>
					
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

				else: ?>
				<p>Sorry, there are no news articles as of the moment.</p>
			<?php endif; ?>
			
		</div><?php wp_pagenavi(); ?>
	</div>
	</div>
</section>

<?php get_footer();