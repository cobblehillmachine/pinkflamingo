<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php global $blog_id;
if( $blog_id == '1' ) { ?>
<div id="primary">
	<div id="blog-header">
		<div class="small-cont">
			<div class="title">PINK BLOG</div>
			<div class="cat-dd">
				<div class="sort-title" >SORT BY</div>
				<ul class="categories"><?php $categories = wp_list_categories(array('child_of' => 5 , 'orderby' => 'ID', 'order' => 'ASC', 'show_option_all' => 'VIEW ALL')); echo $categories; ?></u>
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
<?php } else { ?>
	<div id="gallery-cont">
		<div class="mid-cont">
			<div id="<?php echo strtolower(str_replace(' ','-',$sub_cat->name)); ?>" class="title medium">GALLERY</div>
			<?php 
			    echo '<div class="cat-dd"><div class="sort-title">SORT BY</div>';
			    		    $sub_cats = get_categories(array('orderby' => 'ID', 'order' => 'ASC'));
			    		    if($sub_cats) {
			    		        echo '<ul class="categories">';
			    		        foreach($sub_cats as $sub_cat) {
			    		        echo '<li class="cat-name"><a href="/category/'.strtolower(str_replace(' ','-',$sub_cat->name)).'">'.$sub_cat->name.'</a></li>';
			    		        }
								echo '<li><a id="view-all" href="/gallery/">VIEW ALL</a></li>';
			    		        echo '</ul>';
			    		    echo '</div>';
			    		    }

			?>
			<div id="masonry-images" class="images-cont">
				<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', get_post_format() ); ?>
							<?php endwhile; ?>			
				<?php endif; ?>
			</div>

		</div>
	</div>
<?php }  ?>
<?php get_footer(); ?>
