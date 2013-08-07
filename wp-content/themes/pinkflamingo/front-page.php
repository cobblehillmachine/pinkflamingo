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
	<div class="home-bg" style="background: url('<?php echo $thumbnail; ?>') no-repeat;">
		<a class="gallery-link" href="/gallery">
			<span>view our gallery</span>
			<div class="arrow"></div>
		</a>
	</div>

	<div id="contact">
		<div class="small-cont">
		</div>
	</div>
<?php }?>
<?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>