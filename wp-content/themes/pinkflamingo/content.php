<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php global $blog_id;
if( $blog_id == '1' ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php twentyeleven_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
			
			<?php $show_sep = false; ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>


		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( '0 COMMENTS', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '% COMMENTS', 'comments number', 'twentyeleven' ) ); ?>
			</div>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>/#respond">POST A COMMENT</a>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php } else { ?>
		<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
				if ($post_image_id) {
					$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
					if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		} ?>
		<a class="gallery-images <?php foreach((get_the_category()) as $category) {echo strtolower(str_replace(' ','-',$category->cat_name)); } ?>" rel="lightbox" href="<?php echo $thumbnail; ?>"><?php the_post_thumbnail('full'); ?></a>
<?php } ?>