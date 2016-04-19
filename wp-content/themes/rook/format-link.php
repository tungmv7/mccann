<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package WordPress
 * @subpackage Rook
 *
 */

$link = get_post_meta(get_the_ID(), '_thcmb_link_post_format', true);
$link_target = get_post_meta(get_the_ID(), '_thcmb_link_post_target', true);
$excerpt_length=th_theme_data('excerpt_length');
if (!$excerpt_length) { $excerpt_length = 70; }
?>      
	<div class="blog-description">
		<!-- Blog Date -->
		<div class="blog-date">
			<span><?php echo get_the_date( 'F d, Y') ?></span>
		</div>

		<!-- Blog Title -->
		<div class="blog-title">
			<a href="<?php if($link !== ''){ echo esc_url($link);}else{ the_permalink(); } ?>" title="<?php the_title_attribute(); ?>" target="_<?php echo esc_attr($link_target); ?>">
				<h2><?php the_title(); ?></h2>
			</a>
		</div>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<!-- Blog Content -->
		<div class="blog-content">
			<?php echo content('content', absint($excerpt_length)); ?>
		</div>

		<!-- Blog Button -->
		<div class="blog-btn">
			<a class="btn btn-pink" href="<?php if($link !== ''){ echo esc_url($link);}else{ the_permalink(); } ?>" title="<?php the_title_attribute(); ?>" target="_<?php echo esc_attr($link_target); ?>" role="button"><?php esc_html_e('Read More', 'rook'); ?></a>
		</div>
	</div>