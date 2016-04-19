<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Rook
 *
 */

$excerpt_length=th_theme_data('excerpt_length');
if (!$excerpt_length) { $excerpt_length = 70; }
?>
        <!-- Blog Image -->
        <div class="blog-image">
            <a href="<?php the_permalink()?>">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </a>
        </div>

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