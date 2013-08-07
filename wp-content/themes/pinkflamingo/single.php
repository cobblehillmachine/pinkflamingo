<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div id="primary">
	<div id="blog-header">
		<div class="small-cont">
			<div class="title">PINK BLOG</div>
			<div class="cat-dd">
				<div class="sort-title" >SORT BY</div>
				<ul class="categories"><?php $categories = wp_list_categories(array('child_of' => 5 , 'orderby' => 'ID', 'order' => 'ASC')); echo $categories; ?></u>
			</div>
		</div>
	</div>
	<div id="content">
			<div class="small-cont">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content-single', get_post_format() ); ?>

						<?php comments_template( '', true ); ?>
						
					<?php endwhile; ?>			
			</div>
			<nav id="nav-single">
				<div class="small-cont">
					<span class="nav-previous"><?php previous_post_link( '%link', __( 'PREVIOUS', 'twentyeleven' ) ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', __( 'NEXT', 'twentyeleven' ) ); ?></span>
				</div>
			</nav><!-- #nav-single -->

	</div>
</div>


<?php get_footer(); ?>