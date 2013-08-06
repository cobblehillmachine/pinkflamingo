<?php
/**
 * The template for displaying Category Archive pages.
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
		<?php if ( have_posts() ) : ?>
			<div class="small-cont">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>			
			</div>
		<?php twentyeleven_content_nav( 'nav-below' ); ?>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
