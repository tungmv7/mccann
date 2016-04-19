<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Rook
 *
 */

$video = get_post_meta(get_the_ID(), '_thcmb_video_post_format', true);
$excerpt_length=th_theme_data('excerpt_length');
if (!$excerpt_length) { $excerpt_length = 70; }

	if($video !== ''){ ?>

        <!-- Blog Video -->
        <div class="blog-video">
            <div class="embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get(esc_url($video)); ?>
            </div>
        </div>
		
	<?php } ?>

        <div class="blog-description">

            <!-- Blog Date -->
            <div class="blog-date">
                <span><?php echo get_the_date( 'F d, Y') ?></span>
            </div>

            <!-- Blog Title -->
            <div class="blog-title">
                <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">
                    <h2><?php the_title()?></h2>
                </a>
            </div>

            <?php get_template_part( 'content', get_post_format() ); ?>

            <!-- Blog Content -->
            <div class="blog-content">
                <?php echo content('content', absint($excerpt_length)); ?>
            </div>

            <!-- Blog Button -->
            <div class="blog-btn">
                <a class="btn btn-pink" href="<?php the_permalink()?>" role="button"><?php esc_html_e('Read More', 'rook'); ?></a>
            </div>

        </div>