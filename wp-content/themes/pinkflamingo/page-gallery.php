<?php get_header(); ?>

<div id="gallery-cont">
	<div class="mid-cont">
		<div class="title medium"><?php the_title(); ?></div>


		<div id="masonry-images" class="images-cont">
			<?php query_posts(array('post_type' => 'gallery', 'orderby' => 'rand', 'posts_per_page' => 100  )); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
							if ($post_image_id) {
								$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
								if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					} ?>
					<a class="gallery-images <?php foreach((get_the_category()) as $category) {echo strtolower(str_replace(' ','-',$category->cat_name)); } ?>" rel="lightbox" href="<?php echo $thumbnail; ?>"><?php the_post_thumbnail( 'full', array('title' => ''.get_the_title().'' )); ?></a>
				<?php endwhile; // end of the loop. ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>