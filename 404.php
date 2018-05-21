<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Watergate
 */

get_header();
?>
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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main" style="padding: 25px 0;">

						<h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>

					<div class="page-wrapper">
						<div class="page-content">
							<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

						</div><!-- .page-content -->
					</div><!-- .page-wrapper -->

				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<?php
get_footer();
