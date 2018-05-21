<?php get_header(); ?>
<div class="entry-header">
<?php
 	$banner_image = get_field('gallery_page_banner','option');
    $banner_image = $banner_image['sizes']['banner'];
if ( !empty( $banner_image )) { ?>
	<div class="main_banner" style="background-image: url(<?php echo $banner_image; ?>);" alt="<?php single_term_title(); ?>"></div>
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
<section id="gallery">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Gallery</h1>
			</div>
		</div>
		<div class="row">
		<?php 
        $queried_object = get_queried_object();
        $args= array (
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'galleries',
        'tax_query' => array(
            array(
                'taxonomy' => $queried_object->taxonomy,
                'field' => 'slug',
                'terms' => $queried_object->slug,
            )
        ),
        'paged' => get_query_var('paged')    
        );
        $the_query = new WP_Query($args);
        if($the_query->have_posts()) : ?>
		    <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
		    <div class="col-lg-4 col-md-4 col-sm-12">
		    	<div class="gallery-content" style="margin-bottom:30px;">
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
		    </div>
		    <?php endwhile; ?>
        <?php endif; ?>
		</div><?php wp_pagenavi(); ?>
	</div>
</section>



<?php get_footer(); ?>