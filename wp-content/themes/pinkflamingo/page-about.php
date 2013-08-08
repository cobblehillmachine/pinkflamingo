<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="about-banner"><?php the_post_thumbnail('full'); ?></div>
	<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'meta_key' => '_thumbnail_id', 'posts_per_page' => 20 ));
	    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
		<div class="member-cont">
			<div class="member-img">
				<div class="photo1"><?php the_post_thumbnail(); ?></div>
				<div class="photo2"><?php if( class_exists( 'kdMultipleFeaturedImages' ) ) { kd_mfi_the_featured_image( 'featured-image-2', 'page' ); } ?></div>
			</div>
			<div class="member-info-cont">
				<div id="triangle"></div>
				<div class="member-name gfont"><?php the_title(); ?></div>
				<div class="member-info"><?php the_content(); ?></div>
			</div>
		</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
<?php endwhile; // end of the loop. ?>





<?php get_footer(); ?>