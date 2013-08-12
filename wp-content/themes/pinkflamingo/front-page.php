<?php get_header(); ?>
<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
} ?>

<?php global $blog_id;
if( $blog_id == '2' ) { ?>
	<?php echo do_shortcode("[metaslider id=18]"); ?>
<?php } else if( $blog_id == '3' ) { ?>
	<?php echo do_shortcode("[metaslider id=15]"); ?>
<?php } else if( $blog_id == '4' ) { ?>
	<?php echo do_shortcode("[metaslider id=15]"); ?>
<?php } else { ?>
	<?php echo do_shortcode("[metaslider id=28]"); ?>
<?php } ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="banner-text">
	<div class="mid-cont">
		<div class="quote"><?php the_excerpt(); ?></div>
		<?php if( $blog_id !== '1' ) { ?>
			
				<div class="home-copy"><?php the_content(); ?></div>
		
		<?php }?>
	</div>
</div>
<?php if( $blog_id !== '1' ) { ?>

	<a class="gallery-link" href="/gallery">
		<span>view our gallery</span>
		<div class="arrow"></div>
	</a>
	<div id="contact">
		<div class="mid-cont">
			<div class="left-cont">
				<div class="title bold">CONTACT US</div>
				<?php if( $blog_id == '2' ) { ?>
					<?php $subs = new WP_Query( array( 'post_parent' => 8, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => 20 )); ?>
				<?php } else if( $blog_id == '3' ) { ?>
					<?php $subs = new WP_Query( array( 'post_parent' => 5, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => 20 )); ?>	
				<?php } else if( $blog_id == '4' ) { ?>
					<?php $subs = new WP_Query( array( 'post_parent' => 5, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => 20 )); ?>
				<?php } ?>
				
				   <?php if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
					<div class="member-cont">
						<div class="member-name"><?php the_title(); ?></div>
						<?php if ( get_post_meta($post->ID, 'Email', true) ) { ?>
								<a class="member-email" href="mailto:<?php echo get_post_meta($post->ID, 'Email', true); ?>"><?php echo get_post_meta($post->ID, 'Email', true); ?></a>
						<?php } ?>
						<?php if ( get_post_meta($post->ID, 'Phone', true) ) { ?>
							<div class="member-phone">
								 <?php echo get_post_meta($post->ID, 'Phone', true); ?>
							</div>
						<?php } ?>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
				
				<div class="social-cont">
					<a id="pinterest" class="social-icon" href="http://pinterest.com/pinkflamingogrp" target="_blank"></a>
					<a id="instagram" class="social-icon" href="http://instagram.com/pinkflamingogroup" target="_blank"></a>
					<a id="facebook" class="social-icon" href="https://www.facebook.com/PinkFlamingoGroup" target="_blank"></a>
					<a id="flamingo" class="social-icon" href="http://pinkflamingogroup.com/pink-blog/" target="_blank"></a>
				</div>
			</div>
			<div id="form-cont">
				<?php global $blog_id;
				if( $blog_id == '2' ) { ?>
					<?php echo do_shortcode('[contact-form-7 id="24" title="Contact form 1"]'); ?>
				<?php } else if( $blog_id == '3' ) { ?>
					<?php echo do_shortcode('[contact-form-7 id="24" title="Contact form 1"]'); ?>
				<?php } else if( $blog_id == '4' ) { ?>
					<?php echo do_shortcode('[contact-form-7 id="20" title="Contact form 1"]'); ?>
				<?php } else { ?>
					
				<?php } ?>
			</div>
			
		</div>
	</div>
	
<?php }?>
<?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>