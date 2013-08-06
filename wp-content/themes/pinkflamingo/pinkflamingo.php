<?php

// Template Name: Pink Flamingo Home

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php echo do_shortcode("[metaslider id=28]"); ?>
	<div class="banner-text">
		<div class="quote"><?php the_content(); ?></div>
	</div>

<?php endwhile; // end of the loop. ?>





<?php get_footer(); ?>