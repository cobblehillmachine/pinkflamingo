<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="not-found-cont">
	<div class="mid-cont">
		<div id="bubble">
			<span>OOPS!<br/>This page doesn’t<br/>seem to exist.</span>
		</div>
		<img id="flamingo" src="<?php echo get_template_directory_uri(); ?>/images/404-flamingo.png" />
		<?php global $blog_id;
		if( $blog_id == '2' ) { ?>
			<a class="home-link" href="/">go to varnadore electric</a>
		<?php } else if( $blog_id == '3' ) { ?>
			<a class="home-link" href="/">go to one if by land</a>
		<?php } else if( $blog_id == '4' ) { ?>
			<a class="home-link" href="/">go to linens unfurled</a>
		<?php } else { ?>
			<a class="home-link" href="/">go to the homepage</a>
		<?php }  ?>
	</div>
</div>

<?php get_footer(); ?>