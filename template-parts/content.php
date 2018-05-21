<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Watergate
 */

?>
<?php if ( is_singular() ) { ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">

		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
		
		<div class="single-post">
			<div class="row">
				<div class="col-md-9 col-sm-12 single-content">
					<h1><?php the_title(); ?></h1>
					<span>Posted on <?php the_date(); ?></span>

					<div class="entry-content">
					<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div>
				<div class="col-md-3 col-sm-12">
					<?php if ( is_active_sidebar( 'default-sidebar' ) ) : ?>
					<aside id="primary" class="widget-area sidepage-nav">
						<?php dynamic_sidebar( 'default-sidebar' ); ?>
					</aside>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'category-sidebar' ) ) : ?>
					<aside id="secondary" class="widget-area sidepage-nav">
						<?php dynamic_sidebar( 'category-sidebar' ); ?>
					</aside>
					<?php endif; ?>
				</div>
			</div>
			<footer class="entry-footer">
				<?php watergate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>