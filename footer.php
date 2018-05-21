<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Watergate
 */

?>

	</div><!-- #content -->


	<footer>

    <section id="subscribe">
      <div class="container">
        <div class="row justify-content-md-center text-center">
          <div class="col-lg-6 col-md-12 inner-subs">
            <h1><?php the_field('tf_title', 'option'); ?></h1>
            <p><?php the_field('tf_description', 'option') ?></p>
<!--               <input type="text" class="form-control" placeholder="Your Email here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-1" type="button">Sign me up!</button>
              </div> -->
              <?php echo do_shortcode('[mc4wp_form id="372"]'); ?>
          </div>
        </div>
      </div>
    </section>

    <div class="top-footer">
		<div class="container">
			<div class="row border-bottom pb-3" style="border-color: #6e8488!important;">
				<div class="col-md-5 col-lg-4">
					<div class="left-footer">
					  <a href="<?php the_permalink(); ?>" class="d-flex align-items-center">
						<?php $image = get_field('mf_logo', 'option');
						if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>"  alt="<?php echo $image['alt']; ?>">
						<?php endif; ?>
					  </a>
					  <div class="location">
					    <p class="third-color"><span>Address: </span><?php the_field('mf_address', 'option'); ?></p>
					    <p class="third-color"><span>Contact Numbers:<br /></span><?php the_field('mf_contact', 'option'); ?></p>
					  </div>
					</div>
				</div>
			  <div class="col-md-7 col-lg-5">
			    <div class="menu-footer">
			    	<?php 
					wp_nav_menu( array( 
						'theme_location' => 'menu-footer',
						'container_class' => 'new_menu_class',
						// 'menu_class' => 'footer-link'
						) );
					?>
			    </div>
			  </div>
				<div class="col-md-3 col-lg-3">
					<div class="social">
						<p>Follow Us</p>
						<ul class="d-flex">
							<?php if( get_field('mf_facebook', 'option')): ?>
							<li>
								<a target="_blank" href="<?php the_field('mf_facebook', 'option'); ?>"><i class="fa fa-facebook"></i></a>
							</li>
							<?php endif; ?>
							<?php if( get_field('mf_twitter', 'option')): ?>
							<li>
								<a target="_blank" href="<?php the_field('mf_twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a>
							</li>
							<?php endif; ?>
							<?php if( get_field('mf_instagram', 'option')): ?>
							<li>
								<a target="_blank" href="<?php the_field('mf_instagram', 'option'); ?>"><i class="fa fa-instagram"></i></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="copyright">
      <div class="d-flex justify-content-center">
        <p class="secondary-color mb-3 text-center" style="font-size: 12px;">
        	<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(
				esc_html__( 'Copyright &copy; %s %s. All rights reserved. %s. ' ),
				date( 'Y' ),
				'Watergate Hotel',
				'Site by <a target="_blank" title="Website Design, Website Development, Graphics Design, On-line Database Integration, Search Engine Optimization" href="https://www.wearepixelhub.com">PIXELHUB Design + Digital Agency</a>'
			);
			?>
		</p>
      </div>
    </div>
  </footer>

</div><!-- #page -->
<?php the_field('footer_custom_code','option'); ?>
<?php wp_footer(); ?>

</body>
</html>
