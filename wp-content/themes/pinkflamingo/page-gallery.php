<?php get_header(); ?>

<div id="gallery-cont">
	<div class="mid-cont">
		<div class="title medium"><?php the_title(); ?></div>
		<?php 
		    echo '<div class="cat-dd"><div class="sort-title">SORT BY</div>';
		    		    $sub_cats = get_categories(array('orderby' => 'ID', 'order' => 'ASC'));
		    		    if($sub_cats) {
		    		        echo '<ul class="categories">';
		    		        foreach($sub_cats as $sub_cat) {
		    		        echo '<li class="cat-name"><a id="'.strtolower(str_replace(' ','-',$sub_cat->name)).'" href="/category/'.strtolower(str_replace(' ','-',$sub_cat->name)).'">'.$sub_cat->name.'</a></li>';
		    		        }
		    		        echo '</ul>';
		    		    echo '</div>';
		    		    }
		
		?>
		<!-- <div class="cat-dd">
			<div class="sort-title" >SORT BY</div>
			<ul class="categories"><?php $categories = wp_list_categories(array('orderby' => 'ID', 'order' => 'ASC')); echo $categories; ?></u>
		</div> -->
		<div class="images-cont">
			<?php query_posts(array('post_type' => 'gallery', 'order' => 'ASC', 'posts_per_page' => 100  )); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
							if ($post_image_id) {
								$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
								if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					} ?>
					<a class="gallery-images <?php foreach((get_the_category()) as $category) {echo strtolower(str_replace(' ','-',$category->cat_name)); } ?>" rel="lightbox" href="<?php echo $thumbnail; ?>"><?php the_post_thumbnail('full'); ?></a>
				<?php endwhile; // end of the loop. ?>
		</div>

	</div>
</div>




<?php get_footer(); ?>