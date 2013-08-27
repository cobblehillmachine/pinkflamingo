<?php get_header(); ?>


	<div class="about-banner"><?php the_post_thumbnail('full'); ?></div>
	<div id="members">
		<div class="mid-cont">
			<div id="party-btn"><div class="party party-on">PARTY ON</div><div class="party party-off">PARTY OFF</div></div>
			
			<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'meta_key' => '_thumbnail_id', 'posts_per_page' => 20 ));
			    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
				<div class="member-cont">
					<!-- <div class="mid-cont"> -->
						<div class="main-cont">
							<div class="member-img">
								<div class="photo1"><?php the_post_thumbnail('full'); ?></div>
								<div class="photo2"><?php if( class_exists( 'kdMultipleFeaturedImages' ) ) { kd_mfi_the_featured_image( 'featured-image-2', 'page' ); } ?></div>
							</div>
							<div class="member-info-cont">
								<div class="member-name"><?php $value = get_the_title(); $arr = explode(' ',trim($value)); ?> <?php echo $arr[0]; ?>&nbsp;<span><?php echo $arr[1]; ?></span></div>
								<div class="member-info"><?php the_content(); ?></div>
							</div>
						</div>
					<!-- </div> -->
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<div id="packages-cont">
		<div class="mid-cont">
			<div class="title bold">DESIGN TECHNIQUES</div>
			<?php query_posts(array('post_type' => 'packages', 'order' => 'ASC', 'posts_per_page' => 30  )); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="package">
						<div class="left">
							<div class="package-name"><?php $value = get_the_title(); $arr = explode(' ',trim($value)); ?> <?php echo $arr[0]; ?>&nbsp;<span><?php echo $arr[1]; ?></span></div>
							<!-- <a class="contact-link" href="/#contact">Contact Us For Pricing</a> -->
						</div>
						<div class="package-info"><?php the_content(); ?></div>
					</div>
				<?php endwhile; // end of the loop. ?>
			
		</div>
	</div>






<?php get_footer(); ?>