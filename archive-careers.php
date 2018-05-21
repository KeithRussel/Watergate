<?php get_header(); ?>

<div class="entry-header">
<?php
 	$banner_image = get_field('careers_page_banner','option');
    $banner_image = $banner_image['sizes']['banner'];
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php echo get_the_archive_title(); ?>"></div>
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

<div class="career-archive">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h1><?php post_type_archive_title(); ?></h1>
				<?php $the_query = new WP_Query( 'page_id=472' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
				<?php the_content(); ?>
				<?php wp_reset_postdata(); ?>
				<p>&nbsp;</p>
				<?php endwhile;?>
				<?php
				// VARS
				$default = 'http://via.placeholder.com/350x235';
				$date = get_the_date();
				

				// The Query
				$args = [
					'post_type'			=> ['careers'], //Careers
					// 'posts_per_page'	=> 3,
					'orderby'		=> 'date',
			  		'order'			=> 'DESC',
					'supports'			=> 'excerpt',
					'paged' => get_query_var('paged')
				];

				$content = get_the_excerpt();
				$query1 = new WP_Query( $args );

				if ( $query1->have_posts() ) :
					// The Loop
				while ( $query1->have_posts() ) :
					$query1->the_post(); ?>
				<div class="row">
					<div class="col-md-12 list">
						<div class="career-title"><?php the_title(); ?></div>
						<div class="pb-2">Posted on <?php echo $date; ?></div>
						<a href="<?php the_permalink(); ?>" class="btn btn-1">Apply Now!</a>
					</div>
				</div>
				<?php
					endwhile; 
					wp_reset_postdata(); ?>
				<?php else: ?>
				<p>Sorry, there are no current career opportunities as of the moment.</p>	
				<?php endif; ?>
			</div>
		</div><?php wp_pagenavi(); ?>
	</div>
</div>

<?php get_footer(); ?>