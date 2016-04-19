<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage Rook
 *
 */

$gallery = get_post_meta(get_the_ID(), '_thcmb_gallery_post_format', true);
$excerpt_length=th_theme_data('excerpt_length');
if (!$excerpt_length) { $excerpt_length = 70; }
?>
        <!-- Blog Slider -->
		<div class="blog-image">                                   
			<div id="blog-slider" class="owl-carousel owl-theme">

                <?php
				if($gallery !== ''){
					foreach($gallery as $gallery_img){ ?>
						<!-- Slider Item -->
						<div class="item">
							<img src="<?php echo esc_url($gallery_img); ?>" alt="<?php the_title()?>">
						</div> <?php
					}
				}
                ?>

			</div>
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